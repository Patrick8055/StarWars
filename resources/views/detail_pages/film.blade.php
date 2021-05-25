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
        @if(count($filmCharacters) === 0)
        n/a
        @else
        @foreach($filmCharacters as $character)
        <a class="link-light text-decoration-none" href="{{str_replace('http://swapi.dev/api', '', $character['url'])}}">{{$character['name'] . ", "}}</a>
        @endforeach
        @endif
      </p>
    </div>
    <hr>
    <div>
      <p><u><b>Species:</b></u>
        @if(count($filmSpecies) === 0)
        n/a
        @else
        @foreach($filmSpecies as $oneSpecies)
        <a class="link-light text-decoration-none" href="{{str_replace('http://swapi.dev/api', '', $oneSpecies['url'])}}">{{$oneSpecies['name'] . ", "}}</a>
        @endforeach
        @endif
      </p>
    </div>
    <hr>
    <div>
      <p><u><b>Planets:</b></u>
        @if(count($filmPlanets) === 0)
        n/a
        @else
        @foreach($filmPlanets as $planet)
        <a class="link-light text-decoration-none" href="{{str_replace('http://swapi.dev/api', '', $planet['url'])}}">{{$planet['name'] . ", "}}</a>
        @endforeach
        @endif
      </p>
    </div>
    <hr>
    <div>
      <p><u><b>Vehicles:</b></u>
        @if(count($filmVehicles) === 0)
        n/a
        @else
        @foreach($filmVehicles as $vehicle)
        <a class="link-light text-decoration-none" href="{{str_replace('http://swapi.dev/api', '', $vehicle['url'])}}">{{$vehicle['name'] . ", "}}</a>
        @endforeach
        @endif
      </p>
    </div>
    <hr>
    <div>
      <p><u><b>Starships:</b></u>
        @if(count($filmStarships) === 0)
        n/a
        @else
        @foreach($filmStarships as $starship)
        <a class="link-light text-decoration-none" href="{{str_replace('http://swapi.dev/api', '', $starship['url'])}}">{{$starship['name'] . ", "}}</a>
        @endforeach
        @endif
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
