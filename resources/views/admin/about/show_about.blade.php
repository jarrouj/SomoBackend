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
                            <h6>About Section</h6>
                        </div>

                        <div class="d-flex justify-content-center">
                            <form action="/admin/about" method="POST" enctype="multipart/form-data">
                                @csrf
                                @if($show->about_sh == 1)
                                <input type="hidden"  name="datash" value="0">
                                @endif
                                <div class="form-check form-switch">
                                    <input class="form-check-input {{$show->about_sh == 1 ? 'bg-success' : 'bg-danger' }}" type="checkbox" role="switch" id="flexSwitchCheckDefault"
                                    onchange="this.form.submit()" value="{{ $show->about_sh == 1 ? '0' : '1' }}" name="datash" {{$show->about_sh == 1 ? 'checked' : ''}}>
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Show Section</label>
                                  </div>
                              </form>
                        </div>


                                   @include('admin.about.update_about')






                            <div class="row text-center my-3">
                                <div class="col-6">
                                    <label for="">

                                       Title
                                    </label>
                                    <p>
                                        {{ $about->title }}
                                    </p>
                                </div>

                                <div class="col-6">
                                    <label for="about-image">
                                        Image
                                    </label>
                                    <div>
                                        <img id="about-image" src="/about/{{ $about->img }}" alt="About Image" style="width:50%; height:auto;">

                                    </div>

                                </div>


                            </div>

                            <div class="row text-center my-3">

                                <div class="col-6">
                                    <label for="">

                                       Text
                                    </label>
                                    <p>
                                        {{ $about->text }}
                                    </p>
                                </div>
                                <div class="col-6">
                                    <label for="">

                                       Why Us
                                    </label>
                                    <p>
                                        {{ $about->whyus }}
                                    </p>
                                </div>



                            </div>



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
