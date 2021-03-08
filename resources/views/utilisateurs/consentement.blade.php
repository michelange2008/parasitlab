<div class="card">
  <div class="card-header">
    <p>@lang('consentement.consentement')</p>
  </div>
  <div class="card-body">
    <div class="card-text">
      <small>
        <form class="" action="index.html" method="post">
          @csrf
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input consentement" id="suivre" @if ($user->suivre) checked @endif user="{{ $user->id }}">
            <label class="custom-control-label" for="suivre">@lang('consentement.suivre')</label>
          </div>
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input consentement" id="recevoir" @if ($user->recevoir) checked @endif user="{{ $user->id }}">
            <label class="custom-control-label" for="recevoir">@lang('consentement.recevoir')</label>
          </div>
        </form>
      </small>
    </div>
  </div>
  <div class="card-footer text-right">
    <a href="{{ route('infos.rgpd') }}" target="_blank">
      <small>
        <i class="fas fa-external-link-alt "></i>
        @lang('consentement.rgpd')
      </small>
    </a>
  </div>
</div>
