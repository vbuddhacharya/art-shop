<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saved extends Model
{
    public function art()
    {
        return $this->belongsTo(Art::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    use HasFactory;
}
