<h4>
  @lang('factures.reglee', [
    'date' => \Carbon\Carbon::parse($elementDeFacture->facture->reglement->date_reglement)->isoFormat('LL'),
    'mode' => $elementDeFacture->facture->reglement->modereglement->nom,
  ])
</h4>

<form id="form_{{ $elementDeFacture->facture->reglement_id }}" action="{{ route('reglement.destroy', $elementDeFacture->facture->reglement_id) }}" method="post">

  @csrf()

  @method('DELETE')

  <button
    id="form_{{ $elementDeFacture->facture->reglement_id }}"
    class="btn btn-rouge suppr" type="submit" name="suppr">
    <i class="fas fa-trash-alt"></i> @lang('factures.reglementDel')
  </button>

</form>
