<?php if(!empty($data)){ ?>
<?php foreach($data as $info){ ?>
<tr>
    <td><?php echo $info['name']; ?></td>
    <td><?php echo $info['name_real']; ?></td>
    <td><?php echo $info['phone']; ?></td>
    <td><?php echo $info['email']; ?></td>
    <td>
    <?php if(!empty($data_role)){ ?>
    <?php foreach($data_role as $value){ ?>
     <?php if( $value['id'] == $info['role'] ){ echo $value['name']; } ?>
    <?php } ?>
    <?php } ?>
    </td>
    <td><?php echo $info['date_add']; ?></td>
    <td><?php echo $info['password_times']; ?></td>
    <td><?php if($info['status'] == '1'){echo '有效';}else if($info['status'] == '2'){echo '锁定';}else if($info['status'] == '3'){echo '注销';} ?></td>
    <td>
        <a href="javascript:void(0);" onclick="change_user_pwd('<?php echo $info['id'];?>')"><img src="<?php echo base_url('images/icon_change_pass.gif');?>" title="修改密码"></a>
        <?php if($info['id'] != '100'){ ?>
        <a href="javascript:void(0);" onclick="edit('<?php echo $info['id'];?>')"><img src="<?php echo base_url('images/icon_modify.gif');?>" title="编辑"></a>
        <a href="javascript:void(0);" onclick="del('<?php echo $info['id'];?>')"><img src="<?php echo base_url('images/icon_delete.png');?>" title="删除"></a>
        <?php } ?>
        <?php if( !empty($info['status']) && $info['status'] == '1' ){ ?>
        <a href="javascript:void(0);" onclick="lock('<?php echo $info['id'];?>','2')"><img src="<?php echo base_url('images/icon_lock.png');?>" title="锁定"></a>
        <?php }else{ ?>
        <a href="javascript:void(0);" onclick="lock('<?php echo $info['id'];?>','1')"><img src="<?php echo base_url('images/icon_key.png');?>" title="解锁"></a>
        <?php } ?>
    </td>
</tr>
<?php } ?>
<?php }else{ ?>
<tr>
    <td colspan="9">未找到有效数据!</td>
</tr>
<?php } ?>