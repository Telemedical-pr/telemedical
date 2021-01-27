{{-- to be accessed by the users only --}}

@php
    $symptoms = \App\Models\Symptom::all();
@endphp

<div class="card my-3">
    <div class="card-header bg-dark">
      <h3 class="card-title">Recently Given Symptoms</h3>


    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0" style="height: 300px;">
      <table class="table table-head-fixed text-nowrap">
        <thead>
          <tr>
            <th>ID</th>
            <th>Date</th>
            <th>Doctor & Speciality</th>
            <th>Symptom</th>
            <th>Prescription Given</th>
          </tr>
        </thead>
        <tbody>

            @foreach ($symptoms as $symptom)
            <tr>
                <td>{{$symptom->id}}</td>
                <td>{{$symptom->created_at->format('F j, Y')}}</td>
                <td>
                    <div class="row">
                        <div class="col-12">
                            {{$symptom->doctors->name}} - ({{$symptom->doctors->specialization}})
                        </div>
                        <div class="col-12">
                            <button type="button" class="btn btn-secondary btn-sm w-100" data-toggle="modal" data-target="#modelId">
                                View profile
                              </button>
                              <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="container-fluid">
                                            <div class="card text-white bg-dark">
                                                <img class="card-img-top" src="/images/doctors/{{$symptom->doctors->image}}" alt="">
                                                <div class="card-body">
                                                <div class="row">
                                                    <div class="col-6">
                                                            <h4 class="card-title">{{$symptom->doctors->name}}</h4>
                                                            <p class="card-text">{{$symptom->doctors->specialization}}</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="card-text">Age: <b>{{ $symptom->doctors->getAge() }}</b></p>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </td>
                <td>{{$symptom->symptom}}</td>
                <td>
                    @if ($symptom->prescriptions)
                    {{$symptom->prescriptions->prescription}}
                    @else
                    <p class="text-danger">No Prescription given yet</p>
                    @endif
                </td>
            </tr>
            @endforeach


        </tbody>
      </table>
    </div>
    <div class="card-footer">
        <x-symptoms-form-modal/>
    </div>
    <!-- /.card-body -->
  </div>

   <!-- Modal -->
