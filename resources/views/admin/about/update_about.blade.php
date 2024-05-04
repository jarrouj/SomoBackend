{{-- <a type="button"   class="text-primary font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $data->id }}">

    Edit
    <i class="bi bi-pencil"></i>

</a> --}}

<div class="row mb-3">
    <div class="col-12">
        <div class="d-flex justify-content-center">

            <a type="button"   class="text-primary font-weight-bold text-xs btn btn-dark mt-3 text-light" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $about->id }}">
                <i class="bi bi-pencil"></i>

                Update

            </a>

        </div>
    </div>
</div>


<div class="modal fade" id="exampleModal{{ $about->id }}" tabindex="-1"
    aria-labelledby="exampleModal{{ $about->id }}Label{{ $about->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModal{{ $about->id }}Label{{ $about->id }}">
                    About
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('/admin/update_about/' . $about->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-body">

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">
                            Image
                        </label>
                        <div>
                            <img src="/about/{{ $about->img }}" alt="about Image" style="width: 50%; height: auto;">
                        </div>
                        <div style="margin-top: 10px;">
                            <input type="file" name="img" class="form-control" id="exampleFormControlInput1" >
                        </div>
                    </div>


                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">

                           Title
                        </label>
                        <input type="text" name="title" class="form-control" placeholder=" Title..." required value="{{ $about->title }}">
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">

                           Text
                        </label>
                        <textarea type="text" name="text" class="form-control" placeholder=" Text..." required>{{ $about->title }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">

                           Why Us
                        </label>
                        <textarea type="text" name="whyus" class="form-control" placeholder="Why Us..." >{{ $about->whyus }}</textarea>
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
