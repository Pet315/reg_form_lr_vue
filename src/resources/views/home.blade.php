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
                <th>operations</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                @foreach ($members as $member)
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
                @endforeach
                <td>
                    <a href="/" class="btn btn-success btn-sm">Edit</a>
                    <a href="/" class="btn btn-secondary btn-sm" id="hide_btn">Hide</a>
                    <a href="/" class="btn btn-danger btn-sm" id="del_btn">Delete</a>
                </td>
            </tr>
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
