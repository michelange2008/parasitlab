<h4>Nom du client (éleveur ou autre)</h4>

<div class="form-group">

  <select class="form-control" name="user_id" required>

    <option selected></option>

    @foreach ($users as $user)

      <option value="{{ $user->id }}">{{ $user->name }}</option>

    @endforeach

  </select>

</div>
