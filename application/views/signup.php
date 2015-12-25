<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php $this->load->view('base/header'); ?>
<?php $this->load->view('base/header_menu'); ?>
<div id="gb-content">
    <div class="sign-box" >
        <form id="sign_form" class="sign-form" action="<?php echo site_url('sign/signup_do')?>" method="post">
            <div>
                <span class="f20">欢迎注册</span>

                <p id="msg" class="error-block"><?php echo empty($msg)?'':$msg;?></p>
            </div>
            <div id="phone_div">
                <input id="phone" name="phone" type="text" maxlength="20" placeholder="手机号"/>
                <p id="m_phone" class="error-block"></p>
            </div>
            <div id="email_div" class="dn">
                <input id="email" name="email" type="text" maxlength="50" placeholder="邮箱"/>
                <p id="m_email" class="error-block"></p>
            </div>
            <div>
                <input id="password" name="password" type="password" autocomplete="off" maxlength="50" placeholder="密码"/>
                <p id="m_password" class="error-block"></p>
            </div>
            <div>
                <input id="password2" name="password2" type="password" autocomplete="off" maxlength="50" placeholder="再次输入密码"/>
                <p id="m_password2" class="error-block"></p>
            </div>
            <div>
                <input class="haf" id="verification_code" type="text" maxlength="50" placeholder="验证码"/>
                <img class="cp" title="这个不认识，换一个" style="vertical-align: middle;" src="<?php echo site_url('sign/captcha_get');?>" id="cap" onclick="captcha_change();"/>
                <p id="m_verification_code" class="error-block"></p>
            </div>
            <div id="phone_code_div">
                <input class="haf" id="phone_code" type="text" maxlength="50" placeholder="短信验证码"/>
                <input class="ipt-btn haf dab" type="button" id="phone_code_btn" value="获取验证码" onclick="phone_code_get();">
                <p id="m_phone_code" class="error-block"></p>
            </div>
            <div>
                <input class="ipt-btn" id="submit_btn" type="button" value="立即注册" onclick="sign_submit();" />
                <p id="message" class="error-block"></p>
            </div>
            <div>
                <a href="javascript:void(0)" onclick="signup_type();" id="signup_type_a">通过邮箱注册?</a>
                <a href="<?php echo site_url('sign/signin')?>" class="cp fr mt5">登录</a>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    function sign_submit(){
        var phone = true;
        var phone2 = true;
        var email = true;
        var email2 = true;
        if ( $("#phone_div").css("display") != 'none' ) {
            phone = $("#phone").authen({reg:'mobile',err_name:'手机号码',min_length:2,max_length:50,empty:false});
            if( phone ){
                phone2 = $("#phone").authen({
                    type:'functions',
                    functions:function(val){
                        var mark = false;
                        $.ajax({
                            type : "GET",
                            async : false,
                            url : "<?php echo site_url('sign/phone_email_unique');?>",
                            data : { value:val },
                            success : function(msg){
                                if(msg == 1){
                                    mark = true;
                                }
                            }
                        });
                        if(mark){
                            return '该手机号码已注册';
                        }
                        return true;
                    },
                    empty:false
                });
                if( !phone_code_check() ){//手机验证码验证
                    return false;
                }
            }
        }
        if ( $("#email_div").css("display") != 'none' ) {
            email = $("#email").authen({reg:'email',err_name:'邮箱',min_length:2,max_length:100,empty:false});
            if( email ){
                email2 = $("#email").authen({
                    type:'functions',
                    functions:function(val){
                        var mark = false;
                        $.ajax({
                            type : "GET",
                            async : false,
                            url : "<?php echo site_url('sign/phone_email_unique');?>",
                            data : { value:val },
                            success : function(msg){
                                if(msg == 1){
                                    mark = true;
                                }
                            }
                        });
                        if(mark){
                            return '该邮箱已注册';
                        }
                        return true;
                    },
                    empty:false
                });
            }
        }
        var password = $("#password").authen({reg:'password',err_name:'密码',min_length:6,max_length:20,empty:false});
        var password2 = $("#password2").authen({reg:'password2',pwd_id:'password',empty:false});

        if( !captcha_check() ){
            return false;
        }

        if( phone && phone2 && email && email2 && password && password2 ){
            $("#sign_form").submit();
            $("#submit_btn").attr("disabled","disabled");
        }
    }
    function signup_type(){
        var a_html = $("#signup_type_a").html();
        if( a_html == "通过邮箱注册?" ){
            $("#signup_type_a").html("通过手机注册?");
            $("#phone_div").hide();
            $("#phone_code_div").hide();
            $("#email_div").show();
        }else if( a_html == "通过手机注册?" ){
            $("#signup_type_a").html("通过邮箱注册?");
            $("#phone_div").show();
            $("#phone_code_div").show();
            $("#email_div").hide();
        }
        captcha_change();
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
    function phone_code_check(){
        $("#m_phone_code").html('短信验证码错误或已过期');
        return false;
    }
    function phone_code_get(){
        if( !captcha_check() ){
            $("#verification_code").focus();
            return false;
        }
        phone_code_timer(60);
        $("#phone_code").focus();
        $("#phone_code_btn").attr("disabled","disabled");
    }
    function phone_code_timer(ss){
        var btn = $("#phone_code_btn");
        if( ss >= 0 ){
            btn.val("重新发送("+ss+")");
            ss--;
            setTimeout("phone_code_timer("+ss+")",1000);
        }else{
            btn.val("获取验证码");
            $("#phone_code_btn").removeAttr("disabled");
        }
    }
</script>
<?php $this->load->view('base/footer'); ?>