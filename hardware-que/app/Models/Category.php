<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    public function posts()
    {
        //function name = class name lash ma b3rf
        return $this->hasMany(Post::class);
    }
}
