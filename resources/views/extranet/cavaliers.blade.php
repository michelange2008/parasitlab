@extends('layouts.app')

@extends('extranet.menuExtranet')

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-md-10 col-xl-8">

        @titre(['titre' => __('titres.cavaliers') , 'icone' => 'cv_rond.svg'])

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-10 col-xl-8">

        <ul class="list-unstyled">

          @foreach ($contenu as $detail)

            <li class="media my-3">

              @if ($detail->image_left)

                <img src="{{ url('storage/img'.'/'.$detail->image) }}" alt="@lang($detail->prefixe.'alt')" title="@lang($detail->prefixe.'title')">

              @endif

              <div class="media-body ml-3">

                <h4 class="mt-0 mb-3">@lang($detail->prefixe.'soustitre')</h4>
                <p class="mb-1">@lang($detail->prefixe.'texte.texte_1')</p>
                <p class="mb-1">@lang($detail->prefixe.'texte.texte_2')</p>
                <p class="mb-1">@lang($detail->prefixe.'texte.texte_3')</p>

              </div>

              @if (!$detail->image_left)

                <img src="{{ url('storage/img'.'/'.$detail->image) }}" alt="@lang($detail->prefixe.'alt')" title="@lang($detail->prefixe.'title')">

              @endif

            </li>

          @endforeach

        </ul>

      </div>

    </div>

    <div class="row justify-content-center">

      <div class="col-md-10 col-xl-8">

        <div class="alert-bleu p-3">
          <p class="lead mb-0">
            @lang('cavaliers.conclusion')
          </p>
        </div>
      </div>

    </div>

    <div class="row justify-content-center my-3">

      <div class="col-md-10 col-xl-8">

        <hr class="divider">

        <div class="card-deck">

          @include('extranet.commentfaireautre')

          @include('extranet.contacteznous')

        </div>

      </div>

    </div>


  </div>

@endsection
