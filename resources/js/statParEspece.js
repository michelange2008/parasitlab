const COLORSESP = [
  '#c6505a',
  '#2a584f',
  '#74a33f',
  '#6eb8a8',
  '#774448',
  '#fcffc0',
  '#2f142f',
  '#ee9c5d',
]
var url_actuelle = window.location.protocol + "//" + window.location.host + window.location.pathname; // récupère l'adresse de la page actuelle

var url = url_actuelle + '/analyseParEspece';

$.get({
  url: url,

})
.done(function(datas) {
  var data_esp = JSON.parse(datas);
  var noms = [];
  var nombre = [];
  data_esp.forEach((item, i) => {
    noms.push(item.nom);
    nombre.push(item.total);
  });

  data = {
    labels: noms,
    datasets: [
      {
        label: "essai",
        data: nombre,
        backgroundColor: COLORSESP,
      }
    ]
  };

  const config = {
    type: 'pie',
    data: data,
    options: {
      plugins: {
        title: {
          display: true,
          text: "Nombre d'analyses par espèces"
        }
      }
    },
  };

  const ctxt = $("#pie");

  const pie = new Chart(
    ctxt,
     config
  )
})
