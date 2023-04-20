<?php



namespace App\Http\Controllers;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Reservation;



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

        $restaurant = new Restaurant;
        $restaurant->name = $request->input('Name');
        $restaurant->cuisine = $request->input('Cuisine');
        $restaurant->county = $request->input('County');
        $restaurant->rating = $request->input('Rating');
        $restaurant->bio = $request->input('Bio');
        $restaurant->price_range = 4;
        $restaurant->location_id = $request->input('Location_id');


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/images', $filename);
            $restaurant->image = $filename;
        }

        $image->storeAs('public\images', $filename);
        $restaurant->user_id = Auth::id();
        $restaurant->save();

        return redirect()->route('Restaurants.index');
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

    public function viewBookings()
    {
        $user = auth()->user();
        $restaurants = Restaurant::where('user_id', $user->id)->pluck('id');

        $bookings = Reservation::whereIn('restaurant_id', $restaurants)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('viewBookings', compact('bookings'));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $restaurant->delete();
        return redirect()->route('userAds')->with('success', 'Advertisement deleted successfully');
    }
    public function getAds()
    {
        $user = auth()->user();

        $restaurants = Restaurant::whereHas('user', function ($query) use ($user) {
            $query->where('id', $user->id);
        })->get();

        // dd($restaurants);
        return view('userAdvertisements', compact('restaurants'));
    }
    public function edit($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        return view('editAdvertisement', compact('restaurant'));
    }

    public function update(Request $request, $id)
    {
        $restaurant = Restaurant::find($id);
        $restaurant->Name = $request->input('Name');
        $restaurant->County = $request->input('County');
        $restaurant->Bio = $request->input('Bio');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save(public_path('images/' . $filename));
            $restaurant->image = $filename;
        }
        $restaurant->save();
        return redirect('user-ads')->with('success', 'Advertisement updated successfully');
    }
}
