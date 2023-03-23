<?php

// Se sposto Controller cambia namespace
namespace App\Http\Controllers\Admin;

// Devo collegare di nuovo estensione Controller
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

// Models
use App\Models\Project;

// Facade
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        
        return view('admin.projects.index', [
            'projects' => $projects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        // Creo variabile data con request validata
        $data = $request->validated();

        // Se file esiste, allora prendi path da inserire in DB
        if (array_key_exists('img', $data)) {
            $imgPath = Storage::put('public', $data['img']);
            $data['img'] = $imgPath;
        }

        // Riempio dati + salvo i dati con ::create
        $newProject = Project::create($data);

        // Redirect + messaggio di successo
        return redirect()->route('admin.projects.show', $newProject->id)->with('success', 'New project has been created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', [
            'project' => $project
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', [
            'project' => $project
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        // Prendo dati validati in variabile
        $data = $request->validated();

        // Utilizzo dati 
        $project->update($data);

        // Redirect
        return redirect()->route('admin.projects.show', $project->id)->with('success', 'The project has been updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Thr project has been remove successfully!');
    }
}
