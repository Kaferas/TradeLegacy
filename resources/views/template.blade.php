<!DOCTYPE html>
@php
    $contact=App\Models\AdressLocation::first();
    // dd($contact);
@endphp
<html lang="en">


<!-- Mirrored from themewagon.github.io/travela/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 02 Aug 2025 08:47:09 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
        <meta charset="utf-8">
        <title>{{ env("APP_NAME") }} - Tourism Website Template</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com/">
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600&amp;family=Roboto&amp;display=swap" rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="{{ asset('assets/releases/v5.15.4/css/all.css') }}"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons%401.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    </head>

    <body>
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Topbar Start -->
        <div class="container-fluid bg-primary px-5 d-none d-lg-block">
            <div class="row gx-0">
                <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                </div>
                <div class="col-lg-4 text-center text-lg-end">
                    <div class="d-inline-flex align-items-center" style="height: 45px;">
                        <a href="{{ route('login') }}"><small class="me-3 text-light"><i class="fa fa-sign-in-alt me-2"></i>Login</small></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Topbar End -->

        <!-- Navbar & Hero Start -->
        <div class="container-fluid position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
                <a href="#" class="navbar-brand p-0">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="" style="width: 100px; height: 250px;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="{{ route("home") }}" class="nav-item nav-link {{  Route::is('home') ? 'active' : '' }}">Home</a>
                        <a href="{{ route("our_services") }}" class="nav-item nav-link {{  Route::is('our_services') ? 'active' : '' }}">Services</a>
                        <a href="{{ route("blogs") }}" class="nav-item nav-link {{  Route::is('blogs') ? 'active' : '' }}">Blog</a>
                        <a href="{{ route("about") }}" class="nav-item nav-link {{  Route::is('about') ? 'active' : '' }}">About</a>
                        <a href="{{ route("contact_us") }}" class="nav-item nav-link  {{  Route::is('contact_us') ? 'active' : '' }}">Contact</a>
                    </div>
                </div>
            </nav>
            @if (Route::is('home'))
                <div class="carousel-header">
                    <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active"></li>
                            <li data-bs-target="#carouselId" data-bs-slide-to="1"></li>
                            <li data-bs-target="#carouselId" data-bs-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            @foreach ($sliders as $slide)
                                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                <img src="{{ Storage::url('uploads/sliders/' . $slide->image) }}" class="img-fluid" alt="Image">
                                <div class="carousel-caption">
                                    <div class="p-3" style="max-width: 900px;">
                                        <h1 class="display-2 text-capitalize text-white mb-4">{{$slide->title}}</h1>
                                        <p class="mb-5 fs-5">
                                            {!! $slide->description !!}
                                        </p>
                                        {{-- <div class="d-flex align-items-center justify-content-center">
                                            <a class="btn-hover-bg btn btn-primary rounded-pill text-white py-3 px-5" href="#">Discover Now</a>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon btn bg-primary" aria-hidden="false"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                            <span class="carousel-control-next-icon btn bg-primary" aria-hidden="false"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            @endif
        </div>
        <!-- About Start -->
     <div class="container-fluid">
        @yield('content')
     </div>
        <!-- Footer Start -->
        <div class="container-fluid footer py-5">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="mb-4 text-white">Get In Touch</h4>
                            <a href="#"><i class="fas fa-home me-2"></i> {{$contact->adress_location}}</a>
                            <a href="#"><i class="fas fa-envelope me-2"></i> {{$contact->email_adress}}</a>
                            <a href="#"><i class="fas fa-phone me-2"></i> {{$contact->phone_number}}</a>
                            {{-- <a href="#" class="mb-3"><i class="fas fa-print me-2"></i> {{$contact->fax}}</a> --}}
                            <div class="d-flex align-items-center">
                                <i class="fas fa-share fa-2x text-white me-2"></i>
                                <a class="btn-square btn btn-primary rounded-circle mx-1" href="{{ $contact->facebook_link }}"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn-square btn btn-primary rounded-circle mx-1" href="{{ $contact->twitter_link }}"><i class="fab fa-twitter"></i></a>
                                <a class="btn-square btn btn-primary rounded-circle mx-1" href="{{ $contact->youtube_link }}"><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="mb-4 text-white">Company</h4>
                            <a href="#"><i class="fas fa-angle-right me-2"></i> About</a>
                            <a href="#"><i class="fas fa-angle-right me-2"></i> Careers</a>
                            <a href="#"><i class="fas fa-angle-right me-2"></i> Blog</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="mb-4 text-white">Support</h4>
                            <a href="#"><i class="fas fa-angle-right me-2"></i> Contact</a>
                            <a href="#"><i class="fas fa-angle-right me-2"></i> Legal Notice</a>
                            <a href="#"><i class="fas fa-angle-right me-2"></i> Privacy Policy</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->

        <!-- Copyright Start -->
        <div class="container-fluid copyright text-body py-4">
            <div class="container">
                <div class="row g-4 align-items-center">
                    <div class="col-md-6 text-center text-md-end mb-md-0">
                        <i class="fas fa-copyright me-2"></i><a class="text-white" href="#">{{env('APP_NAME')}}</a>, All right reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-start">
                        <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                        <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                        <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                        Designed By <a class="text-white" href="https://itara-nexus.com/">ITARA NEXUS</a>Distributed By <a href="https://itara-nexus.com/">Kaferas</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-primary btn-primary-outline-0 btn-md-square back-to-top"><i class="fa fa-arrow-up"></i></a>


        <!-- JavaScript Libraries -->
        <script src="{{ asset('assets/ajax/libs/jquery/3.6.4/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/npm/bootstrap5/dist/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/lib/easing/easing.min.js') }}"></script>
        <script src="{{ asset('assets/lib/waypoints/waypoints.min.js') }}"></script>
        <script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('assets/lib/lightbox/js/lightbox.min.js') }}"></script>


        <!-- Template Javascript -->
        <script src="{{ asset('assets/js/main.js') }}"></script>
    </body>


<!-- Mirrored from themewagon.github.io/travela/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 02 Aug 2025 08:47:29 GMT -->
</html>
