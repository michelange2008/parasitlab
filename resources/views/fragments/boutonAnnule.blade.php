<a id="bouton_annule" class="my-3 ml-1" href="{!! $route ?? url()->previous() !!}">


  <button type="button" class="btn btn-secondary" name="reset">

    <i class="fas fa-undo"></i> 

    @lang('boutons.annule')

  </button>

</a>
