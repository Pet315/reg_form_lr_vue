@extends('layout')

@section('title')
    All members
@endsection

@section('body content')
    <div id="app">
        <members-table :members="{{ $members }}"></members-table>
    </div>
@endsection
