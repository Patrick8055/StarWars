@extends('layouts.main')

@section('content')
<div class="container">
  <div class="justify-center text-center text-light">
    <h1>{{$starship['name']}}</h1>
    <hr>
    <div class="row">
      <p>
        <u><b>Model:</b></u> {{$starship['model']}}cm &nbsp;&nbsp;&nbsp;
        <u><b>Manufacturer:</b></u> {{$starship['manufacturer']}}kg &nbsp;&nbsp;&nbsp;
        <u><b>Cost in Credits:</b></u> {{$starship['cost_in_credits']}} &nbsp;&nbsp;&nbsp;
        <u><b>Length:</b></u> {{$starship['length']}} &nbsp;&nbsp;&nbsp;
        <u><b>Max Atmosphering Speed:</b></u> {{$starship['max_atmosphering_speed']}} &nbsp;&nbsp;&nbsp;
        <u><b>Crew:</b></u> {{$starship['crew']}} &nbsp;&nbsp;&nbsp;
      </p>
    </div>
    <div class="row">
      <p>
        <u><b>Passengers:</b></u> {{$starship['passengers']}} &nbsp;&nbsp;&nbsp;
        <u><b>Cargo Capacity:</b></u> {{$starship['cargo_capacity']}} &nbsp;&nbsp;&nbsp;
        <u><b>Consumables:</b></u> {{$starship['consumables']}} &nbsp;&nbsp;&nbsp;
        <u><b>Hyperdrive Rating:</b></u> {{$starship['hyperdrive_rating']}} &nbsp;&nbsp;&nbsp;
        <u><b>MGLT:</b></u> {{$starship['MGLT']}} &nbsp;&nbsp;&nbsp;
        <u><b>Starship Class:</b></u> {{$starship['starship_class']}} &nbsp;&nbsp;&nbsp;
    </div>
    <div>
      <p><u><b>Films:</b></u>
        @if(count($starshipFilms) === 0)
        n/a
        @else
        @foreach($starshipFilms as $film)
        <a class="link-light text-decoration-none" href="{{str_replace('http://swapi.dev/api', '', $film['url'])}}">{{$film['title'] . ", "}}</a>
        @endforeach
        @endif
      </p>
    </div>
    <div>
      <p><u><b>Pilots:</b></u>
        @if(count($starshipPilots) === 0)
        n/a
        @else
        @foreach($starshipPilots as $pilot)
        <a class="link-light text-decoration-none" href="{{str_replace('http://swapi.dev/api', '', $pilot['url'])}}">{{$pilot['name'] . ", "}}</a>
        @endforeach
        @endif
      </p>
    </div>
  </div>
</div>
@endsection
