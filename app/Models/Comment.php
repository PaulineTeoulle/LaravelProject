<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    use HasFactory;

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');

    }


    function userCanEdit(User $user)
    {
        return $user->isAdmin() || $this->author_id == $user->id;
    }
}
