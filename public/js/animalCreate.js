/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 10);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/animalCreate.js":
/*!**************************************!*\
  !*** ./resources/js/animalCreate.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("// Crée un nouvel animal dans un mélange\n// On récupére l'url actuelle\nvar url_actuelle = window.location.protocol + \"//\" + window.location.host + window.location.pathname; // récupère l'adresse de la page actuelle\n\n$(\"#add_animal\").on(\"click\", function () {\n  var numero_nouveau = $(\"#numero_nouveau\").val();\n  var nom_nouveau = $(\"#nom_nouveau\").val(); // Si le champs numero est vide, on ouvre une alert d'avertissement\n\n  if (numero_nouveau == '') {\n    $.alert({\n      title: \"Attention !\",\n      content: \"Il faut saisir au moins une valeur dans le champs numéro\",\n      theme: 'dark',\n      type: 'red',\n      icon: 'fas fa-exclamation-triangle',\n      buttons: {\n        OK: {\n          btnClass: 'btn-success'\n        }\n      }\n    });\n  } else {\n    // On initialise la variable à faux\n    var animal_deja_present = false; // On passe en revue tous les noms déjà existant\n\n    $('.animal_numero').each(function () {\n      // Si ce numero est déjà présent\n      if ($(this).html() == numero_nouveau) {\n        // On passe la variable à vrai\n        animal_deja_present = true;\n      }\n    }); // Si le nom saisi est déjà parmi les existants, on fait une alerte\n    // qui laisse la choix de l'enregister quand même.\n\n    if (animal_deja_present) {\n      $.confirm({\n        title: \"Attention !\",\n        content: \"Cet animal semble déjà exister, voulez-vous quand même l'enregistrer\",\n        theme: 'dark',\n        type: 'orange',\n        icon: 'fas fa-exclamation-triangle',\n        buttons: {\n          oui: {\n            btnClass: 'btn-blue',\n            keys: ['enter'],\n            action: function action() {\n              // Si on veut tout de même l'enregistrer, on soumet le formulaire\n              formsubmit();\n            }\n          },\n          non: {\n            btnClass: 'btn-secondary',\n            keys: ['esc'],\n            action: function action() {\n              $('#numero_nouveau').focus();\n            }\n          }\n        }\n      });\n    } else {\n      // On crée le nouvel animal\n      formsubmit();\n    }\n  }\n});\n\nfunction formsubmit() {\n  // comme les url sont différente en local (avec /public/) et en distant\n  // et que il y deux façon de créer un nouvel animal dans un mélange (melange.create et melange.edit)\n  // Il faut repérer le position du mot laboratoire et modifier l'url en conséquence\n  var cesure = url_actuelle.search('laboratoire'); // cesure est la position de la lettre l dans l'url actuelle\n  // url_actuelle.sustring(cesure) est le fragment d'url à partir du l de laboratoire\n\n  url = url_actuelle.replace(url_actuelle.substring(cesure), 'api/melange/addAnimal');\n  $(\"#numero_nouveau\").attr('value', $(\"#numero_nouveau\").val());\n  $.post({\n    url: url,\n    data: $(\"#form_addAnimal\").serialize()\n  }).done(function (data) {\n    var animal_id = data;\n    var numero_nouveau = $(\"#numero_nouveau\").val();\n    var nom_nouveau = $(\"#nom_nouveau\").val();\n    $('#listeAnimals').prepend('<tr>' + '<td><label class=\"animal_numero\" for=\"choix_' + animal_id + '\">' + numero_nouveau + '</label></td>' + '<td><label for=\"choix_' + animal_id + '\">' + nom_nouveau + '</label></td>' + '<td>' + '<input id=\"choix_' + animal_id + '\" type=\"checkbox\" name=\"choix[]\" value=\"' + animal_id + '\" checked=\"true\">' + '</td>' + '</tr>');\n    $(\"#numero_nouveau\").val('');\n    $(\"#nom_nouveau\").val('');\n  }).fail(function (data) {\n    alert('il y a un problème !');\n  });\n}//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvYW5pbWFsQ3JlYXRlLmpzPzkyNTYiXSwibmFtZXMiOlsidXJsX2FjdHVlbGxlIiwid2luZG93IiwibG9jYXRpb24iLCJwcm90b2NvbCIsImhvc3QiLCJwYXRobmFtZSIsIiQiLCJvbiIsIm51bWVyb19ub3V2ZWF1IiwidmFsIiwibm9tX25vdXZlYXUiLCJhbGVydCIsInRpdGxlIiwiY29udGVudCIsInRoZW1lIiwidHlwZSIsImljb24iLCJidXR0b25zIiwiT0siLCJidG5DbGFzcyIsImFuaW1hbF9kZWphX3ByZXNlbnQiLCJlYWNoIiwiaHRtbCIsImNvbmZpcm0iLCJvdWkiLCJrZXlzIiwiYWN0aW9uIiwiZm9ybXN1Ym1pdCIsIm5vbiIsImZvY3VzIiwiY2VzdXJlIiwic2VhcmNoIiwidXJsIiwicmVwbGFjZSIsInN1YnN0cmluZyIsImF0dHIiLCJwb3N0IiwiZGF0YSIsInNlcmlhbGl6ZSIsImRvbmUiLCJhbmltYWxfaWQiLCJwcmVwZW5kIiwiZmFpbCJdLCJtYXBwaW5ncyI6IkFBQUE7QUFDQTtBQUNBLElBQUlBLFlBQVksR0FBR0MsTUFBTSxDQUFDQyxRQUFQLENBQWdCQyxRQUFoQixHQUEyQixJQUEzQixHQUFrQ0YsTUFBTSxDQUFDQyxRQUFQLENBQWdCRSxJQUFsRCxHQUF5REgsTUFBTSxDQUFDQyxRQUFQLENBQWdCRyxRQUE1RixDLENBQXNHOztBQUV0R0MsQ0FBQyxDQUFDLGFBQUQsQ0FBRCxDQUFpQkMsRUFBakIsQ0FBb0IsT0FBcEIsRUFBNkIsWUFBVztBQUN0QyxNQUFJQyxjQUFjLEdBQUdGLENBQUMsQ0FBQyxpQkFBRCxDQUFELENBQXFCRyxHQUFyQixFQUFyQjtBQUNBLE1BQUlDLFdBQVcsR0FBR0osQ0FBQyxDQUFDLGNBQUQsQ0FBRCxDQUFrQkcsR0FBbEIsRUFBbEIsQ0FGc0MsQ0FHdEM7O0FBQ0EsTUFBR0QsY0FBYyxJQUFJLEVBQXJCLEVBQXlCO0FBRXZCRixLQUFDLENBQUNLLEtBQUYs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VUEsT0FaRjtBQWVBbEMsS0FBQyxDQUFDLGlCQUFELENBQUQsQ0FBcUJHLEdBQXJCLENBQXlCLEVBQXpCO0FBQ0FILEtBQUMsQ0FBQyxjQUFELENBQUQsQ0FBa0JHLEdBQWxCLENBQXNCLEVBQXRCO0FBQ0QsR0F6QkQsRUEwQkNpQyxJQTFCRCxDQTBCTSxVQUFTTCxJQUFULEVBQWU7QUFDbkIxQixTQUFLLENBQUMsc0JBQUQsQ0FBTDtBQUNELEdBNUJEO0FBNkJEIiwiZmlsZSI6Ii4vcmVzb3VyY2VzL2pzL2FuaW1hbENyZWF0ZS5qcy5qcyIsInNvdXJjZXNDb250ZW50IjpbIi8vIENyw6llIHVuIG5vdXZlbCBhbmltYWwgZGFucyB1biBtw6lsYW5nZVxuLy8gT24gcsOpY3Vww6lyZSBsJ3VybCBhY3R1ZWxsZVxudmFyIHVybF9hY3R1ZWxsZSA9IHdpbmRvdy5sb2NhdGlvbi5wcm90b2NvbCArIFwiLy9cIiArIHdpbmRvdy5sb2NhdGlvbi5ob3N0ICsgd2luZG93LmxvY2F0aW9uLnBhdGhuYW1lOyAvLyByw6ljdXDDqHJlIGwnYWRyZXNzZSBkZSBsYSBwYWdlIGFjdHVlbGxlXG5cbiQoXCIjYWRkX2FuaW1hbFwiKS5vbihcImNsaWNrXCIsIGZ1bmN0aW9uKCkge1xuICB2YXIgbnVtZXJvX25vdXZlYXUgPSAkKFwiI251bWVyb19ub3V2ZWF1XCIpLnZhbCgpO1xuICB2YXIgbm9tX25vdXZlYXUgPSAkKFwiI25vbV9ub3V2ZWF1XCIpLnZhbCgpO1xuICAvLyBTaSBsZSBjaGFtcHMgbnVtZXJvIGVzdCB2aWRlLCBvbiBvdXZyZSB1bmUgYWxlcnQgZCdhdmVydGlzc2VtZW50XG4gIGlmKG51bWVyb19ub3V2ZWF1ID09ICcnKSB7XG5cbiAgICAkLmFsZXJ0KHtcbiAgICAgIHRpdGxlOiBcIkF0dGVudGlvbiAhXCIsXG4gICAgICBjb250ZW50OiBcIklsIGZhdXQgc2Fpc2lyIGF1IG1vaW5zIHVuZSB2YWxldXIgZGFucyBsZSBjaGFtcHMgbnVtw6lyb1wiLFxuICAgICAgdGhlbWU6ICdkYXJrJyxcbiAgICAgIHR5cGU6ICdyZWQnLFxuICAgICAgaWNvbjogJ2ZhcyBmYS1leGNsYW1hdGlvbi10cmlhbmdsZScsXG4gICAgICBidXR0b25zOiB7XG4gICAgICAgIE9LOiB7XG4gICAgICAgICAgYnRuQ2xhc3MgOiAnYnRuLXN1Y2Nlc3MnLFxuICAgICAgICB9XG4gICAgICB9XG4gICAgfSk7XG5cbiAgfVxuXG4gIGVsc2Uge1xuICAgIC8vIE9uIGluaXRpYWxpc2UgbGEgdmFyaWFibGUgw6AgZmF1eFxuICAgIHZhciBhbmltYWxfZGVqYV9wcmVzZW50ID0gZmFsc2VcbiAgICAvLyBPbiBwYXNzZSBlbiByZXZ1ZSB0b3VzIGxlcyBub21zIGTDqWrDoCBleGlzdGFudFxuICAgICQoJy5hbmltYWxfbnVtZXJvJykuZWFjaChmdW5jdGlvbigpIHtcbiAgICAgIC8vIFNpIGNlIG51bWVybyBlc3QgZMOpasOgIHByw6lzZW50XG4gICAgICBpZigkKHRoaXMpLmh0bWwoKSA9PSBudW1lcm9fbm91dmVhdSApIHtcbiAgICAgICAgLy8gT24gcGFzc2UgbGEgdmFyaWFibGUgw6AgdnJhaVxuICAgICAgICBhbmltYWxfZGVqYV9wcmVzZW50ID0gdHJ1ZTtcbiAgICAgIH1cbiAgICB9KVxuXG4gICAgLy8gU2kgbGUgbm9tIHNhaXNpIGVzdCBkw6lqw6AgcGFybWkgbGVzIGV4aXN0YW50cywgb24gZmFpdCB1bmUgYWxlcnRlXG4gICAgLy8gcXVpIGxhaXNzZSBsYSBjaG9peCBkZSBsJ2VucmVnaXN0ZXIgcXVhbmQgbcOqbWUuXG4gICAgaWYoYW5pbWFsX2RlamFfcHJlc2VudCkge1xuICAgICAgJC5jb25maXJtKHtcbiAgICAgICAgdGl0bGU6IFwiQXR0ZW50aW9uICFcIixcbiAgICAgICAgY29udGVudDogXCJDZXQgYW5pbWFsIHNlbWJsZSBkw6lqw6AgZXhpc3Rlciwgdm91bGV6LXZvdXMgcXVhbmQgbcOqbWUgbCdlbnJlZ2lzdHJlclwiLFxuICAgICAgICB0aGVtZTogJ2RhcmsnLFxuICAgICAgICB0eXBlOiAnb3JhbmdlJyxcbiAgICAgICAgaWNvbjogJ2ZhcyBmYS1leGNsYW1hdGlvbi10cmlhbmdsZScsXG4gICAgICAgIGJ1dHRvbnM6IHtcbiAgICAgICAgICBvdWk6IHtcbiAgICAgICAgICAgIGJ0bkNsYXNzOiAnYnRuLWJsdWUnLFxuICAgICAgICAgICAga2V5czogWydlbnRlciddLFxuICAgICAgICAgICAgYWN0aW9uOiBmdW5jdGlvbigpIHtcbiAgICAgICAgICAgICAgLy8gU2kgb24gdmV1dCB0b3V0IGRlIG3Dqm1lIGwnZW5yZWdpc3RyZXIsIG9uIHNvdW1ldCBsZSBmb3JtdWxhaXJlXG4gICAgICAgICAgICAgIGZvcm1zdWJtaXQoKTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgICB9LFxuICAgICAgICAgIG5vbjoge1xuICAgICAgICAgICAgYnRuQ2xhc3M6ICdidG4tc2Vjb25kYXJ5JyxcbiAgICAgICAgICAgIGtleXM6IFsnZXNjJ10sXG4gICAgICAgICAgICBhY3Rpb246ZnVuY3Rpb24oKSB7XG4gICAgICAgICAgICAgICQoJyNudW1lcm9fbm91dmVhdScpLmZvY3VzKCk7XG4gICAgICAgICAgICB9XG4gICAgICAgICAgfVxuICAgICAgICB9XG4gICAgICB9KTtcbiAgICB9IGVsc2Uge1xuICAgICAgLy8gT24gY3LDqWUgbGUgbm91dmVsIGFuaW1hbFxuICAgICAgZm9ybXN1Ym1pdCgpO1xuXG4gICAgfVxuXG4gIH1cblxufSlcblxuZnVuY3Rpb24gZm9ybXN1Ym1pdCgpIHtcbiAgLy8gY29tbWUgbGVzIHVybCBzb250IGRpZmbDqXJlbnRlIGVuIGxvY2FsIChhdmVjIC9wdWJsaWMvKSBldCBlbiBkaXN0YW50XG4gIC8vIGV0IHF1ZSBpbCB5IGRldXggZmHDp29uIGRlIGNyw6llciB1biBub3V2ZWwgYW5pbWFsIGRhbnMgdW4gbcOpbGFuZ2UgKG1lbGFuZ2UuY3JlYXRlIGV0IG1lbGFuZ2UuZWRpdClcbiAgLy8gSWwgZmF1dCByZXDDqXJlciBsZSBwb3NpdGlvbiBkdSBtb3QgbGFib3JhdG9pcmUgZXQgbW9kaWZpZXIgbCd1cmwgZW4gY29uc8OpcXVlbmNlXG4gIHZhciBjZXN1cmUgPSB1cmxfYWN0dWVsbGUuc2VhcmNoKCdsYWJvcmF0b2lyZScpO1xuICAvLyBjZXN1cmUgZXN0IGxhIHBvc2l0aW9uIGRlIGxhIGxldHRyZSBsIGRhbnMgbCd1cmwgYWN0dWVsbGVcbiAgLy8gdXJsX2FjdHVlbGxlLnN1c3RyaW5nKGNlc3VyZSkgZXN0IGxlIGZyYWdtZW50IGQndXJsIMOgIHBhcnRpciBkdSBsIGRlIGxhYm9yYXRvaXJlXG4gIHVybCA9IHVybF9hY3R1ZWxsZS5yZXBsYWNlKCB1cmxfYWN0dWVsbGUuc3Vic3RyaW5nKGNlc3VyZSksICdhcGkvbWVsYW5nZS9hZGRBbmltYWwnKTtcblxuICAkKFwiI251bWVyb19ub3V2ZWF1XCIpLmF0dHIoJ3ZhbHVlJywgJChcIiNudW1lcm9fbm91dmVhdVwiKS52YWwoKSk7XG5cbiAgJC5wb3N0KHtcbiAgICB1cmw6IHVybCxcbiAgICBkYXRhOiAkKFwiI2Zvcm1fYWRkQW5pbWFsXCIpLnNlcmlhbGl6ZSgpXG4gIH0pXG4gIC5kb25lKGZ1bmN0aW9uKGRhdGEpIHtcbiAgICB2YXIgYW5pbWFsX2lkID0gZGF0YTtcbiAgICB2YXIgbnVtZXJvX25vdXZlYXUgPSAkKFwiI251bWVyb19ub3V2ZWF1XCIpLnZhbCgpO1xuICAgIHZhciBub21fbm91dmVhdSA9ICQoXCIjbm9tX25vdXZlYXVcIikudmFsKCk7XG4gICAgJCgnI2xpc3RlQW5pbWFscycpLnByZXBlbmQoXG5cbiAgICAgICc8dHI+JyArXG4gICAgICAgICc8dGQ+PGxhYmVsIGNsYXNzPVwiYW5pbWFsX251bWVyb1wiIGZvcj1cImNob2l4XycgKyBhbmltYWxfaWQgKyAnXCI+JyArXG4gICAgICAgICAgbnVtZXJvX25vdXZlYXUgK1xuICAgICAgICAnPC9sYWJlbD48L3RkPicgK1xuICAgICAgICAnPHRkPjxsYWJlbCBmb3I9XCJjaG9peF8nICsgYW5pbWFsX2lkICsnXCI+JyArXG4gICAgICAgICAgbm9tX25vdXZlYXUgK1xuICAgICAgICAnPC9sYWJlbD48L3RkPicgK1xuICAgICAgICAnPHRkPicgK1xuICAgICAgICAgICc8aW5wdXQgaWQ9XCJjaG9peF8nICsgIGFuaW1hbF9pZCArICdcIiB0eXBlPVwiY2hlY2tib3hcIiBuYW1lPVwiY2hvaXhbXVwiIHZhbHVlPVwiJyArIGFuaW1hbF9pZCArICdcIiBjaGVja2VkPVwidHJ1ZVwiPicgK1xuICAgICAgICAnPC90ZD4nICtcbiAgICAgICc8L3RyPidcblxuICAgIClcbiAgICAkKFwiI251bWVyb19ub3V2ZWF1XCIpLnZhbCgnJyk7XG4gICAgJChcIiNub21fbm91dmVhdVwiKS52YWwoJycpO1xuICB9KVxuICAuZmFpbChmdW5jdGlvbihkYXRhKSB7XG4gICAgYWxlcnQoJ2lsIHkgYSB1biBwcm9ibMOobWUgIScpXG4gIH0pXG59XG4iXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/js/animalCreate.js\n");

/***/ }),

/***/ 10:
/*!*****************************************!*\
  !*** multi ./resources/js/animalCreate ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /srv/parasitlab/resources/js/animalCreate */"./resources/js/animalCreate.js");


/***/ })

/******/ });