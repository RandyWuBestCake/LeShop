<?php if (!defined('THINK_PATH')) exit(); if($count == 0): ?><div style="width:1000px;margin-left:100px;height:100px;font-size:28px;">抱歉没有找到你需要的商品。不妨看看别的说不定有惊喜呢</div>
<?php else: ?>
<div class="Article">
        <div class="Article_left">
          <input type="hidden" id="f" name="flag" value="" />
            <a id="hot" href="javascript:pxorderProduct('hot');">默认</a>
              <a id="new" href="javascript:pxorderProduct('new');">新品</a>
              <a id="cheap" href="javascript:pxorderProduct('cheap');">价格</a>
          </div>
        <div class="Article_right"><span><span>共 <?php echo ($count); ?>件商品</span></span><a href="javascript:void(0);" class="a1_1" ></a><a href="javascript:pageSubmit('page','null','formSearch','2')" class="b1" ></a><input type='hidden' value='1' name='page.currentPage' id='page.currentPage' /><input type='hidden' value='1' name='currentPage' id='currentPage' /><input type='hidden' value='7' name='totalpage' id='totalpage' /><input type='hidden' name='page.pageSize' value='12' id='page.pageSize'/></div>
</div>

<div class="liebiao" id="list">
  <div class="pailie">
  <?php if(is_array($pros)): foreach($pros as $k=>$vo): ?><ul id="pailie<?php echo ($vo['id']); ?>" onmouseover="ydgg('pailie<?php echo ($vo['id']); ?>')" onmouseout="lkgg('pailie<?php echo ($vo['id']); ?>')">
        	<li class="li1">
        		<a href="<?php echo U('Product/xiangqing',array('id'=>$vo['id']));?>" target="_blank" onclick="productinfo2(<?php echo ($vo['id']); ?>)">
        			<img id="img<?php echo ($vo['id']); ?>" src="/object/<?php echo ($vo['imgmain']); ?>" width="270" height="170"  />
        		</a>
        	</li>
        	<li class="li2">
            <div class="li2_bb">
            <a href="<?php echo U('Product/xiangqing',array('id'=>$vo['id']));?>" target="_blank" onclick="productinfo2(<?php echo ($vo['id']); ?>)" id="pname776"><H3><?php echo ($vo['proname']); ?></H3></a></div></li>
        	<li class="li3">
				  <span class="xianshi_span" onmousemove="xsjiage('div<?php echo ($vo['id']); ?>')" onmouseout="gbjiage('div<?php echo ($vo['id']); ?>')"
					 id="span<?php echo ($vo['id']); ?>">￥<?php echo ($vo['price']); ?>
				  </span>
         </li>
          <li class="li5">
            <?php if(is_array($vo['tags'])): foreach($vo['tags'] as $key=>$v): ?><div><?php echo ($tags[$v]); ?></div><?php endforeach; endif; ?>
          </li>
        	<li class="liangge">
            <a name="duibiname" href="javascript:intocomp(<?php echo ($vo['id']); ?>);" id="duibi<?php echo ($vo['id']); ?>" class="dbanniu"></a>   
            <a href="" target="_blank" class="ljyd">立即购买</a>
	        </li> 
          <input type="hidden" id="allprice<?php echo ($vo['id']); ?>" value="<?php echo ($vo[price]); ?>" />
		</ul>
    <?php if(($k == 3) OR ($k == 7) ): ?></div><div class="pailie"><?php endif; endforeach; endif; ?>
  </div>
</div>

<div  id="temptd">
      <div class="fanye">
        
        <div class="a1" id="page"><?php echo ($page); ?></div>
      </div>
      <input type='hidden' value='1' name='page.currentPage' id='page.currentPage' />
      <input type='hidden' value='1' name='currentPage' id='currentPage' />
      <input type='hidden' value='7' name='totalpage' id='totalpage' />
      <input type='hidden' name='page.pageSize' value='12' id='page.pageSize'/>
</div><?php endif; ?>