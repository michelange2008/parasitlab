<div style="font-family:sans-serif">

  <p>@lang('Hello!')</p>

  <p>

    @lang('mails.envoiRésultats.intro', ['date_reception' => \Carbon\Carbon::parse($demande->date_reception)->isoFormat('LL')])

  </p>

  <h3 style="margin-left:40px">

    {{ ucfirst(__($demande->anaacte->anatype->nom)) }} - {{ $demande->anaacte->nom }}.

  </h3>
{{-- impossible d'utiliser config(laboInfos) à cause de tous les " et ' --}}
  <p>@lang('mails.envoiRésultats.suite', ['site' => '<a href="https://parasitlab.org">Parasit\'Lab</a>'])</p>

    <p>@lang('mails.envoiRésultats.question')</p>

    <p>@lang('commun.fibl_team')</p>

    <br><br>

    <img width="250px" src="{!! url('storage/logo.svg') !!}" alt="Parasit'Lab">
    <div style="color:gray">

      <p>{{ config('laboInfos.address_1') }}</p>
      <p>{{ config('laboInfos.address_2') }}</p>
      <p>@lang('commun.Phone')&nbsp;:&nbsp;{{ config('laboInfos.phone') }}</p>

    </div>

  </div>
