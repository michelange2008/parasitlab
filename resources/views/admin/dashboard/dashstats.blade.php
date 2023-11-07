<div class="mt-3">

    <p class="lead bg-bleu text-white p-2">Statistiques</p>

</div>

        @foreach ($statsBase as $stat)

        <div class="text-center border my-2 py-3 bg-bleu-tres-clair">

            <h5>{{ $stat->count }}</h5>
            <p class="mb-0">{{ __($stat->titre) }}</p>
        </div>
            

    
    
    
    @endforeach
    