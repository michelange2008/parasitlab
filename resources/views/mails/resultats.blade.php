<div style="font-family:sans-serif">

  <p>@lang('Hello!'),</p>

  <p>

    @lang('mails.envoiRésultats.intro', ['date_reception' => $demande->date_reception])

  </p>

  <h3 style="margin-left:40px">

    {{ ucfirst($demande->anaacte->anatype->nom) }} - {{ $demande->anaacte->nom }}.

  </h3>

  <p>@lang('mails.envoiRésultats.suite', ['site' => '<a href="https://parasitlab.org">Parasit\'Lab</a>'])</p>

    <p>Pour toute question n'hésitez pas à nous contacter.</p>

    <p>Toute l'équipe du laboratoire</p>

    <br><br>

    <img width="250px" src="{!! url('storage/logo.svg') !!}" alt="Parasit'Lab">
    <div style="color:gray">

      <p>Pôle Bio – Ecosite du Val de Drôme</p>
      <p>150 Avenue du Judée - F-26400 Eurre</p>
      <p>Téléphone +33 (0)4 75 25 41 55</p>

    </div>

  </div>
