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
                      <img class="profile-user-img img-fluid img-circle" src="/images/doctors/{{auth()->user()->image}}" alt="{{auth()->user()->name}}'s profile picture">
                    </div>

                    <h3 class="profile-username text-center">@if(auth()->user()->is_doctor) Dr.  @endif{{ auth()->user()->name }}</h3>

                    <div class="row">
                        <div class="col-md-6 col-12"><b>Age: </b><br>{{auth()->user()->getAge()}}</div>
                        <div class="col-md-6 col-12"><b>Date of Birth: </b><br>{{Carbon\Carbon::parse(auth()->user()->DOB)->toDateString()}}</div>
                    </div>

                    <ul class="list-group list-group-unbordered mb-3">
                      <li class="list-group-item">
                        <b>Online Consultations</b> <a class="float-right">{{count(auth()->user()->docOnline()->get())}} </a>
                      </li>
                      <li class="list-group-item">
                        <b>Physical Consultations</b> <a class="float-right">{{count(auth()->user()->docVisits()->get())}}</a>
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
                    <strong> <i class="fas fa-hospital"></i> Institution</strong>

                    <p class="text-muted">
                        @if (auth()->user()->institution != null)
                        {{auth()->user()->institution}}
                        @else
                        Not Set
                        @endif
                    </p>

                    <hr>

                    <strong><i class="fas fa-balance-scale"></i> Years of Experience</strong>

                    <p class="text-muted">
                        @if (auth()->user()->docExperience() != null)
                        {{auth()->user()->docExperience()}}
                        @else
                        Not Set Start Year
                        @endif
                    </p>

                    <hr>
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
                      <form id="doctorProfile">
                          <div class="form-group">
                            <label for="image">Profile Image</label>
                            <input type="file" name="image" id="profileImage2" class="form-control" placeholder="Choose a Suitable Image" aria-describedby="image">
                            <small id="image" class="text-muted">Choose a file that is either PNG or JPG</small>
                          </div>
                          <div class="form-group">
                            <label for="institution">Institution</label>
                            <input type="text" name="institution" id="institution" class="form-control" placeholder="Enter your Current Working Institution" aria-describedby="institution">
                            <small id="institution" class="text-muted">Could be a hospital or a small clinic</small>
                          </div>
                          <div class="form-group">
                            <label for="start_year">Starting Year</label>
                            <input type="number" min="1950" name="start_year" id="start_year" class="form-control" placeholder="Enter your First year of Practice" aria-describedby="start_year">
                            <small id="start_year" class="text-muted">This is used to guage your experience</small>
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
