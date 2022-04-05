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
/******/ 	return __webpack_require__(__webpack_require__.s = 4);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/teacher_registration.js":
/*!**********************************************!*\
  !*** ./resources/js/teacher_registration.js ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var current_fs, next_fs, previous_fs; //fieldsets

var opacity;
var current = 1;
var steps = 4;
setProgressBar(current);
$(".next").click(function () {
  current_fs = $(this).parent();
  next_fs = $(this).parent().next(); //Add Class Active

  $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active"); //show the next fieldset

  next_fs.show(); //hide the current fieldset with style

  current_fs.animate({
    opacity: 0
  }, {
    step: function step(now) {
      // for making fielset appear animation
      opacity = 1 - now;
      current_fs.css({
        'display': 'none',
        'position': 'relative'
      });
      next_fs.css({
        'opacity': opacity
      });
    },
    duration: 500
  });
  setProgressBar(++current);
});
$(".previous").click(function () {
  current_fs = $(this).parent();
  previous_fs = $(this).parent().prev(); //Remove class active

  $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active"); //show the previous fieldset

  previous_fs.show(); //hide the current fieldset with style

  current_fs.animate({
    opacity: 0
  }, {
    step: function step(now) {
      // for making fielset appear animation
      opacity = 1 - now;
      current_fs.css({
        'display': 'none',
        'position': 'relative'
      });
      previous_fs.css({
        'opacity': opacity
      });
    },
    duration: 500
  });
  setProgressBar(--current);
});

function setProgressBar(curStep) {
  var percent = parseFloat(100 / steps) * curStep;
  percent = percent.toFixed();
  $(".progress-bar").css("width", percent + "%");
}

$(".submit").click(function () {
  return false;
});
$("#work_add_btn").click(function () {
  var fromdate = new Date($("#work-fromdate").val()); //alert($("#work-todate").val());

  if (!Date.parse($("#work-todate").val())) {
    var date = new Date();
    yr = date.getFullYear(), month = date.getMonth() + 1, day = date.getDate(), todate = month + '/' + day + '/' + yr;
    todate = new Date(todate);
  } else {
    var todate = new Date($("#work-todate").val());
  }

  var output = '<div class="show_info_single">';
  output += '<input type="hidden" name="work_company[]" value="' + $("#work-company").val() + '">';
  output += '<input type="hidden" name="work_position[]" value="' + $("#work-position").val() + '">';
  output += '<input type="hidden" name="work_address[]" value="' + $("#work-address").val() + '">';
  output += '<input type="hidden" name="work_description[]" value="' + $("#work-description").val() + '">';
  output += '<input type="hidden" name="work_fromdate[]" value="' + $("#work-fromdate").val() + '">';
  output += '<input type="hidden" name="work_todate[]" value="' + $("#work-todate").val() + '">';
  output += '<input type="hidden" name="work_curent[]" value="' + $("#curent-work").val() + '">';
  output += '<img src="' + $("#work-img").val() + '">';
  output += '<div class="show_info_right">';
  output += '<a href="#"><h3>' + $("#work-company").val() + ' at ' + $("#work-position").val() + '</h3></a>';
  output += '<p>' + fromdate.getFullYear() + ' to ' + todate.getFullYear() + ' - ' + $("#work-address").val() + '</p>';
  output += '</div></div>';
  $("#work-seccion").append(output);
});
$("#university_add_btn").click(function () {
  var fromdate = new Date($("#university-fromdate").val());
  var todate = new Date($("#university-todate").val());
  var output = '<div class="show_info_single">';
  output += '<input type="hidden" name="university_name[]" value="' + $("#university-name").val() + '">';
  output += '<input type="hidden" name="university_fromdate[]" value="' + $("#university-fromdate").val() + '">';
  output += '<input type="hidden" name="university_todate[]" value="' + $("#university-todate").val() + '">';
  output += '<input type="hidden" name="university_description[]" value="' + $("#university-description").val() + '">';
  output += '<input type="hidden" name="university_concentrations[]" value="' + $("#university-concentrations").val() + '">';
  output += '<input type="hidden" name="university_attend_for[]" value="' + $("input[name='attend_for']:checked").val() + '">';
  output += '<input type="hidden" name="university_degree[]" value="' + $("#university-degree").val() + '">';
  output += '<input type="hidden" name="university_degree[]" value="' + $("#university-degree").val() + '">';
  output += '<img src="' + $("#university-img").val() + '">';
  output += '<div class="show_info_right">';
  output += '<a href="#"><h3>Studied ' + $("#university-name").val() + ' in ' + $("#university-degree").val() + '</h3></a>';
  output += '<p>Attended from ' + fromdate.getFullYear() + ' to ' + todate.getFullYear() + '</p>';
  output += '</div></div>';
  $("#university-seccion").append(output);
});
$("#college_add_btn").click(function () {
  var fromdate = new Date($("#college-fromdate").val());
  var todate = new Date($("#college-todate").val());
  var output = '<div class="show_info_single">';
  output += '<input type="hidden" name="college_name[]" value="' + $("#college-name").val() + '">';
  output += '<input type="hidden" name="college_fromdate[]" value="' + $("#college-fromdate").val() + '">';
  output += '<input type="hidden" name="college_todate[]" value="' + $("#college-todate").val() + '">';
  output += '<input type="hidden" name="college_description[]" value="' + $("#college-description").val() + '">';
  output += '<img src="' + $("#college-img").val() + '">';
  output += '<div class="show_info_right">';
  output += '<a href="#"><h3>' + $("#college-name").val() + '</h3></a>';
  output += '<p>' + fromdate.getFullYear() + ' to ' + todate.getFullYear() + '</p>';
  output += '</div></div>';
  $("#college-seccion").append(output);
});
$("#school_add_btn").click(function () {
  var fromdate = new Date($("#school-fromdate").val());
  var todate = new Date($("#school-todate").val());
  var output = '<div class="show_info_single">';
  output += '<input type="hidden" name="school_name[]" value="' + $("#school-name").val() + '">';
  output += '<input type="hidden" name="school_fromdate[]" value="' + $("#school-fromdate").val() + '">';
  output += '<input type="hidden" name="school_todate[]" value="' + $("#school-todate").val() + '">';
  output += '<input type="hidden" name="school_description[]" value="' + $("#school-description").val() + '">';
  output += '<img src="' + $("#school-img").val() + '">';
  output += '<div class="show_info_right">';
  output += '<a href="#"><h3>' + $("#school-name").val() + '</h3></a>';
  output += '<p>' + fromdate.getFullYear() + ' to ' + todate.getFullYear() + '</p>';
  output += '</div></div>';
  $("#school-seccion").append(output);
});
/* -------------------------------------------
::::::: Start multiple img upload :::::::
------------------------------------------- */

/* Passport / NID / Driving L/C. / Student ID Image */

$(document).ready(function () {
  document.getElementById("other_image").addEventListener('change', other_image, false);
  $("#other_image_view").sortable();
  $(document).on('click', '.image-cancel', function () {
    var no = $(this).data('no');
    $(".other_image-show-" + no).remove();
  });
});
var num = 4;

function other_image() {
  if (window.File && window.FileList && window.FileReader) {
    var files = event.target.files; //FileList object

    $("#other_image_view").show();
    var output = $("#other_image_view");

    for (var i = 0; i < files.length; i++) {
      var file = files[i];
      if (!file.type.match('image')) continue;
      var picReader = new FileReader();
      picReader.addEventListener('load', function (event) {
        var picFile = event.target;
        var html = '<div class="preview-image other_image-show-' + num + '">' + '<div class="image-cancel" data-no="' + num + '">x</div>' + '<div class="image-zone"><img id="pro-img-' + num + '" src="' + picFile.result + '"></div>' + '<div class="tools-edit-image"></div>' + '</div>';
        output.append(html);
        num = num + 1;
      });
      picReader.readAsDataURL(file);
    }

    $("#other_image").val('');
  } else {
    console.log('Browser not support');
  }
}
/* Passport / NID / Driving L/C. / Student ID Image */

/* Profile Images */


$(document).ready(function () {
  document.getElementById("avater_image").addEventListener('change', avater_image, false);
  $("#avater_image_view").sortable();
  $(document).on('click', '.image-cancel', function () {
    var no = $(this).data('no');
    $(".avater_image-show-" + no).remove();
  });
});

function avater_image() {
  if (window.File && window.FileList && window.FileReader) {
    var files = event.target.files; //FileList object

    $("#avater_image_view").show();
    var output = $("#avater_image_view");

    for (var i = 0; i < files.length; i++) {
      var file = files[i];
      if (!file.type.match('image')) continue;
      var picReader = new FileReader();
      picReader.addEventListener('load', function (event) {
        var picFile = event.target;
        var html = '<div class="preview-image avater_image-show-' + num + '">' + '<div class="image-cancel" data-no="' + num + '">x</div>' + '<div class="image-zone"><img id="pro-img-' + num + '" src="' + picFile.result + '"></div>' + '<div class="tools-edit-image"></div>' + '</div>';
        output.append(html);
        num = num + 1;
      });
      picReader.readAsDataURL(file);
    }

    $("#avater_image").val('');
  } else {
    console.log('Browser not support');
  }
}
/* Profile Images */

/* High School */


$(document).ready(function () {
  document.getElementById("sc_image").addEventListener('change', sc_image, false);
  $("#sc_image").sortable();
  $(document).on('click', '.image-cancel', function () {
    var no = $(this).data('no');
    $(".sc_image-show-" + no).remove();
  });
});

function sc_image() {
  if (window.File && window.FileList && window.FileReader) {
    var files = event.target.files; //FileList object

    $("#sc_image_view").show();
    var output = $("#sc_image_view");

    for (var i = 0; i < files.length; i++) {
      var file = files[i];
      if (!file.type.match('image')) continue;
      var picReader = new FileReader();
      picReader.addEventListener('load', function (event) {
        var picFile = event.target;
        var html = '<div class="preview-image sc_image-show-' + num + '">' + '<div class="image-cancel" data-no="' + num + '">x</div>' + '<div class="image-zone"><img id="pro-img-' + num + '" src="' + picFile.result + '"></div>' + '<div class="tools-edit-image"></div>' + '</div>';
        output.append(html);
        num = num + 1;
      });
      picReader.readAsDataURL(file);
    }

    $("#sc_image").val('');
  } else {
    console.log('Browser not support');
  }
}
/* High School */

/* College */


$(document).ready(function () {
  document.getElementById("cc_image").addEventListener('change', cc_image, false);
  $("#cc_image").sortable();
  $(document).on('click', '.image-cancel', function () {
    var no = $(this).data('no');
    $(".cc_image-show-" + no).remove();
  });
});

function cc_image() {
  if (window.File && window.FileList && window.FileReader) {
    var files = event.target.files; //FileList object

    $("#cc_image_view").show();
    var output = $("#cc_image_view");

    for (var i = 0; i < files.length; i++) {
      var file = files[i];
      if (!file.type.match('image')) continue;
      var picReader = new FileReader();
      picReader.addEventListener('load', function (event) {
        var picFile = event.target;
        var html = '<div class="preview-image cc_image-show-' + num + '">' + '<div class="image-cancel" data-no="' + num + '">x</div>' + '<div class="image-zone"><img id="pro-img-' + num + '" src="' + picFile.result + '"></div>' + '<div class="tools-edit-image"></div>' + '</div>';
        output.append(html);
        num = num + 1;
      });
      picReader.readAsDataURL(file);
    }

    $("#cc_image").val('');
  } else {
    console.log('Browser not support');
  }
}
/* College */

/* university */


$(document).ready(function () {
  document.getElementById("uc_image").addEventListener('change', uc_image, false);
  $("#uc_image").sortable();
  $(document).on('click', '.image-cancel', function () {
    var no = $(this).data('no');
    $(".uc_image-show-" + no).remove();
  });
});

function uc_image() {
  if (window.File && window.FileList && window.FileReader) {
    var files = event.target.files; //FileList object

    $("#uc_image_view").show();
    var output = $("#uc_image_view");

    for (var i = 0; i < files.length; i++) {
      var file = files[i];
      if (!file.type.match('image')) continue;
      var picReader = new FileReader();
      picReader.addEventListener('load', function (event) {
        var picFile = event.target;
        var html = '<div class="preview-image uc_image-show-' + num + '">' + '<div class="image-cancel" data-no="' + num + '">x</div>' + '<div class="image-zone"><img id="pro-img-' + num + '" src="' + picFile.result + '"></div>' + '<div class="tools-edit-image"></div>' + '</div>';
        output.append(html);
        num = num + 1;
      });
      picReader.readAsDataURL(file);
    }

    $("#uc_image").val('');
  } else {
    console.log('Browser not support');
  }
}
/* university */

/* -------------------------------------------
::::::: End multiple img upload :::::::
------------------------------------------- */

/***/ }),

/***/ 4:
/*!****************************************************!*\
  !*** multi ./resources/js/teacher_registration.js ***!
  \****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\laragon\www\skillxcellence\resources\js\teacher_registration.js */"./resources/js/teacher_registration.js");


/***/ })

/******/ });