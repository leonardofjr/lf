webpackJsonp([8],{

/***/ 52:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(1)
/* script */
var __vue_script__ = __webpack_require__(53)
/* template */
var __vue_template__ = __webpack_require__(54)
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = null
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __vue_script__,
  __vue_template__,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "resources/js/views/Home.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-63cd6604", Component.options)
  } else {
    hotAPI.reload("data-v-63cd6604", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 53:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
    data: function data() {
        return {};
    },
    mounted: function mounted() {

        if ($('.loading-overlay') != null) {
            $('body').removeClass('overflow-auto');
            $('#top-bar').addClass('d-none');
            $('body').addClass('overflow-hidden');
            $('.loading-overlay').addClass('loading-overlay-animation');
        }
    },

    methods: {
        fadeLoadingOverlay: function fadeLoadingOverlay() {
            this.$parent.displayTopbar();
            $('body').removeClass('overflow-hidden');
            $('body').addClass('overflow-auto');
            $('.loading-overlay').addClass('loading-overlay-animation');
        }
    }

});

/***/ }),

/***/ 54:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "row", attrs: { id: "home" } }, [
    _c("div", { staticClass: "content-wrapper" }, [
      _c("div", { staticClass: "content text-center center-md-content" }, [
        this.$parent.data.fname && this.$parent.data.lname
          ? _c("div", { staticClass: "user-name mb-3" }, [
              _c("h1", [
                _vm._v(
                  _vm._s(
                    this.$parent.data.fname + " " + this.$parent.data.lname
                  )
                )
              ])
            ])
          : _vm._e(),
        _vm._v(" "),
        _vm._m(0),
        _vm._v(" "),
        _c(
          "div",
          { staticClass: "text-center btns-wrapper" },
          [
            _c(
              "router-link",
              {
                staticClass: "d-block d-md-inline-block",
                attrs: { to: "/work/web-development" }
              },
              [
                _c(
                  "button",
                  {
                    staticClass: "btn btn-danger",
                    on: { click: _vm.fadeLoadingOverlay }
                  },
                  [_vm._v("View work")]
                )
              ]
            )
          ],
          1
        )
      ])
    ])
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "short-description mb-5" }, [
      _c("p", [
        _vm._v("A "),
        _c("b", [_vm._v("self-motivated")]),
        _vm._v(" full-stack "),
        _c("b", [_vm._v("web developer")]),
        _vm._v(" specializing in developing "),
        _c("b", [_vm._v("dynamic web applications")])
      ])
    ])
  }
]
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-63cd6604", module.exports)
  }
}

/***/ })

});