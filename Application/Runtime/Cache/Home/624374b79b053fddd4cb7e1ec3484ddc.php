<?php if (!defined('THINK_PATH')) exit();?>		<li class="li1" id="dbimageli">
			<a href="<?php echo U('Product/xiangqing',array("id"=>$pros['id']));?>" target="_blank">
			<img id="dbimage" src="/object/<?php echo ($pros['imgmain']); ?>" width="280" height="180" title="<?php echo ($pros['proname']); ?>" /></a>
			<input type="hidden" name="dbpid1" id="dbpid1" value="<?php echo ($pros['id']); ?>" />
		</li>
		<li class="li2" id="dbnameli">
			<div class="li2_bb"><a href="<?php echo U('Product/xiangqing',array("id"=>$pros['id']));?>" target="_blank"title="<?php echo ($pros['proname']); ?>" id="dbname"><?php echo ($pros['proname']); ?></a></div>
		</li>
		<li class="li3">
			
			<span class="xianshi_span" onmousemove="xsjiage('div1')" onmouseout="gbjiage('div1')" id="span1">￥<?php echo ($pros['price']); ?>
			   <div class="xianshi_div1" id="div1"><div class="jian"></div><div class="kuang">硬件全配价格</div></div>
			</span>
		</li>
		<li class="li4" id="dbbuyurl">
				<a href="http://shop.letv.com/product/product-pid-GWGT501008-n-3.html" target="_blank"><input type="button" class="index_yd" value="立即购买" ></a>
		</li>