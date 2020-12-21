<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plate extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'diners',
        'type',
    ];

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'plate_ingredient')
            ->withPivot('quantity');
            
    }
}
