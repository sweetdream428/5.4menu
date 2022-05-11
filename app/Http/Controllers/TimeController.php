<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Auth;

class TimeController extends Controller
{

    public function index($id)
    {
        // $pages = Category::where('id', $id)->get();
        return view('time.index');
    } 
    
    
}