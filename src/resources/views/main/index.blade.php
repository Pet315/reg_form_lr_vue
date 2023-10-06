@extends('layout')

@section('title')
    Main page
@endsection

@section('body content')

    <div class="container my-5">
        @if (Route::has('login'))
            <nav>
                @auth
                    <a href="{{ url('/home') }}" class="btn btn-secondary">Admin panel</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-danger">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-success">Register</a>
                    @endif
                @endauth
            </nav>
        @endif

        <h3>To participate in the conference, please fill out the form</h3>
        <div id="app">
            <form1></form1>
        </div>

    </div>
@endsection
