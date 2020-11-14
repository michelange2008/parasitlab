<div id="titreCreationUser" class="d-flex alert alert-bleu my-3">

  @if(session('creation.usertype') !== null)

    <img class="img-50" src="{{ url('storage/img/icones/'.session('creation.usertype')->icone->nom)}}" alt="{{session('creation.usertype')->icone->nom}}">

    <h3 class="pt-3 ml-3">{{ ucfirst(session('creation.usertype')->nom)}}: @lang('form.add_user')

    </h3>

  @else

    <h3 class="pt-3 ml-3">@lang('form.create_user')</h3>

  @endif
</div>
