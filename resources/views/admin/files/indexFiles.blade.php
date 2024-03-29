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

                @titre([
                    'icone' => 'files.svg',
                    'titre' => 'Liste des fichiers',
                ])

            </div>

        </div>

        <div class="row my-3 justify-content-center">

            <div class="col-md-10 col-lg-9 col-xl-8">

              @boutonUser([
                'route' => 'files.create',
                'intitule' => 'add_file',
                'fa' => 'fas fa-plus',
              ])

                @foreach ($db_files as $file)
                    <div class="media my-3 p-2 border @if ($file->orphelin) bg-warning @else bg-light @endif">

                        <img class="m-2 d-none d-md-block img-50" src="{{ url('storage/img/extensions') . '/' . $file->extension . '.svg' }}"
                            alt="Image">

                        <div class="media-body">
                            <h5 class="mt-0">
                                {{ $file->description }}
                                @if ($file->requis)
                                    <span title="Indispensable - Ne peut être supprimé" class="badge badge-success">!</span>
                                @endif
                            </h5>
                            <p>
                                <a target="blank" href="{{ url('storage/pdf') . '/' . $file->nom }}"
                                    class="font-italic" title="Ouvrir le fichier">
                                    {{ $file->nom }} <i class="text-danger fas fa-link"></i>
                                </a>
                            </p>
                            <div>
                                @boutonUser([
                                    'route' => 'files.edit',
                                    'id' => $file,
                                    'couleur' => 'btn-rouge-clair',
                                    'intitule' => 'change_file',
                                    'fa' => 'fas fa-file',
                                ])
                                @boutonUser([
                                    'route' => 'files.editFileDescription',
                                    'id' => $file,
                                    'intitule' => 'edit_file_description',
                                    'fa' => 'fas fa-pen',
                                ])
                                @if (!$file->requis)
                                    @boutonUser([
                                        'route' => 'files.delete',
                                        'id' => $file,
                                        'intitule' => 'del',
                                        'couleur' => 'btn-danger',
                                        'fa' => 'fas fa-trash',
                                    ])
                                @endif
                            </div>
                        </div>

                    </div>
                @endforeach

            </div>

        </div>

    </div>
@endsection
