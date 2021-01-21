@php
    $symptoms = App\Models\Symptom::where('doctor_id', auth()->user()->id)->get();


    @endphp

<div class="card-body p-0" style="display: block;">
    <div class="table-responsive">
        <table class="table m-0" id="symptomsTable">
            <thead>
        <tr>
            <th>Date Sent</th>
            <th>Patient's Name</th>
            <th>Registered Symptom</th>
            <th>Diagnosed</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($symptoms as $symptom)
            <tr>
                <td>{{$symptom->created_at}}</td>
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
<!-- /.table-responsive -->
  </div>
