<?php

namespace LaravelBlog;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'pub_date',
        'text',
        'slug',
        'author_id'
    ];

}
