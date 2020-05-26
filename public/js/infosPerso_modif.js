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
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/infosPerso_modif.js":
/*!******************************************!*\
  !*** ./resources/js/infosPerso_modif.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("// FONCTION DESTINEE A PASSER LE FORMULAIRE DE MODIFICATION DES DONNEES DU VETERINAIRE D'ACTIF A INACTIF ET VICE-VERSA\n$(\":input\").attr('readonly', true);\n$(\"#liste_pays\").attr('disabled', true);\n$(\"#liste_veterinaires\").attr('disabled', true);\n$('#modifie').on('click', function () {\n  $(\":input\").attr('readonly', false);\n  $(\"#liste_pays\").attr('disabled', false);\n  $(\"#liste_veterinaires\").attr('disabled', false);\n  $(\"#new_vet\").hide();\n  $(this).hide();\n  $('#valide').show();\n});\n$('#modif_infos').submit(function (e) {\n  e.preventDefault();\n  var saisie = $(this).serialize();\n  var url = $(this).attr('action'); // On vérifie que l'adresse email a un format valide. Les autres vérif sont faites par le formulaire lui-même et UserController@store\n\n  var email = $('#champ_mail').val();\n\n  if (!isEmail(email)) {\n    $.alert({\n      title: \"Attention\",\n      content: $('#email_non_valide').attr('message'),\n      type: 'red'\n    });\n    $('#champ_mail').addClass('is-invalid').focus();\n  } else {\n    $('#champ_mail').removeClass('is-invalid');\n    $.post({\n      url: url,\n      datatype: 'html',\n      data: saisie\n    }).done(function (data) {\n      if (data.erreur) {\n        $.alert({\n          theme: 'dark',\n          title: \"Attention\",\n          content: $('#email_doublon').attr('message'),\n          type: 'red'\n        });\n      }\n\n      $(\":input\").attr('readonly', 'readonly');\n      $(\"#liste_pays\").attr('disabled', true);\n      $(\"#liste_veterinaires\").attr('disabled', true);\n      $('#modifie').show();\n      $('#valide').hide();\n    }).fail(function (data) {\n      console.log('ERREUR');\n    });\n  }\n}); // Fonction pour vérifier si un email a un format valide\n\nfunction isEmail(myVar) {\n  // La 1ère étape consiste à définir l'expression régulière d'une adresse email\n  var regEmail = new RegExp('^[0-9a-z._-]+@{1}[0-9a-z.-]{2,}[.]{1}[a-z]{2,5}$', 'i');\n  return regEmail.test(myVar);\n}//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvaW5mb3NQZXJzb19tb2RpZi5qcz8wM2I2Il0sIm5hbWVzIjpbIiQiLCJhdHRyIiwib24iLCJoaWRlIiwic2hvdyIsInN1Ym1pdCIsImUiLCJwcmV2ZW50RGVmYXVsdCIsInNhaXNpZSIsInNlcmlhbGl6ZSIsInVybCIsImVtYWlsIiwidmFsIiwiaXNFbWFpbCIsImFsZXJ0IiwidGl0bGUiLCJjb250ZW50IiwidHlwZSIsImFkZENsYXNzIiwiZm9jdXMiLCJyZW1vdmVDbGFzcyIsInBvc3QiLCJkYXRhdHlwZSIsImRhdGEiLCJkb25lIiwiZXJyZXVyIiwidGhlbWUiLCJmYWlsIiwiY29uc29sZSIsImxvZyIsIm15VmFyIiwicmVnRW1haWwiLCJSZWdFeHAiLCJ0ZXN0Il0sIm1hcHBpbmdzIjoiQUFBQTtBQUNBQSxDQUFDLENBQUMsUUFBRCxDQUFELENBQVlDLElBQVosQ0FBaUIsVUFBakIsRUFBNkIsSUFBN0I7QUFDQUQsQ0FBQyxDQUFDLGFBQUQsQ0FBRCxDQUFpQkMsSUFBakIsQ0FBc0IsVUFBdEIsRUFBa0MsSUFBbEM7QUFDQUQsQ0FBQyxDQUFDLHFCQUFELENBQUQsQ0FBeUJDLElBQXpCLENBQThCLFVBQTlCLEVBQTBDLElBQTFDO0FBR0FELENBQUMsQ0FBQyxVQUFELENBQUQsQ0FBY0UsRUFBZCxDQUFpQixPQUFqQixFQUEwQixZQUFXO0FBRW5DRixHQUFDLENBQUMsUUFBRCxDQUFELENBQVlDLElBQVosQ0FBaUIsVUFBakIsRUFBNkIsS0FBN0I7QUFDQUQsR0FBQyxDQUFDLGFBQUQsQ0FBRCxDQUFpQkMsSUFBakIsQ0FBc0IsVUFBdEIsRUFBa0MsS0FBbEM7QUFDQUQsR0FBQyxDQUFDLHFCQUFELENBQUQsQ0FBeUJDLElBQXpCLENBQThCLFVBQTlCLEVBQTBDLEtBQTFDO0FBQ0FELEdBQUMsQ0FBQyxVQUFELENBQUQsQ0FBY0csSUFBZDtBQUNBSCxHQUFDLENBQUMsSUFBRCxDQUFELENBQVFHLElBQVI7QUFDQUgsR0FBQyxDQUFDLFNBQUQsQ0FBRCxDQUFhSSxJQUFiO0FBRUQsQ0FURDtBQVlBSixDQUFDLENBQUMsY0FBRCxDQUFELENBQWtCSyxNQUFsQixDQUF5QixVQUFTQyxDQUFULEVBQVk7QUFFbkNBLEdBQUMsQ0FBQ0MsY0FBRjtBQUVBLE1BQUlDLE1BQU0sR0FBR1IsQ0FBQyxDQUFDLElBQUQsQ0FBRCxDQUFRUyxTQUFSLEVBQWI7QUFFQSxNQUFJQyxHQUFHLEdBQUdWLENBQUMsQ0FBQyxJQUFELENBQUQsQ0FBUUMsSUFBUixDQUFhLFFBQWIsQ0FBVixDQU5tQyxDQVFuQzs7QUFDQSxNQUFJVSxLQUFLLEdBQUdYLENBQUMsQ0FBQyxhQUFELENBQUQsQ0FBaUJZLEdBQWpCLEVBQVo7O0FBRUEsTUFBRyxDQUFDQyxPQUFPLENBQUNGLEtBQUQsQ0FBWCxFQUFvQjtBQUVsQlgsS0FBQyxDQUFDYyxLQUFGLENBQVE7QUFDTkMsV0FBSyxFQUFFLFdBREQ7QUFFTkMsYUFBTyxFQUFFaEIsQ0FBQyxDQUFDLG1CQUFELENBQUQsQ0FBdUJDLElBQXZCLENBQTRCLFNBQTVCLENBRkg7QUFHTmdCLFVBQUksRUFBRTtBQUhBLEtBQVI7QUFNQWpCLEtBQUMsQ0FBQyxhQUFELENBQUQsQ0FBaUJrQixRQUFqQixDQUEwQixZQUExQixFQUF3Q0MsS0FBeEM7QUFDRCxHQVRELE1BV0s7QUFFSG5CLEtBQUMsQ0FBQyxhQUFELENBQUQsQ0FBaUJvQixXQUFqQixDQUE2QixZQUE3QjtBQUVBcEIsS0FBQyxDQUFDcUIsSUFBRixDQUFPO0FBRUxYLFNBQUcsRUFBRUEsR0FGQTtBQUdMWSxjQUFRLEVBQUcsTUFITjtBQUlMQyxVQUFJLEVBQUVmO0FBSkQsS0FBUCxFQU9DZ0IsSUFQRCxDQU9NLFVBQVNELElBQVQsRUFBZTtBQUNuQixVQUFHQSxJQUFJLENBQUNFLE1BQVIsRUFBZ0I7QUFDZHpCLFNBQUMsQ0FBQ2MsS0FBRixDQUFRO0FBQ05ZLGVBQUssRUFBRSxNQUREO0FBRU5YLGVBQUssRUFBRSxXQUZEO0FBR05DLGlCQUFPLEVBQUVoQixDQUFDLENBQUMsZ0JBQUQsQ0FBRCxDQUFvQkMsSUFBcEIsQ0FBeUIsU0FBekIsQ0FISDtBQUlOZ0IsY0FBSSxFQUFFO0FBSkEsU0FBUjtBQU1EOztBQUNEakIsT0FBQyxDQUFDLFFBQUQsQ0FBRCxDQUFZQyxJQUFaLENBQWlCLFVBQWpCLEVBQTZCLFVBQTdCO0FBQ0FELE9BQUMsQ0FBQyxhQUFELENBQUQsQ0FBaUJDLElBQWpCLENBQXNCLFVBQXRCLEVBQWtDLElBQWxDO0FBQ0FELE9BQUMsQ0FBQyxxQkFBRCxDQUFELENBQXlCQyxJQUF6QixDQUE4QixVQUE5QixFQUEwQyxJQUExQztBQUNBRCxPQUFDLENBQUMsVUFBRCxDQUFELENBQWNJLElBQWQ7QUFDQUosT0FBQyxDQUFDLFNBQUQsQ0FBRCxDQUFhRyxJQUFiO0FBQ0QsS0FyQkQsRUFzQkN3QixJQXRCRCxDQXNCTSxVQUFTSixJQUFULEVBQWU7QUFDbkJLLGFBQU8sQ0FBQ0MsR0FBUixDQUFZLFFBQVo7QUFDRCxLQXhCRDtBQTBCRDtBQUVGLENBdERELEUsQ0F1REE7O0FBQ0EsU0FBU2hCLE9BQVQsQ0FBaUJpQixLQUFqQixFQUF1QjtBQUNyQjtBQUNBLE1BQUlDLFFBQVEsR0FBRyxJQUFJQyxNQUFKLENBQVcsa0RBQVgsRUFBOEQsR0FBOUQsQ0FBZjtBQUVBLFNBQU9ELFFBQVEsQ0FBQ0UsSUFBVCxDQUFjSCxLQUFkLENBQVA7QUFDRCIsImZpbGUiOiIuL3Jlc291cmNlcy9qcy9pbmZvc1BlcnNvX21vZGlmLmpzLmpzIiwic291cmNlc0NvbnRlbnQiOlsiLy8gRk9OQ1RJT04gREVTVElORUUgQSBQQVNTRVIgTEUgRk9STVVMQUlSRSBERSBNT0RJRklDQVRJT04gREVTIERPTk5FRVMgRFUgVkVURVJJTkFJUkUgRCdBQ1RJRiBBIElOQUNUSUYgRVQgVklDRS1WRVJTQVxuJChcIjppbnB1dFwiKS5hdHRyKCdyZWFkb25seScsIHRydWUpO1xuJChcIiNsaXN0ZV9wYXlzXCIpLmF0dHIoJ2Rpc2FibGVkJywgdHJ1ZSk7XG4kKFwiI2xpc3RlX3ZldGVyaW5haXJlc1wiKS5hdHRyKCdkaXNhYmxlZCcsIHRydWUpO1xuXG5cbiQoJyNtb2RpZmllJykub24oJ2NsaWNrJywgZnVuY3Rpb24oKSB7XG5cbiAgJChcIjppbnB1dFwiKS5hdHRyKCdyZWFkb25seScsIGZhbHNlKTtcbiAgJChcIiNsaXN0ZV9wYXlzXCIpLmF0dHIoJ2Rpc2FibGVkJywgZmFsc2UpO1xuICAkKFwiI2xpc3RlX3ZldGVyaW5haXJlc1wiKS5hdHRyKCdkaXNhYmxlZCcsIGZhbHNlKTtcbiAgJChcIiNuZXdfdmV0XCIpLmhpZGUoKTtcbiAgJCh0aGlzKS5oaWRlKCk7XG4gICQoJyN2YWxpZGUnKS5zaG93KCk7XG5cbn0pO1xuXG5cbiQoJyNtb2RpZl9pbmZvcycpLnN1Ym1pdChmdW5jdGlvbihlKSB7XG5cbiAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuXG4gIHZhciBzYWlzaWUgPSAkKHRoaXMpLnNlcmlhbGl6ZSgpO1xuXG4gIHZhciB1cmwgPSAkKHRoaXMpLmF0dHIoJ2FjdGlvbicpO1xuXG4gIC8vIE9uIHbDqXJpZmllIHF1ZSBsJ2FkcmVzc2UgZW1haWwgYSB1biBmb3JtYXQgdmFsaWRlLiBMZXMgYXV0cmVzIHbDqXJpZiBzb250IGZhaXRlcyBwYXIgbGUgZm9ybXVsYWlyZSBsdWktbcOqbWUgZXQgVXNlckNvbnRyb2xsZXJAc3RvcmVcbiAgdmFyIGVtYWlsID0gJCgnI2NoYW1wX21haWwnKS52YWwoKTtcblxuICBpZighaXNFbWFpbChlbWFpbCkpIHtcblxuICAgICQuYWxlcnQoe1xuICAgICAgdGl0bGU6IFwiQXR0ZW50aW9uXCIsXG4gICAgICBjb250ZW50OiAkKCcjZW1haWxfbm9uX3ZhbGlkZScpLmF0dHIoJ21lc3NhZ2UnKSxcbiAgICAgIHR5cGU6ICdyZWQnXG4gICAgfSk7XG5cbiAgICAkKCcjY2hhbXBfbWFpbCcpLmFkZENsYXNzKCdpcy1pbnZhbGlkJykuZm9jdXMoKTtcbiAgfVxuXG4gIGVsc2Uge1xuXG4gICAgJCgnI2NoYW1wX21haWwnKS5yZW1vdmVDbGFzcygnaXMtaW52YWxpZCcpO1xuXG4gICAgJC5wb3N0KHtcblxuICAgICAgdXJsOiB1cmwsXG4gICAgICBkYXRhdHlwZTogICdodG1sJyxcbiAgICAgIGRhdGE6IHNhaXNpZVxuXG4gICAgfSlcbiAgICAuZG9uZShmdW5jdGlvbihkYXRhKSB7XG4gICAgICBpZihkYXRhLmVycmV1cikge1xuICAgICAgICAkLmFsZXJ0KHtcbiAgICAgICAgICB0aGVtZTogJ2RhcmsnLFxuICAgICAgICAgIHRpdGxlOiBcIkF0dGVudGlvblwiLFxuICAgICAgICAgIGNvbnRlbnQ6ICQoJyNlbWFpbF9kb3VibG9uJykuYXR0cignbWVzc2FnZScpLFxuICAgICAgICAgIHR5cGU6ICdyZWQnXG4gICAgICAgIH0pO1xuICAgICAgfVxuICAgICAgJChcIjppbnB1dFwiKS5hdHRyKCdyZWFkb25seScsICdyZWFkb25seScpO1xuICAgICAgJChcIiNsaXN0ZV9wYXlzXCIpLmF0dHIoJ2Rpc2FibGVkJywgdHJ1ZSk7XG4gICAgICAkKFwiI2xpc3RlX3ZldGVyaW5haXJlc1wiKS5hdHRyKCdkaXNhYmxlZCcsIHRydWUpO1xuICAgICAgJCgnI21vZGlmaWUnKS5zaG93KCk7XG4gICAgICAkKCcjdmFsaWRlJykuaGlkZSgpO1xuICAgIH0pXG4gICAgLmZhaWwoZnVuY3Rpb24oZGF0YSkge1xuICAgICAgY29uc29sZS5sb2coJ0VSUkVVUicpO1xuICAgIH0pXG5cbiAgfVxuXG59KTtcbi8vIEZvbmN0aW9uIHBvdXIgdsOpcmlmaWVyIHNpIHVuIGVtYWlsIGEgdW4gZm9ybWF0IHZhbGlkZVxuZnVuY3Rpb24gaXNFbWFpbChteVZhcil7XG4gIC8vIExhIDHDqHJlIMOpdGFwZSBjb25zaXN0ZSDDoCBkw6lmaW5pciBsJ2V4cHJlc3Npb24gcsOpZ3VsacOocmUgZCd1bmUgYWRyZXNzZSBlbWFpbFxuICB2YXIgcmVnRW1haWwgPSBuZXcgUmVnRXhwKCdeWzAtOWEtei5fLV0rQHsxfVswLTlhLXouLV17Mix9Wy5dezF9W2Etel17Miw1fSQnLCdpJyk7XG5cbiAgcmV0dXJuIHJlZ0VtYWlsLnRlc3QobXlWYXIpO1xufVxuIl0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/js/infosPerso_modif.js\n");

/***/ }),

/***/ 2:
/*!************************************************!*\
  !*** multi ./resources/js/infosPerso_modif.js ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/michel/www/parasitlab/resources/js/infosPerso_modif.js */"./resources/js/infosPerso_modif.js");


/***/ })

/******/ });