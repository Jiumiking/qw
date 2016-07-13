<?php if(!empty($data)){ ?>
<?php foreach($data as $info){ ?>
<tr>
    <td><?php echo $info['id']; ?></td>
    <td><?php echo $info['name']; ?></td>
    <td>
        <?php
        for($i=1;$i<=5;$i++){
            if(!empty($info['format'.$i])){
                foreach($data_format as $v){
                    if($v['id'] == $info['format'.$i]){
                        echo $v['name'].' ';
                    }
                }
            }
        }
        ?>
    </td>
    <td>
        <a href="javascript:void(0);" onclick="edit('<?php echo $info['id'];?>')"><img src="<?php echo base_url('images/icon_modify.gif');?>" title="编辑"></a>
        <a href="javascript:void(0);" onclick="del('<?php echo $info['id'];?>')"><img src="<?php echo base_url('images/icon_delete.png');?>" title="删除"></a>
    </td>
</tr>
<?php } ?>
<?php }else{ ?>
<tr>
    <td colspan="4">未找到有效数据</td>
</tr>
<?php } ?>