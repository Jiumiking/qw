<?php if(!empty($data)){ ?>
<?php foreach($data as $info){ ?>
<tr>
    <td><?php echo $info['id']; ?></td>
    <td><?php echo $info['name']; ?></td>
    <td><?php echo $info['type_name']; ?></td>
    <td><?php echo $info['ob']; ?></td>
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