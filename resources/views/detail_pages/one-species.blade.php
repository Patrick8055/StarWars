@extends('layouts.main')

@section('content')
<div class="container">
  <div class="justify-center text-center text-light">
    <h1>{{$oneSpecies['name']}}</h1>
    <hr>
    <div class="row">
      <p>
        <u><b>Classification:</b></u> {{$oneSpecies['classification']}} &nbsp;&nbsp;&nbsp;
        <u><b>Designation:</b></u> {{$oneSpecies['designation']}} &nbsp;&nbsp;&nbsp;
        <u><b>Average Height:</b></u> {{$oneSpecies['average_height']}} &nbsp;&nbsp;&nbsp;
        <u><b>Skin Colors:</b></u> {{$oneSpecies['skin_colors']}} &nbsp;&nbsp;&nbsp;
        <u><b>Hair Colors:</b></u> {{$oneSpecies['hair_colors']}} &nbsp;&nbsp;&nbsp;
      </p>
    </div>
    <div class="row">
      <p>
        <u><b>Eye Colors:</b></u> {{$oneSpecies['eye_colors']}} &nbsp;&nbsp;&nbsp;
        <u><b>Average Lifespan:</b></u> {{$oneSpecies['average_lifespan']}} &nbsp;&nbsp;&nbsp;
        <u><b>Homeworld:</b></u>
        @if($oneSpecies['homeworld'])
         <a class="link-light text-decoration-none" href="{{str_replace('http://swapi.dev/api', '', $oneSpecies['homeworld'])}}">{{$speciesHomeworld['name']}}</a> &nbsp;&nbsp;&nbsp;
        @else
        n/a &nbsp;&nbsp;&nbsp;
        @endif
        <u><b>Language:</b></u> {{$oneSpecies['language']}} &nbsp;&nbsp;&nbsp;
      </p>
    </div>
    <div>
      <p><u><b>People:</b></u>
        @foreach($speciesPeople as $character)
        <a class="link-light text-decoration-none" href="{{str_replace('http://swapi.dev/api', '', $character['url'])}}">{{$character['name'] . ", "}}</a>
        @endforeach
      </p>
    </div>
    <div>
      <p><u><b>Films:</b></u>
        @foreach($speciesFilms as $film)
        <a class="link-light text-decoration-none" href="{{str_replace('http://swapi.dev/api', '', $film['url'])}}">{{$film['title'] . ", "}}</a>
        @endforeach
      </p>

  </div>
</div>
@endsection
