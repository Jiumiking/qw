<?php if(!empty($data)){ ?>
<?php foreach($data as $info){ ?>
<tr>
    <td><?php echo $info['number']; ?></td>
    <td><?php echo $info['name']; ?></td>
    <td>
    <?php if(!empty($data_goods_type)){
    foreach( $data_goods_type as $v ){
        if( $v['id'] == $info['type'] ){
            echo $v['name'];
        }
    }
    } ?>
    </td>
    <td><?php echo $info['date_add']; ?></td>
    <td><?php echo $info['date_status']; ?></td>
    <td><?php if($info['status'] == '1'){echo '上架';}else if($info['status'] == '2'){echo '下架';} ?></td>
    <td>
        <?php if( !empty($info['status']) && $info['status'] == '1' ){ ?>
        <a href="javascript:void(0);" onclick="status_edit('<?php echo $info['id'];?>','2')"><img src="<?php echo base_url('images/ondesc.png');?>" title="下架"></a>
        <?php }else{ ?>
        <a href="javascript:void(0);" onclick="status_edit('<?php echo $info['id'];?>','1')"><img src="<?php echo base_url('images/onasc.png');?>" title="上架"></a>
        <?php } ?>
        <a href="javascript:void(0);" onclick="edit('<?php echo $info['id'];?>')"><img src="<?php echo base_url('images/icon_modify.gif');?>" title="编辑"></a>
        <a href="javascript:void(0);" onclick="amount('<?php echo $info['id'];?>')"><img src="<?php echo base_url('images/icon_copy.gif');?>" title="库存"></a>
        <a href="javascript:void(0);" onclick="del('<?php echo $info['id'];?>')"><img src="<?php echo base_url('images/icon_delete.png');?>" title="删除"></a>
    </td>
</tr>
<?php } ?>
<?php }else{ ?>
<tr>
    <td colspan="7">未找到有效数据</td>
</tr>
<?php } ?>