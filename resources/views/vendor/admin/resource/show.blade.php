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

            You are logged in!
            <form class="form-horizontal" method="POST" action="/admin/{{ $model_name }}/{{ $id }}">
                {{ csrf_field() }}

                @foreach ($fields as $name => $type)
                <input type="hidden" name="_method" value="PATCH" />
                <div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">{{ title_case($name) }}</label>

                    <div class="col-md-6">

                        <input id="{{ $name }}" type="text" class="form-control" name="{{ $name }}" value="{{ $model->getAttribute($name) }}" required autofocus>

                        @if ($errors->has($name))
                        <span class="help-block">
                            <strong>{{ $errors->first($name) }}</strong>
                        </span>
                        @endif

                    </div>
                </div>
                @endforeach

                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
            @include('admin::partials.sidebar')
        </div>
    </div>
</div>
@endsection
