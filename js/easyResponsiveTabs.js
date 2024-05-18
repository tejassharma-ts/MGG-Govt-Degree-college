! function(t) {
    t.fn.extend({
        easyResponsiveTabs: function(a) {
            var e = a = t.extend({
                    type: "default",
                    width: "auto",
                    fit: !0,
                    closed: !1,
                    tabidentify: "",
                    activetab_bg: "white",
                    inactive_bg: "#EBEBEB",
                    active_border_color: "#e3e3e3",
                    active_content_border_color: "#EBEBEB",
                    activate: function() {}
                }, a),
                i = e.type,
                r = e.fit,
                o = e.width,
                s = "vertical",
                n = "accordion",
                c = window.location.hash,
                d = !(!window.history || !history.replaceState);
            t(this).bind("tabactivate", function(t, e) {
                "function" == typeof a.activate && a.activate.call(e, t)
            }), this.each(function() {
                var e, b = t(this),
                    l = b.find("ul.resp-tabs-list." + a.tabidentify),
                    f = b.attr("id");
                b.find("ul.resp-tabs-list." + a.tabidentify + " li").addClass("resp-tab-item").addClass(a.tabidentify), b.css({
                        display: "block",
                        width: o
                    }), "vertical" == a.type && l.css("margin-top", "3px"), b.find(".resp-tabs-container." + a.tabidentify).css("border-color", a.active_content_border_color), b.find(".resp-tabs-container." + a.tabidentify + " > div").addClass("resp-tab-content").addClass(a.tabidentify),
                    function() {
                        i == s && b.addClass("resp-vtabs").addClass(a.tabidentify);
                        1 == r && b.css({
                            width: "100%",
                            margin: "0px"
                        });
                        i == n && (b.addClass("resp-easy-accordion").addClass(a.tabidentify), b.find(".resp-tabs-list").css("display", "none"))
                    }(), b.find(".resp-tab-content." + a.tabidentify).before("<h2 class='resp-accordion " + a.tabidentify + "' role='tab'><span class='resp-arrow'></span></h2>"), b.find(".resp-tab-content." + a.tabidentify).prev("h2").css({
                        "background-color": a.inactive_bg,
                        "border-color": a.active_border_color
                    });
                var p = 0;
                b.find(".resp-accordion").each(function() {
                    e = t(this);
                    var i = b.find(".resp-tab-item:eq(" + p + ")"),
                        r = b.find(".resp-accordion:eq(" + p + ")");
                    r.append(i.html()), r.data(i.data()), e.attr("aria-controls", a.tabidentify + "_tab_item-" + p), p++
                });
                var v = 0;
                b.find(".resp-tab-item").each(function() {
                    $tabItem = t(this), $tabItem.attr("aria-controls", a.tabidentify + "_tab_item-" + v), $tabItem.attr("role", "tab"), $tabItem.css({
                        "background-color": a.inactive_bg,
                        "border-color": "none"
                    });
                    var e = 0;
                    b.find(".resp-tab-content." + a.tabidentify).each(function() {
                        t(this).attr("aria-labelledby", a.tabidentify + "_tab_item-" + e).css({
                            "border-color": a.active_border_color
                        }), e++
                    }), v++
                });
                var y = 0;
                if ("" != c) {
                    var h = c.match(new RegExp(f + "([0-9]+)"));
                    null !== h && 2 === h.length && (y = parseInt(h[1], 10) - 1) > v && (y = 0)
                }
                t(b.find(".resp-tab-item." + a.tabidentify)[y]).addClass("resp-tab-active").css({
                    "background-color": a.activetab_bg,
                    "border-color": a.active_border_color
                }), !0 === a.closed || "accordion" === a.closed && !l.is(":visible") || "tabs" === a.closed && l.is(":visible") || (t(b.find(".resp-accordion." + a.tabidentify)[y]).addClass("resp-tab-active").css({
                    "background-color": a.activetab_bg + " !important",
                    "border-color": a.active_border_color,
                    background: "none"
                }), t(b.find(".resp-tab-content." + a.tabidentify)[y]).addClass("resp-tab-content-active").addClass(a.tabidentify).attr("style", "display:block")), b.find("[role=tab]").each(function() {
                    t(this).click(function() {
                        var e = t(this),
                            i = e.attr("aria-controls");
                        if (e.hasClass("resp-accordion") && e.hasClass("resp-tab-active")) return b.find(".resp-tab-content-active." + a.tabidentify).slideUp("", function() {
                            t(this).addClass("resp-accordion-closed")
                        }), e.removeClass("resp-tab-active").css({
                            "background-color": a.inactive_bg,
                            "border-color": "none"
                        }), !1;
                        if (!e.hasClass("resp-tab-active") && e.hasClass("resp-accordion") ? (b.find(".resp-tab-active." + a.tabidentify).removeClass("resp-tab-active").css({
                                "background-color": a.inactive_bg,
                                "border-color": "none"
                            }), b.find(".resp-tab-content-active." + a.tabidentify).slideUp().removeClass("resp-tab-content-active resp-accordion-closed"), b.find("[aria-controls=" + i + "]").addClass("resp-tab-active").css({
                                "background-color": a.activetab_bg,
                                "border-color": a.active_border_color
                            }), b.find(".resp-tab-content[aria-labelledby = " + i + "]." + a.tabidentify).slideDown().addClass("resp-tab-content-active")) : (console.log("here"), b.find(".resp-tab-active." + a.tabidentify).removeClass("resp-tab-active").css({
                                "background-color": a.inactive_bg,
                                "border-color": "none"
                            }), b.find(".resp-tab-content-active." + a.tabidentify).removeAttr("style").removeClass("resp-tab-content-active").removeClass("resp-accordion-closed"), b.find("[aria-controls=" + i + "]").addClass("resp-tab-active").css({
                                "background-color": a.activetab_bg,
                                "border-color": a.active_border_color
                            }), b.find(".resp-tab-content[aria-labelledby = " + i + "]." + a.tabidentify).addClass("resp-tab-content-active").attr("style", "display:block")), e.trigger("tabactivate", e), d) {
                            var r = window.location.hash,
                                o = i.split("tab_item-"),
                                s = f + (parseInt(o[1], 10) + 1).toString();
                            if ("" != r) {
                                var n = new RegExp(f + "[0-9]+");
                                s = null != r.match(n) ? r.replace(n, s) : r + "|" + s
                            } else s = "#" + s;
                            history.replaceState(null, null, s)
                        }
                    })
                }), t(window).resize(function() {
                    b.find(".resp-accordion-closed").removeAttr("style")
                })
            })
        }
    })
}(jQuery);