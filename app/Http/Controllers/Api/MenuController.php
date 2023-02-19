<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MenuResourece;
use App\Http\Requests\CreateMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use App\Models\Menu;
use Clockwork\Request\Request;

class MenuController extends Controller
{
    use ApiResponceTrait;

    public function index()
    {
        $menus = MenuResourece::collection(Menu::get());
        return $this->apiResponse($menus);
    }


    public function show($id)
    {
        $menu = Menu::find($id);
        if ($menu === null) {
            return $this->apiResponse(null);
        }
        return $this->apiResponse(new MenuResourece($menu));

    }

    public function store(CreateMenuRequest $request)
    {
        $validated = $request->validated();
        $menu = Menu::create($validated);

        if ($menu) {
            return $this->apiResponse(new MenuResourece($menu), 201, "Saved successfully");
        } else {
            return $this->apiResponse(null, 500, "Error saving menu");
        }
    }

    public function update(UpdateMenuRequest $request, $id)
    {

        $menu = Menu::findOrFail($id);


        $updatedMenu = $menu->update($request->validated());

        if ($updatedMenu) {
            return $this->apiResponse(new MenuResourece($menu), 200, "Menu updated successfully");
        } else {
            return $this->apiResponse(null, 400, "Error updating menu");
        }
    }





}








