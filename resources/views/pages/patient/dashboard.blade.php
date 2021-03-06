@extends('layouts.app')

@php
    $symptoms = App\Models\Symptom::where('patient_id', auth()->user()->id)->get();
    $prescriptions = DB::table('prescriptions')->join('symptoms', 'symptoms.id', '=' ,'prescriptions.symptom_id')->join('users', 'users.id', '=' ,'symptoms.patient_id')->where('users.id', auth()->user()->id)->get();
    $visits = App\Models\Visit::where('patient_id', auth()->user()->id)->get();
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
                  <h3>{{count($symptoms)}}</h3>

                  <p>Symptoms Sent</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="/symptoms" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                <a href="/prescriptions" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
              <!-- small box -->
              <div class="small-box bg-primary">
                <div class="inner">
                  <h3>{{count($visits)}}</h3>

                  <p>Visits Made</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="/visits" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>
      </div>
  </section>

  <hr class="m-4">
  <div class="row">
      <section class="col-lg-7 connectedSortable ui-sortable">
          <div class="container-fluid">
            <x-recent-visits/>
            <x-recent-symptoms/>
          </div>
      </section>

      <section class="col-lg-5 connectedSortable ui-sortable">

      </section>
  </div>
@endsection
