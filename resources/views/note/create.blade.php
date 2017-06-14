@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Creating note</h3></div>
                <form class="form-horizontal" role="form" method="POST" action="/note">
                    {{ csrf_field() }}

                    <div class="panel-body">

                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item"><a href="/note">All notes</a></li>
                            <li class="breadcrumb-item active">New note</li>
                        </ol>

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

                        <div class="form-group">
                            <label for="text" class="col-md-4 control-label">Text</label>

                            <div class="col-md-6">
                                <textarea class="form-control" id="text" name="text" rows="7"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="pad_id" class="col-md-4 control-label">Pad</label>
                            <div class="col-md-6">
                                <select class="form-control" id="pad_id" name="pad_id">
                                @foreach (App\Pad::all() as $pad)
                                    @if ($pad_id == $pad->id)
                                        <option value='{{$pad->id}}' selected>{{$pad->name}}</option>
                                    @else
                                        <option value='{{$pad->id}}'>{{$pad->name}}</option>
                                    @endif
                                @endforeach
                                </select>
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
