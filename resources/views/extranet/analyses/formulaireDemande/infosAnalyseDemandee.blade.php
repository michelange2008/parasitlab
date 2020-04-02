{{-- issu de formulaireDemande.blade --}}
<div class="card">

  <div class="card-header alert-bleu-tres-fonce">

    <h5>@lang('form.infoDemAna')</h5>

  </div>

  <div class="card-body ">

    <div class="row">

      <div class="col-md-6">

          <label class="col-sm-12 col-form-label" for="espece_id">{!! ucfirst(__('commun.espece'))!!}</label>

          <select class="form-control" name="espece_id">

            @foreach ($especes as $espece)

              <option {!! ($espece->id == $espece_id) ? 'selected' : ''!!} value="{{ $espece->id }}">{{ $espece->nom }}</option>

            @endforeach

          </select>

      </div>

      <div class="col-md-6">

        <label for="date_prelevement" class="col-sm-6 col-form-label">@lang('form.date_prelevement')</label>

        <input class="form-control" type="date" name="date_prelevement" value="{{ Carbon\Carbon::now()->toDateString() }}">

      </div>


    </div>

    <div class="my-3 form-group row">

      <div class="col-md-6">

        <label class="col-sm-12 col-form-label" for="anatype_id">@lang('form.ana_demandee')</label>

        <select id="select_anatype" class="form-control" name="anatype_id">

          @foreach ($anatypes as $anatype)

            <option {!! ($anatype->id == $anatype_id) ? 'selected' : ''!!} value="{{ $anatype->id }}">{{ ucfirst($anatype->nom) }}</option>

          @endforeach

        </select>

      </div>

      <div class="col-md-6">

        <label class="col-sm-12 col-form-label" for="anaacte_id">@lang('form.type_acte')</label>
{{-- Emplacement libre pour que le choisir.js puisse mettre la liste d'anaacte --}}
        <select id="select_anaacte" class="form-control" name="anaacte_id">

        </select>

      </div>

    </div>

    <div class="form-group row">

      <div class="col">

        <label for="informations" class="col-sm-8 col-form-label">@lang('form.infos_diverses')</label>

        <textarea class="form-control" id="informations" name="informations" rows="3" placeholder="@lang('form.infos_diverses_placeholder')"></textarea>

      </div>

    </div>

    <div class="form-group row">

      <label class="col-sm-8 col-form-label" for="nb_prelevement">@lang('form.nb_prelevement')</label>

      <div class="col-sm-2">

        <input id="nbPrelevement" class="form-control" type="number" min="1" max="10" step="1" name="nb_prelevement" value="{{ old('NbPrlvt') ?? 1 }}">

      </div>

    </div>


      @for ($i=1; $i < 11; $i++)
        <div id="prelevement_{{ $i }}" class="prelevement" style="display:none">

          <div class="row mb-3">

          <div class="col-md-12 border py-2">

            <div class="form-group row">

              <label for="p_{{ $i }}" class="col col-form-label bg-bleu-tres-fonce text-light ml-1">@lang('form.prelev_nb'){{ $i }} :</label>

              <div class="col-sm-8">

                <input class="form-control" type="text" name="p_{{ $i }}" value="{{ old('p_'.$i) }}" placeholder="@lang('form.nom_prelev')">

              </div>

              @include('labo.demandeForm.infosPrelevement')
            </div>

          </div>


        </div>

      </div>

    @endfor

  </div>

</div>
