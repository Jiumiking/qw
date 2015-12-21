<?php if(!empty($data)){ ?>
<?php foreach($data as $info){ ?>
<tr>
    <td><?php echo $info['id']; ?></td>
    <td><?php echo $info['name_ch']; ?></td>
    <td>
    <?php if(!empty($data_tag_2)){ ?>
    <?php foreach($data_tag_2 as $value){ ?>
     <?php if( $value['id'] == $info['place'] ){ echo $value['name']; } ?>
    <?php } ?>
    <?php } ?>
    </td>
    <td><?php echo $info['language']; ?></td>
    <td><?php echo $info['date_add']; ?></td>
    <td><?php echo $info['date_edit']; ?></td>
    <td><?php if($info['status'] == '1'){echo '热映中';}else if($info['status'] == '2'){echo 'hot';} ?></td>
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