@extends('layout')

@section('title')
    Main page
@endsection

@section('head content')
    <style>
        form {
            width: 50%;
        }
        .form-label:after {
            content:" *";
            color: red;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>
@endsection

@section('body content')
    <div class="container my-5">
        <h3>To participate in the conference, please fill out the form</h3>

        <form action="/step2" method="post" id="form">
            @csrf
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name (max length: 30 symbols):</label>
                <input type="text" class="form-control" name="first_name" value="@if (isset($_SESSION['POST']['first_name'])) {{$_SESSION['POST']['first_name']}} @endif" maxlength="30">
                @if (strpos($error, 'first name'))
                    <small class="form-text text-danger">{{$error}}</small>
                @endif
            </div>

            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name (max length: 50):</label>
                <input type="text" class="form-control" name="last_name" value="@if (isset($_SESSION['POST']['first_name'])) {{$_SESSION['POST']['last_name']}} @endif" maxlength="50">
                @if (strpos($error, 'last name'))
                    <small class="form-text text-danger">{{$error}}</small>
                @endif
            </div>

            <div class="mb-3">
                <label for="birthdate" class="form-label">Birth date:</label>
                <input type="date" class="form-control" name="birthdate" max="@if (isset($_SESSION['POST']['first_name'])) {{$_SESSION['POST']['birthdate']}} @endif">
                @if (strpos($error, 'birthdate'))
                    <small class="form-text text-danger">{{$error}}</small>
                @endif
            </div>

            <div class="mb-3">
                <label for="report_subject" class="form-label">Report Subject (max length: 150):</label>
                <input type="text" class="form-control" name="report_subject" value="@if (isset($_SESSION['POST']['first_name'])) {{$_SESSION['POST']['report_subject']}} @endif" maxlength="150">
                @if (strpos($error, 'report subject'))
                    <small class="form-text text-danger">{{$error}}</small>
                @endif
            </div>

            <div class="mb-3">
                <label for="country" class="form-label">Country:</label>
                <select id="country" name="country" class="form-select search_select_box"></select>
                <span class="d-none">@if (isset($_SESSION['POST']['first_name'])) {{$_SESSION['POST']['country']}} @endif</span>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', () => {
                const selectDrop = document.querySelector('#country');

                fetch('https://restcountries.com/v3.1/all').then(res => {
                    return res.json();
                }).then(data => {
                    let a = [];
                    data.forEach(country => {
                        a.push(country.name['common'])
                    })
                    a.sort();

                    let defaultCountry = document.querySelector('span').textContent;
                    let output;

                    if (defaultCountry == '') {
                        output = "";
                    } else {
                        output = `<option value="${defaultCountry}">${defaultCountry}</option>`;
                    }
                    for (let i = 0; i < a.length; i++) {
                        output += `<option value="${a[i]}">${a[i]}</option>`;
                    }
                    selectDrop.innerHTML = output;
                }).catch(err => {
                    console.log(err);
                })
                });
            </script>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone (use this format: +1 (555) 555-5555):</label>
                <input type="tel" class="form-control" name="phone" id="phone" value="@if (isset($_SESSION['POST']['first_name']) and !strpos($error, 'phone')) {{$_SESSION['POST']['phone']}} @endif">
                <script>
                    $(document).ready(function () {
                        $('#phone').inputmask('+9[9] (999) 999-9999');
                    });
                </script>
                @if (strpos($error, 'phone'))
                    <small class="form-text text-danger">{{$error}}</small>
                @endif
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email (max length: 70):</label>
                <input type="text" class="form-control" name="email" value="@if (isset($_SESSION['POST']['first_name']) and !strpos($error, 'email')) {{$_SESSION['POST']['email']}} @endif" maxlength="70">
                @if (strpos($error, 'email'))
                    <small class="form-text text-danger">{{$error}}</small>
                @endif
                <span id="emailError" style="color: red;"></span>
            </div>

            <button type="submit" class="btn btn-primary" id="nextStep1">Next</button>
        </form>
    </div>
@endsection
