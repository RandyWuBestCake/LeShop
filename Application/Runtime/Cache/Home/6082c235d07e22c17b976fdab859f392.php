<?php if (!defined('THINK_PATH')) exit(); if(is_array($infos)): foreach($infos as $key=>$vo): ?><li>
      <div class="pro_img t_c"><a webtrekkparam="{ct:'lj_sy_pjzq409900000269'}" title="<?php echo ($vo["name"]); ?>" href="<?php echo U('Fit/detail',array('id'=>$vo['id']));?>" target="_blank"><img width="180" height="180" alt="<?php echo ($vo["name"]); ?>"  src="/object<?php echo ($vo["img"]); ?>" class="lz" style="display: inline;"></a></div>
      <div class="pro_name"><a webtrekkparam="{ct:'lj_sy_pjzq409900000269'}" title="<?php echo ($vo["name"]); ?>" href="<?php echo U('Fit/detail',array('id'=>$vo['id']));?>" target="_blank"><?php echo ($vo["name"]); ?></a></div>
      <div class="pro_price">￥<?php echo ($vo["price"]); ?></div>
      <div class="pro_evaluate">
         <p><em class="star" grade="<?php echo ($vo["grade"]); ?>" count="<?php echo ($count); ?>"><i class=""></i><i class=""></i><i class=""></i><i class=""></i><i></i></em> <a target="_blank" href="/product/product-pid-409900000269.html#pingjia">已有<span><?php echo ($vo["num"]); ?></span>人评价</a></p>
      </div> 
      <div class="pro_btns" >
      <a  num="1" amount="<?php echo ($vo["amount"]); ?>" count="<?php echo ($count); ?>" type="slideTip" class="addCart gray_bt_s block_center"><span class="">加入购物车</span></a>
      <a href="<?php echo U('Fit/detail',array('id'=>$vo['id']));?>" target="_blank" class="want_more gray_bt_s block_center">了解详情</a>
      </div>
      <div class="added_cart" style="position:absolute;top:303px;right:0px;background-color:#d80c18;width:300px;text-align:center;line-height:56px;font-size:12px;color:white;height:56px;display:none;">已加入购物车</div>
            <div class="discount "></div>
  </li><?php endforeach; endif; ?>
</ul>
<script type="text/javascript">
  
  //获取商品数量
  var count = $('.addCart').attr('count');
  //遍历判定每个商品的订购状态是否可购买
  for(var c=0;c<count;c++){
    //获取商品库存数量
    var amount = $('.addCart').eq(c).attr('amount');
    // alert(amount);
    if(amount == 0){
       $('.addCart').eq(c).css('display','none');
    }else{
       $('.want_more').eq(c).css('display','none');
    }
  }
  $('.addCart').click(function(){
    $(this).parent().next().slideDown(200).delay(800).slideUp(200);
  })
//评价星级
var v = $('.star').eq(g).attr('grade');
var k = $('.star').attr('count');

for(var g=0;g<k;g++){
var v = $('.star').eq(g).attr('grade');
for(var i=0;i<v;i++){
  $('.star').eq(g).find('i').eq(i).attr('class','on');
}
}
</script>