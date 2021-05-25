@extends('layouts.main')

@section('content')
<div class="container">
  <div class="justify-center text-center text-light">
    <h1>{{$vehicle['name']}}</h1>
    <hr>
    <div class="row">
      <p>
        <u><b>Model:</b></u> {{$vehicle['model']}}cm &nbsp;&nbsp;&nbsp;
        <u><b>Manufacturer:</b></u> {{$vehicle['manufacturer']}}kg &nbsp;&nbsp;&nbsp;
        <u><b>Cost in Credits:</b></u> {{$vehicle['cost_in_credits']}} &nbsp;&nbsp;&nbsp;
        <u><b>Length:</b></u> {{$vehicle['length']}} &nbsp;&nbsp;&nbsp;
        <u><b>Max Atmosphering Speed:</b></u> {{$vehicle['max_atmosphering_speed']}} &nbsp;&nbsp;&nbsp;
      </p>
    </div>
    <div class="row">
      <p>
        <u><b>Crew:</b></u> {{$vehicle['crew']}} &nbsp;&nbsp;&nbsp;
        <u><b>Passengers:</b></u> {{$vehicle['passengers']}} &nbsp;&nbsp;&nbsp;
        <u><b>Cargo Capacity:</b></u> {{$vehicle['cargo_capacity']}} &nbsp;&nbsp;&nbsp;
        <u><b>Consumables:</b></u> {{$vehicle['consumables']}} &nbsp;&nbsp;&nbsp;
        <u><b>Vehicle Class:</b></u> {{$vehicle['vehicle_class']}} &nbsp;&nbsp;&nbsp;
    </div>
    <div>
      <p><u><b>Films:</b></u>
        @if(count($vehicleFilms) === 0)
        n/a
        @else
        @foreach($vehicleFilms as $film)
        <a class="link-light text-decoration-none" href="{{str_replace('http://swapi.dev/api', '', $film['url'])}}">{{$film['title'] . ", "}}</a>
        @endforeach
        @endif
      </p>
    </div>
    <div>
      <p><u><b>Pilots:</b></u>
        @if(count($vehiclePilots) === 0)
        n/a
        @else
        @foreach($vehiclePilots as $pilot)
        <a class="link-light text-decoration-none" href="{{str_replace('http://swapi.dev/api', '', $pilot['url'])}}">{{$pilot['name'] . ", "}}</a>
        @endforeach
        @endif
      </p>
    </div>
  </div>
</div>
@endsection
