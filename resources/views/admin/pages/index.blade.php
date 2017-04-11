@extends('layouts.account')
@section('title')
    Pages
@stop

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Static Pages</h3>
        </div>
        <div class="panel-body">
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th></th>
                    <th>Title</th>
                    <th>Url</th>
                    <th>Created</th>
                </tr>
                </thead>
                <tbody>
                @foreach($pages as $page)
                    <tr>
                        <td>
                            {{ $page->id }}
                        </td>
                        <td>
                            {{ link_to_route('pages.edit', $page->title, $page->id) }}
                        </td>
                        <td>
                            {{ $page->url }}
                        </td>
                        <td>
                            {{ $page->created_at }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="panel-footer text-right">
            <a href="{{ route('pages.create') }}" class="btn btn-success">Create Page</a>
        </div>
    </div>
@stop