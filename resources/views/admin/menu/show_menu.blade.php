<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
</head>

<body class="g-sidenav-show   bg-gray-100">

    @include('admin.sidebar')
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        @include('admin.navbar')
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Menu</h6>
                        </div>

                        <div class="row mb-3">

                            <div class="d-flex justify-content-center">
                                <form action="/admin/menu" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @if($show->menu_sh == 1)
                                    <input type="hidden"  name="datash" value="0">
                                    @endif
                                    <div class="form-check form-switch">
                                        <input class="form-check-input {{$show->menu_sh == 1 ? 'bg-success' : 'bg-danger' }}" type="checkbox" role="switch" id="flexSwitchCheckDefault"
                                        onchange="this.form.submit()" value="{{ $show->menu_sh == 1 ? '0' : '1' }}" name="datash" {{$show->menu_sh == 1 ? 'checked' : ''}}>
                                        <label class="form-check-label" for="flexSwitchCheckDefault">Show Section</label>
                                      </div>
                                  </form>
                            </div>


                            <div class="col-12">
                                <div class="d-flex justify-content-center">

                                    @include('admin.menu.add_menu')

                                </div>
                            </div>
                        </div>

                        {{-- {{ Search }} --}}

                        <div class="row">
                            <div class="col-12">
                                <div class="d-block w-50 m-auto">
                                    <form action="{{ url('/admin/search_menu') }}" method="GET">
                                        @csrf
                                        <p for="" class="text-center form-label">Product Name
                                        </p>

                                        <div class="d-flex justify-content-center">

                                            <div class="input-group mb-3 w-75">

                                                <input type="text" name="query" class="form-control"
                                                    placeholder="Product name" style="height: 41px "
                                                    id="searchInput">

                                                <button class="btn btn-dark" type="submit">
                                                    <i class="bi bi-search"></i>
                                                </button>

                                            </div>

                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr class="text-center">

                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Name
                                            </th>
                                            <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">

                                            Ingredients
                                        </th>

                                        <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">

                                        Price
                                    </th>

                                    <th
                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">

                                    Category
                                </th>


                                            <th class="text-secondary opacity-7"></th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="menuTable">
                                        @forelse ($menu as $data)
                                            <tr class="text-center">

                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $data->name }}
                                                    </p>
                                                </td>


                                                <td> <p class="text-xs font-weight-bold mb-0"> {{ strlen($data->ingredients) > 10 ? substr($data->ingredients, 0, 10) . '...' : $data->ingredients }} </p> </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $data->price }}
                                                    </p>
                                                </td>


                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        @foreach ($categories as $category)
                                                            @if ($category->id == $data->category_id)
                                                                {{ $category->name }}
                                                            @endif
                                                        @endforeach
                                                    </p>
                                                </td>

                                                <td class="align-middle">
                                                  @include('admin.menu.update_menu')
                                                </td>

                                                <td class="align-middle">
                                                    <a href="{{ url('admin/delete_menu', $data->id) }}"
                                                        class="text-danger font-weight-bold text-xs"
                                                        data-toggle="tooltip" data-original-title="Delete menu"
                                                        onclick="return confirm('Are you sure you want to delete this menu?')">
                                                        Delete
                                                        <i class="bi bi-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="16">
                                                    <p class="text-xs text-center text-danger font-weight-bold mb-0">
                                                        No Data !
                                                    </p>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                {{ $menu->render('admin.pagination') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('admin.footer')
        </div>
    </main>

    @include('admin.script')

    <script>
        $(document).ready(function() {
            var categoryMap = {
                @foreach ($categories as $category)
                    {{ $category->id }}: '{{ $category->name }}',
                @endforeach
            };

            $('#searchInput').on('keyup', function() {
                var searchInput = $(this).val();
                $.ajax({
                    url: '{{ url('admin/search_menu') }}',
                    type: 'GET',
                    data: { query: searchInput },
                    success: function(response) {
                        let productsHtml = '';
                        response.forEach(function(product) {
                            let categoryName = categoryMap[product.category_id] || 'Uncategorized';
                            productsHtml += `
                                <tr class="text-center">
                                    <td><p class="text-xs font-weight-bold mb-0">${product.name}</p></td>
                                    <td><p class="text-xs font-weight-bold mb-0">${product.ingredients || ''}</p></td>
                                    <td><p class="text-xs font-weight-bold mb-0">${product.price}</p></td>
                                    <td><p class="text-xs font-weight-bold mb-0">${categoryName}</p></td>
                                    <td class="align-middle">
                                        <a type="button"   class="text-primary font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#exampleModal${product.id}">

Edit
<i class="bi bi-pencil"></i>

</a>

<div class="modal fade" id="exampleModal${product.id}" tabindex="-1"
aria-labelledby="exampleModal${product.id}Label${product.id}" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModal${product.id}Label${product.id}">
                Menu
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ url('/admin/update_menu/' . $data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="modal-body">


                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">

                        Name
                    </label>
                    <input type="text" name="name" class="form-control" required value="{{ $data->name }}" placeholder="Name...">
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">

                        Ingredients
                    </label>
                    <textarea type="text" name="ingredients" class="form-control" required placeholder="Ingredients...">{{ $data->ingredients }}</textarea>
                </div>


                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">

                        Price
                    </label>
                    <input type="number" name="price" class="form-control" required value="{{ $data->price }}" placeholder="12.00" step="any">
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">
                        Category
                    </label>
                    <select name="category_id" class="form-select" required>
                        <option value="">Select a category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $data->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>


            </div>


            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-dark">Update
                    <i class="bi bi-pencil"></i>
                </button>

            </div>
        </form>
    </div>
</div>
</div>

                                    </td>

                                    <td class="align-middle">
                                        <a href="/admin/delete_menu/${product.id}" class="text-danger font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Delete menu" onclick="return confirm('Are you sure you want to delete this menu item?')">
                                            Delete
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </td>
                                </tr>`;
                        });

                        if (response.length === 0) {
                            productsHtml += `
                                <tr>
                                    <td colspan="6">
                                        <p class="text-xs text-center text-danger font-weight-bold mb-0">No Data Found!</p>
                                    </td>
                                </tr>`;
                        }

                        $('#menuTable').html(productsHtml);
                    },
                    error: function(xhr, status, error) {
                        console.error("Error: " + error);
                        console.log(xhr);
                    }
                });
            });
        });
        </script>
</body>

</html>
