<?php

namespace LaravelBlog\Eloquent\Repositories;

use Matthewbdaly\LaravelRepositories\Repositories\Base;
use LaravelBlog\Contracts\Repositories\Post as PostContract;
use LaravelBlog\Eloquent\Models\Post as Model;

class Post extends Base implements PostContract
{
    /**
     * Constructor
     *
     * @param Model $model The model for the repository.
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function orderByLimit(string $field, string $order, int $limit = 5, int $offset = null)
    {
        return $this->model->orderBy($field, $order)->limit($limit)->offset($offset)->get();
    }

    public function bySlug(string $slug)
    {
        return $this->model->where('slug', $slug)->first();
    }
}
