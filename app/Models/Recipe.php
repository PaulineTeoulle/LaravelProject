<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $table = 'recipes';
    use HasFactory;


    /**
     * Get the user that authored the recipe.
     */
    public function author()
    {
        return $this->belongsTo(User::class,'author_id');
    }

}
