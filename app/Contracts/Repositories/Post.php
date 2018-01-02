<?php

namespace LaravelBlog\Contracts\Repositories;

use Matthewbdaly\LaravelRepositories\Repositories\Interfaces\AbstractRepositoryInterface;

interface Post extends AbstractRepositoryInterface
{
    public function orderByLimit(string $field, string $order, int $limit = 5, int $offset = null);

    public function bySlug(string $slug);

    public function search(string $search);
}
