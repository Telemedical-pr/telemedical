<?php

namespace App\Http\Controllers;

use App\Models\Symptom;
use Illuminate\Http\Request;

class SymptomsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Symptom::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'symptom'=>'required',
            'doctor'=>'required'
        ]);

        $symptom = new Symptom();
        $symptom->doctor_id = $request->doctor;
        $symptom->symptom = $request->symptom;
        $symptom->patient_id = auth()->user()->id;

        $symptom->save();

        return response('Successfully submitted your symptoms. Please wait for the doctor to respond', 200 );

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Symptom::find($id);
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
        $this->validate($request, [
            'symptom'=>'required',
            'doctor'=>'required'
        ]);

        $symptom = Symptom::find($id);
        $symptom->doctor_id = $request->doctor;
        $symptom->symptom = $request->symptom;
        $symptom->patient_id = auth()->user()->id;

        $symptom->save();

        return response('Successfully updated your symptoms submission. Please wait for the doctor to respond', 200 );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Symptom::find($id)->delete();
        return response('Successfully Deleted your Symptoms submission');
    }
}
