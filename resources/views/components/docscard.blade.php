<div class="card text-white bg-dark">
  <img class="card-img-top" src="images/doctors/{{$profileImage}}" alt="doc">
  <div class="card-body">
    <h4 class="card-title nos-card-title" style="margin-top: -50px" >{{$name}}</h4>
    <p class="card-text text-center">Specialization: <b>{!! $spec !!}</b></p>
  </div>
</div>


@props(['profileImage','name', 'spec'])
