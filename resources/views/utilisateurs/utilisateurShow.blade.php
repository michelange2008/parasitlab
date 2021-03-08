@extends('layouts.app')

@section('menu')

  @include('extranet.menuExtranet')

@endsection

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-end">

      <div class="col-md-3">

        @include('utilisateurs.pagePerso')

        @include('utilisateurs.boutonRetourAnalyses')

      </div>

      <div class="col-md-9">

        @titre(['titre' => __('titres.utilisateur_mesinfos'), 'icone' => 'acte.svg'])

        <div class="row">

          <div class="col-md-8">

            <form id="modif_infos" action="{{ route($route.'.update') }}" method="post">

              @csrf

              <input type="hidden" name="id" value="{{ $user->id }}">

              @include('admin.form.inputName')

              @include('admin.form.inputEmail')

              @include('admin.form.inputAdresse')

              @include('admin.form.inputTelephone')

              @if ($user->usertype->route == 'veterinaire')

                @include('admin.form.inputCro')

              @elseif ($user->usertype->route == 'eleveur')

                @include('admin.form.inputEde')

                @include('admin.form.inputVeto')

                <small>@lang('form.find_no_vet')</small>

              @endif

              <hr class="divider">

              <div id='modifie' class="btn btn-bleu my-3" name="edit"><i class="fas fa-edit"></i> @lang('boutons.modifier')</div>

              <button id='valide' class="btn btn-rouge my-3" type="submit" name="edit" style="display:none"><i class="fas fa-save"></i> @lang('boutons.save')</button>

            </form>

            <hr class="divider">

            @include('fragments.bouton', [
              'type' => 'route',
              'couleur' => 'btn-rouge',
              'fa' => 'fas fa-trash-alt',
              'id' => $user->id,
              'route' => 'routeur.deletemoi',
              'intitule' => "Supprimer mon compte",
            ])

          </div>

          <div class="col-md-4">

            <div class="p-2 mb-3 lead alert-bleu-tres-fonce">@lang('form.user_guide_title')</div>

            <p class="font-weight-bold text-secondary">@lang('form.user_guide_soustitre_1')</p>

            <p>@lang('form.user_guide_text_1', ['icon' => '<i class="color-bleu-tres-fonce fas fa-edit"></i>'])</p>

            <p class="font-weight-bold text-secondary">@lang('form.user_guide_soustitre_2')</p>
            <p>@lang('form.user_guide_text_2')</p>

            <p class="font-weight-bold text-secondary">@lang('form.user_guide_soustitre_3')</p>

            <p>@lang('form.user_guide_text_3', ['icon' => '<i class="color-rouge-tres-fonce fas fa-save"></i>'])</p>

            <p class="font-weight-bold text-secondary">@lang('form.user_guide_soustitre_4')</p>

            <p>@lang('form.user_guide_text_4') (<a href="{{ route('infos.contact') }}"><i class="fas fa-mail-bulk"></i></a>)</p>


          </div>

        </div>

      </div>


    </div>

  </div>

@endsection

@section('scripts')

  <script src="{{url('js/infosPerso_modif.js')}}"></script>

@endsection
