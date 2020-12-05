<form id="form_commentaire" class="" action="{{ route('commentaire.store') }}" method="post">

  @csrf

  <input id="demande_id" type="hidden" name="demande_id" value="{{ $demande->id }}">

  <div class="form-group">

    <label class="lead" for="commentaire">@lang('form.comment')</label>

    <textarea class="form-control" id="commentaire" name="commentaire" rows="8">@if ($demande->commentaire !== null){{ $demande->commentaire->commentaire}}@endif</textarea>

  </div>

  @if (session('comment'))

    <div class="alert alert-success">

      {!! __('messages.'.session('comment')) !!}

    </div>

  @endif


  @include('fragments.boutonEnregistrer',['nomBouton' => 'boutons.save_commentaire', 'css' => 'btn-sm'])

</form>
