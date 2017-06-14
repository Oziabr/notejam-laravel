@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Deleting note <strong>{{ $note->name }}</strong></h3></div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/note/{{ $note->id }}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger" type="submit">confirm</button>
                        <a class="btn pull-right btn-default" href="../{{ $note->id }}">back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
