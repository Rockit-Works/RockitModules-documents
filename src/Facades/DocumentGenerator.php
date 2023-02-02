<?php

namespace Rockitworks\Documents\Facades;

use Illuminate\Support\Facades\Facade;

class DocumentGenerator extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'rockitworks.document';
    }
}