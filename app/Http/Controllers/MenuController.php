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
        return view('menus.add' )->with(['title' =>'Menue | Add']);

    }


    public function store(Request $request)
    {
        Menu::create($request->post());
        return redirect()->route('menue.index')->with(['title' =>'Menue | Show']);
    }

    public function show(Menu $menu)
    {
        //
    }

    public function edit(Menu $menu)
    {
        return view('menus.edit' , compact('menu'))->with(['title' =>'Menue | Edit']);
    }

    public function update(Request $request, Menu $menu)
    {
        $menu->fill($request->post())->update();

        return redirect()->route('menue.index' );
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('menue.index' );
    }
}

