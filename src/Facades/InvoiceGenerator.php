<?php

namespace Rockitworks\Documents\Facades;

use Illuminate\Support\Facades\Facade;

class InvoiceGenerator extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'rockitworks.documents';
    }
}