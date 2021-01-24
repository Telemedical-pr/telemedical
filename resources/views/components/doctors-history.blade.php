@php
    $visits = App\Models\Visit::where('doctor_id', auth()->user()->id)->paginate(5);

@endphp
<div class="col-md-10 col-12 m-auto">
    <div class="card">
        <div class="card-header text-center">
            <h1>My Recent Consultations</h1>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead class="thead-default">
                    <tr class="text-center">
                        <th>Date of Visit</th>
                        <th>Patient's Name</th>
                        <th>Reason of Visit</th>
                        <th>Final Diagnosis</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($visits as $visit)
                    <tr>
                        <td scope="row">{{$visit->appointment_dateTime}}</td>
                        <td>{{$visit->patients->name}}</td>
                        <td>{{$visit->reason}}</td>
                        <td>
                            @if (App\Models\Diagnosis::firstWhere('visit_id', $visit->id) == null)
                            <x-diagnosisModalForm :value="$visit->id" :edit="false" />
                            @else
                            <p class="text-success">{{App\Models\Diagnosis::where('visit_id',$visit->id)->first()->diagnosis}}</p>
                            <x-diagnosisModalForm :value="$visit->id" :edit="true"/>
                            @endif
                        </td>
                    </tr>
                    @endforeach

                </tbody>
                <tfoot>
                    <ul class="pagination">
                        {{-- Previous Page Link --}}
                        @if ($visits->onFirstPage())
                            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                                <span class="page-link" aria-hidden="true">&lsaquo;</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $visits->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                            </li>
                        @endif


                        {{-- Next Page Link --}}
                        @if ($visits->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $visits->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                            </li>
                        @else
                            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                                <span class="page-link" aria-hidden="true">&rsaquo;</span>
                            </li>
                        @endif
                    </ul>
                </tfoot>
            </table>
        </div>
    </div>
</div>


