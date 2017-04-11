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
        {!! BootForm::open()->put()->action(route('pages.update', $page->id)) !!}
        {!! BootForm::bind($page) !!}
        {!! BootForm::hidden('id') !!}
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
            <div class="row">
                <div class="col-md-6">
                    {!! BootForm::text('Title', 'title') !!}
                </div>
                <div class="col-md-6">
                    {!! BootForm::text('Url', 'url') !!}
                </div>
            </div>
            {!! BootForm::textarea('Page Content', 'page_content')->defaultValue(isset($page) ? $page->page_content : '') !!}
        </div>
        <div class="panel-footer text-right">
            {!! BootForm::submit()->class('btn btn-success text-right') !!}
        </div>
    </div>
    {!! BootForm::close() !!}
@stop