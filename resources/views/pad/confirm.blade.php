@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Deleting pad <strong>{{ $pad->name }}</strong></h3></div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/pad/{{ $pad->id }}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger" type="submit">confirm</button>
                        <a class="btn pull-right btn-default" href="../{{ $pad->id }}">back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
