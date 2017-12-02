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

    public function scopeSearch($query, $search)
    {
        if (!$search) {
            return $query;
        }
        return $query->whereRaw('searchtext @@ to_tsquery(\'english\', ?)', [$search])
            ->orderByRaw('ts_rank(searchtext, to_tsquery(\'english\', ?)) DESC', [$search]);
    }
}
