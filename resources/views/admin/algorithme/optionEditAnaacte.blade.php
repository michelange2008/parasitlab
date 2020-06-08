@extends('layouts.app')

@section('menu')

  @include('labo.laboMenu')

@endsection

@section('content')

  <div class="container-fluid">

    <form action="{{ route('options.update', $option->id) }}" method="post">

      @csrf

      @method('put')
      {{-- Champs caché pour savoir qu'elle partie de l'option est modifiée --}}
      <input type="hidden" name="type" value="anaacte">

      <div class="row my-3 justify-content-center">

        <div class="col-ld-11 col-lg-1à col-xl-9">

          @titre(['titre' => $option->nom, 'icone' => 'why.svg'])

        </div>

      </div>

      <div class="row justify-content-center">

        <div class="col-md-11 col-lg-10 col-xl-9">

          <table class="table table-hover">

            <tbody>
              {{-- on passe en revue les anatypes --}}
              @foreach ($anatypes as $anatype)
                {{-- puis les anaactes de chaque anatype --}}
                @foreach ($anatype->anaactes as $anaacte)
                  {{-- si cet anaactes est présent dans l'option --}}
                  @if ($option->anaactes->contains($anaacte))
                    {{-- on affiche une ligne du tableau avec du gras --}}
                    <tr class="font-weight-bold">
                      {{-- si c'est le premier anatype --}}
                      @if ($loop->first)
                        {{-- on affiche son nom --}}
                        <td>{{ ucfirst($anatype->nom) }}</td>

                        <td> {{ ucfirst($anaacte->nom) }}</td>
                        {{-- sinon on ne l'affiche pas - seul le nom de l'anaacte est affiché --}}
                      @else
                        <td></td>

                        <td> {{ ucfirst($anaacte->nom) }}</td>

                      @endif

                      <td>
                        {{-- on coche la checkbox --}}
                        <input type="checkbox" name="anaacte_{{ $anaacte->id }}" checked>

                      </td>

                    </tr>

                    <tr>
                      {{-- si l'anaacte n'est pas associé à l'option --}}
                    @else
                      {{-- on fait la même chose mais sans gras ni case cochée --}}
                      @if ($loop->first)

                        <td>{{ ucfirst($anatype->nom) }}</td>

                        <td> {{ ucfirst($anaacte->nom) }}</td>

                      @else
                        <td></td>

                        <td> {{ ucfirst($anaacte->nom) }}</td>

                      @endif

                      <td>

                        <input type="checkbox" name="anaacte_{{ $anaacte->id }}">

                      </td>

                    </tr>
                  @endif

                @endforeach

              @endforeach

            </tbody>

          </table>

        </div>

      </div>

      <div class="row justify-content-center">

        <div class="col-md-11 col-lg-10 col-xl-9">

          @enregistreAnnule(['route' => route('options.index')])

        </div>

      </div>

    </form>

  </div>

@endsection
