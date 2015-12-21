<script type="text/javascript">
$(document).ready(function(){
    $("#setting_tb input").each(function(){
        var type = $(this).attr('type');
        if( type == 'text' ){
            $(this).change(function(){
                var name = $(this).attr('name');
                var val = $(this).val();
                var last_val = $("#last_"+name).val();
                var val_authen = false;
                switch(name){
                    case 'station_name':
                        val_authen = $("#station_name").authen({reg:'nickname',err_name:'站点名称',min_length:2,max_length:20,empty:false});
                        break;
                    case 'page_number':
                        val_authen = $("#page_number").authen({reg:'intege1',err_name:'分页数量',min_length:1,max_length:5,empty:false});
                        break;
                    case 'card_prefix':
                        val_authen = $("#card_prefix").authen({reg:'nickname',err_name:'会员卡前缀',min_length:2,max_length:20,empty:false});
                        break;
                    case 'card_addnum':
                        val_authen = $("#card_addnum").authen({reg:'intege1',err_name:'会员卡递增值',min_length:1,max_length:5,empty:false});
                        break;
                    case 'card_number':
                        val_authen = $("#card_number").authen({reg:'intege1',err_name:'会员卡起增数',min:last_val,max_length:10,empty:false});
                        break;
                    case 'card_error_times':
                        val_authen = $("#card_error_times").authen({reg:'intege1',err_name:'卡密码错误锁定次数',min:1,max_length:10,empty:false});
                        break;
                    case 'user_error_times':
                        val_authen = $("#user_error_times").authen({reg:'intege1',err_name:'登录密码错误锁定次数',min:1,max_length:10,empty:false});
                        break;
                }
                if( val_authen ){
                    setting_update(name,val);
                    $("#last_"+name).val(val);
                }else{
                    $(this).val(last_val);
                }
            });
        }else if( type == 'radio' ){
            $(this).click(function(){
                var name = $(this).attr('name');
                var val = $(this).val();
                var last_val = $("#last_"+name).val();
                var val_authen = false;
                val_authen = true;
                if( val_authen ){
                    setting_update(name,val);
                    $("#last_"+name).val(val);
                }else{
                    $("#"+name+"_"+last_val).prop('checked','checked');
                }
            });
        }
    });
});
//ajax提交修改
function setting_update(s_key,s_value){
    if( s_key == '' || s_value == '' ){
        return false;
    }
    var mark = false;
    $.ajax({
        type : "GET",
        async : false,
        url : "<?php echo site_url('setting/setting_update');?>",
        data : { s_key:s_key,s_value:s_value },
        success : function(msg){
            if(msg){
                var msgobj = eval("("+ msg +")");
                if(msgobj.status == '1'){
                    mark = true;
                }
            }
        }
    });
    return mark;
}
//logo修改
function logo_change(){
    var str = $("#logo").val();
    if(str == '') return;
    var arr = new Array();
    arr = str.split(".");
    var file_type = arr[arr.length-1];
    if(file_type == 'jpg' || file_type == 'jepg' || file_type == 'png' || file_type == 'gif'){
        ajaxFileUpload('logo');
    }
}
//ajax提交logo修改
function ajaxFileUpload(pic){
    $.ajaxFileUpload
    (
        {
            url:"<?php echo site_url('setting/logo_update');?>",
            secureuri:true,
            fileElementId:pic,
            dataType: 'json',
            data:{},
            success: function (data, status){
                if(typeof(data.status) != 'undefined'){;
                    if(data.status == '1'){
                        if(typeof(data.img) != 'undefined' && data.img != ''){
                            $("#logo_show").attr('src',"<?php echo base_url('uploads/logo').'/"+data.img+"';?>");
                        }
                    }else{
                        alert(data.msg);
                    }
                    return false;
                }
            },
            error: function (data, status, e)
            {
                alert(e);
                return false;
            }
        }
    )
    return false;
}
</script>