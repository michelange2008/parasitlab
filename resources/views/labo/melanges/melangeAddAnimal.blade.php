<form id="form_addAnimal" action="{{ route('melange.addAnimal') }}" method="post">

  @csrf

  <div class="form-row">

    <div class="col-md-10 offset-md-1">

      <h5>@lang('melange.animal_to_add')</h5>

      <hr class="divider">

      <p class="font-weight-bold" colspan="3">@lang('form.add_new_animal')</p>

      <input id="troupeau_id" type="hidden" name="troupeau_id" value="{{ $troupeau->id }}">
      
      <input id="melange_id" type="hidden" name="melange_id" value="{{ $melange->id }}">

      <table class="table">
        <tbody>
          <tr>
            <td>
              <input id="numero_nouveau" class="form-control" type="text" name="numero_nouveau" value="" placeholder="@lang('tableaux.num')" required>
            </td>
            <td>
              <input id="nom_nouveau" class="form-control" type="text" name="nom_nouveau" value="" placeholder="@lang('tableaux.nom')">
            </td>
            <td>
              <div id="add_animal" class="btn btn-success">

                <i class="fas fa-plus-square"></i>

              </div>
            </td>
          </tr>

        </tbody>

      </table>

    </div>

  </div>

</form>
