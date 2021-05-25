@extends('layouts.main')

@section('content')
<div class="container">
  <div class="justify-center text-center text-light">
    <ul id='speciesList' class='list-unstyled'>
      @foreach($species as $one_species)
      <li>
        <a class="link-light" href="{{str_replace('http://swapi.dev/api', '', $one_species['url'])}}"><h3>{{$one_species['name']}}</h3></a>
      </li>
      @endforeach
    </ul>
  </div>
</div>
@endsection
