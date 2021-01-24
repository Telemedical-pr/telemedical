<div>
    <!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->
</div><!-- Button trigger modal -->
<div>
<a class="btn btn-secondary" data-toggle="modal" data-target="#diagnosisFormModal">
    @if ($edit==true)
        <i class="fas fa-edit fa-xs "></i>
    @else
        Give Diagnosis for {{$value}}
    @endif
</a>
<!-- Modal -->
<div class="modal fade" id="diagnosisFormModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> Giving Diagnosis for Symptom {{$value}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                <div class="container-fluid">
                    <form id="diagnosisForm">
                        @csrf

                        {{-- Symptom ID --}}
                        <input type="hidden" class="form-control mb-5" disabled name="visit_id" id="visit_id" {{ $attributes->merge(['value' => $value]) }}>


                        {{-- Diagnosis --}}
                        <div class="form-group row">
                            <label for="Diagnosis" class="col-md-4 col-form-label text-md-right">{{ __('Diagnosis') }}</label>

                            <div class="col-md-6">
                                <textarea id="diagnosis" class="form-control @error('diagnosis') is-invalid @enderror" name="prescription" required ></textarea>

                                @error('diagnosis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit Diagnosis') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>



