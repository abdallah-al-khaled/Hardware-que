<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function author() // by3tbr 2sm ll function foreign key_id  user_id
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function post()
    {
        //function name = class name lash ma b3rf
        return $this->belongsTo(Post::class);
    }
}
