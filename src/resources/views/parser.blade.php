@extends('layout')

@section('title')
    PHP Parser
@endsection

@section('body content')
    <div id="app">
        <crossword-table :crossword="{{ json_encode($crossword) }}"></crossword-table>
    </div>

    <div class="pagination">
        {{$paginator}}
    </div>
@endsection
