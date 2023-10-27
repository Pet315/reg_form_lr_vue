@extends('layout')

@section('title')
    All members
@endsection

@section('body content')
    <div id="app">
        <members-table :members="{{ json_encode($members) }}"></members-table>
    </div>

    <div class="pagination">
        {{$paginator}}
    </div>
@endsection
