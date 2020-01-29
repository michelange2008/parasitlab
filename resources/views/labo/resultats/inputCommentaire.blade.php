<div class="form-group">

  <label class="lead" for="commentaire">Commentaire</label>

  <textarea class="form-control" id="commentaire" name="commentaire" rows="8">

    @if ($commentaire !== null)

      {{ $commentaire->commentaire}}
      
    @endif

  </textarea>

</div>
