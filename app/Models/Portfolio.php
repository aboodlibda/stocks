<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Portfolio extends Model
{
//    protected $fillable = ['name', 'investment_amount', 'sharp_risk_ratio', 'var', 'beta_coefficient', 'annual_volatility', 'daily_volatility', 'risk_ranking', 'user_id','status'];
    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

