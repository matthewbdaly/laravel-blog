@extends('admin::layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif

            <h2>{{ title_case($model_name) }}</h2>
            <a href="/admin/{{ $model_name }}/create" class="btn btn-primary btn-block">Create</a>
            <ul class="list-group">
                @foreach ($items as $item)
                <li class="list-group-item">
                    <a href="/admin/{{ $model_name }}/{{ $item->id }}/">{{ $item->id }}</a>
                </li>
                @endforeach
            </ul>
        </div>
        @include('admin::partials.sidebar')
    </div>
</div>
@endsection
