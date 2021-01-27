@if (auth()->user()->is_admin)
@include('pages.admin.profile')
@endif
@if (auth()->user()->is_doctor)
@include('pages.doctor.profile')
@endif
@if (auth()->user()->is_patient)
@include('pages.patient.profile')
@endif



