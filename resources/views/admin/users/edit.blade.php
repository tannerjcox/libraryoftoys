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
            <div class="col-md-6 input-field">
                {!! BootForm::text('Name', 'name') !!}
            </div>
            <div class="col-md-6 input-field">
                {!! BootForm::text('Email', 'email') !!}
            </div>
            @if(!isset($user))
                <div class="col-md-6 input-field">
                    {!! BootForm::password('Password', 'password') !!}
                </div>
                <div class="col-md-6 input-field">
                    {!! BootForm::password('Confirm Password', 'password_confirmation') !!}
                </div>
            @endif
            <div class="col-xs-6">
                <label class="control-label">Is Admin</label>
                <div class="switch">
                    <label>
                        No
                        <input type="checkbox" name="is_admin" {{ isset($user) && $user->is_admin ? 'checked' : '' }}>
                        <span class="lever"></span>
                        Yes
                    </label>
                </div>
            </div>
            @if(isset($user) && $user->products )
                <div class="col-xs-6">
                    {!! link_to_route('users.products', $user->name . '\'s Products', $user->id) !!}
                </div>
            @endif

        </div>
        <div class="panel-footer text-right">
            {!! BootForm::submit()->class('btn btn-success text-right waves-effect waves-light') !!}
        </div>
    </div>
    {!! BootForm::close() !!}
@stop