<button type="button" class="btn btn-dark mt-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
    <i class="me-2 fs-6 bi bi-plus-lg"></i>
    Add Location
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Location
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('/admin/add_location') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-body">

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">

                            Email
                        </label>
                        <input type="email" name="email" class="form-control" required placeholder="somo@example.com">
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">

                            Address
                        </label>
                        <textarea type="text" name="address" class="form-control" required placeholder="Address..."></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">

                            Country
                        </label>
                        <input type="text" name="country" class="form-control"  placeholder="Lebanon">
                    </div>


                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">

                            Phone Number
                        </label>
                        <input type="number" name="phone_number" class="form-control" required placeholder="Phone Number">
                    </div>



                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">

                           Location Link
                        </label>
                        <input type="text" name="location_link" class="form-control"  placeholder="https://example.com">
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
