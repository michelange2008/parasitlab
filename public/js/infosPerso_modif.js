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

eval("// FONCTION DESTINEE A PASSER LE FORMULAIRE DE MODIFICATION DES DONNEES DU VETERINAIRE D'ACTIF A INACTIF ET VICE-VERSA\n$(\":input\").attr('readonly', true);\n$(\"#liste_pays\").attr('disabled', true);\n$(\"#liste_veterinaires\").attr('disabled', true);\n$('#modifie').on('click', function () {\n  $(\":input\").attr('readonly', false);\n  $(\"#liste_pays\").attr('disabled', false);\n  $(\"#liste_veterinaires\").attr('disabled', false);\n  $(\"#new_vet\").hide();\n  $(this).hide();\n  $('#valide').show();\n});\n$('#modif_infos').submit(function (e) {\n  e.preventDefault();\n  var saisie = $(this).serialize();\n  var url = $(this).attr('action'); // On vérifie que l'adresse email a un format valide. Les autres vérif sont faites par le formulaire lui-même et UserController@store\n\n  var email = $('#champ_mail').val();\n\n  if (!isEmail(email)) {\n    $.alert({\n      title: \"Attention\",\n      content: $('#email_non_valide').attr('message'),\n      type: 'red'\n    });\n    $('#champ_mail').addClass('is-invalid').focus();\n  } else {\n    $('#champ_mail').removeClass('is-invalid');\n    $.post({\n      url: url,\n      datatype: 'html',\n      data: saisie\n    }).done(function (data) {\n      if (data.erreur) {\n        $.alert({\n          theme: 'dark',\n          title: \"Attention\",\n          content: $('#email_doublon').attr('message'),\n          type: 'red'\n        });\n      }\n\n      $(\":input\").attr('readonly', 'readonly');\n      $(\"#liste_pays\").attr('disabled', true);\n      $(\"#liste_veterinaires\").attr('disabled', true);\n      $('#modifie').show();\n      $('#valide').hide();\n    }).fail(function (data) {\n      console.log('ERREUR');\n    });\n  }\n}); // Fonction pour vérifier si un email a un format valide\n\nfunction isEmail(myVar) {\n  // La 1ère étape consiste à définir l'expression régulière d'une adresse email\n  var regEmail = new RegExp('^[0-9a-z._-]+@{1}[0-9a-z.-]{2,}[.]{1}[a-z]{2,5}$', 'i');\n  return regEmail.test(myVar);\n}//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvaW5mb3NQZXJzb19tb2RpZi5qcz8wM2I2Il0sIm5hbWVzIjpbIiQiLCJhdHRyIiwib24iLCJoaWRlIiwic2hvdyIsInN1Ym1pdCIsImUiLCJwcmV2ZW50RGVmYXVsdCIsInNhaXNpZSIsInNlcmlhbGl6ZSIsInVybCIsImVtYWlsIiwidmFsIiwiaXNFbWFpbCIsImFsZXJ0IiwidGl0bGUiLCJjb250ZW50IiwidHlwZSIsImFkZENsYXNzIiwiZm9jdXMiLCJyZW1vdmVDbGFzcyIsInBvc3QiLCJkYXRhdHlwZSIsImRhdGEiLCJkb25lIiwiZXJyZXVyIiwidGhlbWUiLCJmYWlsIiwiY29uc29sZSIsImxvZyIsIm15VmFyIiwicmVnRW1haWwiLCJSZWdFeHAiLCJ0ZXN0Il0sIm1hcHBpbmdzIjoiQUFBQTtBQUNBQSxDQUFDLENBQUMsUUFBRCxDQUFELENBQVlDLElBQVosQ0FBaUIsVUFBakIsRUFBNkIsSUFBN0I7QUFDQUQsQ0FBQyxDQUFDLGFBQUQsQ0FBRCxDQUFpQkMsSUFBakIsQ0FBc0IsVUFBdEIsRUFBa0MsSUFBbEM7QUFDQUQsQ0FBQyxDQUFDLHFCQUFELENBQUQsQ0FBeUJDLElBQXpCLENBQThCLFVBQTlCLEVBQTBDLElBQTFDO0FBR0FELENBQUMsQ0FBQyxVQUFELENBQUQsQ0FBY0UsRUFBZCxDQUFpQixPQUFqQixFQUEwQixZQUFXO0FBRW5DRixHQUFDLENBQUMsUUFBRCxDQUFELENBQVlDLElBQVosQ0FBaUIsVUFBakIsRUFBNkIsS0FBN0I7QUFDQUQsR0FBQyxDQUFDLGFBQUQsQ0FBRCxDQUFpQkMsSUFBakIsQ0FBc0IsVUFBdEIsRUFBa0MsS0FBbEM7QUFDQUQsR0FBQyxDQUFDLHFCQUFELENBQUQsQ0FBeUJDLElBQXpCLENBQThCLFVBQTlCLEVBQTBDLEtBQTFDO0FBQ0FELEdBQUMsQ0FBQyxVQUFELENBQUQsQ0FBY0csSUFBZDtBQUNBSCxHQUFDLENBQUMsSUFBRCxDQUFELENBQVFHLElBQVI7QUFDQUgsR0FBQyxDQUFDLFNBQUQsQ0FBRCxDQUFhSSxJQUFiO0FBRUQsQ0FURDtBQVlBSixDQUFDLENBQUMsY0FBRCxDQUFELENBQWtCSyxNQUFsQixDQUF5QixVQUFTQyxDQUFULEVBQVk7QUFFbkNBLEdBQUMsQ0FBQ0MsY0FBRjtBQUVBLE1BQUlDLE1BQU0sR0FBR1IsQ0FBQyxDQUFDLElBQUQsQ0FBRCxDQUFRUyxTQUFSLEVBQWI7QUFFQSxNQUFJQyxHQUFHLEdBQUdWLENBQUMsQ0FBQyxJQUFELENBQUQsQ0FBUUMsSUFBUixDQUFhLFFBQWIsQ0FBVixDQU5tQyxDQVFuQzs7QUFDQSxNQUFJVSxLQUFLLEdBQUdYLENBQUMsQ0FBQyxhQUFELENBQUQsQ0FBaUJZLEdBQWpCLEVBQVo7O0FBRUEsTUFBRyxDQUFDQyxPQUFPLENBQUNGLEtBQUQsQ0FBWCxFQUFvQjtBQUVsQlgsS0FBQyxDQUFDYyxLQUFGLENBQVE7QUFDTkMsV0FBSyxFQUFFLFdBREQ7QUFFTkMsYUFBTyxFQUFFaEIsQ0FBQyxDQUFDLG1CQUFELENBQUQsQ0FBdUJDLElBQXZCLENBQTRCLFNBQTVCLENBRkg7QUFHTmdCLFVBQUksRUFBRTtBQUhBLEtBQVI7QUFNQWpCLEtBQUMsQ0FBQyxhQUFELENBQUQsQ0FBaUJrQixRQUFqQixDQUEwQixZQUExQixFQUF3Q0MsS0FBeEM7QUFDRCxHQVRELE1BV0s7QUFFSG5CLEtBQUMsQ0FBQyxhQUFELENBQUQsQ0FBaUJvQixXQUFqQixDQUE2QixZQUE3QjtBQUVBcEIsS0FBQyxDQUFDcUIsSUFBRixDQUFPO0FBRUxYLFNBQUcsRUFBRUEsR0FGQTtBQUdMWSxjQUFRLEVBQUcsTUFITjtBQUlMQyxVQUFJLEVBQUVmO0FBSkQsS0FBUCxFQU9DZ0IsSUFQRCxDQU9NLFVBQVNELElBQVQsRUFBZTtBQUNuQixVQUFHQSxJQUFJLENBQUNFLE1BQVIsRUFBZ0I7QUFDZHpCLFNBQUMsQ0FBQ2MsS0FBRixDQUFRO0FBQ05ZLGVBQUssRUFBRSxNQUREO0FBRU5YLGVBQUssRUFBRSxXQUZEO0FBR05DLGlCQUFPLEVBQUVoQixDQUFDLENBQUMsZ0JBQUQsQ0FBRCxDQUFvQkMsSUFBcEIsQ0FBeUIsU0FBekIsQ0FISDtBQUlOZ0IsY0FBSSxFQUFFO0FBSkEsU0FBUjtBQU1EOztBQUNEakIsT0FBQyxDQUFDLFFBQUQsQ0FBRCxDQUFZQyxJQUFaLENBQWlCLFVBQWpCLEVBQTZCLFVBQTdCO0FBQ0FELE9BQUMsQ0FBQyxhQUFELENBQUQsQ0FBaUJDLElBQWpCLENBQXNCLFVBQXRCLEVBQWtDLElBQWxDO0FBQ0FELE9BQUMsQ0FBQyxxQkFBRCxDQUFELENBQXlCQyxJQUF6QixDQUE4QixVQUE5QixFQUEwQyxJQUExQztBQUNBRCxPQUFDLENBQUMsVUFBRCxDQUFELENBQWNJLElBQWQ7QUFDQUosT0FBQyxDQUFDLFNBQUQsQ0FBRCxDQUFhRyxJQUFiO0FBQ0QsS0FyQkQsRUFzQkN3QixJQXRCRCxDQXNCTSxVQUFTSixJQUFULEVBQWU7QUFDbkJLLGFBQU8sQ0FBQ0MsR0FBUixDQUFZLFFBQVo7QUFDRCxLQXhCRDtBQTBCRDtBQUVGLENBdERELEUsQ0F1REE7O0FBQ0EsU0FBU2hCLE9BQVQsQ0FBaUJpQixLQUFqQixFQUF1QjtBQUNyQjtBQUNBLE1BQUlDLFFBQVEsR0FBRyxJQUFJQyxNQUFKLENBQVcsa0RBQVgsRUFBOEQsR0FBOUQsQ0FBZjtBQUVBLFNBQU9ELFFBQVEsQ0FBQ0UsSUFBVCxDQUFjSCxLQUFkLENBQVA7QUFDRCIsImZpbGUiOiIuL3Jlc291cmNlcy9qcy9pbmZvc1BlcnNvX21vZGlmLmpzLmpzIiwic291cmNlc0NvbnRlbnQiOlsiLy8gRk9OQ1RJT04gREVTVElORUUgQSBQQVNTRVIgTEUgRk9STVVMQUlSRSBERSBNT0RJRklDQVRJT04gREVTIERPTk5FRVMgRFUgVkVURVJJTkFJUkUgRCdBQ1RJRiBBIElOQUNUSUYgRVQgVklDRS1WRVJTQVxyXG4kKFwiOmlucHV0XCIpLmF0dHIoJ3JlYWRvbmx5JywgdHJ1ZSk7XHJcbiQoXCIjbGlzdGVfcGF5c1wiKS5hdHRyKCdkaXNhYmxlZCcsIHRydWUpO1xyXG4kKFwiI2xpc3RlX3ZldGVyaW5haXJlc1wiKS5hdHRyKCdkaXNhYmxlZCcsIHRydWUpO1xyXG5cclxuXHJcbiQoJyNtb2RpZmllJykub24oJ2NsaWNrJywgZnVuY3Rpb24oKSB7XHJcblxyXG4gICQoXCI6aW5wdXRcIikuYXR0cigncmVhZG9ubHknLCBmYWxzZSk7XHJcbiAgJChcIiNsaXN0ZV9wYXlzXCIpLmF0dHIoJ2Rpc2FibGVkJywgZmFsc2UpO1xyXG4gICQoXCIjbGlzdGVfdmV0ZXJpbmFpcmVzXCIpLmF0dHIoJ2Rpc2FibGVkJywgZmFsc2UpO1xyXG4gICQoXCIjbmV3X3ZldFwiKS5oaWRlKCk7XHJcbiAgJCh0aGlzKS5oaWRlKCk7XHJcbiAgJCgnI3ZhbGlkZScpLnNob3coKTtcclxuXHJcbn0pO1xyXG5cclxuXHJcbiQoJyNtb2RpZl9pbmZvcycpLnN1Ym1pdChmdW5jdGlvbihlKSB7XHJcblxyXG4gIGUucHJldmVudERlZmF1bHQoKTtcclxuXHJcbiAgdmFyIHNhaXNpZSA9ICQodGhpcykuc2VyaWFsaXplKCk7XHJcblxyXG4gIHZhciB1cmwgPSAkKHRoaXMpLmF0dHIoJ2FjdGlvbicpO1xyXG5cclxuICAvLyBPbiB2w6lyaWZpZSBxdWUgbCdhZHJlc3NlIGVtYWlsIGEgdW4gZm9ybWF0IHZhbGlkZS4gTGVzIGF1dHJlcyB2w6lyaWYgc29udCBmYWl0ZXMgcGFyIGxlIGZvcm11bGFpcmUgbHVpLW3Dqm1lIGV0IFVzZXJDb250cm9sbGVyQHN0b3JlXHJcbiAgdmFyIGVtYWlsID0gJCgnI2NoYW1wX21haWwnKS52YWwoKTtcclxuXHJcbiAgaWYoIWlzRW1haWwoZW1haWwpKSB7XHJcblxyXG4gICAgJC5hbGVydCh7XHJcbiAgICAgIHRpdGxlOiBcIkF0dGVudGlvblwiLFxyXG4gICAgICBjb250ZW50OiAkKCcjZW1haWxfbm9uX3ZhbGlkZScpLmF0dHIoJ21lc3NhZ2UnKSxcclxuICAgICAgdHlwZTogJ3JlZCdcclxuICAgIH0pO1xyXG5cclxuICAgICQoJyNjaGFtcF9tYWlsJykuYWRkQ2xhc3MoJ2lzLWludmFsaWQnKS5mb2N1cygpO1xyXG4gIH1cclxuXHJcbiAgZWxzZSB7XHJcblxyXG4gICAgJCgnI2NoYW1wX21haWwnKS5yZW1vdmVDbGFzcygnaXMtaW52YWxpZCcpO1xyXG5cclxuICAgICQucG9zdCh7XHJcblxyXG4gICAgICB1cmw6IHVybCxcclxuICAgICAgZGF0YXR5cGU6ICAnaHRtbCcsXHJcbiAgICAgIGRhdGE6IHNhaXNpZVxyXG5cclxuICAgIH0pXHJcbiAgICAuZG9uZShmdW5jdGlvbihkYXRhKSB7XHJcbiAgICAgIGlmKGRhdGEuZXJyZXVyKSB7XHJcbiAgICAgICAgJC5hbGVydCh7XHJcbiAgICAgICAgICB0aGVtZTogJ2RhcmsnLFxyXG4gICAgICAgICAgdGl0bGU6IFwiQXR0ZW50aW9uXCIsXHJcbiAgICAgICAgICBjb250ZW50OiAkKCcjZW1haWxfZG91YmxvbicpLmF0dHIoJ21lc3NhZ2UnKSxcclxuICAgICAgICAgIHR5cGU6ICdyZWQnXHJcbiAgICAgICAgfSk7XHJcbiAgICAgIH1cclxuICAgICAgJChcIjppbnB1dFwiKS5hdHRyKCdyZWFkb25seScsICdyZWFkb25seScpO1xyXG4gICAgICAkKFwiI2xpc3RlX3BheXNcIikuYXR0cignZGlzYWJsZWQnLCB0cnVlKTtcclxuICAgICAgJChcIiNsaXN0ZV92ZXRlcmluYWlyZXNcIikuYXR0cignZGlzYWJsZWQnLCB0cnVlKTtcclxuICAgICAgJCgnI21vZGlmaWUnKS5zaG93KCk7XHJcbiAgICAgICQoJyN2YWxpZGUnKS5oaWRlKCk7XHJcbiAgICB9KVxyXG4gICAgLmZhaWwoZnVuY3Rpb24oZGF0YSkge1xyXG4gICAgICBjb25zb2xlLmxvZygnRVJSRVVSJyk7XHJcbiAgICB9KVxyXG5cclxuICB9XHJcblxyXG59KTtcclxuLy8gRm9uY3Rpb24gcG91ciB2w6lyaWZpZXIgc2kgdW4gZW1haWwgYSB1biBmb3JtYXQgdmFsaWRlXHJcbmZ1bmN0aW9uIGlzRW1haWwobXlWYXIpe1xyXG4gIC8vIExhIDHDqHJlIMOpdGFwZSBjb25zaXN0ZSDDoCBkw6lmaW5pciBsJ2V4cHJlc3Npb24gcsOpZ3VsacOocmUgZCd1bmUgYWRyZXNzZSBlbWFpbFxyXG4gIHZhciByZWdFbWFpbCA9IG5ldyBSZWdFeHAoJ15bMC05YS16Ll8tXStAezF9WzAtOWEtei4tXXsyLH1bLl17MX1bYS16XXsyLDV9JCcsJ2knKTtcclxuXHJcbiAgcmV0dXJuIHJlZ0VtYWlsLnRlc3QobXlWYXIpO1xyXG59XHJcbiJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/infosPerso_modif.js\n");

/***/ }),

/***/ 2:
/*!************************************************!*\
  !*** multi ./resources/js/infosPerso_modif.js ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /mnt/c/Users/33683/www/parasitlab/resources/js/infosPerso_modif.js */"./resources/js/infosPerso_modif.js");


/***/ })

/******/ });