<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';

    protected $fillable = [
        'name',
        'author',
        'id_category',
        'published',
        'user',
        'borrowed',
        'active'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category','id_category');
    }

    public function scopeLibro($query, $name){
        if($name)
            return $query->where('name','LIKE',"%$name%");
    }

    public function scopeAutor($query, $author){
        if($author)
            return $query->where('author','LIKE',"%$author%");
    }

    public function scopeCategoria($query, $category){
        if($category)
            return $query->where('id_category','LIKE',"%$category%");
    }
}
