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
        (env('APP_ENV') == 'local' ? 'python' : '/home/forge/anaconda3/bin/python'),
        (env('APP_ENV') == 'local' ? base_path('python/classify_local.py') : base_path('python/classify.py')),
        $user->avatar
    ]);
    
    $process->run();
    
    // executes after the command finishes
    if (!$process->isSuccessful()) {
        throw new ProcessFailedException($process);
    }

    $cleaned = json_decode(str_replace('\n', '', $process->getOutput()));

    return view('result')->with([
        "avatar" => $user->avatar,
        "accuracy" => $cleaned->accuracy,
        "pred_class" => $cleaned->pred_class
    ]);
});

/* TODO
- Setup socialite (no registration just grab the avatar)
- Pass the avatar url to the python script
- Do a blog post

*/