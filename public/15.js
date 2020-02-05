webpackJsonp([15],{

/***/ 70:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(1)
/* script */
var __vue_script__ = __webpack_require__(71)
/* template */
var __vue_template__ = __webpack_require__(72)
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
Component.options.__file = "resources/js/views/Blog.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-78b5237e", Component.options)
  } else {
    hotAPI.reload("data-v-78b5237e", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 71:
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
//

/* harmony default export */ __webpack_exports__["default"] = ({
    data: function data() {
        return {};
    },

    methods: {},
    mounted: function mounted() {
        this.$parent.displayTopbar();
    },

    // Fetches posts when the component is created.
    created: function created() {}
});

/***/ }),

/***/ 72:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticClass: "container page", attrs: { id: "blog" } },
    [
      _vm._m(0),
      _vm._v(" "),
      _vm._l(this.$parent.data.blog, function(post) {
        return _c(
          "div",
          {
            key: post.id,
            staticClass: "d-flex justify-content-center blog-item"
          },
          [
            _c(
              "div",
              { staticClass: "text-center", staticStyle: { width: "80%" } },
              [
                _c("h2", { staticClass: "title" }, [
                  _vm._v(_vm._s(post.title))
                ]),
                _vm._v(" "),
                _c("p", { staticClass: "created-at" }, [
                  _vm._v(_vm._s(_vm.$parent.date(post.created_at)))
                ]),
                _vm._v(" "),
                _c("img", {
                  staticClass: "img-fluid my-5",
                  attrs: {
                    src: post.image
                      ? "/storage/" + post.image
                      : "https://via.placeholder.com/500/333333/FFFFFF/?text=no%20image%20selected"
                  }
                }),
                _vm._v(" "),
                _c("p", {
                  domProps: {
                    innerHTML: _vm._s(_vm.$parent.excerpt(post.content, 150))
                  }
                }),
                _vm._v(" "),
                _c(
                  "router-link",
                  { attrs: { to: "/blog/post/" + post.slug } },
                  [_vm._v("Read more")]
                ),
                _vm._v(" "),
                _vm._m(1, true)
              ],
              1
            )
          ]
        )
      })
    ],
    2
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "page-title" }, [
      _c("h1", [_vm._v("Blog")]),
      _vm._v(" "),
      _c("hr")
    ])
  },
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
    require("vue-hot-reload-api")      .rerender("data-v-78b5237e", module.exports)
  }
}

/***/ })

});