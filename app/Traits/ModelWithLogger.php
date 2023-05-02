<?php

namespace App\Traits;

use App\Models\Log;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait ModelWithLogger
{
    public function logs(): MorphMany
    {
        return $this->morphMany(Log::class, 'model');
    }
}