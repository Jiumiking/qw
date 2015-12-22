<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php $this->load->view('base/header'); ?>
<?php $this->load->view('base/header_menu'); ?>
<div id="gb-content">
    <div class="sign-box" >
        <form class="sign-form" action="<?php echo site_url('sign/signin_do')?>" method="post">
            <div><span class="f20">欢迎登录</span></div>
            <div><input id="username" name="username" type="text" maxlength="50" placeholder="手机号/邮箱"/></div>
            <div><input id="password" name="password" type="password" autocomplete="off" maxlength="50" placeholder="密码"/></div>
            <span id="message"><?php echo empty($msg)?'':$msg;?></span>
            <div><input type="button" value="登录" onclick="login_submit();" /></div>
            <div><a class="cp mt20"> 忘记密码</a><a href="<?php echo site_url('sign/signup')?>" class="cp fr mt5">注册</a></div>
        </form>
    </div>
</div>
<?php $this->load->view('base/footer'); ?>