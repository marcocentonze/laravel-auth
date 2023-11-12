@extends('layouts.admin')

@section('content')

    <h1>Create Post</h1>

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>

                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('admin.projects.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" class="form-control"
                        placeholder="Type the post title here" aria-describedby="helperTitle">
                    <small id="helperTitle" class="text-muted">Type your post title max: 50 characters</small>
                </div>


                <div class="mb-3">
                    <label for="cover_image" class="form-label">Choose file</label>
                    <input type="file" class="form-control" name="cover_image" id="cover_image"
                        placeholder="Choose a file" aria-describedby="fileHelp">
                    <div id="fileHelp" class="form-text">Add an image max 1mb</div>
                </div>


                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                </div>

                <div class="mb-3">
                    <label for="website_link" class="form-label">Add Website Link</label>
                    <input type="url" name="website_link" id="website_link"
                        class="form-control" placeholder="Insert your website project link"
                        aria-describedby="helpId" value="{{ old('website_link') }}">
                </div>

                <div class="mb-3">
                    <label for="github_link" class="form-label">Add GitHub Link</label>
                    <input type="url" name="github_link" id="github_link"
                        class="form-control" placeholder="Insert your Github project link"
                        aria-describedby="helpId" value="{{ old('github_link') }}">
                </div>


                <button class="btn btn-primary" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-save" viewBox="0 0 16 16">
                        <path
                            d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1H2z" />
                    </svg>
                    Save
                </button>


            </form>
        </div>
    </div>

@endsection
