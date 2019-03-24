<?php

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/classify', function () {
    $user = Session::get('user');

    $process = new Process([
        '/home/forge/anaconda3/bin/python',
        base_path('python/classify.py'),
        $user->avatar
    ]);
    
    $process->run();
    
    // executes after the command finishes
    if (!$process->isSuccessful()) {
        throw new ProcessFailedException($process);
    }

    return view('result')->with([
        "user" => $user,
        "result" => $process->getOutput()
    ]);
});

/* TODO
- Setup socialite (no registration just grab the avatar)
- Pass the avatar url to the python script
- Do a blog post

*/