<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EquipeCollection;
use App\Models\Equipe;
use Illuminate\Http\Request;

class EquipeController extends Controller
{
    public function index(){
        $equipes = Equipe::all() ;
        if($equipes){
            return  $this->success(EquipeCollection::collection($equipes)) ;
        }
        return $this->fail();
    }
    public function show(Equipe $equipe){
        if($equipe->exists()){
            return $this->success(new EquipeCollection($equipe));
        }
        return $this->fail();
    }
    
}
