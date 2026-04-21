<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    public function index()
    {
        $allProjects = Project::with('client', 'projectManager')
            ->orderBy('created_at', 'desc')
            ->get();

        // Tambahkan badgeColor untuk setiap project
        foreach ($allProjects as $project) {
            $status = strtolower($project->status);
            if ($status === 'planning') {
                $project->badgeColor = 'bg-secondary';
            } elseif ($status === 'on progress' || $status === 'in progress') {
                $project->badgeColor = 'bg-warning text-dark';
            } elseif ($status === 'complete' || $status === 'completed') {
                $project->badgeColor = 'bg-success';
            } else {
                $project->badgeColor = 'bg-secondary';
            }
        }

        // Ambil 3 featured projects dengan budget tertinggi
        $featuredProjects = Project::with('client', 'projectManager')
            ->orderBy('budget', 'desc')
            ->take(3)
            ->get();

        // Tambahkan badgeColor untuk featuredProjects
        foreach ($featuredProjects as $project) {
            $status = strtolower($project->status);
            if ($status === 'planning') {
                $project->badgeColor = 'bg-secondary';
            } elseif ($status === 'on progress' || $status === 'in progress') {
                $project->badgeColor = 'bg-warning text-dark';
            } elseif ($status === 'complete' || $status === 'completed') {
                $project->badgeColor = 'bg-success';
            } else {
                $project->badgeColor = 'bg-secondary';
            }
        }

        return view('project', compact('allProjects', 'featuredProjects'));
    }

    
    public function show($slug)
    {
        $searchTerm = str_replace('-', ' ', $slug);
        
        $project = Project::with(['client', 'projectManager'])
            ->where('project_name', 'LIKE', $searchTerm)
            ->orWhere('id', $slug)
            ->firstOrFail();

        $status = strtolower($project->status);
        if ($status === 'planning') {
            $badgeColor = 'bg-secondary';
        } elseif ($status === 'on progress' || $status === 'in progress') {
            $badgeColor = 'bg-warning text-dark';
        } elseif ($status === 'complete' || $status === 'completed') {
            $badgeColor = 'bg-success';
        } else {
            $badgeColor = 'bg-secondary';
        }

        $relatedProjects = Project::where('id', '!=', $project->id)->inRandomOrder()->take(3)->get();
        foreach ($relatedProjects as $rp) {
            $rpStatus = strtolower($rp->status);
            if ($rpStatus === 'planning') {
                $rp->badgeColor = 'bg-secondary';
            } elseif ($rpStatus === 'on progress' || $rpStatus === 'in progress') {
                $rp->badgeColor = 'bg-warning text-dark';
            } elseif ($rpStatus === 'complete' || $rpStatus === 'completed') {
                $rp->badgeColor = 'bg-success';
            } else {
                $rp->badgeColor = 'bg-secondary';
            }
        }

        return view('project_detail', compact(
            'project',
            'badgeColor',
            'relatedProjects'
        ));
    }
}
