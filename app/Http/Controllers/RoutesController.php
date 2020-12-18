<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoutesController extends Controller
{
    public function homepage()
    {
        return view('welcome');
    }

}
