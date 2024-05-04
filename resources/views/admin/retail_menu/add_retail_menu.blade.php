<button type="button" class="btn btn-dark mt-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
    <i class="me-2 fs-6 bi bi-plus-lg"></i>
    Add Retail Menu
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Retail Menu
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('/admin/add_retail_menu') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-body">


                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">

                            Name
                        </label>
                        <input type="text" name="name" class="form-control" required placeholder="Name...">
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">

                            Ingredients
                        </label>
                        <textarea type="text" name="ingredients" class="form-control" required placeholder="Ingredients..."></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">

                            Price
                        </label>
                        <input type="number" name="price" class="form-control" required placeholder="12.00" step="any">
                    </div>



                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">
                            Category
                        </label>
                        <select name="category_id" class="form-select" required>
                            <option value="">Select a category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-dark">Add
                        <i class="bi bi-plus-lg"></i>
                    </button>

                </div>
            </form>
        </div>
    </div>
</div>
