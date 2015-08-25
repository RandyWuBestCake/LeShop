<?php if (!defined('THINK_PATH')) exit();?>  <?php if(is_array($timeline)): foreach($timeline as $key=>$vo): ?><div class="box">
      <div class="date_box">
        <div class="date"><?php echo date('Y-m-d',$vo);?></div>
        <div class="upinfo"><span class="arrow"></span></div>
      </div>
      <div class="movie_list">
        <ul>
        <?php if(is_array($arts)): foreach($arts as $key=>$k): if(is_array($k)): foreach($k as $key=>$v): if(($v['create_time']) == $vo): ?><li style="width:235px">
            <div class="box">
              <div class="pic_infos" height="270">
                <div class="img">
                  <a href="<?php echo U('Look/xiangqing',array('id'=>$v['id']));?>" target="_blank">
                    <img src="/object<?php echo ($v['img']); ?>" width="240" height="183" />
                  </a>
                </div>
                <div class="infos">
                  <a class="title" href="<?php echo U('Look/xiangqing',array('id'=>$v['id']));?>" target="_blank" ><?php echo ($v['title']); ?>
                  </a>
                </div>
              </div>
              <div class="infotitle"></div>
              
            </div>
          </li><?php endif; endforeach; endif; endforeach; endif; ?>
        </ul>
      </div>
    </div><?php endforeach; endif; ?>