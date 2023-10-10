@extends('layout')

@section('title')
    Main page
@endsection

@section('body content')
    <div class="container my-5">
        <h3>To participate in the conference, please fill out the form</h3>
        <div id="app">
            <form1 :response-data="{{ json_encode($request) }}"></form1>
        </div>
    </div>
@endsection
