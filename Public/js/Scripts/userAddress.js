/**
*   用户收货地址页面js
*/
//一件购 地址补充
function upToYjgAddr(id){
    $(window).scrollTop(200);    
    $("#userAddressList").slideUp('600');
    $("#upToYjg").removeClass('hidden');
    $("#upToYjg").show();
}

//一件购 信息中 发票信息显示
function showInvoiceInfo(id){
    if(id==3){
        $(".invoice_type_2").hide();
        $(".invoice_type_3").show();
    }else{
        $(".invoice_type_3").hide();
        $(".invoice_type_2").show();
    }
}

// 一件购信息中保存 取消事件(简写 没有写功能)
function saveToYjg(){
    $("#upToYjg").hide();
    $("#userAddressList").show();
}
function  closeUpToYjg(){
    $("#upToYjg").hide();
    $("#userAddressList").show();
}

// 删除功能
function dodel(id){
    $('#addrInfo_'+id).remove();
    $.get(dodel_url,{id:id},function(msg){
        if(msg == 0){
            alert('删除失败');
        }else{
            $("#num").html(msg);
        }
    });
}

//隐藏新建/修改地址form表单
function hideNewAddress(){
    $("#editAddress").slideUp(600,function(){
        // $("#userAddressList").show();
        $("#userAddressList").slideDown(600);
    })
}

//修改用户地址
//新增地址
$(".newAddressButton").click(function() {
    var num = $("#num").html();
    if(num>=5){
        alert("地址数达到最大限制,请先删除不常用的地址");
        return false;
    }
    $("#editAddress").remove();
    $.get(addres_url,{},function(msg){
            $("#userAddressList").slideUp(1000,function(){
                if(msg==1){ //返回1 说明用户未登录
                    alert("请先登录");
                    location.href = "../";
                    return;
                }
            //显示返回信息
           
        $("#newAddress").html(msg);
        $("#newAddress").css('border','none');
        $("#newAddress").show();
         //用户选择地区
            //绑定省份选择事件
            $("#province").change(function() {
                $("#city").val(0);
                $.get(ssq,{id:$(this).val()},function(msg){
                    $("#city").html(msg);
                });
            });

            // 绑定城市选择事件
            $("#city").change(function() {
                $("#district").val(0);
                $.get(ssq,{id:$(this).val()},function(msg){
                    $("#district").html(msg);
                });
            });


    })
})
});

// 编辑用户信息
function editUserAddrInfo(uid){
        //ajax获取用户信息
        $("#editAddress").remove();
        $.get(addres_url,{id:uid},function(msg){
            $("#userAddressList").slideUp(1000,function(){
                if(msg==1){ //返回1 说明用户未登录
                    alert("请先登录");
                    location.href = "../";
                    return;
                }
            //显示返回信息
            $(window).scrollTop(200);
            $("#list_page").html(msg);
            //用户选择地区
            //绑定省份选择事件
            $("#province").change(function() {
                $("#city").val(0);
                $.get(ssq,{id:$(this).val()},function(msg){
                    $("#city").html(msg);
                });
            });

            // 绑定城市选择事件
            $("#city").change(function() {
                $("#district").val(0);
                $.get(ssq,{id:$(this).val()},function(msg){
                    $("#district").html(msg);
                });
            });

        });
    });
}

