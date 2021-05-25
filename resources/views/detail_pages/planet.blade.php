@extends('layouts.main')

@section('content')
<div class="container">
  <div class="justify-center text-center text-light">
    <h1>{{$planet['name']}}</h1>
    <hr>
    <div class="row">
      <p>
        <u><b>Rotation Period:</b></u> {{$planet['rotation_period']}} &nbsp;&nbsp;&nbsp;
        <u><b>Orbital Period:</b></u> {{$planet['orbital_period']}} &nbsp;&nbsp;&nbsp;
        <u><b>Diameter:</b></u> {{$planet['diameter']}} &nbsp;&nbsp;&nbsp;
        <u><b>Climate:</b></u> {{$planet['climate']}} &nbsp;&nbsp;&nbsp;
      </p>
    </div>
    <div class="row">
      <p>
        <u><b>Gravity:</b></u> {{$planet['gravity']}} &nbsp;&nbsp;&nbsp;
        <u><b>Terrain:</b></u> {{$planet['terrain']}} &nbsp;&nbsp;&nbsp;
        <u><b>Surface Water:</b></u> {{$planet['surface_water']}} &nbsp;&nbsp;&nbsp;
        <u><b>Population:</b></u> {{$planet['population']}} &nbsp;&nbsp;&nbsp;
      </p>
    </div>
    <div>
      <p><u><b>Residents:</b></u>
        @foreach($planetResidents as $character)
        <a class="link-light text-decoration-none" href="{{str_replace('http://swapi.dev/api', '', $character['url'])}}">{{$character['name'] . ", "}}</a>
        @endforeach
      </p>
    </div>
    <div>
      <p><u><b>Films:</b></u>
        @foreach($planetFilms as $film)
        <a class="link-light text-decoration-none" href="{{str_replace('http://swapi.dev/api', '', $film['url'])}}">{{$film['title'] . ", "}}</a>
        @endforeach
      </p>
    </div>
  </div>
</div>
@endsection
