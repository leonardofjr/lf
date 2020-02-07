webpackJsonp([8],{

/***/ 47:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(57)
/* script */
var __vue_script__ = __webpack_require__(58)
/* template */
var __vue_template__ = __webpack_require__(59)
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
Component.options.__file = "resources/js/views/App.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-91ac6b5c", Component.options)
  } else {
    hotAPI.reload("data-v-91ac6b5c", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 57:
/***/ (function(module, exports) {

/* globals __VUE_SSR_CONTEXT__ */

// IMPORTANT: Do NOT use ES2015 features in this file.
// This module is a runtime utility for cleaner component module output and will
// be included in the final webpack user bundle.

module.exports = function normalizeComponent (
  rawScriptExports,
  compiledTemplate,
  functionalTemplate,
  injectStyles,
  scopeId,
  moduleIdentifier /* server only */
) {
  var esModule
  var scriptExports = rawScriptExports = rawScriptExports || {}

  // ES6 modules interop
  var type = typeof rawScriptExports.default
  if (type === 'object' || type === 'function') {
    esModule = rawScriptExports
    scriptExports = rawScriptExports.default
  }

  // Vue.extend constructor export interop
  var options = typeof scriptExports === 'function'
    ? scriptExports.options
    : scriptExports

  // render functions
  if (compiledTemplate) {
    options.render = compiledTemplate.render
    options.staticRenderFns = compiledTemplate.staticRenderFns
    options._compiled = true
  }

  // functional template
  if (functionalTemplate) {
    options.functional = true
  }

  // scopedId
  if (scopeId) {
    options._scopeId = scopeId
  }

  var hook
  if (moduleIdentifier) { // server build
    hook = function (context) {
      // 2.3 injection
      context =
        context || // cached call
        (this.$vnode && this.$vnode.ssrContext) || // stateful
        (this.parent && this.parent.$vnode && this.parent.$vnode.ssrContext) // functional
      // 2.2 with runInNewContext: true
      if (!context && typeof __VUE_SSR_CONTEXT__ !== 'undefined') {
        context = __VUE_SSR_CONTEXT__
      }
      // inject component styles
      if (injectStyles) {
        injectStyles.call(this, context)
      }
      // register component module identifier for async chunk inferrence
      if (context && context._registeredComponents) {
        context._registeredComponents.add(moduleIdentifier)
      }
    }
    // used by ssr in case component is cached and beforeCreate
    // never gets called
    options._ssrRegister = hook
  } else if (injectStyles) {
    hook = injectStyles
  }

  if (hook) {
    var functional = options.functional
    var existing = functional
      ? options.render
      : options.beforeCreate

    if (!functional) {
      // inject component registration as beforeCreate hook
      options.beforeCreate = existing
        ? [].concat(existing, hook)
        : [hook]
    } else {
      // for template-only hot-reload because in that case the render fn doesn't
      // go through the normalizer
      options._injectStyles = hook
      // register for functioal component in vue file
      options.render = function renderWithStyleInjection (h, context) {
        hook.call(context)
        return existing(h, context)
      }
    }
  }

  return {
    esModule: esModule,
    exports: scriptExports,
    options: options
  }
}


/***/ }),

/***/ 58:
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
    name: 'App',
    data: function data() {
        return {
            data: [],
            csrf: $('meta[name="csrf-token"]').attr('content'),
            user: false
        };
    },
    mounted: function mounted() {
        var _this = this;

        this.loadNavigationEvents();

        axios({
            method: 'get',
            url: this.web_url + 'api/user'
        }).then(function (response) {
            if (!response.data['logged_in']) {
                _this.data = response.data;
                _this.user = false;
            } else {
                _this.data = response.data;
                _this.user = true;
            }
            // JSON responses are automatically parsed.
        }).catch(function (e) {
            _this.errors.push(e);
        });
    },
    updated: function updated() {
        window.scrollTo(0, 0);
    },

    methods: {
        displayTopbar: function displayTopbar() {
            $('#top-bar').removeClass('d-none');
        },
        back: function back() {
            this.$router.go(-1);
        },
        excerpt: function excerpt(input, length) {
            var output = void 0;
            output = input.substring(0, length);
            return output + '...';
        },
        date: function date(input) {
            var date = new Date(input);
            var month = new Array();
            month = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

            return month[date.getMonth()] + ' ' + date.getDate() + ',' + date.getFullYear();
            // output example: January 1, 2050
        },
        loadNavigationEvents: function loadNavigationEvents() {
            $(document).ready(function () {
                if ($(window).width() > 800) {
                    $('#content').addClass('frontend-lg');
                }
                $(window).resize(function (e) {
                    // If the window.width is greater than 800 then the following if statement will be executed.
                    if ($(window).width() > 800) {
                        $('#content').addClass('frontend-lg');
                    } else {
                        $('#content').removeClass('frontend-lg');
                    }
                });
            });
        },
        toggleNav: function toggleNav() {
            if (!$('.navbar-toggler').hasClass('toggle-on')) {
                // The following function will be excuted
                this.slideInNavigation();
                //The function bellow will only be called if #content contains the .frontend-lg class.
                if ($('#content').hasClass('frontend-lg')) {
                    this.slideInContent();
                }
            } else {

                // The following function will be excuted
                this.slideOutNavigation();
                //The function bellow will only be called if #content contains the .frontend-lg class.
                if ($('#content').hasClass('frontend-lg')) {
                    this.slideOutContent();
                }
            }
        },
        slideInNavigation: function slideInNavigation() {
            $('.navbar-toggler').addClass('toggle-on');
            // The following classes applied by the slideOutElements() function will be removed.
            $('aside').removeClass('slide-in-navigation slide-out-navigation show');
            $('#content').removeClass('slide-in-content slide-out-content show');
            $('aside').addClass('slide-in-navigation show');
        },
        slideOutNavigation: function slideOutNavigation() {
            $('.navbar-toggler').removeClass('toggle-on');
            // The following classes applied by the slideInElements() function will be removed.
            $('aside').removeClass('slide-in-navigation show');
            $('#content').removeClass('slide-in-content show');
            $('aside').addClass('slide-out-navigation');
        },
        slideInContent: function slideInContent() {
            $('#content').addClass('slide-in-content show');
        },
        slideOutContent: function slideOutContent() {
            $('#content').addClass('slide-out-content');
        },
        resetNavigation: function resetNavigation() {
            if ($('aside').hasClass('show')) {
                // The following classes applied by the slideInElements() function will be removed.
                $('aside').removeClass('slide-in-navigation show');
                $('#content').removeClass('slide-in-content show');
                // The following function will be excuted
                this.slideOutNavigation();
                //The function bellow will only be called if #content contains the .frontend-lg class.
                if ($('#content').hasClass('frontend-lg')) {
                    this.slideOutContent();
                }
            }
        }
    }
});

/***/ }),

/***/ 59:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("main", [
    _c("div", { staticClass: "d-md-none", attrs: { id: "phone-btn" } }, [
      _c("a", { attrs: { href: "tel://" + _vm.data.phone } }, [
        _c("img", { attrs: { src: "imgs/phone-icon.png" } })
      ])
    ]),
    _vm._v(" "),
    _c(
      "div",
      {
        staticClass: "navbar navbar-light fixed-top d-none",
        attrs: { id: "top-bar" }
      },
      [
        _c(
          "button",
          {
            staticClass: "navbar-toggler",
            attrs: {
              type: "button",
              "data-toggle": "collapse",
              "data-target": "#navbarSupportedContent",
              "aria-controls": "navbarSupportedContent",
              "aria-expanded": "false",
              "aria-label": "Toggle navigation"
            },
            on: {
              click: function($event) {
                _vm.toggleNav($event)
              }
            }
          },
          [_c("span", { staticClass: "navbar-toggler-icon" })]
        ),
        _vm._v(" "),
        _c(
          "div",
          { staticClass: "dropdown" },
          [
            !_vm.user
              ? void 0
              : [
                  _c(
                    "a",
                    {
                      staticClass: "nav-link dropdown-toggle",
                      attrs: {
                        id: "navbarDropdown",
                        href: "#",
                        role: "button",
                        "data-toggle": "dropdown",
                        "aria-haspopup": "true",
                        "aria-expanded": "false"
                      }
                    },
                    [
                      _vm._v(
                        "\n                                " +
                          _vm._s(_vm.data["fname"])
                      ),
                      _c("span", { staticClass: "caret" })
                    ]
                  ),
                  _vm._v(" "),
                  _c(
                    "div",
                    {
                      staticClass: "dropdown-menu dropdown-menu-right",
                      attrs: { "aria-labelledby": "navbarDropdown" }
                    },
                    [
                      _c(
                        "a",
                        {
                          staticClass: "dropdown-item",
                          attrs: { href: "/admin/profile" }
                        },
                        [
                          _vm._v(
                            "\n                                    Settings\n                                "
                          )
                        ]
                      ),
                      _vm._v(" "),
                      _c(
                        "a",
                        {
                          staticClass: "dropdown-item",
                          attrs: {
                            href: "/logout",
                            onclick:
                              "event.preventDefault();\n                                                document.getElementById('logout-form').submit();"
                          }
                        },
                        [
                          _vm._v(
                            "\n                                    Logout\n                                "
                          )
                        ]
                      ),
                      _vm._v(" "),
                      _c(
                        "form",
                        {
                          staticStyle: { display: "none" },
                          attrs: {
                            id: "logout-form",
                            action: "/logout",
                            method: "POST"
                          }
                        },
                        [
                          _c("input", {
                            attrs: { type: "hidden", name: "_token" },
                            domProps: { value: _vm.csrf }
                          })
                        ]
                      )
                    ]
                  )
                ]
          ],
          2
        )
      ]
    ),
    _vm._v(" "),
    _c("aside", { staticClass: "lf-white-bg", attrs: { id: "sidebar" } }, [
      _c("div", { staticClass: "aside-inner" }, [
        _c("div", { staticClass: "user" }, [
          _c(
            "div",
            { staticClass: "user-avatar d-flex justify-content-center" },
            [
              _c(
                "router-link",
                {
                  staticClass: "navbar-brand",
                  attrs: { to: "/", exact: "" },
                  nativeOn: {
                    click: function($event) {
                      _vm.resetNavigation()
                    }
                  }
                },
                [
                  this.data.profile_image
                    ? _c("img", {
                        staticClass: "avatar img-fluid rounded-circle mt-4",
                        attrs: {
                          src: "/storage/" + this.data.profile_image,
                          alt: ""
                        }
                      })
                    : _c("img", {
                        staticClass: "avatar img-fluid rounded-circle",
                        attrs: { src: "/imgs/logo.png", alt: "" }
                      })
                ]
              )
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "div",
            { staticClass: "user-name d-flex justify-content-center" },
            [
              _c(
                "router-link",
                {
                  staticClass: "navbar-brand text-uppercase",
                  attrs: { to: "/", exact: "" },
                  nativeOn: {
                    click: function($event) {
                      _vm.resetNavigation()
                    }
                  }
                },
                [
                  _vm._v(
                    _vm._s(_vm.data["fname"]) + " " + _vm._s(_vm.data["lname"])
                  )
                ]
              )
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "div",
            { staticClass: "user-title" },
            [
              _c(
                "router-link",
                {
                  attrs: { to: "/" },
                  nativeOn: {
                    click: function($event) {
                      _vm.resetNavigation()
                    }
                  }
                },
                [
                  _c("h2", { staticClass: "user-title-style " }, [
                    _vm._v("Web Developer")
                  ])
                ]
              )
            ],
            1
          )
        ]),
        _vm._v(" "),
        _c("nav", { staticClass: "navbar  my-3 " }, [
          _c("div", { staticClass: "primary-menu" }, [
            _c(
              "div",
              [
                _c(
                  "router-link",
                  {
                    staticClass: "nav-item nav-link",
                    attrs: { to: "/work/web-development" },
                    nativeOn: {
                      click: function($event) {
                        _vm.resetNavigation()
                      }
                    }
                  },
                  [_vm._v("Work")]
                ),
                _vm._v(" "),
                _c(
                  "div",
                  { staticClass: "ml-3" },
                  [
                    _c(
                      "router-link",
                      {
                        staticClass: "nav-item nav-link",
                        attrs: { to: "/work/web-development/", exact: "" },
                        nativeOn: {
                          click: function($event) {
                            _vm.resetNavigation()
                          }
                        }
                      },
                      [_vm._v("Web Development")]
                    ),
                    _vm._v(" "),
                    _c(
                      "router-link",
                      {
                        staticClass: "nav-item nav-link",
                        attrs: { to: "/work/logo-design/", exact: "" },
                        nativeOn: {
                          click: function($event) {
                            _vm.resetNavigation()
                          }
                        }
                      },
                      [_vm._v("Logo Design")]
                    ),
                    _vm._v(" "),
                    _c(
                      "router-link",
                      {
                        staticClass: "nav-item nav-link",
                        attrs: { to: "/work/graphic-design/", exact: "" },
                        nativeOn: {
                          click: function($event) {
                            _vm.resetNavigation()
                          }
                        }
                      },
                      [_vm._v("Graphic Design")]
                    )
                  ],
                  1
                )
              ],
              1
            ),
            _vm._v(" "),
            _c(
              "div",
              { staticClass: "mt-3" },
              [
                _c(
                  "router-link",
                  {
                    staticClass: "nav-item nav-link",
                    attrs: { to: "/blog" },
                    nativeOn: {
                      click: function($event) {
                        _vm.resetNavigation()
                      }
                    }
                  },
                  [_vm._v("Blog")]
                ),
                _vm._v(" "),
                _c(
                  "router-link",
                  {
                    staticClass: "nav-item nav-link",
                    attrs: { to: "/about", exact: "" },
                    nativeOn: {
                      click: function($event) {
                        _vm.resetNavigation()
                      }
                    }
                  },
                  [_vm._v("About")]
                ),
                _vm._v(" "),
                _c(
                  "router-link",
                  {
                    staticClass: "nav-item nav-link",
                    attrs: { to: "/contact" },
                    nativeOn: {
                      click: function($event) {
                        _vm.resetNavigation()
                      }
                    }
                  },
                  [_vm._v("Let's Talk")]
                )
              ],
              1
            )
          ])
        ]),
        _vm._v(" "),
        _c(
          "div",
          { staticClass: "block-social d-flex justify-content-center" },
          [
            _c("div", {}, [
              _vm.data.email
                ? _c("span", { staticClass: "px-1" }, [
                    _c("a", { attrs: { href: "mailto:" + _vm.data.email } }, [
                      _c("i", { staticClass: "fas fa-2x fa-envelope" })
                    ])
                  ])
                : _vm._e(),
              _vm._v(" "),
              _vm.data.twitter_url
                ? _c("span", { staticClass: "px-1" }, [
                    _c("a", { attrs: { href: _vm.data.twitter_url } }, [
                      _c("i", { staticClass: "fab fa-2x fa-twitter" })
                    ])
                  ])
                : _vm._e(),
              _vm._v(" "),
              _vm.data.linkedin_url
                ? _c("span", { staticClass: "px-1" }, [
                    _c(
                      "a",
                      {
                        staticClass: "px-1",
                        attrs: { href: _vm.data.linkedin_url }
                      },
                      [_c("i", { staticClass: "fab fa-2x fa-linkedin-in" })]
                    )
                  ])
                : _vm._e(),
              _vm._v(" "),
              _vm.data.facebook_url
                ? _c("span", { staticClass: "px-1" }, [
                    _c("a", { attrs: { href: _vm.data.facebook_url } }, [
                      _c("i", { staticClass: "fab fa-2x fa-facebook" })
                    ])
                  ])
                : _vm._e(),
              _vm._v(" "),
              _vm.data.github_url
                ? _c("span", { staticClass: "px-1" }, [
                    _c("a", { attrs: { href: _vm.data.github_url } }, [
                      _c("i", { staticClass: "fab fa-2x fa-github" })
                    ])
                  ])
                : _vm._e()
            ])
          ]
        )
      ])
    ]),
    _vm._v(" "),
    _c(
      "section",
      {
        staticClass: "container-fluid",
        staticStyle: { position: "absolute" },
        attrs: { id: "content" },
        on: {
          click: function($event) {
            _vm.resetNavigation()
          }
        }
      },
      [
        _c(
          "transition",
          { attrs: { name: "fade", mode: "out-in" } },
          [_c("router-view")],
          1
        )
      ],
      1
    )
  ])
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-91ac6b5c", module.exports)
  }
}

/***/ })

});