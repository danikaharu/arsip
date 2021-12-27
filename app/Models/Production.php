<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function logistics()
    {
        return $this->hasMany(\App\Models\Logistic::class);
    }
}
