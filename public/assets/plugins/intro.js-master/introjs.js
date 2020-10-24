/*!
 * Intro.js v3.0.1
 * https://github.com/usablica/intro.js
 *
 * Copyright (C) 2017-2020 Afshin Mehrabani (@afshinmeh).
 * https://raw.githubusercontent.com/usablica/intro.js/master/license.md
 *
 * Date: Sat, 17 Oct 2020 10:36:20 GMT
 */
!function (t, e) {
    "object" == typeof exports && "undefined" != typeof module ? module.exports = e() : "function" == typeof define && define.amd ? define(e) : (t = t || self).introJs = e()
}(this, (function () {
    "use strict";

    function t(e) {
        return (t = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (t) {
            return typeof t
        } : function (t) {
            return t && "function" == typeof Symbol && t.constructor === Symbol && t !== Symbol.prototype ? "symbol" : typeof t
        })(e)
    }

    var e, n = (e = {}, function (t) {
        var n = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : "introjs-stamp";
        return e[n] = e[n] || 0, void 0 === t[n] && (t[n] = e[n]++), t[n]
    });

    function i(t, e, n) {
        if (t) for (var i = 0, o = t.length; i < o; i++) e(t[i], i);
        "function" == typeof n && n()
    }

    function o(t, e) {
        if (t instanceof SVGElement) {
            var n = t.getAttribute("class") || "";
            t.setAttribute("class", n.replace(e, "").replace(/^\s+|\s+$/g, ""))
        } else t.className = t.className.replace(e, "").replace(/^\s+|\s+$/g, "")
    }

    var r = new function () {
        var t = "introjs_event";
        this._id = function (t, e, i, o) {
            return e + n(i) + (o ? "_".concat(n(o)) : "")
        }, this.on = function (e, n, i, o, r) {
            var s = this._id.apply(this, arguments), l = function (t) {
                return i.call(o || e, t || window.event)
            };
            "addEventListener" in e ? e.addEventListener(n, l, r) : "attachEvent" in e && e.attachEvent("on".concat(n), l), e[t] = e[t] || {}, e[t][s] = l
        }, this.off = function (e, n, i, o, r) {
            var s = this._id.apply(this, arguments), l = e[t] && e[t][s];
            l && ("removeEventListener" in e ? e.removeEventListener(n, l, r) : "detachEvent" in e && e.detachEvent("on".concat(n), l), e[t][s] = null)
        }
    };

    function s(t, e) {
        if (t instanceof SVGElement) {
            var n = t.getAttribute("class") || "";
            t.setAttribute("class", "".concat(n, " ").concat(e))
        } else {
            if (void 0 !== t.classList) i(e.split(" "), (function (e) {
                t.classList.add(e)
            })); else t.className.match(e) || (t.className += " ".concat(e))
        }
    }

    function l(t, e) {
        var n = "";
        return t.currentStyle ? n = t.currentStyle[e] : document.defaultView && document.defaultView.getComputedStyle && (n = document.defaultView.getComputedStyle(t, null).getPropertyValue(e)), n && n.toLowerCase ? n.toLowerCase() : n
    }

    function a(t, e) {
        var n = e.offsetTop;
        t.scrollTop = n - t.offsetTop
    }

    function c(t) {
        var e = window.getComputedStyle(t), n = "absolute" === e.position, i = /(auto|scroll)/;
        if ("fixed" === e.position) return document.body;
        for (var o = t; o = o.parentElement;) if (e = window.getComputedStyle(o), (!n || "static" !== e.position) && i.test(e.overflow + e.overflowY + e.overflowX)) return o;
        return document.body
    }

    function h() {
        if (void 0 !== window.innerWidth) return {width: window.innerWidth, height: window.innerHeight};
        var t = document.documentElement;
        return {width: t.clientWidth, height: t.clientHeight}
    }

    function u(t, e, n) {
        var i, o = e.element;
        if ("off" !== t && (this._options.scrollToElement && (i = "tooltip" === t ? n.getBoundingClientRect() : o.getBoundingClientRect(), !function (t) {
            var e = t.getBoundingClientRect();
            return e.top >= 0 && e.left >= 0 && e.bottom + 80 <= window.innerHeight && e.right <= window.innerWidth
        }(o)))) {
            var r = h().height;
            i.bottom - (i.bottom - i.top) < 0 || o.clientHeight > r ? window.scrollBy(0, i.top - (r / 2 - i.height / 2) - this._options.scrollPadding) : window.scrollBy(0, i.top - (r / 2 - i.height / 2) + this._options.scrollPadding)
        }
    }

    function p(t) {
        t.setAttribute("role", "button"), t.tabIndex = 0
    }

    function d(t) {
        var e = document.body, n = document.documentElement, i = window.pageYOffset || n.scrollTop || e.scrollTop,
            o = window.pageXOffset || n.scrollLeft || e.scrollLeft, r = t.getBoundingClientRect();
        return {top: r.top + i, width: r.width, height: r.height, left: r.left + o}
    }

    function f(t) {
        var e = t.parentNode;
        return !(!e || "HTML" === e.nodeName) && ("fixed" === l(t, "position") || f(e))
    }

    function m(t) {
        if (t) {
            if (!this._introItems[this._currentStep]) return;
            var e = this._introItems[this._currentStep], n = d(e.element), i = this._options.helperElementPadding;
            f(e.element) ? s(t, "introjs-fixedTooltip") : o(t, "introjs-fixedTooltip"), "floating" === e.position && (i = 0), t.style.cssText = "width: ".concat(n.width + i, "px; height:").concat(n.height + i, "px; top:").concat(n.top - i / 2, "px;left: ").concat(n.left - i / 2, "px;")
        }
    }

    function b(t, e, n, i, o) {
        return t.left + e + n.width > i.width ? (o.left = "".concat(i.width - n.width - t.left, "px"), !1) : (o.left = "".concat(e, "px"), !0)
    }

    function g(t, e, n, i) {
        return t.left + t.width - e - n.width < 0 ? (i.style.left = "".concat(-t.left, "px"), !1) : (i.style.right = "".concat(e, "px"), !0)
    }

    function v(t, e) {
        t.includes(e) && t.splice(t.indexOf(e), 1)
    }

    function y(t, e, n) {
        var i = this._options.positionPrecedence.slice(), o = h(), r = d(e).height + 10, s = d(e).width + 20,
            l = t.getBoundingClientRect(), a = "floating";
        l.bottom + r > o.height && v(i, "bottom"), l.top - r < 0 && v(i, "top"), l.right + s > o.width && v(i, "right"), l.left - s < 0 && v(i, "left");
        var c, u, p = -1 !== (u = (c = n || "").indexOf("-")) ? c.substr(u) : "";
        return n && (n = n.split("-")[0]), i.length && (a = "auto" !== n && i.includes(n) ? n : i[0]), ["top", "bottom"].includes(a) && (a += function (t, e, n, i) {
            var o = n.width, r = e / 2, s = Math.min(o, window.screen.width),
                l = ["-left-aligned", "-middle-aligned", "-right-aligned"];
            return s - t < e && v(l, "-left-aligned"), (t < r || s - t < r) && v(l, "-middle-aligned"), t < e && v(l, "-right-aligned"), l.length ? l.includes(i) ? i : l[0] : "-middle-aligned"
        }(l.left, s, o, p)), a
    }

    function _(t, e, n, i, o) {
        var r, l, a, c, u, p = "";
        if (o = o || !1, e.style.top = null, e.style.right = null, e.style.bottom = null, e.style.left = null, e.style.marginLeft = null, e.style.marginTop = null, n.style.display = "inherit", null != i && (i.style.top = null, i.style.left = null), this._introItems[this._currentStep]) switch (p = "string" == typeof (r = this._introItems[this._currentStep]).tooltipClass ? r.tooltipClass : this._options.tooltipClass, e.className = "introjs-tooltip ".concat(p).replace(/^\s+|\s+$/g, ""), e.setAttribute("role", "dialog"), "floating" !== (u = this._introItems[this._currentStep].position) && (u = y.call(this, t, e, u)), a = d(t), l = d(e), c = h(), s(e, "introjs-".concat(u)), u) {
            case"top-right-aligned":
                n.className = "introjs-arrow bottom-right";
                var f = 0;
                g(a, f, l, e), e.style.bottom = "".concat(a.height + 20, "px");
                break;
            case"top-middle-aligned":
                n.className = "introjs-arrow bottom-middle";
                var m = a.width / 2 - l.width / 2;
                o && (m += 5), g(a, m, l, e) && (e.style.right = null, b(a, m, l, c, e)), e.style.bottom = "".concat(a.height + 20, "px");
                break;
            case"top-left-aligned":
            case"top":
                n.className = "introjs-arrow bottom", b(a, o ? 0 : 15, l, c, e), e.style.bottom = "".concat(a.height + 20, "px");
                break;
            case"right":
                e.style.left = "".concat(a.width + 20, "px"), a.top + l.height > c.height ? (n.className = "introjs-arrow left-bottom", e.style.top = "-".concat(l.height - a.height - 20, "px")) : n.className = "introjs-arrow left";
                break;
            case"left":
                o || !0 !== this._options.showStepNumbers || (e.style.top = "15px"), a.top + l.height > c.height ? (e.style.top = "-".concat(l.height - a.height - 20, "px"), n.className = "introjs-arrow right-bottom") : n.className = "introjs-arrow right", e.style.right = "".concat(a.width + 20, "px");
                break;
            case"floating":
                n.style.display = "none", e.style.left = "50%", e.style.top = "50%", e.style.marginLeft = "-".concat(l.width / 2, "px"), e.style.marginTop = "-".concat(l.height / 2, "px"), null != i && (i.style.left = "-".concat(l.width / 2 + 18, "px"), i.style.top = "-".concat(l.height / 2 + 18, "px"));
                break;
            case"bottom-right-aligned":
                n.className = "introjs-arrow top-right", g(a, f = 0, l, e), e.style.top = "".concat(a.height + 20, "px");
                break;
            case"bottom-middle-aligned":
                n.className = "introjs-arrow top-middle", m = a.width / 2 - l.width / 2, o && (m += 5), g(a, m, l, e) && (e.style.right = null, b(a, m, l, c, e)), e.style.top = "".concat(a.height + 20, "px");
                break;
            default:
                n.className = "introjs-arrow top", b(a, 0, l, c, e), e.style.top = "".concat(a.height + 20, "px")
        }
    }

    function w() {
        i(document.querySelectorAll(".introjs-showElement"), (function (t) {
            o(t, /introjs-[a-zA-Z]+/g)
        }))
    }

    function C() {
        return parseInt(this._currentStep + 1, 10) / this._introItems.length * 100
    }

    function j() {
        var t = document.querySelector(".introjs-disableInteraction");
        null === t && ((t = document.createElement("div")).className = "introjs-disableInteraction", this._targetElement.appendChild(t)), m.call(this, t)
    }

    function S(t) {
        void 0 !== this._introChangeCallback && this._introChangeCallback.call(this, t.element);
        var e, n, r, h, d = this, f = document.querySelector(".introjs-helperLayer"),
            b = document.querySelector(".introjs-tooltipReferenceLayer"), g = "introjs-helperLayer";
        if ("string" == typeof t.highlightClass && (g += " ".concat(t.highlightClass)), "string" == typeof this._options.highlightClass && (g += " ".concat(this._options.highlightClass)), null !== f) {
            var v = b.querySelector(".introjs-helperNumberLayer"), y = b.querySelector(".introjs-tooltiptext"),
                S = b.querySelector(".introjs-arrow"), k = b.querySelector(".introjs-tooltip");
            if (r = b.querySelector(".introjs-skipbutton"), n = b.querySelector(".introjs-prevbutton"), e = b.querySelector(".introjs-nextbutton"), f.className = g, k.style.opacity = 0, k.style.display = "none", null !== v) {
                var x = this._introItems[t.step - 2 >= 0 ? t.step - 2 : 0];
                (null !== x && "forward" === this._direction && "floating" === x.position || "backward" === this._direction && "floating" === t.position) && (v.style.opacity = 0)
            }
            (h = c(t.element)) !== document.body && a(h, t.element), m.call(d, f), m.call(d, b), i(document.querySelectorAll(".introjs-fixParent"), (function (t) {
                o(t, /introjs-fixParent/g)
            })), w(), d._lastShowElementTimer && window.clearTimeout(d._lastShowElementTimer), d._lastShowElementTimer = window.setTimeout((function () {
                null !== v && (v.innerHTML = t.step), y.innerHTML = t.intro, k.style.display = "block", _.call(d, t.element, k, S, v), d._options.showBullets && (b.querySelector(".introjs-bullets li > a.active").className = "", b.querySelector('.introjs-bullets li > a[data-stepnumber="'.concat(t.step, '"]')).className = "active"), b.querySelector(".introjs-progress .introjs-progressbar").style.cssText = "width:".concat(C.call(d), "%;"), b.querySelector(".introjs-progress .introjs-progressbar").setAttribute("aria-valuenow", C.call(d)), k.style.opacity = 1, v && (v.style.opacity = 1), null != r && /introjs-donebutton/gi.test(r.className) ? r.focus() : null != e && e.focus(), u.call(d, t.scrollTo, t, y)
            }), 350)
        } else {
            var A = document.createElement("div"), L = document.createElement("div"), T = document.createElement("div"),
                I = document.createElement("div"), P = document.createElement("div"), q = document.createElement("div"),
                B = document.createElement("div"), H = document.createElement("div");
            A.className = g, L.className = "introjs-tooltipReferenceLayer", (h = c(t.element)) !== document.body && a(h, t.element), m.call(d, A), m.call(d, L), this._targetElement.appendChild(A), this._targetElement.appendChild(L), T.className = "introjs-arrow", P.className = "introjs-tooltiptext", P.innerHTML = t.intro, q.className = "introjs-bullets", !1 === this._options.showBullets && (q.style.display = "none");
            var M = document.createElement("ul");
            M.setAttribute("role", "tablist");
            var O = function () {
                d.goToStep(this.getAttribute("data-stepnumber"))
            };
            i(this._introItems, (function (e, n) {
                var i = e.step, o = document.createElement("li"), r = document.createElement("a");
                o.setAttribute("role", "presentation"), r.setAttribute("role", "tab"), r.onclick = O, n === t.step - 1 && (r.className = "active"), p(r), r.innerHTML = "&nbsp;", r.setAttribute("data-stepnumber", i), o.appendChild(r), M.appendChild(o)
            })), q.appendChild(M), B.className = "introjs-progress", !1 === this._options.showProgress && (B.style.display = "none");
            var R = document.createElement("div");
            R.className = "introjs-progressbar", R.setAttribute("role", "progress"), R.setAttribute("aria-valuemin", 0), R.setAttribute("aria-valuemax", 100), R.setAttribute("aria-valuenow", C.call(this)), R.style.cssText = "width:".concat(C.call(this), "%;"), B.appendChild(R), H.className = "introjs-tooltipbuttons", !1 === this._options.showButtons && (H.style.display = "none"), I.className = "introjs-tooltip", I.appendChild(P), I.appendChild(q), I.appendChild(B);
            var V = document.createElement("span");
            !0 === this._options.showStepNumbers && (V.className = "introjs-helperNumberLayer", V.innerHTML = t.step, L.appendChild(V)), I.appendChild(T), L.appendChild(I), (e = document.createElement("a")).onclick = function () {
                d._introItems.length - 1 !== d._currentStep && E.call(d)
            }, p(e), e.innerHTML = this._options.nextLabel, (n = document.createElement("a")).onclick = function () {
                0 !== d._currentStep && N.call(d)
            }, p(n), n.innerHTML = this._options.prevLabel, (r = document.createElement("a")).className = "".concat(this._options.buttonClass, " introjs-skipbutton "), p(r), r.innerHTML = this._options.skipLabel, r.onclick = function () {
                d._introItems.length - 1 === d._currentStep && "function" == typeof d._introCompleteCallback && d._introCompleteCallback.call(d), "function" == typeof d._introSkipCallback && d._introSkipCallback.call(d), Q.call(d, d._targetElement)
            }, H.appendChild(r), this._introItems.length > 1 && (H.appendChild(n), H.appendChild(e)), I.appendChild(H), _.call(d, t.element, I, T, V), u.call(this, t.scrollTo, t, I)
        }
        var z = d._targetElement.querySelector(".introjs-disableInteraction");
        z && z.parentNode.removeChild(z), t.disableInteraction && j.call(d), 0 === this._currentStep && this._introItems.length > 1 ? (null != r && (r.className = "".concat(this._options.buttonClass, " introjs-skipbutton")), null != e && (e.className = "".concat(this._options.buttonClass, " introjs-nextbutton")), !0 === this._options.hidePrev ? (null != n && (n.className = "".concat(this._options.buttonClass, " introjs-prevbutton introjs-hidden")), null != e && s(e, "introjs-fullbutton")) : null != n && (n.className = "".concat(this._options.buttonClass, " introjs-prevbutton introjs-disabled")), null != r && (r.innerHTML = this._options.skipLabel)) : this._introItems.length - 1 === this._currentStep || 1 === this._introItems.length ? (null != r && (r.innerHTML = this._options.doneLabel, s(r, "introjs-donebutton")), null != n && (n.className = "".concat(this._options.buttonClass, " introjs-prevbutton")), !0 === this._options.hideNext ? (null != e && (e.className = "".concat(this._options.buttonClass, " introjs-nextbutton introjs-hidden")), null != n && s(n, "introjs-fullbutton")) : null != e && (e.className = "".concat(this._options.buttonClass, " introjs-nextbutton introjs-disabled"))) : (null != r && (r.className = "".concat(this._options.buttonClass, " introjs-skipbutton")), null != n && (n.className = "".concat(this._options.buttonClass, " introjs-prevbutton")), null != e && (e.className = "".concat(this._options.buttonClass, " introjs-nextbutton")), null != r && (r.innerHTML = this._options.skipLabel)), null != n && n.setAttribute("role", "button"), null != e && e.setAttribute("role", "button"), null != r && r.setAttribute("role", "button"), null != e && e.focus(), function (t) {
            var e, n = t.element;
            if (n instanceof SVGElement) for (e = n.parentNode; null !== n.parentNode && e.tagName && "body" !== e.tagName.toLowerCase();) "svg" === e.tagName.toLowerCase() && s(e, "introjs-showElement introjs-relativePosition"), e = e.parentNode;
            s(n, "introjs-showElement");
            var i = l(n, "position");
            for ("absolute" !== i && "relative" !== i && "fixed" !== i && s(n, "introjs-relativePosition"), e = n.parentNode; null !== e && e.tagName && "body" !== e.tagName.toLowerCase();) {
                var o = l(e, "z-index"), r = parseFloat(l(e, "opacity")),
                    a = l(e, "transform") || l(e, "-webkit-transform") || l(e, "-moz-transform") || l(e, "-ms-transform") || l(e, "-o-transform");
                (/[0-9]+/.test(o) || r < 1 || "none" !== a && void 0 !== a) && s(e, "introjs-fixParent"), e = e.parentNode
            }
        }(t), void 0 !== this._introAfterChangeCallback && this._introAfterChangeCallback.call(this, t.element)
    }

    function k(t) {
        this._currentStep = t - 2, void 0 !== this._introItems && E.call(this)
    }

    function x(t) {
        this._currentStepNumber = t, void 0 !== this._introItems && E.call(this)
    }

    function E() {
        var t = this;
        this._direction = "forward", void 0 !== this._currentStepNumber && i(this._introItems, (function (e, n) {
            e.step === t._currentStepNumber && (t._currentStep = n - 1, t._currentStepNumber = void 0)
        })), void 0 === this._currentStep ? this._currentStep = 0 : ++this._currentStep;
        var e = this._introItems[this._currentStep], n = !0;
        return void 0 !== this._introBeforeChangeCallback && (n = this._introBeforeChangeCallback.call(this, e.element)), !1 === n ? (--this._currentStep, !1) : this._introItems.length <= this._currentStep ? ("function" == typeof this._introCompleteCallback && this._introCompleteCallback.call(this), void Q.call(this, this._targetElement)) : void S.call(this, e)
    }

    function N() {
        if (this._direction = "backward", 0 === this._currentStep) return !1;
        --this._currentStep;
        var t = this._introItems[this._currentStep], e = !0;
        if (void 0 !== this._introBeforeChangeCallback && (e = this._introBeforeChangeCallback.call(this, t.element)), !1 === e) return ++this._currentStep, !1;
        S.call(this, t)
    }

    function A() {
        return this._currentStep
    }

    function L(t) {
        var e = null === t.code ? t.which : t.code;
        if (null === e && (e = null === t.charCode ? t.keyCode : t.charCode), "Escape" !== e && 27 !== e || !0 !== this._options.exitOnEsc) {
            if ("ArrowLeft" === e || 37 === e) N.call(this); else if ("ArrowRight" === e || 39 === e) E.call(this); else if ("Enter" === e || 13 === e) {
                var n = t.target || t.srcElement;
                n && n.className.match("introjs-prevbutton") ? N.call(this) : n && n.className.match("introjs-skipbutton") ? (this._introItems.length - 1 === this._currentStep && "function" == typeof this._introCompleteCallback && this._introCompleteCallback.call(this), Q.call(this, this._targetElement)) : n && n.getAttribute("data-stepnumber") ? n.click() : E.call(this), t.preventDefault ? t.preventDefault() : t.returnValue = !1
            }
        } else Q.call(this, this._targetElement)
    }

    function T(e) {
        if (null === e || "object" !== t(e) || void 0 !== e.nodeType) return e;
        var n = {};
        for (var i in e) void 0 !== window.jQuery && e[i] instanceof window.jQuery ? n[i] = e[i] : n[i] = T(e[i]);
        return n
    }

    function I(t) {
        var e = document.querySelector(".introjs-hints");
        return e ? e.querySelectorAll(t) : []
    }

    function P(t) {
        var e = I('.introjs-hint[data-step="'.concat(t, '"]'))[0];
        D.call(this), e && s(e, "introjs-hidehint"), void 0 !== this._hintCloseCallback && this._hintCloseCallback.call(this, t)
    }

    function q() {
        var t = this;
        i(I(".introjs-hint"), (function (e) {
            P.call(t, e.getAttribute("data-step"))
        }))
    }

    function B() {
        var t = this, e = I(".introjs-hint");
        e && e.length ? i(e, (function (e) {
            H.call(t, e.getAttribute("data-step"))
        })) : F.call(this, this._targetElement)
    }

    function H(t) {
        var e = I('.introjs-hint[data-step="'.concat(t, '"]'))[0];
        e && o(e, /introjs-hidehint/g)
    }

    function M() {
        var t = this;
        i(I(".introjs-hint"), (function (e) {
            O.call(t, e.getAttribute("data-step"))
        }))
    }

    function O(t) {
        var e = I('.introjs-hint[data-step="'.concat(t, '"]'))[0];
        e && e.parentNode.removeChild(e)
    }

    function R() {
        var t = this, e = this, n = document.querySelector(".introjs-hints");
        null === n && ((n = document.createElement("div")).className = "introjs-hints");
        i(this._introItems, (function (i, o) {
            if (!document.querySelector('.introjs-hint[data-step="'.concat(o, '"]'))) {
                var r = document.createElement("a");
                p(r), r.onclick = function (t) {
                    return function (n) {
                        var i = n || window.event;
                        i.stopPropagation && i.stopPropagation(), null !== i.cancelBubble && (i.cancelBubble = !0), z.call(e, t)
                    }
                }(o), r.className = "introjs-hint", i.hintAnimation || s(r, "introjs-hint-no-anim"), f(i.element) && s(r, "introjs-fixedhint");
                var l = document.createElement("div");
                l.className = "introjs-hint-dot";
                var a = document.createElement("div");
                a.className = "introjs-hint-pulse", r.appendChild(l), r.appendChild(a), r.setAttribute("data-step", o), i.targetElement = i.element, i.element = r, V.call(t, i.hintPosition, r, i.targetElement), n.appendChild(r)
            }
        })), document.body.appendChild(n), void 0 !== this._hintsAddedCallback && this._hintsAddedCallback.call(this)
    }

    function V(t, e, n) {
        var i = e.style, o = d.call(this, n);
        switch (t) {
            default:
            case"top-left":
                i.left = "".concat(o.left, "px"), i.top = "".concat(o.top, "px");
                break;
            case"top-right":
                i.left = "".concat(o.left + o.width - 20, "px"), i.top = "".concat(o.top, "px");
                break;
            case"bottom-left":
                i.left = "".concat(o.left, "px"), i.top = "".concat(o.top + o.height - 20, "px");
                break;
            case"bottom-right":
                i.left = "".concat(o.left + o.width - 20, "px"), i.top = "".concat(o.top + o.height - 20, "px");
                break;
            case"middle-left":
                i.left = "".concat(o.left, "px"), i.top = "".concat(o.top + (o.height - 20) / 2, "px");
                break;
            case"middle-right":
                i.left = "".concat(o.left + o.width - 20, "px"), i.top = "".concat(o.top + (o.height - 20) / 2, "px");
                break;
            case"middle-middle":
                i.left = "".concat(o.left + (o.width - 20) / 2, "px"), i.top = "".concat(o.top + (o.height - 20) / 2, "px");
                break;
            case"bottom-middle":
                i.left = "".concat(o.left + (o.width - 20) / 2, "px"), i.top = "".concat(o.top + o.height - 20, "px");
                break;
            case"top-middle":
                i.left = "".concat(o.left + (o.width - 20) / 2, "px"), i.top = "".concat(o.top, "px")
        }
    }

    function z(t) {
        var e = document.querySelector('.introjs-hint[data-step="'.concat(t, '"]')), n = this._introItems[t];
        void 0 !== this._hintClickCallback && this._hintClickCallback.call(this, e, n, t);
        var i = D.call(this);
        if (parseInt(i, 10) !== t) {
            var o = document.createElement("div"), r = document.createElement("div"), s = document.createElement("div"),
                l = document.createElement("div");
            o.className = "introjs-tooltip", o.onclick = function (t) {
                t.stopPropagation ? t.stopPropagation() : t.cancelBubble = !0
            }, r.className = "introjs-tooltiptext";
            var a = document.createElement("p");
            a.innerHTML = n.hint;
            var c = document.createElement("a");
            c.className = this._options.buttonClass, c.setAttribute("role", "button"), c.innerHTML = this._options.hintButtonLabel, c.onclick = P.bind(this, t), r.appendChild(a), r.appendChild(c), s.className = "introjs-arrow", o.appendChild(s), o.appendChild(r), this._currentStep = e.getAttribute("data-step"), l.className = "introjs-tooltipReferenceLayer introjs-hintReference", l.setAttribute("data-step", e.getAttribute("data-step")), m.call(this, l), l.appendChild(o), document.body.appendChild(l), _.call(this, e, o, s, null, !0)
        }
    }

    function D() {
        var t = document.querySelector(".introjs-hintReference");
        if (t) {
            var e = t.getAttribute("data-step");
            return t.parentNode.removeChild(t), e
        }
    }

    function F(t) {
        var e = this;
        if (this._introItems = [], this._options.hints) i(this._options.hints, (function (t) {
            var n = T(t);
            "string" == typeof n.element && (n.element = document.querySelector(n.element)), n.hintPosition = n.hintPosition || e._options.hintPosition, n.hintAnimation = n.hintAnimation || e._options.hintAnimation, null !== n.element && e._introItems.push(n)
        })); else {
            var n = t.querySelectorAll("*[data-hint]");
            if (!n || !n.length) return !1;
            i(n, (function (t) {
                var n = t.getAttribute("data-hintanimation");
                n = n ? "true" === n : e._options.hintAnimation, e._introItems.push({
                    element: t,
                    hint: t.getAttribute("data-hint"),
                    hintPosition: t.getAttribute("data-hintposition") || e._options.hintPosition,
                    hintAnimation: n,
                    tooltipClass: t.getAttribute("data-tooltipclass"),
                    position: t.getAttribute("data-position") || e._options.tooltipPosition
                })
            }))
        }
        R.call(this), r.on(document, "click", D, this, !1), r.on(window, "resize", G, this, !0)
    }

    function G() {
        var t = this;
        i(this._introItems, (function (e) {
            var n = e.targetElement, i = e.hintPosition, o = e.element;
            void 0 !== n && V.call(t, i, o, n)
        }))
    }

    function W() {
        if (m.call(this, document.querySelector(".introjs-helperLayer")), m.call(this, document.querySelector(".introjs-tooltipReferenceLayer")), m.call(this, document.querySelector(".introjs-disableInteraction")), void 0 !== this._currentStep && null !== this._currentStep) {
            var t = document.querySelector(".introjs-helperNumberLayer"), e = document.querySelector(".introjs-arrow"),
                n = document.querySelector(".introjs-tooltip");
            _.call(this, this._introItems[this._currentStep].element, n, e, t)
        }
        return G.call(this), this
    }

    function $() {
        W.call(this)
    }

    function Q(t, e) {
        var n = !0;
        if (void 0 !== this._introBeforeExitCallback && (n = this._introBeforeExitCallback.call(this)), e || !1 !== n) {
            var s = t.querySelectorAll(".introjs-overlay");
            s && s.length && i(s, (function (t) {
                t.style.opacity = 0, window.setTimeout(function () {
                    this.parentNode && this.parentNode.removeChild(this)
                }.bind(t), 500)
            }));
            var l = t.querySelector(".introjs-helperLayer");
            l && l.parentNode.removeChild(l);
            var a = t.querySelector(".introjs-tooltipReferenceLayer");
            a && a.parentNode.removeChild(a);
            var c = t.querySelector(".introjs-disableInteraction");
            c && c.parentNode.removeChild(c);
            var h = document.querySelector(".introjsFloatingElement");
            h && h.parentNode.removeChild(h), w(), i(document.querySelectorAll(".introjs-fixParent"), (function (t) {
                o(t, /introjs-fixParent/g)
            })), r.off(window, "keydown", L, this, !0), r.off(window, "resize", $, this, !0), void 0 !== this._introExitCallback && this._introExitCallback.call(this), this._currentStep = void 0
        }
    }

    function X(t) {
        var e = document.createElement("div"), n = "", i = this;
        if (e.className = "introjs-overlay", t.tagName && "body" !== t.tagName.toLowerCase()) {
            var o = d(t);
            o && (n += "width: ".concat(o.width, "px; height:").concat(o.height, "px; top:").concat(o.top, "px;left: ").concat(o.left, "px;"), e.style.cssText = n)
        } else n += "top: 0;bottom: 0; left: 0;right: 0;position: fixed;", e.style.cssText = n;
        return t.appendChild(e), e.onclick = function () {
            !0 === i._options.exitOnOverlayClick && Q.call(i, t)
        }, window.setTimeout((function () {
            n += "opacity: ".concat(i._options.overlayOpacity.toString(), ";"), e.style.cssText = n
        }), 10), !0
    }

    function Y(t, e) {
        var n = this, o = t.querySelectorAll("*[data-intro]"), s = [];
        if (this._options.steps) i(this._options.steps, (function (t) {
            var e = T(t);
            if (e.step = s.length + 1, "string" == typeof e.element && (e.element = document.querySelector(e.element)), void 0 === e.element || null === e.element) {
                var i = document.querySelector(".introjsFloatingElement");
                null === i && ((i = document.createElement("div")).className = "introjsFloatingElement", document.body.appendChild(i)), e.element = i, e.position = "floating"
            }
            e.scrollTo = e.scrollTo || n._options.scrollTo, void 0 === e.disableInteraction && (e.disableInteraction = n._options.disableInteraction), null !== e.element && s.push(e)
        })); else {
            var l;
            if (o.length < 1) return !1;
            i(o, (function (t) {
                if ((!e || t.getAttribute("data-intro-group") === e) && "none" !== t.style.display) {
                    var i = parseInt(t.getAttribute("data-step"), 10);
                    l = void 0 !== t.getAttribute("data-disable-interaction") ? !!t.getAttribute("data-disable-interaction") : n._options.disableInteraction, i > 0 && (s[i - 1] = {
                        element: t,
                        intro: t.getAttribute("data-intro"),
                        step: parseInt(t.getAttribute("data-step"), 10),
                        tooltipClass: t.getAttribute("data-tooltipclass"),
                        highlightClass: t.getAttribute("data-highlightclass"),
                        position: t.getAttribute("data-position") || n._options.tooltipPosition,
                        scrollTo: t.getAttribute("data-scrollto") || n._options.scrollTo,
                        disableInteraction: l
                    })
                }
            }));
            var a = 0;
            i(o, (function (t) {
                if ((!e || t.getAttribute("data-intro-group") === e) && null === t.getAttribute("data-step")) {
                    for (; void 0 !== s[a];) a++;
                    l = void 0 !== t.getAttribute("data-disable-interaction") ? !!t.getAttribute("data-disable-interaction") : n._options.disableInteraction, s[a] = {
                        element: t,
                        intro: t.getAttribute("data-intro"),
                        step: a + 1,
                        tooltipClass: t.getAttribute("data-tooltipclass"),
                        highlightClass: t.getAttribute("data-highlightclass"),
                        position: t.getAttribute("data-position") || n._options.tooltipPosition,
                        scrollTo: t.getAttribute("data-scrollto") || n._options.scrollTo,
                        disableInteraction: l
                    }
                }
            }))
        }
        for (var c = [], h = 0; h < s.length; h++) s[h] && c.push(s[h]);
        return (s = c).sort((function (t, e) {
            return t.step - e.step
        })), this._introItems = s, X.call(this, t) && (E.call(this), this._options.keyboardNavigation && r.on(window, "keydown", L, this, !0), r.on(window, "resize", $, this, !0)), !1
    }

    function J(t) {
        this._targetElement = t, this._introItems = [], this._options = {
            nextLabel: "بعد",
            prevLabel: "قبل",
            skipLabel: "رد کن",
            doneLabel: "ببند!",
            hidePrev: !1,
            hideNext: !1,
            tooltipPosition: "bottom",
            tooltipClass: "",
            highlightClass: "",
            exitOnEsc: !0,
            exitOnOverlayClick: !0,
            showStepNumbers: !0,
            keyboardNavigation: !0,
            showButtons: !0,
            showBullets: !0,
            showProgress: !1,
            scrollToElement: !0,
            scrollTo: "element",
            scrollPadding: 30,
            overlayOpacity: .8,
            positionPrecedence: ["bottom", "top", "right", "left"],
            disableInteraction: !1,
            helperElementPadding: 10,
            hintPosition: "top-middle",
            hintButtonLabel: "Got it",
            hintAnimation: !0,
            buttonClass: "introjs-button"
        }
    }

    var Z = function e(i) {
        var o;
        if ("object" === t(i)) o = new J(i); else if ("string" == typeof i) {
            var r = document.querySelector(i);
            if (!r) throw new Error("There is no element with given selector.");
            o = new J(r)
        } else o = new J(document.body);
        return e.instances[n(o, "introjs-instance")] = o, o
    };
    return Z.version = "3.0.1", Z.instances = {}, Z.fn = J.prototype = {
        clone: function () {
            return new J(this)
        }, setOption: function (t, e) {
            return this._options[t] = e, this
        }, setOptions: function (t) {
            return this._options = function (t, e) {
                var n, i = {};
                for (n in t) i[n] = t[n];
                for (n in e) i[n] = e[n];
                return i
            }(this._options, t), this
        }, start: function (t) {
            return Y.call(this, this._targetElement, t), this
        }, goToStep: function (t) {
            return k.call(this, t), this
        }, addStep: function (t) {
            return this._options.steps || (this._options.steps = []), this._options.steps.push(t), this
        }, addSteps: function (t) {
            if (t.length) {
                for (var e = 0; e < t.length; e++) this.addStep(t[e]);
                return this
            }
        }, goToStepNumber: function (t) {
            return x.call(this, t), this
        }, nextStep: function () {
            return E.call(this), this
        }, previousStep: function () {
            return N.call(this), this
        }, currentStep: function () {
            return A.call(this)
        }, exit: function (t) {
            return Q.call(this, this._targetElement, t), this
        }, refresh: function () {
            return W.call(this), this
        }, onbeforechange: function (t) {
            if ("function" != typeof t) throw new Error("Provided callback for onbeforechange was not a function");
            return this._introBeforeChangeCallback = t, this
        }, onchange: function (t) {
            if ("function" != typeof t) throw new Error("Provided callback for onchange was not a function.");
            return this._introChangeCallback = t, this
        }, onafterchange: function (t) {
            if ("function" != typeof t) throw new Error("Provided callback for onafterchange was not a function");
            return this._introAfterChangeCallback = t, this
        }, oncomplete: function (t) {
            if ("function" != typeof t) throw new Error("Provided callback for oncomplete was not a function.");
            return this._introCompleteCallback = t, this
        }, onhintsadded: function (t) {
            if ("function" != typeof t) throw new Error("Provided callback for onhintsadded was not a function.");
            return this._hintsAddedCallback = t, this
        }, onhintclick: function (t) {
            if ("function" != typeof t) throw new Error("Provided callback for onhintclick was not a function.");
            return this._hintClickCallback = t, this
        }, onhintclose: function (t) {
            if ("function" != typeof t) throw new Error("Provided callback for onhintclose was not a function.");
            return this._hintCloseCallback = t, this
        }, onexit: function (t) {
            if ("function" != typeof t) throw new Error("Provided callback for onexit was not a function.");
            return this._introExitCallback = t, this
        }, onskip: function (t) {
            if ("function" != typeof t) throw new Error("Provided callback for onskip was not a function.");
            return this._introSkipCallback = t, this
        }, onbeforeexit: function (t) {
            if ("function" != typeof t) throw new Error("Provided callback for onbeforeexit was not a function.");
            return this._introBeforeExitCallback = t, this
        }, addHints: function () {
            return F.call(this, this._targetElement), this
        }, hideHint: function (t) {
            return P.call(this, t), this
        }, hideHints: function () {
            return q.call(this), this
        }, showHint: function (t) {
            return H.call(this, t), this
        }, showHints: function () {
            return B.call(this), this
        }, removeHints: function () {
            return M.call(this), this
        }, removeHint: function (t) {
            return O().call(this, t), this
        }, showHintDialog: function (t) {
            return z.call(this, t), this
        }
    }, Z
}));
