@extends('layouts.account')
@section('title')
    Users
@stop
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Users</h3>
        </div>
        <div class="panel-body">
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th></th>
                    <th>User Name</th>
                    <th>Member Since</th>
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
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="panel-footer text-right">
            <a href="{{ route('users.create') }}" class="btn btn-success">Create User</a>
        </div>
    </div>
@stop