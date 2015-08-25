<?php if (!defined('THINK_PATH')) exit();?><div class="mws-form-item">
    <table>
        <tr>
            <?php if(is_array($goods)): foreach($goods as $k=>$vo): echo ($k%5==0?'
        </tr>
        <tr>':''); ?>
            <td width="14px"><input type="checkbox" name="ids[]" value="<?php echo ($vo['id']); ?>"></td>
            <td class="tag"><?php echo ($vo['title']); ?></td>
            <td class="img"><img src="/object/Public/Uploads/<?php echo ($vo['img']); ?>" width="60px"></td><?php endforeach; endif; ?>
        </tr>
        <tr>
            <td colspan="12"></td>
            <td id="page" colspan='3'><?php echo ($page); ?></td>
        </tr>
    </table>
</div>