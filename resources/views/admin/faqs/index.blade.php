
@extends('layouts.template')

@section('title', 'Manage FAQs')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">FAQ Management</h5>
                    <a href="{{ route('faqs.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>Add New FAQ
                    </a>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show mx-4" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if($faqs->count() > 0)
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Position</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Question</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Category</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Last Updated</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="faqs-list">
                                    @foreach($faqs as $faq)
                                        <tr data-id="{{ $faq->id }}">
                                            <td class="align-middle text-center">
                                                <span class="badge badge-sm bg-secondary">{{ $faq->position }}</span>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ \Illuminate\Support\Str::limit($faq->question, 50) }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="text-xs font-weight-bold">
                                                    {{ $faq->category ?? 'Uncategorized' }}
                                                </span>
                                            </td>
                                            <td>
                                                <form action="{{ route('faqs.toggle-published', $faq) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-sm {{ $faq->is_published ? 'btn-success' : 'btn-secondary' }}">
                                                        {{ $faq->is_published ? 'Published' : 'Draft' }}
                                                    </button>
                                                </form>
                                            </td>
                                            <td>
                                                <span class="text-xs font-weight-bold">
                                                    {{ $faq->updated_at->format('M d, Y') }}
                                                </span>
                                            </td>
                                            <td class="align-middle">
                                                <a href="{{ route('faqs.show', $faq) }}" class="btn btn-sm btn-info" title="View">
                                                    <i class="ri-eye-fill"></i>
                                                </a>
                                                <a href="{{ route('faqs.edit', $faq) }}" class="btn btn-sm btn-warning" title="Edit">
                                                    <i class="ri-pencil-fill"></i>
                                                </a>
                                                <form action="{{ route('faqs.destroy', $faq) }}" method="POST" class="d-inline delete-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" title="Delete" onclick="return confirm('Are you sure you want to delete this FAQ?')">
                                                        <i class="ri-close-fill"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="px-4 pt-4">
                            {{ $faqs->links() }}
                        </div>
                    @else
                        <div class="text-center py-5">
                            <p class="text-muted">Aucune FAQ n'a été trouvée. Cliquez sur le bouton ci-dessus pour créer votre première FAQ.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .table tr.dragging {
        opacity: 0.5;
        background: #f8f9fa;
    }
</style>
@endpush

@push('scripts')
<script>
    // This can be expanded to include drag-and-drop reordering functionality
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[title]'));
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>
@endpush
