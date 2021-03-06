<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
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
    public function __construct()
    {
        $this->middleware(['auth','admin'])->except('index');
    }

    public function index()
    {
        return User::where('isDoctor', true)->get();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->middleware(['auth','admin']);
        $this->validate($request,[
            'name'=>'required',
            'gender'=>'required',
            'specialization'=>'required',
            'start_year'=>'required|numeric',
            'institution'=>'required',
            'email'=>'required',
            'password'=>'min:8',
            'password_confirmation'=>'required_with:password|same:password|min:6',
            'image'=>'required|max:10000|mimes:jpeg,jpg'
        ]);

        $image = $request->file('image');
        $title = Str::slug($request->name);
        $date = Carbon::now()->toDateString();

        if(isset($image)){
            $ext = $image->getClientOriginalExtension();

            $imagename = $date.'-'.$title.'.'.$ext;

            if(!file_exists('images/doctors')){
                mkdir('images/doctors');
            }

            $image->move('images/doctors', $imagename);
        }else{
            $imagename = 'default.jpg';
        }

        $doctor = new User();
        $doctor->name = $request->name;
        $doctor->gender = $request->gender;
        $doctor->specialization = $request->specialization;
        $doctor->start_year = $request->start_year;
        $doctor->institution = $request->institution;
        $doctor->email = $request->email;
        $doctor->is_patient = false;
        $doctor->is_doctor = true;
        $doctor->password = Hash::make($request->password);
        $doctor->image = $imagename;

        $doctor->save();

        return response($request->name.' is now in the system', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return User::find($id);

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
        $this->validate($request,[
            'name'=>'required',
            'gender'=>'required',
            'specialization'=>'required',
            'start_year'=>'required|numeric',
            'institution'=>'required',
            'email'=>'required',
            'password'=>'required|min:8|max:30',
            'image'=>'required|image|max:3000'
        ]);

        $image = $request->file('image');

        if(isset($image)){
            $date = Carbon::now()->toDateString();
            $title = Str::slug($request->name);
            $ext = $image->getClientOriginalExtension();

            $imagename = $date.'-'.$title.'.'.$ext;

            if(!file_exists('images/doctors')){
                mkdir('images/doctors');
            }

            $image->move('images/doctors', $imagename);
        }else{
            $imagename = 'default.jpg';
        }

        $doctor = User::find($id);
        $doctor->name = $request->name;
        $doctor->gender = $request->gender;
        $doctor->specialization = $request->specialization;
        $doctor->start_year = $request->start_year;
        $doctor->institution = $request->institution;
        $doctor->email = $request->email;
        $doctor->password = Hash::make($request->password);
        $doctor->image = $imagename;

        $doctor->save();

        return redirect()->back()->with('successMsg', $request->name.' is has been edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor = User::find($id);
        $this->unlink('/images/doctors/'.$doctor->image);
        $doctor->delete();
        return response('Successfully Deleted'.$doctor->name);
    }
}
