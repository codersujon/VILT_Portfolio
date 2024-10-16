<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Http\Resources\SkillResource;
use App\Models\Skill;
use Inertia\Inertia;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills = SkillResource::collection(Skill::all());
        return Inertia::render('Skills/Index', compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return Inertia::render('Skills/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validation
        $request->validate([
            'name' => ['required', 'min:3'],
            'image' => ['required', 'image']
        ]);


        // Image have
        if($request->hasFile('image')){
            $image = $request->file('image')->store('skills');
            Skill::create([
                'name' => $request->name,
                'image' => $image,
            ]);
            return redirect()->route('skills.index')->with('success', "New Skill Created!");
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
    public function edit(Skill $skill)
    {
        return Inertia::render('Skills/Edit', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Skill $skill)
    {
        $image = $skill->image;
        
        // validation
        $request->validate([
            'name' => ['required', 'min:3']
        ]);

        if($request->hasFile('image')){
            Storage::delete($skill->image); // Delete Previous Image
            $image = $request->file('image')->store('skills');
        }

        // Update Skill
        $skill->update([
            'name' => $request->name,
            'image' => $image
        ]);

        return redirect()->route('skills.index')->with('success', 'Skill Updated Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skill $skill)
    {
        Storage::delete($skill->image); // Delete Image
        $skill->delete();
        return redirect()->back();
    }
}
