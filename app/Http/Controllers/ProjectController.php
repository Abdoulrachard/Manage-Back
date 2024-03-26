<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectFormRequest;
use App\Http\Requests\CoverUpdateRequest;
use App\Http\Requests\ProjectCoverUpdate;
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
        $validatedData = $request->validated();
        
            // Traitement de la couverture principale
            $validatedData['cover_path'] = $this->upload_file($request->file('cover'), 'cover', 'projects/covers');
            unset($validatedData['cover']);

            // Création de l'actualité
            $project = Project::create($validatedData);
        
            // Traitement des images supplémentaires
            if ($request->hasFile('additional_images')) {
                foreach ($request->file('additional_images') as $image) {
                    // Création de la galerie associée à l'actualité nouvellement créée
                    $project->galleries()->create(['path' => $this->upload_file($image, 'additional_images', 'projects/additional_images'),]);
                }
            }
        
            toastr()->success(" Le project a bien été créée ! ", 'Congrats', ['timeOut' => 8000]);
            return redirect()->route('project.index');
    }
    
    public function update(ProjectCoverUpdate $request, Project $project)
    {
        $data = $request->validated();

        // Traitement de la couverture principale
        if ($request->hasFile('cover')) {
            Storage::delete("public/projects/covers/{$project->cover_path}");
            $project->update(['cover_path' => $this->upload_file($request->file('cover'), 'cover', 'projects/covers')]);
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

        // Mise à jour de l'actualité
        $project->update($data);
        toastr()->success(" Le project a bien été modifiée ! ", 'Congrats', ['timeOut' => 8000]);
        return redirect()->route('project.index');
    }

    public function edit(Project $project)
    {
        return view('projects.form', ['project' => $project]);
    }

    public function show(Project $project)
    {
        return $this->success(new ProjectCollection($project));
    }
    public function destroy(Project $project)
    {
        $project->delete();
        toastr()->success("Le projet a été supprimé avec succès !", 'Congrats', ['timeOut' => 8000]);
        return redirect()->route('projects.index');
    }
}