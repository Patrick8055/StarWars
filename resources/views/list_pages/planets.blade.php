@extends('layouts.main')

@section('content')
<div class="container">
  <div class="justify-center text-center text-light">
    <ul id='planetList' class='list-unstyled'>
      @foreach($planets as $planet)
      <li>
        <a class="link-light" href="{{str_replace('http://swapi.dev/api', '', $planet['url'])}}"><h3>{{$planet['name']}}</h3></a>
      </li>
      @endforeach
    </ul>
  </div>
</div>
@endsection
