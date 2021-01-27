@extends('layouts.app')

@php
    $doctors = App\Models\User::where('is_doctor', true)->get();
    $patients = App\Models\User::where('is_patient', true)->get();
    $symptoms = App\Models\Symptom::all();
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
                <h3>{{count($doctors)}}</h3>

                <p>Doctors Registered</p>
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
                <h3>{{count($patients)}}</h3>

                <p>Patients Registered</p>
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
                <h3>{{count($symptoms)}}</h3>

                <p>Symptom Interactions</p>
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

        </div>
    </section>

    <section class="col-lg-5">
        <div class="container-fluid">
            <x-doctor-create/>
        </div>
    </section>
</div>

@endsection
