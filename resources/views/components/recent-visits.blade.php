@php
    $visits = App\Models\Visits::where('patient_id', auth()->user()->id)->get();

@endphp

<div class="card-body p-0" style="display: block;">
    <div class="table-responsive">
      <table class="table m-0">
        <thead>
        <tr>
          <th>Date of Visit</th>
          <th>Doctor's Name</th>
          <th>Reason of Visit</th>
          <th>Diagnosis</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($visits as $visit)
            <tr>
                <td>{{$visit->created_at}}</td>
                <td>{{$visit->doctors->name}}</td>
                <td>Lorem ipsum dolor sit amet,</td>
                <td>adipisicing elit. Iusto</td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.table-responsive -->
  </div>
