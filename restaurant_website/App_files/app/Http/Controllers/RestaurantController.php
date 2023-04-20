<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Models\Location;

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
        $locations = Location::all();
        return view('createAdvertisement', ['locations' => $locations]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /*
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'cuisine' => 'required|string|max:255',
            'county' => 'required|string|max:255',
            'rating' => 'required|integer',
            'bio' => 'required|string',
            'price_range' => 'required|integer',
            'location_id' => 'required|exists:locations,id',
            'image' => 'nullable|image|max:2048',
        ]);
        dd($validatedData);*/

        $restaurant = new Restaurant;
        $restaurant->name = $request->input('Name');
        $restaurant->cuisine = $request->input('Cuisine');
        $restaurant->county = $request->input('County');
        $restaurant->rating = $request->input('Rating');
        $restaurant->bio = $request->input('Bio');
        $restaurant->price_range = 4;
        $restaurant->location_id = $request->input('Location_id');

        // $restaurant->cuisine = $validatedData['Cuisine'];
        // $restaurant->county = $validatedData['County'];
        // $restaurant->rating = $validatedData['Rating'];
        // $restaurant->bio = $validatedData['Bio'];
        // $restaurant->price_range = 4;
        // $restaurant->location_id = $validatedData['location_id'];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/images', $filename);
            $restaurant->image = $filename;
        }

        $restaurant->save();

        return redirect()->route('welcome');
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
        $popularRestaurants = Restaurant::inRandomOrder()->take(6)->get();

        return view('popular', compact('popularRestaurants'));
    }





    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
