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
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/custom.js":
/*!********************************!*\
  !*** ./resources/js/custom.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

/* -------------------------------------------
::::::: Start Flash Box :::::::
------------------------------------------- */
$('.select2').select2();
$('.textarea').summernote();
$('.ui-helper-hidden-accessible').remove();

function elementAction(id, formSubmit) {
  var elem = document.getElementById(id);

  if (elem) {
    if (formSubmit == 'y') {
      document.getElementById(id).submit();
    } else {
      return elem.parentNode.removeChild(elem);
    }
  }
}

function closeMethod() {
  elementAction($('.flash-message').find('.flash-confirm').attr('data-form-auto-id'));
  $('.flash-message').removeClass('flash-message-active').remove('flash-message-window');
  $('.flash-message').find('.flash-confirm').attr('href', 'javascript:;').removeAttr('data-form-id').removeAttr('data-form-auto-id');
  $('.flash-message').find('.centralize-content').removeClass('flash-success').removeClass('flash-error').removeClass('flash-warning').removeClass('flash-confirmation').find('p').text('');
}

$(document).on('click', '.flash-close', function (e) {
  e.preventDefault();
  closeMethod();
});
$(document).on('click', '.flash-message-window', function (e) {
  e.preventDefault();
  closeMethod();
});
$(document).on('click', '.flash-confirm', function (e) {
  var $this = $(this);
  var dataInfo = $this.attr('data-form-id');
  var autoForm = $this.attr('data-form-auto-id');

  if (autoForm) {
    e.preventDefault();
    elementAction(autoForm, 'y');
    closeMethod();
  } else if (dataInfo) {
    e.preventDefault();
    $('#' + dataInfo).submit();
    closeMethod();
  }
});
$(document).on('click', '.confirmation', function (e) {
  e.preventDefault();
  var $this = $(this);
  var dataAlert = $this.attr('data-alert');
  dataInfo = $this.attr('data-form-id');

  if (!dataInfo) {
    var dataInfo = $this.attr('href');
    $('.flash-message').find('.flash-confirm').attr('href', dataInfo);
  } else {
    var autoForm = $this.attr('data-form-method');

    if (autoForm) {
      var link = $this.attr('href');
      var dataToken = $('meta[name="csrf-token"]').attr('content');
      autoForm = autoForm.toUpperCase();

      if (autoForm == 'POST' || autoForm == 'PUT' || autoForm == 'DELETE') {
        var newForm = '<form id="#auto-form-generation-' + dataInfo + '" method="POST" action= "' + link + '" style="height: 0; width: 0; overflow: hidden;">'; //

        newForm = newForm + '<input type = "hidden" name ="_token" value = "' + dataToken + '">';
        newForm = newForm + '<input type = "hidden" name ="_method" value = "' + autoForm + '">';
        $('body').prepend(newForm);
      }

      $('.flash-confirm').attr('data-form-auto-id', '#auto-form-generation-' + dataInfo);
    } else {
      $('.flash-message').find('.flash-confirm').attr('data-form-id', dataInfo);
    }
  }

  $('.flash-message').find('.centralize-content').addClass('flash-confirmation').find('p').text(dataAlert);
  $('.flash-message').addClass('flash-message-active');
});

function flashBox(warnType, message) {
  $('.flash-message').find('.centralize-content').addClass('flash-' + warnType).find('p').text(message);
  $('.flash-message').addClass('flash-message-active flash-message-window');
}
/* -------------------------------------------
::::::: End Flash Box :::::::
------------------------------------------- */

/* -------------------------------------------
::::::: Start Cookie :::::::
------------------------------------------- */


function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + exdays * 24 * 60 * 60 * 1000);
  var expires = "expires=" + d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');

  for (var i = 0; i < ca.length; i++) {
    var c = ca[i];

    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }

    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }

  return "";
}
/* -------------------------------------------
::::::: End Cookie :::::::
------------------------------------------- */

/* -------------------------------------------
::::::: Start slicknav :::::::
------------------------------------------- */

/* -------------------------------------------
::::::: Start slicknav :::::::
------------------------------------------- */


if ($('#lf-main-nav').length > 0) {
  $('#lf-main-nav').find('.active').parents('li').addClass('active');
  $('#lf-main-nav').slicknav({
    prependTo: ".lf-responsive-menu-wrapper",
    'closedSymbol': '&#xf105;',
    'openedSymbol': '&#xf107;',
    label: ""
  });
}

if ($('#lf-side-nav').length > 0) {
  $(window).on("load", function () {
    $("#lf-side-nav").mCustomScrollbar({
      theme: "dark",
      scrollInertia: 300,
      axis: 'y'
    });
  });
}

if ($('.lf-side-nav').length > 0) {
  $('.lf-side-nav li.active').parents('li').addClass('active menu-open');
  $(document).on('click', ".lf-side-nav-controller", function () {
    if ($('.lf-side-nav').hasClass('lf-side-nav-open')) {
      $('.lf-side-nav').removeClass('lf-side-nav-open');

      if ($('body').hasClass('lf-fixed-sidenav') && $(window).width() >= 992) {
        $('.wrapper').css('margin-left', '0px');
      }
    } else {
      $('.lf-side-nav').addClass('lf-side-nav-open');

      if ($('body').hasClass('lf-fixed-sidenav') && $(window).width() >= 992) {
        $('.wrapper').css('margin-left', '280px');
      }
    }
  });

  if ($('body').hasClass('lf-fixed-sidenav')) {
    $(window).on('resize', function () {
      if ($('.lf-side-nav').hasClass('lf-side-nav-open')) {
        if ($(window).width() >= 992) {
          $('.wrapper').css('margin-left', '280px');
        } else {
          $('.wrapper').css('margin-left', '0px');
        }
      } else {
        $('.wrapper').css('margin-left', '0px');
      }
    });
  }

  $(document).on('click', '.lf-side-nav li a', function () {
    var a = $(this).parent();
    var b = a.hasClass('menu-open');

    if (b) {
      a.children('ul').slideUp(200, function () {
        a.removeClass('menu-open');
      });
    } else {
      a.children('ul').slideDown(200, function () {
        a.addClass('menu-open');
      });
    }
  });
}
/* -------------------------------------------
::::::: End slicknav :::::::
------------------------------------------- */


function stripTag(input) {
  input = input.toString();
  return input.replace(/(<([^>]+)>)/ig, "");
}
/* -------------------------------------------
::::::: Start multiple img upload :::::::
------------------------------------------- */


$(document).ready(function () {
  document.getElementById('pro-image').addEventListener('change', readImage, false);
  $(".preview-images-zone").sortable();
  $(document).on('click', '.image-cancel', function () {
    var no = $(this).data('no');
    $(".preview-show-" + no).remove();
  });
});
var num = 4;

function readImage() {
  if (window.File && window.FileList && window.FileReader) {
    var files = event.target.files; //FileList object

    $(".preview-images-zone").show();
    var output = $(".preview-images-zone");

    for (var i = 0; i < files.length; i++) {
      var file = files[i];
      if (!file.type.match('image')) continue;
      var picReader = new FileReader();
      picReader.addEventListener('load', function (event) {
        var picFile = event.target;
        var html = '<div class="preview-image preview-show-' + num + '">' + '<div class="image-cancel" data-no="' + num + '">x</div>' + '<div class="image-zone"><img id="pro-img-' + num + '" src="' + picFile.result + '"></div>' + '<div class="tools-edit-image"></div>' + '</div>';
        output.append(html);
        num = num + 1;
      });
      picReader.readAsDataURL(file);
    } //$("#pro-image").val(files);

  } else {
    console.log('Browser not support');
  }
}
/* -------------------------------------------
::::::: End multiple img upload :::::::
------------------------------------------- */

/***/ }),

/***/ 3:
/*!**************************************!*\
  !*** multi ./resources/js/custom.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! G:\xampp\htdocs\booking_system\resources\js\custom.js */"./resources/js/custom.js");


/***/ })

/******/ });