<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;
use Inertia\Inertia;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return Inertia::render('Projects/Index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $skills = Skill::all();
        return Inertia::render("Projects/Create", compact('skills'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // validation
         $request->validate([
            'name' => ['required', 'min:3'],
            'skill_id' => ['required'],
            'image' => ['required', 'image'],
        ]);

        // Image have
        if($request->hasFile('image')){
            $image = $request->file('image')->store('projects');
            Project::create([
                'name' => $request->name,
                'skill_id' => $request->skill_id,
                'project_url' => $request->project_url,
                'image' => $image,
            ]);
            return redirect()->route('projects.index')->with('success', "New Project Created!");
        }

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
