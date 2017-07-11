@extends('layouts.account')

@section('content')
    @if(isset($user))
        {!! BootForm::open()->put()->action(route('users.update', $user->id)) !!}
        {!! BootForm::bind($user) !!}
        {!! BootForm::hidden('id') !!}
    @else
        {!! BootForm::open()->post()->action(route('users.store')) !!}
    @endif
    <div class="card large">
        <div class="card-content">
            <div class="card-title center-align">
                <h4>
                    @if(isset($user))
                        Edit {{ $user->name }}
                    @else
                        Create New User
                    @endif
                </h4>
            </div>
            <div class="col m6 input-field">
                {!! BootForm::text('Name', 'name') !!}
            </div>
            <div class="col m6 input-field">
                {!! BootForm::text('Email', 'email') !!}
            </div>
            @if(!isset($user))
                <div class="col m6 input-field">
                    {!! BootForm::password('Password', 'password') !!}
                </div>
                <div class="col m6 input-field">
                    {!! BootForm::password('Confirm Password', 'password_confirmation') !!}
                </div>
            @endif
            <div class="col s6">
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
                <div class="col s6">
                    {!! link_to_route('users.products', $user->name . '\'s Products', $user->id) !!}
                </div>
            @endif

        </div>
        <div class="card-action text-right">
            {!! BootForm::submit()->class('btn btn-success text-right waves-effect waves-light') !!}
        </div>
    </div>
    {!! BootForm::close() !!}
@stop