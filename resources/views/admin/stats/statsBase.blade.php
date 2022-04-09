<div class="card-deck">

  @foreach ($statsBase as $stat)

    <div class="card text-light">

      <div class="card-body bg-secondary">

        <h5 class="card-title">{{ __($stat->titre) }}</h5>

        <h5 class="card-text text-center">{{ $stat->count }}</h5>

      </div>

    </div>

  @endforeach

</div>
