<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function cart()
    {
        return $this->belongsToMany(Cart::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function art()
    {
        // return $this->hasMany(Art::class);
        return $this->belongsTo(Art::class);
    }
}
