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

<script>
  function search() {
      let input, filter, ul, li, a, p, i, aTxt, pTxt;
      input = document.getElementById("searchInput");
      filter = input.value.toUpperCase();
      ul = document.getElementById("filmList");
      li = ul.getElementsByTagName("li");
      for (i = 0; i < li.length; i++) {
          a = li[i].getElementsByTagName("a")[0];
          p =li[i].getElementsByTagName("p")[0];
          aTxt = a.textContent || a.innerText;
          pTxt = p.textContent || p.innerText;
          if (aTxt.toUpperCase().indexOf(filter) > -1 || pTxt.toUpperCase().indexOf(filter) > -1) {
              li[i].style.display = "";
          } else {
              li[i].style.display = "none";
          }
      }
  }
</script>
@endsection
