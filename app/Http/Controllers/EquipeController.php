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
use Illuminate\Support\Facades\Log;
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
            // Récupérer les anciennes images supplémentaires de l'équipe
            $oldImages = $equipe->galleries()->get();
    
            // Supprimer les enregistrements des anciennes images de la base de données
            $equipe->galleries()->delete();
    
            // Parcourir les anciennes images et les supprimer du dossier de stockage
            foreach ($oldImages as $image) {
                Storage::delete("public/equipes/additional_images/{$image->path}");
            }
    
            // Ajouter les nouvelles images supplémentaires à la relation et les stocker dans le dossier de stockage
            foreach ($request->file('additional_images') as $image) {
                $gallery = Gallery::create([
                    'path' => $this->upload_file($image, 'additional_images', 'equipes/additional_images'),
                    'galleriestable_id' => $equipe->id,
                    'galleriestable_type' => Equipe::class,
                ]);
            }
        }
    
        // Mise à jour de l'équipe
        $equipe->update($data);
    
        toastr()->success(" L'équipe a bien été modifiée ! ", 'Félicitations', ['timeOut' => 8000]);
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
    // Supprimer le cover de l'équipe s'il existe
    if ($equipe->cover_path) {
        Storage::disk('public')->delete("equipes/covers/{$equipe->cover_path}");
    }

    // Supprimer les images supplémentaires de la galerie de l'équipe
    foreach ($equipe->galleries as $gallery) {
        Storage::disk('public')->delete("equipes/additional_images/{$gallery->path}");
    }

    // Supprimer l'équipe et toutes ses relations
    $equipe->delete();

    toastr()->success("L'équipe a été supprimée avec succès !", 'Félicitations', ['timeOut' => 8000]);
    return redirect()->route('equipe.index');
}
}
