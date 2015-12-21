<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <title><?php echo empty($this_setting['station_name'])?'':$this_setting['station_name']; ?></title>
    <link href="<?php echo base_url('images/icon.ico');?>" type="image/x-icon" rel="shortcut icon" />
    <!--动态加载js-->
    <?php if(!empty($_js)){ ?>
    <?php foreach($_js as $js){ ?>
    <script src="<?php echo base_url('js/'.$js.'.js');?>"></script>
    <?php } ?>
    <?php } ?>
    <!--动态加载css-->
    <?php if(!empty($_css)){ ?>
    <?php foreach($_css as $css){ ?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('styles/'.$css.'.css');?>" />
    <?php } ?>
    <?php } ?>
</head>
<body>