<h4>@lang('factures.reglee', ['date' => $elementDeFacture->facture->reglement->date_reglement, 'mode' => $elementDeFacture->facture->reglement->modereglement->nom])</h4>

<form id="form_{{ $elementDeFacture->facture->reglement_id }}" action="{{ route('reglement.destroy', $elementDeFacture->facture->reglement_id) }}" method="post">

  @csrf()

  @method('DELETE')

  <button id="form_{{ $elementDeFacture->facture->reglement_id }}" class="btn btn-rouge suppr" type="submit" name="suppr"><i class="fas fa-trash-alt"></i> @lang('factures.reglementDel')</button>

</form>
