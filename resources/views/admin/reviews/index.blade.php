@extends('layouts.account')
@section('title')
    Reviews
@stop

@section('content')
    <div class="card">
        <div class="card-content hoverable">
            <div class="card-title">Reviews</div>
            @include('admin.reviews.partials.table')
            <div class="panel-footer text-right">
                <a href="{{ route('reviews.create') }}" class="btn btn-primary">
                    Create Review
                </a>
            </div>
        </div>
    {{ $reviews->links() }}
@stop