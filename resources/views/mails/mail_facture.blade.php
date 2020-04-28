<div style="font-family:sans-serif">

  <p>@lang('Hello!')</p>

  <p>

    @lang('mails.envoiFacture.intro')

  </p>

  <p>@lang('mails.envoiFacture.suite', ['site' => '<a href="https://parasitlab.org">Parasit\'Lab</a>'])</p>

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
