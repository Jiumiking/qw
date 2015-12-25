<div class="content-main">
    <div class="content-main-title">
        <span class="title">安全中心</span>
        <span class="error-block" id="base_set_msg"></span>
    </div>
    <div class="safe-set">
        <div class="item">
            <div class="label f16">
                <s class="label-img-1"></s>
                <strong>登录密码</strong>
            </div>
            <div class="label-msg">建议您定期更改密码以保护账户安全</div>
            <div class="label-a"><a href="<?php echo site_url('member/safe_password')?>">修改</a></div>
        </div>
        <div class="item">
            <div class="label f16">
                <s <?php if(!empty($this_user['phone'])){ ?>class="label-img-1"<?php }else{ ?>class="label-img-3"<?php } ?>></s>
                <strong>手机验证</strong>
            </div>
            <div class="label-msg">
                <?php if(!empty($this_user['phone'])){ echo substr($this_user['phone'],0,3).'*****'.substr($this_user['phone'],-3); }else{ echo '您还没有绑定手机号，建议立即绑定'; } ?>
            </div>
            <div class="label-a"><a href="">修改</a></div>
        </div>
        <div class="item">
            <div class="label f16">
                <s <?php if(!empty($this_user['email_check'])){ ?>class="label-img-1"<?php }else{ ?>class="label-img-3"<?php } ?>></s>
                <strong>邮箱验证</strong>
            </div>
            <div class="label-msg">
                <?php if(!empty($this_user['email_check']) && !empty($this_user['email'])){ echo substr($this_user['email'],0,1).'*****'.substr($this_user['email'],strpos($this_user['email'],'@')-1); }else{ echo '您还没有绑定手机号，建议立即绑定'; } ?>
            </div>
            <div class="label-a"><a href="<?php echo site_url('member/safe_email')?>">修改</a></div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function user_submit(){
        $('#user_form').ajaxSubmit({
            beforeSubmit: function(){
                var name_nick = true;
                var name_nick2 = true;
                var name_real = true;
                name_nick = $("#name_nick").authen({reg:'nickname',err_name:'昵称',min_length:1,max_length:50,empty:false});
                name_real = $("#name_real").authen({reg:'nickname',err_name:'姓名',min_length:1,max_length:50,empty:false});
                if( name_nick ){
                    name_nick2 = $("#name_nick").authen({
                        type:'functions',
                        functions:function(val){
                            var mark = false;
                            $.ajax({
                                type : "GET",
                                async : false,
                                url : "<?php echo site_url('member/nick_unique');?>",
                                data : { value:val,id:$("#id").val() },
                                success : function(msg){
                                    if(msg == 1){
                                        mark = true;
                                    }
                                }
                            });
                            if(mark){
                                return '该昵称已使用';
                            }
                            return true;
                        },
                        empty:false
                    });
                }

                var back = name_nick && name_nick2 && name_real;
                if(back){
                    $("#submit_btn").attr("disabled","disabled");
                }
                return back;
            },
            success: function (msg) {
                if(msg){
                    var msgobj = eval("("+ msg +")");
                    //alert(msgobj.msg);
                    $("#base_set_msg").html(msgobj.msg);
                    $("#base_set_msg").show();
                    $("#base_set_msg").fadeOut(5000);
                    $("#submit_btn").removeAttr("disabled");
                }
            }
        });

    }
    function hide_slow(el,offset){
        var opacity=el.style.opacity||1;
        setTimeout(function(){
            el.style.opacity=String(parseFloat(opacity)-offset);
            parseFloat(el.style.opacity)>0&&hide(el,offset);
        }, 17);
    }

</script>