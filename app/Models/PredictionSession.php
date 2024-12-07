<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PredictionSession extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function tradePredictions()
    {
        return $this->hasMany(TradePrediction::class, 'session_id', 'session_id');
    }
}
