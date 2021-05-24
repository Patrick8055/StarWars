<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\Client\Pool;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Cache;

class BuildCache extends Command
{
  /**
  * The name and signature of the console command.
  *
  * @var string
  */
  protected $signature = 'build:cache';

  /**
  * The console command description.
  *
  * @var string
  */
  protected $description = 'Load all data from SWAPI in cache';

  /**
  * Create a new command instance.
  *
  * @return void
  */
  public function __construct()
  {
    parent::__construct();
  }

  /**
  * Execute the console command.
  *
  * @return int
  */
  public function handle()
  {
    // functions for all duplicate code
    // validate the data from the api calls and add exceptions and errors
    // adapt variable names to php convention (snake_case vs camelCase)
    // check resources for holes, starships are not numbered continuously (numbers are skipped in the url while still being all 36, last one is id 75)
    // insted of saving the counts, save an array of all valid ids from the urls to avoid the issue of skipped numbers

    Cache::flush();

    $film_ids = [];
    $films = Http::get('https://swapi.dev/api/films');
    foreach($films['results'] as $film){
      Cache::put($film['url'], $film);
      array_push($film_ids, filter_var($film['url'], FILTER_SANITIZE_NUMBER_INT));
    }
    Cache::put('film_ids', $film_ids);


    $character_ids = [];
    $people_pages = [];
    array_push($people_pages, Http::get('https://swapi.dev/api/people')->json());
    $i = 0;
    while($people_pages[$i]['next']){
      array_push($people_pages, Http::get($people_pages[$i]['next'])->json());
      $i++;
    }

    foreach($people_pages as $page){
      foreach($page['results'] as $character){
        Cache::put($character['url'], $character);
        array_push($character_ids, filter_var($character['url'], FILTER_SANITIZE_NUMBER_INT));
      }
    }
    Cache::put('character_ids', $character_ids);


    $species_ids = [];
    $species_pages = [];
    array_push($species_pages, Http::get('https://swapi.dev/api/species')->json());
    $i = 0;
    while($species_pages[$i]['next']){
      array_push($species_pages, Http::get($species_pages[$i]['next'])->json());
      $i++;
    }


    foreach($species_pages as $page){
      foreach($page['results'] as $one_species){
        Cache::put($one_species['url'], $one_species);
        array_push($species_ids, filter_var($one_species['url'], FILTER_SANITIZE_NUMBER_INT));
      }
    }
    Cache::put('species_ids', $species_ids);

    $planet_ids = [];
    $planets_pages = [];
    array_push($planets_pages, Http::get('https://swapi.dev/api/planets')->json());
    $i = 0;
    while($planets_pages[$i]['next']){
      array_push($planets_pages, Http::get($planets_pages[$i]['next'])->json());
      $i++;
    }

    foreach($planets_pages as $page){
      foreach($page['results'] as $planet){
        Cache::put($planet['url'], $planet);
        array_push($planet_ids, filter_var($planet['url'], FILTER_SANITIZE_NUMBER_INT));
      }
    }
    Cache::put('planet_ids', $planet_ids);

    $vehicle_ids = [];
    $vehicles_pages = [];
    array_push($vehicles_pages, Http::get('https://swapi.dev/api/vehicles')->json());
    $i = 0;
    while($vehicles_pages[$i]['next']){
      array_push($vehicles_pages, Http::get($vehicles_pages[$i]['next'])->json());
      $i++;
    }

    foreach($vehicles_pages as $page){
      foreach($page['results'] as $vehicle){
        Cache::put($vehicle['url'], $vehicle);
        array_push($vehicle_ids, filter_var($vehicle['url'], FILTER_SANITIZE_NUMBER_INT));
      }
    }
    Cache::put('vehicle_ids', $vehicle_ids);


    $starship_ids = [];
    $starships_pages = [];
    array_push($starships_pages, Http::get('https://swapi.dev/api/starships')->json());
    $i = 0;
    while($starships_pages[$i]['next']){
      array_push($starships_pages, Http::get($starships_pages[$i]['next'])->json());
      $i++;
    }

    foreach($starships_pages as $page){
      foreach($page['results'] as $starship){
        Cache::put($starship['url'], $starship);
        array_push($starship_ids, filter_var($starship['url'], FILTER_SANITIZE_NUMBER_INT));
      }
    }
    Cache::put('starship_ids', $starship_ids);

  }
}
