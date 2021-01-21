@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if (auth()->user()->is_admin)
        <x-addlogo/>
        @endif
        @if (auth()->user()->is_doctor)
        <x-patient-symptoms/>
        @endif
        @if (auth()->user()->is_patient)
        <div class="row">
            <div class="col-12">
                <x-recent-visits/>
            </div>
            <div class="col-12">
                <x-symptoms-form-modal/>
            </div>
        </div>

        @endif

    </div>
</div>
@endsection




