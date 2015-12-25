<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php $this->load->view('base/header'); ?>
<?php $this->load->view('base/header_nav'); ?>
<?php $this->load->view('base/header_menu'); ?>
    <div id="gb-content">
        <?php $this->load->view('member/member_left'); ?>
        <div id="gb-content-right" >
            <?php
            if( !empty($member_menu) ){
                $this->load->view('member/member_'.$member_menu);
             }
            ?>
        </div>
    </div>
<?php $this->load->view('base/footer'); ?>