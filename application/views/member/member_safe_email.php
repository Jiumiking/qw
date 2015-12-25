<div class="content-main">
    <div class="content-main-title">
        <span class="title">绑定邮箱</span>
        <span class="error-block" id="base_set_msg"></span>
    </div>

    <form id="sign_form" class="sign-form" action="<?php echo site_url('member/safe_password_do')?>" method="post">
        <div>
            <input id="password" name="password" type="password" autocomplete="off" maxlength="50" placeholder="密码"/>
            <p id="m_password" class="error-block"></p>
        </div>
        <div>
            <input id="password_new" name="password_new" type="password" autocomplete="off" maxlength="50" placeholder="新密码">
            <p id="m_password_new" class="error-block"></p>
        </div>
        <div>
            <input id="password_new2" name="password_new2" type="password" autocomplete="off" maxlength="50" placeholder="再次输入新密码"/>
            <p id="m_password_new2" class="error-block"></p>
        </div>
        <div>
            <input class="ipt-btn" id="submit_btn" type="button" value="提交" onclick="sign_submit();" />
            <p id="message" class="error-block"></p>
        </div>
    </form>
</div>