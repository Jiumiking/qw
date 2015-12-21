<form name="edit_form" id="edit_form" action="<?php echo site_url($this_controller.'/my_edit_do');?>" method="post">
    <table class="table_info">
        <tr>
            <th>角色名称：</th>
            <td><input name="name" id="name" value="<?php echo empty($data['name'])?'':$data['name']; ?>"><span id="m_name" class="error-block"></span></td>
        </tr>
        <tr>
            <th>父角色：</th>
            <td>
                <select name="parent_id">
                    <option value="0">请选择</option>
                    <?php if( !empty($data_role) ){ ?>
                    <?php foreach($data_role as $value){ ?>
                    <option value="<?php echo $value['id'];?>" <?php if(!empty($data['parent_id']) && $data['parent_id'] == $value['id']){ ?>selected="selected"<?php } ?>><?php echo $value['name'];?></option>
                    <?php } ?>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <th>描述：</th>
            <td><input name="remark" id="remark" value="<?php echo empty($data['remark'])?'':$data['remark']; ?>"><span id="m_remark" class="error-block"></span></td>
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