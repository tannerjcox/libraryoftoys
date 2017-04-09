@extends('layouts.account')

@section('content')
    @if(isset($user))
        {!! BootForm::open()->post('users.update') !!}
    @else
        {!! BootForm::open()->post('users.store') !!}
    @endif
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>
            @if(isset($user))
                Edit {{ $user->name }}
            @else
                Create New User
            @endif
            </h4>
        </div>
        <div class="panel-body">
            {!! BootForm::text('Name', 'name') !!}
        </div>
        <div class="panel-footer text-right">
            {!! BootForm::submit()->class('btn btn-success text-right') !!}
        </div>
    </div>
    {!! BootForm::close() !!}
@stop