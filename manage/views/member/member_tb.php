<?php if(!empty($data)){ ?>
<?php foreach($data as $info){ ?>
<tr>
    <td><?php echo $info['name_real']; ?></td>
    <td><?php echo $info['name_nick']; ?></td>
    <td><?php echo $info['phone']; ?></td>
    <td><?php echo $info['email']; ?></td>
    <td><?php if($info['sex']=='0'){echo '保密';}else if($info['sex']=='1'){echo '男';}else if($info['sex']=='2'){echo '女';} ?></td>
    <td><?php echo $info['integral']; ?></td>
    <td><?php echo $info['date_add']; ?></td>
    <td>
        <a href="javascript:void(0);" onclick="edit('<?php echo $info['id'];?>')"><img src="<?php echo base_url('images/icon_modify.gif');?>" title="编辑"></a>
        <a href="javascript:void(0);" onclick="del('<?php echo $info['id'];?>')"><img src="<?php echo base_url('images/icon_delete.png');?>" title="删除"></a>
    </td>
</tr>
<?php } ?>
<?php }else{ ?>
<tr>
    <td colspan="8">未找到有效数据</td>
</tr>
<?php } ?>