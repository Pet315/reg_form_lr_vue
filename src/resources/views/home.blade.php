@extends('layouts.app')

@section('content')
    {{$id}}
    <div id="app">
        <admin-table :members="{{ $members }}"></admin-table>
    </div>
@endsection
