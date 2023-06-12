<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //protected $fillable = ['title', 'excerpt', 'body'] ;

    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }

    public function scopeFilter($query, array $filters)
    // scopefilter will accept a quary automaticly and you can call it without the scope
    // dd(request('search'))
    // or dd(request(['search'])) hay 7traaj3 array with key of $search => value
    {
        // $search is pased by the 
        // lama n3ml search 
        $query->when($filters['search'] ?? false, fn ($query, $search) =>

        $query->where(fn($query)=>
            $query->where('title', 'like', '%' . $search . '%')
            ->orWhere('body', 'like', '%' . $search . '%')
        )
    );

        // lama n5tar category
        //SELECT * from posts 
        // where EXISTS (
        // SELECT * from categories where categories.id = posts.id
        // )
        $query->when($filters['category'] ?? false, fn ($query, $category) =>
            $query->whereHas ('category', fn ($query) =>
                $query->where('slug', $category)
                )
        );


        // if we have author give me the post that have the author name in it
        $query->when($filters['author'] ?? false, fn ($query, $author) =>
        $query->whereHas ('author', fn ($query) =>
            $query->where('username', $author)
            )
        );
          
        
        
        
        
        // $query
            //     ->whereExists(fn ($query) =>
            //     $query->from('categories') //cat table
            //         ->whereColumn('categories.id', 'posts.category_id')
            //         // we used column 3ashan ma bdna ll exact value of the second argument 'posts.category_id' bdna ll value t3ita 
            //         ->where('categories.slug', $category))
    }

    public function comments() // by3tbr 2sm ll function foreign key_id  user_id
    {
        return $this->hasMany(Comment::class);
    }

    public function category()
    {
        //function name = class name lash ma b3rf
        return $this->belongsTo(Category::class);
    }

    public function author() // by3tbr 2sm ll function foreign key_id  user_id
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
