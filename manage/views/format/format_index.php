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
                <th>ID</th>
                <th>规格名称</th>
                <th>描述</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody id="list_content">
        <?php $this->load->view($this_controller.'/'.$this_controller.'_tb'); ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4">
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
<script type="text/javascript">
//编辑验证函数
function edit_authen(){
    var name = $("#name").authen({reg:'nickname',err_name:'名称',min_length:2,max_length:20,empty:false});
    var back = name;
    return back;
}
function value_add(){
    var cnt = $("#value_btn").attr('cnt');
    $("#value_td").append('<p class="mt10"><input type="text" name="value['+cnt+'][name]" value="">&nbsp;&nbsp;<img class="cp" title="删除" onclick="p_del(this)" src="<?php echo base_url('images/icon_delete.png');?>"></p>');
    cnt++;
    $("#value_btn").attr('cnt',cnt);
}
function p_del(obj){
    $(obj).parent().remove();
}
</script>
<?php $this->load->view('base/footer'); ?>