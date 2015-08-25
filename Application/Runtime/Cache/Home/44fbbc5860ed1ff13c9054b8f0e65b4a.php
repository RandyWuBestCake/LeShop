<?php if (!defined('THINK_PATH')) exit();?><li class="li1" id="dbimageli">
          <a href="<?php echo U('Product/xiangqing',array("id"=>$lpros['id']));?>" target="_blank">
          <img id="dbimage" src="/object/<?php echo ($lpros['imgmain']); ?>" width="280" height="180" title="<?php echo ($lpros['proname']); ?>" /></a>
          <input type="hidden" name="dbpid2" id="dbpid2" value="<?php echo ($lpros['id']); ?>" />
        </li>
        <li class="li2" id="dbnameli">
        <div class="li2_bb"><a href="<?php echo U('Product/xiangqing',array("id"=>$lpros['id']));?>" target="_blank"title="<?php echo ($lpros['proname']); ?>" id="dbname"><?php echo ($lpros['proname']); ?></a></div>
        </li>
        <li class="li3">
          <span class="xianshi_span" onmousemove="xsjiage('div1')" onmouseout="gbjiage('div1')" id="span1">￥<?php echo ($lpros['price']); ?>
          <div class="xianshi_div1" id="div1"><div class="jian"></div><div class="kuang">硬件全配价格</div></div>
          </span>
        </li>