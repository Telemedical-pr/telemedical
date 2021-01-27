<!-- Button trigger modal -->
@php
    $doctors = App\Models\User::where('is_doctor', true)->get();
@endphp


<a class="btn btn-sm btn-primary w-100" data-toggle="modal" data-target="#appointmentFormModal">Book an Appointment</a>
<!-- Modal -->
<div class="modal fade" id="appointmentFormModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title">Book an Appointment</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form id="appointmentForm">
                                @csrf


                                {{-- Doctor Selection --}}
                                <div class="form-group row">
                                    <label for="doctor" class="col-md-4 col-form-label text-md-right">{{ __('Select Doctor') }}</label>

                                    <div class="col-md-6">
                                        <select name="doctor" id="doctor_id2" required class="form-control">
                                            <option selected disabled>Select your Preferred Doctor</option>
                                            @foreach ($doctors as $doctor)
                                            <option value="{{$doctor->id}}">Dr. {{$doctor->name}} <b>({{$doctor->docSpecialization->category}})</b> </option>
                                            @endforeach
                                        </select>

                                        @error('doctor')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Symptom input --}}

                                <div class="form-group row">
                                    <label for="appointment" class="col-md-4 col-form-label text-md-right">{{ __('Reason for Visit') }}</label>

                                    <div class="col-md-6">
                                        <textarea name="reason" id="reason_text" cols="30" rows="10" class="form-control"></textarea>

                                        @error('reason')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Appointment Date Time --}}
                                <div class="form-group row">
                                    <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Appointment Date and Time') }}</label>

                                    <div class="col-md-6">
                                        <input type="datetime-local" name="date1" id="date1" cols="30" rows="10" class="form-control">

                                        @error('appointment_dateTime')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-sm btn-secondary">
                                            Submit Symptom
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
        </div>
    </div>
</div>

