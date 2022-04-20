<div class="col bg-bleu py-3">

  <form id="news_choice" class="" action="{{ route('news.choice') }}" method="post">

    @csrf

    <div class="form-group row my-1">

      <label class="col-sm-4 col-form-label col-form-label-lg text-white" for="news_choice">{{ ucfirst(__('form.news_choice')) }}</label>

      <div class="col-sm-6">

        <select id="news_select" class="form-control form-control-lg" name="news_choice">

          <option value="0">{{ __('form.no_news') }}</option>

          @foreach ($news as $new)

            <option value="{{ $new->id }}"
              @if ($new->display == 1)
                selected="selected"
              @endif >
              {{ $new->title }}
            </option>

          @endforeach

        </select>

      </div>

    </div>

  </form>

</div>

@section('scripts')

    <script type="text/javascript">

      $("#news_select").on('change', function() {

        $("#news_choice").submit()

      })
    </script>

@endsection
