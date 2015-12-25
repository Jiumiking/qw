<div id="gb-content-left" >
    <ul class="">
        <li <?php if( !empty($member_menu) && $member_menu=='order' ){ ?>class="selected"<?php } ?> ><a href="<?php echo site_url('member/order');?>" >我的订单</a></li>
        <li <?php if( !empty($member_menu) && $member_menu=='setting' ){ ?>class="selected"<?php } ?> ><a href="<?php echo site_url('member/setting');?>"  >个人设置</a></li>
        <li <?php if( !empty($member_menu) && substr($member_menu,0,4)=='safe' ){ ?>class="selected"<?php } ?> ><a href="<?php echo site_url('member/safe');?>"  >账户安全</a></li>
        <li <?php if( !empty($member_menu) && $member_menu=='address' ){ ?>class="selected"<?php } ?> ><a href="<?php echo site_url('member/address');?>" >收货地址</a></li>
    </ul>
</div>