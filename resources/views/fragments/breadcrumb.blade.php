<!-- AJOUTE UN BREADCRUM DE CIRCULATION SOUS FORME DE LIGNE AVEC L'ARBORESCENCE
EN LIGNE - FOURNIR UN TABLEAU DE VARIABLES SOUS FORME DE SOUS-TABLEAUX OU LA key
EST LA VALEUR A AFFICHER ET LA value EST LA ROUTE CORRESPONDANTE -->

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    @foreach ($liste as $key => $value)
      <li class="breadcrumb-item"><a href="{{ route($value) }}">{{ $key }}</a></li>
    @endforeach
    <li class="breadcrumb-item active" aria-current="page">{{ $user->name }}</li>
  </ol>
</nav>
