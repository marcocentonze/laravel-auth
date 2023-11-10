@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <img src="{{ asset('storage/' . $project->cover_image) }}" class="card-img-top"
                        alt="{{ $project->title }}">

                    <div class="card-header">
                        <h4 class="card-title">{{ $project->title }}</h4>
                        <h6 class="card-subtitle text-muted">{{ $project->created_at->format('F d, Y') }}</h6>
                    </div>

                    <div class="card-body">
                        <p class="card-text">{{ $project->description }}</p>
                        <a href="{{ route('admin.projects.edit', $project->slug) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Back to List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
