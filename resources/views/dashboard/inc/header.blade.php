<header>
    <nav class="navbar navbar-expand-lg border-bottom align-items-center sticky-top" aria-label="Offcanvas navbar large">
        <div class="container">
            <a class="navbar-brand" href="{{route('home')}}"><img src="{{ asset('assets/frontend/images/logo.png') }}" alt="logo " width="150"></a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar2" aria-controls="offcanvasNavbar2">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end text-bg-red" tabindex="-1" id="offcanvasNavbar2" aria-labelledby="offcanvasNavbar2Label">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbar2Label"><img width="200px" src="{{ asset('assets/frontend/images/logo.png') }}" alt="logo"></h5>
                    <button type="button" class="btn-close btn-close-dark" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav align-items-lg-center justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('home')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('aboutUs')}}">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('privacyPolicy')}}">Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('resources')}}">Resources</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contactUs')}}">Contact Us</a>
                        </li>

                        @if(Auth::check() && Auth::user())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <!-- <a class="dropdown-item" href="/logout" wire:click.prevent="logout">Logout</a> -->
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                                </li>
                            </ul>
                        </li>

                        @else
                        <form>
                            <a id="menu-btn" class="btn btn-lg mt-md-0 mt-sm-3 text-white" type="button" href="/login" wire:navigate>Log In</a>
                            <a id="menu-btn-secondary" class="btn btn-lg mt-md-0 mt-sm-3 text-white" type="button" href="/register" wire:navigate>Sign Up</a>
                        </form>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>