(()=>{var a={7726:()=>{var a=["#c6505a","#2a584f","#74a33f","#6eb8a8","#774448","#fcffc0","#2f142f","#ee9c5d"],e=window.location.protocol+"//"+window.location.host+window.location.pathname+"/analyseParEspece";$.get({url:e}).done((function(e){var o=JSON.parse(e),r=[],t=[];o.forEach((function(a,e){r.push(a.nom),t.push(a.total)})),data={labels:r,datasets:[{label:"essai",data:t,backgroundColor:a}]};var n={type:"pie",data,options:{plugins:{title:{display:!0,text:"Nombre d'analyses par espèces"}}}},s=$("#pie");new Chart(s,n)}))},3212:()=>{var a=window.location.protocol+"//"+window.location.host+window.location.pathname+"/analyseParMois";$.get({url:a}).done((function(a){var e=JSON.parse(a),o=[];for(var r in nb_courbes=Object.keys(e).length,transp=1,e){var t=e[r];for(var n in valeurs=[],labels=[],t)labels.push(n),valeurs.push(t[n]);graphique={type:"line",label:r,data:valeurs,borderColor:"rgb(139, 64, 73,"+transp/nb_courbes+" )",backgroundColor:"rgb(139, 64, 73,"+transp/nb_courbes+" )",borderWidth:transp,order:transp/nb_courbes,radius:1,tension:.2,pointHoverRadius:10},transp+=1,o.push(graphique)}data={labels,datasets:o};var s={data,options:{plugins:{title:{display:!0,text:"Nombre d'analyses mensuelles"}}}},l=$("#graph");new Chart(l,s)}))}},e={};function o(r){var t=e[r];if(void 0!==t)return t.exports;var n=e[r]={exports:{}};return a[r](n,n.exports,o),n.exports}o(3212),o(7726),$((function(){}))})();
//# sourceMappingURL=stats.js.map