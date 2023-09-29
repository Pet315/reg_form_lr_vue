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

        <form id="form1" action="/step2" method="post">
            @csrf
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name (max length: 30 symbols):</label>
                <input type="text" class="form-control" name="first_name" value="@if(isset($old)){{ $old['first_name'] }}@endif" maxlength="30">
                @if ($errors->has('first_name'))
                    <small class="form-text text-danger">{{ $errors->first('first_name') }}</small>
                @endif
            </div>

            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name (max length: 50):</label>
                <input type="text" class="form-control" name="last_name" value="@if(isset($old)){{ $old['last_name'] }}@endif" maxlength="50">
                @if ($errors->has('last_name'))
                    <small class="form-text text-danger">{{ $errors->first('last_name') }}</small>
                @endif
            </div>

            <div class="mb-3">
                <label for="birthdate" class="form-label">Birth date:</label>
                <input type="date" class="form-control" name="birthdate" max="{{ date('Y-m-d') }}" value="@if(isset($old)){{ $old['birthdate'] }}@endif">
                @if ($errors->has('birthdate'))
                    <small class="form-text text-danger">{{ $errors->first('birthdate') }}</small>
                @endif
            </div>

            <div class="mb-3">
                <label for="report_subject" class="form-label">Report Subject (max length: 150):</label>
                <input type="text" class="form-control" name="report_subject" value="@if(isset($old)){{ $old['report_subject'] }}@endif" maxlength="150">
                @if ($errors->has('report_subject'))
                    <small class="form-text text-danger">{{ $errors->first('report_subject') }}</small>
                @endif
            </div>

            <div class="mb-3">
                <label for="country" class="form-label">Country:</label>
                <select id="country" name="country" class="form-select search_select_box"></select>
                <span class="d-none">{{ old('country') }}</span>
            </div>
            <script src="{{ asset('js/selectCountry.js') }}"></script>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone (use this format: +1 (555) 555-5555):</label>
                <input type="tel" class="form-control" name="phone" id="phone" value="@if(isset($old)){{ $old['phone'] }}@endif">
                @if ($errors->has('phone'))
                    <small class="form-text text-danger">{{ $errors->first('phone') }}</small>
                @endif
            </div>
            <script src="{{ asset('js/phoneMask.js') }}"></script>

            <div class="mb-3">
                <label for="email" class="form-label">Email (max length: 70):</label>
                <input type="text" class="form-control" name="email" value="@if(isset($old)){{ $old['email'] }}@endif">
                @if ($errors->has('email'))
                    <small class="form-text text-danger">{{ $errors->first('email') }}</small>
                @endif
            </div>

            <button type="submit" class="btn btn-primary" id="nextStep1">Next</button>
        </form>

    </div>
@endsection
