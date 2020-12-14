<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DoctorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('doctors.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doctors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'gender'=>'required',
            'specialization'=>'required',
            'start_year'=>'required|numeric',
            'institution'=>'required',
            'email'=>'required',
            'password'=>'required|min:8|max:30',
            'profileImage'=>'required|mimes:jpg,jpeg|max:3000'
        ]);

        $image = $request->file('profileImage');

        if(isset($image)){
            $date = Carbon::now()->toDateString();
            $title = Str::slug($request->name);
            $ext = $image->getClientOriginalExtension();

            $imagename = $date.'-'.$title.'.'.$ext;

            if(!file_exists('images/doctors')){
                mkdir('images/doctors');
            }

            $image->move('images/doctors', $imagename);
        }

        $doctor = new Doctor();
        $doctor->name = $request->name;
        $doctor->gender = $request->gender;
        $doctor->specialization = $request->specialization;
        $doctor->start_year = $request->start_year;
        $doctor->institution = $request->institution;
        $doctor->email = $request->email;
        $doctor->password = Hash::make($request->password);
        $doctor->profileImage = $imagename;

        $doctor->save();

        return redirect()->back()->with('successMsg',$request->name.' is now in the system');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doctor = Doctor::find($id);
        return view('doctors.edit')->with('doctor', $doctor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
