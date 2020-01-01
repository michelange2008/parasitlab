<div class="form-group">
   <label for="facture" class="control-label text-right">Destinataire de la facture ?</label>
 <div class="">
   <div class="input-group">
     <div id="radioBtn" class="btn-group">
       @foreach ($usertypes as $usertype)

         @if ($usertype->route === 'eleveur')

           <a class="btn btn-rouge border active" data-toggle="facture" data-title="{{ $usertype->code }}">
             <img class="img-25 mr-3" src="{{ asset('storage/img/icones').'/'.$usertype->icone->nom }}" alt="">
             {{ $usertype->nom }}
           </a>

         @else

           <a class="btn btn-rouge border notActive" data-toggle="facture" data-title="{{ $usertype->code }}">
             <img class="img-25 mr-3" src="{{ asset('storage/img/icones').'/'.$usertype->icone->nom }}" alt="">
             {{ $usertype->nom}}
           </a>

         @endif

       @endforeach

     </div>
     <input type="hidden" name="facture" id="facture">
   </div>
 </div>
</div>
