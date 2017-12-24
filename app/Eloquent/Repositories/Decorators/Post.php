<?php

namespace LaravelBlog\Eloquent\Repositories\Decorators;

use Matthewbdaly\LaravelRepositories\Repositories\Decorators\BaseDecorator;
use LaravelBlog\Contracts\Repositories\Post as PostContract;
use Illuminate\Contracts\Cache\Repository as Cache;

class Post extends BaseDecorator implements PostContract
{
    public function __construct(PostContract $repository, Cache $cache)
    {
        $this->repository = $repository;
        $this->cache = $cache;
    }

    public function orderByLimit(string $field, string $order, int $limit = 5, int $offset = null)
    {
        return $this->cache->tags($this->getModel())->remember($field.$order.$limit.$offset, 60, function () use ($field, $order, $limit, $offset) {
            return $this->repository->orderByLimit($field, $order, $limit, $offset);
        });
    }

    public function bySlug(string $slug)
    {
        return $this->cache->tags($this->getModel())->remember($slug, 60, function () use ($slug) {
            return $this->repository->bySlug($slug);
        });
    }
}
