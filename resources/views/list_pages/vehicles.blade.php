@extends('layouts.main')

@section('content')
<div class="container">
  <div class="justify-center text-center text-light">
    <ul id='vehicleList' class='list-unstyled'>
      @foreach($vehicles as $vehicle)
      <li>
        @if($vehicle)
        <a class="link-light" href="{{str_replace('http://swapi.dev/api', '', $vehicle['url'])}}"><h3>{{$vehicle['name']}}</h3></a>
        @endif
      </li>
      @endforeach
    </ul>
  </div>
</div>
@endsection
