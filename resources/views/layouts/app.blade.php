<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

      @auth
        <!-- Navbar -->
      <nav class="main-header navbar navbar-expand fixed-top navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="/dashboard" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        @if (auth()->user()->is_admin)
                        <a class="dropdown-item" href="/doctors/create">
                            Add new Doctor
                        </a>
                        @endif
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
      </nav>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="/dashboard" class="brand-link">
          <img src="{{ "images/logo.png" }}" alt="TC"  style="opacity: .8" width="150px">
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            @if (auth()->user()->is_doctor)
            <div class="image">
                <img src="images/doctors/{{auth()->user()->image}}" class="img-circle elevation-2" alt="User Image">
              </div>
            @endif
            <div class="info">
              <a href="#" class="d-block">@if(auth()->user()->is_doctor) Dr. @endif {{auth()->user()->name}}</a>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
              <li class="nav-item menu-open">
                <a href="/dashboard" class="nav-link @if(Request::is('dashboard')) active @endif">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>

              {{-- Doctors Routes --}}
              @if (auth()->user()->is_doctor)
              <li class="nav-item menu-open">
                <a href="/appointments" class="nav-link @if(Request::is('appointments')) active @endif">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Appointments Calendar
                  </p>
                </a>
              </li>
              <li class="nav-item menu-open">
                <a href="/doc_profile" class="nav-link @if(Request::is('doc_profile')) active @endif">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    My Profile
                  </p>
                </a>
              </li>


              {{-- Admins Routes --}}
              @elseif (auth()->user()->is_admin)
              <li class="nav-item menu-open">
                <a href="/system" class="nav-link @if(Request::is('system')) active @endif">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    System Users
                  </p>
                </a>
              </li>
              <li class="nav-item menu-open">
                <a href="/all_appointments" class="nav-link @if(Request::is('all_appointments')) active @endif">
                  <i class="fas fa-calendar fa-9x  "></i>
                  <p>
                    All Appointments
                  </p>
                </a>
              </li>
              <li class="nav-item menu-open">
                <a href="/all_symptoms" class="nav-link @if(Request::is('all_symptoms')) active @endif">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    All Symptoms
                  </p>
                </a>
              </li>


              {{-- Patients Routes --}}
              @else
              <li class="nav-item menu-open">
                <a href="/dashboard" class="nav-link @if(Request::is('dashboard')) active @endif">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>

              @endif
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>

      @endauth
      <!-- Content Wrapper. Contains page content -->
      <div class="@if(!Request::is('login') && !Request::is('register'))  content-wrapper @else p-5  @endif">
        <div class="container">
            <x-responses/>
        </div>
          @yield('content')
      </div>


    </div>

    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
    @stack('scripts')
</body>
</html>

