webpackJsonp([9],{

/***/ 67:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(1)
/* script */
var __vue_script__ = __webpack_require__(68)
/* template */
var __vue_template__ = __webpack_require__(69)
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
Component.options.__file = "resources/js/views/GraphicDesign.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-405ffd37", Component.options)
  } else {
    hotAPI.reload("data-v-405ffd37", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 68:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_axios__ = __webpack_require__(3);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_axios___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_axios__);
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


    methods: {
        getPostBody: function getPostBody(post) {
            this.body = this.stripTags(post);

            return this.body.length > 50 ? this.body.substring(0, 50) + '...' : this.body;
        },
        stripTags: function stripTags(text) {
            return text.replace(/(<([^>]+)>)/ig, '');
        }
    },

    // Fetches posts when the component is created.
    mounted: function mounted() {
        this.$parent.$parent.displayTopbar();
    }
});

/***/ }),

/***/ 69:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticClass: "container page", attrs: { id: "graphic_design" } },
    _vm._l(this.$parent.$parent.data.portfolio, function(post) {
      return _c(
        "div",
        { key: post.id, staticClass: "row portfolio-item" },
        [
          post.type === "graphic_design"
            ? [
                _c("div", { staticClass: "col-12 col-md-4" }, [
                  _c("img", {
                    staticClass: "img-fluid",
                    attrs: {
                      src: post.image
                        ? "/storage/" + post.image
                        : "https://via.placeholder.com/500/333333/FFFFFF/?text=no%20image%20selected"
                    }
                  })
                ])
              ]
            : _vm._e()
        ],
        2
      )
    })
  )
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-405ffd37", module.exports)
  }
}

/***/ })

});