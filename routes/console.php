<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| Routes untuk artisan commands berbasis Closure.
|
*/

Artisan::command('inspire', function () {     
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

