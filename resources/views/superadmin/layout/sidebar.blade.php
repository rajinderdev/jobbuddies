<!DOCTYPE html>
<html lang="en">

<head>
    <title>Job Buddies</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500&display=swap"
        rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">

    <!--Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />

    <!--Datatable-->
    <link rel="stylesheet" href="{{asset('assets/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/responsive.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/buttons.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/dataTables.checkboxes.css') }}">
    <!-- Custom styles for this template-->
    <link href="{{asset('assets/css/custom.css?ver=0.0.8')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />
</head>

<body>

    <!-- Page Wrapper -->
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <!-- Sidebar - Brand -->
                        <a class="sidebar-brand d-none d-lg-block align-items-center justify-content-center"
                            href="#">
                            <img src="{{asset('assets/frontend/images/logo.png')}}" class="img-fluid" alt="logo">
                        </a>

                        <a class="{{ (request()->is('admin/dashboard')) ? 'nav-link active' : 'nav-link' }}" href="{{ route('superadmin.dashboard') }}">
                            <div class="sb-nav-link-icon">
                                <!-- <img src="imgs/dash.png" alt="bar-icon"> -->
                                <!-- <img src="imgs/menu-icon/dashboard.svg" alt="image"> -->
                                <svg height="24" viewBox="0 96 720 720" width="24" version="1.1" id="svg4"
                                    sodipodi:docname="2550e332124d7d8482cbdf6ebee23de4.svg"
                                    xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
                                    xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg">
                                    <defs id="defs8" />
                                    <sodipodi:namedview id="namedview6" pagecolor="#ffffff" bordercolor="#666666"
                                        borderopacity="1.0" inkscape:pageshadow="2" inkscape:pageopacity="0.0"
                                        inkscape:pagecheckerboard="0" />
                                    <path
                                        d="M 390,366 V 96 H 720 V 366 Z M 0,486 V 96 H 330 V 486 Z M 390,816 V 426 H 720 V 816 Z M 0,816 V 546 H 330 V 816 Z M 60,426 H 270 V 156 H 60 Z M 450,756 H 660 V 486 H 450 Z m 0,-450 H 660 V 156 H 450 Z M 60,756 H 270 V 606 H 60 Z M 270,426 Z M 450,306 Z m 0,180 z M 270,606 Z"
                                        id="path2" />
                                </svg>
                            </div>
                            <span class="menu-text">Dashboard</span>
                        </a>
                        @if(Auth::user()->role==\App\Models\User::SUPER_ADMIN)
                            <a class="{{ (request()->is('admin/teachers')) ? 'nav-link active' : 'nav-link' }}" href="{{ route('superadmin.interviewers.index') }}">
                                <div class="sb-nav-link-icon">
                                    <!-- <img src="imgs/candidates.png" alt="bar-icon"> -->
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                        <path
                                            d="M479.736-220Q622-220 721-319.344T820-560q0-39.102-8.5-75.051Q803-671 788-704q-28 21-60.609 32.5Q694.783-660 660-660q-55 0-101.5-28T480-761q-32 45-78.5 73T300-660q-34.783 0-67.391-11.5Q200-683 172-704q-15 33-23.5 69.5T140-560q0 141.312 99.267 240.656Q338.533-220 479.736-220ZM354.225-463Q377-463 392.5-478.725q15.5-15.726 15.5-38.5Q408-540 392.275-555.5q-15.726-15.5-38.5-15.5Q331-571 315.5-555.275q-15.5 15.726-15.5 38.5Q300-494 315.725-478.5q15.726 15.5 38.5 15.5Zm253 0Q630-463 645.5-478.725q15.5-15.726 15.5-38.5Q661-540 645.275-555.5q-15.726-15.5-38.5-15.5Q584-571 568.5-555.275q-15.5 15.726-15.5 38.5Q553-494 568.725-478.5q15.726 15.5 38.5 15.5ZM300-720q63 0 106.5-43.5T450-870v-29q-77 7-141 44.5T203-757q20 17 44.839 27 24.838 10 52.161 10Zm360 0q27.323 0 52.161-10Q737-740 757-757q-42-60-106-97.5T510-899v29q0 63 43.5 106.5T660-720ZM66-80q-26.145 0-44.072-19.5Q4-119 6-145l38-417q8-84 45.5-157t96-126.5q58.5-53.5 134-84T480-960q85 0 160.5 30.5t134 84Q833-792 870.5-719T916-562l38 417q2 26-15.928 45.5Q920.145-80 894-80H66Zm413.948-80Q342-160 235.5-243T94-454L66-140h828l-28-314q-35 128-141 211t-245.052 83ZM510-899Zm-60 0Zm29.948 759H894 66h413.948Z" />
                                    </svg>
                                </div>
                                <span class="menu-text">Interviewers</span>
                            </a>
                        @endif
                        <a class="{{ (request()->is('admin/kids')) ? 'nav-link active' : 'nav-link' }}" href="{{ route('superadmin.candidate.index') }}">
                            <div class="sb-nav-link-icon">
                                <!-- <img src="imgs/candidates.png" alt="bar-icon"> -->
                                <svg height="24" viewBox="0 96 720 720" width="24" version="1.1" id="svg4"
                                    sodipodi:docname="865313bbb36baa0af284c674af01bd60.svg"
                                    xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
                                    xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg">
                                    <defs id="defs8" />
                                    <sodipodi:namedview id="namedview6" pagecolor="#ffffff" bordercolor="#666666"
                                        borderopacity="1.0" inkscape:pageshadow="2" inkscape:pageopacity="0.0"
                                        inkscape:pagecheckerboard="0" />
                                    <path
                                        d="m 464,434 q -19,0 -32,-13 -13,-13 -13,-32 0,-19 13,-32 13,-13 32,-13 19,0 32,13 13,13 13,32 0,19 -13,32 -13,13 -32,13 z m -209,0 q -19,0 -32,-13 -13,-13 -13,-32 0,-19 13,-32 13,-13 32,-13 19,0 32,13 13,13 13,32 0,19 -13,32 -13,13 -32,13 z m 105,216 q -56,0 -102,-30 -46,-30 -72,-79 h 348 q -26,49 -72,79 -46,30 -102,30 z m 0,166 Q 286,816 220.5,787.5 155,759 106,710 57,661 28.5,595.5 0,530 0,456 0,382 28.5,316.5 57,251 106,202 155,153 220.5,124.5 286,96 360,96 434,96 499.5,124.5 565,153 614,202 663,251 691.5,316.5 720,382 720,456 720,530 691.5,595.5 663,661 614,710 565,759 499.5,787.5 434,816 360,816 Z m 0,-60 Q 483,756 571.5,668.5 660,581 660,458 660,335 573,243 486,151 358,151 h -18 q -7,0 -18,1 -2,8 -3.5,19 -1.5,11 -1.5,19 0,25 16.5,41.5 16.5,16.5 41.5,16.5 12,0 20,-1.5 8,-1.5 15,-1.5 10,0 17,5 7,5 7,15 0,16 -15,24.5 -15,8.5 -44,8.5 -46,0 -77,-31 -31,-31 -31,-77 0,-5 0.5,-13 0.5,-8 2.5,-13 Q 179,197 119.5,274 60,351 60,454 60,577 148.5,666.5 237,756 360,756 Z m 0,-302 z"
                                        id="path2" />
                                </svg>
                            </div>
                            <span class="menu-text">Our Candidates</span>
                        </a>
                        <a class="{{ (request()->is('admin/plans')) ? 'nav-link active' : 'nav-link' }}" href="{{ route('superadmin.plans.index') }}">
                            <div class="sb-nav-link-icon">
                                <svg height="24" viewBox="0 96 400 800" width="24" version="1.1" id="svg4"
                                    sodipodi:docname="5dedfc07a36042049981de6629d68d42.svg"
                                    xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
                                    xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg">
                                    <defs id="defs8" />
                                    <sodipodi:namedview id="namedview6" pagecolor="#ffffff" bordercolor="#666666"
                                        borderopacity="1.0" inkscape:pageshadow="2" inkscape:pageopacity="0.0"
                                        inkscape:pagecheckerboard="0" />
                                    <path
                                        d="m 0,96 h 400 v 333 q 0,23 -11.316,42.149 Q 377.368,490.298 357,502 l -141,82 26,97 H 376 L 267,762 309,896 200,815 90,896 132,762 23,681 H 158.111 L 183,584 43,502 Q 22.632,490.298 11.316,471.149 0,452 0,429 Z m 60,60 v 273 q 0,7 4.5,13 4.5,6 13.5,11 l 96,53 V 156 Z m 280,0 H 234 v 350 l 88,-53 q 9,-5 13.5,-11 4.5,-6 4.5,-13 z M 204,339 Z m -30,-8 z m 60,0 z"
                                        id="path2" />
                                </svg>
                            </div>
                            <span class="menu-text">Plans</span>
                        </a>
                       
                        @if(Auth::user()->role==\App\Models\User::SUPER_ADMIN)
                        
                        <div class="has_dropdown">
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6 5V4C6 2.34315 7.34315 1 9 1H15C16.6569 1 18 2.34315 18 4V5H20C21.6569 5 23 6.34315 23 8V20C23 21.6569 21.6569 23 20 23H4C2.34315 23 1 21.6569 1 20V8C1 6.34315 2.34315 5 4 5H6ZM8 4C8 3.44772 8.44772 3 9 3H15C15.5523 3 16 3.44772 16 4V5H8V4ZM19.882 7H4.11803L6.34164 11.4472C6.51103 11.786 6.8573 12 7.23607 12H11C11 11.4477 11.4477 11 12 11C12.5523 11 13 11.4477 13 12H16.7639C17.1427 12 17.489 11.786 17.6584 11.4472L19.882 7ZM11 14H7.23607C6.09975 14 5.06096 13.358 4.55279 12.3416L3 9.23607V20C3 20.5523 3.44772 21 4 21H20C20.5523 21 21 20.5523 21 20V9.23607L19.4472 12.3416C18.939 13.358 17.9002 14 16.7639 14H13C13 14.5523 12.5523 15 12 15C11.4477 15 11 14.5523 11 14Z" fill="#0F0F0F"/>
                                    </svg>
                                </div>
                                Jobs
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts2" aria-labelledby="headingTwo"
                            data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="{{ (request()->is('school-management/jobs')) ? 'nav-link active' : 'nav-link' }}" href="{{ route('superadmin.jobs.index') }}">Job List</a>
                                    <a class="{{ (request()->is('school-management/candidates')) ? 'nav-link active' : 'nav-link' }}" href="{{ route('superadmin.candidates.index') }}">Candidate List</a>
                                </nav>
                            </div>
                        </div>

                        
                        @endif
                        <a class="{{ (request()->is('admin/zoom-call')) ? 'nav-link active' : 'nav-link' }}" href="{{ route('superadmin.meetings.index') }}">
                            <div class="sb-nav-link-icon">
                                <svg height="24" viewBox="0 96 400 800" width="24" version="1.1" id="svg4"
                                    sodipodi:docname="5dedfc07a36042049981de6629d68d42.svg"
                                    xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
                                    xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg">
                                    <defs id="defs8" />
                                    <sodipodi:namedview id="namedview6" pagecolor="#ffffff" bordercolor="#666666"
                                        borderopacity="1.0" inkscape:pageshadow="2" inkscape:pageopacity="0.0"
                                        inkscape:pagecheckerboard="0" />
                                    <path
                                        d="m 0,96 h 400 v 333 q 0,23 -11.316,42.149 Q 377.368,490.298 357,502 l -141,82 26,97 H 376 L 267,762 309,896 200,815 90,896 132,762 23,681 H 158.111 L 183,584 43,502 Q 22.632,490.298 11.316,471.149 0,452 0,429 Z m 60,60 v 273 q 0,7 4.5,13 4.5,6 13.5,11 l 96,53 V 156 Z m 280,0 H 234 v 350 l 88,-53 q 9,-5 13.5,-11 4.5,-6 4.5,-13 z M 204,339 Z m -30,-8 z m 60,0 z"
                                        id="path2" />
                                </svg>
                            </div>
                            <span class="menu-text">Zoom Call</span>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
  <div id="sidebar-overlay"></div>
    <nav class="sb-topnav navbar navbar-expand navbar-white">

        <!-- navbar - Brand -->
        <a class="nabr-brand ml-3 d-lg-none d-block align-items-center justify-content-center"
            href="{{route('superadmin.dashboard')}}">
            <img src="{{asset('assets/frontend/images/logo.png')}}" class="img-fluid" alt="logo">
        </a>

        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-xl-0 me-0 me-xl-4 ms-0 ms-xl-3" id="sidebarToggle"
            href="#!">
            <i class="fa fa-bars fa-2x text-danger"></i>
            <i class="fas fa-times fa-2x text-danger d-none"></i>
        </button>

        <!--Page Title-->
        <div class="page-title d-none d-xl-inline-block">
            <h4 class="mb-0 fw-semi">{{ $pageTitle }}</h4>
        </div>

        <!-- Navbar-->
        <ul class="navbar-nav profile-dropdown ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <li class="nav-item dropdown">
                
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    @php
                   
                    if (Auth::user()->image && file_exists(public_path('storage/images/'.Auth::user()->image))) {
                        $profileImage = asset('storage/images/'.Auth::user()->image);
                     }
                     else{
                        $profileImage =asset('assets/imgs/login-profile.png');
                     }
                       
                    @endphp
                    <img class="img-profile rounded-circle" alt="" src="{{$profileImage}}">
                </a>
                <ul class="dropdown-menu dropdown-menu-right shadow-sm border-0" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{ route('superadmin.settings.profile') }}">Settings</a></li>
                    <li><a class="dropdown-item" href="{{ route('superadmin.logout') }}">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <!-- End of Page Wrapper -->