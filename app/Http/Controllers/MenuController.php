<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::orderBy('id','asc')->paginate();
        return view('menus.index' , compact('menus'))->with(['title' =>'Menue | Show']);
    }





    public function create()
    {
        return view('menus.add' )->with(
            [
                'title' =>'Menue | Add',
                'formTitle' => 'Add Menu',
                'formAction' => route('menue.store'),
                'formMethod' => 'POST',
                'menu' => new Menu,
            ]
        );
    }

    public function store(Request $request)
    {


        $request->validate(
            [
                'name' => 'required|min:3|max:15',
                'description' => 'required',
                'price' => [
                    'required',
                    'numeric',
                    'regex:/^\d{0,8}(\.\d{0,2})?$/',
                ],
                'category_id' => 'required|integer',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            [
                'name.min' => 'The name must be at least 3 characters long.',
                'name.max' => 'The name may not be greater than 15 characters.',
                'description.required' => 'A description is required for the menu item.',
                'price.required' => 'A price is required for the menu item.',
                'price.numeric' => 'The price must be a number.',
                'price.regex' => 'The price format must be ########.##.',
                'category_id.required' => 'A category is required for the menu item.',
                'category_id.integer' => 'The category must be an integer.',
                'image.required' => 'An image is required for the menu item.',
                'image.image' => 'The uploaded file must be an image.',
                'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif, svg.',
                'image.max' => 'The image may not be larger than 2048 kilobytes.',
            ]
        );

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('images/plats'), $imageName);
            $validatedData['image'] = $imageName;
        }

        Menu::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'image' => $imageName,
            'category_id' => $request->input('category_id'),
            'updated_at' => now(),
            'created_at' => now()
        ]);


        return redirect()->route('menue.index')->with(['title' =>'Menue | Show']);


    }

    public function show(Menu $menu)
    {
        //
    }

    public function edit(Menu $menu)
    {
        return view('menus.edit', [
            'menu' => $menu,
            'title' => 'Menue | Edit',
            'formTitle' => 'Edit Menu',
            'formAction' => route('menue.update', $menu->id),
            'formMethod' => 'PUT',
        ]);
    }


    public function update(Request $request, Menu $menu)
    {
        $request->validate(
            [
                'name' => 'required|min:3|max:15',
                'description' => 'required',
                'price' => [
                    'required',
                    'numeric',
                    'regex:/^\d{0,8}(\.\d{0,2})?$/',
                ],
                'category_id' => 'required|integer',
            ],
            [
                'name.min' => 'The name must be at least 3 characters long.',
                'name.max' => 'The name may not be greater than 15 characters.',
                'description.required' => 'A description is required for the menu item.',
                'price.required' => 'A price is required for the menu item.',
                'price.numeric' => 'The price must be a number.',
                'price.regex' => 'The price format must be ########.##.',
                'category_id.required' => 'A category is required for the menu item.',
                'category_id.integer' => 'The category must be an integer.',
            ]
        );

        $validatedData = $request->only(['name', 'description', 'price', 'category_id']);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('images/plats'), $imageName);
            $validatedData['image'] = $imageName;
        }else {
            $validatedData['image'] = $menu->image;
        }

        $menu->update($validatedData);

        return redirect()->route('menue.index');
    }


    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('menue.index' );
    }
}

