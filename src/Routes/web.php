<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

 Route::get('/rw_invoice_test', function () {
     return \RockitInvoice::init()
         ->setReceiverDetails([
             'email' => 'admin@rockit.works',
             'name' => 'Rockit Works',
             'address' => 'Flight Forum 3509',
             'postal' => '5657DW',
             'city' => 'Eindhoven'
         ])
         ->setInvoiceNumber('0005')
         ->setInvoiceDate(now()->addDays(5))
         ->createPDF();

 });


Route::get('/rw_document_test', function () {

    return \RockitDocument::init()
        ->createPDF();

});
