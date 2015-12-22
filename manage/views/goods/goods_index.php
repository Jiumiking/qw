<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php $this->load->view('base/header'); ?>
<?php $this->load->view('base/head_base'); ?>

<div id="div_content">
    <div class="public_form mb10 mw980">
        <select name="filter">
            <option value="card_no">卡号</option>
        </select>
        <input type="text" name="value" value="">&nbsp;&nbsp;
        <select name="status">
            <option value="">状态</option>
            <option value="1">激活</option>
            <option value="2">锁定</option>
            <option value="3">注销</option>
        </select>
        <input type="button" name="search" value="搜索">
        <input class="add" type="button" value=" + 新增" onclick="edit('')">
    </div>
    <table class="public_table mw1000">
        <thead>
            <tr>
                <th>商品编号</th>
                <th>商品名称</th>
                <th>状态</th>
                <th>创建时间</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody id="list_content">
        <?php $this->load->view($this_controller.'/'.$this_controller.'_tb'); ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5">
                    当前<input type="text" onkeypress="pagelist.changePage(event,this)" id="pg_page" maxlength="10" size="1" value="1" />页,共<span id="pg_page_count"><?php echo $pages['page_count']?></span>页，<span 
                    id="pg_count"><?php echo $pages['count']?></span>条记录
                    <a href="javascript:pagelist.lastPage();">上一页</a>
                    <a href="javascript:pagelist.nextPage();">下一页</a>
                </td>
            </tr>
        </tfoot>
    </table>
</div>

<?php $this->load->view('base/list_js'); ?>
<script type="text/javascript" src="<?php echo base_url('js/ueditor.config.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/ueditor.all.min.js');?>"> </script>
<script type="text/javascript">
//编辑验证函数
function edit_authen(){
    var type = $("#type").authen({err_name:'商品类型',empty:false});
    var name = $("#name").authen({err_name:'商品名称',min_length:2,max_length:50,empty:false});
    var money = $("#money").authen({err_name:'商品价格',empty:false});
    var back = type && name;
    return back;
}
//新增、编辑
function edit( id ){
    $.ajax({
        type : "GET",
        async : false,
        url : "<?php echo site_url($this_controller.'/my_edit');?>",
        data : { id:id },
        success : function(msg){
            if(msg){
                var msgobj = eval("("+ msg +")");
                if(msgobj.sta == '1'){
                    $('#div_show').html(msgobj.dat);
                    $('#div_show').show();
                    $('#div_content').hide();
                    var ue = UE.getEditor('detail');
                }else{
                    alert(msgobj.msg);
                }
            }
        }
    });
}
function size_add(){
    $("#size_td").append('<p class="mt10"><input type="text" name="size[]" value="">&nbsp;&nbsp;<img class="cp" title="删除" onclick="p_del(this)" src="<?php echo base_url('images/icon_delete.png');?>"></p>');
}
var ct = 0;
function colour_add(){
    $("#colour_td").append('<p class="mt10">颜色：<input type="text" name="colour['+ct+'][name]" value="">&nbsp;&nbsp;起伏价格：<input type="text" name="colour['+ct+'][money]" value="">&nbsp;&nbsp;<img class="cp" title="删除" onclick="p_del(this)" src="<?php echo base_url('images/icon_delete.png');?>"></p>');
    ct++;
}
function p_del(obj){
    $(obj).parent().remove();
}
$(document).ready(function(){
    //搜索
    $("[name='search']").click(function(){
        var filter = $("[name='filter']").val();
        var value = $("[name='value']").val();
        var type = $("[name='type']").val();

        pagelist.filter['name'] = undefined;
        pagelist.filter[filter] = value;
        pagelist.filter['type'] = type;
        pagelist.loadPage();
    });
});
</script>
<?php $this->load->view('base/footer'); ?>