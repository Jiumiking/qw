<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <title><?php echo empty($this_setting['station_name'])?'':$this_setting['station_name']; ?></title>
    <script src="<?php echo base_url('js/jquery.js');?>"></script>
    <link href="<?php echo base_url('styles/login.css');?>" rel="stylesheet" type="text/css"  />
</head>
<body>
    <div class="header">
        <h1><a href="#"><img class="logo" src="<?php echo empty($this_setting['logo_name'])?'':$this->config->item('front_url').'/uploads/logo/'.$this_setting['logo_name'];?>" alt="CRM" /></a></h1>
    </div>

    <div class="main cf">
        <form class="login_form" id="login_form" method="post" action="<?php echo site_url('login/do_login');?>">
            <p><label for="user_name" class="es-name">用户名:</label><input id="user_name" name="user_name" type="text" maxlength="50" /></p>
            <p><label for="password" class="es-password">密&nbsp;&nbsp;&nbsp;码:</label><input id="password" name="password" type="password" autocomplete="off" maxlength="50"/></p>
            <p id="p_cap" <?php if(!empty($this_setting['use_captcha']) && $this_setting['use_captcha'] == '1'){ ?> style="display:block;" <?php }else{ ?> style="display:none;" <?php } ?> >
                <label for="verification_code" class="es-verification">验证码:</label><input id="verification_code" type="text" class="w50" />
                <img style="vertical-align: middle;" src="<?php echo site_url('login/get_captcha');?>" id="cap" onclick="change_captcha();"/>&nbsp;
                <a class="es-refresh" href="javascript:void(0);" onclick="change_captcha()">&nbsp;&nbsp;</a>
            </p>
            <p class="login_bt" ><input type="button" onclick="login_submit();" /><span id="message"><?php echo $msg;?></span></p>
        </form>
        <div class="info">
            <p> </p>
            <p><img src="<?php echo base_url('images/login/decoration.png');?>" alt="" /></p>
        </div>
    </div>
    <div class="footer">
        <p>Copyright © 2015 <a href="#">ERP</a></p>
    </div>
    <div class="ssoOverlay dn" id="AjaxProgress" style="top: 0px; left: 0px; position: fixed;">
        <div class="load_content"><span class="close"></span></div>
    </div>

<script type="text/javascript">
function login_submit(){
    var objMsg = document.getElementById("message");
    objMsg.innerHTML = "";
    if ( document.getElementById('user_name').value == '' ){
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
</body>
</html>