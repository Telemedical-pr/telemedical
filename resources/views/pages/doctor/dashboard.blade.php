@extends('layouts.app')

@php
    $appointments = App\Models\Visit::where('doctor_id', auth()->user()->id)->get();
    $prescriptions = DB::table('prescriptions')->join('symptoms', 'symptoms.id', '=', 'prescriptions.symptom_id')->join('users', 'users.id', '=', 'symptoms.doctor_id')->get();
    $diagnosis = DB::table('diagnoses')->join('visits', 'visits.id', '=', 'diagnoses.visit_id')->join('users', 'users.id', '=', 'visits.doctor_id')->get();
@endphp

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
      <div class="row justify-content-center">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>{{count($appointments)}}</h3>

                <p>Appointments</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-white border border-primary shadow-sm">
              <div class="inner">
                <h3>{{count($prescriptions)}}</h3>

                <p>Prescriptions Given</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>{{count($diagnosis)}}</h3>

                <p>Diagnosis Given</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
    </div>
</section>

<hr class="m-5">

<div class="row">
    <section class="col-lg-7">
        <div class="container-fluid">
            <x-doctors-history/>

        </div>
    </section>

    <section class="col-lg-5">
        <div class="container-fluid">
            <x-patient-symptoms/>
        </div>
    </section>
</div>

@endsection
