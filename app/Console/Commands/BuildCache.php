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
    Cache::flush();

    // Add all resource categories from SWAPI to the cache.
    $this->saveInCache('films');
    $this->saveInCache('people');
    $this->saveInCache('species');
    $this->saveInCache('planets');
    $this->saveInCache('starships');
    $this->saveInCache('vehicles');
  }

  /**
  * Request data from SWAPI for the given category and save it to the cache files.
  */
  public function saveInCache($category){
    $categoryIds = [];
    $categoryPages = [];

    // Throw an exception if a client or server error occurred, if no error occured throw() returns the response
    array_push($categoryPages, Http::get('https://swapi.dev/api/' . $category)->throw()->json());

    $i = 0;
    // Request the next page as long as there is one, and add it to the $categoryPages array.
    while($categoryPages[$i]['next']) {
      array_push($categoryPages, Http::get($categoryPages[$i]['next'])->throw()->json());
      $i++;
    }

    /**
    * For each entry in each page save the response with it's url as key in the cache.
    * Also save an array of all valid resource ids, which can later be used to access all resources via url.
    */
    foreach($categoryPages as $page) {
      foreach($page['results'] as $result) {
        Cache::put($result['url'], $result);
        array_push($categoryIds, filter_var($result['url'], FILTER_SANITIZE_NUMBER_INT));
      }
    }
    Cache::put($category . 'Ids', $categoryIds);
  }
}
