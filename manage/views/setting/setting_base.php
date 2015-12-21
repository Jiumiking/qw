<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php $this->load->view('base/header'); ?>
<?php $this->load->view('base/head_base'); ?>

<div id="div_content">
    <table class="table_info" id="setting_tb">
        <tr>
            <th >站点名称：</th>
            <td >
                <input id="station_name" name="station_name" type="text" value="<?php echo empty($this_setting['station_name'])?'':$this_setting['station_name']; ?>">
                <input type="hidden" id="last_station_name" value="<?php echo empty($this_setting['station_name'])?'':$this_setting['station_name']; ?>">
                <span id="m_station_name" class="error-block"></span>
            </td>
        </tr>
        <tr>
            <th>站点LOGO：</th>
            <td>
                <img id="logo_show" src="<?php echo empty($this_setting['logo_name'])?'':$this->config->item('front_url').'/uploads/logo/'.$this_setting['logo_name'];?>">
                <input type="file" name="logo" id="logo" onchange="logo_change()">
            </td>
        </tr>
        <tr>
            <th>登录验证码：</th>
            <td>
                <input name="use_captcha" id="use_captcha_1" type="radio" class="cp" value="1" <?php if( !empty($this_setting['use_captcha']) && $this_setting['use_captcha'] == '1' ){ ?> checked="checked" 
                <?php } ?>">
                <label for="use_captcha_1" class="cp">开启</label>
                &nbsp;&nbsp;
                <input name="use_captcha" id="use_captcha_0" type="radio" class="cp" value="0" <?php if( empty($this_setting['use_captcha']) || $this_setting['use_captcha'] == '0' ){ ?> checked="checked" 
                <?php } ?>">
                <label for="use_captcha_0" class="cp">关闭</label>
                <input type="hidden" id="last_use_captcha" value="<?php echo empty($this_setting['use_captcha'])?0:$this_setting['use_captcha']; ?>">
            </td>
        </tr>
        <tr>
            <th>分页数量：</th>
            <td>
                <input id="page_number" name="page_number" type="text" value="<?php echo empty($this_setting['page_number'])?'':$this_setting['page_number']; ?>">
                <input type="hidden" id="last_page_number" value="<?php echo empty($this_setting['page_number'])?'':$this_setting['page_number']; ?>">
                <span id="m_page_number" class="error-block"></span>
            </td>
        </tr>
        <tr>
            <th>登录密码错误次数：</th>
            <td>
                <input id="user_error_times" name="user_error_times" type="text" value="<?php echo empty($this_setting['user_error_times'])?'':$this_setting['user_error_times']; ?>">
                <input type="hidden" id="last_user_error_times" value="<?php echo empty($this_setting['user_error_times'])?'':$this_setting['user_error_times']; ?>">
                <span id="m_user_error_times" class="error-block"></span>
            </td>
        </tr>
    </table>
</div>
<?php $this->load->view('setting/setting_js'); ?>
<?php $this->load->view('base/footer'); ?>