<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Date;
use Carbon\Carbon;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project :: paginate(15);
        return view('admin.projects.index',compact('projects'));
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
        $currentDate = Carbon::now();
        $data = $request->all();

        $newProject=new Project();
        $newProject->title = $data['title'];
        $newProject->description = $data['description'];
        $newProject->attachments = $data['attachments'];
        $newProject->last_modified = $currentDate;
        $newProject->save();

        return redirect()->route('admin.projects.index',$newProject->id);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $project = Project::find($id);
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
        $data = $request->validate([
            'title'=>['required','min:3','max:255',Rule::unique('projects')->ignore($project->id)],
            'description'=>['max:255'],
            'attachments' =>['required','max:30']
        ]);

        $currentDate = Carbon::now();
        $data['last_modified'] = $currentDate;

        $project->update($data);

        return redirect()->route('admin.projects.show',compact('project'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
