<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Registered models
    |--------------------------------------------------------------------------
    |
    | Any models that should be shown in the admin must be registered here
    |
    */
    'models' => [

        'users' => 'Matthewbdaly\LaravelBlog\Eloquent\Models\User',
        'posts' => 'Matthewbdaly\LaravelBlog\Eloquent\Models\Post',
        'categories' => 'Matthewbdaly\LaravelBlog\Eloquent\Models\Category',
        'tags' => 'Matthewbdaly\LaravelBlog\Eloquent\Models\Tag',
        'flatpages' => 'Matthewbdaly\LaravelFlatpages\Eloquent\Models\Flatpage',
        'comments' => 'Matthewbdaly\LaravelComments\Eloquent\Models\Comment',
        'flag' => 'Matthewbdaly\LaravelComments\Eloquent\Models\Comment\Flag',

    ]
];
