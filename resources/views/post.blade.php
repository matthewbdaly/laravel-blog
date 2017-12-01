@extends('layout')

@section('content')
                            <h1 class="title">
                                <a href="{{ $post->slug }}">{{ $post->title }}</a>
                            </h1>
                            {!! $post->text !!}
@endsection
