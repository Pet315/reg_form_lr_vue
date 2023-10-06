@extends('layout')

@section('title')
    Social buttons
@endsection

@section('body content')
    <div id="app">
        <buttons :response-data="{{ $request }}"></buttons>
    </div>
@endsection


