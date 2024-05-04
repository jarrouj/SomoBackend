<a type="button"   class="text-primary font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $data->id }}">

    Edit
    <i class="bi bi-pencil"></i>

</a>

<div class="modal fade" id="exampleModal{{ $data->id }}" tabindex="-1"
    aria-labelledby="exampleModal{{ $data->id }}Label{{ $data->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModal{{ $data->id }}Label{{ $data->id }}">
                    Location
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('/admin/update_location/' . $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-body">



                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">

                            Email
                        </label>
                        <input type="email" name="email" class="form-control" required value="{{ $data->email }}" placeholder="somo@emaple.com">
                    </div>


                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">
                            Address
                        </label>
                        <textarea type="text" name="address" class="form-control" required placeholder="Address...">{{ $data->address }}</textarea>
                    </div>


                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">

                            Country
                        </label>
                        <input type="text" name="country" class="form-control"  value="{{ $data->country }}" placeholder="Lebanon">
                    </div>


                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">

                            Phone Number
                        </label>
                        <input type="number" name="phone_number" class="form-control" required value="{{ $data->phone_number }}" placeholder="Phone Number">
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">

                           Location Link
                        </label>
                        <input type="text" name="location_link" class="form-control" value="{{ $data->location_link }}" placeholder="https://example.com">
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
