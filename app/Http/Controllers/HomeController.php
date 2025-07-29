<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Personal;
use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil data yang diperlukan dari model
        $data = [
            'projects' => Project::all(),
            'personal' => config('profile'),
            'testimonial' => Testimoni::all(),
            'title' => 'Welcome'
        ];

        return view('welcome', $data);
    }
}