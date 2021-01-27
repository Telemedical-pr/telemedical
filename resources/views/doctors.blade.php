@extends('layouts.app')

@php
    $doctors = App\Models\User::where('is_doctor', true)->get();
@endphp

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Doctors</h1>
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
            <div class="col-md-11">
                <!-- USERS LIST -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Doctors</h3>

                    <div class="card-tools">
                      <span class="badge badge-primary"> @if (count($doctors) > 1)
                        {{count($doctors)}} Doctors
                          @elseif(count($doctors) == 1)
                          {{count($doctors)}} Doctor
                          @else
                          No Doctor's registered
                      @endif</span>
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0" style="display: block;">
                    <ul class="users-list clearfix">
                      @foreach ($doctors as $doctor)
                      <li>
                        <img src="/images/doctors/{{$doctor->image}}" width="100px" alt="Doctor Image">
                        <a class="users-list-name" data-toggle="modal" data-target="#modelId" href="#">{{$doctor->name}}</a>
                        <span class="users-list-date">{{$doctor->docSpecialization->category}}</span>
                        <span class="users-list-date">{{$doctor->getAge()}} Years old</span>
                      </li>
                      <!-- Button trigger modal -->
                      <!-- Modal -->
                      <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                              <div class="modal-content">

                                  <div class="modal-body">
                                      <div class="container-fluid">
                                          <x-docscard profileImage="{{$doctor->image}}" name="{{$doctor->name}}" spec="{{$doctor->docSpecialization->category}}"  />
                                      </div>
                                      <div class="container-fluid">
                                        <div class="card my-2 bg-dark text-white">
                                            <h5 class="text-center my-2 font-italic"><u>Doctor's Details</u></h5>
                                            <div class="row justify-content-between">
                                                <div class="col-md-6 col-12">
                                                    <div class="m-3">
                                                        <b>Age: </b>{{$doctor->getAge()}} Years Old
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="m-3">
                                                        <b>Consultations: </b>{{count($doctor->docVisits)}} Patient Visits
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="m-3">
                                                        <b>Online Consultations: </b>{{count($doctor->docOnline)}} Patient Requests
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="m-3">
                                                        <b>Years of Experience: </b>{{$doctor->docExperience()}} Years
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="m-3">
                                                        <b>Current Institution: </b>{{$doctor->institution}} Years
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                      </div>
                                  </div>

                              </div>
                          </div>
                      </div>

                      @endforeach

                    </ul>
                    <!-- /.users-list -->
                  </div>
                  <!-- /.card-body -->

                  <!-- /.card-footer -->
                </div>
                <!--/.card -->
              </div>
        </div>
    </div>
</section>

@endsection
