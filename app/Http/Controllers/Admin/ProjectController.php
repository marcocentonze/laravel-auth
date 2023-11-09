<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::orderByDesc('id')->paginate(12);
        return view('admin.posts.index', ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {


        // validate the user input
        $val_data = $request->validate([
            'title' => 'required|bail|min:3|max:150',
            'slug' => 'min:3|max:50',
            'description' => 'nullable|max:350',
            'cover_image' => 'nullable|image|max:500',
        ]);




        // add the cover image if passed in the request
        if ($request->hasFile('cover_image')) {
            $file_path = Storage::disk('public')->put('cover_images', $request->cover_image);
            $val_data['cover_image'] = $file_path;
            // dd($file_path);
        }

        // generate the post slug
        $val_data['slug'] = Str::slug($request->title, '-');




        // create the new article
        Project::create($val_data);

        return to_route('admin.projects.index')->with('message', 'Post Created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
