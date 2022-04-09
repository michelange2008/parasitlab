// Fonction qui renvoie un objet dans le sens contraire
const reverseObj = (obj) => {
  let newObj = {}
  console.log(obj);
Object.keys(obj)
  .sort()
  .reverse()
  .forEach((key) => {
    newObj[key] = obj[key]
    console.log(key);
  })

  console.log(newObj);
  return newObj
}


$(function() {

  var url_actuelle = window.location.protocol + "//" + window.location.host + window.location.pathname; // récupère l'adresse de la page actuelle
  var url = url_actuelle + '/analyseParMois';

  $.get({
    url: url,

  })
  .done(function(datas) {
    var donnees = JSON.parse(datas);
    var graphiques = [];
    nb_courbes = Object.keys(donnees).length;
    transp = 1;
    for(const annee in reverseObj(donnees)) {
      var serie = donnees[annee];
      valeurs = [];
      labels = [];
      for(const mois in serie) {
        labels.push(mois);
        valeurs.push(serie[mois]);
      }
      // graphique = {
      //   label: labels,
      //   datasets: [{
      //     label: annee,
      //     backgroundColor: 'rgb(255, 99, 132)',
      //     data: valeurs,
      //   }]
      // }
      graphique = {
        type: 'line',
        label: annee,
        data: valeurs,
        borderColor: 'rgb(255, 125, 132,' + transp + ' )',
      };
      transp -= transp/nb_courbes;
      graphiques.push(graphique);
    }
    data = {
      labels: labels,
      datasets: graphiques
    };
    const config = {
      data: data,
      options: {}
    };

    const ctxt = $("#graph");

    const graph = new Chart(
      ctxt,
      config
    );
  })


})
