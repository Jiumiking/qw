<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php $this->load->view('base/header'); ?>
<?php $this->load->view('base/header_menu'); ?>
<div id="gb-content">
    <div class="sign-box" >
        <form class="sign-form" action="<?php echo site_url('sign/signup_do')?>" method="post">
            <div>
                <span class="f20">欢迎注册</span>
                <p></p>
            </div>
            <div>
                <input id="phone" name="phone" type="text" maxlength="20" placeholder="手机号"/>
                <p id="m_phone" class="error-block"></p>
            </div>
            <div>
                <input id="email" name="email" type="text" maxlength="50" placeholder="邮箱"/>
                <p id="m_email" class="error-block"></p>
            </div>
            <div>
                <input id="password" name="password" type="password" autocomplete="off" maxlength="50" placeholder="密码"/>
                <p id="" class="error-block"></p>
            </div>
            <div>
                <input type="button" value="立即注册" onclick="sign_submit();" />
                <p id="message" class="error-block"></p>
            </div>
            <div>
                <a class="cp mt20"> 忘记密码</a>
                <a href="<?php echo site_url('sign/signup')?>" class="cp fr mt5">注册</a>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
function sign_submit(){
    var objMsg = document.getElementById("message");
    objMsg.innerHTML = "";
    if ( document.getElementById('username').value == '' ){
        objMsg.innerHTML = "请输入用户名!";
        return false;
    }
    if ( document.getElementById('password').value == '' ){
        objMsg.innerHTML = "请输入密码!";
        return false;
    }

    try {
        if ( document.getElementById("p_cap").style.display == 'block' ) {
            var vCode = document.getElementById('verification_code').value;
            if ( vCode == '' ){
                objMsg.innerHTML = "请输入验证码!";
                return false;
            }
            if( !check_captcha(vCode) ){
                objMsg.innerHTML = "验证码错误!";
                change_captcha();
                return false;
            }
        }
    } catch (e) {
    }
    $("#login_form").submit();
}
function change_captcha(){
    document.getElementById("cap").src = "<?php echo site_url('login/get_captcha');?>";
}
function check_captcha(code){
    var mark = false;
    $.ajax({
        type : "GET",
        async : false,
        url : "<?php echo site_url('login/check_captcha');?>",
        data : { code:code },
        success : function(msg){
            if(msg){
                if(msg == '1'){
                    mark = true;
                }
            }
        }
    });
    return mark;
}
</script>
<?php $this->load->view('base/footer'); ?>