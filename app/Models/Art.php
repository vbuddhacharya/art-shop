<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Art extends Model
{
    use HasFactory;
    public $table = 'arts';
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function order()
    {
        return $this->hasMany(Order::class);
        // return $this->belongsToMany(Order::class);
    }
    public function cart()
    {
        return $this->hasMany(Cart::class);
    }
}
