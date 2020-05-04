@if ($demande->commentaire->commentaire !== null)

  <div class="card">

    <div class="card-body">

      <p class="card-title lead">

        @lang('demandes.commentaire') {{ \Carbon\Carbon::parse($demande->commentaire->date_commentaire)->isoFormat('LL') }}

        @if($demande->commentaire->labo_id !== null)

          (@lang('commun.par') {{ $demande->commentaire->labo->user->name }})

        @endif

      </p>

      <p class="card-text">

        {!! nl2br($demande->commentaire->commentaire) !!}

      </p>

    </div>

  </div>

@endif
