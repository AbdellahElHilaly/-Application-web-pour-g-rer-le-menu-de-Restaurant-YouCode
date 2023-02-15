<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::orderBy('id','asc')->paginate();
        return view('categroies.index' , compact('categories'))->with(['title' =>'Category | Show']);
    }

    public function home(){
        $categories = Category::all();
        return response()->json($categories);
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

        // Check if category already exists
        $existingCategory = Category::where('name', $validatedData['name'])->first();
        if ($existingCategory) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Category already exists!'
                ]
            );
        }

        $category = new Category();
        $category->name = $validatedData['name'];
        $category->description = $validatedData['description'];
        $category->save();
        return response()->json(
            [
                'success' => true,
                'message' => 'Category created successfully!'
            ]
        );
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

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index' );
    }

    public function destroyAll()
    {
        try {
            DB::statement('SET FOREIGN_KEY_CHECKS = 0');
            Menu::truncate();
            Category::truncate();
            DB::statement('SET FOREIGN_KEY_CHECKS = 1');

            return redirect()->back()->with('success', 'All categories have been deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error deleting categories: ' . $e->getMessage());
        }
    }


}
