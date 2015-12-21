<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<script type="text/javascript">
$(document).ready(function(){
    banmaxian();
    $("#base_web").click(function(){
        var url = "<?php echo $this->config->item('base_web');?>";
        if( url != '' ){
            window.location.href= "<?php echo $this->config->item('base_web');?>";
        }
    });
});
/* 斑马线函数*/
function banmaxian(){
    $(".public_table:first tbody tr:odd").css("backgroundColor","#f1f3f4");
    //$(".public_table tbody tr:last").css("backgroundColor","transparent");
    $(".public_table tr:gt(0)").unbind('mouseenter mouseleave');
    $("#list_content tr").unbind('mouseover mouseout');
}
//修改密码
function change_user_pwd(id){
    if( id == '' ){
        return false;
    }
    $("#user_id_checked").val(id);
    $.ajax({
        type : "GET",
        async : false,
        url : "<?php echo site_url('user/change_pwd');?>",
        data : { id:id },
        success : function(msg){
            if(msg){
                var msgobj = eval("("+ msg +")");
                if(msgobj.sta == '1'){
                    $('#div_show').html(msgobj.dat);
                    $('#div_show').show();
                    $('#div_content').hide();
                }else{
                    alert(msgobj.msg);
                }
            }
        }
    });
}
//修改密码
function change_user_pwd_do(){
    var id = $('#user_id_checked').val();
    var pwd_o = $("#pwd_o").val();
    var pwd_n = $("#pwd_n").val();
    var pwd_n2 = $("#pwd_n2").val();

    var pwd_o_c = true;
    if(pwd_o != undefined){
        pwd_o_c = $("#pwd_o").authen({ //密码验证
            type:'functions',
            functions:function(val){
                var mark = false;
                $.ajax({
                    type : "GET",
                    async : false,
                    url : "<?php echo site_url('user/is_pwd');?>",
                    data : { id:id, pwd:pwd_o },
                    success : function(msg){
                        if(msg == 1){
                            mark = true;
                        }
                    }
                });
                if(!mark){
                    return '密码错误';
                }
                return true;
            },
            err_name:'原密码',
            empty:false
        });
    }
    
    var pwd_n_c = $("#pwd_n").authen({reg:'password',err_name:'密码',min_length:6,max_length:20,empty:false});
    var pwd_n2_c = $("#pwd_n2").authen({reg:'password2',pwd_id:'pwd_n',empty:false});
    if( pwd_o_c && pwd_n_c && pwd_n2_c){
        $.ajax({
            type : "GET",
            async : false,
            url : "<?php echo site_url('user/update_pwd');?>",
            data : { id:id,pwd:pwd_n },
            success : function(msg){
                if(msg == 1){
                    alert('修改成功');
                    back();
                }else{
                    alert('修改失败');
                }
            }
        });
    }
}
//返回
function back(){
    $('#div_show').hide();
    $('#div_content').show();
}
</script>

<div class="header">
    <div class="logo cf">
        <h1 class="fl"><a href="" onclick=""><img class="logo" src="<?php echo empty($this_setting['logo_name'])?'':$this->config->item('front_url').'/uploads/logo/'.$this_setting['logo_name'];?>" alt="" 
        /></a></h1>
        <div class="toolbar">
            <div class="right"></div>
            <div class="center icons">
                <span>
                    <img src="<?php echo base_url('images/header/admin.png');?>" />
                    <?php if( !empty($data_role) && !empty($this_user['role']) ){ ?>
                    <?php foreach($data_role as $value){ ?>
                    <?php if( $value['id'] == $this_user['role'] ){echo $value['name'];}?>
                    <?php } ?>
                    <?php } ?>
                    :
                    <?php echo empty($this_user['name_real'])?'':$this_user['name_real'];?>&nbsp;
                    <a href="javascript:void(0);" title="修改密码" onclick="change_user_pwd('<?php echo empty($this_user['id'])?'':$this_user['id'];?>','top')">&nbsp;<img src="<?php echo 
                    base_url('images/header/initialize_icon.png');?>" /> 修改密码</a>
                    <a href="<?php echo site_url().'/login/logout';?>" >&nbsp;<img src="<?php echo base_url('images/header/logout.png');?>" /> 退出</a>
                    <input type="hidden" id="user_id_checked" value="">
                </span>
            </div>
            <div class="left"></div>
        </div>
    </div>
    <div class="menu">
        <ul class="menu_list cf">
            <li><a href="<?php echo site_url('home/index');?>" name="a_link" <?php if(empty($bread['m_s_1'])){ ?>class="collapse-li-a select" <?php }else{ ?> class="collapse-li-a" <?php } ?> ><img 
            src="<?php echo 
            base_url('images/header/home_icon.png');?>" style="padding-top:11px;" /></a></li>
            <?php if($menus_1){ ?>
            <?php foreach($menus_1 as $key=>$value){ ?>
            <li><a href="<?php echo site_url($value['controller'].'/'.$value['method'].'?t='.time());?>" name="a_link" <?php if( !empty($bread['m_s_1']) && $bread['m_s_1'] == $value['menu_id'] ){ 
            ?>class="collapse-li-a select" 
            <?php 
            }else{ ?> 
            class="collapse-li-a" <?php } ?> ><?php echo $value['menu_name'];?></a></li>
            <?php } ?>
            <?php } ?>
        </ul>
    </div>
</div>