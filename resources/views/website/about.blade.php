@extends("template")

@section("tab_name", "Our Story")


@section('content')
    <div class="container-fluid p-4">
        <div class="container py-5">
    <!-- Title -->
    <div class="text-center mb-5">
        <h1 class="fw-bold text-success">TRADE LEGACY BURUNDI</h1>
        <p class="lead text-muted">
            A Farming Company Empowering Smallholders and Transforming Agriculture in East Africa
        </p>
    </div>

    <!-- Company Overview -->
    <section class="mb-5">
        <h2 class="fw-bold text-success">Company Overview</h2>
        {{-- <p>
            Trade Legacy Burundi is a Burundian farming and agribusiness company and social enterprise founded by
            <strong>Bokim Beni Nihoze</strong> to revolutionize agriculture through sustainability, innovation, and inclusion.
            Operating from Buhiga Province, we specialize in eco-friendly agricultural production, farmer training,
            and agribusiness development with a firm commitment to empowering farmers, who represent over 90% of the
            population in Burundi.
        </p> --}}
        <p>
           Trade Legacy is a Burundian agribusiness company connecting smallholder farmers to better markets, offering hands-on training, and building sustainable food systems. We turn small farms into stronger, profitable businesses.
        </p>
        <p>
            Inspired by the need to better include rural small-scale farmers in development efforts, Bokim made the
            decision to become a farmer himself and establish a platform that supports, trains, and connects this vital
            segment of the population to market opportunities and sustainable livelihoods.
            <strong>Our goal is simple but powerful:</strong> build a farming ecosystem that works for farmers, with farmers.
        </p>
    </section>

    <!-- Mission & Vision -->
    <section class="row mb-5">
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm h-100 border-success">
                <div class="card-body">
                    <h3 class="card-title text-success fw-bold">Mission</h3>
                    <p class="card-text">
                        To build a resilient and profitable farming sector by equipping smallholders and rural youth with
                        sustainable agricultural techniques, post-harvest infrastructure, and access to local and regional markets.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm h-100 border-success">
                <div class="card-body">
                    <h3 class="card-title text-success fw-bold">Vision</h3>
                    <p class="card-text">
                        A thriving and inclusive farming economy in which farmers are equipped, connected, and respected
                        as key drivers of national and regional development.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Core Activities -->
    <section class="mb-5">
        <h2 class="fw-bold text-success">Core Activities</h2>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">We manage a 16-hectare farm in Buhiga Province, using regenerative agriculture methods to protect the environment and increase yields.</li>
            <li class="list-group-item">4 hectares of our land are dedicated to training programs. We’ve empowered 1,000+ smallholder farmers to adopt climate-smart techniques that restore degraded land and increase income.</li>
            <li class="list-group-item">We are developing a cold storage and post-harvest handling facility to reduce losses and give farmers better control over when and how they market their produce.</li>
            <li class="list-group-item">A regional hub is underway to facilitate trade integration, market access, and logistics support for farming cooperatives and agribusinesses across East Africa.</li>
            <li class="list-group-item">We are piloting a youth-focused agriculture model in Buhiga Zone, which will serve as a national framework for engaging young people—who represent over 60% of Burundi’s population—in the future of farming.</li>
        </ul>
    </section>

    <!-- Our Impact -->
    <section class="mb-5">
        <h2 class="fw-bold text-success">Our Impact</h2>
        <div class="row g-4">
            <div class="col-md-4"><div class="p-3 bg-light border rounded text-center"><strong>1,200+</strong> smallholder farmers trained</div></div>
            <div class="col-md-4"><div class="p-3 bg-light border rounded text-center"><strong>16</strong> hectares under sustainable cultivation</div></div>
            <div class="col-md-4"><div class="p-3 bg-light border rounded text-center"><strong>4</strong> hectares used for practical training</div></div>
            <div class="col-md-4"><div class="p-3 bg-light border rounded text-center">Cold storage infrastructure in development</div></div>
            <div class="col-md-4"><div class="p-3 bg-light border rounded text-center">Cross-border trade hub being established</div></div>
            <div class="col-md-4"><div class="p-3 bg-light border rounded text-center">National youth strategy pilot underway in Buhiga Zone</div></div>
        </div>
    </section>

    <!-- Partners -->
    <section class="mb-5">
        <h2 class="fw-bold text-success">Our Partners</h2>
        <ul class="list-inline">
            <li class="list-inline-item badge bg-success p-2 m-1">ActionAid Burundi</li>
            <li class="list-inline-item badge bg-success p-2 m-1">USAID</li>
            <li class="list-inline-item badge bg-success p-2 m-1">Government of Burundi (Buhiga Administration)</li>
        </ul>
    </section>

    <!-- Locations -->
    <section>
        <h2 class="fw-bold text-success">Our Locations</h2>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><strong>Farm & Training Site:</strong> Buhiga Province</li>
            <li class="list-group-item"><strong>Field Operations Office:</strong> Buhiga Zone</li>
            <li class="list-group-item"><strong>Head Office:</strong> Bujumbura</li>
            <li class="list-group-item"><strong>Trade Hub (In Development):</strong> Buhiga Zone</li>
        </ul>
    </section>
    <section class="jumbotron text-center p-4">
        <p>Read our UN feature: From Farm to Forex <a target="_blank" href="https://www.un.org/en/landlocked/think-pieces/farm-forex-insights-trade-legacy-burundi">https://www.un.org/en/landlocked/think-pieces/farm-forex-insights-trade-legacy-burundi</a></p>
    </section>
</div>
    </div>
@endsection
