@if (session()->has('success') || session()->has('errors'))
    <div class="row">
        <div class="col-xs-12">
            <div class="alert {{ session()->has('warning') ? 'alert-warning' : ((session()->has('success') && session()->get('success')) ? 'alert-success' : 'alert-danger' ) }}">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
                {{ session()->get('message') }}
            </div>
        </div>
    </div>
@endif
