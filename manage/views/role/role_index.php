<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php $this->load->view('base/header'); ?>
<?php $this->load->view('base/head_base'); ?>

<div id="div_content">
    <div class="public_form mb10 mw980">
        <input class="add" type="button" value=" + 新增" onclick="edit('')">
    </div>
    <table class="public_table mw1000">
        <thead>
            <tr>
                <th>角色ID</th>
                <th>角色名称</th>
                <th>父角色</th>
                <th>描述</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody id="list_content">
        <?php $this->load->view($this_controller.'/'.$this_controller.'_tb'); ?>
        </tbody>
    </table>
</div>


<?php $this->load->view('base/list_js'); ?>
<script type="text/javascript">
//编辑验证函数
function edit_authen(){
    var name = $("#name").authen({err_name:'角色名称',min_length:2,max_length:20,empty:false});
    var remark = $("#remark").authen({err_name:'描述',min_length:2,max_length:50,empty:false});
    var back = name && remark;
    return back;
}
//权限
function access( id ){
    $.ajax({
        type : "GET",
        async : false,
        url : "<?php echo site_url('role/access');?>",
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
//权限 保存
function access_do(){
    $('#edit_form').ajaxSubmit({
        beforeSubmit: function(){
            var back = $("#role_id").authen({err_name:'参数错误',empty:false});;
            if(back){
                $("#edit_submit_button").attr('disabled','disabled');
            }
            return back;
        },
        success: function (msg) {
            if(msg){
                var msgobj = eval("("+ msg +")");
                alert(msgobj.msg);
                //window.location.reload();
            }
        }
    });
}
//节点伸展
function access_show(obj){
    var aid = $(obj).attr("aid");
    var img_obj = $(obj).find('img');
    var img_src = $(img_obj).attr('src');
    var img_src_right = "<?php echo base_url('images/toggle-right.png');?>";
    var img_src_bottom = "<?php echo base_url('images/toggle-bottom.png');?>";
    if( img_src == img_src_right ){ //展开
        $("div [did='"+aid+"']").show();
        $(img_obj).attr('src',img_src_bottom);
    }else if( img_src == img_src_bottom ){ //收起来
        $("div [did='"+aid+"']").hide();
        $(img_obj).attr('src',img_src_right);
    }
}
//多选框选择
function access_check(obj){
    var id = $(obj).val();
    var check_status = $(obj).prop('checked');

    if(!check_status){ //取消选中
        $(obj).removeProp('checked');
        if( $("div [did='"+id+"']") ){
            $("div [did='"+id+"']").find("[name='nid[]']").each(function(){
                $(this).removeProp('checked');
            });
        }
        
    }else{ //选中
        $(obj).prop('checked','checked');
        if( $("div [did='"+id+"']") ){
            $("div [did='"+id+"']").find("[name='nid[]']").each(function(){
                $(this).prop('checked','checked');
            });
        }
        $(obj).parents("[did]").each(function(){
            var did = $(this).attr('did');
            $("#nid_"+did).prop('checked','checked');
        });
    }
    
}
//功能按钮
function access_btn(type){
    if( type == '1' ){//收起来
        $("#edit_form").find("[did]").each(function(){
            $(this).hide();
        });
        $("#edit_form").find("img").each(function(){
            $(this).attr('src',"<?php echo base_url('images/toggle-right.png');?>");
        });
    }else if( type == '2' ){//全选
        $("[name='nid[]']").each(function(){
            $(this).prop('checked','checked');
        });
    }else if( type == '3' ){//全否
        $("[name='nid[]']").each(function(){
            $(this).removeProp('checked');
        });
    }
}
</script>
<?php $this->load->view('base/footer'); ?>