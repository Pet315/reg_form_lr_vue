@extends('layout')

@section('title')
    Step 2
@endsection

@section('body content')
    <div class="container my-5">
        <h3>To participate in the conference, please fill out the form</h3>
        <div id="app">
            <form2 :response-data="{{ $request }}"></form2>
        </div>
    </div>
@endsection
