<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProjectController extends Controller
{

    public function index(Request $request)
    {
        $projectsQuery = Project::latest();
        $news = Project::latest()->take(6)->get();

        if ($request->has('category')) {
            $categorySlug = $request->category;
            $category = Category::where('slug', $categorySlug)->first();
            $categoryName = $category?->name ?? '';

            if ($category) {
                $projectsQuery->where('category_id', $category->id);
            }
        }

        $news->transform(function ($project) {
            $project->description = strip_tags($project->description);
            return $project;
        });

        $projects = $projectsQuery->paginate(6)->withQueryString();

        // Bersihkan HTML tanpa menghilangkan pagination
        $projects = $projects->through(function ($project) {
            $project->description = strip_tags($project->description);
            return $project;
        });

        $data = [
            'categoryName' => $categoryName ?? '',
            'news' => $news,
            'projects' => $projects, // <- ini perbaikannya
            'title' => 'Projects'
        ];

        return view('projects.index', $data);
    }

    // Details project
    public function show($slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();

        return view('projects.detail', [
            'project' => $project,
            'title' => 'Projects'
        ]);
    }
}
