<div class="mt-3">

    <p class="p-2 text-white lead bg-bleu">Statistiques</p>

</div>

@foreach ($statsBase as $stat)
    <div class="py-3 my-2 text-center border bg-bleu-tres-clair">

        <h5>{{ $stat->count }}</h5>
        <p class="mb-0">{{ __($stat->titre) }}</p>
    </div>
@endforeach

<figure>
    <div id="container"></div>
</figure>


@section('scripts')
    <script src="../js/highcharts.js"></script>
    <script type="text/javascript">
        let annees = <?php echo json_encode($statsAnnuelles['years']); ?> ;
        let analyses = <?php echo json_encode($statsAnnuelles['analyses']); ?> ;

        Highcharts.chart('container', {
            chart: {
                type: "column",
                height: '300'
            },
            title: {
                text: "Analyses annuelles",
                align: 'left'
            },
            xAxis: {
                categories: annees
            },
            yAxis: {
                min: 0,
                title: {
                    text: "Nombre d'analyses"
                }
            },
            legend: {
                enabled: false
            },
            plotOptions: {
                column: {
                    pointPadding: 0,
                    borderWidth: 0,
                    color: '#0a425aff'
                }
            },
            series: [
                {
                    name: 'Analyses',
                    data: analyses
                },
            ]
        })
    </script>
@endsection
