!function(e){var t={};function n(i){if(t[i])return t[i].exports;var r=t[i]={i:i,l:!1,exports:{}};return e[i].call(r.exports,r,r.exports,n),r.l=!0,r.exports}n.m=e,n.c=t,n.d=function(e,t,i){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:i})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var i=Object.create(null);if(n.r(i),Object.defineProperty(i,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var r in e)n.d(i,r,function(t){return e[t]}.bind(null,r));return i},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="/",n(n.s=25)}({25:function(e,t,n){e.exports=n(26)},26:function(e,t){$(":input").attr("readonly",!0),$("#liste_pays").attr("disabled",!0),$("#liste_veterinaires").attr("disabled",!0),$("#modifie").on("click",(function(){$(":input").attr("readonly",!1),$("#liste_pays").attr("disabled",!1),$("#liste_veterinaires").attr("disabled",!1),$("#new_vet").hide(),$(this).hide(),$("#valide").show()})),$("#modif_infos").submit((function(e){e.preventDefault();var t,n=$(this).serialize(),i=$(this).attr("action"),r=$("#champ_mail").val();t=r,new RegExp("^[0-9a-z._-]+@{1}[0-9a-z.-]{2,}[.]{1}[a-z]{2,5}$","i").test(t)?($("#champ_mail").removeClass("is-invalid"),$.post({url:i,datatype:"html",data:n}).done((function(e){e.erreur&&$.alert({theme:"dark",title:"Attention",content:$("#email_doublon").attr("message"),type:"red"}),$(":input").attr("readonly","readonly"),$("#liste_pays").attr("disabled",!0),$("#liste_veterinaires").attr("disabled",!0),$("#modifie").show(),$("#valide").hide()})).fail((function(e){console.log("ERREUR")}))):($.alert({title:"Attention",content:$("#email_non_valide").attr("message"),type:"red"}),$("#champ_mail").addClass("is-invalid").focus())}))}});
//# sourceMappingURL=infosPerso_modif.js.map