<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ActualityCollection;
use App\Models\Actuality;
use Illuminate\Http\Request;

class ActualityController extends Controller
{
    public function index(){
        return ActualityCollection::collection(Actuality::all())  ;
    }
}
