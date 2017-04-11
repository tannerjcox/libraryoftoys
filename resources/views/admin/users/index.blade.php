@extends('layouts.account')

@section('content')
    <table class="table table-hover table-striped">
        <thead>
        <tr>
            <th></th>
            <th>User Name</th>
            <th>Member Since</th>
            <th>Admin</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>
                    {{ $user->id }}
                </td>
                <td>
                    {{ link_to_route('users.edit', $user->name, $user->id) }}
                </td>
                <td>
                    {{ $user->created_at }}
                </td>
                <td>
                    {{ $user->is_admin }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop