<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Recipe extends Model
{
    protected $table = 'recipes';
    protected $primaryKey = 'id';
    use HasFactory;


    protected $fillable = [
        'title', 'content','ingredients'
    ];

    /**
     * Get the user that authored the recipe.
     */
    public function author()
    {
        return $this->belongsTo(User::class,'author_id');
    }

    public function ingredient()
    {
        return $this->hasMany(Ingredient::class);
    }
}
