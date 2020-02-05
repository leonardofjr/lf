webpackJsonp([3],{

/***/ 58:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(1)
/* script */
var __vue_script__ = __webpack_require__(59)
/* template */
var __vue_template__ = __webpack_require__(60)
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
Component.options.__file = "resources/js/views/Work.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-25b093a0", Component.options)
  } else {
    hotAPI.reload("data-v-25b093a0", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 59:
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

/* harmony default export */ __webpack_exports__["default"] = ({
    data: function data() {
        return {};
    },
    mounted: function mounted() {
        this.$parent.displayTopbar();
    },

    // Fetches posts when the component is created.
    created: function created() {}
});

/***/ }),

/***/ 60:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "section",
    { staticClass: "container page", attrs: { id: "work" } },
    [
      _c("div", { staticClass: "page-title" }, [
        _c("h1", [_vm._v("Work")]),
        _vm._v(" "),
        _c(
          "div",
          { staticClass: "nav justify-content-end" },
          [
            _c(
              "router-link",
              {
                staticClass: "nav-item nav-link",
                attrs: { to: "/work/web-development/", exact: "" }
              },
              [_vm._v("Web Development")]
            ),
            _vm._v(" "),
            _c(
              "router-link",
              {
                staticClass: "nav-item nav-link",
                attrs: { to: "/work/logo-design/", exact: "" }
              },
              [_vm._v("Logo Design")]
            ),
            _vm._v(" "),
            _c(
              "router-link",
              {
                staticClass: "nav-item nav-link",
                attrs: { to: "/work/graphic-design/", exact: "" }
              },
              [_vm._v("Graphic Design")]
            )
          ],
          1
        ),
        _vm._v(" "),
        _c("hr")
      ]),
      _vm._v(" "),
      _c(
        "transition",
        { attrs: { name: "fade", mode: "out-in" } },
        [_c("router-view")],
        1
      )
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-25b093a0", module.exports)
  }
}

/***/ })

});