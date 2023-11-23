@extends('layout')

@section('title')
    Parser
@endsection

@section('body content')

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Question</th>
            <th>Answer</th>
            <th>Length</th>
        </tr>
        </thead>
        <tbody>

{{--        @foreach ($questions as $question)--}}
            <tr>
                <td>{{$questions[0]['question']}}</td>
                <td>{{$questions[0]['answers'][0]}}</td>
                <td>{{$questions[0]['length'][0]}}</td>
            </tr>
{{--        @endforeach--}}

        </tbody>
    </table>
@endsection
