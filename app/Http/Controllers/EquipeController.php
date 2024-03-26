<?php

namespace App\Http\Controllers;
use App\Http\Requests\CoverUpdateRequest;
use App\Http\Requests\EquipeCoverUpdate;
use App\Http\Requests\EquipeFormRequest;
use App\Http\Resources\EquipeCollection;
use App\Models\Equipe;
use App\Models\Category;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EquipeController extends Controller
{

    public function index()
    {
        return view('equipes.index', ['equipes' => Equipe::paginate(25)]);
        // $this->success(Equipe::all()->orderBy('created_at' , 'desc')->paginate(25))
    }


    public function create()
    {
        $equipe = new Equipe();
        return view('equipes.form', ['equipe' => $equipe,]);
    }

    public function store(EquipeFormRequest $request)
    {
        $validatedData = $request->validated();
        
            // Traitement de la couverture principale
            $validatedData['cover_path'] = $this->upload_file($request->file('cover'), 'cover', 'equipes/covers');
            unset($validatedData['cover']);

            // Création de l'actualité
            $equipe = Equipe::create($validatedData);
        
            // Traitement des images supplémentaires
            if ($request->hasFile('additional_images')) {
                foreach ($request->file('additional_images') as $image) {
                    // Création de la galerie associée à l'actualité nouvellement créée
                    $equipe->galleries()->create(['path' => $this->upload_file($image, 'additional_images', 'equipes/additional_images'),]);
                }
            }
        
            toastr()->success(" L'equipe a bien été créée ! ", 'Congrats', ['timeOut' => 8000]);
            return redirect()->route('equipe.index');
    }
    
    public function update(EquipeCoverUpdate $request, Equipe $equipe)
    {
        $data = $request->validated();

        // Traitement de la couverture principale
        if ($request->hasFile('cover')) {
            Storage::delete("public/equipes/covers/{$equipe->cover_path}");
            $equipe->update(['cover_path' => $this->upload_file($request->file('cover'), 'cover', 'equipes/covers')]);
        }
        
        unset($data['cover']);

        // Traitement des images supplémentaires
        if ($request->hasFile('additional_images')) {
            $additionalImages = [];
            foreach ($request->file('additional_images') as $image) {
                $gallery = Gallery::create(['path' => $this->upload_file($image, 'additional_images', 'equipes/additional_images')]);
                $additionalImages[] = $gallery->id;
            }
            $equipe->galleries()->sync($additionalImages);
        }

        // Mise à jour de l'actualité
        $equipe->update($data);
        toastr()->success(" L'equipe a bien été modifiée ! ", 'Congrats', ['timeOut' => 8000]);
        return redirect()->route('equipe.index');
    } 

    public function edit(Equipe $equipe)
    {
        return view('equipes.form', ['equipe' => $equipe] );
    }

    public function show(Equipe $equipe)
    { 
        return $this->success(new EquipeCollection($equipe)) ;
    }

    public function destroy(Equipe $equipe)
    {
        $equipe->delete();
        toastr()->success("L'equipe à été bien supprimmer !",'Congrats', ['timeOut' => 8000] ) ;
        return redirect()->route('equipes.index');
    }
}
