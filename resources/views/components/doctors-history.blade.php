@php
    $visits = App\Models\Visits::where('doctor_id', auth()->user()->id)->paginate(5);

@endphp
<div class="col-md-10 col-12 m-auto">
    <div class="card">
        <div class="card-header text-center">
            <h1>My Recent Visits</h1>
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
                            <td>Patient One</td>
                            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto qui modi tempora mollitia. Cum quisquam facere odio fuga eveniet quaerat error, corrupti, saepe dignissimos, quod dolores recusandae laborum tenetur! Commodi.Pariatur iure, sed ut temporibus maxime earum. Voluptas iusto sequi, molestias quis at harum consequatur tempora vero temporibus amet voluptates ipsa odio voluptatem eveniet et minima! Ipsa eaque deleniti id.</td>
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


