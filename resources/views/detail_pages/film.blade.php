@extends('layouts.main')

@section('content')
<div class="container">
  <div class="justify-center text-center text-light">
    <h1>Episode {{$film['episode_id']}}: {{$film['title']}}</h1>
    <div class="row">
      <div>
        <u><b>Director:</b></u> {{$film['director']}}
      </div>
    </div>
    <div class="row">
      <div>
        <u><b>Producer:</b></u> {{$film['producer']}}
      </div>
    </div>
    <hr>
    <p>{{$film['opening_crawl']}}</p>
    <hr>
    <div>
      <p><u><b>Characters:</b></u>
        @foreach($filmCharacters as $character)
        <a class="link-light text-decoration-none" href="{{str_replace('http://swapi.dev/api', '', $character['url'])}}">{{$character['name'] . ", "}}</a>
        @endforeach
      </p>
    </div>
    <hr>
    <div>
      <p><u><b>Species:</b></u>
        @foreach($filmSpecies as $oneSpecies)
        <a class="link-light text-decoration-none" href="{{str_replace('http://swapi.dev/api', '', $oneSpecies['url'])}}">{{$oneSpecies['name'] . ", "}}</a>
        @endforeach
      </p>
    </div>
    <hr>
    <div>
      <p><u><b>Planets:</b></u>
        @foreach($filmPlanets as $planet)
        <a class="link-light text-decoration-none" href="{{str_replace('http://swapi.dev/api', '', $planet['url'])}}">{{$planet['name'] . ", "}}</a>
        @endforeach
      </p>
    </div>
    <hr>
    <div>
      <p><u><b>Vehicles:</b></u>
        @foreach($filmVehicles as $vehicle)
        <a class="link-light text-decoration-none" href="{{str_replace('http://swapi.dev/api', '', $vehicle['url'])}}">{{$vehicle['name'] . ", "}}</a>
        @endforeach
      </p>
    </div>
    <hr>
    <div>
      <p><u><b>Starships:</b></u>
        @foreach($filmStarships as $starship)
        <a class="link-light text-decoration-none" href="{{str_replace('http://swapi.dev/api', '', $starship['url'])}}">{{$starship['name'] . ", "}}</a>
        @endforeach
      </p>
    </div>
    <hr>
    <div class="row">
      <div class="">
        <u><b>Release date:</b></u> {{$film['release_date']}}
      </div>
    </div>
  </div>
</div>
@endsection
