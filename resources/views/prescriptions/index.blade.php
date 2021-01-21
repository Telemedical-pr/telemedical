@extends('layouts.app')

@php
    $doctors = App\Models\User::where('is_doctor', true);
@endphp

@section('content')
<div class="row justify-content-center">
    @foreach ($doctors as $doctor)
    <div class="col-md-3">
        <x-docscard profileImage='{{$doctor->profileImage}}' name='{{$doctor->name}}' spec="{{$doctor->specialization}}"></x-sections-docscard>
    </div>
    @endforeach
</div>
@endsection

