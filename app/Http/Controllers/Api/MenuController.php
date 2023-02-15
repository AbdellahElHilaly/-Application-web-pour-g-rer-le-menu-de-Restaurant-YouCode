<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Menu;

class MenuController extends Controller
{
    use ApiResponceTrait;
    public function index()
    {
        return $this->apiResponse(Menu::get() , "ok" , 200);
    }

    public function show($id)
    {
        $menu = Menu::find($id);

        if (!$menu) {
            return $this->apiResponse(null, 'Menu not found', 404);
        }

        return $this->apiResponse($menu, 'OK', 200);
    }


}
