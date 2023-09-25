@extends('layout')

@section('title')
    Step 2
@endsection

@section('body content')
    <div class="container my-5">
    <h3>To participate in the conference, please fill out the form</h3>

    <form id="form2" action="/reg_form_php/social_buttons" method="post" enctype="multipart/form-data">

        <input type="hidden" name="first_name" value="<?= $_SESSION['POST']['first_name'] ?>">
        <input type="hidden" name="last_name" value="<?= $_SESSION['POST']['last_name'] ?>">
        <input type="hidden" name="birthdate" value="<?= $_SESSION['POST']['birthdate'] ?>">
        <input type="hidden" name="report_subject" value="<?= $_SESSION['POST']['report_subject'] ?>">
        <input type="hidden" name="country" value="<?= $_SESSION['POST']['country'] ?>">
        <input type="hidden" name="phone" value="<?= $_SESSION['POST']['phone'] ?>">
        <input type="hidden" name="email" value="<?= $_SESSION['POST']['email'] ?>">

        <div class="mb-3">
            <label for="company">Company:</label>
            <input type="text" class="form-control" name="company" value="@if(isset($_SESSION['POST']['company'])){{$_SESSION['POST']['company']}}@endif">
        </div>
        <div class="mb-3">
            <label for="position">Position:</label>
            <input type="text" class="form-control" name="position" value="@if(isset($_SESSION['POST']['position'])){{$_SESSION['POST']['position']}}@endif">
        </div>
        <div class="mb-3">
            <label for="about-me">About me:</label>
            <textarea class="form-control" name="about_me" rows="4">@if(isset($_SESSION['POST']['about_me'])){{$_SESSION['POST']['about_me']}}@endif</textarea>
        </div>
        <div class="mb-3">
            <label for="photo">Photo (file size: 2MB):</label>
            <input type="file" class="custom-file-input" id="photo" name="photo" accept="image/jpeg, image/png">
            <br><small class="form-text text-danger" id="fileSizeError"></small>
        </div>
        <script src="public/js/checkPhoto.js"></script>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary" id="nextStep2">Next</button>
            <!-- <a href="#" class="btn btn-danger">Back</a> -->
        </div>
    </form>
</div>
@endsection
