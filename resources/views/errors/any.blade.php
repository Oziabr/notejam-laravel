@extends('layouts.app')

@section('content')
    <div class="container alert alert-danger">
        <h3><strong>{{ $code }}</strong>: {{ $msg }}</h3>
    </div>
@endsection