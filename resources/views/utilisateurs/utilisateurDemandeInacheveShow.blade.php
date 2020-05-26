<div class="col-md-9">


  <p class="lead">@lang('Hello!')<p>

    <p class="lead">@lang('demandes.analyse_non_finie_1', ['date_reception' => \Carbon\Carbon::parse($demande->date_reception)->isoFormat('LL')])
    </p>

    <p class="lead">@lang('demandes.analyse_non_finie_2')</p>

    <p class="lead">@lang('commun.signature')</p>

    <img class="img-50" src="{{ url('storage/logo.svg') }}" alt="Parasit'">

  </div>

  <div class="col-md-9 my-5 mx-1 align-right">

    <img class="img-40" src="{!! url('storage/img/icones/question2.svg') !!}" alt="question">

    @lang('commun.question_probleme')

    @include('fragments.boutonContact', ['intitule' => __('commun.contact_us_short_2')])


  </div>
