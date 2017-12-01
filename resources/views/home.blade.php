@extends('layout')

@section('content')
                        @foreach ($posts as $post)
                            <h1 class="title">
                                {{ $post->title }}
                            </h1>
                            {!! $post->text !!}
                        @endforeach
@endsection
