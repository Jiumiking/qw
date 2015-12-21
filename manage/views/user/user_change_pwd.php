<table class="table_info">
    <?php if( !empty($old_show) ){ ?>
    <tr>
        <th>
            原密码：
        </th>
        <td>
            <input type="hidden" name="pwd_uid" id="pwd_uid" value="">
            <input type="password" name="pwd_o" id="pwd_o" value="">
            <span id="m_pwd_o" class="error-block"></span>
        </td>
    </tr>
    <?php } ?>
    <tr>
        <th>
            新密码：
        </th>
        <td>
            <input type="password" name="pwd_n" id="pwd_n" value="">
            <span id="m_pwd_n" class="error-block"></span>
        </td>
    </tr>
    <tr>
        <th>
            确认密码：
        </th>
        <td>
            <input type="password" name="pwd_n2" id="pwd_n2" value="">
            <span id="m_pwd_n2" class="error-block"></span>
        </td>
    </tr>
    <tr>
        <th></th>
        <td>
            <input type="button" name="cpwd_b" onclick="change_user_pwd_do()" value="确认">
            <input type="button" name="cpwd_b" onclick="back()" value="返回">
        </td>
    </tr>
</table>