<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return response()->json($categories);
    }

    public function home(){
        $categories = Category::orderBy('id','asc')->paginate();
        return view('categroies.index' , compact('categories'))->with(['title' =>'Category | Show']);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'description' => 'nullable'
        ],
        [
            'name.required' => 'required!!',
            'name.max' => 'max 255 chr !!',
        ]
        );

        $category = new Category();
        $category->name = $validatedData['name'];
        $category->description = $validatedData['description'];
        $category->save();

        return response()->json(['message' => 'Category created successfully!']);
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
