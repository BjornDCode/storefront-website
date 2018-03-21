<?php

if (! defined('DEFAULT_VERSION')) {
    define('DEFAULT_VERSION', '1.0');
}

Route::get('/', function () {
    return view('home.index');
});

Route::get('/roadmap', function () {
    return view('roadmap.index');
});

Route::get('/support', function () {
    return view('support.index');
});

Route::post('/newsletter/subscribe', 'NewsletterController@subscribe');
Route::post('/license', 'LicenseController@store');

Route::get('/docs', 'DocsController@showRootPage');
Route::get('/docs/{version}/{page?}', 'DocsController@show');
