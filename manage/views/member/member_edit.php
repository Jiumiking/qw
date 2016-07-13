<form name="edit_form" id="edit_form" action="<?php echo site_url($this_controller.'/my_edit_do');?>" method="post">
    <table class="table_info">
        <tr>
            <th>名称：</th>
            <td><input name="name_real" id="name_real" value="<?php echo empty($data['name_real'])?'':$data['name_real']; ?>"><span id="m_name_real" class="error-block"></span></td>
        </tr>
        <tr>
            <th>昵称：</th>
            <td><input name="name_nick" id="name_nick" value="<?php echo empty($data['name_nick'])?'':$data['name_nick']; ?>"><span id="m_name_nick" class="error-block"></span></td>
        </tr>
        <tr>
            <th>性别</th>
            <td>
                <input name="sex" id="sex_1" type="radio" class="cp" value="1" <?php if( empty($data['sex']) || $data['sex'] == '1' ){ ?> checked="checked" <?php } ?>"><label class="cp" for="sex_1">男</label>&nbsp;&nbsp;&nbsp;&nbsp;
                <input name="sex" id="sex_2" type="radio" class="cp" value="2" <?php if( !empty($data['sex']) && $data['sex'] == '2' ){ ?> checked="checked" <?php } ?>"><label class="cp" for="sex_2">女</label>
            </td>
        </tr>
        <tr>
            <th>手机号码：</th>
            <td><input name="phone" id="phone" value="<?php echo empty($data['phone'])?'':$data['phone']; ?>"><span id="m_phone" class="error-block"></span></td>
        </tr>
        <tr>
            <th>邮箱：</th>
            <td><input name="email" id="email" value="<?php echo empty($data['email'])?'':$data['email']; ?>"><span id="m_email" class="error-block"></span></td>
        </tr>
        <tr>
            <th>微信：</th>
            <td><input name="weixin" id="weixin" value="<?php echo empty($data['weixin'])?'':$data['weixin']; ?>"><span id="m_weixin" class="error-block"></span></td>
        </tr>
        <tr>
            <th>QQ：</th>
            <td><input name="qq" id="qq" value="<?php echo empty($data['qq'])?'':$data['qq']; ?>"><span id="m_qq" class="error-block"></span></td>
        </tr>
        <tr>
            <th>生日：</th>
            <td><input name="birthday" id="birthday" value="<?php echo empty($data['birthday'])?'':$data['birthday']; ?>" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd',alwaysUseStartDate:true})"><span id="m_birthday" class="error-block"></span></td>
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