$(":input").attr("readonly",!0),$("#liste_pays").attr("disabled",!0),$("#liste_veterinaires").attr("disabled",!0),$("#modifie").on("click",(function(){$(":input").attr("readonly",!1),$("#liste_pays").attr("disabled",!1),$("#liste_veterinaires").attr("disabled",!1),$("#new_vet").hide(),$(this).hide(),$("#valide").show()})),$("#modif_infos").submit((function(t){t.preventDefault();var e,a=$(this).serialize(),i=$(this).attr("action"),l=$("#champ_mail").val();e=l,new RegExp("^[0-9a-z._-]+@{1}[0-9a-z.-]{2,}[.]{1}[a-z]{2,5}$","i").test(e)?($("#champ_mail").removeClass("is-invalid"),$.post({url:i,datatype:"html",data:a}).done((function(t){t.erreur&&$.alert({theme:"dark",title:"Attention",content:$("#email_doublon").attr("message"),type:"red"}),$(":input").attr("readonly","readonly"),$("#liste_pays").attr("disabled",!0),$("#liste_veterinaires").attr("disabled",!0),$("#modifie").show(),$("#valide").hide()})).fail((function(t){console.log("ERREUR")}))):($.alert({title:"Attention",content:$("#email_non_valide").attr("message"),type:"red"}),$("#champ_mail").addClass("is-invalid").focus())}));
//# sourceMappingURL=infosPerso_modif.js.map