<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" type="text/css" href="{{ mix('/css/app.css') }}">
        <link href="/opensearch.xml" rel="search" title="Search Matthew Daly's Blog" type="application/opensearchdescription+xml">

    </head>
    <body>
        <nav class="navbar is-primary" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
                <a class="navbar-item" href="/">
                    <img src="https://www.placecage.com/c/20/20" alt="Matthew Daly's Blog" width="20" height="20">
                </a>

                <button class="button navbar-burger">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <div class="navbar-end">
                    <form method="GET" action="/search">
                        <input class="input" type="search" name="q" placeholder="Search..." />
                    </form>
                </div>
            </div>
        </nav>
        <section class="hero">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title">
                        <a href="/">Matthew Daly's Blog</a>
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
