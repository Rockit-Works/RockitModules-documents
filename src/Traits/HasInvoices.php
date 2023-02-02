<?php

namespace Rockitworks\Documents\Traits;

use Rockitworks\Documents\Models\Invoice;

trait HasInvoices
{
    public function invoices()
    {
        return $this->morphMany(Invoice::class, 'invoiceable');
    }
}