$(function() {
  // 登录
  var user = isLogin2(),
  time = null;
  if (user) {
    $(".login_bt").hover(function() {
      if ($("#userMenu").attr("id")) {
        $("#userMenu").show();
      } else {
        $(this).attr("href", "javascript:;")
        $(".topSearch").append($("<dl id='userMenu'></dl>"));
        $("#userMenu").html("<dd>" + user + "</dd><!--<dd><a href='javascript:;'>我的收藏</a></dd><dd><a href='javascript:;'>站内信</a></dd><dd><a href='javascript:;'>用户中心</a></dd>--><dd><a href='"+login_out+"'>安全退出</a></dd>")
      }
    }, function() {
      time = setTimeout(function() {
        $("#userMenu").hide();
      }, 1000);
      $("#userMenu").off("mouseover").on("mouseover", function() {
        clearInterval(time);
        $("#userMenu").show();
      });
      $("#userMenu").off("mouseout").on("mouseout", function() {
        $("#userMenu").hide();
      });
    });
  }
});
//读取cookies
function getCookie(name)
{
    var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");

    if(arr=document.cookie.match(reg))

        return (arr[2]);
    else
        return null;
}
function isLogin2() {
  // var sso_cookie = getCookie("sso_tk"),
    loginBean = false;
  // if (sso_cookie) {
  //   return loginBean;
  // } else {
  //   sso_cookie = sso_cookie.replace(/^\"|\"$/g, "");
    $.ajax({
      url: is_Login,
      type: 'get',
      async: false,
      contentType: "application/json; charset=UTF-8",
      dataType: "json",
      success: function(data) {
        if (data.bean.username) {
          loginBean = data.bean.username;
        } else {
          loginBean = false;
        }
      }
    });
  // }
  return loginBean;
}
