{{-- To be accessed by patients only --}}

@php
    $doctors = App\Models\User::where('is_doctor', true)->get();
@endphp


<a class="btn btn-sm btn-primary w-100" data-toggle="modal" data-target="#symptomFormModal">Give your doctor your symptoms</a>
<!-- Modal -->
<div class="modal fade" id="symptomFormModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title">Add your Symptoms</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form id="symptomForm">
                                @csrf


                                {{-- Doctor Selection --}}
                                <div class="form-group row">
                                    <label for="doctor" class="col-md-4 col-form-label text-md-right">{{ __('Select Doctor') }}</label>

                                    <div class="col-md-6">
                                        <select name="doctor" id="doctor_id" required class="form-control">
                                            @foreach ($doctors as $doctor)
                                                <option value="{{$doctor->id}}">Dr. {{$doctor->name}} @if($doctor->docSpecialization) <strong>({{$doctor->docSpecialization->category}})</strong> @endif </option>
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
                                    <label for="symptom" class="col-md-4 col-form-label text-md-right">{{ __('Symptoms') }}</label>

                                    <div class="col-md-6">
                                        <textarea name="symptom" id="symptom_text" cols="30" rows="10" class="form-control"></textarea>

                                        @error('symptom')
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

