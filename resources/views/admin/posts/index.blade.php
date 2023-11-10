@extends('layouts.admin')

@section('title', 'Index Admin')

@section('content')

    <div class="container mt-5">
        <h1 class="mb-4">Index Admin
            <a href="{{ route('admin.projects.create') }}" class="btn btn-sm btn-primary float-end">Create New Project</a>
        </h1>

        @if (session('message'))
            <div class="alert alert-success" role="alert">
                <strong>Success!</strong> {{ session('message') }}
            </div>
        @endif

        {{-- Alert when empty --}}
        @if ($projects->isEmpty())
            <div class="alert alert-warning" role="alert">
                No projects here yet!
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered shadow-sm">
                    <thead class="bg-info">
                        <tr>
                            <th scope="col" class="py-2 px-3">ID</th>
                            <th scope="col" class="py-2 px-3">Title</th>
                            <th scope="col" class="py-2 px-3">Image</th>
                            <th scope="col" class="py-2 px-3">Description</th>
                            <th scope="col" class="py-2 px-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <td class="py-2 px-3">{{ $project->id }}</td>
                                <td class="py-2 px-3">{{ $project->title }}</td>
                                <td class="py-2 px-3">
                                    <img width="150" src="{{ asset('storage/' . $project->cover_image) }}"
                                        alt="Cover image for {{ $project->title }}" class="img-fluid rounded">
                                </td>
                                <td class="py-2 px-3">{{ $project->description }}</td>
                                <td>
                                    <a class="btn btn-primary m-1"
                                        href="{{ route('admin.projects.show', $project->slug) }}">
                                        <i class="fa-solid fa-circle-info"></i> More</a>
                                   


                                </td>


                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @include('partials.pagination')
            </div>
        @endif
    </div>

@endsection
