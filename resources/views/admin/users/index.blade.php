@extends('layouts.account')
@section('title')
    Users
@stop
@section('content')
    <div class="card hoverable">
        <div class="card-content">
            <div class="card-title">Users</div>
                <table class="bordered responsive-table striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>User Name</th>
                        <th>User Name</th>
                        <th>Member Since</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr class="{{ auth()->user()->id == $user->id ? 'teal lighten-4' : ''}}">
                            <td>
                                {{ link_to_route('users.edit', $user->id, $user->id) }}
                            </td>
                            <td>
                                {{ link_to_route('users.edit', $user->name, $user->id) }}
                            </td>
                            <td>
                                {{ $user->email }}
                            </td>
                            <td>
                                {{ prettyDate($user->created_at) }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-action right-align">
                <a href="{{ route('users.create') }}" class="btn waves-effect waves-light">Create User</a>
            </div>
        </div>
@stop