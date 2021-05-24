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
    // validate the data from the api calls and add exceptions and errors

    Cache::flush();

    $this->putInCache('films');
    $this->putInCache('people');
    $this->putInCache('species');
    $this->putInCache('planets');
    $this->putInCache('starships');
    $this->putInCache('vehicles');
  }

  public function putInCache($category){
    $categoryIds = [];
    $categoryPages = [];

    array_push($categoryPages, Http::get('https://swapi.dev/api/' . $category)->json());

    $i = 0;
    while($categoryPages[$i]['next']){
      array_push($categoryPages, Http::get($categoryPages[$i]['next'])->json());
      $i++;
    }

    foreach($categoryPages as $page){
      foreach($page['results'] as $result){
        Cache::put($result['url'], $result);
        array_push($categoryIds, filter_var($result['url'], FILTER_SANITIZE_NUMBER_INT));
      }
    }

    Cache::put($category . 'Ids', $categoryIds);
  }
}
