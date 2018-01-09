@extends('layout')

@section('content')
                            <h1 class="title">
                                <a href="{{ $post->slug }}">{{ $post->title }}</a>
                            </h1>
                            {!! markdown($post->text) !!}
                            @include('comments::comments', ['parent' => $post])
@endsection
