<div class="col-md-3 bd-sidebar my-3 d-none d-md-block">

  <h4>Rechercher un sujet</h4>

  <form class="form-inline my-3" style="flex-wrap:nowrap">
    <input class="form-control" type="search" placeholder="chercher" aria-label="Search" style="width:80%">
    <button class="form-control btn btn-bleu my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
  </form>

  <h4 class="mt-3">Derniers sujets</h4>

  <ul class="list-group list-group-flush">

    @foreach ($derniers_articles as $article)

        <li class="list-group-item">

          <button id="blog_{{ $article->id }}" class="blog btn text-left" >{{ $article->titre }}</button>

        </li>

    @endforeach

  <h4 class="mt-3">Sujets permanents</h4>

  <ul class="list-group list-group-flush">

    @foreach ($fondamentaux as $sujet)

      <li class="list-group-item">

        <a href="{{ route('parasitisme.fondamentaux', $sujet->id) }}">{{$sujet->theme}}</a>

      </li>

    @endforeach

  </ul>


</div>
