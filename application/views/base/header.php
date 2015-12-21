<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <title><?php echo empty($this_setting['station_name'])?'':$this_setting['station_name']; ?></title>
    <link href="<?php echo base_url('application/images/icon.ico');?>" type="image/x-icon" rel="shortcut icon" />
    <!--动态加载js-->
    <?php if(!empty($_js)){ ?>
    <?php foreach($_js as $js){ ?>
    <script src="<?php echo base_url('application/js/'.$js.'.js');?>"></script>
    <?php } ?>
    <?php } ?>
    <!--动态加载css-->
    <?php if(!empty($_css)){ ?>
    <?php foreach($_css as $css){ ?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('application/styles/'.$css.'.css');?>" />
    <?php } ?>
    <?php } ?>
</head>
<body>

    <div class="gb-top-nav">
        <div class="top-nav-info">
            <a href="http://www.douban.com/accounts/login?source=movie" class="nav-login" rel="nofollow">登录</a>
            <a href="http://www.douban.com/accounts/register?source=movie" class="nav-register" rel="nofollow">注册</a>
        </div>
    </div>

    <div class="gb-top-poster nav">
        <div class="slider">
          <div class="slider-container">
            <div class="slider-wrapper">
              <div class="slide"> <img src="<?php echo base_url('uploads/poster/img1.jpg');?>" alt="jQuery Slider with CSS Transitions"> </div>
              <div class="slide"> <img src="<?php echo base_url('uploads/poster/img2.jpg');?>" alt="jQuery Slider with CSS Transitions"> </div>
              <div class="slide"> <img src="<?php echo base_url('uploads/poster/img3.jpg');?>" alt="jQuery Slider with CSS Transitions"> </div>
              <div class="slide"> <img src="<?php echo base_url('uploads/poster/img4.jpg');?>" alt="jQuery Slider with CSS Transitions"> </div>
            </div>
          </div>
        </div>
    </div>
<script type="text/javascript">
    (function() {
        Slider.init({
            target: $('.slider'),
            time: 6000
        });
    })();
</script>

    <div id="wrapper">
        <div id="content">