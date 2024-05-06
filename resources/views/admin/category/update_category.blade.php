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
                    Category
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('/admin/update_category/' . $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-body">

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">

                           Category Name
                        </label>
                        <input type="text" name="name" class="form-control" placeholder="Catyegory Name..." required value="{{ $data->name }}">
                    </div>

                    <div class="mb-3">
                        <label for="location" class="form-label">Location</label>
                        <select name="location_id" class="form-select" required>
                            @if ($locCat->where('category_id', $data->id)->count() === 1)
                                @foreach ($locations as $location)
                                    <option value="{{ $location->id }}" {{ $locCat->where('category_id', $data->id)->first()->location_id == $location->id ? 'selected' : '' }}>
                                        {{ $location->country }}
                                    </option>
                                @endforeach
                            @else
                                <option selected value="0">All Countries</option>
                                @foreach ($locations as $location)
                                    <option value="{{ $location->id }}">{{ $location->country }}</option>
                                @endforeach
                            @endif
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
