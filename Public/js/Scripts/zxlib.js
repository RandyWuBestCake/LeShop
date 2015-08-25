function playVideo(e) {
    zxVideo({
        vid : e,
        playType : "popSelf"
    })
}

function addToCartAction() {
    var shopCartItem = $(".head_cart"),
        flyProductItem = $("#flyitem");

    $(".addToCart").die("click").live("click", function (event) {
        var actType = $(this).attr('type'),
            showParabola = null,
            e = $(this).attr("ctags").split("|"),
            a = $(this).attr("levelid") || 1,
            b = this;

        //创建向购物车投射方法
        if (!!actType && actType == 'parabola' && flyProductItem && shopCartItem) {

            var myParabola = funParabola(flyProductItem[0], shopCartItem[0], {
                speed : 300,
                curvature : 0.005,
                complete : function () {
                    flyProductItem.hide();
                    showProductNumInCart();
                }
            })

            showParabola = function () {
                // 滚动大小
                var scrollLeft = document.documentElement.scrollLeft || document.body.scrollLeft || 0,
                    scrollTop = document.documentElement.scrollTop || document.body.scrollTop || 0;

                flyProductItem.css("left", event.clientX + scrollLeft + "px");
                flyProductItem.css("top", event.clientY + scrollTop + "px");
                flyProductItem.show();

                // 需要重定位
                myParabola.position().move();
            };
        }

        "3" == e[1] ? Js.login.hasLogin(function () {
            getCookie("COOKIE_USER_LEVEL_ID") < a ? alert("\u60a8\u7684\u7b49\u7ea7\u4e0d\u8db3\uff0c\u4e0d\u80fd\u8d2d\u4e70") : getAddToCart.call(b, actType, showParabola)
        }) : "1" < a ? Js.login.hasLogin(function () {
            getAddToCart.call(b, actType, showParabola)
        }) : getAddToCart.call(this, actType, showParabola)
    })
}
function getAddToCart(actType, showParabola) {
    var e = $(this).attr("ctags").split("|"),
        a = $(this).attr("num"),
        b = $(this).attr("pids"),
        d = this,
        c = "<div class='news_line7' style='width:430px;'></div><p>\u8d2d\u4e70\u8fc7\u8be5\u4ea7\u54c1\u7684\u4eba\u8fd8\u8d2d\u4e70\u8fc7:</p>",
        f = !1;

    Js.sendData(sendLink.orpe + "api/list/getRecommendProducts.jsonp", {
        manualClose : !0,
        showLoad : false,
        param : "LOCATION=2&page=1&maxNum=3"
    }, function (a) {
        if ("1" == a.status && 0 < a.result[0].ALLACCOUNT) {
            f = !0;
            for (var b = 0; b < a.result[0].LISTPROD.length; b++) {
                var d = a.result[0].LISTPROD[b];
                c += '<div class="TAN_gcd"><a class="TAN_gci" href="' + _basePath + "product/product-pid-" + d.pid + '.html"><img style="width:32px;height:127px" src="' + Js.getImagePath() + d.proImage + '_S"/></a><a class="TAN_gcn" href="' + _basePath + "product/product-pid-" + d.pid + '.html">' + d.productName + d.englishName + '</a><div class="TAN_gcv">\uffe5' + d.salePrice + " \u5143</div></div>"
            }
            $("#suggestGoods").html(c)
        }
    });
    //--add by wangjianmeng  for suite in shoppingCart	

    /**
     var promotionId = b.split("_");
     var prodId;
     if(promotionId[1]){
		prodId = promotionId[1];
	}
     Js.sendData(sendLink.cartOld + "api/web/insert/addCartItem.jsonp", {
        showLoad : true,
        param : "cartType=" + e[0] + "&purType=" + e[1] + "&pids=" + prodId + "&purQuantity=" + a + "&needCartDetail=true&TO_PAY=0"
    }, function (a) {	
	**/

    var purType = 3;
    var promotionId = b.split("_");
    if(promotionId[2] == 0){
        purType = 1;
    }
    Js.sendData(sendLink.cart+"api/web/insert/addCartItem.jsonp", {
        showLoad : false,
        param : "cartType=0&purType="+purType+"&realpromotionid_productid_promotionid_quantity=" + b + "&needCartDetail=1&TO_PAY=0&arrivalId="+(getCookie("COOKIE_SELECT_PROVINCE_ID") || 1)
    }, function (a) {
        //===new add to cart end
        Js.closeLoadContent();
        if ("1" == a.status) {
            //判断加入购物车后执行的效果
            if(actType == "parabola"){
                //商品抛物线进入购物车
                !!showParabola ? showParabola() : null;
            } else if(actType == "slideTip"){
                //配件终端页显示加入购物车提示条
                var tip = $(d).parent().next();
                tip.animate({top : 310}, 200, function(){
                    var _this = $(this);

                    setTimeout(function(){
                        _this.animate({top : 360}, 200);
                        showProductNumInCart();
                    }, 1000);
                })
            } else {
                pop('<div style="width:402px; height:150px; overflow:hidden; background:#fff; border:1px solid;">' +
                    '<div style="height:40px; width:100%;"><a id="wjPop-close" class=" hand pt10 pr10 right"><img src="http://img1.hdletv.com/file/20140901/default/45966030997559732" /></a></div>' +
                    '<div class="dark font18 t_c" style="height:40px; line-height:40px;"><img style="margin: 5px auto -5px;" src="http://img1.hdletv.com/file/20141031/default/51136638102896176" /> 添加成功</div>' +
                    '<div class="mt20 t_c">' +
                    '<a class="inline_block red_bt_m mr40" target="_blank" href="'+_cartPath+'"><span class="dark">去购物车结算</span></a>' +
                    '<a class="inline_block gray_bt_m" target="_blank" id="wjPop-close"><span class="dark">继续购物</span></a>' +
                    '</div>' +
                    '</div>');
                showProductNumInCart();
            }



            return;
//            for (var b = 0, g = 0, e = 0; e < a.result.length; e++)
//                b += parseInt(a.result[e].itemCount), g += parseFloat(a.result[e].sumPrice);
//            $("body").append(Js.Tools.getShadeLayer("addCartResult"));
//            $("body").append(a.cartMessage ? getMessCartTemp(a.cartMessage) : getCartTemp(b, g));
//            f && $("#suggestGoods").html(c)
        } else if ("timeout" != a.status && "5" != a.status) {
            $("body").append(getCartTemp(b, g)),
                $(".TAN_gcc01").html("<div class='TAN_gcb'>\u52a0\u5165\u8d2d\u7269\u8f66\u5931\u8d25\uff0c" +
                    a.message + "</div>");
        } else if ("5" == a.status) {
            if (a = $(d).attr("errorcallback"))
                window[a]();
            return
        }

        Js.Tools.setEleToCenter("#cartResult", {
            offsetY : -100
        });

        //pop("#cartResult", {
        //	removeAfterShow : true
        //});

        Js.widget.popAni("#cartResult");
        $(".closeCartDia").click(function () {
            Js.widget.closeAni("#cartResult", function () {
                $(".addCartResult").remove()
            })
        })

        showProductNumInCart();
    })
}
function getMessCartTemp(e) {
    return '<div class="TAN_g addCartResult" id="cartResult" style="z-index:999"><a id="wjPop-close" href="javascript:void(0)" class="closeCartDia close  block">X</a><div class="TAN_gcb font18 red t_c">' + e + '</div><div style="width:105px;" class=" block_center  clear pt20"><a class="inb04 block red_bt_s" value="" href="/cart.html"><span class="redbt_r block pr10 white">\u524d\u5f80\u8d2d\u7269\u8f66\u7ed3\u7b97</span></a></div><div class="clear pb20"></div></div>'
}
function getCartTemp(e, a) {
    return '<div class="TAN_g addCartResult" id="cartResult" style="z-index:999"><a id="wjPop-close" href="javascript:void(0)" class="closeCartDia close  block">X</a><div class="TAN_gc1"><div class="TAN_gcw left"></div><div class="TAN_gcc01 left"><div class="TAN_gcb font24 red">\u8be5\u5546\u54c1\u5df2\u6210\u529f\u653e\u5165\u8d2d\u7269\u8f66</div><div class="TAN_gcp font14">\u8d2d\u7269\u8f66\u5171<span class="red">' + e + '</span>\u4ef6\u5546\u54c1    \u5408\u8ba1: <span class="red">' + a + '\u5143</span></div><div class="right"> <a class="inb04 block red_bt_s" value="" href="' +
        _hrefPath + '/cart.html"><span class="white">\u53bb\u7ed3\u7b97</span></a></div></div><div class="clear pb20"></div></div></div>'
}
$(function () {
    window.funParabola = function(element, target, options) {
        /*
         * 网页模拟现实需要一个比例尺
         * 如果按照1像素就是1米来算，显然不合适，因为页面动不动就几百像素
         * 页面上，我们放两个物体，200~800像素之间，我们可以映射为现实世界的2米到8米，也就是100:1
         * 不过，本方法没有对此有所体现，因此不必在意
         */

        var defaults = {
            speed: 166.67, // 每帧移动的像素大小，每帧（对于大部分显示屏）大约16~17毫秒
            curvature: 0.001,  // 实际指焦点到准线的距离，你可以抽象成曲率，这里模拟扔物体的抛物线，因此是开口向下的
            progress: function() {},
            complete: function() {}
        };

        var params = {}; options = options || {};

        for (var key in defaults) {
            params[key] = options[key] || defaults[key];
        }

        var exports = {
            mark: function() { return this; },
            position: function() { return this; },
            move: function() { return this; },
            init: function() { return this; }
        };

        /* 确定移动的方式
         * IE6-IE8 是margin位移
         * IE9+使用transform
         */
        var moveStyle = "margin", testDiv = document.createElement("div");
        if ("oninput" in testDiv) {
            ["", "ms", "webkit"].forEach(function(prefix) {
                var transform = prefix + (prefix? "T": "t") + "ransform";
                if (transform in testDiv.style) {
                    moveStyle = transform;
                }
            });
        }

        // 根据两点坐标以及曲率确定运动曲线函数（也就是确定a, b的值）
        /* 公式： y = a*x*x + b*x + c;
         */
        var a = params.curvature, b = 0, c = 0;

        // 是否执行运动的标志量
        var flagMove = true;

        if (element && target && element.nodeType == 1 && target.nodeType == 1) {
            var rectElement = {}, rectTarget = {};

            // 移动元素的中心点位置，目标元素的中心点位置
            var centerElement = {}, centerTarget = {};

            // 目标元素的坐标位置
            var coordElement = {}, coordTarget = {};

            // 标注当前元素的坐标
            exports.mark = function() {
                if (flagMove == false) return this;
                if (typeof coordElement.x == "undefined") this.position();
                element.setAttribute("data-center", [coordElement.x, coordElement.y].join());
                target.setAttribute("data-center", [coordTarget.x, coordTarget.y].join());
                return this;
            }

            exports.position = function() {
                if (flagMove == false) return this;

                var scrollLeft = document.documentElement.scrollLeft || document.body.scrollLeft,
                    scrollTop = document.documentElement.scrollTop || document.body.scrollTop;

                // 初始位置
                if (moveStyle == "margin") {
                    element.style.marginLeft = element.style.marginTop = "0px";
                } else {
                    element.style[moveStyle] = "translate(0, 0)";
                }

                // 四边缘的坐标
                rectElement = element.getBoundingClientRect();
                rectTarget = target.getBoundingClientRect();

                // 移动元素的中心点坐标
                centerElement = {
                    x: rectElement.left + (rectElement.right - rectElement.left) / 2 + scrollLeft,
                    y: rectElement.top + (rectElement.bottom - rectElement.top) / 2	+ scrollTop
                };

                // 目标元素的中心点位置
                centerTarget = {
                    x: rectTarget.left + (rectTarget.right - rectTarget.left) / 2 + scrollLeft,
                    y: rectTarget.top + (rectTarget.bottom - rectTarget.top) / 2 + scrollTop
                };

                // 转换成相对坐标位置
                coordElement = {
                    x: 0,
                    y: 0
                };
                coordTarget = {
                    x: -1 * (centerElement.x - centerTarget.x),
                    y:  -1 * (centerElement.y - centerTarget.y)
                };

                /*
                 * 因为经过(0, 0), 因此c = 0
                 * 于是：
                 * y = a * x*x + b*x;
                 * y1 = a * x1*x1 + b*x1;
                 * y2 = a * x2*x2 + b*x2;
                 * 利用第二个坐标：
                 * b = (y2+ a*x2*x2) / x2
                 */
                // 于是
                b = (coordTarget.y - a * coordTarget.x * coordTarget.x) / coordTarget.x;

                return this;
            };

            // 按照这个曲线运动
            exports.move = function() {
                // 如果曲线运动还没有结束，不再执行新的运动
                if (flagMove == false) return this;

                var startx = 0, rate = coordTarget.x > 0? 1: -1;

                var step = function() {
                    // 切线 y'=2ax+b
                    var tangent = 2 * a * startx + b; // = y / x
                    // y*y + x*x = speed
                    // (tangent * x)^2 + x*x = speed
                    // x = Math.sqr(speed / (tangent * tangent + 1));
                    startx = startx + rate * Math.sqrt(params.speed / (tangent * tangent + 1));

                    // 防止过界
                    if ((rate == 1 && startx > coordTarget.x) || (rate == -1 && startx < coordTarget.x)) {
                        startx = coordTarget.x;
                    }
                    var x = startx, y = a * x * x + b * x;

                    // 标记当前位置，这里有测试使用的嫌疑，实际使用可以将这一行注释
                    element.setAttribute("data-center", [Math.round(x), Math.round(y)].join());

                    // x, y目前是坐标，需要转换成定位的像素值
                    if (moveStyle == "margin") {
                        element.style.marginLeft = x + "px";
                        element.style.marginTop = y + "px";
                    } else {
                        element.style[moveStyle] = "translate("+ [x + "px", y + "px"].join() +")";
                    }

                    if (startx !== coordTarget.x) {
                        params.progress(x, y);
                        window.requestAnimationFrame(step);
                    } else {
                        // 运动结束，回调执行
                        params.complete();
                        flagMove = true;
                    }
                };
                window.requestAnimationFrame(step);
                flagMove = false;

                return this;
            };

            // 初始化方法
            exports.init = function() {
                this.position().mark().move();
            };
        }

        return exports;
    };

    addToCartAction()
});

/*! 
 * requestAnimationFrame.js
 */
(function() {
    var lastTime = 0;
    var vendors = ['webkit', 'moz'];
    for(var x = 0; x < vendors.length && !window.requestAnimationFrame; ++x) {
        window.requestAnimationFrame = window[vendors[x] + 'RequestAnimationFrame'];
        window.cancelAnimationFrame = window[vendors[x] + 'CancelAnimationFrame'] ||    // name has changed in Webkit
            window[vendors[x] + 'CancelRequestAnimationFrame'];
    }

    if (!window.requestAnimationFrame) {
        window.requestAnimationFrame = function(callback, element) {
            var currTime = new Date().getTime();
            var timeToCall = Math.max(0, 16.7 - (currTime - lastTime));
            var id = window.setTimeout(function() {
                callback(currTime + timeToCall);
            }, timeToCall);
            lastTime = currTime + timeToCall;
            return id;
        };
    }
    if (!window.cancelAnimationFrame) {
        window.cancelAnimationFrame = function(id) {
            clearTimeout(id);
        };
    }
}());

(function (e) {
    e.Js = {};
    e.sendLink = {};
    sendLink.refundorder = "http://refundorderapi.shop.letv.com/";
    sendLink.ocs_api = "http://ocsapi.shop.letv.com/";
    sendLink.auth_https = "https://portal.shop.letv.com/authentication/";
    sendLink.ordr_https = "https://portal.shop.letv.com/order/";
    sendLink.paym_https = "https://portal.shop.letv.com/payment/";
    sendLink.home = "http://shop.letv.com/";
    sendLink.addr = "http://address.shop.letv.com/";
    sendLink.cartOld = "http://shoppingcart.shop.letv.com/";
    sendLink.cart = "http://newshoppingcart.shop.letv.com/";
    sendLink.auth = "http://authentication.shop.letv.com/";
    sendLink.prom = "http://promotions.shop.letv.com/";
    sendLink.prod = "http://pdserver.shop.letv.com/";
    sendLink.oldProd = "http://products.shop.letv.com/";
    sendLink.ucen = "http://usercenter.shop.letv.com/";
    sendLink.ordr = "http://order.shop.letv.com/";
    sendLink.foru = "http://forum.shop.letv.com/";
    sendLink.paym = "http://payment.shop.letv.com/";
    sendLink.orpe = "http://orderperiphery.shop.letv.com/";
    sendLink.sury = "http://survey.shop.letv.com/";
    sendLink.serh = "http://search.shop.letv.com/";
    sendLink.winebank = "http://winebank.shop.letv.com/";
    sendLink.image = "http://image.shop.letv.com/";
    sendLink.couponse = "http://couponservice.shop.letv.com/";
    sendLink.ordupd = "http://orderupdate.shop.letv.com/";
    "undefined" == typeof console && ($("body").append("<div id='console' style='display:none;position:fixed;top:0px;left:0px;width:200px;height:95px;overflow:hidden;background-color:black;color:#ff9e1a;'><a style='float:right' herf='javascript:void(0)' onclick='console.close()'>\u5173\u95ed</a></div>"), e.console = {
        consoleList : "",
        log : function (a) {
            $("#console").show();
            this.consoleList += a + ",";
            $("#console").append(this.consoleList.split(",").reverse().join("<br>"))
        },
        close : function () {
            $("#console").hide()
        }
    });
    // e.Js.login = {
    //     loginCallback : null,
    //     logoutCallback : null,
    //     hasLogin : function (a, b) {
    //         b = b || {};
    //         b.exitBn = typeof b.exitBn != "undefined" ? b.exitBn : 1;
    //         this.getAuth() ? $.isFunction(a) && a() : this.showDialog(a, b)
    //     },
    //     showDialog : function (a, b) {
    //         Js.login.loginCallback = a;
    //         if ($("#login_iframe").length == 0) {
    //             $("body").append(Js.Tools.getShadeLayer("login") + '<div id="login_iframe" class="login" style="z-index:1000;position:absolute;top:0;left:0;"><a id="loginClose" class="pop_head_btn_close" >x</a><iframe id="frame" scrolling="no" src="http://sso.letv.com/hd/loginminiv2?next_action=http://' +
    //                 location.host + "/loginBack.html&_" + (new Date).getTime() + '" width=500 height=420 frameborder=0></iframe></div>');
    //             Js.Tools.setEleToCenter("#login_iframe");
    //             $("#frame").on("load", function () {
    //                 b.exitBn ? $("#loginClose").show() : $("#loginClose").hide();
    //                 $("#loginClose").unbind("click").click(function () {
    //                     $(".login").remove();
    //                     b.closeCallback && b.closeCallback()
    //                 })
    //             })
    //         }
    //     },
    //     getAuth : function () {
    //         return window.getCookie("COOKIE_USER_ID") ? true : false
    //     },
    //     logout : function (a) {
    //         if (a)
    //             Js.login.logoutCallback = a;
    //         Js.sendData(sendLink.auth +
    //             "api/web/query/logout.jsonp", "");
    //         $("body").append('<iframe id="logoutFrame" src="http://sso.letv.com/user/loginOut?next_action=http://' + location.host + '/logoutBack.html" width=1 height=1 frameborder=0></iframe>')
    //     }
    // };
    // $.extend($.fn, e.Js.login);
    // Js.validator = {
    //     _instance : null,
    //     init : function (a) {
    //         _instance = this;
    //         if (typeof $("#" + a.el[0].id).attr("wjValid" + a.id) == "undefined") {
    //             for (var b = 0; b < a.el.length; b++)
    //                 (function (b) {
    //                     var c = a.el[b];
    //                     c.errorId = c.errorId ? $("#" + c.errorId) : $("#" + c.id + "Error");
    //                     c.emptyId = c.emptyId ? $("#" +
    //                         c.emptyId) : $("#" + c.id + "EmptyError");
    //                     c.submitErrorId = c.submitErrorId ? $("#" + c.submitErrorId) : $("#" + c.id + "SubmitError");
    //                     c.idEle = $("#" + c.id);
    //                     c.labelId = $("#" + c.id + "Label");
    //                     c.borderColor = c.idEle.css("border-color");
    //                     c.errorId.hide();
    //                     c.emptyId.hide();
    //                     c.submitErrorId.hide();
    //                     c.idEle.attr("maxlength") || c.idEle.attr("maxlength", 30);
    //                     if (c.emptyText)
    //                         if ("placeholder" in document.createElement("input")) {
    //                             c.idEle.attr("placeholder", c.emptyText);
    //                             b == 0 && c.idEle.focus()
    //                         } else {
    //                             c.idEle.css("color", "#C9C9C9");
    //                             c.idEle.val(c.emptyText);
    //                             c.idEle.bind("click focus", function () {
    //                                 c.idEle.val() == c.emptyText && c.idEle.val("")
    //                             });
    //                             c.idEle.blur(function () {
    //                                 if (c.idEle.val().length == 0) {
    //                                     c.idEle.css("color", "#C9C9C9");
    //                                     c.idEle.val(c.emptyText)
    //                                 }
    //                             });
    //                             c.idEle.bind("propertychange", function () {
    //                                 c.idEle.val() == c.emptyText ? c.idEle.css("color", "#C9C9C9") : c.idEle.css("color", "black")
    //                             })
    //                         }
    //                     if ($.type(c.rule) == "string") {
    //                         c.rule = {
    //                             r : [c.rule]
    //                         };
    //                         if (c.param)
    //                             c.param = [c.param]
    //                     } else if (typeof c.rule == "undefined")
    //                         c.rule = {
    //                             r : ["empty"]
    //                         };
    //                     typeof c.type == "undefined" || c.type == "input" ? c.idEle.blur(function (b,
    //                                                                                                d) {
    //                         a.noHighlight || $(this).css("border-color", c.borderColor);
    //                         var h = false,
    //                             g = $(this).val() == c.emptyText ? "" : Js.Tools.trim($(this).val(), "g"),
    //                             e = "";
    //                         $(this).val(g);
    //                         if (Js.validator.rules.basic(g)) {
    //                             for (h = 0; h < c.rule.r.length; h++)
    //                                 e = Js.validator.rules[c.rule.r[h]](g, c.param ? c.param[h] || "" : "") ? e + "1" : e + "0";
    //                             c.rule.regular = c.rule.regular || "|";
    //                             h = c.rule.regular == "&" ? e.indexOf("0") == -1 ? true : false : e.indexOf("1") != -1 ? true : false
    //                         }
    //                         if (h) {
    //                             c.errorId.hide();
    //                             c.emptyId.hide();
    //                             g.length === 0 && c.labelId.show()
    //                         } else {
    //                             a.noHighlight ||
    //                             $(this).css("border-color", "red");
    //                             if (g.length === 0) {
    //                                 c.labelId.show();
    //                                 c.emptyId.show();
    //                                 c.emptyId.length === 0 ? c.errorId.show() : c.errorId.hide();
    //                                 d && c.emptyId.length === 0 && c.submitErrorId.show()
    //                             } else {
    //                                 c.errorId.show();
    //                                 c.emptyId.hide();
    //                                 c.submitErrorId.hide()
    //                             }
    //                         }
    //                         if (c.callback) {
    //                             c.setValidState = function (b) {
    //                                 $("#" + this.id).attr("wjValid" + a.id, b)
    //                             };
    //                             g = c.callback.call(c, h, g);
    //                             $(this).attr("wjValid" + a.id, typeof g != "undefined" ? g : h)
    //                         } else
    //                             $(this).attr("wjValid" + a.id, h)
    //                     }).keyup(function (b) {
    //                         a.allKeyUp && a.allKeyUp(b);
    //                         c.keyUp &&
    //                         c.keyUp(b)
    //                     }).attr("wjValid" + a.id, "false").bind("keydown focus", function () {
    //                         a.noHighlight || $(this).css("border-color", "#BFAE4E");
    //                         c.labelId.hide()
    //                     }) : c.type == "select" && c.idEle.blur(function () {
    //                         if ($(this).val() == c.errorValue) {
    //                             c.errorId.show();
    //                             $(this).attr("wjValid" + a.id, false)
    //                         } else {
    //                             c.errorId.hide();
    //                             $(this).attr("wjValid" + a.id, true)
    //                         }
    //                     }).attr("wjValid" + a.id, "false");
    //                     c.keydown === true && a.submit && c.idEle.keydown(function (b) {
    //                         b.keyCode == 13 && $("#" + a.submit.id).trigger("click")
    //                     })
    //                 })(b);
    //             a.submit && $("#" + a.submit.id).unbind("click").click(function () {
    //                 _instance.checkAllEle(a.id,
    //                     typeof a.uriEncode == "undefined" ? true : a.uriEncode, a.submit.callback, a.focusError)
    //             });
    //             if (a.addNewRule)
    //                 _instance.rules[a.addNewRule.name] = a.addNewRule.fn
    //         }
    //     },
    //     checkAllEle : function (a, b, d, c) {
    //         $("*[wjValid" + a + "='false']").trigger("blur", [true]);
    //         if ($("*[wjValid" + a + "='false']").length === 0)
    //             if (d) {
    //                 var f = [],
    //                     e = {};
    //                 $("*[wjValid" + a + "='true']").each(function () {
    //                     var a = $(this).attr("name") || $(this).attr("id"),
    //                         c = $(this).val();
    //                     e[a] = b ? encodeURIComponent(c) : c;
    //                     f.push(a + "=" + e[a])
    //                 });
    //                 d(f.join("&"), e)
    //             } else
    //                 return true;
    //         else {
    //             c && $("*[wjValid" +
    //                 a + "='false']:first").focus();
    //             return false
    //         }
    //     },
    //     rules : {
    //         email : function (a) {
    //             return /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))$/i.test(a)
    //         },
    //         mobile : function (a) {
    //             return /^1[3|4|5|7|8][0-9]\d{8}$/.test(a)
    //         },
    //         telphone : function (a) {
    //             return /^(\d{3}-\d{8}|\d{4,5}-\d{7,8})$/.test(a)
    //         },
    //         range : function (a, b) {
    //             return a >= b[0] && a <= b[1]
    //         },
    //         min : function (a, b) {
    //             return a >= b
    //         },
    //         max : function (a, b) {
    //             return a <= b
    //         },
    //         rangelength : function (a, b) {
    //             return a.length >= b[0] && a.length <= b[1]
    //         },
    //         minLength : function (a, b) {
    //             return a.length >= b
    //         },
    //         maxLength : function (a, b) {
    //             return a.length <= b
    //         },
    //         equalTo : function (a, b) {
    //             return a.length > 0 && a == $("#" + b).val()
    //         },
    //         digits : function (a) {
    //             return /^\d+$/.test(a)
    //         },
    //         post : function (a) {
    //             return /^[0-9]{6}$/.test(a)
    //         },
    //         noSymbol : function (a) {
    //             return /^[\w|\u4e00-\u9fa5]*$/.test(a)
    //         },
    //         url : function (a) {
    //             return /^(https?|ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(\#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test(a)
    //         },
    //         empty : function () {
    //             return true
    //         },
    //         basic : function (a) {
    //             return !/select|update|delete|truncate|join|union|exec|insert|drop|count|'|"|;|>|<|%/i.test(a)
    //         }
    //     }
    // };
    // e.Js.sendData = function (a, b, d) {
    //     var c = this;
    //     if (/^\//.test(a))
    //         b.needLinkData = 2;
    //     var f = null,
    //         e = -1,
    //         h = -1,
    //         g = -1;
    //     if (b.showLoad) {
    //         e = window.setTimeout(function () {
    //             if ($("#sendDataLoad").length == 0) {
    //                 $("body").append(Js.Tools.getShadeLayer("loadingContent") + "<div id='wjLoad-body' class='loadingContent'><div id='sendDataLoad'><img src='/htmlResource/images/loading.gif'/></div><div><div class='wjLoad-text'>\u8bf7\u7a0d\u7b49<span id='dot'>...</span></div></div></div>");
    //                 Js.Tools.setEleToCenter("#wjLoad-body")
    //             }
    //         }, b.loadDelay || 10);
    //         g = setInterval(function () {
    //             $("#dot").text($("#dot").text().length > 2 ? "" : $("#dot").text() + ".")
    //         }, 400)
    //     } else if (b.showPartLoad) {
    //         $(b.partLoadId).html("<div align='center'><br><br><div id='partLoadId' class='loadStyle30'></div></div>");
    //         Js.widget.loadView("#partLoadId")
    //     }
    //     b.sendTimeout && (h = window.setTimeout(function () {
    //             Js.closeLoadContent();
    //             f.abort();
    //             d && d.call(c, {
    //                 status : "timeout"
    //             });
    //             alert("\u8bf7\u6c42\u8d85\u65f6\uff0c\u8bf7\u7a0d\u540e\u518d\u8bd5\uff01")
    //         },
    //         b.timeout || 2E4));
    //     var i = "" + (b.param || ($.type(b) == "string" ? b : ""));
    //     if (b.type && b.type == "post")
    //         i = b.param;
    //     f = $.ajax({
    //         type : b.type || "get",
    //         url : a,
    //         async : b.async === false ? false : true,
    //         context : b.context || c,
    //         data : i,
    //         dataType : b.dataType || "jsonp",
    //         success : function (f) {
    //             window.clearTimeout(e);
    //             b.sendTimeout && window.clearTimeout(h);
    //             if (b.manualClose)
    //                 $.data(document.body, "timerId", g);
    //             else {
    //                 window.clearInterval(g);
    //                 $(".loadingContent").remove()
    //             }
    //             b.showPartLoad && $(b.partLoadId).empty();
    //             if (f.status == "4") {
    //                 b.manualClose && Js.closeLoadContent();
    //                 Js.login.logout(function () {
    //                     Js.login.showDialog(function () {
    //                         Js.sendData(a, b, d)
    //                     }, {
    //                         exitBn : false
    //                     })
    //                 })
    //             } else if (f.status == "5" && (typeof b.alertPrompt != "undefined" ? b.alertPrompt : 1)) {
    //                 b.manualClose && Js.closeLoadContent();
    //                 alert(f.message, function () {
    //                     d && d.call(b.context || c, f, b.extData)
    //                 })
    //             } else if (f.status == "6") {
    //                 b.manualClose && Js.closeLoadContent();
    //                 window.deleteCookie();
    //                 Js.login.logout(function () {
    //                     alert(f.message, function () {
    //                         window.location.reload()
    //                     })
    //                 })
    //             } else
    //                 f.status == "7" ? alert(f.message, function () {
    //                     Js.login.showDialog(function () {
    //                         Js.sendData(a,
    //                             b, d)
    //                     }, {
    //                         exitBn : false
    //                     })
    //                 }) : f.status != "1" && b.handleError ? alert("\u8bf7\u6c42\u5f02\u5e38\uff0c\u8bf7\u7a0d\u540e\u518d\u8bd5,\u9519\u8bef\u4ee3\u7801\uff1a" + f.status) : d && d.call(b.context || c, f, b.extData)
    //         },
    //         error : function (a, b) {
    //             window.clearTimeout(e);
    //             window.clearTimeout(h);
    //             d && d.call(c, {
    //                 status : "error",
    //                 message : b
    //             })
    //         }
    //     });
    //     typeof passRequestUrl != "undefined" && passRequestUrl(a + "?" + i)
    // };
    // e.Js.closeLoadContent = function () {
    //     window.clearInterval($.data(document.body, "timerId"));
    //     $(".loadingContent").remove()
    // };
    // e.Js.getImagePath =
    //     function () {
    //         return "http://img" + Math.floor(Math.random() * 4) + ".shop.letv.com/"
    //     };
    // e.Js.getMoveAction = function (a) {
    //     var b = false,
    //         d = -1,
    //         c = -1,
    //         f = -1,
    //         e = -1;
    //     $(".moveBar").css("cursor", "move");
    //     $(".moveBar").unbind("mousedown").bind("mousedown", function (h) {
    //         h.preventDefault();
    //         b = true;
    //         d = h.clientX;
    //         c = h.clientY;
    //         var g = $(a),
    //             i = g.offset().left,
    //             j = g.offset().top - Js.Tools.getScrollTop();
    //         f = h.clientX - i;
    //         e = h.clientY - j;
    //         $("body").unbind("mousemove").bind("mousemove", function (a) {
    //             if (!b)
    //                 return false;
    //             a.preventDefault();
    //             a.stopPropagation();
    //             d = a.clientX - d;
    //             c = a.clientY - c;
    //             g.css("left", a.clientX - d - f);
    //             g.css("top", a.clientY - c - e);
    //             d = a.clientX;
    //             c = a.clientY
    //         })
    //     }).unbind("mouseup").bind("mouseup", function () {
    //         b = false;
    //         $("body").unbind("mousemove")
    //     });
    //     $("body").unbind("mouseup").bind("mouseup", function () {
    //         b = false
    //     });
    //     $(".moveBar").blur(function () {
    //         b = false;
    //         $("body").unbind("mousemove")
    //     })
    // };
    // e.Js.Tools = {
    //     getParameterByName : function (a) {
    //         return (a = RegExp("[?&]" + a + "=([^&]*)").exec(window.location.search)) && decodeURIComponent(a[1].replace(/\+/g, " "))
    //     },
    //     template : function (a,
    //                          b) {
    //         return this.trim(window.template(a, b || {}), "")
    //     },
    //     trim : function (a, b) {
    //         var d;
    //         d = a.replace(/(^\s+)|(\s+$)/g, "");
    //         b.toLowerCase() == "g" && (d = d.replace(/\s/g, ""));
    //         return d
    //     },
    //     jsonToString : function (a, b) {
    //         var d = "",
    //             c;
    //         for (c in a)
    //             d = d + (c + "=" + (b ? encodeURIComponent(a[c]) : a[c]) + "&");
    //         return d.slice(0, -1)
    //     },
    //     stringToJson : function (a) {
    //         for (var a = a.split("&"), b = "", d = 0; d < a.length; d++)
    //              var c = a[d].split("="), b = b + ("'" + c[0] + "':'" + c[1] + "',");
    //         return eval("({" + b.substring(0, b.length - 1) + "})")
    //     },
    //     textEllipsis : function (a, b) {
    //         return a.length <=
    //             b ? a : a.substring(0, b) + "..."
    //     },
    //     winWidth : function () {
    //         var a;
    //         if (window.innerWidth)
    //             a = window.innerWidth;
    //         else if (document.body && document.body.clientWidth)
    //             a = document.body.clientWidth;
    //         if (document.documentElement && document.documentElement.clientWidth)
    //             a = document.documentElement.clientWidth;
    //         return a
    //     },
    //     winHeight : function () {
    //         var a;
    //         if (window.innerHeight)
    //             a = window.innerHeight;
    //         else if (document.body && document.body.clientHeight)
    //             a = document.body.clientHeight;
    //         if (document.documentElement && document.documentElement.clientHeight)
    //             a =
    //                 document.documentElement.clientHeight;
    //         return a
    //     },
    //     getScrollTop : function () {
    //         return $.browser.msie && parseInt($.browser.version) == 6 ? document.body.scrollTop : $.browser.safari ? window.pageYOffset : document.documentElement.scrollTop
    //     },
    //     isEmptyObject : function (a) {
    //         for (var b in a)
    //             return false;
    //         return true
    //     },
    //     getShadeLayer : function (a, b) {
    //         var d = document.documentElement.scrollWidth || $("body").outerWidth(),
    //             c = $("body").outerHeight() > Js.Tools.winHeight() ? $("body").outerHeight() : Js.Tools.winHeight();
    //         return '<div id="shadeLayer" class="' +
    //             a + '" style="width:' + d + "px;height:" + c + "px;*background: #000000;" + (b || "") + '"></div>'
    //     },
    //     imgLoad : function (a, b) {
    //         var d = new Image;
    //         d.src = a;
    //         d.readyState ? d.onreadystatechange = function () {
    //             if (d.readyState == "loaded" || d.readyState == "complete") {
    //                 d.onreadystatechange = null;
    //                 b(d.width, d.height)
    //             }
    //         }
    //             : d.onload = function () {
    //             d.complete && b(d.width, d.height)
    //         }
    //     },
    //     setEleToCenter : function (a, b) {
    //         var b = b || {},
    //             d = $(a),
    //             c = d.outerWidth(),
    //             f = d.outerHeight();
    //         d.css("left", b.x || Js.Tools.winWidth() / 2 - c / 2 + (b.offsetX || 0));
    //         if(Js.Tools.mobileDev().iPad)d.css("left", b.x || 600 - c / 2 + (b.offsetX || 0));
    //         c = b.offsetY || 0;
    //         if ($.browser.msie &&
    //             $.browser.version == "6.0" || $.browser.version == "7.0" || Js.Tools.mobileDev().mobile) {
    //             c = c + ((document.body.scrollTop || document.documentElement.scrollTop) + Js.Tools.winHeight() / 2 - f / 2);
    //             Js.Tools.mobileDev().iPhone || d.css("position", "absolute")
    //         } else {
    //             c = c + (Js.Tools.winHeight() / 2 - f / 2);
    //             b.scrollFollow ? d.css("position", "absolute") : d.css("position", "fixed")
    //         }
    //         c = c - 30;
    //         d.css("top", b.y || c < 0 ? 10 : c)
    //     },
    //     pointerInElement : function (a, b) {
    //         b = b || {};
    //         $("body").unbind("mousemove").mousemove(function (d) {
    //             if ($(a).is(":hidden") || $(a).length ===
    //                 0)
    //                 $(this).unbind("mousemove");
    //             else {
    //                 var c = $(a).offset(),
    //                     f = d.clientX + document.body.scrollLeft,
    //                     d = d.clientY + document.body.scrollTop,
    //                     e = c.left + (b.offsetX || 0),
    //                     c = c.top + (b.offsetY || 0),
    //                     h = $(a).width() + (b.offsetWidth || 0),
    //                     g = $(a).height() + (b.offsetHeight || 0);
    //                 if (d < c || d > g + c || f > e + h || f < e) {
    //                     $(this).unbind("mousemove");
    //                     b.callback && b.callback(false)
    //                 } else
    //                     b.callback && b.callback(true)
    //             }
    //         })
    //     },
    //     urlCode : function (a) {
    //         return encodeURIComponent(Aes.Ctr.encrypt(a, getCookie("COOKIE_USER_ID") || "letv", 256))
    //     },
    //     urlDecode : function (a) {
    //         return Aes.Ctr.decrypt(decodeURIComponent(a),
    //             getCookie("COOKIE_USER_ID") || "letv", 256)
    //     },
    //     mobileDev : function () {
    //         var a = navigator.userAgent;
    //         return {
    //             mobile : !!a.match(/AppleWebKit.*Mobile.*/),
    //             ios : !!a.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/),
    //             android : -1 < a.indexOf("Android") || -1 < a.indexOf("Linux"),
    //             iPhone : -1 < a.indexOf("iPhone"),
    //             iPad : -1 < a.indexOf("iPad"),
    //             webApp : -1 == a.indexOf("Safari")
    //         }
    //     },
    //     showCountDown : function (a, b, d, c) {
    //         function f(a, b) {
    //             var a = a / 1E3,
    //                 c = Math.floor(a / 86400),
    //                 f = Math.floor((a - c * 86400) / 3600),
    //                 e = Math.floor((a - c * 86400 - f * 3600) / 60),
    //                 h = Math.floor(a - c * 86400 -
    //                     f * 3600 - e * 60),
    //                 f = f < 10 ? "0" + f : f,
    //                 e = e < 10 ? "0" + e : e,
    //                 h = h < 10 ? "0" + h : h;
    //             b && d && d(c, f, e, h);
    //             return [c, f, e, h]
    //         }
    //         (new Date).getTime();
    //         var e;
    //         f(a, 1);
    //         var h = (new Date).getTime();
    //         e = setInterval(function () {
    //             var g = (new Date).getTime() - h;
    //             h = (new Date).getTime();
    //             a = g > 1200 || g < 900 ? a - 1E3 : a - g;
    //             g = f(a, 0);
    //             if (a <= 0) {
    //                 clearInterval(e);
    //                 typeof c != "undefined" && c(b)
    //             } else
    //                 d && d(g[0], g[1], g[2], g[3])
    //         }, 1E3);
    //         return {
    //             stop : function (a) {
    //                 clearInterval(e);
    //                 typeof a != "undefined" && a()
    //             }
    //         }
    //     }
    // };
    // $.fn.extend({
    //     fixIE6Pos : function (a) {
    //         var b = this.offset().top,
    //             d = this.outerHeight(),
    //             c = parseInt(this.css("top").slice(0, -2)),
    //             f = this,
    //             a = a || $("body").height();
    //         if ($.type(a) == "string")
    //             a = $(a).offset().top;
    //         a = parseInt(a - d);
    //         if ($.browser.msie && $.browser.version == "6.0") {
    //             this.css("position", "absolute");
    //             $(window).scroll(function () {
    //                 var c = b + $(window).scrollTop();
    //                 if (c < a) {
    //                     f.stop();
    //                     f.animate({
    //                         top : c + "px"
    //                     }, 1E3)
    //                 }
    //             })
    //         } else
    //             $(window).scroll(function () {
    //                 if (parseInt($(window).scrollTop() + c) > a) {
    //                     if (f.css("position") != "absolute") {
    //                         f.css("position", "absolute");
    //                         f.css("top", $(window).scrollTop())
    //                     }
    //                 } else {
    //                     f.css("position",
    //                         "fixed");
    //                     f.css("top", c)
    //                 }
    //             })
    //     }
    // });
    // e.Js.widget = {
    //     loadView : function (a) {
    //         var b = a.id || a,
    //             d = $(b).width(),
    //             c = d * (a.frame || 12),
    //             f = 0,
    //             e;
    //         e = setInterval(function () {
    //             ($(b).length === 0 || $(b).is(":hidden")) && clearInterval(e);
    //             $(b).css("background-position", f + "px 0px");
    //             f = f - d;
    //             f == -c && (f = 0)
    //         }, a.flash || 100)
    //     },
    //     popAni : function (a, b, d) {
    //         !$.isFunction(b) && $.type(b) == "object" && (d = b);
    //         d = d || {};
    //         a = $(a);
    //         if (d.notAni) {
    //             a.show();
    //             $.isFunction(b) && b()
    //         } else {
    //             d = parseInt(a.css("top").slice(0, -2));
    //             a.css("opacity", 0);
    //             a.stop().animate({
    //                     opacity : 1,
    //                     top : d + 30
    //                 },
    //                 400, $.isFunction(b) ? b : void 0)
    //         }
    //     },
    //     closeAni : function (a, b, d) {
    //         !$.isFunction(b) && $.type(b) == "object" && (d = b);
    //         d = d || {};
    //         a = $(a);
    //         if (d.notAni) {
    //             $("#shadeLayer").css("opacity", 0);
    //             a.css("opacity", 0);
    //             b && b()
    //         } else {
    //             d = parseInt(a.css("top").slice(0, -2));
    //             $("#shadeLayer").animate({
    //                 opacity : 0
    //             }, 200);
    //             a.stop().animate({
    //                 opacity : 0,
    //                 top : d - 30
    //             }, 300, b)
    //         }
    //     }
    // };
    // window.alert = function (a, b) {
    //     $(".alert").remove();
    //     var d = Js.Tools.getShadeLayer("alert") + "<div id='wjAlert-body' class='alert'><div id='wjAlert-title' class='moveBar'>" + (a.title || "\u63d0\u793a\uff1a") +
    //         (a.countdown ? "<span id='countdownContainer' style='font-size:12px;font-weight:100'>\u6b64\u5f39\u51fa\u6846<span id='timeCountdown'></span>\u540e\u5173\u95ed</span>" : "") + "<a id='wjAlert-close'></a></div><div id='wjAlert-content'>" + (a.body || a) + "</div></div>";
    //     $("body").append(d);
    //     if (a.countdown) {
    //         a.timeCountdown = a.timeCountdown || 10;
    //         $("#timeCountdown").text(a.timeCountdown);
    //         a.timeCountdownId = window.setInterval(function () {
    //             if (a.timeCountdown > 1) {
    //                 a.timeCountdown = a.timeCountdown - 1;
    //                 $("#timeCountdown").text(a.timeCountdown)
    //             } else {
    //                 window.clearInterval(a.timeCountdownId);
    //                 $("#wjAlert-close").trigger("click")
    //             }
    //         }, 1E3);
    //         $("#wjAlert-body").mouseenter(function () {
    //             $("#countdownContainer").remove();
    //             window.clearInterval(a.timeCountdownId)
    //         })
    //     }
    //     Js.Tools.setEleToCenter("#wjAlert-body", {
    //         offsetY : -100
    //     });
    //     Js.widget.popAni("#wjAlert-body");
    //     $("#wjAlert-close").unbind("click").click(function () {
    //         Js.widget.closeAni("#wjAlert-body", function () {
    //             $(".alert").remove();
    //             typeof b != "undefined" && $.isFunction(b) && b()
    //         })
    //     });
    //     Js.getMoveAction("#wjAlert-body")
    // };
    // window.myConfirm = function (a, b) {
    //     $(".comfirm").remove();
    //     $("body").height() > Js.Tools.winHeight() ? $("body").height() : Js.Tools.winHeight();
    //     var d = Js.Tools.getShadeLayer("comfirm") + "<div id='wjConfirm-body' class='comfirm'><div id='wjAlert-title' class='moveBar'>" + (a.title || "\u63d0\u793a\uff1a") + "<a id='wjAlert-close'></a></div><div id='wjConfirm-content'>" + (a.body || a) + "<div id='wjConfirm-Footer'><span id='wjConfirm-ok' class='wj-button'>" + (a.okText || "\u786e\u5b9a") + "</span><span id='wjConfirm-cancel' class='wj-button'>" + (a.cancelText || "\u53d6\u6d88") +
    //         "</span></div></div></div>";
    //     $("body").append(d);
    //     Js.Tools.setEleToCenter("#wjConfirm-body");
    //     Js.widget.popAni("#wjConfirm-body");
    //     $("#wjAlert-close,#wjConfirm-cancel").unbind("click").click(function () {
    //         Js.widget.closeAni("#wjConfirm-body", function () {
    //             $(".comfirm").remove();
    //             $.isFunction(b) && b(false)
    //         })
    //     });
    //     $("#wjConfirm-ok").unbind("click").click(function () {
    //         Js.widget.closeAni("#wjConfirm-body", function () {
    //             $(".comfirm").remove();
    //             $.isFunction(b) && b(true)
    //         })
    //     });
    //     Js.getMoveAction("#wjConfirm-body")
    // };
    // window.pop = function (a,
    //                        b, d) {
    //     function c() {
    //         d.attachBG && $("body").css("overflow", "auto");
    //         Js.widget.closeAni("#wjPop-body", function () {
    //             $(".wjPop").hide();
    //             $(".wjPop").remove()
    //         }, d)
    //     }
    //     !$.isFunction(b) && $.type(b) == "object" && (d = b);
    //     d = d || {};
    //     $(".wjPop").stop().remove();
    //     var e = a;
    //     if (/^\#/.test(e)) {
    //         e = document.getElementById(e.substring(1, e.length)).outerHTML;
    //         d.removeAfterShow && $(a).remove()
    //     }
    //     a = Js.Tools.getShadeLayer("wjPop") + "<div id='wjPop-body' class='wjPop'>" + e + "</div>";
    //     $("body").append(a);
    //     $("#wjPop-body").children().show();
    //     $.browser.msie &&
    //     $("#wjPop-body").width($("#wjPop-body").children().width());
    //     Js.Tools.setEleToCenter("#wjPop-body", d);
    //     d.layerClick && $("#shadeLayer").unbind("click").click(function () {
    //         c()
    //     });
    //     d.attachBG && $("body").css("overflow", "hidden");
    //     Js.widget.popAni("#wjPop-body", d);
    //     $("#wjPop-body #wjPop-close").die("click").live("click", function () {
    //         c();
    //         $.isFunction(b) && b()
    //     });
    //     return {
    //         close : c,
    //         open : function () {
    //             pop(e, b, d)
    //         }
    //     }
    // };
    Number.prototype.toFixed = function (a) {
        with (Math)this.NO = round(this.valueOf() * pow(10, a)) / pow(10, a);
        return String(/\./g.exec(this.NO) ?
            this.NO : this.NO + "." + String(Math.pow(10, a)).substr(1, a))
    };

    /**
     * 移除指定值元素
     * @param {Object} val 需要从数组移除的值或对像
     */
    Array.prototype.removeVal = function (val) {
        var i = this.indexOf(val);
        i == -1 || this.splice(i, 1);
        return this;
    }

    /**
     * 移除下标元素
     * @param {Object} index 需要从数组移除的下标
     */
    Array.prototype.removeIndex = function (index) {
        var i = isNaN(index) ? -1 : parseInt(index);
        this.splice(i, 1);
        return this;
    }


    $.fn.video = function (a) {
        var b = typeof a.check_code != "undefined" ? "&check_code=" + a.check_code : "",
            d = typeof a.payer_name != "undefined" ? "&payer_name=" + a.payer_name : "";
        $(this).html('<object width="' + a.width + '" height="' + a.height + '"  codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9.0.124"  id="letvcloud_player" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" ><param name="allowFullScreen" value="true" ><param name="allowScriptAccess" value="always" ><param name="wmode" value="transparent" /><param name="flashvars" value="vu=' +
            a.vu + "&uu=" + a.uu + "&auto_play=" + a.auto_play + b + d + '" ><param name="movie" value="http://player.letvcloud.com/bcloud.swf" ><param name="quality" value="high"><embed width="' + a.width + '" height="' + a.height + '" align="middle" type="application/x-shockwave-flash" flashvars="vu=' + a.vu + "&uu=" + a.uu + "&auto_play=" + a.auto_play + b + d + '" salign="TL" allowfullscreen="true" allowscriptaccess="always"  menu="true" bgcolor="#000000" devicefont="false" wmode="transparent" scale="noscale" loop="true"  play="true" pluginspage="http://www.macromedia.com/go/getflashplayer" quality="high"  src="http://player.letvcloud.com/bcloud.swf"></object>')
    }
})(window);