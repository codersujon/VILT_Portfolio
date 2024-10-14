<?php

namespace App\Http\Controllers;

use App\Http\Resources\SkillResource;
use Inertia\Inertia;
use App\Models\Skill;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Welcome
     */
    public function welcome(){
        $skills = SkillResource::collection(Skill::all());
        return Inertia::render('Welcome', ['skills' => $skills]);
    }
}
