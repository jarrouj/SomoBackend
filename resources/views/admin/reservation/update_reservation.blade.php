


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
                        <div class="card-header pb-0 ">
                            <a href="{{ url('/admin/show_reservation') }}" class="btn btn-dark">
                                <i class="bi bi-arrow-left"></i>
                                back
                            </a>
                            <h6>Edit Reservation</h6>
                        </div>
                        <div class="card-body px-auto pt-0 pb-2">
                            <form action="{{ url('/admin/update_reservation_confirm', $reservation->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mt-4 row">
                                    <div class="col-4">
                                        <label for="exampleFormControlInput1" class="form-label">
                                            Name
                                        </label>
                                        <div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control" value="{{$reservation->name}}" name="name" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <label for="exampleFormControlInput1" class="form-label">
                                            Phone
                                        </label>
                                        <div>
                                            <div class="mb-3">
                                                <input type="number" class="form-control" value="{{$reservation->phone}}" name="phone" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <label for="exampleFormControlInput1" class="form-label">
                                            Email
                                        </label>
                                        <div>
                                            <div class="mb-3">
                                                <input type="email" class="form-control" value="{{$reservation->email}}" name="email" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="mt-4 row">
                                    <div class="col-4">
                                        <label for="exampleFormControlInput1" class="form-label">
                                            Number of Persons
                                        </label>
                                        <div>
                                            <div class="mb-3">
                                                <input type="number" class="form-control" value="{{ $reservation->number_of_person }}" name="number_of_person" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <label for="exampleFormControlInput1" class="form-label">
                                            Time
                                        </label>
                                        <div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control" value="{{ $reservation->time }}" name="time" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <label for="exampleFormControlInput1" class="form-label">
                                            Comments
                                        </label>
                                        <div>
                                            <div class="mb-3">
                                                <textarea type="text" class="form-control" cols="3" rows="3"  name="comments" disabled>{{ $reservation->comments }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn mt-3 btn-dark">Submit</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            @include('admin.footer')
        </div>
    </main>

    @include('admin.script')

</body>

</html>
