<div class="min-height-300 bg-dark position-absolute w-100"></div>
<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header mb-3">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="" href="{{ url('/') }}">
            <img src="/logo/2.png" width="200px" class="d-block mx-auto p-3" alt="main_logo">
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">

            <li class="nav-item">
                <a class="nav-link rounded-3 {{ 'admin' == request()->path() ? 'main-color' : '' }}"
                    href="{{ url('/admin') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link rounded-3 {{ 'admin/show_user' == request()->path() ? 'main-color' : '' }}"
                    href="{{ url('/admin/show_user') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-users text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Users</span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link rounded-3 {{ 'admin/show_landing' == request()->path() ? 'main-color' : '' }}"
                    href="{{ url('/admin/show_landing') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="bi bi-house-door-fill text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Landing</span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link rounded-3 {{ 'admin/show_about' == request()->path() ? 'main-color' : '' }}"
                    href="{{ url('/admin/show_about') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="bi bi-info-circle text-primary text-sm opacity-10"></i>

                    </div>
                    <span class="nav-link-text ms-1">About</span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link rounded-3 {{ 'admin/show_category' == request()->path() ? 'main-color' : '' }}"
                    href="{{ url('/admin/show_category') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="bi bi-bookmarks-fill text-danger text-sm opacity-10"></i>

                    </div>
                    <span class="nav-link-text ms-1">Category</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link rounded-3 {{ 'admin/show_mission' == request()->path() ? 'main-color' : '' }}"
                    href="{{ url('/admin/show_mission') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="bi bi-kanban-fill text-success text-sm opacity-10"></i>

                    </div>
                    <span class="nav-link-text ms-1">Mission</span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link rounded-3 {{ 'admin/show_opening' == request()->path() ? 'main-color' : '' }}"
                    href="{{ url('/admin/show_opening') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="bi bi-door-open-fill text-primary text-sm opacity-10"></i>

                    </div>
                    <span class="nav-link-text ms-1">Opening</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link rounded-3 {{ 'admin/show_menu' == request()->path() ? 'main-color' : '' }}"
                    href="{{ url('/admin/show_menu') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        {{-- <i class="bi bi-collection text-danger text-sm opacity-10"></i> --}}
                        <i class="bi bi-menu-down text-success text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Menu</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link rounded-3 {{ 'admin/show_retail_menu' == request()->path() ? 'main-color' : '' }}"
                    href="{{ url('/admin/show_retail_menu') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        {{-- <i class="bi bi-collection text-danger text-sm opacity-10"></i> --}}
                        <i class="bi bi-menu-down text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Retail Menu</span>
                </a>
            </li>



            <li class="nav-item">
                <a class="nav-link rounded-3 {{ 'admin/show_gallery' == request()->path() ? 'main-color' : '' }}"
                    href="{{ url('/admin/show_gallery') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="bi bi-file-earmark-image-fill text-warning text-sm opacity-10"></i>

                    </div>
                    <span class="nav-link-text ms-1">Gallery</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link rounded-3 {{ 'admin/show_reservation' == request()->path() ? 'main-color' : '' }}"
                    href="{{ url('/admin/show_reservation') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="bi bi-file-earmark-image-fill text-primary text-sm opacity-10"></i>

                    </div>
                    <span class="nav-link-text ms-1">Reservation</span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link rounded-3 {{ 'admin/show_team' == request()->path() ? 'main-color' : '' }}"
                    href="{{ url('/admin/show_team') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="bi bi-people-fill text-primary text-sm opacity-10"></i>

                    </div>
                    <span class="nav-link-text ms-1">Team</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link rounded-3 {{ 'admin/show_wwd' == request()->path() ? 'main-color' : '' }}"
                    href="{{ url('/admin/show_wwd') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="bi bi-question-square-fill text-success text-sm opacity-10"></i>

                    </div>
                    <span class="nav-link-text ms-1">WWD</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link rounded-3 {{ 'admin/show_location' == request()->path() ? 'main-color' : '' }}"
                    href="{{ url('/admin/show_location') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="bi bi-geo-alt-fill text-danger text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Location</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link rounded-3 {{ 'admin/show_category_location' == request()->path() ? 'main-color' : '' }}"
                    href="{{ url('/admin/show_category_location') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="bi bi-geo-alt-fill text-danger text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Location Category</span>
                </a>
            </li>




            <li class="nav-item">
                <a class="nav-link rounded-3 {{ 'admin/show_blog' == request()->path() ? 'main-color' : '' }}"
                    href="{{ url('/admin/show_blog') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        {{-- <i class="bi bi-collection text-danger text-sm opacity-10"></i> --}}
                        <i class="bi bi-blockquote-right text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Blog</span>
                </a>
            </li>



            <li class="nav-item">
                <a class="nav-link rounded-3 {{ 'admin/show_social' == request()->path() ? 'main-color' : '' }}"
                    href="{{ url('/admin/show_social') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="bi bi-share fs-6 text-sm opacity-10" style="color:rgb(47, 194, 182)"></i>
                    </div>
                    <span class="nav-link-text ms-1">Social Media</span>
                </a>
            </li>

        </ul>
    </div>

    <div class="sidenav-footer mx-3 ">
        <div class="card card-plain shadow-none" id="sidenavCard">
            <div class="card-body text-center p-3 w-100 pt-0">
                <div class="docs-info">
                    <p class="text-xs font-weight-bold mt-2 mb-5">
                        <i class="bi bi-arrow-down"></i>
                        Scroll down for more
                        <i class="bi bi-arrow-down"></i>
                    </p>
                    <h6 class="mb-0">Need help?</h6>
                    <p class="text-xs font-weight-bold mb-0">Don't hesitate to contact us</p>
                </div>
            </div>
        </div>
        <a href="" target="_blank" class="btn btn-dark btn-sm w-100 mb-3">
            <i class="bi bi-telephone fs-6 me-1"></i>
            Call
        </a>
    </div>
</aside>
