@extends('layouts.main')

@section('content')
<div class="container">
  <div class="justify-center text-center text-light">
    <input type="text" id="searchInput" onkeyup="search()" placeholder="Search for films.." title="Film Search">
    <ul id='filmList' class='list-unstyled'>
      @foreach($films as $film)
      <li>
        <a class="link-light" href="{{str_replace('http://swapi.dev/api', '', $film['url'])}}"><h3>{{$film['title']}}</h3></a>
        <p>{{$film['opening_crawl']}}</p>
      </li>
      @endforeach
    </ul>
  </div>
</div>
@endsection
