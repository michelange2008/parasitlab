@if (isset($blogs))

  <ul class="list-unstyled my-3">

    @foreach ($blogs as $blog)

      <li id="blog_{{ $blog->id }}" class="blog">

        <div class="media">

          <img id="image" width="250px" src="{{ url('storage/img/blog').'/'.$blog->image }}" alt="{{ $blog->image }}">

          <div class="media-body ml-3">

            <h5 id="titre" class="m-1">{{ ucfirst($blog->titre) }}

              <span id='date_creation' class="text-muted m-1" >( {{ \Carbon\Carbon::parse($blog->created_at)->isoFormat('D MMM Y') }} )</span></h5>

              <p id="introduction_{{ $blog->id }}" class="blog-introduction my-3">{{ $blog->introduction }}</p>

              <p id="contenu_{{ $blog->id }}" class="blog-contenu" style="display:none">{!! nl2br($blog->contenu) !!}</p>

              <div id="readmore_{{ $blog->id }}" class="btn btn-outline-secondary mb-3 readmore">Lire plus <i class="fas fa-chevron-right"></i></div>

              <p id="auteur_{{ $blog->id }}" class="blockquote-footer">{{ $blog->user->name }}</p>

              <p class="small"><i>@lang('parasitisme.tags')&nbsp;: </i>

                @foreach ($blog->motclefs as $motclef)

                  @if ($loop->last)

                    @if ($loop->iteration === 1)

                      <span id='liste_motclefs'>{{ ucfirst($motclef->motclef) }}.</span>

                    @else

                      <span id='liste_motclefs'>{{ $motclef->motclef }}.</span>

                    @endif

                  @elseif ($loop->first)

                    <span id='liste_motclefs'>{{ ucfirst($motclef->motclef) }},</span>

                  @else

                    <span id='liste_motclefs'>{{ $motclef->motclef }}, </span>

                  @endif

                @endforeach

              </p>

              <div id="readless_{{ $blog->id }}" class="btn btn-outline-secondary mb-3 readless" style="display:none"><i class="fas fa-chevron-left"></i> Replier</div>

            </div>

          </div>

          @if ($modif_blog)

            @include('fragments.blocModifSupprime', ['class' => 'blog', 'id' => $blog->id, 'item' => $blog])

          @endif

          <hr class="divider-court">

        </li>

      @endforeach

    </ul>

  @else

    <h5 class="m-3 p-3">@lang('parasitisme.aucun')</h5>

  @endif
