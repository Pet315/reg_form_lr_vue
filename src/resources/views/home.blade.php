@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h4>Members</h4>
    <table class="table table-bordered">
        <thead>
        <tr>
            @foreach(array_keys($members[0]) as $key)
                <th>{{$key}}</th>
            @endforeach
        </tr>
        </thead>

        <tbody>
        @foreach ($members as $member)
            <tr>
                @foreach ($member as $key => $value)
                    <td>
                        @if ($key === 'photo')
                            @if ($value)
                                <img src="{{ asset('img/' . $value) }}" alt="User">
                            @else
                                <img src="{{ asset('img/default_user.png') }}" alt='Default User'>
                            @endif
                        @else
                            {{$value}}
                        @endif
{{--                        <edit-field :initial-value="item.field" @save="saveField(item, $event)"></edit-field>--}}
                    </td>
                @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

{{--<script>--}}
{{--    new Vue({--}}
{{--        el: '#app',--}}
{{--        data: {--}}
{{--            items: []--}}
{{--        },--}}
{{--        methods: {--}}
{{--            saveField(item, newValue) {--}}
{{--            }--}}
{{--        }--}}
{{--    });--}}
{{--</script>--}}

@endsection
