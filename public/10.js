webpackJsonp([10],{

/***/ 76:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(1)
/* script */
var __vue_script__ = __webpack_require__(77)
/* template */
var __vue_template__ = __webpack_require__(78)
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
Component.options.__file = "resources/js/views/Contact.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-1d91a851", Component.options)
  } else {
    hotAPI.reload("data-v-1d91a851", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 77:
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
            errors: []
        };
    },
    mounted: function mounted() {
        this.$parent.displayTopbar();
    },

    methods: {
        sendMessage: function sendMessage() {
            var _this = this;

            axios({
                url: this.web_url + '/api/mail',
                method: 'post',
                headers: {
                    'X-CSRF-TOKEN': this.$parent.csrf
                },
                data: {
                    name: $('input[name="name"]').val(),
                    email: $('input[name="email"]').val(),
                    message: $('textarea[name="message"]').val()
                }
            }).then(function (response) {
                if (response.data.status === 'errors') {
                    console.error(response.data.message);
                    _this.validate('input[name="name"]', response.data.errors.name);
                    _this.validate('input[name="email"]', response.data.errors.email);
                    _this.validate('textarea[name="message"]', response.data.errors.message);
                } else {
                    $('*').removeClass('is-invalid');
                    $('.btn-submit').attr('disabled', true);
                    $('.alert-success').removeClass('d-none');
                }
            }).catch(function (error) {
                return error;
            });
        },
        validate: function validate(ele, err) {
            if (err) {
                $(ele).addClass('is-invalid');
                $(ele).siblings('span').children('strong').text(err[0]);
            } else {
                $(ele).removeClass('is-invalid');
            }
        }
    }

});

/***/ }),

/***/ 78:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticClass: "container page", attrs: { id: "contact" } },
    [
      _vm._m(0),
      _vm._v(" "),
      _c("div", { staticClass: "row" }, [
        _c("div", { staticClass: "col-md-8 mb-5 mb-md-0 " }, [
          _c("p", { staticClass: "my-3" }, [
            _vm._v(
              "Please don't hesitate to contact me if you have any questions, comments or mesages. I'll try to response to."
            )
          ]),
          _vm._v(" "),
          _vm._m(1),
          _vm._v(" "),
          _vm._m(2),
          _vm._v(" "),
          _vm._m(3),
          _vm._v(" "),
          _c("div", { staticClass: "form-group text-right " }, [
            _c(
              "button",
              {
                staticClass: "btn btn-primary btn-danger btn-submit",
                on: { click: _vm.sendMessage }
              },
              [_vm._v("Send")]
            )
          ]),
          _vm._v(" "),
          _vm._m(4)
        ]),
        _vm._v(" "),
        _c(
          "div",
          { staticClass: "col-md-4 pl-5" },
          [
            _c("h4", [_vm._v("Contact information")]),
            _vm._v(" "),
            this.$parent.data.phone &&
            this.$parent.data.city &&
            this.$parent.data.province
              ? [
                  _c("dl", { staticClass: "dl dl-vertical mb-5" }, [
                    _c("div", {}, [
                      _c("dt", [_vm._v("Phone")]),
                      _vm._v(" "),
                      _c("dd", [
                        _c(
                          "a",
                          { attrs: { href: "tel:" + this.$parent.data.phone } },
                          [_vm._v(_vm._s(this.$parent.data.phone))]
                        )
                      ])
                    ]),
                    _vm._v(" "),
                    _c("div", {}, [
                      _c("dt", [_vm._v("Email")]),
                      _vm._v(" "),
                      _c("dd", [
                        _c(
                          "a",
                          {
                            attrs: { href: "mailto:" + this.$parent.data.email }
                          },
                          [_vm._v(_vm._s(this.$parent.data.email))]
                        )
                      ])
                    ]),
                    _vm._v(" "),
                    _c("div", {}, [
                      _c("dt", [_vm._v("Address")]),
                      _vm._v(" "),
                      _c("dd", [
                        _vm._v(
                          _vm._s(this.$parent.data.city) +
                            ", " +
                            _vm._s(this.$parent.data.province)
                        )
                      ])
                    ]),
                    _vm._v(" "),
                    _vm._m(5)
                  ])
                ]
              : _vm._e(),
            _vm._v(" "),
            _c("div", { staticClass: "mb-5" }, [
              _c("h4", [_vm._v("Networks")]),
              _vm._v(" "),
              this.$parent.data.twitter_url
                ? _c("span", { staticClass: "px-1" }, [
                    _c(
                      "a",
                      { attrs: { href: this.$parent.data.twitter_url } },
                      [_c("i", { staticClass: "fab fa-2x fa-twitter mr-3" })]
                    )
                  ])
                : _vm._e(),
              _vm._v(" "),
              this.$parent.data.linkedin_url
                ? _c("span", { staticClass: "px-1" }, [
                    _c(
                      "a",
                      { attrs: { href: this.$parent.data.linkedin_url } },
                      [
                        _c("i", {
                          staticClass: "fab fa-2x fa-linkedin-in mr-3"
                        })
                      ]
                    )
                  ])
                : _vm._e(),
              _vm._v(" "),
              this.$parent.data.facebook_url
                ? _c("span", { staticClass: "px-1" }, [
                    _c(
                      "a",
                      { attrs: { href: this.$parent.data.facebook_url } },
                      [_c("i", { staticClass: "fab fa-2x fa-facebook mr-3" })]
                    )
                  ])
                : _vm._e(),
              _vm._v(" "),
              this.$parent.data.github_url
                ? _c("span", { staticClass: "px-1" }, [
                    _c("a", { attrs: { href: this.$parent.data.github_url } }, [
                      _c("i", { staticClass: "fab fa-2x fa-github mr-3" })
                    ])
                  ])
                : _vm._e()
            ]),
            _vm._v(" "),
            _vm._m(6)
          ],
          2
        )
      ])
    ]
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "page-title" }, [
      _c("h1", [_vm._v("Contact Form")]),
      _vm._v(" "),
      _c("hr")
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "form-group" }, [
      _c("input", {
        staticClass: "form-control",
        attrs: { type: "text", name: "name", placeholder: "Your Name" }
      }),
      _vm._v(" "),
      _c(
        "span",
        { staticClass: "invalid-feedback", attrs: { role: "alert" } },
        [_c("strong", { staticClass: "error-name" })]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "form-group" }, [
      _c("input", {
        staticClass: "form-control",
        attrs: { type: "email", name: "email", placeholder: "Email" }
      }),
      _vm._v(" "),
      _c(
        "span",
        { staticClass: "invalid-feedback", attrs: { role: "alert" } },
        [_c("strong", { staticClass: "error-email" })]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "form-group" }, [
      _c("textarea", {
        staticClass: "form-control",
        attrs: {
          rows: "10",
          type: "text",
          id: "message",
          name: "message",
          placeholder: "Message"
        }
      }),
      _vm._v(" "),
      _c(
        "span",
        { staticClass: "invalid-feedback", attrs: { role: "alert" } },
        [_c("strong", { staticClass: "error-message" })]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticClass: "alert alert-success pt-3 d-none",
        attrs: { role: "alert" }
      },
      [_c("strong", [_vm._v("Your message has been sent.")])]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", {}, [
      _c("dt", [_vm._v("vCard")]),
      _vm._v(" "),
      _c("dd", [
        _c("a", { attrs: { href: "/LeoFelipa.vcf" } }, [_vm._v("Download")])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "d-none" }, [
      _c("h4", [_vm._v("Quick links")])
    ])
  }
]
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-1d91a851", module.exports)
  }
}

/***/ })

});