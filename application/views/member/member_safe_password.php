<div class="content-main">
    <div class="content-main-title">
        <span class="title">修改登录密码</span>
        <span class="error-block" id="base_set_msg"></span>
    </div>

    <form id="sign_form" class="sign-form" action="<?php echo site_url('member/safe_password_do')?>" method="post">
        <div>
            <input id="password" name="password" type="password" autocomplete="off" maxlength="50" placeholder="密码"/>
            <p id="m_password" class="error-block"></p>
        </div>
        <div>
            <input id="password_new" name="password_new" type="password" autocomplete="off" maxlength="50" placeholder="新密码">
            <p id="m_password_new" class="error-block"></p>
        </div>
        <div>
            <input id="password_new2" name="password_new2" type="password" autocomplete="off" maxlength="50" placeholder="再次输入新密码"/>
            <p id="m_password_new2" class="error-block"></p>
        </div>
        <div>
            <input class="ipt-btn" id="submit_btn" type="button" value="提交" onclick="sign_submit();" />
            <p id="message" class="error-block"></p>
        </div>
    </form>
</div>
<script type="text/javascript">
    function sign_submit(){
        $('#sign_form').ajaxSubmit({
            beforeSubmit: function(){
                var password = $("#password").authen({err_name:'旧密码',min_length:2,max_length:50,empty:false});
                var password2 = true;
                if( password ){
                    password2 = $("#password").authen({
                        type:'functions',
                        functions:function(val){
                            var mark = false;
                            $.ajax({
                                type : "GET",
                                async : false,
                                url : "<?php echo site_url('member/safe_password_check');?>",
                                data : { value:val },
                                success : function(msg){
                                    if(msg == 1){
                                        mark = true;
                                    }
                                }
                            });
                            if(mark){
                                return '密码错误';
                            }
                            return true;
                        },
                        empty:false
                    });
                }
                var password_new = $("#password_new").authen({reg:'password',err_name:'新密码',min_length:6,max_length:20,empty:false});
                var password_new2 = $("#password_new2").authen({reg:'password2',err_name:'新密码',pwd_id:'password_new',empty:false});

                var back = password && password2 && password_new && password_new2;
                if(back){
                    $("#submit_btn").attr("disabled","disabled");
                }
                return back;
            },
            success: function (msg) {
                if(msg){
                    var msgobj = eval("("+ msg +")");
                    //alert(msgobj.msg);
                    $("#message").html(msgobj.msg);
                    $("#message").show();
                    $("#message").fadeOut(3000,function(){
                        location.href = "<?php echo site_url('member/safe');?>";
                    });
                    $("#submit_btn").removeAttr("disabled");
                }
            }
        });
    }
    $("#password").keyup(function(event){
        if( event.keyCode == 13 ){
            sign_submit();
        }
    });
    $("#password_new").keyup(function(event){
        if( event.keyCode == 13 ){
            sign_submit();
        }
    });
    $("#password_new2").keyup(function(event){
        if( event.keyCode == 13 ){
            sign_submit();
        }
    });
</script>