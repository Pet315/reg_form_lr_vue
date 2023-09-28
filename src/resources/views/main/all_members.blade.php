@extends('layout')

@section('title')
    All members
@endsection

@section('head content')
    <style>
        img {
            height: 20px;
            width: 20px;
        }
        th, td {
            text-align: center;
        }
    </style>
@endsection

@section('body content')
    <div class="container my-5">
        <h3>All members</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Full Name</th>
                    <th>Report Subject</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>

            @foreach ($members as $member)
                <tr>
                    <td>
                        @if ($member["photo"])
                            <img src="{{ asset('img/' . $member['photo']) }}" alt="User">
                        @else
                            <img src="{{ asset('img/default_user.png') }}" alt='Default User'>
                        @endif
                    </td>
                    <td>{{$member["first_name"]}} {{$member["last_name"]}}</td>
                    <td>{{$member["report_subject"]}}</td>
                    <td><a href='mailto:{{$member["email"]}}'>{{$member["email"]}}</a></td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@endsection
