@extends('layouts.account')

@section('content')
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
            @if(isset($user))
                {!! BootForm::open()->post('users.update') !!}
            @else
                {!! BootForm::open()->post('users.store') !!}
            @endif

            {!! BootForm::text('Name', 'name') !!}


        </div>
    </div>
@stop