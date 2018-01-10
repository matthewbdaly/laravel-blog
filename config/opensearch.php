<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Opensearch details
    |--------------------------------------------------------------------------
    |
    | Include your site's search template, description and name
    |
    */
    'description' => 'Search localhost:8000',

    'shortname' => 'localhost:8000',

    'template' => 'http://localhost:8000/search?q={searchTerms}',
];
