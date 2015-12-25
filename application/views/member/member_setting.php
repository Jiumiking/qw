<div class="content-main">
    <div class="content-main-title">
        <span class="title">基本设置</span>
        <span class="error-block" id="base_set_msg"></span>
    </div>
    <div class="user-set">
        <form id="user_form" class="user-form" method="post" action="<?php echo site_url("member/setting_do"); ?>">
            <div class="item">
                <span class="label"><em>*</em>昵称：</span>
                <div class="fl">
                    <input type="text" class="text" maxlength="20" id="name_nick" name="member_data[name_nick]" value="<?php echo empty($this_user['name_nick'])?'':$this_user['name_nick']; ?>">
                    <span id="m_name_nick" class="error-block"></span>
                </div>
            </div>
            <div class="item">
                <span class="label"><em>*</em>真实姓名：</span>
                <div class="fl">
                    <input type="text" class="text" maxlength="20" id="name_real" name="member_data[name_real]" value="<?php echo empty($this_user['name_real'])?'':$this_user['name_real']; ?>">
                    <span id="m_name_real" class="error-block"></span>
                </div>
            </div>
            <div class="item">
                <span class="label"><em>*</em>性别：</span>
                <div class="fl">
                    <input type="radio" name="member_data[sex]" id="sex1" class="mr5 cp" value="1" <?php if(!empty($this_user['sex']) && $this_user['sex']=='1'){ ?>checked="checked"<?php } ?> ><label for="sex1" class="mr20 cp">男</label>
                    <input type="radio" name="member_data[sex]" id="sex2" class="mr5 cp" value="2" <?php if(!empty($this_user['sex']) && $this_user['sex']=='2'){ ?>checked="checked"<?php } ?>><label for="sex2" class="mr20 cp">女</label>
                    <input type="radio" name="member_data[sex]" id="sex0" class="mr5 cp" value="0" <?php if(empty($this_user['sex'])){ ?>checked="checked"<?php } ?>><label for="sex0" class="mr20 cp">保密</label>
                </div>
            </div>
            <div class="item">
                <span class="label">生日：</span>
                <div class="fl">
                    <select name="member_data[birthday][year]" class="sel" id="birthday_year">
                        <option value="0">请选择</option>
                        <?php
                        for( $i=2015;$i>=1930;$i-- ){
                            echo "<option value='".$i."' ";
                            if(!empty($this_user['birthday']) && date('Y',strtotime($this_user['birthday']))==$i){
                                echo 'selected="selected"';
                            }
                            echo ">".$i."</option>";
                        }
                        ?>
                    </select>
                    <label class="ml5 mr5">年</label>
                    <select name="member_data[birthday][month]" class="sel" id="birthday_month">
                        <option value="0">请选择</option>
                        <?php
                        for( $i=1;$i<=12;$i++ ){
                            echo "<option value='".$i."' ";
                            if(!empty($this_user['birthday']) && date('m',strtotime($this_user['birthday']))==$i){
                                echo 'selected="selected"';
                            }
                            echo ">".$i."</option>";
                        }
                        ?>
                    </select>
                    <label class="ml5 mr5">月</label>
                    <select name="member_data[birthday][day]" class="sel" id="birthday_day">
                        <option value="0">请选择</option>
                        <?php
                        for( $i=1;$i<=31;$i++ ){
                            echo "<option value='".$i."' ";
                            if(!empty($this_user['birthday']) && date('d',strtotime($this_user['birthday']))==$i){
                                echo 'selected="selected"';
                            }
                            echo ">".$i."</option>";
                        }
                        ?>
                    </select>
                    <label class="ml5 mr5">日</label>
                    <span class="remind_light"></span>
                </div>
            </div>

            <div class="item">
                <span class="label">&nbsp;</span>
                <div class="fl">
                    <input type="hidden" name="member_data[id]" id="id" value="<?php echo empty($this_user['id'])?'0':$this_user['id']; ?>">
                    <input id="submit_btn" class="ipt-btn w50" type="button" value="提交" onclick="user_submit()">
                </div>
            </div>
        </form>
    </div>
</div>
<div class="content-main" style="height: 200px">
    <div class="content-main-title">头像设置</div>
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