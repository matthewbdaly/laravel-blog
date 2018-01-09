@extends('layout')

@section('content')
                        @foreach ($posts as $post)
                            <h1 class="title">
                                <a href="{{ $post->slug }}">{{ $post->title }}</a>
                            </h1>
                            {!! markdown($post->text) !!}
                        @endforeach
@endsection
