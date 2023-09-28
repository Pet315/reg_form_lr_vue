@extends('layout')

@section('title')
    Social buttons
@endsection

@section('body content')
    <div class="text-center mt-4">
        <a href="https://www.facebook.com/sharer/sharer.php?u= {{urlencode('http://localhost.com/reg_form_php/index')}}" class="btn btn-link" target="_blank">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b8/2021_Facebook_icon.svg/200px-2021_Facebook_icon.svg.png" alt="FB" id="btn">
        </a>
        <a href="https://twitter.com/intent/tweet?text={{urlencode($tw['text'])}}&url={{urlencode($tw['link'])}}" class="btn btn-link" id="tw_link" target="_blank">
            <img src="https://cdn-icons-png.flaticon.com/512/145/145812.png" alt="TW" id="btn">
        </a>
    </div>

    <div class="text-center mt-3">
        <a href="/all_members" class="text-decoration-none" target="_blank">
            <h4>All members ({{ $number }})</h4>
        </a>
    </div>
@endsection


