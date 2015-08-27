//加载应用Ajax
function LoadAjaxPage (options) {
      this.ajaxOptions=$.extend({
          ajaxUrl:'',
          pageSize:1,
          ajaxContentType: "application/json; charset=UTF-8",
          ajaxDataType:"json",
          ajaxType:'get',
          ajaxBeforeFn:function(){},
          ajaxErrorFn:function(){},
          successFn:function(){}
        }, options||{});
      this.pageNow=1;
      this.pageTotal=0;
      this.prePage=1;
}
LoadAjaxPage.prototype.ajaxLoadPage=function(page,pageBoxId){
    var that=this;
    that.ajaxOptions.page=page||1;
    $.ajax({
        url:that.ajaxOptions.ajaxUrl,
        type:that.ajaxOptions.ajaxType,
        contentType:that.ajaxOptions.ajaxContentType,
        dataType:that.ajaxOptions.ajaxDataType,
        data:{page:that.ajaxOptions.page,pageSize:that.ajaxOptions.pageSize},
        beforeSend:function(){
            eval(that.ajaxOptions.ajaxBeforeFn);
        },
        success:function(data){
            var listTotal=data.total||data.count;
            that.pageTotal=Math.ceil(listTotal/that.ajaxOptions.pageSize);
            that.pageNow=page||1;
            if(pageBoxId){
                that.loadPageDom(that.pageNow,that.pageTotal,pageBoxId);
            }
            that.ajaxOptions.successFn(data);
        },
        error:function(){
            eval(that.ajaxOptions.ajaxErrorFn);
        }
    });
};
LoadAjaxPage.prototype.ajaxNextPage=function(){
    this.ajaxLoadPage(++this.pageNow);
    this.prePage=this.pageNow;
};
LoadAjaxPage.prototype.ajaxPrevPage=function(){
    this.ajaxLoadPage(--this.pageNow);
};
LoadAjaxPage.prototype.loadPageDom=function(nowNum,allNum,pageBoxId){
    var that=this;
    $('#'+pageBoxId).html("");
    var pageHtml="<a href='#"+(nowNum-1)+"' class='prePage'>上一页</a><a href='#"+(parseInt(nowNum)+1)+"' class='nextPage'>下一页</a>";
    $('#'+pageBoxId).html(pageHtml);
    if( nowNum>=6 && allNum>=10 ){
        $("#"+pageBoxId+" .prePage").after($("<a href='#1'>1</a><span>...</span>"));
    }
    if(nowNum<=1){
        $("#"+pageBoxId+" .prePage").removeAttr("href").addClass("noPage");
    }
    if(nowNum>=allNum){
        $("#"+pageBoxId+" .nextPage").removeAttr("href").addClass("noPage");
    }
    if(allNum<=9){
        for(var i=1;i<=allNum;i++){
            var oA = $("<a href='#"+i+"'>"+i+"</a>");
            if(nowNum == i){
                oA.addClass("page-on").removeAttr("href");
            }
            $("#"+pageBoxId+" .nextPage").before(oA);
        }
    }
    else{
        for(var i=1;i<=9;i++){
            var oA = $("<a>");
            if(nowNum <5){
                oA.attr("href","#"+i).html(i);
                if(nowNum == i){
                    oA.addClass("page-on").removeAttr("href");
                }
            }
            else if( (allNum - nowNum) <4 ){
                oA.attr("href",'#' + (allNum - 9 + i)).html(allNum - 9 + i);
                if((allNum - nowNum) == 0 && i==9||(allNum - nowNum) == 1 && i==8||(allNum - nowNum) == 2 && i==7||(allNum - nowNum) == 3 && i==6){
                    oA.html(allNum - 9 + i).addClass("page-on").removeAttr("href");
                }
            }
            else{
                oA.attr("href",'#' + (nowNum - 5 + i)).html(nowNum - 5 + i);
                if(i==5){
                    oA.html(nowNum - 5 + i).addClass("page-on").removeAttr("href");
                }
            }
            $("#"+pageBoxId+" .nextPage").before(oA);

        }

    }
    if( (allNum - nowNum) >= 5 && allNum>=10 ){
        $("#"+pageBoxId+" .nextPage").before($("<span>...</span><a href='#"+allNum+"'>"+allNum+"</a>"));

    }
    $("#"+pageBoxId+" a").on("click",function(){
        var nowNum = $(this).attr('href').split("#");
        that.ajaxLoadPage(nowNum[1],"pageBox");
        return false;
    });
}
//Ajax加载中和错误提示
function loadingError (parent,Ldclass,text) {
    $(parent+' .loading').remove();
    $(parent+' .error').remove();           
    var Tp=$('<p>').appendTo(parent).attr('class',Ldclass);
    Tp.html(text).css({'top':Tp.parent().innerHeight()/2-Tp.innerHeight()/2,'left':Tp.parent().innerWidth()/2-Tp.innerWidth()/2,'z-index':100}) ;
}
//AJax
function loadAjaxPt(fullUrl,templateID,target,callBack){
    $.ajax({
        url:fullUrl,
        type:'get',
        contentType: "application/json; charset=UTF-8",
        dataType:"json",
        success:function(data){
            if(!data){
                return false;
            }
            var output = Mustache.render($("#"+templateID).html(),data);
            $(target).html(output);
            if(callBack){
                callBack();
            }
        }
    });
}