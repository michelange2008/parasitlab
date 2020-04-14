<h4>@lang('factures.reglee', ['date' => $facture_completee->reglement->date_reglement, 'mode' => $facture_completee->reglement->modereglement->nom])</h4>

<form id="form_{{ $facture_completee->reglement_id }}" action="{{ route('reglement.destroy', $facture_completee->reglement_id) }}" method="post">

  @csrf()

  @method('DELETE')

  <button id="form_{{ $facture_completee->reglement_id }}" class="btn btn-rouge suppr" type="submit" name="suppr"><i class="fas fa-trash-alt"></i> @lang('factures.reglementDel')</button>

</form>
