<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'profit_margin',
        'duration_days',
        'price',
        'special',
    ];
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }
    
}

