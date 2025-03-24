<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
        'date', 'high', 'volume', 'open', 'low', 'close', 'adjclose'
    ];
}
