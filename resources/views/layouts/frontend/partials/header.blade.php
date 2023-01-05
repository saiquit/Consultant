<header>
    <!-- Header Start -->
    <div class="header-area">
        <div class="main-header ">
            <div class="header-top top-bg d-none d-lg-block">
                <div class="container-fluid">
                    <div class="col-xl-12">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="header-info-left">
                                <ul>
                                    {{-- <li><i class="fas fa-map-marker-alt"></i>65/A, 17th floor, Kings land, New York
                                    </li> --}}
                                    <li><i class="fas fa-envelope"></i>office@xpertgroupbd.com</li>
                                    <li><i class="fas fa-phone"></i>+8801602916663</li>
                                </ul>
                            </div>
                            <div class="header-info-right">
                                <ul class="header-social">
                                    <li><a href="https://www.linkedin.com/in/xpertgroup-bd-126524260/"><i class="fab fa-linkedin-in"></i></a></li>
                                    <!-- <li><a href="#"><i class="fab fa-twitter"></i></a></li> -->
                                    <li><a href="https://m.facebook.com/groups/693963552323861/permalink/693968745656675/?mibextid=UUgoR4"><i class="fab fa-facebook-f"></i></a></li>
                                    <!-- <li> <a href="#"><i class="fab fa-google-plus-g"></i></a></li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom  header-sticky">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-2 col-lg-1 col-md-1">
                            <div class="logo">
                                <a href="{{ route('home', []) }}"><img src="{{ asset('f/assets/img/logo/logo.png') }}"
                                        alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-8 col-md-8">
                            <!-- Main-menu -->
                            <div class="main-menu f-right d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="{{ route('home', []) }}">Home</a></li>
                                        <li><a href="{{ route('about', []) }}">About</a></li>
                                        <li><a href="{{ route('services.index', []) }}">Services</a></li>
                                        @auth
                                            <li><a class="text-info" href="{{ route('admin.home', []) }}">Dashboard</a></li>
                                            <li><a href="{{ route('logout', []) }}"
                                                    onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">Logout</a>
                                            </li>
                                            <form id="frm-logout" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        @else
                                            <li><a href="{{ route('login', []) }}">Login | Register</a></li>
                                        @endauth
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-md-3">
                            <div class="header-right-btn f-right d-none d-lg-block">
                                <a href="#request-back-area" class="btn header-btn">Contact Now</a>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>
