
annees = '<?php echo json_encode($statsAnnuelles["years"]); ?>' ;
analyses = '<?php echo json_encode($statsAnnuelles["analyses"]); ?>' ;


Highcharts.chart('container', {
    chart: {
        type: "column"
    },
    title: {
        text: "Nombre d'analyses annuelles",
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
    tooltip: {
        valueSuffix: ' (1000 MT)'
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [
        {
            name: 'Analyses',
            data: analyses
        },
    ]
})