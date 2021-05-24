@extends('layouts.main')

@section('content')
<div class="container">
  <div class="justify-center text-center text-light">
    <ul id='film-list' class='list-unstyled'>
      @foreach($films as $film)
      <li>
        <a class="link-light" href="/films/{{filter_var($film['url'], FILTER_SANITIZE_NUMBER_INT)}}"><h3>{{$film['title']}}</h3></a>
        <p>{{$film['opening_crawl']}}</p>
      </li>
      @endforeach
    </ul>
  </div>
</div>
@endsection
