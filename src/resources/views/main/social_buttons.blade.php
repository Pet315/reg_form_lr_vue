@extends('layout')

@section('title')
    Social buttons
@endsection

@section('body content')
    <div id="app">
        <buttons :response-data="{{ json_encode($data) }}"></buttons>
    </div>
@endsection


