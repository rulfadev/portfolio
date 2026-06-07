<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\SiteSetting;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index(): View
    {
        return view('pages.projects.index', [
            'siteSettings' => SiteSetting::asArray(),

            'projects' => Project::query()
                ->where('is_active', true)
                ->orderByDesc('is_featured')
                ->orderBy('sort_order')
                ->paginate(9),
        ]);
    }

    public function show(Project $project): View
    {
        abort_unless($project->is_active, 404);

        return view('pages.projects.show', [
            'siteSettings' => SiteSetting::asArray(),
            'project' => $project,
            'relatedProjects' => Project::query()
                ->where('is_active', true)
                ->whereKeyNot($project->id)
                ->where('category', $project->category)
                ->limit(3)
                ->get(),
        ]);
    }
}
