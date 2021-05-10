!function (modules) {
  var installedModules = {};

  function __webpack_require__(moduleId) {
    if (installedModules[moduleId]) return installedModules[moduleId].exports;
    var module = installedModules[moduleId] = {i: moduleId, l: !1, exports: {}};
    return modules[moduleId].call(module.exports, module, module.exports, __webpack_require__), module.l = !0, module.exports
  }

  __webpack_require__.m = modules, __webpack_require__.c = installedModules, __webpack_require__.d = function (exports, name, getter) {
    __webpack_require__.o(exports, name) || Object.defineProperty(exports, name, {enumerable: !0, get: getter})
  }, __webpack_require__.r = function (exports) {
    "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(exports, Symbol.toStringTag, {value: "Module"}), Object.defineProperty(exports, "__esModule", {value: !0})
  }, __webpack_require__.t = function (value, mode) {
    if (1 & mode && (value = __webpack_require__(value)), 8 & mode) return value;
    if (4 & mode && "object" == typeof value && value && value.__esModule) return value;
    var ns = Object.create(null);
    if (__webpack_require__.r(ns), Object.defineProperty(ns, "default", {
      enumerable: !0,
      value: value
    }), 2 & mode && "string" != typeof value) for (var key in value) __webpack_require__.d(ns, key, function (key) {
      return value[key]
    }.bind(null, key));
    return ns
  }, __webpack_require__.n = function (module) {
    var getter = module && module.__esModule ? function getDefault() {
      return module.default
    } : function getModuleExports() {
      return module
    };
    return __webpack_require__.d(getter, "a", getter), getter
  }, __webpack_require__.o = function (object, property) {
    return Object.prototype.hasOwnProperty.call(object, property)
  }, __webpack_require__.p = "", __webpack_require__(__webpack_require__.s = 1)
}([function (module, exports) {
  module.exports.blackFriday = function blackFriday() {
    return {restrict: "E", templateUrl: "LP/partials/blackFriday.html"}
  }, module.exports.newYear = function newYear() {
    return {restrict: "E", templateUrl: "LP/partials/newYear.html"}
  }, module.exports.stayHome = function stayHome() {
    return {restrict: "E", templateUrl: "LP/partials/stayHome.html"}
  }, module.exports.script = function script() {
    return {
      restrict: "E", scope: !1, link: function (scope, elem, attr) {
        if ("text/javascript-lazy" === attr.type) {
          var s = document.createElement("script");
          s.type = "text/javascript";
          var src = elem.attr("src");
          if (void 0 !== src) s.src = src; else {
            var code = elem.text();
            s.text = code
          }
          document.head.appendChild(s), elem.remove()
        }
      }
    }
  }
}, function (module, exports, __webpack_require__) {
  angular.module("IQTestLP", ["ngResource", "ngCookies", "ngSanitize"]), __webpack_require__(2), __webpack_require__(4), __webpack_require__(5), __webpack_require__(8);
  var Fingerprint2 = __webpack_require__(9);
  window.Fingerprint2 = Fingerprint2
}, function (module, exports, __webpack_require__) {
  "use strict";
  var welcomeController = __webpack_require__(3);
  angular.module("IQTestLP").controller("welcomeController", welcomeController)
}, function (module, exports) {
  function welcomeController($scope, $location, $window, $http, httpService, commonFunctions, $filter, $timeout, $compile, $resource, $rootScope, $cookies) {
    confirmOnExit = !0, $scope.form = {}, $scope.productId = 2;
    var emailParam = commonFunctions.urlParam("email");
    null != emailParam && ($scope.form.email = emailParam), $scope.btheme = void 0, $scope.enableWatchHd = !1, $scope.data = "", $scope.deviceFingerprint, window.document.title = location.hostname.substring(4, location.hostname.length), $scope.CSS = commonFunctions.urlParam("theme"), $scope.AFF = commonFunctions.urlParam("aff"), $scope.LPLINK = commonFunctions.urlParam("lplink") ? commonFunctions.urlParam("lplink") + window.location.search : void 0, $scope.CLICKID = commonFunctions.urlParam("clickid"), $scope.MAIL = commonFunctions.urlParam("user"), $scope.PUB = commonFunctions.urlParam("pub"), $scope.SUB_PUB_ID = commonFunctions.urlParam("sub_pub_id"), $scope.BG_CLASS = commonFunctions.urlParam("bg") ? commonFunctions.urlParam("bg") : "", $scope.UTMSOURCE = commonFunctions.urlParam("utm_source"), $scope.GCLID = commonFunctions.urlParam("gclid"), $scope.FBID = commonFunctions.urlParam("fbid"), $scope.NAME = commonFunctions.urlParam("name"), $scope.checkByIpResult = JSON.parse($cookies.get("checkByIp")), $scope.COUNTRY = $scope.checkByIpResult.countryId, $scope.COUNTRY_CODE = $scope.checkByIpResult.countryCode, $scope.COUNTRY_NAME = $scope.checkByIpResult.countryName, $scope.LANG = commonFunctions.urlParam("language"), $scope.HASH = commonFunctions.urlParam("hash"), $scope.LANG || ($scope.LANG = $scope.checkByIpResult.languageDsc), $scope.GCLID && ($scope.CLICKID = $scope.GCLID), ($scope.UTMSOURCE || "5020" == $scope.AFF || "4225" == $scope.AFF) && ($scope.UTMSOURCE || ($scope.UTMSOURCE = ""), $scope.CLICKID = Math.ceil(1e17 * Math.random()), confirmOnExit = !1), $scope.window = window, $scope.initPrelander = function (lplink, defaultTheme) {
      confirmOnExit = !1, null != $scope.LPLINK || null == defaultTheme || null == defaultTheme || "" == defaultTheme || null != lplink && "" != lplink && null != lplink ? $scope.initLPlink(lplink) : $scope.setRedirectLinkforLPwithoutLplink(defaultTheme)
    }, $scope.initLPlink = function (link) {
      void 0 === $scope.LPLINK && ($scope.LPLINK = link + window.location.search), $scope.prelanderRedirectLink = "https://www.24t7.me/ln/" + $scope.LPLINK
    }, $scope.setRedirectLinkforLPwithoutLplink = function (defaultTheme) {
      $scope.prelanderRedirectLink = window.location.protocol + "//" + window.location.hostname + ":" + window.location.port + window.location.pathname + "?theme=" + defaultTheme + "&" + window.location.search.substring(1)
    }, $scope.loadFavIcon = function (fileName) {
      document.querySelector("link[rel*='icon']").href = fileName
    }, $scope.currentLanding = "LP/" + $scope.CSS + "/content.html", $scope.createAccountDialog = "LP/" + $scope.CSS + "/createAccountDialog.html", $scope.loadFavIcon("LP/" + $scope.CSS + "/images/favicon.ico"), $((function () {
      $(window).on("beforeunload", (function () {
        if (confirmOnExit) return "Are you sure you want to leave MY page?"
      }))
    })), $scope.getUserCountryName = function () {
      return $scope.COUNTRY_NAME
    }, $scope.Stub = $resource("./LP/" + $scope.CSS + "/translate/:filename", {}, {
      getText: {
        transformResponse: function (data, headersGetter, status) {
          return {content: data}
        }
      }
    }), $scope.getTranslation = function () {
      $scope.Stub.getText({filename: "translate_" + $scope.LANG + ".js"}, (function (response) {
        $scope.data = eval("({" + response.content + "})").content
      }), (function (error) {
        $scope.Stub.getText({filename: "translate_EN.js"}, (function (response) {
          "" == $scope.data && ($scope.data = eval("({" + response.content + "})").content)
        }))
      }))
    }, $scope.getTranslation(), $scope.openCreateAccountDialog = function () {
      var dialog = $("#CreateAccount")[0], mask = $("#mask")[0];
      dialog.style.display = "table", setTimeout((function () {
        dialog.style.opacity = "1"
      }), 100), mask.style.display = "block", $("#email")[0].focus()
    }, $scope.initCreateAccountTimer = function () {
      setTimeout((function () {
        $scope.openCreateAccountDialog()
      }), 4e3)
    }, $scope.openEmbeddedUrl = function (externalBillingUrl) {
      confirmOnExit = !1, document.getElementById("mask").style = "display: block";
      var parent = document.getElementById("parentExternalBillingUrl"), emb = document.createElement("embed");
      emb.onload = function () {
        parent.style = "opacity: 1; display: block;"
      }, emb.src = externalBillingUrl, parent.append(emb), parent.style = "opacity: 0; display: block;"
    }, $scope.CreateAccountValidation = function (form) {
      var email, psw, mask = $("#maskLoader")[0];
      mask.style.display = "block", null != form && (email = form.email, psw = form.psw);
      var okEmail = !1, okPsw = !1;
      $scope.pwsError = "", $scope.mailError = "", void 0 === email || "" == email ? ($scope.mailError = "Please enter an email", $scope.wrongMail = !0) : commonFunctions.validEmail(email) ? (okEmail = !0, $scope.wrongMail = !1) : ($scope.mailError += " Please enter a valid email", $scope.wrongMail = !0), void 0 === psw || "" == psw ? ($scope.pwsError = "Please enter a password", $scope.wrongPassword = !0) : commonFunctions.validPassword(psw) ? (okPsw = !0, $scope.wrongPassword = !1) : ($scope.pwsError = " Please type a valid password", $scope.wrongPassword = !0), okEmail && okPsw ? ($scope.pwsError = "", $scope.mailError = "", $scope.MAIL = email, data = {
        userEmail: email,
        userPassword: psw,
        userPasswordConfirm: psw,
        affiliate: $scope.AFF,
        country: $scope.COUNTRY,
        clickId: $scope.CLICKID,
        theme: $scope.CSS,
        pub: $scope.PUB,
        subPub: $scope.SUB_PUB_ID,
        selectedPrize: $scope.selectedPrize,
        deviceFingerprint: $scope.deviceFingerprint,
        fbid: $scope.FBID,
        productId: $scope.productId,
        hash: $scope.HASH
      }, $scope.tracking(1), httpService.registerUser(data).then((function (response) {
        15 == response.data.status ? ($scope.registrationResponse = response, $scope.MAIL = email, $scope.transactionNum = response.data.transactionNum, PSW = psw, "undefined" != typeof Storage && (localStorage.setItem("MAIL", $scope.MAIL), localStorage.setItem("CLICKID", $scope.CLICKID), localStorage.setItem("PSW", PSW)), $scope.tracking(2), $scope.suspendRedirect || $scope.redirectToPage()) : (alert(response.data.message), $rootScope.$broadcast("details-no-correct", {status: response.data.status}), mask.style.display = "none", 61 == response.data.status || 62 == response.data.status ? (email.value = "", email.readOnly = !0) : $scope.tracking(3))
      }), (function (error) {
        alert(response.data.message), mask.style.display = "none"
      }))) : mask.style.display = "none"
    }, $scope.redirectToPage = function () {
      null != $scope.btheme && "US" != $scope.COUNTRY_CODE ? $scope.injectEmbedVerificiationPage($scope.registrationResponse.data.transactionNum, $scope.registrationResponse.data.billingDomain) : $scope.openVerificationPage($scope.registrationResponse.data.transactionNum, $scope.registrationResponse.data.billingDomain, $scope.registrationResponse.data.externalBillingUrl)
    }, $scope.injectEmbedVerificiationPage = function (transactionNum, billingDomain) {
      var url;
      confirmOnExit = !1;
      var urlParams = "?trid=" + transactionNum + "&language=" + $scope.LANG + "&btheme=" + $scope.btheme;
      null !== $scope.NAME && void 0 !== $scope.NAME && (urlParams = urlParams + "&name=" + $scope.NAME), url = "127.0.0.1" == location.hostname || "test.clixscale.com" == location.hostname ? "/BillingServer/index.html" : "test.geniustrainer.net" == location.hostname ? "https://test.clixscale.com/BillingServer/index.html" : "https://ver." + billingDomain + "/index.html", url += urlParams, $scope.injectEmbeddedUrl(url), $scope.tracking(4)
    }, $scope.injectEmbeddedUrl = function (externalBillingUrl) {
      var parent = document.getElementsByClassName("billing_form")[0], emb = document.createElement("embed");
      emb.classList.add("embed"), null !== $scope.NAME && void 0 !== $scope.NAME && (externalBillingUrl = externalBillingUrl + "&name=" + $scope.NAME), null !== $scope.STYLE && void 0 !== $scope.STYLE && (externalBillingUrl = externalBillingUrl + "&style=" + $scope.STYLE), null !== $scope.embedded && void 0 !== $scope.embedded && 1 == $scope.embedded && (externalBillingUrl += "&legalOverrides=true"), emb.src = externalBillingUrl, emb.style = "min-height: 1024px; width: 100%", emb.onload = function () {
        $("#maskLoader")[0].style.display = "none"
      }, parent.append(emb), document.getElementsByClassName("lead_form")[0].style = "display: none;", $(window).scrollTop(0)
    }, $scope.openVerificationPage = function (transactionNum, billingDomain, externalBillingUrl) {
      var url;
      confirmOnExit = !1;
      var urlParams = "?trid=" + transactionNum + "&language=" + $scope.LANG;
      null !== $scope.NAME && void 0 !== $scope.NAME && (urlParams = urlParams + "&name=" + $scope.NAME), url = "127.0.0.1" == location.hostname || "test.clixscale.com" == location.hostname ? "/BillingServer/index.html" : "test.geniustrainer.net" == location.hostname ? "https://test.clixscale.com/BillingServer/index.html" : "https://ver." + billingDomain + "/index.html", externalBillingUrl ? $scope.openEmbeddedUrl(externalBillingUrl) : window.open(url + urlParams, "_self", !1), $scope.tracking(4)
    }, $scope.tracking = function (stepId) {
      $scope.trackingData = {
        affiliateId: $scope.AFF,
        stepId: stepId,
        theme: $scope.CSS,
        email: $scope.MAIL,
        clickId: $scope.CLICKID,
        url: document.URL,
        productId: $scope.productId,
        hash: $scope.HASH,
        countryId: $scope.COUNTRY
      }, httpService.userTracking($scope.trackingData)
    }, $scope.HASH && $scope.tracking(0), $scope.setPrize = function (prize) {
      $scope.selectedPrize = prize
    }, $scope.setBtheme = function (btheme) {
      $scope.btheme = btheme
    }, $scope.setStyle = function (style) {
      $scope.STYLE = style
    }, $scope.setEmbedded = function (embedded) {
      $scope.embedded = embedded
    }, $scope.setProduct = function (productId) {
      $scope.productId = productId
    }, $scope.getDeviceFingerprint = function () {
      $timeout((function () {
        (new Fingerprint2).get((function (result, components) {
          $scope.deviceFingerprint = result
        }))
      }), 500)
    }, $scope.getDeviceFingerprint(), $scope.redirectUrl = "https://clixscale.g2afse.com/sl?id=5e319888bf7f144ffae31a23&pid=12&sub1={clickid}&sub2={theme}&sub3={affid}&sub5=bb", $scope.redirectUrl = $scope.redirectUrl.replace("{clickid}", $scope.CLICKID).replace("{theme}", $scope.CSS).replace("{affid}", $scope.AFF), confirmOnExit = !1, history.pushState({page: 1}, "", window.location.href), window.onpopstate = function (event) {
      window.location.href = $scope.redirectUrl
    }
  }

  module.exports = welcomeController
}, function (module, exports, __webpack_require__) {
  "use strict";
  var blackFriday = __webpack_require__(0).blackFriday, newYear = __webpack_require__(0).newYear,
    stayHome = __webpack_require__(0).stayHome, script = __webpack_require__(0).script;
  angular.module("IQTestLP").directive("blackFriday", blackFriday).directive("newYear", newYear).directive("stayHome", stayHome).directive("script", script)
}, function (module, exports, __webpack_require__) {
  "use strict";
  var commonFunctions = __webpack_require__(6), httpService = __webpack_require__(7);
  angular.module("IQTestLP").service("commonFunctions", commonFunctions).service("httpService", httpService)
}, function (module, exports) {
  module.exports = function common() {
    var factory = {
      parseURL: function parseURLParams(url) {
        var i, n, v, nv, queryStart = url.indexOf("?") + 1, queryEnd = url.indexOf("#") + 1 || url.length + 1,
          query = url.slice(queryStart, queryEnd - 1), pairs = query.replace(/\+/g, " ").split("&"), parms = {};
        if (query !== url && "" !== query) {
          for (i = 0; i < pairs.length; i++) {
            for (nv = pairs[i].split("="), n = decodeURIComponent(nv[0]), v = decodeURIComponent(nv[1]), parms.hasOwnProperty(n) || (parms[n] = []), j = 2; j < nv.length; j++) "" == nv[j] && (v += "=");
            parms[n].push(nv.length >= 2 ? v : null)
          }
          return parms
        }
      }, urlParam: function (name) {
        var results = new RegExp("[?&]" + name + "=([^&#]*)").exec(window.location.search);
        return results ? results[1] : null
      }, validPassword: function (psw) {
        return !(psw.length < 5)
      }, validEmail: function (mail) {
        return /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i.test(mail)
      }, get_nowUTC: function () {
        var now = new Date;

        function setNumber(num) {
          return num < 10 ? "0" + num : num
        }

        return now.getUTCFullYear() + "" + setNumber(now.getUTCMonth() + 1) + setNumber(now.getUTCDate()) + setNumber(now.getUTCHours()) + setNumber(now.getUTCMinutes()) + setNumber(now.getUTCSeconds())
      }
    };
    return factory
  }
}, function (module, exports) {
  module.exports = function httpService($http, $resource, $q) {
    return {
      loginUser: function (userData) {
        return $http({
          method: "POST",
          url: _env.apiUrl + "user/loginUser",
          data: userData,
          headers: {"Content-Type": "application/json"},
          isArray: !1,
          withCredentials: !0
        })
      }, userTracking: function (trackingData) {
        return $http({
          method: "POST",
          url: _env.apiUrl + "activity/userTracking",
          data: trackingData,
          headers: {"Content-Type": "application/json"},
          isArray: !1,
          withCredentials: !0
        })
      }, checkByIp: function (affiliateData) {
        return $http({
          method: "POST",
          url: _env.apiUrl + "user/checkByIp",
          data: affiliateData,
          headers: {"Content-Type": "application/json"},
          isArray: !1,
          withCredentials: !0
        })
      }, registerUser: function (userDetails) {
        return $http({
          method: "POST",
          url: _env.apiUrl + "user/register",
          data: userDetails,
          headers: {"Content-Type": "application/json"},
          isArray: !1,
          withCredentials: !0
        })
      }, getLeaderboardData: function () {
        return $http({method: "GET", url: _env.apiUrl + "game/getLeaderboardData", isArray: !0, withCredentials: !0})
      }, getCdnAddress: function () {
        return $http({
          method: "GET",
          url: _env.apiUrl + "admin/cdn",
          isArray: !1,
          headers: {Accept: "text/plain"},
          withCredentials: !0
        })
      }, getServerUrl: function () {
        return $http({
          method: "GET",
          url: _env.apiUrl + "admin/serverUrl",
          headers: {Accept: "text/plain"},
          isArray: !1,
          withCredentials: !0
        })
      }
    }
  }
}, function (module, exports) {
  $(document).ready((function () {
    $(".click").bind("click touchstart", (function () {
      $("#frmEmailA").focus(), $(".formwrap").addClass("highlight-green"), setTimeout((function () {
        $(".formwrap").removeClass("highlight-green")
      }), 1e3), $("html, body").animate({scrollTop: $(".form-green").offset().top}, 300)
    })), $("#frmEmailA").blur((function () {
      tmpval = $(this).val();
      /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i.test(tmpval) ? ($(this).addClass("green-border"), $(this).removeClass("red-border")) : ($(this).addClass("red-border"), $(this).removeClass("green-border"))
    })), $("#password").blur((function () {
      tmpval = $(this).val(), "" == tmpval ? ($(this).addClass("red-border"), $(this).removeClass("green-border")) : ($(this).addClass("green-border"), $(this).removeClass("red-border"))
    }))
  }))
}, function (module, exports, __webpack_require__) {
  !function (e, t, n) {
    "use strict";
    "function" == typeof window.define && window.define.amd ? window.define(n) : module.exports ? module.exports = n() : t.exports ? t.exports = n() : t.Fingerprint2 = n()
  }(0, this, (function () {
    "use strict";
    var t = function (e) {
      if (!(this instanceof t)) return new t(e);
      this.options = this.extend(e, {
        swfContainerId: "fingerprintjs2",
        swfPath: "flash/compiled/FontList.swf",
        detectScreenOrientation: !0,
        sortPluginsFor: [/palemoon/i],
        userDefinedFonts: [],
        excludeDoNotTrack: !0,
        excludePixelRatio: !0
      }), this.nativeForEach = Array.prototype.forEach, this.nativeMap = Array.prototype.map
    };
    return t.prototype = {
      extend: function (e, t) {
        if (null == e) return t;
        for (var n in e) null != e[n] && t[n] !== e[n] && (t[n] = e[n]);
        return t
      }, get: function (i) {
        var a = this, n = {
          data: [], addPreprocessedComponent: function (e) {
            var t = e.value;
            "function" == typeof a.options.preprocessor && (t = a.options.preprocessor(e.key, t)), n.data.push({
              key: e.key,
              value: t
            })
          }
        };
        n = this.userAgentKey(n), n = this.languageKey(n), n = this.colorDepthKey(n), n = this.deviceMemoryKey(n), n = this.pixelRatioKey(n), n = this.hardwareConcurrencyKey(n), n = this.screenResolutionKey(n), n = this.availableScreenResolutionKey(n), n = this.timezoneOffsetKey(n), n = this.sessionStorageKey(n), n = this.localStorageKey(n), n = this.indexedDbKey(n), n = this.addBehaviorKey(n), n = this.openDatabaseKey(n), n = this.cpuClassKey(n), n = this.platformKey(n), n = this.doNotTrackKey(n), n = this.pluginsKey(n), n = this.canvasKey(n), n = this.webglKey(n), n = this.webglVendorAndRendererKey(n), n = this.adBlockKey(n), n = this.hasLiedLanguagesKey(n), n = this.hasLiedResolutionKey(n), n = this.hasLiedOsKey(n), n = this.hasLiedBrowserKey(n), n = this.touchSupportKey(n), n = this.customEntropyFunction(n), this.fontsKey(n, (function (e) {
          a.audioKey(e, (function (e) {
            var n = [];
            a.each(e.data, (function (e) {
              var t = e.value;
              t && "function" == typeof t.join ? n.push(t.join(";")) : n.push(t)
            }));
            var t = a.x64hash128(n.join("~~~"), 31);
            return i(t, e.data)
          }))
        }))
      }, audioKey: function (n, i) {
        if (this.options.excludeAudioFP) return i(n);
        var e = window.OfflineAudioContext || window.webkitOfflineAudioContext;
        if (null == e) return n.addPreprocessedComponent({key: "audio_fp", value: null}), i(n);
        var t = new e(1, 44100, 44100), a = t.createOscillator();
        a.type = "triangle", a.frequency.setValueAtTime(1e4, t.currentTime);
        var r = t.createDynamicsCompressor();
        this.each([["threshold", -50], ["knee", 40], ["ratio", 12], ["reduction", -20], ["attack", 0], ["release", .25]], (function (e) {
          void 0 !== r[e[0]] && "function" == typeof r[e[0]].setValueAtTime && r[e[0]].setValueAtTime(e[1], t.currentTime)
        })), t.oncomplete = function (e) {
          var t = e.renderedBuffer.getChannelData(0).slice(4500, 5e3).reduce((function (e, t) {
            return e + Math.abs(t)
          }), 0).toString();
          return a.disconnect(), r.disconnect(), n.addPreprocessedComponent({key: "audio_fp", value: t}), i(n)
        }, a.connect(r), r.connect(t.destination), a.start(0), t.startRendering()
      }, customEntropyFunction: function (e) {
        return "function" == typeof this.options.customFunction && e.addPreprocessedComponent({
          key: "custom",
          value: this.options.customFunction()
        }), e
      }, userAgentKey: function (e) {
        return this.options.excludeUserAgent || e.addPreprocessedComponent({
          key: "user_agent",
          value: this.getUserAgent()
        }), e
      }, getUserAgent: function () {
        return navigator.userAgent
      }, languageKey: function (e) {
        return this.options.excludeLanguage || e.addPreprocessedComponent({
          key: "language",
          value: navigator.language || navigator.userLanguage || navigator.browserLanguage || navigator.systemLanguage || ""
        }), e
      }, colorDepthKey: function (e) {
        return this.options.excludeColorDepth || e.addPreprocessedComponent({
          key: "color_depth",
          value: window.screen.colorDepth || -1
        }), e
      }, deviceMemoryKey: function (e) {
        return this.options.excludeDeviceMemory || e.addPreprocessedComponent({
          key: "device_memory",
          value: this.getDeviceMemory()
        }), e
      }, getDeviceMemory: function () {
        return navigator.deviceMemory || -1
      }, pixelRatioKey: function (e) {
        return this.options.excludePixelRatio || e.addPreprocessedComponent({
          key: "pixel_ratio",
          value: this.getPixelRatio()
        }), e
      }, getPixelRatio: function () {
        return window.devicePixelRatio || ""
      }, screenResolutionKey: function (e) {
        return this.options.excludeScreenResolution ? e : this.getScreenResolution(e)
      }, getScreenResolution: function (e) {
        var t;
        return t = this.options.detectScreenOrientation && window.screen.height > window.screen.width ? [window.screen.height, window.screen.width] : [window.screen.width, window.screen.height], e.addPreprocessedComponent({
          key: "resolution",
          value: t
        }), e
      }, availableScreenResolutionKey: function (e) {
        return this.options.excludeAvailableScreenResolution ? e : this.getAvailableScreenResolution(e)
      }, getAvailableScreenResolution: function (e) {
        var t;
        return window.screen.availWidth && window.screen.availHeight && (t = this.options.detectScreenOrientation ? window.screen.availHeight > window.screen.availWidth ? [window.screen.availHeight, window.screen.availWidth] : [window.screen.availWidth, window.screen.availHeight] : [window.screen.availHeight, window.screen.availWidth]), void 0 !== t && e.addPreprocessedComponent({
          key: "available_resolution",
          value: t
        }), e
      }, timezoneOffsetKey: function (e) {
        return this.options.excludeTimezoneOffset || e.addPreprocessedComponent({
          key: "timezone_offset",
          value: (new Date).getTimezoneOffset()
        }), e
      }, sessionStorageKey: function (e) {
        return !this.options.excludeSessionStorage && this.hasSessionStorage() && e.addPreprocessedComponent({
          key: "session_storage",
          value: 1
        }), e
      }, localStorageKey: function (e) {
        return !this.options.excludeSessionStorage && this.hasLocalStorage() && e.addPreprocessedComponent({
          key: "local_storage",
          value: 1
        }), e
      }, indexedDbKey: function (e) {
        return !this.options.excludeIndexedDB && this.hasIndexedDB() && e.addPreprocessedComponent({
          key: "indexed_db",
          value: 1
        }), e
      }, addBehaviorKey: function (e) {
        return !this.options.excludeAddBehavior && document.body && document.body.addBehavior && e.addPreprocessedComponent({
          key: "add_behavior",
          value: 1
        }), e
      }, openDatabaseKey: function (e) {
        return !this.options.excludeOpenDatabase && window.openDatabase && e.addPreprocessedComponent({
          key: "open_database",
          value: 1
        }), e
      }, cpuClassKey: function (e) {
        return this.options.excludeCpuClass || e.addPreprocessedComponent({
          key: "cpu_class",
          value: this.getNavigatorCpuClass()
        }), e
      }, platformKey: function (e) {
        return this.options.excludePlatform || e.addPreprocessedComponent({
          key: "navigator_platform",
          value: this.getNavigatorPlatform()
        }), e
      }, doNotTrackKey: function (e) {
        return this.options.excludeDoNotTrack || e.addPreprocessedComponent({
          key: "do_not_track",
          value: this.getDoNotTrack()
        }), e
      }, canvasKey: function (e) {
        return !this.options.excludeCanvas && this.isCanvasSupported() && e.addPreprocessedComponent({
          key: "canvas",
          value: this.getCanvasFp()
        }), e
      }, webglKey: function (e) {
        return !this.options.excludeWebGL && this.isWebGlSupported() && e.addPreprocessedComponent({
          key: "webgl",
          value: this.getWebglFp()
        }), e
      }, webglVendorAndRendererKey: function (e) {
        return !this.options.excludeWebGLVendorAndRenderer && this.isWebGlSupported() && e.addPreprocessedComponent({
          key: "webgl_vendor",
          value: this.getWebglVendorAndRenderer()
        }), e
      }, adBlockKey: function (e) {
        return this.options.excludeAdBlock || e.addPreprocessedComponent({key: "adblock", value: this.getAdBlock()}), e
      }, hasLiedLanguagesKey: function (e) {
        return this.options.excludeHasLiedLanguages || e.addPreprocessedComponent({
          key: "has_lied_languages",
          value: this.getHasLiedLanguages()
        }), e
      }, hasLiedResolutionKey: function (e) {
        return this.options.excludeHasLiedResolution || e.addPreprocessedComponent({
          key: "has_lied_resolution",
          value: this.getHasLiedResolution()
        }), e
      }, hasLiedOsKey: function (e) {
        return this.options.excludeHasLiedOs || e.addPreprocessedComponent({
          key: "has_lied_os",
          value: this.getHasLiedOs()
        }), e
      }, hasLiedBrowserKey: function (e) {
        return this.options.excludeHasLiedBrowser || e.addPreprocessedComponent({
          key: "has_lied_browser",
          value: this.getHasLiedBrowser()
        }), e
      }, fontsKey: function (e, t) {
        return this.options.excludeJsFonts ? this.flashFontsKey(e, t) : this.jsFontsKey(e, t)
      }, flashFontsKey: function (t, n) {
        return this.options.excludeFlashFonts ? n(t) : this.hasSwfObjectLoaded() && this.hasMinFlashInstalled() ? void 0 === this.options.swfPath ? n(t) : void this.loadSwfAndDetectFonts((function (e) {
          t.addPreprocessedComponent({key: "swf_fonts", value: e.join(";")}), n(t)
        })) : n(t)
      }, jsFontsKey: function (m, v) {
        var C = this;
        return setTimeout((function () {
          var u = ["monospace", "sans-serif", "serif"],
            c = ["Andale Mono", "Arial", "Arial Black", "Arial Hebrew", "Arial MT", "Arial Narrow", "Arial Rounded MT Bold", "Arial Unicode MS", "Bitstream Vera Sans Mono", "Book Antiqua", "Bookman Old Style", "Calibri", "Cambria", "Cambria Math", "Century", "Century Gothic", "Century Schoolbook", "Comic Sans", "Comic Sans MS", "Consolas", "Courier", "Courier New", "Geneva", "Georgia", "Helvetica", "Helvetica Neue", "Impact", "Lucida Bright", "Lucida Calligraphy", "Lucida Console", "Lucida Fax", "LUCIDA GRANDE", "Lucida Handwriting", "Lucida Sans", "Lucida Sans Typewriter", "Lucida Sans Unicode", "Microsoft Sans Serif", "Monaco", "Monotype Corsiva", "MS Gothic", "MS Outlook", "MS PGothic", "MS Reference Sans Serif", "MS Sans Serif", "MS Serif", "MYRIAD", "MYRIAD PRO", "Palatino", "Palatino Linotype", "Segoe Print", "Segoe Script", "Segoe UI", "Segoe UI Light", "Segoe UI Semibold", "Segoe UI Symbol", "Tahoma", "Times", "Times New Roman", "Times New Roman PS", "Trebuchet MS", "Verdana", "Wingdings", "Wingdings 2", "Wingdings 3"];
          C.options.extendedJsFonts && (c = c.concat(["Abadi MT Condensed Light", "Academy Engraved LET", "ADOBE CASLON PRO", "Adobe Garamond", "ADOBE GARAMOND PRO", "Agency FB", "Aharoni", "Albertus Extra Bold", "Albertus Medium", "Algerian", "Amazone BT", "American Typewriter", "American Typewriter Condensed", "AmerType Md BT", "Andalus", "Angsana New", "AngsanaUPC", "Antique Olive", "Aparajita", "Apple Chancery", "Apple Color Emoji", "Apple SD Gothic Neo", "Arabic Typesetting", "ARCHER", "ARNO PRO", "Arrus BT", "Aurora Cn BT", "AvantGarde Bk BT", "AvantGarde Md BT", "AVENIR", "Ayuthaya", "Bandy", "Bangla Sangam MN", "Bank Gothic", "BankGothic Md BT", "Baskerville", "Baskerville Old Face", "Batang", "BatangChe", "Bauer Bodoni", "Bauhaus 93", "Bazooka", "Bell MT", "Bembo", "Benguiat Bk BT", "Berlin Sans FB", "Berlin Sans FB Demi", "Bernard MT Condensed", "BernhardFashion BT", "BernhardMod BT", "Big Caslon", "BinnerD", "Blackadder ITC", "BlairMdITC TT", "Bodoni 72", "Bodoni 72 Oldstyle", "Bodoni 72 Smallcaps", "Bodoni MT", "Bodoni MT Black", "Bodoni MT Condensed", "Bodoni MT Poster Compressed", "Bookshelf Symbol 7", "Boulder", "Bradley Hand", "Bradley Hand ITC", "Bremen Bd BT", "Britannic Bold", "Broadway", "Browallia New", "BrowalliaUPC", "Brush Script MT", "Californian FB", "Calisto MT", "Calligrapher", "Candara", "CaslonOpnface BT", "Castellar", "Centaur", "Cezanne", "CG Omega", "CG Times", "Chalkboard", "Chalkboard SE", "Chalkduster", "Charlesworth", "Charter Bd BT", "Charter BT", "Chaucer", "ChelthmITC Bk BT", "Chiller", "Clarendon", "Clarendon Condensed", "CloisterBlack BT", "Cochin", "Colonna MT", "Constantia", "Cooper Black", "Copperplate", "Copperplate Gothic", "Copperplate Gothic Bold", "Copperplate Gothic Light", "CopperplGoth Bd BT", "Corbel", "Cordia New", "CordiaUPC", "Cornerstone", "Coronet", "Cuckoo", "Curlz MT", "DaunPenh", "Dauphin", "David", "DB LCD Temp", "DELICIOUS", "Denmark", "DFKai-SB", "Didot", "DilleniaUPC", "DIN", "DokChampa", "Dotum", "DotumChe", "Ebrima", "Edwardian Script ITC", "Elephant", "English 111 Vivace BT", "Engravers MT", "EngraversGothic BT", "Eras Bold ITC", "Eras Demi ITC", "Eras Light ITC", "Eras Medium ITC", "EucrosiaUPC", "Euphemia", "Euphemia UCAS", "EUROSTILE", "Exotc350 Bd BT", "FangSong", "Felix Titling", "Fixedsys", "FONTIN", "Footlight MT Light", "Forte", "FrankRuehl", "Fransiscan", "Freefrm721 Blk BT", "FreesiaUPC", "Freestyle Script", "French Script MT", "FrnkGothITC Bk BT", "Fruitger", "FRUTIGER", "Futura", "Futura Bk BT", "Futura Lt BT", "Futura Md BT", "Futura ZBlk BT", "FuturaBlack BT", "Gabriola", "Galliard BT", "Gautami", "Geeza Pro", "Geometr231 BT", "Geometr231 Hv BT", "Geometr231 Lt BT", "GeoSlab 703 Lt BT", "GeoSlab 703 XBd BT", "Gigi", "Gill Sans", "Gill Sans MT", "Gill Sans MT Condensed", "Gill Sans MT Ext Condensed Bold", "Gill Sans Ultra Bold", "Gill Sans Ultra Bold Condensed", "Gisha", "Gloucester MT Extra Condensed", "GOTHAM", "GOTHAM BOLD", "Goudy Old Style", "Goudy Stout", "GoudyHandtooled BT", "GoudyOLSt BT", "Gujarati Sangam MN", "Gulim", "GulimChe", "Gungsuh", "GungsuhChe", "Gurmukhi MN", "Haettenschweiler", "Harlow Solid Italic", "Harrington", "Heather", "Heiti SC", "Heiti TC", "HELV", "Herald", "High Tower Text", "Hiragino Kaku Gothic ProN", "Hiragino Mincho ProN", "Hoefler Text", "Humanst 521 Cn BT", "Humanst521 BT", "Humanst521 Lt BT", "Imprint MT Shadow", "Incised901 Bd BT", "Incised901 BT", "Incised901 Lt BT", "INCONSOLATA", "Informal Roman", "Informal011 BT", "INTERSTATE", "IrisUPC", "Iskoola Pota", "JasmineUPC", "Jazz LET", "Jenson", "Jester", "Jokerman", "Juice ITC", "Kabel Bk BT", "Kabel Ult BT", "Kailasa", "KaiTi", "Kalinga", "Kannada Sangam MN", "Kartika", "Kaufmann Bd BT", "Kaufmann BT", "Khmer UI", "KodchiangUPC", "Kokila", "Korinna BT", "Kristen ITC", "Krungthep", "Kunstler Script", "Lao UI", "Latha", "Leelawadee", "Letter Gothic", "Levenim MT", "LilyUPC", "Lithograph", "Lithograph Light", "Long Island", "Lydian BT", "Magneto", "Maiandra GD", "Malayalam Sangam MN", "Malgun Gothic", "Mangal", "Marigold", "Marion", "Marker Felt", "Market", "Marlett", "Matisse ITC", "Matura MT Script Capitals", "Meiryo", "Meiryo UI", "Microsoft Himalaya", "Microsoft JhengHei", "Microsoft New Tai Lue", "Microsoft PhagsPa", "Microsoft Tai Le", "Microsoft Uighur", "Microsoft YaHei", "Microsoft Yi Baiti", "MingLiU", "MingLiU_HKSCS", "MingLiU_HKSCS-ExtB", "MingLiU-ExtB", "Minion", "Minion Pro", "Miriam", "Miriam Fixed", "Mistral", "Modern", "Modern No. 20", "Mona Lisa Solid ITC TT", "Mongolian Baiti", "MONO", "MoolBoran", "Mrs Eaves", "MS LineDraw", "MS Mincho", "MS PMincho", "MS Reference Specialty", "MS UI Gothic", "MT Extra", "MUSEO", "MV Boli", "Nadeem", "Narkisim", "NEVIS", "News Gothic", "News GothicMT", "NewsGoth BT", "Niagara Engraved", "Niagara Solid", "Noteworthy", "NSimSun", "Nyala", "OCR A Extended", "Old Century", "Old English Text MT", "Onyx", "Onyx BT", "OPTIMA", "Oriya Sangam MN", "OSAKA", "OzHandicraft BT", "Palace Script MT", "Papyrus", "Parchment", "Party LET", "Pegasus", "Perpetua", "Perpetua Titling MT", "PetitaBold", "Pickwick", "Plantagenet Cherokee", "Playbill", "PMingLiU", "PMingLiU-ExtB", "Poor Richard", "Poster", "PosterBodoni BT", "PRINCETOWN LET", "Pristina", "PTBarnum BT", "Pythagoras", "Raavi", "Rage Italic", "Ravie", "Ribbon131 Bd BT", "Rockwell", "Rockwell Condensed", "Rockwell Extra Bold", "Rod", "Roman", "Sakkal Majalla", "Santa Fe LET", "Savoye LET", "Sceptre", "Script", "Script MT Bold", "SCRIPTINA", "Serifa", "Serifa BT", "Serifa Th BT", "ShelleyVolante BT", "Sherwood", "Shonar Bangla", "Showcard Gothic", "Shruti", "Signboard", "SILKSCREEN", "SimHei", "Simplified Arabic", "Simplified Arabic Fixed", "SimSun", "SimSun-ExtB", "Sinhala Sangam MN", "Sketch Rockwell", "Skia", "Small Fonts", "Snap ITC", "Snell Roundhand", "Socket", "Souvenir Lt BT", "Staccato222 BT", "Steamer", "Stencil", "Storybook", "Styllo", "Subway", "Swis721 BlkEx BT", "Swiss911 XCm BT", "Sylfaen", "Synchro LET", "System", "Tamil Sangam MN", "Technical", "Teletype", "Telugu Sangam MN", "Tempus Sans ITC", "Terminal", "Thonburi", "Traditional Arabic", "Trajan", "TRAJAN PRO", "Tristan", "Tubular", "Tunga", "Tw Cen MT", "Tw Cen MT Condensed", "Tw Cen MT Condensed Extra Bold", "TypoUpright BT", "Unicorn", "Univers", "Univers CE 55 Medium", "Univers Condensed", "Utsaah", "Vagabond", "Vani", "Vijaya", "Viner Hand ITC", "VisualUI", "Vivaldi", "Vladimir Script", "Vrinda", "Westminster", "WHITNEY", "Wide Latin", "ZapfEllipt BT", "ZapfHumnst BT", "ZapfHumnst Dm BT", "Zapfino", "Zurich BlkEx BT", "Zurich Ex BT", "ZWAdobeF"])), c = (c = c.concat(C.options.userDefinedFonts)).filter((function (e, t) {
            return c.indexOf(e) === t
          }));
          var e = document.getElementsByTagName("body")[0], a = document.createElement("div"),
            h = document.createElement("div"), i = {}, r = {}, g = function () {
              var e = document.createElement("span");
              return e.style.position = "absolute", e.style.left = "-9999px", e.style.fontSize = "72px", e.style.fontStyle = "normal", e.style.fontWeight = "normal", e.style.letterSpacing = "normal", e.style.lineBreak = "auto", e.style.lineHeight = "normal", e.style.textTransform = "none", e.style.textAlign = "left", e.style.textDecoration = "none", e.style.textShadow = "none", e.style.whiteSpace = "normal", e.style.wordBreak = "normal", e.style.wordSpacing = "normal", e.innerHTML = "mmmmmmmmmmlli", e
            }, t = function (e) {
              for (var t = !1, n = 0; n < u.length; n++) if (t = e[n].offsetWidth !== i[u[n]] || e[n].offsetHeight !== r[u[n]]) return t;
              return t
            }, n = function () {
              for (var e = [], t = 0, n = u.length; t < n; t++) {
                var i = g();
                i.style.fontFamily = u[t], a.appendChild(i), e.push(i)
              }
              return e
            }();
          e.appendChild(a);
          for (var o = 0, s = u.length; o < s; o++) i[u[o]] = n[o].offsetWidth, r[u[o]] = n[o].offsetHeight;
          var l = function () {
            for (var e, t, n, i = {}, a = 0, r = c.length; a < r; a++) {
              for (var o = [], s = 0, l = u.length; s < l; s++) {
                var d = (e = c[a], t = u[s], n = void 0, (n = g()).style.fontFamily = "'" + e + "'," + t, n);
                h.appendChild(d), o.push(d)
              }
              i[c[a]] = o
            }
            return i
          }();
          e.appendChild(h);
          for (var d = [], p = 0, f = c.length; p < f; p++) t(l[c[p]]) && d.push(c[p]);
          e.removeChild(h), e.removeChild(a), m.addPreprocessedComponent({key: "js_fonts", value: d}), v(m)
        }), 1)
      }, pluginsKey: function (e) {
        return this.options.excludePlugins || (this.isIE() ? this.options.excludeIEPlugins || e.addPreprocessedComponent({
          key: "ie_plugins",
          value: this.getIEPlugins()
        }) : e.addPreprocessedComponent({key: "regular_plugins", value: this.getRegularPlugins()})), e
      }, getRegularPlugins: function () {
        var e = [];
        if (navigator.plugins) for (var t = 0, n = navigator.plugins.length; t < n; t++) navigator.plugins[t] && e.push(navigator.plugins[t]);
        return this.pluginsShouldBeSorted() && (e = e.sort((function (e, t) {
          return e.name > t.name ? 1 : e.name < t.name ? -1 : 0
        }))), this.map(e, (function (e) {
          var t = this.map(e, (function (e) {
            return [e.type, e.suffixes].join("~")
          })).join(",");
          return [e.name, e.description, t].join("::")
        }), this)
      }, getIEPlugins: function () {
        var e = [];
        return (Object.getOwnPropertyDescriptor && Object.getOwnPropertyDescriptor(window, "ActiveXObject") || "ActiveXObject" in window) && (e = this.map(["AcroPDF.PDF", "Adodb.Stream", "AgControl.AgControl", "DevalVRXCtrl.DevalVRXCtrl.1", "MacromediaFlashPaper.MacromediaFlashPaper", "Msxml2.DOMDocument", "Msxml2.XMLHTTP", "PDF.PdfCtrl", "QuickTime.QuickTime", "QuickTimeCheckObject.QuickTimeCheck.1", "RealPlayer", "RealPlayer.RealPlayer(tm) ActiveX Control (32-bit)", "RealVideo.RealVideo(tm) ActiveX Control (32-bit)", "Scripting.Dictionary", "SWCtl.SWCtl", "Shell.UIHelper", "ShockwaveFlash.ShockwaveFlash", "Skype.Detection", "TDCCtl.TDCCtl", "WMPlayer.OCX", "rmocx.RealPlayer G2 Control", "rmocx.RealPlayer G2 Control.1"], (function (e) {
          try {
            return new window.ActiveXObject(e), e
          } catch (e) {
            return null
          }
        }))), navigator.plugins && (e = e.concat(this.getRegularPlugins())), e
      }, pluginsShouldBeSorted: function () {
        for (var e = !1, t = 0, n = this.options.sortPluginsFor.length; t < n; t++) {
          var i = this.options.sortPluginsFor[t];
          if (navigator.userAgent.match(i)) {
            e = !0;
            break
          }
        }
        return e
      }, touchSupportKey: function (e) {
        return this.options.excludeTouchSupport || e.addPreprocessedComponent({
          key: "touch_support",
          value: this.getTouchSupport()
        }), e
      }, hardwareConcurrencyKey: function (e) {
        return this.options.excludeHardwareConcurrency || e.addPreprocessedComponent({
          key: "hardware_concurrency",
          value: this.getHardwareConcurrency()
        }), e
      }, hasSessionStorage: function () {
        try {
          return !!window.sessionStorage
        } catch (e) {
          return !0
        }
      }, hasLocalStorage: function () {
        try {
          return !!window.localStorage
        } catch (e) {
          return !0
        }
      }, hasIndexedDB: function () {
        try {
          return !!window.indexedDB
        } catch (e) {
          return !0
        }
      }, getHardwareConcurrency: function () {
        return navigator.hardwareConcurrency ? navigator.hardwareConcurrency : "unknown"
      }, getNavigatorCpuClass: function () {
        return navigator.cpuClass ? navigator.cpuClass : "unknown"
      }, getNavigatorPlatform: function () {
        return navigator.platform ? navigator.platform : "unknown"
      }, getDoNotTrack: function () {
        return navigator.doNotTrack ? navigator.doNotTrack : navigator.msDoNotTrack ? navigator.msDoNotTrack : window.doNotTrack ? window.doNotTrack : "unknown"
      }, getTouchSupport: function () {
        var e = 0, t = !1;
        void 0 !== navigator.maxTouchPoints ? e = navigator.maxTouchPoints : void 0 !== navigator.msMaxTouchPoints && (e = navigator.msMaxTouchPoints);
        try {
          document.createEvent("TouchEvent"), t = !0
        } catch (e) {
        }
        return [e, t, "ontouchstart" in window]
      }, getCanvasFp: function () {
        var e = [], t = document.createElement("canvas");
        t.width = 2e3, t.height = 200, t.style.display = "inline";
        var n = t.getContext("2d");
        return n.rect(0, 0, 10, 10), n.rect(2, 2, 6, 6), e.push("canvas winding:" + (!1 === n.isPointInPath(5, 5, "evenodd") ? "yes" : "no")), n.textBaseline = "alphabetic", n.fillStyle = "#f60", n.fillRect(125, 1, 62, 20), n.fillStyle = "#069", this.options.dontUseFakeFontInCanvas ? n.font = "11pt Arial" : n.font = "11pt no-real-font-123", n.fillText("Cwm fjordbank glyphs vext quiz, 😃", 2, 15), n.fillStyle = "rgba(102, 204, 0, 0.2)", n.font = "18pt Arial", n.fillText("Cwm fjordbank glyphs vext quiz, 😃", 4, 45), n.globalCompositeOperation = "multiply", n.fillStyle = "rgb(255,0,255)", n.beginPath(), n.arc(50, 50, 50, 0, 2 * Math.PI, !0), n.closePath(), n.fill(), n.fillStyle = "rgb(0,255,255)", n.beginPath(), n.arc(100, 50, 50, 0, 2 * Math.PI, !0), n.closePath(), n.fill(), n.fillStyle = "rgb(255,255,0)", n.beginPath(), n.arc(75, 100, 50, 0, 2 * Math.PI, !0), n.closePath(), n.fill(), n.fillStyle = "rgb(255,0,255)", n.arc(75, 75, 75, 0, 2 * Math.PI, !0), n.arc(75, 75, 25, 0, 2 * Math.PI, !0), n.fill("evenodd"), t.toDataURL && e.push("canvas fp:" + t.toDataURL()), e.join("~")
      }, getWebglFp: function () {
        var o, e = function (e) {
          return o.clearColor(0, 0, 0, 1), o.enable(o.DEPTH_TEST), o.depthFunc(o.LEQUAL), o.clear(o.COLOR_BUFFER_BIT | o.DEPTH_BUFFER_BIT), "[" + e[0] + ", " + e[1] + "]"
        };
        if (!(o = this.getWebglCanvas())) return null;
        var s = [], t = o.createBuffer();
        o.bindBuffer(o.ARRAY_BUFFER, t);
        var n = new Float32Array([-.2, -.9, 0, .4, -.26, 0, 0, .732134444, 0]);
        o.bufferData(o.ARRAY_BUFFER, n, o.STATIC_DRAW), t.itemSize = 3, t.numItems = 3;
        var i = o.createProgram(), a = o.createShader(o.VERTEX_SHADER);
        o.shaderSource(a, "attribute vec2 attrVertex;varying vec2 varyinTexCoordinate;uniform vec2 uniformOffset;void main(){varyinTexCoordinate=attrVertex+uniformOffset;gl_Position=vec4(attrVertex,0,1);}"), o.compileShader(a);
        var r = o.createShader(o.FRAGMENT_SHADER);
        o.shaderSource(r, "precision mediump float;varying vec2 varyinTexCoordinate;void main() {gl_FragColor=vec4(varyinTexCoordinate,0,1);}"), o.compileShader(r), o.attachShader(i, a), o.attachShader(i, r), o.linkProgram(i), o.useProgram(i), i.vertexPosAttrib = o.getAttribLocation(i, "attrVertex"), i.offsetUniform = o.getUniformLocation(i, "uniformOffset"), o.enableVertexAttribArray(i.vertexPosArray), o.vertexAttribPointer(i.vertexPosAttrib, t.itemSize, o.FLOAT, !1, 0, 0), o.uniform2f(i.offsetUniform, 1, 1), o.drawArrays(o.TRIANGLE_STRIP, 0, t.numItems);
        try {
          s.push(o.canvas.toDataURL())
        } catch (e) {
        }
        s.push("extensions:" + (o.getSupportedExtensions() || []).join(";")), s.push("webgl aliased line width range:" + e(o.getParameter(o.ALIASED_LINE_WIDTH_RANGE))), s.push("webgl aliased point size range:" + e(o.getParameter(o.ALIASED_POINT_SIZE_RANGE))), s.push("webgl alpha bits:" + o.getParameter(o.ALPHA_BITS)), s.push("webgl antialiasing:" + (o.getContextAttributes().antialias ? "yes" : "no")), s.push("webgl blue bits:" + o.getParameter(o.BLUE_BITS)), s.push("webgl depth bits:" + o.getParameter(o.DEPTH_BITS)), s.push("webgl green bits:" + o.getParameter(o.GREEN_BITS)), s.push("webgl max anisotropy:" + function (e) {
          var t = e.getExtension("EXT_texture_filter_anisotropic") || e.getExtension("WEBKIT_EXT_texture_filter_anisotropic") || e.getExtension("MOZ_EXT_texture_filter_anisotropic");
          if (t) {
            var n = e.getParameter(t.MAX_TEXTURE_MAX_ANISOTROPY_EXT);
            return 0 === n && (n = 2), n
          }
          return null
        }(o)), s.push("webgl max combined texture image units:" + o.getParameter(o.MAX_COMBINED_TEXTURE_IMAGE_UNITS)), s.push("webgl max cube map texture size:" + o.getParameter(o.MAX_CUBE_MAP_TEXTURE_SIZE)), s.push("webgl max fragment uniform vectors:" + o.getParameter(o.MAX_FRAGMENT_UNIFORM_VECTORS)), s.push("webgl max render buffer size:" + o.getParameter(o.MAX_RENDERBUFFER_SIZE)), s.push("webgl max texture image units:" + o.getParameter(o.MAX_TEXTURE_IMAGE_UNITS)), s.push("webgl max texture size:" + o.getParameter(o.MAX_TEXTURE_SIZE)), s.push("webgl max varying vectors:" + o.getParameter(o.MAX_VARYING_VECTORS)), s.push("webgl max vertex attribs:" + o.getParameter(o.MAX_VERTEX_ATTRIBS)), s.push("webgl max vertex texture image units:" + o.getParameter(o.MAX_VERTEX_TEXTURE_IMAGE_UNITS)), s.push("webgl max vertex uniform vectors:" + o.getParameter(o.MAX_VERTEX_UNIFORM_VECTORS)), s.push("webgl max viewport dims:" + e(o.getParameter(o.MAX_VIEWPORT_DIMS))), s.push("webgl red bits:" + o.getParameter(o.RED_BITS)), s.push("webgl renderer:" + o.getParameter(o.RENDERER)), s.push("webgl shading language version:" + o.getParameter(o.SHADING_LANGUAGE_VERSION)), s.push("webgl stencil bits:" + o.getParameter(o.STENCIL_BITS)), s.push("webgl vendor:" + o.getParameter(o.VENDOR)), s.push("webgl version:" + o.getParameter(o.VERSION));
        try {
          var l = o.getExtension("WEBGL_debug_renderer_info");
          l && (s.push("webgl unmasked vendor:" + o.getParameter(l.UNMASKED_VENDOR_WEBGL)), s.push("webgl unmasked renderer:" + o.getParameter(l.UNMASKED_RENDERER_WEBGL)))
        } catch (e) {
        }
        if (!o.getShaderPrecisionFormat) return s.join("~");
        var d = this;
        return d.each(["FLOAT", "INT"], (function (r) {
          d.each(["VERTEX", "FRAGMENT"], (function (a) {
            d.each(["HIGH", "MEDIUM", "LOW"], (function (i) {
              d.each(["precision", "rangeMin", "rangeMax"], (function (e) {
                var t = o.getShaderPrecisionFormat(o[a + "_SHADER"], o[i + "_" + r])[e];
                "precision" !== e && (e = "precision " + e);
                var n = ["webgl ", a.toLowerCase(), " shader ", i.toLowerCase(), " ", r.toLowerCase(), " ", e, ":", t];
                s.push(n.join(""))
              }))
            }))
          }))
        })), s.join("~")
      }, getWebglVendorAndRenderer: function () {
        try {
          var e = this.getWebglCanvas(), t = e.getExtension("WEBGL_debug_renderer_info");
          return e.getParameter(t.UNMASKED_VENDOR_WEBGL) + "~" + e.getParameter(t.UNMASKED_RENDERER_WEBGL)
        } catch (e) {
          return null
        }
      }, getAdBlock: function () {
        var e = document.createElement("div");
        e.innerHTML = "&nbsp;";
        var t = !(e.className = "adsbox");
        try {
          document.body.appendChild(e), t = 0 === document.getElementsByClassName("adsbox")[0].offsetHeight, document.body.removeChild(e)
        } catch (e) {
          t = !1
        }
        return t
      }, getHasLiedLanguages: function () {
        if (void 0 !== navigator.languages) try {
          if (navigator.languages[0].substr(0, 2) !== navigator.language.substr(0, 2)) return !0
        } catch (e) {
          return !0
        }
        return !1
      }, getHasLiedResolution: function () {
        return window.screen.width < window.screen.availWidth || window.screen.height < window.screen.availHeight
      }, getHasLiedOs: function () {
        var e, t = navigator.userAgent.toLowerCase(), n = navigator.oscpu, i = navigator.platform.toLowerCase();
        if (e = 0 <= t.indexOf("windows phone") ? "Windows Phone" : 0 <= t.indexOf("win") ? "Windows" : 0 <= t.indexOf("android") ? "Android" : 0 <= t.indexOf("linux") ? "Linux" : 0 <= t.indexOf("iphone") || 0 <= t.indexOf("ipad") ? "iOS" : 0 <= t.indexOf("mac") ? "Mac" : "Other", ("ontouchstart" in window || 0 < navigator.maxTouchPoints || 0 < navigator.msMaxTouchPoints) && "Windows Phone" !== e && "Android" !== e && "iOS" !== e && "Other" !== e) return !0;
        if (void 0 !== n) {
          if (0 <= (n = n.toLowerCase()).indexOf("win") && "Windows" !== e && "Windows Phone" !== e) return !0;
          if (0 <= n.indexOf("linux") && "Linux" !== e && "Android" !== e) return !0;
          if (0 <= n.indexOf("mac") && "Mac" !== e && "iOS" !== e) return !0;
          if ((-1 === n.indexOf("win") && -1 === n.indexOf("linux") && -1 === n.indexOf("mac")) != ("Other" === e)) return !0
        }
        return 0 <= i.indexOf("win") && "Windows" !== e && "Windows Phone" !== e || (0 <= i.indexOf("linux") || 0 <= i.indexOf("android") || 0 <= i.indexOf("pike")) && "Linux" !== e && "Android" !== e || (0 <= i.indexOf("mac") || 0 <= i.indexOf("ipad") || 0 <= i.indexOf("ipod") || 0 <= i.indexOf("iphone")) && "Mac" !== e && "iOS" !== e || (-1 === i.indexOf("win") && -1 === i.indexOf("linux") && -1 === i.indexOf("mac")) != ("Other" === e) || void 0 === navigator.plugins && "Windows" !== e && "Windows Phone" !== e
      }, getHasLiedBrowser: function () {
        var e, t = navigator.userAgent.toLowerCase(), n = navigator.productSub;
        if (("Chrome" == (e = 0 <= t.indexOf("firefox") ? "Firefox" : 0 <= t.indexOf("opera") || 0 <= t.indexOf("opr") ? "Opera" : 0 <= t.indexOf("chrome") ? "Chrome" : 0 <= t.indexOf("safari") ? "Safari" : 0 <= t.indexOf("trident") ? "Internet Explorer" : "Other") || "Safari" === e || "Opera" === e) && "20030107" !== n) return !0;
        var i, a = eval.toString().length;
        if (37 === a && "Safari" !== e && "Firefox" !== e && "Other" !== e) return !0;
        if (39 === a && "Internet Explorer" !== e && "Other" !== e) return !0;
        if (33 === a && "Chrome" !== e && "Opera" !== e && "Other" !== e) return !0;
        try {
          throw"a"
        } catch (e) {
          try {
            e.toSource(), i = !0
          } catch (e) {
            i = !1
          }
        }
        return !(!i || "Firefox" === e || "Other" === e)
      }, isCanvasSupported: function () {
        var e = document.createElement("canvas");
        return !(!e.getContext || !e.getContext("2d"))
      }, isWebGlSupported: function () {
        if (!this.isCanvasSupported()) return !1;
        var e = this.getWebglCanvas();
        return !!window.WebGLRenderingContext && !!e
      }, isIE: function () {
        return "Microsoft Internet Explorer" === navigator.appName || !("Netscape" !== navigator.appName || !/Trident/.test(navigator.userAgent))
      }, hasSwfObjectLoaded: function () {
        return void 0 !== window.swfobject
      }, hasMinFlashInstalled: function () {
        return window.swfobject.hasFlashPlayerVersion("9.0.0")
      }, addFlashDivNode: function () {
        var e = document.createElement("div");
        e.setAttribute("id", this.options.swfContainerId), document.body.appendChild(e)
      }, loadSwfAndDetectFonts: function (t) {
        var e = "___fp_swf_loaded";
        window[e] = function (e) {
          t(e)
        };
        var n = this.options.swfContainerId;
        this.addFlashDivNode();
        var i = {onReady: e};
        window.swfobject.embedSWF(this.options.swfPath, n, "1", "1", "9.0.0", !1, i, {
          allowScriptAccess: "always",
          menu: "false"
        }, {})
      }, getWebglCanvas: function () {
        var e = document.createElement("canvas"), t = null;
        try {
          t = e.getContext("webgl") || e.getContext("experimental-webgl")
        } catch (e) {
        }
        return t || (t = null), t
      }, each: function (e, t, n) {
        if (null !== e) if (this.nativeForEach && e.forEach === this.nativeForEach) e.forEach(t, n); else if (e.length === +e.length) {
          for (var i = 0, a = e.length; i < a; i++) if (t.call(n, e[i], i, e) === {}) return
        } else for (var r in e) if (e.hasOwnProperty(r) && t.call(n, e[r], r, e) === {}) return
      }, map: function (e, i, a) {
        var r = [];
        return null == e ? r : this.nativeMap && e.map === this.nativeMap ? e.map(i, a) : (this.each(e, (function (e, t, n) {
          r[r.length] = i.call(a, e, t, n)
        })), r)
      }, x64Add: function (e, t) {
        e = [e[0] >>> 16, 65535 & e[0], e[1] >>> 16, 65535 & e[1]], t = [t[0] >>> 16, 65535 & t[0], t[1] >>> 16, 65535 & t[1]];
        var n = [0, 0, 0, 0];
        return n[3] += e[3] + t[3], n[2] += n[3] >>> 16, n[3] &= 65535, n[2] += e[2] + t[2], n[1] += n[2] >>> 16, n[2] &= 65535, n[1] += e[1] + t[1], n[0] += n[1] >>> 16, n[1] &= 65535, n[0] += e[0] + t[0], n[0] &= 65535, [n[0] << 16 | n[1], n[2] << 16 | n[3]]
      }, x64Multiply: function (e, t) {
        e = [e[0] >>> 16, 65535 & e[0], e[1] >>> 16, 65535 & e[1]], t = [t[0] >>> 16, 65535 & t[0], t[1] >>> 16, 65535 & t[1]];
        var n = [0, 0, 0, 0];
        return n[3] += e[3] * t[3], n[2] += n[3] >>> 16, n[3] &= 65535, n[2] += e[2] * t[3], n[1] += n[2] >>> 16, n[2] &= 65535, n[2] += e[3] * t[2], n[1] += n[2] >>> 16, n[2] &= 65535, n[1] += e[1] * t[3], n[0] += n[1] >>> 16, n[1] &= 65535, n[1] += e[2] * t[2], n[0] += n[1] >>> 16, n[1] &= 65535, n[1] += e[3] * t[1], n[0] += n[1] >>> 16, n[1] &= 65535, n[0] += e[0] * t[3] + e[1] * t[2] + e[2] * t[1] + e[3] * t[0], n[0] &= 65535, [n[0] << 16 | n[1], n[2] << 16 | n[3]]
      }, x64Rotl: function (e, t) {
        return 32 == (t %= 64) ? [e[1], e[0]] : t < 32 ? [e[0] << t | e[1] >>> 32 - t, e[1] << t | e[0] >>> 32 - t] : (t -= 32, [e[1] << t | e[0] >>> 32 - t, e[0] << t | e[1] >>> 32 - t])
      }, x64LeftShift: function (e, t) {
        return 0 == (t %= 64) ? e : t < 32 ? [e[0] << t | e[1] >>> 32 - t, e[1] << t] : [e[1] << t - 32, 0]
      }, x64Xor: function (e, t) {
        return [e[0] ^ t[0], e[1] ^ t[1]]
      }, x64Fmix: function (e) {
        return e = this.x64Xor(e, [0, e[0] >>> 1]), e = this.x64Multiply(e, [4283543511, 3981806797]), e = this.x64Xor(e, [0, e[0] >>> 1]), e = this.x64Multiply(e, [3301882366, 444984403]), this.x64Xor(e, [0, e[0] >>> 1])
      }, x64hash128: function (e, t) {
        t = t || 0;
        for (var n = (e = e || "").length % 16, i = e.length - n, a = [0, t], r = [0, t], o = [0, 0], s = [0, 0], l = [2277735313, 289559509], d = [1291169091, 658871167], u = 0; u < i; u += 16) o = [255 & e.charCodeAt(u + 4) | (255 & e.charCodeAt(u + 5)) << 8 | (255 & e.charCodeAt(u + 6)) << 16 | (255 & e.charCodeAt(u + 7)) << 24, 255 & e.charCodeAt(u) | (255 & e.charCodeAt(u + 1)) << 8 | (255 & e.charCodeAt(u + 2)) << 16 | (255 & e.charCodeAt(u + 3)) << 24], s = [255 & e.charCodeAt(u + 12) | (255 & e.charCodeAt(u + 13)) << 8 | (255 & e.charCodeAt(u + 14)) << 16 | (255 & e.charCodeAt(u + 15)) << 24, 255 & e.charCodeAt(u + 8) | (255 & e.charCodeAt(u + 9)) << 8 | (255 & e.charCodeAt(u + 10)) << 16 | (255 & e.charCodeAt(u + 11)) << 24], o = this.x64Multiply(o, l), o = this.x64Rotl(o, 31), o = this.x64Multiply(o, d), a = this.x64Xor(a, o), a = this.x64Rotl(a, 27), a = this.x64Add(a, r), a = this.x64Add(this.x64Multiply(a, [0, 5]), [0, 1390208809]), s = this.x64Multiply(s, d), s = this.x64Rotl(s, 33), s = this.x64Multiply(s, l), r = this.x64Xor(r, s), r = this.x64Rotl(r, 31), r = this.x64Add(r, a), r = this.x64Add(this.x64Multiply(r, [0, 5]), [0, 944331445]);
        switch (o = [0, 0], s = [0, 0], n) {
          case 15:
            s = this.x64Xor(s, this.x64LeftShift([0, e.charCodeAt(u + 14)], 48));
          case 14:
            s = this.x64Xor(s, this.x64LeftShift([0, e.charCodeAt(u + 13)], 40));
          case 13:
            s = this.x64Xor(s, this.x64LeftShift([0, e.charCodeAt(u + 12)], 32));
          case 12:
            s = this.x64Xor(s, this.x64LeftShift([0, e.charCodeAt(u + 11)], 24));
          case 11:
            s = this.x64Xor(s, this.x64LeftShift([0, e.charCodeAt(u + 10)], 16));
          case 10:
            s = this.x64Xor(s, this.x64LeftShift([0, e.charCodeAt(u + 9)], 8));
          case 9:
            s = this.x64Xor(s, [0, e.charCodeAt(u + 8)]), s = this.x64Multiply(s, d), s = this.x64Rotl(s, 33), s = this.x64Multiply(s, l), r = this.x64Xor(r, s);
          case 8:
            o = this.x64Xor(o, this.x64LeftShift([0, e.charCodeAt(u + 7)], 56));
          case 7:
            o = this.x64Xor(o, this.x64LeftShift([0, e.charCodeAt(u + 6)], 48));
          case 6:
            o = this.x64Xor(o, this.x64LeftShift([0, e.charCodeAt(u + 5)], 40));
          case 5:
            o = this.x64Xor(o, this.x64LeftShift([0, e.charCodeAt(u + 4)], 32));
          case 4:
            o = this.x64Xor(o, this.x64LeftShift([0, e.charCodeAt(u + 3)], 24));
          case 3:
            o = this.x64Xor(o, this.x64LeftShift([0, e.charCodeAt(u + 2)], 16));
          case 2:
            o = this.x64Xor(o, this.x64LeftShift([0, e.charCodeAt(u + 1)], 8));
          case 1:
            o = this.x64Xor(o, [0, e.charCodeAt(u)]), o = this.x64Multiply(o, l), o = this.x64Rotl(o, 31), o = this.x64Multiply(o, d), a = this.x64Xor(a, o)
        }
        return a = this.x64Xor(a, [0, e.length]), r = this.x64Xor(r, [0, e.length]), a = this.x64Add(a, r), r = this.x64Add(r, a), a = this.x64Fmix(a), r = this.x64Fmix(r), a = this.x64Add(a, r), r = this.x64Add(r, a), ("00000000" + (a[0] >>> 0).toString(16)).slice(-8) + ("00000000" + (a[1] >>> 0).toString(16)).slice(-8) + ("00000000" + (r[0] >>> 0).toString(16)).slice(-8) + ("00000000" + (r[1] >>> 0).toString(16)).slice(-8)
      }
    }, t.VERSION = "1.8.0", t
  }))
}]);