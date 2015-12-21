<?php if(!empty($data)){ ?>
<?php foreach($data as $info){ ?>
<tr>
    <td><?php echo $info['number']; ?></td>
    <td><?php echo $info['name']; ?></td>
    <td><?php if($status == '1'){echo '上架';}else if($status == '2'){echo '下架';} ?></td>
    <td><?php echo $info['date_add']; ?></td>
    <td>
        <a href="javascript:void(0);" onclick="edit('<?php echo $info['id'];?>')"><img src="<?php echo base_url('images/icon_modify.gif');?>" title="编辑"></a>
        <a href="javascript:void(0);" onclick="del('<?php echo $info['id'];?>')"><img src="<?php echo base_url('images/icon_delete.png');?>" title="删除"></a>
    </td>
</tr>
<?php } ?>
<?php }else{ ?>
<tr>
    <td colspan="5">未找到有效数据</td>
</tr>
<?php } ?>