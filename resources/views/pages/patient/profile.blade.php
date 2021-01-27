@extends('layouts.app')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Profile</h1>
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
        <div class="row justify-content-cemter">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                  <div class="card-body box-profile">
                    <div class="text-center">
                      <img class="profile-user-img img-fluid img-circle" src="/images/patients/{{auth()->user()->image}}" alt="{{auth()->user()->name}}'s profile picture">
                    </div>

                    <h3 class="profile-username text-center">@if(auth()->user()->is_doctor) Dr.  @endif{{ auth()->user()->name }}</h3>

                    <div class="row">
                        <div class="col-md-6 col-12">{{auth()->user()->getAge()}}</div>
                        <div class="col-md-6 col-12">{{Carbon\Carbon::parse(auth()->user()->DOB)->toDateString()}}</div>
                    </div>

                    <ul class="list-group list-group-unbordered mb-3">
                      <li class="list-group-item">
                        <b>Symptoms Registered</b> <a class="float-right">{{count(auth()->user()->symptoms)}} </a>
                      </li>
                      <li class="list-group-item">
                        <b>Visits Made</b> <a class="float-right">{{count(auth()->user()->patientVisits)}}</a>
                      </li>
                    </ul>
                  </div>
                  <!-- /.card-body -->
                </div>
            </div>
                <!-- /.card -->
            <div class="col-md-5" >
                <!-- About Me Box -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title text-center">About Me</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <strong> <i class="fas fa-ruler"></i> Height</strong>

                    <p class="text-muted">
                        @if (auth()->user()->last_height != null)
                        {{auth()->user()->last_height}} {{auth()->user()->unit_height}}
                        @else
                        Not Set
                        @endif
                    </p>

                    <hr>

                    <strong><i class="fas fa-balance-scale"></i> Weight</strong>

                    <p class="text-muted">
                        @if (auth()->user()->last_weight != null)
                        {{auth()->user()->last_weight}} {{auth()->user()->unit_weight}}
                        @else
                        Not Set
                        @endif
                    </p>

                    <hr>

                    <strong><i class="fas fa-pencil-alt mr-1"></i> BMI</strong>

                    <p class="text-muted">
                        @if (auth()->user()->getBMI() != null)
                        {{number_format(auth()->user()->getBMI(), 2)}}
                        @else
                        Height and or Weight Not Set
                        @endif
                    </p>

                    <hr>

                    <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                    <p class="text-muted">{{auth()->user()->getVerdict()}}</p>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
            <div class="col-md-4" >
                <!-- About Me Box -->
                <div class="card card-primary" style="transition: all 0.15s ease 0s; height: inherit; width: inherit;">
                    <div class="card-header">
                      <h3 class="card-title">Profile Update</h3>

                      <div class="card-tools">

                        <button type="button" class="btn btn-tool" data-card-widget="maximize">
                          <i class="fas fa-expand"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-minus"></i>
                        </button>
                      </div>
                      <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <form id="patientProfile">
                          <div class="form-group">
                            <label for="gender">Gender</label>
                            <select name="gender" class="form-control" id="gender">
                                <option selected disabled>Choose your Gender</option>
                                <option value="male">male</option>
                                <option value="female">female</option>
                            </select>
                            <small id="gender" class="text-muted">Select Your Gender</small>
                          </div>
                          <div class="form-group">
                            <label for="image">Profile Image</label>
                            <input type="file" name="image" id="profileImage" class="form-control" placeholder="Choose a Suitable Image" aria-describedby="image">
                            <small id="image" class="text-muted">Choose a file that is either PNG or JPG</small>
                          </div>
                          <div class="form-group">
                            <label for="DOB">Date of Birth</label>
                            <input type="date" name="DOB" id="DOB" class="form-control" placeholder="Select your Date of Birth" aria-describedby="DOB">
                            <small id="DOB" class="text-muted">There is no age restriction</small>
                          </div>
                          <div class="form-group">
                            <label for="last_temp">Last Recorded Temperature</label>
                            <input type="number" step="0.01" min="0" name="last_temp" id="last_temp" class="form-control" placeholder="Enter Your Last Recorded temperature" aria-describedby="last_temp">
                            <small id="last_temp" class="text-muted">This will always be in Celsius</small>
                          </div>
                          <div class="form-group">
                            <label for="last_weight">Last Recorded Weight</label>
                            <div class="row">
                                <div class="col-md-9 pr-0">
                                    <input type="number" min="0.00" name="last_weight" id="last_weight" class="form-control" placeholder="Enter your last Recorded weight" aria-describedby="last_weight">
                                </div>
                                <div class="col-md-3 m-0 pl-0">
                                    <select class="form-control p-0" name="unit_weight" id="unit_weight">
                                        <option selected disabled>Units</option>
                                        <option value="KG">Kilograms</option>
                                        <option value="LBS">Pounds</option>
                                    </select>
                                </div>
                            </div>
                            <small id="last_weight" class="text-muted">Enter your last recorded weight</small>
                          </div>
                          <div class="form-group">
                            <label for="last_height">Last Recorded Height</label>
                            <div class="row">
                                <div class="col-md-9 pr-0">
                                    <input type="number" name="last_height" id="last_height" class="form-control" placeholder="Enter your last Recorded height" aria-describedby="last_height">
                                </div>
                                <div class="col-md-3 m-0 pl-0">
                                    <select class="form-control p-0" name="unit_height" id="unit_height">
                                        <option selected disabled>Units</option>
                                        <option value="CM">Centimeters</option>
                                        <option value="FT">Feet</option>
                                    </select>
                                </div>
                            </div>
                            <small id="last_height" class="text-muted">Enter your last recorded height</small>
                          </div>
                          <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                  </div>
                    <!-- /.card-body -->
                  </div>
                <!-- /.card -->
              </div>
        </div>
    </div>
</section>

@endsection
