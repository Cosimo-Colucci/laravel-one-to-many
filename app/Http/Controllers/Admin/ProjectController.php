<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $projects = Project::paginate(15);
        // dd($projects);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'title' => ['required', 'unique:projects','min:3', 'max:255'],
            'image' => ['url:https'],
            'project_start' => ['required',],
            'content' => ['required', 'min:20'],
        ]);
        $ownerId= 'pepa';
        // $ownerId= {{ Auth::}};
        // dd($data);
        
        $data["slug"] = Str::of($data['title'])->slug('-');
        $newProject= new Project();
        $newProject->fill($data);
        $newProject->owner=$ownerId;
        // dd($newProject);
        $newProject->save();
        // $newProject= Project::create($data);

        return redirect()->route('admin.projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        // dd($request->all());
        $data = $request->validate([
            'title' => ['required', 'min:3', 'max:255', Rule::unique('projects')->ignore($project->id)],
            'image' => ['url:https'],
            'project_start' => ['required',],
            'content' => ['required', 'min:20'],
        ]);

        $data["slug"] = Str::of($data['title'])->slug('-');
        $ownerId= 'pepa';

        $project->update($data);

        return redirect()->route('admin.projects.show', compact('project'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        // dd($project);
        $project->delete();
        return redirect()->route('admin.projects.index');
    }
}
