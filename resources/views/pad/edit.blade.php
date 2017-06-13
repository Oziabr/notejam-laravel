@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Editing pad <strong>{{ $pad->name }}</strong></h3></div>
                <form class="form-horizontal" role="form" method="POST" action="/pad/{{ $pad->id }}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    <div class="panel-body">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item"><a href="/pad">All pads</a></li>
                            <li class="breadcrumb-item active">{{ $pad->name }}</li>
                        </ol>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $pad->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                                </div>
                            </div>
                    </div>
                    <div class="panel-footer">
                        <button class="btn btn-primary" type="submit">done</button>
                        <a class="btn pull-right btn-default" href="../{{ $pad->id }}">back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
