@extends('layouts.main')

@section('content')
<div class="container">
  <div class="justify-center text-center text-light">
    <h1>Episode {{$film['episode_id']}}: {{$film['title']}}</h1>
    <div class="row">
      <div>
        Director: {{$film['director']}}
      </div>
    </div>
    <div class="row">
      <div>
        Producer: {{$film['producer']}}
      </div>
    </div>
    <hr>
    <p>{{$film['opening_crawl']}}</p>
    <hr>
    <div>
      <p>Characters:
        @foreach($characters as $character)
        <a href="{{str_replace('http://swapi.dev/api', '', $character['url'])}}">{{$character['name'] . ", "}}</a>
        @endforeach
      </p>
    </div>
    <div>
      <p>Species:
        @foreach($species as $s)
        {{$s['name'] . ", "}}
        @endforeach
      </p>
    </div>
    <div>
      <p>Planets:
        @foreach($planets as $planet)
        {{$planet['name'] . ", "}}
        @endforeach
      </p>
    </div>
    <div>
      <p>Vehicles:
        @foreach($vehicles as $vehicle)
        {{$vehicle['name'] . ", "}}
        @endforeach
      </p>
    </div>
    <div>
      <p>Starships:
        @foreach($starships as $starship)
        {{$starship['name'] . ", "}}
        @endforeach
      </p>
    </div>
    <div class="row">
      <div class="">
        Release date: {{$film['release_date']}}
      </div>
    </div>
    <a href="/films">Back to Films overview</a>
  </div>
</div>
@endsection
