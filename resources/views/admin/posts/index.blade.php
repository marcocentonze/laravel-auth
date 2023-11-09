@extends('layouts.admin')

@section('title', 'index-admin')

@section('content')

    <div class="container mt-5">
        <h1 class="mb-4">Index admin
            <a href="{{ route('admin.projects.create') }}" class="btn btn-sm btn-success float-end">Create</a>
        </h1>


        @if (session('message'))
            <div class="alert alert-success" role="alert">
                <strong>Success!</strong> {{ session('message') }}
            </div>
        @endif

        {{-- alert quando è vuota  --}}
        @if ($projects->isEmpty())
            <div class="alert alert-warning" role="alert">
                No posts here yet!
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Image</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <td>{{ $project['id'] }}</td>
                                <td>{{ $project['title'] }}</td>
                                <td>
                                    @if (str_contains($project['cover_image'], 'http'))
                                        <img style="width:50px" class="img-fluid rounded-circle" src="{{ $comic['cover_image'] }}"
                                            alt="{{ $project['title'] }}">
                                    @else
                                        <img style="width:50px" class="img-fluid rounded-circle"
                                            src="{{ asset('storage/' . $project->cover_image) }}" alt="{{ $project['title'] }}">
                                    @endif
                                </td>
                                <td>{{ $project['description'] }}</td>
                                <td>
                                    {{-- <a href="{{ route('show', $rpoject->id) }}"
                                        class="btn btn-sm btn-secondary">More</a>
                                    <a href="{{ route('edit', $project->id) }}" class="btn btn-sm btn-info">Edit</a> --}}


                                    {{-- modal for delete button
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#modalId-{{ $comic->id }}">
                                        Delete
                                    </button> --}}

                                    {{-- <!-- Modal Body -->
                                    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                    <div class="modal fade" id="modalId-{{ $comic->id }}" tabindex="-1"
                                        data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                        aria-labelledby="modalTitle-{{ $comic->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                            role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalTitle-{{ $comic->id }}">Modal id:
                                                        {{ $comic->id }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Attention! This is a destructive operation that cannot be undone.
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>

                                                    <!-- Delete form -->
                                                    <form action="{{ route('comics.destroy', $comic->id) }}"
                                                        method="POST">

                                                        @csrf

                                                        @method('DELETE')

                                                        <button type="submit" class="btn btn-danger">Confirm</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}


                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

@endsection
