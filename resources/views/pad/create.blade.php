@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <form class="form-horizontal" role="form" method="POST" action="/pad">
                    {{ csrf_field() }}
                    <div class="panel-heading"><h3>Creating pad</h3></div>

                    <div class="panel-body">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="" required autofocus>

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
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
