<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php $this->load->view('base/menu'); ?>
<div class="main">
    <?php $this->load->view('base/sidebar'); ?>
    <div class="cont">
        <p class="clumb">
            <?php if(!empty($bread['bread'])){ ?>
            <?php foreach($bread['bread'] as $key=>$value){ ?>
                <span <?php if($key == '3'){ ?>class="last"<?php } ?> ><?php echo $value;?></span>
            <?php } ?>
            <?php } ?>
        </p>