
<div class="progress" style="height:40px;">

  @foreach ($analysesProgress as $element)

    @if ($route == $element->route)

      <div class="progress-bar progress-active " role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">

        @lang($element->intitule)

      </div>

    @else

      <div class="progress-bar progress-disabled d-flex flex-row align-items-center justify-content-start" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">

        <a href="{{route($element->route)}}" style="padding-left:10%">

          @lang($element->intitule)

        </a>

      </div>

    @endif

  @endforeach

</div>
