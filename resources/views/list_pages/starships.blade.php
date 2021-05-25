@extends('layouts.main')

@section('content')
<div class="container">
  <div class="justify-center text-center text-light">
    <ul id='starshipList' class='list-unstyled'>
      @foreach($starships as $starship)
      <li>
        @if($starship)
        <a class="link-light" href="{{str_replace('http://swapi.dev/api', '', $starship['url'])}}"><h3>{{$starship['name']}}</h3></a>
        @endif
      </li>
      @endforeach
    </ul>
  </div>
</div>
@endsection
