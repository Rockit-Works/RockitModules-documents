<?php

namespace Rockitworks\Documents\Traits;

use Rockitworks\Documents\Models\Document;

trait HasDocuments
{
    public function documents()
    {
        return $this->morphMany(Document::class, 'documentable');
    }
}