<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;
    // protected $fillable = ['user_id', 'art_id', 'image_count'];
    public $table = 'features';
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function art()
    {
        return $this->belongsTo(Art::class);
    }
}
