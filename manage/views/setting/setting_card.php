<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php $this->load->view('base/header'); ?>
<?php $this->load->view('base/head_base'); ?>

<div id="div_content">
    <table class="table_info" id="setting_tb">
        <tr>
            <th>会员卡前缀：</th>
            <td>
                <input id="card_prefix" name="card_prefix" type="text" value="<?php echo empty($this_setting['card_prefix'])?'':$this_setting['card_prefix']; ?>">
                <input type="hidden" id="last_card_prefix" value="<?php echo empty($this_setting['card_prefix'])?'':$this_setting['card_prefix']; ?>">
                <span id="m_card_prefix" class="error-block"></span>
            </td>
        </tr>
        <tr>
            <th>会员卡递增值：</th>
            <td>
                <input id="card_addnum" name="card_addnum" type="text" value="<?php echo empty($this_setting['card_addnum'])?'':$this_setting['card_addnum']; ?>">
                <input type="hidden" id="last_card_addnum" value="<?php echo empty($this_setting['card_addnum'])?'':$this_setting['card_addnum']; ?>">
                <span id="m_card_addnum" class="error-block"></span>
            </td>
        </tr>
        <tr>
            <th>会员卡起增数：</th>
            <td>
                <input id="card_number" name="card_number" type="text" value="<?php echo empty($this_setting['card_number'])?'':$this_setting['card_number']; ?>">
                <input type="hidden" id="last_card_number" value="<?php echo empty($this_setting['card_number'])?'':$this_setting['card_number']; ?>">
                (当前为：<?php echo empty($this_setting['card_number'])?'':$this_setting['card_number']; ?>,修改的起增数必须大于或等于当前值)
                <span id="m_card_number" class="error-block"></span>
            </td>
        </tr>
        <tr>
            <th>密码错误锁定次数：</th>
            <td>
                <input id="card_error_times" name="card_error_times" type="text" value="<?php echo empty($this_setting['card_error_times'])?'':$this_setting['card_error_times']; ?>">
                <input type="hidden" id="last_card_error_times" value="<?php echo empty($this_setting['card_error_times'])?'':$this_setting['card_error_times']; ?>">
                <span id="m_card_error_times" class="error-block"></span>
            </td>
        </tr>
    </table>
</div>
<?php $this->load->view('setting/setting_js'); ?>
<?php $this->load->view('base/footer'); ?>