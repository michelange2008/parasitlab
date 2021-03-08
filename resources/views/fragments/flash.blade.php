@if (session('message'))

    <div class="alert alert-success">

        {!! __('messages.'.session('message')) !!}

    </div>

@endif
