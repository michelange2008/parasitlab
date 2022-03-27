{{-- Fragment de formulaire destiné à afficher/modifier l'élément d'un <objectsur la
base d'une liste
Variables:
  $liste: liste des éléments de choix
  $item: élément déjà choisi à afficher ou modifier éventuellement
  $id_name: id et nom de l'élément dans le formulaire
 --}}
 <div class="form-group">

   <select id="{{ $id_name }}" class="form-control @error('{{ $id_name }}') is-invalid @enderror"

     name="{{ $id_name }}" required>

     <option selected value={{ $item->id }} >{{ $item->nom }}</option>

     @foreach ($liste as $element)

         <option value="{{ $element->id }}">{{ $element->nom }}</option>

     @endforeach

   </select>

 </div>
