@extends('layouts.app')

@section('content')
    <div class="container alert alert-danger">
        <h3><strong>404</strong>: {{ $exception->getMessage() }}</h3>
    </div>
@endsection