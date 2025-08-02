
@extends('layouts.template')

@section('title', 'View FAQ')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>FAQ Details</h5>
                        <div>
                            <a href="{{ route('faqs.edit', $faq) }}" class="btn btn-warning btn-sm me-2">
                                <i class="fas fa-edit me-2"></i>Edit
                            </a>
                            <a href="{{ route('faqs.index') }}" class="btn btn-secondary btn-sm">
                                <i class="fas fa-arrow-left me-2"></i>Back to List
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="text-uppercase text-sm">Question</h6>
                                    <span class="badge {{ $faq->is_published ? 'bg-success' : 'bg-secondary' }}">
                                        {{ $faq->is_published ? 'Published' : 'Draft' }}
                                    </span>
                                </div>
                                <p class="text-lg font-weight-bold mb-0">{{ $faq->question }}</p>
                            </div>

                            <div class="mb-4">
                                <h6 class="text-uppercase text-sm">Answer</h6>
                                <div class="p-3 border rounded bg-light">
                                    {!! $faq->answer !!}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h6 class="text-uppercase text-sm">FAQ Information</h6>
                                    <hr class="mt-0">

                                    <div class="mb-3">
                                        <h6 class="text-sm mb-0">Category</h6>
                                        <p>{{ $faq->category ?? 'Uncategorized' }}</p>
                                    </div>

                                    <div class="mb-3">
                                        <h6 class="text-sm mb-0">Display Position</h6>
                                        <p>{{ $faq->position }}</p>
                                    </div>

                                    <div class="mb-3">
                                        <h6 class="text-sm mb-0">Created At</h6>
                                        <p>{{ $faq->created_at->format('M d, Y H:i') }}</p>
                                    </div>

                                    <div class="mb-3">
                                        <h6 class="text-sm mb-0">Last Updated</h6>
                                        <p>{{ $faq->updated_at->format('M d, Y H:i') }}</p>
                                    </div>

                                    <div class="mb-3">
                                        <h6 class="text-sm mb-0">Status</h6>
                                        <form action="{{ route('faqs.toggle-published', $faq) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-sm {{ $faq->is_published ? 'btn-success' : 'btn-secondary' }}">
                                                {{ $faq->is_published ? 'Published' : 'Draft' }}
                                            </button>
                                        </form>
                                    </div>

                                    <hr>

                                    <form action="{{ route('faqs.destroy', $faq) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this FAQ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash me-2"></i>Delete FAQ
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
