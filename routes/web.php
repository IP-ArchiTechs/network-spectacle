<?php

use Illuminate\Support\Facades\Route;
use Spatie\Ssh\Ssh;


Route::get('/', function () {
    return view('home', ['output' => 'None']);
});

Route::post('/', function (\Illuminate\Http\Request $request) {
    $process = Ssh::create('lguser', '45.63.78.25')->execute('traceroute ' . $request->get('target'));

    return view('home', ['output' => $process->getOutput()]);
});
