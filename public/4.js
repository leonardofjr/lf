webpackJsonp([4],{

/***/ 61:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(1)
/* script */
var __vue_script__ = __webpack_require__(62)
/* template */
var __vue_template__ = __webpack_require__(63)
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
Component.options.__file = "resources/js/views/WebDevelopment.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-3da964a6", Component.options)
  } else {
    hotAPI.reload("data-v-3da964a6", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 62:
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

/***/ 63:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticClass: "container page", attrs: { id: "web_development" } },
    _vm._l(this.$parent.$parent.data.portfolio, function(post) {
      return _c(
        "div",
        { key: post.id },
        [
          post.type === "web_development"
            ? [
                _c(
                  "div",
                  { staticClass: "row portfolio-item flex align-items-center" },
                  [
                    _c("div", { staticClass: "col-12 col-md-7" }, [
                      _c("img", {
                        staticClass: "img-fluid mb-5 mb-md-0",
                        attrs: {
                          src: post.image
                            ? "/storage/" + post.image
                            : "https://via.placeholder.com/500/333333/FFFFFF/?text=no%20image%20selected"
                        }
                      })
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "col-12 col-md-5" }, [
                      _c("h2", { staticClass: "project-title h3" }, [
                        _c("a", { attrs: { href: post.website_url } }, [
                          _vm._v(_vm._s(post.title))
                        ])
                      ]),
                      _vm._v(" "),
                      _c("p", {
                        domProps: { innerHTML: _vm._s(post.description) }
                      })
                    ])
                  ]
                ),
                _vm._v(" "),
                _vm._m(0, true)
              ]
            : _vm._e()
        ],
        2
      )
    })
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "my-5" }, [_c("hr")])
  }
]
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-3da964a6", module.exports)
  }
}

/***/ })

});