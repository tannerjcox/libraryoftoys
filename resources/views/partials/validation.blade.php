@if (session()->has('success') || session()->has('errors'))
    <div class="row">
        <div class="col s12">
            <div data-validation-alert class="card-panel p-sm {{ session()->has('warning') ? 'amber accent-1' : ((session()->has('success') && session()->get('success')) ? 'teal lighten-3' : 'red lighten-3' ) }}">
                {{--<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>--}}
                {{ session()->get('message') }}
                <span class="right"><a data-dismiss-validation-alert href="#"><i class="fa fa-close"></i></a></span>
            </div>
        </div>
    </div>
@endif
