<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('patient')->only('patientUpdate');
        $this->middleware('doctor')->only('doctorUpdate');
    }


    /**
     * Patient's Update Function
     */

    public function patientUpdate(Request $request)
    {
        $this->validate($request, [
            'image'=>'mimes:png,jpg|nullable',
        ]);

        $patient = User::find(auth()->user()->id);

        $image = $request->file('image');
        if(isset($image)){
            $date = Carbon::now()->toDateString();
            $title = Str::slug(auth()->user()->name);
            $ext = $image->getClientOriginalExtension();

            $imagename = $date.'-'.$title.'.'.$ext;

            if(!file_exists('images/patients')){
                mkdir('images/patients', 0777, true);
            }

            $image->move('images/patients', $imagename);
            if(auth()->user()->image != 'default.jpg' && file_exists('/images/doctors/'.auth()->user()->image)){
                unlink('/images/patients/'.auth()->user()->image);
            }


        }else{
            $imagename = auth()->user()->image;
        }

        $patient->image = $imagename;

        if ($request->DOB != null) {
            $patient->DOB = $request->DOB;
        }
        if ($request->gender != null) {
            $patient->gender = $request->gender;
        }
        if ($request->last_temp != null) {
            $patient->last_temp = $request->last_temp;
        }
        if ($request->last_weight != null) {
            $patient->last_weight = $request->last_weight;
        }
        if ($request->last_height != null) {
            $patient->last_height = $request->last_height;
        }
        if ($request->unit_weight != null) {
            $patient->unit_weight = $request->unit_weight;
        }
        if ($request->unit_height != null) {
            $patient->unit_height = $request->unit_height;
        }


        $patient->save();

        return response('Successfully Updated your Details into the system', 200);

    }

    /**
     * Doctor's Update Function
     */

    public function doctorUpdate(Request $request)
    {
        $this->validate($request, [
            'institution'=>'required',
            'start_year'=>'required',
            'image'=>'mimes:png,jpg|nullable',
        ]);

        $doctor = User::find(auth()->user()->id);
        $image = $request->file('image');
        if(isset($image)){
            $date = Carbon::now()->toDateString();
            $title = Str::slug(auth()->user()->name);
            $ext = $image->getClientOriginalExtension();

            $imagename = $date.'-'.$title.'.'.$ext;

            if(!file_exists('images/doctors')){
                mkdir('images/doctors', 0777, true);
            }

            $image->move('images/doctors', $imagename);
            if(auth()->user()->image != 'default.jpg' && file_exists('/images/doctors/'.auth()->user()->image)){
                unlink('/images/doctors/'.auth()->user()->image);
            }

        }else{
            $imagename = 'default.jpg';
        }

        $doctor->institution = $request->institution;
        $doctor->start_year = $request->start_year;
        $doctor->image = $imagename;

        $doctor->save();

        return response('Successfully Updated your Details', 200);


    }



}
