@extends('layouts.app')

@php
    $patients = App\Models\User::where('is_patient', true)->get();
    $doctors = App\Models\User::where('is_doctor', true)->get();
@endphp

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">System Users</h1>
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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Doctors' List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                      <table class="table table-hover text-nowrap">
                        <thead>
                          <tr>
                            <th class="text-center">User ID</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Age</th>
                            <th class="text-center">Years of Experience</th>
                            <th class="text-center">Specialization</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($doctors as $doctor)
                          <tr>
                            <td class="text-center">{{$doctor->id}}</td>
                            <td class="text-center">Dr. {{$doctor->name}}</td>
                            <td class="text-center">{{$doctor->getAge()}} Years</td>
                            <td class="text-center">{{$doctor->docExperience()}} Years</td>
                            <td class="text-center">{{$doctor->docSpecialization->category}}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Patients' List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                      <table class="table table-hover text-nowrap">
                        <thead>
                          <tr>
                            <th class="text-center">User ID</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Age</th>
                            <th class="text-center">BMI</th>
                            <th class="text-center">Last Recorded Temperature (&#176C)</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($patients as $patient)
                          <tr>
                            <td class="text-center">{{$patient->id}}</td>
                            <td class="text-center">{{$patient->name}}</td>
                            <td class="text-center">{{$patient->getAge()}} Years</td>
                            <td class="text-center">{{number_format($patient->getBMI(), 2)}}</td>
                            <td class="text-center">{{$patient->last_temp}}<b>&#176C</b></td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
            </div>
        </div>
    </div>
</section>
@endsection
