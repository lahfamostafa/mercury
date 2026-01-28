<?php
use App\Http\Controllers\GroupController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('groups.index');
});

Route::resource('groups', GroupController::class);
