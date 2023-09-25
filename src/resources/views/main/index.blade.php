@extends('layout')

@section('title')
    Main page
@endsection

@section('body content')
    <div class="container my-5">
        <h3>To participate in the conference, please fill out the form</h3>

        <form action="/step2" method="post" id="form">
            @csrf
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name (max length: 30 symbols):</label>
                <input type="text" class="form-control" name="first_name" value="@if(isset($_SESSION['POST']['first_name'])){{$_SESSION['POST']['first_name']}}@endif" maxlength="30">
                @foreach ($errors as $error)
                    @if (strpos($error, 'first name'))
                        <small class="form-text text-danger">{{$error}}</small>
                    @endif
                    @break
                @endforeach


            </div>

            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name (max length: 50):</label>
                <input type="text" class="form-control" name="last_name" value="@if(isset($_SESSION['POST']['first_name'])){{$_SESSION['POST']['last_name']}}@endif" maxlength="50">
                @foreach ($errors as $error)
                    @if (strpos($error, 'last name'))
                        <small class="form-text text-danger">{{$error}}</small>
                    @endif
                    @break
                @endforeach
            </div>

            <div class="mb-3">
                <label for="birthdate" class="form-label">Birth date:</label>
                <input type="date" class="form-control" name="birthdate" max="{{date('Y-m-d')}}" value="@if(isset($_SESSION['POST']['first_name'])){{$_SESSION['POST']['birthdate']}}@endif">
                @foreach ($errors as $error)
                    @if (strpos($error, 'birthdate'))
                        <small class="form-text text-danger">{{$error}}</small>
                    @endif
                    @break
                @endforeach
            </div>

            <div class="mb-3">
                <label for="report_subject" class="form-label">Report Subject (max length: 150):</label>
                <input type="text" class="form-control" name="report_subject" value="@if(isset($_SESSION['POST']['first_name'])){{$_SESSION['POST']['report_subject']}}@endif" maxlength="150">
                @foreach ($errors as $error)
                    @if (strpos($error, 'report subject'))
                        <small class="form-text text-danger">{{$error}}</small>
                    @endif
                    @break
                @endforeach
            </div>

            <div class="mb-3">
                <label for="country" class="form-label">Country:</label>
                <select id="country" name="country" class="form-select search_select_box"></select>
                <span class="d-none">@if(isset($_SESSION['POST']['first_name'])){{$_SESSION['POST']['country']}}@endif</span>
            </div>
            <script src="public/js/selectCountry.js"></script>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone (use this format: +1 (555) 555-5555):</label>
                <input type="tel" class="form-control" name="phone" id="phone" value="{{ old('phone') }}">

                @if ($errors->has('phone'))
                    <small class="form-text text-danger">{{ $errors->first('phone') }}</small>
                @endif
            </div>
            <script src="public/js/phoneMask.js"></script>

            <div class="mb-3">
                <label for="email" class="form-label">Email (max length: 70):</label>
                <input type="text" class="form-control" name="email" value="{{ old('email') }}">

                @if ($errors->has('email'))
                    <small class="form-text text-danger">{{ $errors->first('email') }}</small>
                @endif
            </div>

            <button type="submit" class="btn btn-primary" id="nextStep1">Next</button>
        </form>
    </div>
@endsection
