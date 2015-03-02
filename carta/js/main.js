function slider(e) {
    function t() {
        $(".banner-nav-" + e).addClass("active"), $("#banner").addClass("fading"), $("#slide-" + e).addClass("active").fadeIn(a, function () {
            $("#banner").removeClass("fading")
        }), $(window).trigger("resize"), i > 1 && (timeOut = setTimeout(function () {
            $("#slide-" + e).removeClass("active").fadeOut(a), $(".banner-nav-" + e).removeClass("active"), e++, e === i && (e = 0), t()
        }, n))
    }

    var i = $("#banner").children().length - 1, n = 1e4, a = 1500;
    clearTimeout(timeOut), $(".slide").hide().removeClass("active"), $(".banner-nav").removeClass("active"), t()
}
function calculateImageCroppers() {
    var e = $(".image-cropper");
    $(".image-cropper-bar").css({width: e.outerWidth() / 2 - 60})
}
!function ($) {
    $.fn.stretchImage = function (e) {
        return this.each(function () {
            function t(t) {
                var i = t.find("img");
                t.css({overflow: "hidden"}), i.css({width: "", height: "", "margin-top": "", "margin-left": ""});
                var n = i.outerWidth(), a = i.outerHeight(), s = t.outerWidth(), r = t.outerHeight(), o = s / r, d = n / a;
                1 >= o ? 1 >= d ? d >= o ? (i.css({height: r}), i.css({"margin-left": -((i.outerWidth() - s) / 2)})) : (i.css({width: s}), i.css({"margin-top": -((i.outerHeight() - r) / 2)})) : (i.css({height: r}), i.css({"margin-left": -((i.outerWidth() - s) / 2)})) : d > 1 && d > o ? (i.css({height: r}), i.css({"margin-left": -((i.outerWidth() - s) / 2)})) : (i.css({width: s}), i.css({"margin-top": -((i.outerHeight() - r) / 2)})), e && i.css("visibility", "visible")
            }

            null === e && (e = !1);
            var i = $(this);
            t(i), $(window).bind("load", function () {
                t(i)
            }), $(window).bind("resize", function () {
                t(i)
            })
        }), this
    }
}
(jQuery), function ($) {
    $.fn.carSharedLeasing = function () {
        function e(e) {
            e += "";
            for (var t = e.split("."), i = t[0], n = t.length > 1 ? "," + t[1] : "", a = /(\d+)(\d{3})/; a.test(i);)i = i.replace(a, "$1.$2");
            return i + n
        }

        function t(t) {
            var i = 496764, n = 190544, s = 160169;
            $("#percentage-business b").text(t + "%"), $("#percentage-private b").text(a - t + "%"), b.text(e(Math.round(t / a * r * .8))), w.text(e(Math.round((a - t) / a * r))), C.text(e(Math.round(t / a * o * .8))), x.text(e(Math.round((a - t) / a * o))), y.text(e(Math.round(t / a * d * .8))), W.text(e(Math.round((a - t) / a * d))), I.text(e(Math.round((a - t) / a * i))), M.text(e(Math.round(n - (a - t) / a * i))), H.text(e(Math.round(s)))
        }

        function i() {
            var e = g.outerWidth(), t = e / g.outerHeight(), i = e / t;
            p.css({height: i}), f.css({width: v.outerWidth()}), u.css({width: v.outerWidth() * (s / a)}), c.css({width: v.outerWidth() * (s / a)})
        }

        var n = this, a = 100, s = 80, r = 7615.5, o = 3753.5, d = 87500, c = n.find("#dragger"), l = c.find("#dragger-arrow"), h = c.find("#dragger-label"), u = n.find("#car-business-mask"), f = u.find("#car-business"), m = n.find("#car-private"), g = m.find("img"), v = n.find("#car-shared-leasing-slider"), p = v.find("#car-shared-leasing-slider-car"), b = n.find("#monthly-payment-business"), w = n.find("#monthly-payment-private"), C = n.find("#work-allowance-business"), x = n.find("#work-allowance-private"), y = n.find("#first-payment-business"), W = n.find("#first-payment-private"), I = n.find("#savings-business"), M = n.find("#savings-private"), H = n.find("#relative-total-savings");
        return t(s), l.on("mousedown", function (e) {
            var i = e.pageX, n = 0, a = 0, s = v.outerWidth(), r = c.outerWidth(), o = r, d = o / s * 100;
            h.fadeOut(), v.on("mousemove", function (e) {
                n = e.pageX, a = n - i, s >= o + a && o + a >= 0 && (o += a), d = Math.round(o / s * 100), u.css({width: o + "px"}), c.css({width: o + "px"}), t(d), i = n
            })
        }), $(document).on("mouseup", function () {
            $("#car-shared-leasing-slider").unbind("mousemove"), h.fadeIn()
        }), $(window).bind("load", function () {
            i(), n.css({visibility: "visible"}).hide().fadeIn()
        }), $(window).bind("resize", function () {
            i()
        }), this
    }
}(jQuery);
var timeOut;
jQuery(document).ready(function () {
    $(".bar-type-2").stretchImage(!0), $(".bar-type-4 .image-container").stretchImage(!0), $(".slide").stretchImage(), $(".contact-image").stretchImage(!0), $("#menu-topmenu .sub-menu").append('<span class="triangle"></span>'), $("#menu-hovedmenu .menu-item-has-children").append('<span class="triangle"></span>'), $("#car-shared-leasing").carSharedLeasing(), $("#bp_car-shared-leasing").carSharedLeasing2() , $("#banner-nav a").click(function () {
        $(this).parent().hasClass("active") || $("#banner").hasClass("fading") || slider($(this).parent().data("slideNo"))
    }), $(".bar").each(function () {
        var e = $(this), t = $(this).next();
        if (t.hasClass("bar")) {
            var i = t.data("colortheme");
            e.addClass("bar-below").addClass("next-bar-colortheme-" + i)
        } else e.addClass("last-bar")
    });
    var e = $("#topmenu"), t = $("#mainmenu"), i = e.position().top + e.outerHeight(!0);
    $(window).scroll(function () {
        $(this).scrollTop() > i ? t.addClass("floating") : t.removeClass("floating")
    }), $("body").on("touchmove", function () {
        $(this).scrollTop() > i ? t.addClass("floating") : t.removeClass("floating")
    }), calculateImageCroppers(), $("li.menu-item-has-children").click(function () {
        $(this).hasClass("active") ? $("li.menu-item-has-children").removeClass("active") : ($("li.menu-item-has-children").removeClass("active"), $(this).addClass("active"))
    })
}), jQuery(window).load(function () {
    slider(0)

}), jQuery(window).resize(function () {
    calculateImageCroppers();
    var e = $(".slide").outerHeight() - 40 + "px", t = $(".slide").outerWidth() / 2 - 60 + "px", i = $(".slide").outerWidth() / 2 + 60 + "px", n = "100% " + e + ", 100% 0, 0 0, 0 " + e + ", " + t + " " + e + ", 50% 100%, " + i + " " + e;
    $(".slide").css({"-webkit-clip-path": "polygon(" + n + ")"}), $(".slide .container").each(function () {
        var e = $(this).outerWidth();
        $(this).css({"margin-left": e / 2 * -1})
    }), $(".bar-type-2 .container").each(function () {
        var e = $(this).outerWidth();
        $(this).css({"margin-left": e / 2 * -1})
    })

});

(jQuery), function ($) {
    $.fn.carSharedLeasing2 = function () {
        function e(e) {
            e += "";
            for (var t = e.split("."), i = t[0], n = t.length > 1 ? "," + t[1] : "", a = /(\d+)(\d{3})/; a.test(i);)i = i.replace(a, "$1.$2");
            return i + n
        }

        function t(t) {
            var i = 496764, n = 190544, s = 160169;
            $("#bp_percentage-business b").text(t + "%"),
                $("#bp_percentage-private b").text(a - t + "%"),
                b.text(e(Math.round(t / a * r * .8))),
                w.text(e(Math.round((a - t) / a * r))),
                C.text(e(Math.round(t / a * o * .8))),
                x.text(e(Math.round((a - t) / a * o))),
                y.text(e(Math.round(t / a * d * .8))),
                W.text(e(Math.round((a - t) / a * d))),
                I.text(e(Math.round((a - t) / a * i))),
                M.text(e(Math.round(n - (a - t) / a * i))),
                H.text(e(Math.round(s)))
        }

        function i() {
            var e = g.outerWidth(), t = e / g.outerHeight(), i = e / t;
            p.css({height: i}), f.css({width: v.outerWidth()}), u.css({width: v.outerWidth() * (s / a)}), c.css({width: v.outerWidth() * (s / a)})
        }

        var n = this, a = 100, s = 80, r = 7615.5, o = 3753.5, d = 87500, c = n.find("#bp_dragger"), l = c.find("#bp_dragger-arrow"), h = c.find("#bp_dragger-label"), u = n.find("#bp_car-business-mask"), f = u.find("#bp_car-business"), m = n.find("#bp_car-private"), g = m.find("img"), v = n.find("#bp_car-shared-leasing-slider"), p = v.find("#bp_car-shared-leasing-slider-car"), b = n.find("#bp_monthly-payment-business"), w = n.find("#bp_monthly-payment-private"), C = n.find("#bp_work-allowance-business"), x = n.find("#bp_work-allowance-private"), y = n.find("#bp_first-payment-business"), W = n.find("#bp_first-payment-private"), I = n.find("#bp_savings-business"), M = n.find("#bp_savings-private"), H = n.find("#bp_relative-total-savings");
        return t(s), l.on("mousedown", function (e) {
            var i = e.pageX, n = 0, a = 0, s = v.outerWidth(), r = c.outerWidth(), o = r, d = o / s * 100;
            h.fadeOut(), v.on("mousemove", function (e) {
                n = e.pageX, a = n - i, s >= o + a && o + a >= 0 && (o += a), d = Math.round(o / s * 100), u.css({width: o + "px"}), c.css({width: o + "px"}), t(d), i = n
            })
        }), $(document).on("mouseup", function () {
            $("#bp_car-shared-leasing-slider").unbind("mousemove"), h.fadeIn()
        }), $(window).bind("load", function () {
            i(), n.css({visibility: "visible"}).hide().fadeIn()
        }), $(window).bind("resize", function () {
            i()
        }), this
    }
}(jQuery);
jQuery(document).ready(function () {


    var param = document.URL.split('=')[1];
    get(param)
});
    function get(param){
        $.post("../wp-content/plugins/biler/getbyid.php",
            {
                name: param

            },
            function(data, status){
                var cardeatails = JSON.parse(data);
                var img = cardeatails[1];

                document.getElementById("year").innerHTML = cardeatails[2];
                document.getElementById("km").innerHTML = cardeatails[4];
                document.getElementById("bp_description").innerHTML = cardeatails[14];
                document.getElementById("color").innerHTML = cardeatails[7];
                document.getElementById("fuel").innerHTML = cardeatails[6];
                document.getElementById("image1").src = "../wp-content/plugins/biler/includes/test/" + cardeatails[16];
                document.getElementById("image2").src = "../wp-content/plugins/biler/includes/test/" + cardeatails[17];
                document.getElementById("image3").src = "../wp-content/plugins/biler/includes/test/" + cardeatails[18];
                document.getElementById("image4").src = "../wp-content/plugins/biler/includes/test/" + cardeatails[19];
                document.getElementById("image11").src = "../wp-content/plugins/biler/includes/test/" + cardeatails[16];
                document.getElementById("image12").src = "../wp-content/plugins/biler/includes/test/" + cardeatails[17];
                document.getElementById("image13").src = "../wp-content/plugins/biler/includes/test/" + cardeatails[18];
                document.getElementById("image14").src = "../wp-content/plugins/biler/includes/test/" + cardeatails[19];
                document.getElementById("bp_relative-total-savings").innerHTML =  addCommas(cardeatails[8]) ;
                document.getElementById("kørsel").innerHTML = addCommas(cardeatails[9])+" km/årligt";
                document.getElementById("period").innerHTML =  cardeatails[10]+" mdr";
                document.getElementById("permonth").innerHTML =  addCommas(cardeatails[11])+" kr./måned";
                document.getElementById("ydelse").innerHTML = "kr. "+addCommas(cardeatails[12])+",-";
                document.getElementById("kørsel2").innerHTML = addCommas(cardeatails[9])+" km";
                document.getElementById("period2").innerHTML =  cardeatails[10];
                document.getElementById("beskat").innerHTML =  "kr. "+addCommas(cardeatails[13])+",-";




            });
            function addCommas(n){
                return String(n).split("").reverse().join("")
                    .replace(/(.{3}\B)/g, "$1.")
                    .split("").reverse().join("");
            }
    };


