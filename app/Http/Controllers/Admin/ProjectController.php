<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.projects.index', [
            'projects' => Project::all()->sortByDesc('created_at'),
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title'         => ['required', Rule::unique('projects', 'title')],
            'category'      => ['required'],
            'description'   => ['required'],
            'thumbnail'     => ['required', 'image'],
            'size'          => ['required', 'in:big,small'],
            'status'        => ['required', 'in:published,concept,hidden'],
            'image.*'       => ['required', 'image']
        ]);

        $attributes['user_id'] = auth()->id();

        $thumbnail = $request->file('thumbnail');
        $originalName = $thumbnail->getClientOriginalName();
        $attributes['thumbnail'] = $thumbnail->storeAs('images/thumbnails', $originalName, 'public');

        $project = Project::create([
            'user_id'       => $attributes['user_id'],
            'title'         => $attributes['title'],
            'category_id'   => $attributes['category'],
            'description'   => $attributes['description'],
            'thumbnail'     => $attributes['thumbnail'],
            'size'          => $attributes['size'],
            'status'        => $attributes['status']
        ]);

        $projectImages = [];
        foreach ($request->file('images') as $image) {
            $imagePath = $image->store('images/projects', 'public');
            $projectImages[] = [
                'image' => $imagePath
            ];
        }

        $project->images()->createMany($projectImages);

        return redirect(route('projects'))->with('success', 'Je project is succesvol aangemaakt.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('project', [
            'project' => $project
        ]);
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
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $project = Project::find($id);

        if (!$project) {
            return redirect(route('projects'))->with('error', 'Het project is niet gevonden.');
        }

        $project->delete();

        return redirect(route('projects'))->with('success', 'Het project is succesvol verwijderd.');
    }
}
