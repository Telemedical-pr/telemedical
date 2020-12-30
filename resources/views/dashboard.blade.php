@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if (auth()->user()->is_admin)
        <x-addlogo/>
        @endif
        @if (auth()->user()->is_doctor)
        <h1 class="text-center">Doc</h1>
        @endif
        @if (auth()->user()->is_patient)
        <x-recent-visits/>
        @endif

    </div>
</div>
@endsection




