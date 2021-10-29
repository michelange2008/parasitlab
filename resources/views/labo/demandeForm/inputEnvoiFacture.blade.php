{{-- ISSU DE labo.demandeForm.demandeEnvois.blade.php --}}
<div class="form-group">

   <label for="facture" class="control-label text-right">@lang('form.destinataire_facture')&nbsp;?</label>

 <div class="">
   <div class="input-group">

     <div>
       @foreach($usertypes as $usertype)
         <div id="destfact_{{ $usertype->id }}" class="custom-control custom-radio custom-control-inline">
           <input type="radio" id="type_{{ $usertype->id }}" name="destinataireFacture" class="custom-control-input"
           @if($usertype->code == $type_dest_fact)
             checked = "checked"
           @endif
           value = {{ $usertype->id }}
           >
           <label class="custom-control-label" for="type_{{$usertype->id}}">{{ $usertype->nom }}</label>
         </div>
       @endforeach
       @isset($demande->user->id)
         <input type="hidden" id="user_id" name="user_id" value="{{ $demande->user->id }}">
       @endisset
     </div>

   </div>

 </div>

</div>
