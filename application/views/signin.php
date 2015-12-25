<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php $this->load->view('base/header'); ?>
<?php $this->load->view('base/header_menu'); ?>
<div id="gb-content">
    <div class="sign-box" >
        <form id="sign_form" class="sign-form" action="<?php echo site_url('sign/signin_do')?>" method="post">
            <div>
                <span class="f20">欢迎登录</span>
                <p id="msg" class="error-block"><?php echo empty($msg)?'':$msg;?></p>
            </div>
            <div>
                <input id="username" name="username" type="text" maxlength="100" placeholder="手机号/邮箱"/>
                <p id="m_username" class="error-block"></p>
            </div>
            <div>
                <input id="password" name="password" type="password" autocomplete="off" maxlength="50" placeholder="密码"/>
                <p id="m_password" class="error-block"></p>
            </div>
            <div>
                <input class="haf" id="verification_code" type="text" maxlength="50" placeholder="验证码"/>
                <img class="cp" title="这个不认识，换一个" style="vertical-align: middle;" src="<?php echo site_url('sign/captcha_get');?>" id="cap" onclick="captcha_change();"/>
                <p id="m_verification_code" class="error-block"></p>
            </div>
            <div>
                <input class="ipt-btn" id="submit_btn" type="button" value="登录" onclick="sign_submit();" />
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
        var username = true;
        var password = true;
        username = $("#username").authen({reg:['mobile','email'],err_name:'手机号或邮箱',empty:false});
        password = $("#password").authen({err_name:'密码',empty:false});
        if( !captcha_check() ){
            return false;
        }
        if( username && password ){
            $("#sign_form").submit();
            $("#submit_btn").attr("disabled","disabled");
        }
    }
    function captcha_change(){
        $("#cap").attr('src',"<?php echo site_url('sign/captcha_get');?>"+"?t="+Math.random());
    }
    function captcha_check() {
        var code = document.getElementById('verification_code').value;
        if ( code == '' ){
            $("#m_verification_code").html('请输入验证码');
            return false;
        }
        var mark = false;
        $.ajax({
            type: "GET",
            async: false,
            url: "<?php echo site_url('sign/captcha_check');?>",
            data: {code: code},
            success: function (msg) {
                if (msg) {
                    if (msg == '1') {
                        mark = true;
                        $("#m_verification_code").html('');
                    }else{
                        $("#m_verification_code").html('验证码错误或已过期');
                    }
                }
            }
        });
        return mark;
    }
    $("#username").keyup(function(event){
        if( event.keyCode == 13 ){
            sign_submit();
        }
    });
    $("#password").keyup(function(event){
        if( event.keyCode == 13 ){
            sign_submit();
        }
    });
    $("#verification_code").keyup(function(event){
        if( event.keyCode == 13 ){
            sign_submit();
        }
    });
</script>
<?php $this->load->view('base/footer'); ?>