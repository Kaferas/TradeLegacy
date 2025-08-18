@extends("template")

@section("tab_name", "Services & Agri-Solutions")

@section("content")
<div class="container-fluid p-5">
    <!-- Title -->
    <div class="text-center mt-5">
        <h1 class="mb-5 fw-bold text-success">TRADE LEGACY BURUNDI</h1>
        <p class="lead text-muted">
            A Farming Company Empowering Smallholders and Transforming Agriculture in East Africa
        </p>
        <h2 class="fw-bold mt-4">Our Services</h2>
        <hr class="bg-primary mb-4" style="height: 2px; width: 100px; margin: auto;">
    </div>

    @php
        $services = [
            [
                'title' => 'Sustainable Farming & Agribusiness Solutions',
                'desc' => 'We manage eco-friendly farms using regenerative agriculture methods to protect the environment, boost yields, and improve soil health. Our approach combines modern techniques with traditional knowledge to deliver healthy, high-quality produce.',
                'img' => asset('images/services/farming.png')
            ],
            [
                'title' => 'Farmer Training & Capacity Building',
                'desc' => 'We offer hands-on training for smallholder farmers and rural youth in climate-smart farming, post-harvest management, and agribusiness management. Our training programs are tailored to local needs and include mentorship, field demonstrations, and market readiness skills.',
                'img' => asset('images/services/training.png')
            ],
            [
                'title' => 'Cross-Border Trade & Advisory Services',
                'desc' => 'We provide expert guidance to agribusinesses, cooperatives, and traders on navigating cross-border markets within the East African Community. Our services include:<br>• Customs procedures and trade compliance<br>• Market research and matchmaking<br>• Export readiness assessments<br>• Logistics and distribution planning',
                'img' => asset('images/services/trade.png')
            ],
            [
                'title' => 'Farming on Demand',
                'desc' => 'For individuals, organizations, or investors who want to engage in agriculture without managing daily operations, we offer customized farming solutions. Clients choose the crop, scale, and sustainability model, and we handle land preparation, planting, care, and harvesting.',
                'img' => asset('images/services/on_demand.png')
            ],
            [
                'title' => 'Carbon Credits & Climate Action Projects',
                'desc' => 'Through sustainable land management, tree planting, and soil restoration, we help organizations and partners participate in the carbon credits market. Our projects generate verified carbon offsets while improving biodiversity, restoring degraded land, and supporting local communities.',
                'img' => asset('images/services/carbon.png')
            ],
            [
                'title' => 'Post-Harvest & Cold Storage Solutions',
                'desc' => 'We are developing modern storage facilities to reduce post-harvest losses, improve food safety, and give farmers greater flexibility to sell at the best market prices.',
                'img' => asset('images/services/storage.png')
            ],
            [
                'title' => 'Agribusiness Partnerships & Investment Facilitation',
                'desc' => 'We connect farmers, cooperatives, and investors to create win-win partnerships. From joint ventures to social impact projects, we ensure investments are sustainable, profitable, and socially responsible.',
                'img' => asset('images/services/partnerships.png')
            ]
        ];
    @endphp

    @foreach($services as $index => $service)
        <div class="row align-items-center mb-5 {{ $index % 2 !== 0 ? 'flex-row-reverse' : '' }}">
            <!-- Image -->
            <div class="col-md-6 mb-3 mb-md-0 text-center">
                <img src="{{ $service['img'] }}" alt="{{ $service['title'] }}" class="img-fluid rounded shadow" style="max-height: 460px; width: 70%; object-fit: cover;">
            </div>
            <!-- Text -->
            <div class="col-md-6">
                <h3  class="mb-3 fw-bold text-success">{{ $service['title'] }}</h3>
                <hr class="bg-primary mb-4" style="height: 2px;">
                <p style="font-size:20px">{!! nl2br($service['desc']) !!}</p>
            </div>
        </div>
    @endforeach
</div>
@endsection
