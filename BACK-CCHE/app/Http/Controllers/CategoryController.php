<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryFormRequest;
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
        return redirect()->route('category.index')->with('success', "La catégorie a bien été créée !");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Category $category )
    {
        return view('categories.form', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryFormRequest $request, Category $category)
    {
        $category->update($request->validated());
        return redirect()->route('category.index')->with('success',  "La catégorie à bien été modifier !");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(  Category $category)
    {
        $category->delete();
        return to_route('category.index')->with('success',"La catégorie à été bien supprimmer !");
    }
}
