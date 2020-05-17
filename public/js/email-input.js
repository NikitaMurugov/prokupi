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
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/email-input.js":
/*!*************************************!*\
  !*** ./resources/js/email-input.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports) {

window.onload = function () {
  var email = document.querySelector('.email'),
      auto = document.querySelector('.autosuffix'),
      popularEmails = ['yandex.ru', 'mail.ru', 'inbox.ru', 'list.ru', 'bk.ru'],
      itemSelected = 0,
      itemList = [];
  window.addEventListener('keyup', function () {
    if (window.event.keyCode === 40) {
      // Down
      if (itemSelected === itemList.length - 1) {
        itemSelected = itemList.length - 1;
      } else {
        itemSelected += 1;
      }
    }

    if (window.event.keyCode === 38) {
      // Up
      if (itemSelected === 0) {
        return;
      } else {
        itemSelected -= 1;
      }
    }

    if (window.event.keyCode === 13) {
      // Enter
      email.value = itemList[itemSelected].textContent;
      auto.innerHTML = '';
    }

    for (var i = 0; i < itemList.length; i++) {
      // For loop through all items and add selected class if needed
      if (itemList[i].classList.contains('selected')) {
        itemList[i].classList.remove('selected');
      }

      if (itemSelected === i) {
        itemList[i].classList.add('selected');
      }
    }

    console.log(itemSelected, itemList);
  });
  email.addEventListener('keyup', function () {
    auto.innerHTML = '';

    if (email.value.match('@')) {
      // If the input has a @ in it
      var afterAt = email.value.substring(email.value.indexOf('@') + 1, email.value.length);
      var popularEmailsSub = [];

      for (var l = 0; l < popularEmails.length; l++) {
        popularEmailsSub.push(popularEmails[l].substring(0, afterAt.length));
      }

      if (afterAt === '') {
        for (var i = 0; i < popularEmails.length; i++) {
          auto.innerHTML += '<li>' + email.value + popularEmails[i] + '</li>';
        }

        itemList = document.querySelectorAll('.autosuffix li');
        itemList[0].classList.add('selected');
      } else if (!(afterAt === '')) {
        var matchedEmails = [];

        for (var k = 0; k < popularEmails.length; k++) {
          if (popularEmailsSub[k].match(afterAt)) {
            matchedEmails.push(popularEmails[k]);
          }
        }

        for (var _i = 0; _i < matchedEmails.length; _i++) {
          auto.innerHTML += '<li>' + email.value.substring(0, email.value.indexOf('@')) + '@' + matchedEmails[_i] + '</li>';
        }
      }

      var itemsList = document.querySelectorAll('.autosuffix li');

      for (var j = 0; j < itemsList.length; j++) {
        itemsList[j].addEventListener('click', function () {
          email.value = this.textContent;
          auto.innerHTML = '';
        });
      }
    }
  });
};

/***/ }),

/***/ 1:
/*!*******************************************!*\
  !*** multi ./resources/js/email-input.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\resources\js\email-input.js */"./resources/js/email-input.js");


/***/ })

/******/ });