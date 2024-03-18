<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectFormRequest;
use App\Http\Requests\CoverUpdateRequest;
use App\Http\Resources\ProjectCollection;
use App\Models\Project;
use App\Models\Category;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{

    public function index()
    {
        return view('projects.index', ['projects' => Project::paginate(25)]);
        // $this->success(Project::all()->orderBy('created_at' , 'desc')->paginate(25))
    }


    public function create()
    {
        $project = new Project();
        return view('projects.form', ['project' => $project,]);
    }


    public function store(ProjectFormRequest $request)
    {

        try {
            $validatedData = $request->validated();

            $cover = Gallery::create(['path' => $this->upload_file($request, 'cover', 'projects/covers')]);

            $validatedData['cover_id'] = $cover->id;

            unset($validatedData['cover']);

            $project = Project::create($validatedData);
            toastr()->success("Le projet a bien été créée ! ", 'Congrats', ['timeOut' => 8000]);

            return redirect()->route('project.index');
        } catch (\Exception $e) {

            dd($e->getMessage());
        }
    }

    public function edit(Project $project)
    {
        return view('projects.form', ['project' => $project] );
    }

    public function show(Project $project)
    { 
        return $this->success(new ProjectCollection($project)) ;
    }

    public function update(ProjectFormRequest $request, Project $project)
    {

        $data = $request->validated();

        if ($request->hasFile('cover')) {

            Storage::delete("public/projects/covers/$project->path");
            $cover = Gallery::find($project->cover_id);

            $cover->update(['path' => $this->upload_file($request, 'cover' , 'projects/covers')]);

            $data['cover_id'] = $cover->id;

        }

        unset($data['cover']);

        $project->update($data);
        toastr()->success("Le projet à bien été modifier !" ,'Congrats', ['timeOut' => 8000] );
        return redirect()->route('project.index');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        toastr()->success("Le projet à été bien supprimmer !",'Congrats', ['timeOut' => 8000] ) ;
        return redirect()->route('projects.index');
    }
}
