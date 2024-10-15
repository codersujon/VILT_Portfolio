<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectResource;
use App\Http\Resources\SkillResource;
use Inertia\Inertia;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Welcome
     */
    public function welcome(){
        $skills = SkillResource::collection(Skill::all());
        $projects = ProjectResource::collection(Project::with('skill')->get());
        return Inertia::render('Welcome', compact('skills', 'projects'));
    }
}
