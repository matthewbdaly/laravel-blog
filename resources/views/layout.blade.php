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
        <section class="hero">
          <div class="hero-body">
            <div class="container">
              <h1 class="title">
                Matthew Daly's Blog
              </h1>
              <h2 class="subtitle">
                I'm a web developer in Norfolk. This is my blog...
              </h2>
            </div>
          </div>
        </section>
        <section class="section">
            <div class="container">
                <div class="columns">
                    <div class="column is-two-thirds">
                        @yield('content')
                    </div>
                    @include('partials.sidebar')
                </div>
            </div>
        </section>
    </body>
</html>
