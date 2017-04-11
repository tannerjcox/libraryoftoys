@if (isset($errors) && $errors->count())
    <div class="row">
        <div class="col-xs-12">
            <div class="alert {{ (isset($warning) && $warning) ? 'alert-warning' : ((isset($success) && $success) ? 'alert-success' : 'alert-danger' ) }}">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
                There was an error, please check the fields below
            </div>
        </div>
    </div>
@endif
