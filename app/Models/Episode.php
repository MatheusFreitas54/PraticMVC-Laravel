<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Episode extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['number'];

    protected $casts = ['watched' => 'boolean'];

    public function seasons()
    {
        return $this->belongsTo(Season::class);
    }
}
