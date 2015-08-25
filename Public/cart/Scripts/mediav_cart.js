var _mvq = _mvq || [];
var products=[];

//---add by wangjianmeng  晶赞统计全局变量
var _zpq = [];

_mvq.push(
    ['$setAccount', 'm-23892-1'],
    ['$logConversion']
);
(function() {
    var mvjs = document.createElement('script');
    mvjs.type = 'text/javascript';
    mvjs.async = true;
    mvjs.src = ('https:' == document.location.protocol ? 'https://static-ssl' : 'http://static') + ".mediav.com/mv.js";
    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(mvjs);
})();

$(function (){
	getPids();
});

function getPids(){
  	 var provinceid = getCookie("COOKIE_SELECT_PROVINCE_ID") || 1;
  
	Js.sendData(sendLink.cart+ "api/web/query/viewCart.jsonp", "cartType=0&TO_PAY=0&arrivalId=" + provinceid, function(data){
    	if(data.status == "1"){
          var data = data.result[0];
          
          $.each(data.suite, function (index, item) {
          	products.push(item);
          });
          
          $.each(data.products, function (index, item) {
          	products.push(item);
          });
          
          $.each(data.promotionVOList.priceMarkup, function (index, item) {
          	products.push(item);
          });
         
          	zpqPushInfo(data);
    	}
  	}); 
}

function getProductInfo(pids){
    Js.sendData(sendLink.prod +'api/web/query/productBaseInfo.jsonp',"pid="+pids,function(data){
    	if(data.status == "1"){
          	$.each(data.result, function(key, p){
				products.push(p);
			});
      		mvqPushInfo();
    	}
  	}); 
}

function mvqPushInfo(){
	_mvq.push(['$setGeneral', 'cartview', '', getCookie("COOKIE_USER_NAME"), getCookie("COOKIE_USER_ID")]);
	_mvq.push(['$setGeneral', 'recommend', '', getCookie("COOKIE_USER_NAME"), getCookie("COOKIE_USER_ID")]);
	$.each(products, function(key, p){
		_mvq.push(['$addGoods', p.TYPE, p.BRAND, p.PRODUCT_NAME, p.PID, p.SALE_PRICE, 'http://img2.hdletv.com/'+p.IMAGE_SRC, p.TYPE_NAME, p.BRAND, '1', p.PRICE, '1', p.SALE_END,'']);		    
	});
  	_mvq.push(['$logConversion']);
  	_mvq.push(['$logData']);
}

//---add by wangjianmeng 增加晶赞统计代码
function zpqPushInfo(data){
  var productIdList='';
  var totalPrice =0;
  $.each(products, function(key, p){ 
    if(key==products.length-1){
    	productIdList += (p.PID||p.pid);
    }else{
      	productIdList += (p.PID||p.pid)+',';
    }   
	});
    totalPrice = data.sumPrice;
_zpq = [];
_zpq.push(['_setPageID','124']);
_zpq.push(['_setPageType', 'mycartPage']);
_zpq.push(['_setParams',productIdList,totalPrice]);
_zpq.push(['_setAccount','104']);

$(function(){
  (function() {
  if(typeof(_zpq) != 'undefined' ){
    if( null != _zpq && ''!= _zpq && 'null'!=_zpq ){ 
        var zp = document.createElement('script'); zp.type = 'text/javascript'; zp.async = true;
        zp.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.zampda.net/s.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(zp, s);   
    }
  }
 })();
})

}
