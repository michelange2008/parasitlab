{{-- ISSU DE labo.demandeForm.demandeEnvois.blade.php --}}
<div class="form-group">
   <label for="facture" class="control-label text-right">@lang('form.destinataire_facture')&nbsp;?</label>
 <div class="">
   <div class="input-group">
     <div id="radioBtn" class="btn-group">
       @foreach ($usertypes as $usertype)

         @if ($usertype->route === 'eleveur')

           <a id="type_{{ $usertype->route }}" class="btn btn-rouge border active" data-toggle="facture" data-title="{{ $usertype->id }}">
             <img class="img-25 mr-3" src="{{ url('storage/img/icones/'.$usertype->icone->nom) }}" alt="usertype">
             {{ $usertype->nom }}
           </a>

         @else

           <a id="type_{{ $usertype->route }}" class="btn btn-rouge border notActive" data-toggle="facture" data-title="{{ $usertype->id }}">
             <img class="img-25 mr-3" src="{{ url('storage/img/icones/'.$usertype->icone->nom) }}" alt="usertype">
             {{ $usertype->nom}}
           </a>

         @endif

       @endforeach

     </div>
     <input type="hidden" name="destinataireFacture" id="facture">
   </div>
 </div>
</div>
