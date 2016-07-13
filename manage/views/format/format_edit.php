<form name="edit_form" id="edit_form" action="<?php echo site_url($this_controller.'/my_edit_do');?>" method="post">
    <table class="table_info">
        <tr>
            <th><span class="error-block">*</span>规格名称：</th>
            <td><input name="name" id="name" value="<?php echo empty($data['name'])?'':$data['name']; ?>"><span id="m_name" class="error-block"></span></td>
        </tr>
        <tr>
            <th>描述：</th>
            <td>
                <textarea name="remark" id="remark" rows="3" cols="30"><?php echo empty($data['remark'])?'':$data['remark']; ?></textarea><span id="m_remark" class="error-block"></span>
            </td>
        </tr>
        <tr id="value_tr">
            <th>可选值：</th>
            <td id="value_td">
                <input type="button" value="新增" id="value_btn" cnt="<?php echo count($data_value);?>" onclick="value_add()">
                <?php foreach($data_value as $k=>$v){ ?>
                <p class="mt10">
                    <input type="hidden" name="value[<?php echo $k;?>][id]" value="<?php echo $v['id'];?>">
                    <input type="text" name="value[<?php echo $k;?>][name]" value="<?php echo $v['name'];?>">&nbsp;&nbsp;
                    <img class="cp" title="删除" onclick="p_del(this)" src="<?php echo base_url('images/icon_delete.png');?>">
                </p>
                <?php } ?>
                <span id="m_type" class="error-block"></span>
            </td>
        </tr>
        <tr>
            <th></th>
            <td>
                <input type="button" class="formbtn" name="submit" id="edit_submit_button" value="提交" onclick="edit_do()">
                <input type="button" class="formbtn" name="submit" value="返回" onclick="back()">
                <input type="hidden" name="id" value="<?php echo empty($data['id'])?'':$data['id']; ?>">
            </td>
        </tr>
    </table>
</form>