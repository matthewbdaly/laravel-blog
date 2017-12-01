<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" type="text/css" href="{{ mix('/css/app.css') }}">

    </head>
    <body>
        <section class="section">
            <div class="container">
                <div class="columns">
                    <div class="column is-two-thirds">
                        @foreach ($posts as $post)
                            <h1 class="title">
                                {{ $post->title }}
                            </h1>
                            {!! $post->text !!}
                        @endforeach
                    </div>
                    <div class="column is-one-third">
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>