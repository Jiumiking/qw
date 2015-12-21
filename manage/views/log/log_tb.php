<?php if(!empty($data)){ ?>
<?php foreach($data as $info){ ?>
<tr>
    <td>
    <?php if(!empty($data_user)){ ?>
    <?php foreach($data_user as $value){ ?>
     <?php if( $value['id'] == $info['user_id'] ){ echo $value['name']; } ?>
    <?php } ?>
    <?php } ?>
    </td>
    <td>
    <?php if(!empty($data_user)){ ?>
    <?php foreach($data_user as $value){ ?>
     <?php if( $value['id'] == $info['user_id'] ){ echo $value['name_real']; } ?>
    <?php } ?>
    <?php } ?>
    </td>
    <td><?php echo $info['log_info']; ?></td>
    <td><?php echo $info['ip_address']; ?></td>
    <td><?php echo $info['date_add']; ?></td>
</tr>
<?php } ?>
<?php }else{ ?>
<tr>
    <td colspan="6">未找到有效数据!</td>
</tr>
<?php } ?>