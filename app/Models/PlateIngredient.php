<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlateIngredient extends Model
{
    use HasFactory;
    public $table = 'plate_ingredient';

    protected $fillable = [
        'ingredient_id',
        'plate_id',
        'quantity',
    ];

    public function plateIngredient()
    {
        return $this->belongsToMany(Ingredient::class, 'plate_ingredient')
            ->withPivot('quantity');
        
        return $this->belongsToMany(Plate::class, 'plate_ingredient')
            ->withPivot('quantity');
    }
}
