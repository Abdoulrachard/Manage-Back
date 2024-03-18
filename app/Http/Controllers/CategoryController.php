<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryFormRequest;
use App\Http\Resources\CategoryCollection;
use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**  
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('categories.index', [ 'categories' => Category::orderBy('created_at' , 'asc')->paginate(25)]) ;
        // $this->success(Category::all()->orderBy('created_at' , 'desc')->paginate(25))
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.form', ['category' => new Category() ]) ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryFormRequest $request)
    {
        $category = Category::create($request->validated());
        toastr()->success("La catégorie a bien été créée ! ", 'Congrats', ['timeOut' => 8000]);

        return redirect()->route('category.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Category $category )
    {
        return view('categories.form', ['category' => $category]);
    }

   public function show( Category $category){

        return $this->success(new CategoryCollection($category));
   
    }
    public function update(CategoryFormRequest $request, Category $category)
    {
        $category->update($request->validated());
        toastr()->success("La catégorie à bien été modifier ! ", 'Congrats', ['timeOut' => 8000]);

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(  Category $category)
    {
        $category->delete();
        toastr()->success("La catégorie à été bien supprimmer ! ", 'Congrats', ['timeOut' => 8000]);
        
        return to_route('category.index');
    }
}
