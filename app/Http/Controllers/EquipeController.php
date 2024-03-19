<?php

namespace App\Http\Controllers;
use App\Http\Requests\CoverUpdateRequest;
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

        try {
            $validatedData = $request->validated();

            $cover = Gallery::create(['path' => $this->upload_file($request, 'cover', 'equipes/covers')]);

            $validatedData['cover_id'] = $cover->id;

            unset($validatedData['cover']);

            $equipe = Equipe::create($validatedData);
            toastr()->success("L'equipe a bien été créée ! ", 'Congrats', ['timeOut' => 8000]);

            return redirect()->route('equipe.index');
        } catch (\Exception $e) {

            dd($e->getMessage());
        }
    }

    public function edit(Equipe $equipe)
    {
        return view('equipes.form', ['equipe' => $equipe] );
    }

    public function show(Equipe $equipe)
    { 
        return $this->success(new EquipeCollection($equipe)) ;
    }

    public function update(EquipeFormRequest $request, Equipe $equipe)
    {

        $data = $request->validated();

        if ($request->hasFile('cover')) {

            Storage::delete("public/equipes/covers/$equipe->path");
            $cover = Gallery::find($equipe->cover_id);

            $cover->update(['path' => $this->upload_file($request, 'cover' , 'equipes/covers')]);

            $data['cover_id'] = $cover->id;

        }

        unset($data['cover']);

        $equipe->update($data);
        toastr()->success("L'equipe à bien été modifier !" ,'Congrats', ['timeOut' => 8000] );
        return redirect()->route('equipe.index');
    }

    public function destroy(Equipe $equipe)
    {
        $equipe->delete();
        toastr()->success("L'equipe à été bien supprimmer !",'Congrats', ['timeOut' => 8000] ) ;
        return redirect()->route('equipes.index');
    }
}
