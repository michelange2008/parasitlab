@if (session('message'))

    <div class="alert {{ $couleur ?? 'alert-success'}} ">

        {!! __('messages.'.session('message')) !!}

    </div>

@endif
