<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VisitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Visit::all();
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
            'doctor'=>'required',
            'reason'=>'required',
            'appointment_dateTime'=>'required'
        ]);

        $existing = Visit::where('doctor_id', $request->doctor)->get();
        $lowertime_range = (Carbon::parse($request->appointment_dateTime)->timestamp)-3600;
        $uppertime_range = (Carbon::parse($request->appointment_dateTime)->timestamp)+3600;

        for ($i=0; $i < count($existing); $i++) {
            if ((Carbon::parse($existing[$i]->appointment_dateTime)->timestamp) >= $lowertime_range && (Carbon::parse($existing[$i]->appointment_dateTime)->timestamp) <= $uppertime_range) {
                return response("You can't reserve at this time. The doctor already has an appointment!", 409);
            }
        }


        $visit = new Visit();
        $visit->doctor_id = $request->doctor;
        $visit->reason = $request->reason;
        $visit->appointment_dateTime = $request->appointment_dateTime;
        $visit->patient_id = auth()->user()->id;

        $visit->save();

        return response('Successfully made an appointment with the doctor', 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Visit::find($id);
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
            'doctor'=>'required',
            'reason'=>'required',
            'appointment_dateTime'=>'required'
        ]);

        $existing = Visit::where('doctor_id', $request->doctor)->get();
        $lowertime_range = (Carbon::parse($request->appointment_dateTime)->timestamp)-3600;
        $uppertime_range = (Carbon::parse($request->appointment_dateTime)->timestamp)+3600;

        for ($i=0; $i < count($existing); $i++) {
            if ((Carbon::parse($existing[$i]->appointment_dateTime)->timestamp) >= $lowertime_range && (Carbon::parse($existing[$i]->appointment_dateTime)->timestamp) <= $uppertime_range) {
                return response("You can't reserve at this time. The doctor already has an appointment!", 409);
            }
        }


        $visit = Visit::find($id);
        $visit->doctor_id = $request->doctor;
        $visit->reason = $request->reason;
        $visit->appointment_dateTime = $request->appointment_dateTime;

        $visit->save();

        return response('Successfully updated your appointment with the doctor', 200);
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
