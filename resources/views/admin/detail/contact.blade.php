{{-- BLOC VALABLE AUSSI BIEN POUR UNE VETERINAIRE QUE POUR UN ELEVEUR D'OU L'EMPLOI DE $personne --}}
<li class="list-group-item d-inline-flex text-truncate data-toggle="tooltip" title="{{ $personne->user->email }}">

  @include('admin.detail.email')

</li>

<li class="list-group-item d-inline-flex">

  @include('admin.detail.telephone')

</li>

<li class="list-group-item">

  @include('admin.detail.adresse')

</li>
