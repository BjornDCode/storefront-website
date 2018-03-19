<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/license', function() {
    return view('pdf.license', [ 'data' => (object)[
        'company' => 'Company',
        'domain' => 'Domain.com',
        'key' => '1498debd-3a33-4df8-8775-7b3e150521f0'
    ]]);
});

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
