<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{

    public function index()
    {
        $restaurants = Restaurant::all();
        return view('viewAll', compact('restaurants'));
    }
    /**
     * Display a listing of the resource.
     */


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function search(Request $request)
    {
        $query = $request->input('q');

        $restaurants = Restaurant::where('Name', 'like', "%$query%")
            ->orWhere('Cuisine', 'like', "%$query%")
            ->orWhere('County', 'like', "%$query%")
            ->get();

        return view('searchResults', compact('restaurants', 'query'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }
    public function italian()
    {
        $italianRestaurants = Restaurant::where('Cuisine', 'Italian')->get();
        return view('italian', ['italianRestaurants' => $italianRestaurants]);
    }
    public function mexican()
    {
        $mexicanRestaurants = Restaurant::where('Cuisine', 'Mexican')->get();
        return view('mexican', ['mexicanRestaurants' => $mexicanRestaurants]);
    }
    public function indian()
    {
        $indianRestaurants = Restaurant::where('Cuisine', 'Indian')->get();
        return view('Indian', ['indianRestaurants' => $indianRestaurants]);
    }

    //HERE 
    public function popular()
    {
        $restaurants = Restaurant::inRandomOrder()->limit(10)->get();
        return view('popular', compact('restaurants'));
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
