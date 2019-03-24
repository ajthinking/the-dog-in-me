<?php

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/classify', function () {
    $process = new Process([
        '/home/forge/anaconda3/bin/python',
        base_path('python/classify.py')
    ]);
    
    $process->run();
    
    // executes after the command finishes
    if (!$process->isSuccessful()) {
        throw new ProcessFailedException($process);
    }
    
    echo $process->getOutput();
});

/* TODO
- Setup socialite (no registration just grab the avatar)
- Pass the avatar url to the python script
- Do a blog post

*/