@if (session()->has('success') || session()->has('errors'))
    <div data-validation-alert
         class="card-panel p-sm {{ session()->has('warning') ? 'orange accent-1' : ((session()->has('success') && session()->get('success')) ? 'teal lighten-2 black-text' : 'red accent-4 white-text' ) }}">
        @if(session()->has('errors'))
            @foreach(session()->get('errors')->all() as $message)
                {{ $message }}
            @endforeach
        @elseif(session()->has('message'))
            {{ session('message') }}
        @endif
        <span class="right"><a data-dismiss-validation-alert href="#"><i class="fa fa-close black-text"></i></a></span>
    </div>
@endif
