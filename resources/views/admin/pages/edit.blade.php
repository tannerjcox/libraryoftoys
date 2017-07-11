@extends('layouts.account')

@section('scripts')
    <script>
      $(function () {
        $('[name=title]').keyup(function () {
          let title = $(this).val()
          $('[name=url]').val(title.toLowerCase().replace(/\W/g, '-'))
        })
      })
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
    <div class="card">
        <div class="card-content">
            <div class="card-title">
                <h4>
                    @if(isset($page))
                        Edit "{{ $page->title }}" <span class="right">{!! link_to_route('page', 'View Page', $page->url, ['target' => '_blank']) !!}</span>
                    @else
                        Create New Page
                    @endif
                </h4>
            </div>
            <div class="row">
                <div class="col m6 input-field">
                    {!! BootForm::text('Title', 'title') !!}
                </div>
                <div class="col m6 input-field">
                    {!! BootForm::text('Url', 'url') !!}
                </div>
            </div>

            <div class="row">
                <div class="col m12 input-field">
                    {!! BootForm::textarea('Page Content', 'page_content')->class('materialize-textarea')->defaultValue(isset($page) ? $page->page_content : '') !!}
                </div>
            </div>
        </div>
        <div class="card-action right-align">
            {!! BootForm::submit()->class('btn btn-success') !!}
        </div>
    </div>
    {!! BootForm::close() !!}
@stop