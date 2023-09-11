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
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name (max length: 30 symbols):</label>
                <input type="text" class="form-control" name="first_name" value="<?php if (isset($_SESSION['POST']['first_name'])) { echo $_SESSION['POST']['first_name']; } ?>" maxlength="30">
{{--                <?php if (strpos($content, 'first name')): ?>--}}
{{--                    <small class="form-text text-danger"><?= $content?></small>--}}
{{--                <?php endif; ?>--}}
            </div>

            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name (max length: 50):</label>
                <input type="text" class="form-control" name="last_name" value="<?php if (isset($_SESSION['POST']['first_name'])) { echo $_SESSION['POST']['last_name']; } ?>" maxlength="50">
{{--                <?php if (strpos($content, 'last name')): ?>--}}
{{--                    <small class="form-text text-danger"><?= $content?></small>--}}
{{--                <?php endif; ?>--}}
            </div>

            <div class="mb-3">
                <label for="birthdate" class="form-label">Birth date:</label>
                <input type="date" class="form-control" name="birthdate" max="<?php echo date('Y-m-d'); ?>" value="<?php if (isset($_SESSION['POST']['first_name'])) { echo $_SESSION['POST']['birthdate']; } ?>">
{{--                <?php if (strpos($content, 'birthdate')): ?>--}}
{{--                    <small class="form-text text-danger"><?= $content?></small>--}}
{{--                <?php endif; ?>--}}
            </div>

            <div class="mb-3">
                <label for="report_subject" class="form-label">Report Subject (max length: 150):</label>
                <input type="text" class="form-control" name="report_subject" value="<?php if (isset($_SESSION['POST']['first_name'])) { echo $_SESSION['POST']['report_subject']; } ?>" maxlength="150">
{{--                <?php if (strpos($content, 'report subject')): ?>--}}
{{--                    <small class="form-text text-danger"><?= $content?></small>--}}
{{--                <?php endif; ?>--}}
            </div>

            <div class="mb-3">
                <label for="country" class="form-label">Country:</label>
                <select id="country" name="country" class="form-select search_select_box"></select>
                <span class="d-none"><?php if (isset($_SESSION['POST']['first_name'])) { echo $_SESSION['POST']['country']; } ?></span>
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
                <input type="tel" class="form-control" name="phone" id="phone" value="<?php if (isset($_SESSION['POST']['first_name']) and !strpos($content, 'phone')) { echo $_SESSION['POST']['phone']; } ?>">
                <script>
                    $(document).ready(function () {
                        $('#phone').inputmask('+9[9] (999) 999-9999');
                    });
                </script>
{{--                <?php if (strpos($content, 'phone')): ?>--}}
{{--                    <small class="form-text text-danger"><?= $content?></small>--}}
{{--                <?php endif; ?>--}}
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email (max length: 70):</label>
                <input type="text" class="form-control" name="email" value="<?php if (isset($_SESSION['POST']['first_name']) and !strpos($content, 'email')) { echo $_SESSION['POST']['email']; } ?>" maxlength="70">
{{--                <?php if (strpos($content, 'email')): ?>--}}
{{--                    <small class="form-text text-danger"><?= $content?></small>--}}
{{--                <?php endif; ?>--}}
                <span id="emailError" style="color: red;"></span>
            </div>

            <button type="submit" class="btn btn-primary" id="nextStep1">Next</button>
        </form>
    </div>
@endsection
