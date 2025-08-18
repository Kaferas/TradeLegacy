@extends("template")

@section("tab_name", "Single Blog Details")

@section("content")
    <style>
    body { background-color: #f8f9fa; }
    .blog-header-img {
      max-height: 450px;
      object-fit: cover;
      width: 100%;
      border-radius: 10px;
    }
    .blog-meta {
      color: #6c757d;
      font-size: 0.9rem;
    }
    .author-box {
      background: #fff;
      padding: 20px;
      border-radius: 10px;
      display: flex;
      align-items: center;
      gap: 15px;
      box-shadow: 0 3px 8px rgba(0,0,0,0.05);
    }
    .author-box img {
      width: 70px;
      height: 70px;
      border-radius: 50%;
      object-fit: cover;
    }
    .related-post img {
      height: 180px;
      object-fit: cover;
      border-radius: 8px;
    }
    .comment-box {
      background: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 3px 8px rgba(0,0,0,0.05);
    }
  </style>
<div class="container-fluid p-5">

    <!-- Blog Featured Image -->
    <img src="{{ Storage::url('uploads/posts/'.$blog->pictures_path) }}" class="blog-header-img mb-4" alt="Blog Image">

    <!-- Title & Meta -->
    <h1 class="fw-bold">{{ $blog->title }}</h1>
    <div class="blog-meta mb-4">
      <span>By {{ $blog->user->name ?? "" }}</span> •
      <span>{{ $blog->created_at->format('F j, Y') }}</span> •
      <span>Category: {{ $blog->categories->name }}</span>
    </div>

    <!-- Blog Content -->
    <div class="mb-5">
        {!! $blog->description !!}
    </div>

    <!-- Author Box -->
    <div class="author-box mb-5">
      <img src="https://img.freepik.com/premium-vector/mathematics-circle-icon-education_804788-212729.jpg" alt="Author">
      <div>
        <h5 class="mb-1">{{ $blog->user->name ?? "" }}</h5>
        <p class="mb-0">{{$blog->user->description ?? ""}}</p>
      </div>
    </div>

    <!-- Navigation -->
    <div class="d-flex justify-content-between my-5">
      <a href="#" class="btn btn-outline-primary">&larr; Previous Post</a>
      <a href="#" class="btn btn-outline-primary">Next Post &rarr;</a>
    </div>

    <!-- Related Posts -->
    <h4 class="mb-4">Related Posts</h4>
    <div class="mb-5">

        <div class="d-flex flex-row overflow-auto" style="gap: 1.5rem;">
            @forelse ($relatedBlogs as $related)
                <div class="related-post" style="min-width: 300px;">
                    <img src="https://via.placeholder.com/350x200" class="w-100 mb-2" alt="">
                    <h6><a href="#" class="text-decoration-none text-dark">{{$related->title}}</a></h6>
                </div>

            @empty
                <p class="p-3 text-center jumbotron"><strong>No related posts found.</strong></p>
            @endforelse
        </div>
    </div>

    <!-- Comments -->
    {{-- <h4 class="mb-4">Leave a Comment</h4>
    <div class="comment-box mb-5">
      <form>
        <div class="mb-3">
          <label class="form-label">Name</label>
          <input type="text" class="form-control" placeholder="Your Name">
        </div>
        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" class="form-control" placeholder="Your Email">
        </div>
        <div class="mb-3">
          <label class="form-label">Comment</label>
          <textarea class="form-control" rows="4" placeholder="Your Comment"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Post Comment</button>
      </form>
    </div> --}}

  </div>
@endsection
