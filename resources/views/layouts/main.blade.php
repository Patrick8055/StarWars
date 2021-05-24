<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Star Wars App</title>

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <style>
          body {
            background-color: #000;
          }
        </style>

        <!-- JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    </head>
    <body>
      <div class="jumbotron text-center">
        <a href="https://fontmeme.com/star-wars-font/"><img src="https://fontmeme.com/permalink/210522/1cacf80ec53e118dcf0510505f815204.png" alt="star-wars-font" border="0"></a>
      </div>
      <div class="row text-center">
        <a class="text-light text-decoration-none h5"href="https://swapi.dev/">Data Provided By SWAPI - The Star Wars API</a>
      </div>
      <nav class="navbar navbar-expand-lg justify-content-center">
        <div class="navbar-nav">
          <a class="nav-item nav-link h4" href="/films">Films</a>
          <a class="nav-item nav-link h4" href="/people">Characters</a>
          <a class="nav-item nav-link h4" href="/species">Species</a>
          <a class="nav-item nav-link h4" href="/planets">Planets</a>
          <a class="nav-item nav-link h4" href="/starships">Starships</a>
          <a class="nav-item nav-link h4" href="/vehicles">Vehicles</a>
        </div>
      </nav>
      @yield('content')
    </body>
</html>
