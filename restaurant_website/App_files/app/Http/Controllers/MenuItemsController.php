<?php

namespace App\Http\Controllers;

use App\Models\Menu_Item;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class MenuItemsController extends Controller
{
    public function show($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $menuItems = Menu_Item::where('restaurant_id', $id)->get();
        return view('menus.show', compact('restaurant', 'menuItems'));
    }
}
