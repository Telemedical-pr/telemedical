<!-- Button trigger modal -->
<a data-toggle="modal" data-target="#prescriptionsFormModal">Give Prescription</a>
<!-- Modal -->
<div class="modal fade" id="prescriptionsFormModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form id="prescriptionForm">
                        @csrf

                        {{-- Symptom ID --}}
                        <input type="hidden" name="symptom_id" id="symptom_id" value="{{$symptom_id}}">


                        {{-- Prescription --}}
                        <div class="form-group row">
                            <label for="prescription" class="col-md-4 col-form-label text-md-right">{{ __('Prescription') }}</label>

                            <div class="col-md-6">
                                <textarea id="prescription" class="form-control @error('prescription') is-invalid @enderror" name="prescription" required ></textarea>

                                @error('prescription')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit Prescription') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@props(['symptom_id'])
