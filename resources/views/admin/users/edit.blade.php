@extends('layouts.account')

@section('content')
    @if(isset($user))
        {!! BootForm::open()->put()->action(route('users.update', $user->id)) !!}
        {!! BootForm::bind($user) !!}
        {!! BootForm::hidden('id') !!}
    @else
        {!! BootForm::open()->post()->action(route('users.store')) !!}
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
            <div class="col-md-6">
                {!! BootForm::text('Name', 'name') !!}
            </div>
            <div class="col-md-6">
                {!! BootForm::text('Email', 'email') !!}
            </div>
            @if(!isset($user))
                <div class="col-md-6">
                    {!! BootForm::password('Password', 'password') !!}
                </div>
                <div class="col-md-6">
                    {!! BootForm::password('Confirm Password', 'password_confirmation') !!}
                </div>
            @endif
            <div class="col-xs-6">
                {!! BootForm::checkbox('Is Admin', 'is_admin') !!}
            </div>
        </div>
        <div class="panel-footer text-right">
            {!! BootForm::submit()->class('btn btn-success text-right') !!}
        </div>
    </div>
    {!! BootForm::close() !!}
@stop