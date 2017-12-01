<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                @foreach ($posts as $post)
                    <div class="title m-b-md">
                        {{ $post->title }}
                    </div>
                    {!! $post->text !!}
                @endforeach
            </div>
        </div>
    </body>
</html>
