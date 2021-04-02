<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static orderBy(string $string, string $string1)
 * @method static where(string $string, $title)
 */
class Recipe extends Model
{
    protected $table = 'recipes';
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

   /* function userCanEdit(User $user)
    {
        return $user->isAdmin() || $this->author_id == $user->id;
    }*/

}
