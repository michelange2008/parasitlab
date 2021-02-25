{{-- Informations dans le mail sur le respect des données personnelles.
Est appelé par envoiInfosConnexion.blade.php --}}
<h3>
  @lang('rgpd.privacy')
</h3>
<p>
  @lang('rgpd.autorisation', ['mail' => config('app.mail')])
</p>

<p>
  @lang('rgpd.compte')
</p>
<p>
  @lang('rgpd.plus_infos')
  <a href="{!! route('infos.rgpd') !!}">@lang('commun.ici')</a>
</p>
<p>
  @lang('rgpd.contact', ['mail' => config('app.mail')])
</p>
