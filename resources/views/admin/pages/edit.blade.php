@extends('layouts.account')

@section('scripts')
    <script>
      $(function () {
        $('[name=title]').keyup(function () {
          var title = $(this).val();
           $('[name=url]').val(title.replace(/ /g, '-'));
        });
      });
    </script>
@stop
@section('content')
    @if(isset($page))
        {!! BootForm::open()->post()->action(route('pages.update', $page->id)) !!}
        {!! BootForm::bind($page) !!}
    @else
        {!! BootForm::open()->post()->action(route('pages.store')) !!}
    @endif
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>
                @if(isset($page))
                    Edit {{ $page->title }} <span class="pull-right">{!! link_to_route('page', 'View Page', $page->url, ['target' => '_blank']) !!}</span>
                @else
                    Create New Page
                @endif
            </h4>
        </div>
        <div class="panel-body">
            {!! BootForm::text('Title', 'title') !!}
            {!! BootForm::text('Url', 'url')->placeholder('If left empty, url will be generated from title') !!}
            {!! BootForm::textarea('Page Content', 'page_content') !!}
        </div>
        <div class="panel-footer text-right">
            {!! BootForm::submit()->class('btn btn-success text-right') !!}
        </div>
    </div>
    {!! BootForm::close() !!}
@stop