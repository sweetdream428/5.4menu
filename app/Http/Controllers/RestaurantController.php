<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Page;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
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

            return response()->json(['success'=>true]);
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

    public function view($id)
    {
        $restaurants = Restaurant::where('id', $id)->get();
        $menu_id = $restaurants[0]->menu_id;
        $pages = Page::where('id', $menu_id)->get();
        foreach($pages as $page){
            $pagename = $page->name;
            $pid = $page->id;
            $categories = Category::where('page_id', $pid)->orderBy('sequence')->get();
            $firstids = DB::table('categories')->where('page_id', $pid)->orderBy('id')->get('id')->count() ? DB::table('categories')->where('page_id', $pid)->orderBy('sequence')->get('id') : '';
            $firstid = $firstids ? $firstids[0]->id : '';
            return view('mainpages.'.$pagename.'.index')->with('pages', $pages)->with('categories', $categories)->with('firstid', $firstid);
        }
        
    }
}