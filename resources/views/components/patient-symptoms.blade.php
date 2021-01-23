{{-- To be accessed by the doctors only --}}


@php
    $symptoms = App\Models\Symptom::where('doctor_id', auth()->user()->id)->get();
@endphp

<div class="card">
    <div class="card-header">
      <h3 class="card-title">Symptoms Data Table</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
                <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Date Sent: activate to sort column descending">Date Sent</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Patient's Name: activate to sort column ascending">Patient's Name</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Registered Symptom: activate to sort column ascending">Registered Symptom</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Diagnosed</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($symptoms as $symptom)

                            <tr role="row" class="odd">
                                <td class="dtr-control sorting_1" tabindex="0">{{$symptom->created_at}}</td>
                                <td>{{$symptom->patients->name}}</td>
                                <td>{{$symptom->symptom}} </td>
                                <td>
                                    @if (App\Models\Prescription::firstWhere('symptom_id', $symptom->id) == null)
                                    <x-prescriptionsModalForm :value="$symptom->id" :edit="false" />
                                    @else
                                    <p class="text-success">{{App\Models\Prescription::where('symptom_id',$symptom->id)->first()->prescription}}</p>
                                    <x-prescriptionsModalForm :value="$symptom->id" :edit="true"/>
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
        </div>
    </div>
    <!-- /.card-body -->
  </div>



