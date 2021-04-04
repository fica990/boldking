<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Delivery extends Model
{
    public $timestamps = true;
    public $guarded = [];

    const STATUS_PENDING = 0;
    const STATUS_COMPLETED = 1;

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
