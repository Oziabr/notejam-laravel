@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Pad <strong>{{ $pad->name }}</strong> details</h3></div>

                <div class="panel-body">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="/pad">All pads</a></li>
                        <li class="breadcrumb-item active">{{ $pad->name }}</li>
                    </ol>
                </div>
                <div class="panel-footer">
                    <a class="btn btn-default" href="{{ $pad->id }}/edit">edit</a>
                    <a class="btn pull-right btn-danger" href="{{ $pad->id }}/delete">delete</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
