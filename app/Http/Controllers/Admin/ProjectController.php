<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.projects.index', [
            'projects' => Project::orderBy('order')->get(),
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
            'title' => ['required', Rule::unique('projects', 'title')],
            'category' => ['required'],
            'description' => ['required'],
            'thumbnail' => ['required', 'image'],
            'size' => ['required', 'in:big,small'],
            'status' => ['required', 'in:published,concept,hidden'],
            'image.*' => ['required', 'image']
        ]);

        $attributes['user_id'] = auth()->id();

        $thumbnail = $request->file('thumbnail');
        $originalName = $thumbnail->getClientOriginalName();
        $attributes['thumbnail'] = $thumbnail->storeAs('images/thumbnails', $originalName, 'public');

        $project = Project::create([
            'user_id' => $attributes['user_id'],
            'title' => $attributes['title'],
            'category_id' => $attributes['category'],
            'description' => $attributes['description'],
            'thumbnail' => $attributes['thumbnail'],
            'size' => $attributes['size'],
            'status' => $attributes['status']
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
    public function edit($id)
    {
        return view('admin.projects.edit', [
            'project' => Project::find($id),
            'categories' => Category::all(),
            'category' => Category::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $attributes = $request->validate([
            'title' => ['required'],
            'category' => ['required'],
            'description' => ['required'],
            'thumbnail' => ['nullable', 'image'], // Make thumbnail optional for update
            'size' => ['required', 'in:big,small'],
            'status' => ['required', 'in:published,concept,hidden'],
            'image.*' => ['required', 'image']
        ]);

        $attributes['user_id'] = auth()->id();

        // Fetch the existing project by ID
        $project = Project::findOrFail($id);

        // Update project attributes
        $project->update([
            'title' => $attributes['title'],
            'category_id' => $attributes['category'],
            'description' => $attributes['description'],
            'size' => $attributes['size'],
            'status' => $attributes['status']
        ]);

        // Handle thumbnail update if provided
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $originalName = $thumbnail->getClientOriginalName();
            $attributes['thumbnail'] = $thumbnail->storeAs('images/thumbnails', $originalName, 'public');
            $project->update(['thumbnail' => $attributes['thumbnail']]);
        }

        // Handle project images
        $projectImages = [];

        if ($request->hasFile('images') && $request->file('images') !== null) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('images/projects', 'public');
                $projectImages[] = ['image' => $imagePath];
            }
        }

        // Check if the project already has images
        if ($project->images->count() > 0) {
            // If it does, update the existing images
            foreach ($projectImages as $newImage) {
                $project->images()->updateOrCreate(['image' => $newImage['image']], $newImage);
            }
        } else {
            // If it doesn't, create new images
            $project->images()->createMany($projectImages);
        }

        return back()->with('success', 'Je project is succesvol bijgewerkt.');
    }

    /**
     * Reorder images in the project carousel.
     */
    public function reorderImages(Request $request, $project)
    {
        // Validate the request
        $validated = $request->validate([
            'order' => 'required|array',
            'order.*' => 'integer'
        ]);

        // Get the project
        $projectModel = Project::findOrFail($project);

        // Update the order in the database
        foreach ($validated['order'] as $index => $id) {
            $projectModel->images()->where('id', $id)->update(['order' => $index]);
        }

        return response()->json(['success' => true, 'message' => 'Images reordered successfully']);
    }

    /**
     * Remove a specific image in the project carousel.
     */
    public function deleteImage(Project $project, $imageId)
    {
        $image = $project->images()->findOrFail($imageId);
        $imagePath = $image->image;

        $image->delete();

        if ($imagePath && Storage::disk('public')->exists($imagePath)) {
            Storage::disk('public')->delete($imagePath);
        }

        return response()->json(['success' => true]);
    }

    /**
     * Reorder projects.
     */
    public function reorderProjects(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'order' => 'required|array',
            'order.*' => 'integer'
        ]);

        // Update the order in the database
        foreach ($validated['order'] as $index => $id) {
            Project::where('id', $id)->update(['order' => $index]);
        }

        return response()->json(['success' => true, 'message' => 'Projects reordered successfully']);
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
