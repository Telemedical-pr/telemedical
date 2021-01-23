@if (auth()->user()->is_admin)
@include('pages.admin.dashboard')
@endif
@if (auth()->user()->is_doctor)
@include('pages.doctor.dashboard')
@endif
@if (auth()->user()->is_patient)
@include('pages.patient.dashboard')
@endif



