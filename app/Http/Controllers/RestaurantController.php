<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Page;
use Exception;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{

    public function index()
    {
        $restaurants = Restaurant::where('owner', Auth::user()->id)->get();
        $pages = Page::where('owner', Auth::user()->id)->get();
        return view('restaurants.index')->with('restaurants', $restaurants)->with('pages', $pages);
    }  
    
    public function create(Request $request)
    {
        try{
            $restaurant = new Restaurant;
            $restaurant->name = $request->name;
            $restaurant->address = $request->address;
            $restaurant->menu_id = $request->menu_id;
            $restaurant->owner = Auth::user()->id;
            $restaurant->save();
            
            $id = $restaurant->id;
            return response()->json(['success'=>$id, 'name'=>$request->name, 'address'=>$request->address, 'menu_id'=>$request->menu_id]);
        }
        catch(Exception $e){
            return response()->json(['success'=>false]);
        }
    }

    public function update(Request $request)
    {
        try{
            $id = $request->id;
            Restaurant::where('id', $id)->update([
                'name' => $request->name ? $request->name : '',
                'address' => $request->address ? $request->address : '',
                'menu_id' => $request->menu_id ? $request->menu_id : ''
            ]);

            return response()->json(['success'=>$id, 'name'=>$request->name, 'address'=>$request->address, 'menu_id'=>$request->menu_id]);
        }
        catch(Exception $e){
            return response()->json(['success'=>false]);
        }
    }
    
    public function remove($id){
        try{
            Restaurant::where('id', $id)->delete();
            return response()->json(['success'=>true]);
        }
        catch(Exception $e){
            return response()->json(['success'=>false]);
        }
    }
}