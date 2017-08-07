@extends('layouts.account')

@section('content')
    <div class="card hoverable">
        <div class="card-content">
            <div class="card-title">
                Dashboard - Welcome {{ Auth::user()->name }}
            </div>
        </div>
    </div>
@endsection
