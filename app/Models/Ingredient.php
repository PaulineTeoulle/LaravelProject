<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $table = 'ingredient';
    use HasFactory;

    public function recipe()
    {
        return $this->belongsToMany(Recipe::class);
    }
}
