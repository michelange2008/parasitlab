<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    @foreach ($liste as $key => $value)
      <li class="breadcrumb-item"><a href="{{ route($value) }}">{{ $key }}</a></li>
    @endforeach
    <li class="breadcrumb-item active" aria-current="page">{{ $user->name }}</li>
  </ol>
</nav>
