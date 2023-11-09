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
                                    {{-- @if (str_contains($project->cover_image, 'http'))
                                        <img class="card-img" src="{{ asset($project->cover_image) }}"
                                            alt="{{ $project['title'] }}">
                                    @else
                                        <img class="card-img" src="{{ asset('storage/' . $project->cover_image) }}"
                                            alt="{{ $project['title'] }}">
                                    @endif --}}

                                    {{-- di artur --}}
                                    {{-- {{ <img width:'150' src="{{$project->cover_image}}" alt="Cover image {{$project->name}}">}} --}}
                                    {{-- <img width="150" src="{{ asset('/storage/' . $project->cover_image)}}" alt="Cover image {{$project->name}}"> --}}
                                    @if ($project->cover_image)
                                        <img class="card-img" src="{{ asset('storage/' . $project->cover_image) }}"
                                            alt="Cover Image for {{ $project->title }}" width="150" height="150">
                                    @else
                                        <span>No image available</span>
                                    @endif
                                </td>
                                <td>{{ $project['description'] }}</td>
                            </tr>
                        @endforeach




                    </tbody>
                </table>
                @include('partials.pagination')
            </div>


        @endif

    </div>

@endsection
