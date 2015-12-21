<?php if(!empty($data)){ ?>
<?php foreach($data as $info){ ?>
<tr>
    <td><?php echo $info['id']; ?></td>
    <td><?php echo $info['name']; ?></td>
    <td><?php echo $info['parent_id']; ?></td>
    <td><?php echo $info['remark']; ?></td>
    <td>
        <?php if( $info['id'] != '1' ){ ?>
        <a href="javascript:void(0);" onclick="edit('<?php echo $info['id'];?>')"><img src="<?php echo base_url('images/icon_modify.gif');?>" title="编辑"></a>
        <a href="javascript:void(0);" onclick="access('<?php echo $info['id'];?>')"><img src="<?php echo base_url('images/icon_setup.gif');?>" title="权限设置"></a>
        <a href="javascript:void(0);" onclick="del('<?php echo $info['id'];?>')"><img src="<?php echo base_url('images/icon_delete.png');?>" title="删除"></a>
        <?php } ?>
    </td>
</tr>
<?php } ?>
<?php }else{ ?>
<tr>
    <td colspan="5">未找到有效数据!</td>
</tr>
<?php } ?>