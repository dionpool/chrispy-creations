<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.categories.index', [
            'categories' => Category::all()->sortByDesc('created_at')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title' => ['required', Rule::unique('categories', 'title')]
        ]);

        $attributes['user_id'] = auth()->id();

        Category::create([
            'user_id'   => $attributes['user_id'],
            'title'     => $attributes['title']
        ]);

        return redirect(route('categories'))->with('success', 'De categorie is succesvol toegevoegd.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('admin.categories.edit', [
            'category' => Category::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        $category->update(['title' => $request->input('title')]);
        $category->slug = null;

        return redirect(route('categories'))->with('success', 'De categorie is succesvol aangepast!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return redirect(route('categories'))->with('error', 'De categorie is niet gevonden.');
        }

        if ($category->id === 1) {
            return redirect(route('categories'))->with('error', 'De categorie "(ID: 1) Alles" kan niet worden verwijderd.');
        }

        $category->delete();

        return redirect(route('categories'))->with('success', 'De categorie is succesvol verwijderd.');
    }
}
