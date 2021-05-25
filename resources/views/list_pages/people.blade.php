@extends('layouts.main')

@section('content')
<div class="container">
  <div class="justify-center text-center text-light">
    <ul id='peopleList' class='list-unstyled'>
      @foreach($people as $character)
      <li>
        <!-- evtually change filter to str_replace way -->
        <a class="link-light" href="{{str_replace('http://swapi.dev/api', '', $character['url'])}}"><h3>{{$character['name']}}</h3></a>
      </li>
      @endforeach
    </ul>
  </div>
</div>
@endsection
