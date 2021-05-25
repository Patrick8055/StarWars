@extends('layouts.main')

@section('content')
<div class="container">
  <div class="justify-center text-center text-light">
    <h1>{{$character['name']}}</h1>
    <hr>
    <div class="row">
      <p>
        <u><b>Height:</b></u> {{$character['height']}}cm &nbsp;&nbsp;&nbsp;
        <u><b>Mass:</b></u> {{$character['mass']}}kg &nbsp;&nbsp;&nbsp;
        <u><b>Hair Color:</b></u> {{$character['hair_color']}} &nbsp;&nbsp;&nbsp;
        <u><b>Skin Color:</b></u> {{$character['skin_color']}} &nbsp;&nbsp;&nbsp;
      </p>
    </div>
    <div class="row">
      <p>
        <u><b>Eye Color:</b></u> {{$character['eye_color']}} &nbsp;&nbsp;&nbsp;
        <u><b>Birth Year:</b></u> {{$character['birth_year']}} &nbsp;&nbsp;&nbsp;
        <u><b>Gender:</b></u> {{$character['gender']}} &nbsp;&nbsp;&nbsp;
        <u><b>Homeworld:</b></u> <a class="link-light text-decoration-none" href="{{str_replace('http://swapi.dev/api', '', $character['homeworld'])}}">{{$characterHomeworld['name']}}</a> &nbsp;&nbsp;&nbsp;
      </p>
    </div>
    <div>
      <p><u><b>Films:</b></u>
        @if(count($characterFilms) === 0)
          n/a
        @else
        @foreach($characterFilms as $film)
          <a class="link-light text-decoration-none" href="{{str_replace('http://swapi.dev/api', '', $film['url'])}}">{{$film['title'] . ", "}}</a>
        @endforeach
        @endif
      </p>
    </div>
    <div>
      <p><u><b>Species:</b></u>
        @if(count($characterSpecies) === 0)
          n/a
        @else
        @foreach($characterSpecies as $oneSpecies)
          <a class="link-light text-decoration-none" href="{{str_replace('http://swapi.dev/api', '', $oneSpecies['url'])}}">{{$oneSpecies['name'] . ", "}}</a>
        @endforeach
        @endif
      </p>
    </div>
    <div>
      <p><u><b>Vehicles:</b></u>
        @if(count($characterVehicles) === 0)
          n/a
        @else
        @foreach($characterVehicles as $vehicle)
          <a class="link-light text-decoration-none" href="{{str_replace('http://swapi.dev/api', '', $vehicle['url'])}}">{{$vehicle['name'] . ", "}}</a>
        @endforeach
        @endif
      </p>
    </div>
    <div>
      <p><u><b>Starships:</b></u>
        @if(count($characterStarships) === 0)
          n/a
        @else
        @foreach($characterStarships as $starship)
          <a class="link-light text-decoration-none" href="{{str_replace('http://swapi.dev/api', '', $starship['url'])}}">{{$starship['name'] . ", "}}</a>
        @endforeach
        @endif
      </p>
    </div>
  </div>
</div>
@endsection
