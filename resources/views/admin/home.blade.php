<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
</head>

<body class="g-sidenav-show   bg-gray-100">

    @include('admin.sidebar')

    <main class="main-content position-relative border-radius-lg ">
        @include('admin.navbar')

        <div class="container-fluid py-4">

            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
                    <!-- First row of four cards -->
                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Number of Reservations</p>
                                        <h5 class="font-weight-bolder">{{ $total_reservations }}</h5>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle d-inline-block" style="width: 50px">
                                            <i class="bi bi-calendar-date-fill text-lg opacity-10" aria-hidden="true"></i>

                                        </div>
                                      </div>



                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Number of Reservations Today</p>
                                        <h5 class="font-weight-bolder">{{ $total_reservations_today }}</h5>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle d-inline-block" style="width: 50px">
                                            <i class="bi bi-calendar-date-fill text-lg opacity-10" aria-hidden="true"></i>

                                        </div>
                                      </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Team Members</p>
                                        <h5 class="font-weight-bolder">{{ $total_team_members }}</h5>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle d-inline-block" style="width: 50px">
                                            <i class="bi bi-people-fill text-lg opacity-10" aria-hidden="true"></i>

                                        </div>
                                      </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Menu Items</p>
                                        <h5 class="font-weight-bolder">{{ $total_menus }}</h5>
                                    </div>
                                    <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                        <i class="bi bi-menu-up"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Example for one additional card -->
                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Retail Menu Items</p>
                                        <h5 class="font-weight-bolder">{{ $total_retail_menus }}</h5>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <div class="icon icon-shape bg-gradient-info shadow-info text-center rounded-circle d-inline-block" style="width: 50px">
                                            <i class="bi bi-menu-up"></i>

                                        </div>
                                      </div>


                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Categories</p>
                                        <h5 class="font-weight-bolder">{{ $total_categories }}</h5>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle d-inline-block" style="width: 50px">
                                            <i class="bi bi-bookmarks-fill"></i>

                                        </div>
                                      </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Number of people that Reserved Today</p>
                                        <h5 class="font-weight-bolder">{{ $nb_people_reserved_tdy }}</h5>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle d-inline-block" style="width: 50px">
                                          <i class="bi bi-people"></i>
                                        </div>
                                      </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Admins</p>
                                        <h5 class="font-weight-bolder">{{ $total_admins }}</h5>
                                    </div>
                                    <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                        <i class="bi bi-person-fill-gear"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row mt-4">
                <div class="col-lg-12 mb-lg-0 mb-4">
                    @include('admin.home-users')
                </div>
            </div>


            @include('admin.footer')
        </div>
    </main>


    @include('admin.script')


</body>

</html>
