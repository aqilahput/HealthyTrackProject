<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $fillable = ['user_id', 'food_id', 'history_type'];

    public function food()
    {
        return $this->belongsTo(Food::class);
    }
}
