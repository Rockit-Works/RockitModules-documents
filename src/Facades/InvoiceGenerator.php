<?php

namespace Rockitworks\Invoice\Facades;

use Illuminate\Support\Facades\Facade;

class InvoiceGenerator extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'rockitworks.invoice';
    }
}