{{-- To be accessed by Patients Only --}}

@php
    $visits = App\Models\Visit::where('patient_id', auth()->user()->id)->get();

@endphp

<div class="card my-3">
    <div class="card-header bg-dark">
      <h3 class="card-title">Visits to make / been made</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
                <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Date Sent: activate to sort column descending">Date of Visit</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Patient's Name: activate to sort column ascending">Doctor's Name</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Registered Symptom: activate to sort column ascending">Reason of Visit</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Diagnosis</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($visits as $visit)

                            <tr role="row" class="odd">
                                <td>{{$visit->created_at}}</td>
                                <td>{{$visit->doctors->name}}</td>
                                <td>{{$visit->reason}}</td>
                                <td>
                                    @if ($visit->diagnosis == null)
                                    <p class="text-danger">No Diagnosis Given</p>
                                    @else
                                    {{$visit->diagnosis->diagnosis}}
                                    @endif
                                </td>
                            </tr>

                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
            <div class="row">

                <div class="col-sm-12 col-md-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                        <ul class="pagination">
                            <li class="paginate_button page-item previous disabled" id="example1_previous">
                                <a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                            </li>
                            <li class="paginate_button page-item next" id="example1_next">
                                <a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0" class="page-link">Next</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="container">
                <x-book-appointment/>
            </div>
        </div>

    </div>
    <!-- /.card-body -->
  </div>



