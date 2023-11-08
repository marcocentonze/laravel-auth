@extends('layouts.admin')

@section('content')
    <div class="container my-4">
        <h2 class="fs-4 text-secondary">
            {{ __('Dashboard') }}
        </h2>
        <div class="row justify-content-center">
            <div class="col">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5>{{ __('Project List') }}</h5>
                    </div>

                    <div class="card-body p-0">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-hover m-0">
                                <thead>
                                    <tr class="table-dark">
                                        <th scope="col">#ID</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Cover Image</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($projects as $project)
                                        <tr>
                                            <th scope="row">{{ $project->id }}</th>
                                            <td>{{ $project->title }}</td>
                                            <td><img src="{{ asset($project->cover_image) }}" alt="project-cover"
                                                    class="img-thumbnail" style="width: 100px;"></td>
                                            <td>
                                                <a href="{{ route('admin.projects.show', $project->id) }}"
                                                    class="btn btn-info btn-sm m-1">More</a>
                                                <a href="{{ route('admin.projects.edit', $project->id) }}"
                                                    class="btn btn-outline-primary btn-sm m-1">Edit</a>

                                                <button type="button" class="btn btn-danger btn-sm m-1"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modalId-{{ $project->id }}">Delete</button>

                                                <div class="modal fade" id="modalId-{{ $project->id }}" tabindex="-1"
                                                    aria-labelledby="modalTitleId-{{ $project->id }}" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Confirm Deletion</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure you want to delete project
                                                                #{{ $project->id }}? This action cannot be undone.
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Cancel</button>
                                                                <form
                                                                    action="{{ route('admin.projects.destroy', $project) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn btn-danger">Delete</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center text-muted">No projects yet!</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
