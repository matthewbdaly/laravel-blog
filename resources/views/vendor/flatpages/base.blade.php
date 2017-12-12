@extends('layout')

@section('content')
                            <h1 class="title">
                                <a href="{{ $flatpage->slug }}">{{ $flatpage->title }}</a>
                            </h1>
                            {{ $flatpage->content }}
@endsection
