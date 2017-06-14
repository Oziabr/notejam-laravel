@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>All pads</h3></div>

                <div class="panel-body">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">All pads</li>
                    </ol>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($list as $pad)
                            <tr>
                                <th scope="row">{{ $pad->id }}</th>
                                <td>{{ $pad->name }}</td>
                                <td>{{ $pad->user->name }}</td>
                                <td>{{ \Carbon\Carbon::parse($pad->created_at)->formatLocalized('%d %B %Y') }}</td>
                                <td><a class='btn btn-default pull-right' href="/pad/{{$pad->id}}">Edit</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer">
                    <a class="btn btn-primary" href="/pad/create">New pad</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
