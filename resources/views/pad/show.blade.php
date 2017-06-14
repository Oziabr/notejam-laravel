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

                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Last change</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($pad->notes as $note)
                            <tr>
                                <th scope="row">{{ $note->id }}</th>
                                <td>{{ $note->name }}</td>
                                <td>{{ \Carbon\Carbon::parse($note->updated_at)->formatLocalized('%d %B %Y') }}</td>
                                <td><a class='btn btn-default pull-right' href="/note/{{$note->id}}">Edit</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

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
