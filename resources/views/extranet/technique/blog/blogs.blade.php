@if (isset($blog))

  <ul class="list-unstyled">

    <li class="media my-3">

      <img id="image" width="250px" src="{{ url('storage/img/blog').'/'.$blog->image }}" alt="{{ $blog->image }}">

      <div class="media-body ml-3">

        <div class="d-flex flex-row">

          <h5 id="titre" class="m-1">{{ ucfirst($blog->titre) }} </h5>

          <h5 id='date_creation' class="text-muted m-1" >( {{ $blog->date }} )</h5>

        </div>


        <span id="contenu">{!! nl2br($blog->contenu) !!}</span>

        <p id="auteur" class="blockquote-footer">{{ $blog->user->name }}</p>

      </div>

    </li>

    <div class="row">

      <div class="col-md-8">

        <span class="small"><i>@lang('parasitisme.tags')&nbsp;: </i></span>

        <span id='liste_motclefs' class="small">{{ $blog->liste_motclefs }}</span>

      </div>

      <div class="col-md-4">

        @if ($modif_blog)

          @include('fragments.blocModifSupprime', ['class' => 'blog', 'id' => $blog->id, 'item' => $blog])

        @endif

      </div>

    </div>

    <hr class="divider-court">

  </ul>

@else

  <h5 class="m-3 p-3">@lang('parasitisme.aucun')</h5>

@endif
