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



    public function prescriptions()
    {
        return view('prescriptions.index');
    }
    public function doctors()
    {
        return view('pages.patient.doctors');
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


