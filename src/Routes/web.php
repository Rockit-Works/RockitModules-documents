<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

 Route::get('/rw_invoice_test', function () {
     return 'haha echt mooi';
 })->name('home');
