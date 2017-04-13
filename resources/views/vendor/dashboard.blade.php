@extends('layouts.account')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Vendor Dashboard</div>
        <div class="panel-body">
            Welcome {{ $user->name }}!
        </div>
    </div>
@endsection
