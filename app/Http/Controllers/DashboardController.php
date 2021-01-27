<?php

namespace App\Http\Controllers;

use App\Models\Visits;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('dashboard');
        // return Visits::paginate(5);
    }


    public function doctors()
    {
        return view('doctors');
    }

    public function systemUsers()
    {
        return view('pages.admin.system-users');
    }

    public function profile()
    {
        return view('profile');
    }


    public function uploadLogo(Request $request){
        $this->validate($request,[
            'logo'=>'required|mimes:png'
        ]);
        $image = $request->file('logo');
        if(isset($image)){
            if(!file_exists('images')){
                mkdir('images');
            }

            $ext = $image->getClientOriginalExtension();
            $image->move('images','logo.png');

            return response('Successfully Uploaded a new logo', 200);
        }else{
            return response('Image is Required and it is not found', 404);
        }
    }

}


