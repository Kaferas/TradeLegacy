@extends("template")

@section("tab_name", "Insights & News")

@section("content")

        <!-- Header Start -->
        <div class="container-fluid bg-breadcrumb">
            <div class="container text-center py-2" style="max-width: 900px;">
                <h3 class="text-white display-3 mb-4">Our Blog</h1>
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active text-white">Blog</li>
                </ol>
            </div>
        </div>
        <!-- Header End -->
        <!-- Blog Start -->
        <div class="container-fluid blog py-5">
            <div class="container py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h5 class="section-title px-3">Our Blog</h5>
                    <h1 class="mb-4">Our Blogs News</h1>
                </div>
                <div class="row g-4 justify-content-center">
                    @foreach ($blogs as $blog)
                        <div class="col-lg-4 col-md-6">
                            <div class="blog-item">
                                <div class="blog-img">
                                    <div class="blog-img-inner">
                                        <img style="height: 270px" class="img-fluid w-100 rounded-top" src="{{ Storage::url('uploads/posts/'.$blog->pictures_path) }}" alt="Image">
                                        <div class="blog-icon">
                                            <a href="{{ route("blogs.show",$blog->id) }}" class="my-auto"><i class="fas fa-link fa-2x text-dark"></i></a>
                                        </div>
                                    </div>
                                    <div class="blog-info d-flex align-items-center border border-start-0 border-end-0">
                                        <small class="text-dark flex-fill text-center border-end py-2"><i class="fa fa-calendar-alt text-warning me-2 "></i>{{$blog->created_at->format('d M Y')}}</small>
                                        <a class="btn-hover flex-fill text-center text-dark border-end py-2"><i class="fa fa-thumbs-up text-warning me-2"></i>{{$blog->categories->name}}</a>
                                    </div>
                                </div>
                                <div class="blog-content border border-top-0 rounded-bottom p-4">
                                    <p class="mb-3">Posted By: {{ ucfirst($blog->user->name ?? "ADMIN") }} </p>
                                    <a href="{{ route("blogs.show",$blog->id) }}" class="h4">{{ ucfirst($blog->title) }}</a>
                                    <p class="my-3">
                                        {{ \Illuminate\Support\Str::words(strip_tags($blog->description), 20, '...') }}
                                    </p>
                                    <a href="{{ route("blogs.show",$blog->id) }}" class="btn btn-warning py-2 px-4">Read More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
@endsection
