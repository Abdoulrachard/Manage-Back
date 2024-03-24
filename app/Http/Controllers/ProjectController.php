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
    }

    public function create()
    {
        $project = new Project();
        return view('projects.form', ['project' => $project]);
    }

    public function store(ProjectFormRequest $request)
    {
        try {
            $validatedData = $request->validated();

            // Traitement de la couverture principale
            $cover = Gallery::create(['path' => $this->upload_file($request, 'cover', 'projects/covers')]);
            $validatedData['cover_id'] = $cover->id;
            unset($validatedData['cover']);

            // Création du projet
            $project = Project::create($validatedData);

            // Traitement des images supplémentaires
            if ($request->hasFile('additional_images')) {
                $additionalImages = [];
                foreach ($request->file('additional_images') as $image) {
                    $gallery = Gallery::create(['path' => $this->upload_file($image, 'additional_images', 'projects/additional_images')]);
                    $additionalImages[] = $gallery->id;
                }
                $project->galleries()->attach($additionalImages);
            }

            toastr()->success("Le projet a bien été créé !", 'Congrats', ['timeOut' => 8000]);
            return redirect()->route('project.index');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function edit(Project $project)
    {
        return view('projects.form', ['project' => $project]);
    }

    public function show(Project $project)
    {
        return $this->success(new ProjectCollection($project));
    }

    public function update(ProjectFormRequest $request, Project $project)
    {
        $data = $request->validated();

        // Traitement de la couverture principale
        if ($request->hasFile('cover')) {
            Storage::delete("public/projects/covers/{$project->cover->path}");
            $cover = Gallery::find($project->cover_id);
            $cover->update(['path' => $this->upload_file($request, 'cover', 'projects/covers')]);
            $data['cover_id'] = $cover->id;
        }
        unset($data['cover']);

        // Traitement des images supplémentaires
        if ($request->hasFile('additional_images')) {
            $additionalImages = [];
            foreach ($request->file('additional_images') as $image) {
                $gallery = Gallery::create(['path' => $this->upload_file($image, 'additional_images', 'projects/additional_images')]);
                $additionalImages[] = $gallery->id;
            }
            $project->galleries()->sync($additionalImages);
        }

        // Mise à jour du projet
        $project->update($data);
        toastr()->success("Le projet a bien été modifié !", 'Congrats', ['timeOut' => 8000]);
        return redirect()->route('project.index');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        toastr()->success("Le projet a été supprimé avec succès !", 'Congrats', ['timeOut' => 8000]);
        return redirect()->route('projects.index');
    }
}