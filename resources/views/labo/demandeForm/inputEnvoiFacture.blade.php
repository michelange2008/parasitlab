{{-- ISSU DE labo.demandeForm.demandeEnvois.blade.php --}}
<div class="form-group">

   <label for="facture" class="control-label text-right">@lang('form.destinataire_facture')&nbsp;?</label>

 <div class="">

   <div class="input-group">

     <div id="choixDestFact" class="btn-group" data-eleveur="{{ $demande->user_id ?? '' }}" data-factureto="{{ $demande->userfact_id ?? '' }}" data-facturetotype={{ $type_dest_fact }}>

       @foreach ($usertypes as $usertype)

           <a id="type_{{ $usertype->route }}" class="destfact btn btn-rouge border notActive" data-toggle="facture" data-title="">

             <img class="img-25 mr-3" src="{{ url('storage/img/icones/'.$usertype->icone->nom) }}" alt="usertype">

             {{ $usertype->nom }}

           </a>

       @endforeach

     </div>

     <input type="hidden" name="destinataireFacture" id="facture">

   </div>

 </div>

</div>
