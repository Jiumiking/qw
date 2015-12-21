<form name="edit_form" id="edit_form" action="<?php echo site_url($this_controller.'/my_edit_do');?>" method="post">
    <table class="table_info">
        <tr>
            <th>用户名：</th>
            <td><input name="name" id="name" value="<?php echo empty($data['name'])?'':$data['name']; ?>"><span id="m_name" class="error-block"></span></td>
        </tr>
        <?php if(empty($data['id'])){ ?>
        <tr>
            <th>密码：</th>
            <td><input type="password" name="password" id="password" value=""><span id="m_password" class="error-block"></span></td>
        </tr>
        <tr>
            <th>重输密码：</th>
            <td><input type="password" id="password2" value=""><span id="m_password2" class="error-block"></span></td>
        </tr>
        <?php } ?>
        <tr>
            <th>姓名：</th>
            <td><input name="name_real" id="name_real" value="<?php echo empty($data['name_real'])?'':$data['name_real']; ?>"><span id="m_name_real" class="error-block"></span></td>
        </tr>
        <tr>
            <th>手机号：</th>
            <td><input name="phone" id="phone" value="<?php echo empty($data['phone'])?'':$data['phone']; ?>"><span id="m_phone" class="error-block"></span></td>
        </tr>
        <tr>
            <th>邮箱：</th>
            <td><input name="email" id="email" value="<?php echo empty($data['email'])?'':$data['email']; ?>"><span id="m_email" class="error-block"></span></td>
        </tr>
        <tr>
            <th>角色：</th>
            <td>
                <select name="role" id="role">
                    <option value="">请选择</option>
                    <?php if( !empty($data_role) ){ ?>
                    <?php foreach($data_role as $value){ ?>
                    <option value="<?php echo $value['id'];?>" <?php if( !empty($data['role']) && $data['role'] == $value['id'] ){ ?> selected="selected" <?php } ?> ><?php echo $value['name'];?></option>
                    <?php } ?>
                    <?php } ?>
                </select>
                <span id="m_role" class="error-block"></span>
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