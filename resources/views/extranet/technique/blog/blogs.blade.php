<ul class="list-unstyled">

      <li class="media my-3">

        <img id="image" width="250px" src="{{ url('storage/img/blog').'/'.$article->image }}" alt="">

        <div class="media-body ml-3">

          <div class="d-flex flex-row">

            <h5 id="titre" class="m-1">{{ ucfirst($article->titre) }} </h5>

            <h5 id='date_creation' class="text-muted m-1" >( {{ $article->date }} )</h5>

          </div>


          <span id="contenu">{!! $article->contenu !!}</span>

          <p id="auteur" class="blockquote-footer">{{ $article->user->name }}</p>

        </div>

      </li>

      <div class="row">

        <div class="col-md-8">

          <span class="small"><i>Mots-clefs: </i></span>

          <span id='liste_motclefs' class="small">{{ $article->liste_motclefs }}</span>

        </div>

        <div class="col-md-4">

          @include('fragments.blocModifSupprime', ['class' => 'blog', 'id' => $article->id])

        </div>

      </div>

      <hr class="divider-court">

  </ul>
