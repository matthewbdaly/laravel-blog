<?php

namespace LaravelBlog\Eloquent\Models;

use Illuminate\Database\Eloquent\Model;
use Matthewbdaly\LaravelComments\Eloquent\Traits\Commentable;

class Post extends Model
{
    use Commentable;

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
