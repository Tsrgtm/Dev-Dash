<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/u/{username}', function ($username) {
    return view('pages.user-profile', [
        'username' => $username
    ]);
})->name('users.show');

Route::get('/t/{tag}', function ($tag) {
    return view('pages.tags.single-tag', [
        'tag' => $tag
    ]);
})->name('tags.show');

Route::get('/tags', function () {
    return view('pages.tags.index');
})->name('tags.index');


require __DIR__ . '/auth.php';