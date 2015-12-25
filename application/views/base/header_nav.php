<div id="gb-header-nav">
    <div class="top-nav-info">
        <ul class="top-nav-ul fl">
            <li class="pl0"><a href="" class="nav-login" rel="nofollow">收藏本站</a></li>
        </ul>
        <ul class="top-nav-ul fr">
            <?php if( empty($this_user) ){ ?>
            <li>欢迎来到七鹿，请</li>
            <li><a href="<?php echo site_url('sign/signin');?>" class="nav-login" rel="nofollow">登录</a></li>
            <li>|</li>
            <li><a href="<?php echo site_url('sign/signup');?>" class="nav-register" rel="nofollow">注册</a></li>
            <?php } else {?>
            <li><a href="<?php echo site_url('member/center');?>" class="nav-login" rel="nofollow"><?php if(!empty($this_user['nick_name'])){ echo $this_user['nick_name']; }else if(!empty($this_user['phone'])){ echo $this_user['phone']; }else if(!empty($this_user['email'])){ echo $this_user['email']; } ?></a></li>
            <li>|</li>
            <li><a href="<?php echo site_url('sign/signout');?>" class="nav-register" rel="nofollow">退出</a></li>
            <?php } ?>
            <li>|</li>
            <li><a href="<?php echo site_url('member/center');?>" class="nav-register" rel="nofollow">个人中心</a></li>
        </ul>
    </div>
</div>