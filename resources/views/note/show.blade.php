@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Note <strong>{{ $note->name }}</strong> details</h3></div>

                <div class="panel-body">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="./">All notes</a></li>
                        <li class="breadcrumb-item active">{{ $note->name }}</li>
                    </ol>
                    <p>{{$note->text}}</p>
                    <p><a href="/pad/{{ $note->pad->id }}"><span class="badge badge-info">{{ $note->pad->name }}</span></a></p>
                </div>
                <div class="panel-footer">
                    <a class="btn btn-default" href="{{ $note->id }}/edit">edit</a>
                    <a class="btn pull-right btn-danger" href="{{ $note->id }}/delete">delete</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
