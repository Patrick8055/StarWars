@extends('layouts.main')

@section('content')
<div class="container">
  <div class="justify-center text-center text-light">
    <ul id='people-list' class='list-unstyled'>
      @foreach($people as $character)
      <li>
        <!-- evtually change filter to str_replace way -->
        <a class="link-light" href="/characters/{{filter_var($character['url'], FILTER_SANITIZE_NUMBER_INT)}}"><h3>{{$character['name']}}</h3></a>
      </li>
      @endforeach
    </ul>
  </div>
</div>
@endsection
