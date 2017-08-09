@extends('layouts.account')
@section('title')
    Static Pages
@stop

@section('content')
    <div class="card hoverable">
        <div class="card-content">
            <h3 class="card-title">Static Pages</h3>
            <table class="bordered striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Url</th>
                    <th>Link</th>
                    <th>Created</th>
                </tr>
                </thead>
                <tbody>
                @foreach($pages as $page)
                    <tr>
                        <td>
                            {{ link_to_route('pages.edit', $page->id, $page->id) }}
                        </td>
                        <td>
                            {{ link_to_route('pages.edit', $page->title, $page->id) }}
                        </td>
                        <td>
                            {{ $page->url }}
                        </td>
                        <td>
                            {{ link_to_route('page', 'View', $page->url) }}
                        </td>
                        <td>
                            {{ prettyDate($page->created_at) }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-action right-align">
            <a href="{{ route('pages.create') }}" class="btn btn-success">Create Page</a>
        </div>
    </div>
@stop