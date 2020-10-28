<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'isbn' ,
        'title',
        'author',
        'genre',
        'edition',
        'pages',
        'image',
        'year',
    ];
}
