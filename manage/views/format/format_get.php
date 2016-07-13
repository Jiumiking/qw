<div class="mb10">
<p><?php echo $data['name'].'：';?></p>
<?php if($data['id'] == 1){//颜色 ?>
    <?php if(!empty($data_value)){?>
    <?php foreach($data_value as $k=>$v){ ?>
    <?php
    if($k==0){
        echo '白色系：';
    }elseif($k==3){
        echo '</br>灰色系：';
    }elseif($k==7){
        echo '</br>黑色系：';
    }elseif($k==8){
        echo '</br>红色系：';
    }elseif($k==15){
        echo '</br>黄色系：';
    }elseif($k==26){
        echo '</br>绿色系：';
    }elseif($k==33){
        echo '</br>蓝色系：';
    }elseif($k==41){
        echo '</br>紫色系：';
    }elseif($k==46){
        echo '</br>棕色系：';
    }elseif($k==54){
        echo '</br>其他系：';
    }
    ?>
    <span class="mr50">
        <input type="checkbox" class="cp" name="format[<?php echo $i;?>]" data="<?php echo $v['name'];?>" id="format_<?php echo $v['id'];?>" value="<?php echo $v['id'];?>" onclick="format_check()" <?php if(!empty($data_format_all)){foreach($data_format_all as $vv){if($vv == $v['id']){echo "checked='checked'";}}}?> >
        <label class="cp" for="format_<?php echo $v['id'];?>">
            <i class="color-box" style="background: rgb(<?php echo $v['remark'];?>);"></i>
            <?php echo $v['name'];?>
        </label>
    </span>
    <?php } ?>
    <?php } ?>
<?php }else{ ?>
    <?php if(!empty($data_value)){?>
    <?php foreach($data_value as $k=>$v){ ?>
    <span class="mr50">
        <input type="checkbox" class="cp" name="format[<?php echo $i;?>]" data="<?php echo $v['name'];?>" id="format_<?php echo $v['id'];?>" value="<?php echo $v['id'];?>" onclick="format_check()" <?php if(!empty($data_format_all)){foreach($data_format_all as $vv){if($vv == $v['id']){echo "checked='checked'";}}}?>>
        <label class="cp" for="format_<?php echo $v['id'];?>"><?php echo $v['name'];?></label>
    </span>
    <?php } ?>
    <?php } ?>
<?php } ?>
</div>