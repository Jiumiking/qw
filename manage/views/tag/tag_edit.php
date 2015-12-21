<form name="edit_form" id="edit_form" action="<?php echo site_url($this_controller.'/my_edit_do');?>" method="post">
    <table class="table_info">
        <tr>
            <th>标签名称：</th>
            <td><input name="name" id="name" value="<?php echo empty($data['name'])?'':$data['name']; ?>"><span id="m_name" class="error-block"></span></td>
        </tr>
        <tr>
            <th>标签类型：</th>
            <td>
                <select name="type" id="type">
                    <option value="">请选择</option>
                    <?php if( !empty($date_type) ){ ?>
                    <?php foreach($date_type as $value){ ?>
                    <option value="<?php echo $value['id'];?>" <?php if( !empty($data['type']) && $data['type'] == $value['id'] ){ ?> selected="selected" <?php } ?> ><?php echo $value['name'];?></option>
                    <?php } ?>
                    <?php } ?>
                </select>
                <span id="m_type" class="error-block"></span>
            </td>
        </tr>
        <tr>
            <th>排序：</th>
            <td><input name="ob" id="ob" value="<?php echo empty($data['ob'])?'':$data['ob']; ?>"><span id="m_ob" class="error-block"></span></td>
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