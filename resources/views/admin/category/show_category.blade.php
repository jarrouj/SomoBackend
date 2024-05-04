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
                            <h6>Categories</h6>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="d-flex justify-content-center">

                                    @include('admin.category.add_category')

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="d-block w-50 m-auto">
                                    <form action="{{ url('/admin/search_category') }}" method="GET">
                                        @csrf
                                        <p for="" class="text-center form-label">Product Name
                                        </p>

                                        <div class="d-flex justify-content-center">

                                            <div class="input-group mb-3 w-75">

                                                <input type="text" name="query" class="form-control"
                                                    placeholder="Product name" style="height: 41px " id="searchInput">

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
                                                Category Name
                                            </th>



                                            <th class="text-secondary opacity-7"></th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="menuTable">
                                        @forelse ($category as $data)
                                            <tr class="text-center">

                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $data->name }}
                                                    </p>
                                                </td>



                                                <td class="align-middle">
                                                  @include('admin.category.update_category')
                                                </td>

                                                <td class="align-middle">
                                                    <a href="{{ url('admin/delete_category', $data->id) }}"
                                                        class="text-danger font-weight-bold text-xs"
                                                        data-toggle="tooltip" data-original-title="Edit category"
                                                        onclick="return confirm('Are you sure you want to delete this category?')">
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
                                {{ $category->render('admin.pagination') }}
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


            $('#searchInput').on('keyup', function() {
                var searchInput = $(this).val();
                $.ajax({
                    url: '{{ url('admin/search_category') }}',
                    type: 'GET',
                    data: { query: searchInput },
                    success: function(response) {
                        let productsHtml = '';
                        response.forEach(function(product) {

                            productsHtml += `
                                <tr class="text-center">
                                    <td><p class="text-xs font-weight-bold mb-0">${product.name}</p></td>
                                    <td class="align-middle">
                                        <a type="button" class="text-primary font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#editModal${product.id}">
                                            Edit <i class="bi bi-pencil"></i>
                                        </a>

                                        <!-- Modal for Editing -->
                                        <div class="modal fade" id="editModal${product.id}" tabindex="-1" aria-labelledby="editModalLabel${product.id}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel${product.id}">Edit Category</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="/admin/update_category/${product.id}" method="POST" enctype="multipart/form-data">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label for="name${product.id}" class="form-label">Category Name</label>
                                                                <input type="text" class="form-control" id="name${product.id}" name="name" placeholder="Category Name..." required value="${product.name}">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-dark">Update <i class="bi bi-pencil"></i></button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <a href="/admin/delete_menu/${product.id}" class="text-danger font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Delete menu" onclick="return confirm('Are you sure you want to delete this menu item?')">
                                            Delete <i class="bi bi-trash"></i>
                                        </a>
                                    </td>
                                </tr>`;
                        });

                        if (response.length === 0) {
                            productsHtml += '<tr><td colspan="6"><p class="text-xs text-center text-danger font-weight-bold mb-0">No Data Found!</p></td></tr>';
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
