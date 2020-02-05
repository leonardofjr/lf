webpackJsonp([14],{

/***/ 73:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(1)
/* script */
var __vue_script__ = __webpack_require__(74)
/* template */
var __vue_template__ = __webpack_require__(75)
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
Component.options.__file = "resources/js/views/BlogPost.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-5c21c2fe", Component.options)
  } else {
    hotAPI.reload("data-v-5c21c2fe", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 74:
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
        return {
            params: this.$router.currentRoute.params.id
        };
    },

    methods: {},
    mounted: function mounted() {
        console.log(this.$router.currentRoute.params.id);
        this.$parent.displayTopbar();
    },

    // Fetches posts when the component is created.
    created: function created() {}
});

/***/ }),

/***/ 75:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticClass: "container page", attrs: { id: "blog" } },
    _vm._l(this.$parent.data.blog, function(post) {
      return _c(
        "div",
        {
          key: post.id,
          staticClass: "d-flex justify-content-center blog-item"
        },
        [
          _vm.params === post.slug
            ? [
                _c(
                  "div",
                  { staticClass: "text-center", staticStyle: { width: "80%" } },
                  [
                    _c("div", { staticClass: "page-title" }, [
                      _c("h1", { staticClass: "title" }, [
                        _vm._v(_vm._s(post.title))
                      ]),
                      _vm._v(" "),
                      _c("p", { staticClass: "created-at" }, [
                        _vm._v(_vm._s(_vm.$parent.date(post.created_at)))
                      ]),
                      _vm._v(" "),
                      _c("hr")
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "content" }, [
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
                        domProps: { innerHTML: _vm._s(post.content) }
                      }),
                      _vm._v(" "),
                      _c(
                        "button",
                        {
                          staticClass: "btn btn-danger my-4",
                          on: { click: _vm.$parent.back }
                        },
                        [_vm._v("Go Back")]
                      )
                    ])
                  ]
                )
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
    require("vue-hot-reload-api")      .rerender("data-v-5c21c2fe", module.exports)
  }
}

/***/ })

});