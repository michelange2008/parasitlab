<div class="form-group">

  <label class="lead" for="commentaire">@lang('form.comment')</label>

<textarea class="form-control" id="commentaire" name="commentaire" rows="8">
@if ($commentaire !== null)
{{ $commentaire->commentaire}}
@endif
</textarea>

</div>
