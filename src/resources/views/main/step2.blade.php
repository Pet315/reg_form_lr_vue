@extends('layout')

@section('title')
    Step 2
@endsection

@section('body content')
    <div class="container my-5">
        <h3>To participate in the conference, please fill out the form</h3>

{{--        <form id="form2" action="/social_buttons" method="post" enctype="multipart/form-data">--}}
{{--            @csrf--}}
{{--            @foreach($request as $key => $value)--}}
{{--                <input type="hidden" name="{{$key}}" value="{{$value}}">--}}
{{--            @endforeach--}}
{{--    --}}
{{--            <div class="mb-3">--}}
{{--                <label for="company">Company:</label>--}}
{{--                <input type="text" class="form-control" name="company" value="@if(isset($old)){{ $old['company'] }}@endif">--}}
{{--            </div>--}}
{{--            <div class="mb-3">--}}
{{--                <label for="position">Position:</label>--}}
{{--                <input type="text" class="form-control" name="position" value="@if(isset($old)){{ $old['position'] }}@endif">--}}
{{--            </div>--}}
{{--            <div class="mb-3">--}}
{{--                <label for="about-me">About me:</label>--}}
{{--                <textarea class="form-control" name="about_me" rows="4">@if(isset($old)){{ $old['about_me'] }}@endif</textarea>--}}
{{--            </div>--}}
{{--            <div class="mb-3">--}}
{{--                <label for="photo">Photo (file size: 2MB):</label>--}}
{{--                <input type="file" class="custom-file-input" id="photo" name="photo" accept="image/jpeg, image/png">--}}
{{--                <br><small class="form-text text-danger" id="fileSizeError"></small>--}}
{{--            </div>--}}
{{--            <script src="{{ asset('js/checkPhoto.js') }}"></script>--}}
{{--    --}}
{{--            <div class="mb-3">--}}
{{--                <button type="submit" class="btn btn-primary" id="nextStep2">Next</button>--}}
{{--                <!-- <a href="#" class="btn btn-danger">Back</a> -->--}}
{{--            </div>--}}
{{--        </form>--}}
    </div>
@endsection
