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
                    Category Location
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('/admin/update_loc_cat/' . $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                  <div class="mb-3">
                        <label for="category" class="form-label">Category Name</label>
                        <select name="category_id" class="form-select" required>
                             @foreach ($categories as $category)
                             <option value="{{ $category->id }}" {{ $category->id == $data->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="location" class="form-label">Location</label>
                        <select name="location_id" class="form-select" required>
                            <option disabled selected>Select a Location</option>
                            @foreach ($locations as $location)
                            <option value="{{ $location->id }}" {{ $location->id == $data->id ? 'selected' : '' }}>
                                {{ $location->country }}
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
