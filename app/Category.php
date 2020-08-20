<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categorys';

    protected $fillable = [
        'name',
        'description'
    ];

    /*
        public function book(){
            return $this->hasMany('App\Book','id_category');
        }
    */
}
