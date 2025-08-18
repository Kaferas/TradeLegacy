@extends('template')

@section('tab_name', 'Agriculture & Market Access')

@section('content')
    <style>
        .testimonial-item {
            transition: all 0.3s ease;
        }

        .testimonial-item:hover .team-popover {
            display: block !important;
        }

        .team-popover {
            transition: all 0.3s ease;
            border: 1px solid #dee2e6;
        }
    </style>
    <div class="container-fluid about py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5">
                    <div class="h-100" style="border: 50px solid; border-color: transparent #1CCB0E transparent #1CCB0E;">
                        <img src="{{ asset('assets/img/err.png') }}" class="img-fluid w-100 h-100" alt="">
                    </div>
                </div>
                <div class="col-lg-7"
                    style="background: linear-gradient(rgba(255, 255, 255, .8), rgba(255, 255, 255, .8)), url({{ asset('assets/img/about-img-1.png') }});">
                    <h5 class="section-about-title pe-3">About Us</h5>
                    <h1 class="mb-4">Welcome to <span class="text-primary">Trade Legacy</span></h1>
                    <p class="mb-4">A prosperous Burundi where farmers thrive, youth lead innovation, and sustainable
                        agriculture drives inclusive economic growth across borders.</p>
                    <p class="mb-4">To empower farmers with knowledge, resources, and access to markets through
                        sustainable farming practices, modern technologies, and strategic partnerships—creating a lasting
                        legacy of trade and prosperity.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-light service py-5">
        <div class="container py-5">
            <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                <h5 class="section-title px-3">Services</h5>
                <h1 class="mb-0">Our Services</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="row g-4">
                        <div class="col-12">
                            <div
                                class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 pe-0">
                                <div class="service-content text-end">
                                    <h5 class="mb-4"> Agricultural Transformation</h5>
                                    <p class="mb-0">Training in modern farming techniques (e.g., irrigation, soil
                                        conservation) Transition support from subsistence to commercial farming
                                        Environmental sustainability advocacy
                                    </p>
                                </div>
                                <div class="service-icon p-4">
                                    <i class="fa fa-globe fa-4x text-primary"></i>
                                </div>
                            </div>
                        </div>
                         <div class="col-12">
                            <div
                                class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 ps-0">
                                <div class="service-icon p-4">
                                    <i class="fa fa-user fa-4x text-primary"></i>
                                </div>
                                <div class="service-content">
                                    <h5 class="mb-4">Market Access & Trade Facilitation</h5>
                                    <p class="mb-0">Connecting farmers to local and regional markets Leveraging AfCFTA and
                                        trade platforms for cross-border opportunities Providing real-time market data and
                                        price insights
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row g-4">

                                                <div class="col-12">
                            <div
                                class="service-content-inner d-flex align-items-center  bg-white border border-primary rounded p-4 pe-0">
                                <div class="service-content text-end">
                                    <h5 class="mb-4">Capacity Building & Education</h5>
                                    <p class="mb-0">Farmer training programs and workshops Peer learning and cross-border
                                        experience sharing Empowering youth entrepreneurs through mentoring and support
                                    </p>
                                </div>
                                <div class="service-icon p-4">
                                    <i class="fa fa-hotel fa-4x text-primary"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div
                                class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 ps-0">
                                <div class="service-icon p-4">
                                    <i class="fa fa-cog fa-4x text-primary"></i>
                                </div>
                                <div class="service-content">
                                    <h5 class="mb-4"> Supply Chain Optimization</h5>
                                    <p class="mb-0">Supply chain strategy and consulting Solutions for infrastructure and
                                        transportation challenges Digital platforms for secure payments and logistics
                                        tracking
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Services End -->

    <!-- Tour Booking Start -->
    <div class="container-fluid booking py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <h5 class="section-booking-title pe-3">Empowerment</h5>
                    <h1 class="text-white mb-4">Empowering Smallholders</h1>
                    <p class="text-white mb-4">Join our mission to transform agriculture in East Africa. We support
                        smallholder farmers with training, resources, and access to markets for sustainable growth and
                        prosperity.</p>
                    <p class="text-white mb-4">Connect with our team to learn about programs, partnerships, and
                        opportunities for farmers, youth, and agri-entrepreneurs.</p>
                </div>
                <div class="col-lg-6">
                    <h1 class="text-white mb-3">Get Involved</h1>
                    <div class="col-12 text-center text-white jumbotron">
                        <p><strong>We will contact you within 3 working days to discuss next steps</strong></p>
                    </div>
                    <form method="post" action="{{ route('contact.store') }}">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control bg-white border-0" id="name"
                                        placeholder="Your Name" name="customer_name">
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control bg-white border-0" id="email"
                                        placeholder="Your Email" name="customer_mail">
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control bg-white border-0" id="location"
                                        placeholder="Location" name="customer_phone">
                                    <label for="location">Location</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select bg-white border-0" id="interest" name="customer_service">
                                        <option value="training">Farmer Training</option>
                                        <option value="market">Market Access</option>
                                        <option value="youth">Youth Empowerment</option>
                                        <option value="partnership">Partnerships</option>
                                    </select>
                                    <label for="interest">Area of Interest</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control bg-white border-0" placeholder="How can we help you?" id="message" name="message"
                                        style="height: 100px"></textarea>
                                    <label for="message">How can we help you?</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary text-white w-100 py-3" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Tour Booking End -->

    <!-- Testimonial Start -->
    <div class="container-fluid testimonial p-1">
        <div class="container py-5">
            <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                <h5 class="section-title px-3">Our Teams</h5>
                <h1 class="mb-0">Trade Legacy Team</h1>
            </div>
            <div class="testimonial-carousel owl-carousel">
                @foreach ($teams as $team)
                    <div class="testimonial-item text-center rounded pb-4 position-relative">
                        <div class="testimonial-comment bg-light rounded p-4">
                            <p class="text-center mb-5">{{ $team->current_post }}</p>
                        </div>
                        <div class="testimonial-img p-1">
                            <img src="{{ asset('storage/uploads/' . $team->picture_path) }}"
                                class="img-fluid rounded-circle" alt="Image">
                        </div>
                        <div style="margin-top: -15px;">
                            <h5 class="mb-0">{{ $team->name . ' ' . $team->prenom }}</h5>
                            <p class="mb-0">
                                {{ $team->current_post == 'Founder & CEO' ? 'beni.bokim@tradelegacy.org' : 'info@tradelegacy.org' }}
                            </p>
                        </div>
                        <!-- Popover content -->
                        <div class="team-popover position-absolute bg-white p-3 rounded shadow"
                            style="display: none; bottom: -0px; left: 0; right: 0; z-index: 1000;">
                            <h6 class="fw-bold">More Details on : <span
                                    class="text-primary">{{ $team->name . ' ' . $team->prenom }}</span></h6>
                            <hr>
                            <p class="mb-1"><strong>{{ $team->description }}</strong></p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Testimonial End -->

    <!-- Subscribe Start -->
    <div class="container-fluid subscribe py-5">
        <div class="container text-center py-5">
            <div class="mx-auto text-center" style="max-width: 900px;">
                <h3 class="subscribe-title px-3">Subscribe to our Newsletter</h3>
                <br>
                <p class="text-white mb-5">Join our community and be the first to receive the latest news, exclusive offers, and inspiring stories—straight to your inbox.
                </p>
                <div class="position-relative mx-auto">
                    <input class="form-control border-primary rounded-pill w-100 py-3 ps-4 pe-5" type="text"
                        placeholder="Your email">
                    <button type="button"
                        class="btn btn-primary rounded-pill position-absolute top-0 end-0 py-2 px-4 mt-2 me-2">Subscribe</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Subscribe End -->

@endsection
