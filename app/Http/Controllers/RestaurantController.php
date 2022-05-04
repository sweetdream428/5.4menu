<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use Exception;


class RestaurantController extends Controller
{

    public function index()
    {
        $restaurants = Restaurant::get();
        return view('restaurants.index')->with('restaurants', $restaurants);
    }  
    
}