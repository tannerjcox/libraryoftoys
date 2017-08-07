@extends('layouts.account')

@section('scripts')
    <script>
      $(function () {
        $('[data-update-password]').click(function () {
          $('.update-password').toggleClass('hide')
          $('#password, #password-confirm').prop('disabled', !$('#password, #password-confirm').prop('disabled'))
          $(this).toggleClass('blue-grey red')
        })
      })
    </script>
@stop
@section('content')
    @if(isset($user))
        @if(isset($myAccount))
            {!! BootForm::open()->put()->action(route('account.update')) !!}
        @else
            {!! BootForm::open()->put()->action(route('users.update', $user->id)) !!}
        @endif
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
            @if(auth()->user()->isAdmin())
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
            @endif
            @if(isset($myAccount))
                <div class="update-password {{ !old() || old('password') ? 'hide' : '' }}">
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} col m6 input-field s12">
                        <label for="password" class="validate">Change Password</label>
                        <input id="password" type="password" class="form-control" name="password" disabled>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group col m6 input-field s12">
                        <label for="password-confirm" class="control-label">Confirm Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" disabled>
                    </div>
                </div>
                <button data-update-password class="btn waves-effect waves-light blue-grey" type="button">Update Password</button>
            @endif
        </div>
        <div class="card-action">
            @if(isset($user) && $user->products )
                <div class="left">
                    {!! link_to_route('users.products', $user->name . '\'s Products', $user->id,['class' => 'btn waves-effect waves-light cyan']) !!}
                </div>
            @endif
            {!! BootForm::submit()->class('btn right waves-effect waves-light') !!}
        </div>
    </div>
    {!! BootForm::close() !!}
@stop