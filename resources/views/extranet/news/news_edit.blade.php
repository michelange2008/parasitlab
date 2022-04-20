@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">

    <div class="row my-3 justify-content-center">

      <div class="col-md-10">

        @include('fragments.flash')

      </div>

    </div>

    <div class="row my-3 justify-content-center">

      <div class="col-md-10">

        @titre(['icone' => 'interpreter.svg', 'titre' => __('titres.news_create')])

      </div>

    </div>

    <div class="row my-3 justify-content-center">

      <div class="col-md-10">

        <form class="" action="{{ route('news.update', $new->id) }}" method="post" enctype="multipart/form-data">

          @csrf
          @method('patch')

          <div class="form-row justify-content-center">

            <div class="col-md-10">

              @inputText([
                'nom' => 'title',
                'label' => 'news_title',
                'type' => 'text',
                'value' => $new->title,
              ])

            </div>

          </div>

          <div class="form-row justify-content-center">

            <div class="col-md-10">

              @inputTextarea([
                'nom' => 'content',
                'label' => 'news_content',
                'value' => $new->content,
                'placeholder' => 'news_content_placeholder',
                "rows" => 5,
              ])

            </div>

          </div>

          <div class="form-row justify-content-center">

            <div class="col-md-10">

              @inputTextarea([
                'nom' => 'conclusion',
                'label' => 'news_conclusion',
                'value' => $new->conclusion,
                'placeholder' => 'news_conclusion_placeholder',
                "rows" => 5,
              ])

            </div>

          </div>

          <div class="form-row justify-content-center">

            <div class="col-md-10">

              @inputImage([
                'name' => 'news_img',
                'chemin' => 'storage/img/news/',
                'image' => $new->img,
              ])

            </div>

          </div>

          <div class="form-row justify-content-center">

            <div class="col-md-10">

              @enregistreAnnule()

            </div>

          </div>

        </form>

      </div>

    </div>

  </div>

@endsection
