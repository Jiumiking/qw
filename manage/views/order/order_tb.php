<?php if(!empty($data)){ ?>
<?php foreach($data as $info){ ?>
<tr>
    <td><?php echo $info['order_no']; ?></td>
    <td><?php echo $info['name_nick']; ?></td>
    <td><?php echo $info['money_end']; ?></td>
    <td><?php echo $info['payment_name']; ?></td>
    <td><?php echo $info['shipping_name']; ?></td>
    <td><?php echo $info['accept_name']; ?></td>
    <td><?php echo $info['accept_city']; ?></td>
    <td><?php if($info['status'] == '0'){echo '订单取消';}else if($info['status'] == '1'){echo '订单提交';}else if($info['status'] == '2'){echo '付款成功';}else if($info['status'] == '3'){echo '等待收货';}else if($info['status'] == '4'){echo '订单完成';} ?></td>
    <td><?php echo $info['date_add']; ?></td>
    <td>
        <a href="javascript:void(0);" onclick="show('<?php echo $info['id'];?>')"><img src="<?php echo base_url('images/icon_view.gif');?>" title="查看"></a>
        <a href="javascript:void(0);" onclick="edit('<?php echo $info['id'];?>')"><img src="<?php echo base_url('images/icon_modify.gif');?>" title="编辑"></a>
        <a href="javascript:void(0);" onclick="del('<?php echo $info['id'];?>')"><img src="<?php echo base_url('images/icon_delete.png');?>" title="删除"></a>
    </td>
</tr>
<?php } ?>
<?php }else{ ?>
<tr>
    <td colspan="10">未找到有效数据</td>
</tr>
<?php } ?>