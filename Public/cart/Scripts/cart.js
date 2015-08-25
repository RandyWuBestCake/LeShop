// 接口api
var api = {
  "viewCart" 			 : "api/web/query/viewCart.jsonp",
  "getRecommendProducts" : "api/list/getRecommendProducts.jsonp",
  "addCartItem" 		 : "api/web/insert/addCartItem.jsonp",
  "delCartItem" 		 : "api/web/delete/delCartItem.jsonp",
  "updCartItem" 		 : "api/web/update/updCartItem.jsonp",
  "uptCartItemStatus" 	 : "api/web/update/uptCartItemStatus.jsonp",
  "getRecommendProducts" : "api/list/getRecommendProducts.jsonp"
}

// 购物车
var Cart = {      
  load : function () {
    template.helper('getRandom', function(max) {
      return Math.floor(Math.random() * (max + 1));
    });  
    
    var provinceid = this.GET_PROVINCE_ID();
    
    var _this = this;

    Js.sendData(sendLink.cart+ api.viewCart, "cartType=0&TO_PAY=0&arrivalId=" + provinceid, function(data){
      if (data.status == "1") { 
        
        if (!_this.hasdata(data)) return;
		
        $("#loading").hide();
        $('.cart-inner').show();
        $("#head").show();  //go to
		
        Js.sendData(sendLink.addr+"api/web/query/childArea.jsonp?parent_id=0","",function(data){     
          _this.address(data.result, provinceid);
        });
          
        Js.sendData(sendLink.orpe + api.getRecommendProducts,"LOCATION=2&page=1&maxNum=10&ARRIVALID=" + provinceid, function(data){     
          if (data.status == 1 && data.result[0].LISTPROD && data.result[0].LISTPROD !== "null" && data.result[0].LISTPROD.length > 0) {               
            _this.recommend(data.result[0]);
          }
        });
          
        _this.init(data);   
        
      } else {
        $("#loading").html("购物车繁忙，请刷新页面后再试");
      }
    });   
  }, 
  hasdata : function (data) {
  	if (!data || !data.result || data.result === "null" || !data.result[0]) { 
      $("#loading").hide();
      $(".cart_none").show();
      
      $("#head").empty();
      $("#recommend").empty();
      $("#plus").empty();
      $("#markup").empty();
      $("#suite").empty();
      $("#program").empty();
      $("#price").empty();
      $("#pay").empty();
      
      if(!Js.login.getAuth()){   
        $("#notLoginCartNone").show();
        
        $("#login_cart_none").unbind("click").bind("click", function(){
          Js.login.hasLogin(function(){location.reload();});
        });   
        
      } else {
        $("#loginCartNone").show();
      }

      return false;
    }

    return true;
  },
  init : function (data) {    
    if (!this.hasdata(data)) return;
    
    var item = data.result[0];
    
    // 全选
    this.allcheck(item);
    
    // 套装
    this.suite(item);  
    
    // 单品
    this.product(item);  
    
    // 加价购详细内容
    this.markup(item);
    
    // 清单  
    this.summary(item);
    
    // 加价购列表
    this.plus(item);  
    
    // 结算  
    this.pay(item);    
  },
  allcheck : function (data) {
    var _this = this;
    
     // 样式
    var hasgoods = false;
	
    if (!hasgoods && data.suite && data.suite !== "null") {
      $.each(data.suite, function (index, item) {
        if (item.showStatus * 1 === 6 || item.IS_ADVANCE_BOOKING * 1 === 1) {
          hasgoods = true;

          return false;
        }
      });
    }
   
    if (!hasgoods && data.products && data.products !== "null") {
      $.each(data.products, function (index, item) {                 
        if (item.showStatus * 1 === 6) {
          hasgoods = true;

          return false;
        }
      });
    }
    
    $.each(data.promotionVOList.priceMarkup, function (index, item) {
      if (item.showStatus * 1 === 6) {
        hasgoods = true;
        
        return false;
      }
    });
      
    if (!hasgoods) {
      this.disabled($("#allcheck"));
    }
    
    if (data.isAllSelected * 1 === 1) {
      this.checked($("#allcheck"));
    } else {
      this.dischecked($("#allcheck"));
    }
    
    // 全选事件
  	$("#allcheck").unbind().click(function () {
      _this.check($(this), {PRODUCT_TYPE : 0});
    });
  },
  recommend : function (data) {     
    var _this = this;
    
    var $parent = $("#recommend");
    
    $parent.show();
    
    $.each(data.LISTPROD, function (index, item) {
      // 生成模板  
      var $container = $("<div></div>");
      
      $parent.append($container);
      
      $container.append(Js.Tools.template("like", item));  
      
      $container.find(".cart_nobtn").click(function () {
        item.purType = 1;
        
        _this.buy($(this), item, function (data) {
          _this.product(data);
        });
      });
    });     
  },
  plus : function (data) {
    if (!data.promotionVOList || data.promotionVOList === "null" || !data.promotionVOList.priceMarkup || data.promotionVOList.priceMarkup === "null") return;
    
	var _this = this;
    
    var $parent = $("#plus");

    $parent.empty();

	$.each(data.promotionVOList.priceMarkup, function (index, item) {
      // 生成模板  
      var $container = $("<div></div>");
    
   	  $parent.append($container);
      
	  $container.append(Js.Tools.template("priceMarkup", item));
      
      // 选项卡
      var canover = true;

      if (item.isAddCart * 1 === 1) {
      	canover = false;

        $container.find(".cart_menu").addClass("cart_menu_hover");   
      }
      
      $container.find(".cart_menu").mouseover(function () {
        $(this).addClass("cart_menu_hover");
        $(this).find(".cart_menuCon").show();
      }).mouseout(function () {
        if (canover) {
          $(this).removeClass("cart_menu_hover");
        }
        $(this).find(".cart_menuCon").hide();
      });
           
      // 购买
      $container.find(".cart_menu").click(function () {  
        if (!canover) return alert("您已购买过此商品"), false;
        
        item.purType = 4;
        
        _this.buy($(this), item, function (data) {
          	_this.plus(data);
        	_this.markup(data);
        });
      });
      
      $container.find(".cart_menu").click(function (event) {  
        event.stopPropagation();
      });
    });  
  },
  markup : function (data) {     
    if (!data.promotionVOList || data.promotionVOList === "null" || !data.promotionVOList.priceMarkup || data.promotionVOList.priceMarkup === "null") return;
    
	var _this = this;
    
    var $parent = $("#markup");
    
    $parent.empty();

    $.each(data.promotionVOList.priceMarkup, function (index, item) {      
      if (item.isAddCart * 1 === 1) {
      	// 生成模板           
        var $container = $("<div></div>");
    
   		$parent.append($container);
        
        $container.append(Js.Tools.template("plus222", item));
 		
        // 删除事件
        $container.find(".plus-erase").mouseover(function () {            
          $(this).removeClass("blue").addClass("red");  		  
        }).mouseout(function () {
          $(this).removeClass("red").addClass("blue");  
        }).click(function () { 
          _this.remove($container, item);
        });
        
        // 勾选事件
        $container.find(".force").click(function () {   
          _this.check($(this), item);
        });
      }   
    }); 
  }, 
  suite : function (data) {
    if (!data.suite || data.suite === "null") return;
    
	var _this = this;
    
    var $parent = $("#suite");
    
    $parent.empty();	
    
	$.each(data.suite, function (index, item) {
      var cartItemIds = [item.cartItemId];
	  
      if (item.optionalProductinfo === "null" || !item.optionalProductinfo) {
      	item.optionalProductinfo = [];
      }  
      
	  $.each(item.optionalProductinfo, function (index2, data) {    
		cartItemIds.push(data.cartItemId);
	  });
	  
	  item.cartItemId = cartItemIds.join(",");
      
      if (item.requiredProductinfo === "null" || !item.requiredProductinfo) {
      	item.requiredProductinfo = [];
      }  
        
	  // 生成模板 
      var $container = $("<div></div>");
    
      $parent.append($container);
      
	  $container.append(Js.Tools.template("suit", item));
	  
	  // 套装删除
	  $container.find(".suite-erase").mouseover(function () {            
        $(this).removeClass("blue").addClass("red");  		  
      }).mouseout(function () {
        $(this).removeClass("red").addClass("blue");  
      }).click(function () { 
        _this.remove($container, item);
      });
	  
	  // 勾选事件
      $container.find(".force").click(function () { 
        _this.check($(this), item);
      }); 
      
      // 减少套装数量事件
      $container.find(".count-down").click(function () { 
        var $value = $container.find(".count-free");
		
		 var count = $value.val();
		
		_this.validata($container, item, $value, --count);
      });
      
      // 增加套装数量事件
      $container.find(".count-up").click(function () {
        var $value = $container.find(".count-free");
        
        var count = $value.val();
		
		_this.validata($container, item, $value, ++count);
      });
      
      // 选择套装数量事件
      $container.find(".count-free").change(function () {
        _this.validata($container, item, $(this), $(this).val());
      });
      
      // 可选商品操作
	  $($container.find(".optional")).each(function (index2, tr) {
		var $parent = $(tr);
		var data = item.optionalProductinfo[index2];
        
         // 可选商品删除
        $parent.find(".optional-erase").mouseover(function () {            
			$(this).removeClass("blue").addClass("red");  		  
		  }).mouseout(function () {
			$(this).removeClass("red").addClass("blue");  
		  }).click(function () { 
			_this.remove($parent, data);
		  });
	  	
        // 可选商品增加
		$parent.find(".optional-up").click(function () { 
			var $value = $parent.find(".optional-free");
        
            var count = $value.val();
		
			_this.validata($parent, data, $value, ++count);
		});
        
        // 可选商品减少
        $parent.find(".optional-down").click(function () { 
			var $value = $parent.find(".optional-free");
        
            var count = $value.val();
          
            _this.validata($parent, data, $value, --count);
		});
        
        // 可选商品选择数量
        $parent.find(".optional-free").change(function () {
          _this.validata($parent, data, $(this), $(this).val());
        });
	  });
	}); 
  },
  product : function (data) {
    if (!data.products || data.products === "null") return;
    
    var _this = this;
    
    var $parent = $("#program");
    
    $parent.empty();
    
    $.each(data.products, function (index, item) {
      // 生成模板        
      var $container = $("<div></div>");
    
      $parent.append($container);
      
      $container.append(Js.Tools.template("product", item));
      
      // 删除事件
      $container.find(".product-erase").mouseover(function () {            
        $(this).removeClass("blue").addClass("red");  		  
      }).mouseout(function () {
        $(this).removeClass("red").addClass("blue");  
      }).click(function () { 
        _this.remove($container, item);
      });
      
      // 勾选事件
      $container.find(".force").click(function () { 
        _this.check($(this), item);
      });
      
      // 减少数量事件
      $container.find(".count-down").click(function () {  
		var $value = $container.find(".count-free");
        
         var count = $value.val();
	
		_this.validata($container, item, $value, --count);		
      });
      
      // 增加数量事件
      $container.find(".count-up").click(function () {        
		var $value = $container.find(".count-free");
        
        var count = $value.val();
        
        _this.validata($container, item, $value, ++count);
      });
      
      // 选择数量事件
      $container.find(".count-free").change(function () {
		_this.validata($container, item, $(this), $(this).val());
      });
    }); 
  },
  summary : function (data) {
    var _this = this;
	
	$("#price").empty().append(Js.Tools.template("summary", data));
    
    var _this = this;
    
     // 样式
    var hasselect = false;
	
    if (!hasselect && data.suite && data.suite !== "null") {
      $.each(data.suite, function (index, item) {
        if (item.ITEM_STATUS * 1 === 1) {
          hasselect = true;

          return false;
        }
      });
    }
   
    if (!hasselect && data.products && data.products !== "null") {
      $.each(data.products, function (index, item) {                 
        if (item.ITEM_STATUS * 1 === 1) {
          hasselect = true;

          return false;
        }
      });
    }
    
    $.each(data.promotionVOList.priceMarkup, function (index, item) {
      if (item.ITEM_STATUS * 1 === 1) {
        hasselect = true;
        
        return false;
      }
    });
    
    // 删除选中
    $("#clearCart").die("click").live("click", function () {
       if (hasselect) {
       	 _this.remove($(this), {});
       } else {
       	 alert("请选择要删除的商品");
       }
    });
  },
  pay : function (data) {
	var _this = this;
 
	$("#pay").empty().append(Js.Tools.template("payment", data));
    
    function test () {
      var val1 = $(window).height() + $(document).scrollTop(),
    
    	val2 = $("#attact").height() + $("#attact").offset().top + $("#pay").height(),
          
        val;
    
      if (val1 < val2) {
        val = val1 - $("#pay").height();
        
        $("#pay").css({"position" : "absolute", "top" : val});
      } else {
        val = val2;
        
        $("#pay").css({"position" : "static", "top" : val});
      } 
    }
    
    test();
    
    $(window).scroll(test);
	
	$("#account").click(function () {
	   _this.account(data);
	});
	
	  $("#goback").click(function () {
		window.location.href = _hrefPath + "/product/index.html";
	  });
  },
  address : function (data, index) {
    // 生成模板   
    $.each(data, function (i, item) {
      var option = $("<option value=" + item.AREA_ID + ">" + item.AREA_NAME + "</option>");
      
      $(".cart_select").append(option); 
    });
    
    $(".cart_select").val(index);
    
    // 重选地区
    $(".cart_select").change(function () {
      domainName = ".shop.letv.com";
      
      addCookie("COOKIE_SELECT_PROVINCE_ID", $(this).val(), 70000);
      
      location.reload();
    });
  },
  account : function (data) {
    var _this = this;
    
	if(data.sumPrice * 1 === 0){
	  alert("请选择您要结算的商品");
	}
	else{
	  Js.login.hasLogin(function(){
		
		$("#light").show();
		$("#fade").show();
        $("#fade").css("height", $(document).height());
        $("#light").css("top", document.body.scrollTop + document.documentElement.clientHeight / 2 - 50);
		
		var linkParam = "s=" + data.sellerId;
        
        var provinceid = _this.GET_PROVINCE_ID();
		
		window.location.href = _hrefPath + "/orderInfoNew.html?" + Js.Tools.urlCode(linkParam + "&provinceId=" + provinceid);
	  },{showLoad:true,manualClose:true,notTimeout:true}); 
	}
	
	//---add by wangjianmeng 增加webtrekk跟踪代码
	try{
	  letv.sendWebTrekkInfo(data.result[b]);
	}catch(e){} 
  },
  validata : function ($container, item, $elem, count) {
	var purchaseQuantity = item.purchaseQuantity;
    
    if (count * 1 === 0) {
      this.remove($container, item);
    } else if (!/^[1-9]\d*$/.test(count)) {
      alert("请填写正确的数量");
      
      this.val($elem, purchaseQuantity); 
    } else if (count > item.maxBuyNum) {
      alert("此商品最多购买" + item.maxBuyNum + "件");
      
      this.val($elem, purchaseQuantity);           
    } else if (count < item.minBuyNum) {
      alert("此商品最少购买" + item.minBuyNum + "件");
      
      this.val($elem, purchaseQuantity); 
    } else {
      this.val($elem, count); 
      this.count($container, item, $elem);
    }
  },
  count : function ($panrent, item, $elem) {
    if (item.countFlag * 1 === 1) return;

    var _this = this;
    
  	var cartItemId = item.cartItemId.split(",")[0];
  
  	var purType = cartItemId[1] ? 2 : 1;
  
    var provinceid = this.GET_PROVINCE_ID();  
    
    item.countFlag = 1;

	Js.sendData(sendLink.cart + api.updCartItem, "cartType=0&pids=" + cartItemId + "&cartItemIds=" + cartItemId + "&needCartDetail=1&purQuantity=" + $elem.val() + "&purType=" + purType + "&arrivalId=" + provinceid, function(data){          
      if (data.status == "1") {        
        _this.init(data);        
      } else {
		_this.val($elem, item.purchaseQuantity); 
	  
        alert("商品操作失败，请稍后再试");       
      }
      
      item.countFlag = 0;
    });	
  },
  remove : function ($panrent, item) {
    var _this = this;
    
    myConfirm("是否要删除此商品？",function(isok){
      if(isok){
        var provinceid = _this.GET_PROVINCE_ID();   
      
        var purType = item.cartItemId ? 1 : 2;
        
        Js.sendData(sendLink.cart + api.delCartItem, "cartType=0&cartItemIds=" + item.cartItemId + "&needCartDetail=1&purType=" + purType + "&arrivalId=" + provinceid, function(data){                    
          if (data.status == "1") {  
            _this.init(data);
          } else {
            alert("商品删除失败，请稍后再试");       
          }
        });
      }
    });
  },
  check : function ($elem, item) {
    var _this = this;

	this.disabled($elem);
    
    var status = this.ischecked($elem) ? 1 : 0;   

    var isAll = item.cartItemId ? 0 : 1;
    
    var provinceid = this.GET_PROVINCE_ID(); 
    
    var purType = item.PRODUCT_TYPE;
    
    Js.sendData(sendLink.cart + api.uptCartItemStatus, "CART_ITEM_ID=" + item.cartItemId + "&PROMOTION_ID=0&NEED_CART_DETAIL=1&SELECT_ALL=" + isAll + "&STATUS=" + status + "&arrivalId=" + provinceid + "&purType=" +  purType, function(data){
      if(data.status=="1"){      
        _this.init(data);       
      } else {
        // go to 
        _this.ischecked($elem) ? _this.dischecked($elem) : _this.checked($elem);
      }
          
      _this.abled($elem);
    });
  },
  buy : function ($elem, item, callback) {	    
	var _this = this;
	
	var provinceid = this.GET_PROVINCE_ID(); 
    
    var realpromotionid = item.realpromotionid || 0;
    
    var someid = realpromotionid + "_" + item.pid + "_0_1";
    
    var purType = item.purType;
    	
	Js.sendData(sendLink.cart + api.addCartItem,"cartType=0&purType=" + purType + "&realpromotionid_productid_promotionid_quantity=" + someid + "&purQuantity=1&needCartDetail=1&TO_PAY=0&arrivalId=" + provinceid,function(data){
	  if(data.status=="1"){        
        callback(data.result[0]);

        _this.summary(data.result[0]);
        
        _this.pay(data.result[0]);    

		alert("已成功加入商品");        
      } else if (data.status=="5") {

      } else {
		alert("商品添加失败，请稍后再试");  
	  }
	});
  },
  disabled : function ($elem) {
  	$elem.attr("disabled", true);
  },
  abled : function ($elem) {
  	$elem.removeAttr("disabled");
  },
  dischecked : function ($elem) {
  	$elem.attr("checked", false);
  },
  checked : function ($elem) {
  	$elem.attr("checked", true);
  },  
  ischecked : function ($elem) {
  	return $elem.is(":checked");
  },
  val : function ($elem, count) {
	$elem.val(count); 
  },
  GET_PROVINCE_ID : function () {
  	return getCookie("COOKIE_SELECT_PROVINCE_ID") || 1;
  }
};

var letv = {
  sendWebTrekkInfo : function (inParam){
	var webtrekkParam = this.webtrekkProductParam(inParam);
	if(wt){	
		if(typeof(webtrekkParam)!="undefined"){
			if(webtrekkParam){
				if(webtrekkParam.productIdList){
					wt.product = webtrekkParam.productIdList;//主商品id
				}
				if(webtrekkParam.productNum){
					wt.productQuantity = webtrekkParam.productNum;//用户购买数量
				}
			}	
		}	
		wt.productStatus = "add"; // 可选产品状态：（添加|配置|查看）
		wt.sendinfo();
	}
  },
  webtrekkProductParam : function (inParam){
	var webtrekk_param_product_idList = "";
	var webtrekk_param_product_num = "";
	var retobj = {};
	if(inParam){
		if(inParam.products && (inParam.products.length >0)){
			 $.each(inParam.products, function(key,p){ 
				if(key==inParam.products.length-1){
					webtrekk_param_product_idList += p.pid;
					webtrekk_param_product_num += p.purchaseQuantity;
				}else{
					webtrekk_param_product_idList += p.pid+';';
					webtrekk_param_product_num += p.purchaseQuantity+';';
				}  
			}); 
		}
	}
	if(webtrekk_param_product_idList){
		retobj.productIdList = webtrekk_param_product_idList;
	}
	if(webtrekk_param_product_num){
		retobj.productNum = webtrekk_param_product_num;
	}
	return retobj;
  }
};
	