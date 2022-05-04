<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception;


class SettingController extends Controller
{

    public function index()
    {
        $id = Auth::user()->id;

        // return view('settings.index');
    }  
    
}