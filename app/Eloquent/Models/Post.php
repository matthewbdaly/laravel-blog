<?php

namespace Matthewbdaly\LaravelBlog\Eloquent\Models;

use Illuminate\Database\Eloquent\Model;
use Matthewbdaly\LaravelComments\Eloquent\Traits\Commentable;
use Matthewbdaly\LaravelBlog\Events\PostBeingCreated;

class Post extends Model
{
    use Commentable;

    protected $fillable = [
        'title',
        'pub_date',
        'text',
        'slug',
        'author_id',
    ];

    protected $dispatchesEvents = [
        'creating' => PostBeingCreated::class,
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
