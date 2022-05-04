<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Page;
use Exception;


class RestaurantController extends Controller
{

    public function index()
    {
        $restaurants = Restaurant::get();
        $pages = Page::get();
        return view('restaurants.index')->with('restaurants', $restaurants)->with('pages', $pages);
    }  
    
    public function create(Request $request)
    {
        try{
            $page = new Page;
            $page->category_id = $request->category_id;
            $page->title = $request->title ? $request->title : '';
            $page->description = $request->description ? $request->description : '';
            $page->number = $request->number ? $request->number : '';
            $page->save();
            
            $id = $page->id;
            return response()->json(['success'=>$id]);
        }
        catch(Exception $e){
            return response()->json(['success'=>false]);
        }
        $restaurants = Restaurant::get();
        $pages = Page::get();
        return view('restaurants.index')->with('restaurants', $restaurants)->with('pages', $pages);
    }  
}