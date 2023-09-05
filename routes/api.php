<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('farmers', 'App\Http\Controllers\FarmerController')->except([
    'create', 'edit'
]);