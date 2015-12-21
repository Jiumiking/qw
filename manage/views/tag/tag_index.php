<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php $this->load->view('base/header'); ?>
<?php $this->load->view('base/head_base'); ?>

<div id="div_content">
    <div class="public_form mb10 mw980">
        <select name="filter">
            <option value="name">标签名称</option>
        </select>
        <input type="text" name="value" value="">&nbsp;&nbsp;
        <select name="type">
            <option value="">标签类型</option>
            <?php if( !empty($date_type) ){ ?>
            <?php foreach($date_type as $value){ ?>
            <option value="<?php echo $value['id'];?>" ><?php echo $value['name'];?></option>
            <?php } ?>
            <?php } ?>
        </select>
        <input type="button" name="search" value="搜索">
        <input class="add" type="button" value=" + 新增" onclick="edit('')">
    </div>
    <table class="public_table mw1000">
        <thead>
            <tr>
                <th>ID</th>
                <th>标签名称</th>
                <th>标签类型</th>
                <th>排序</th>
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
<script type="text/javascript">
//编辑验证函数
function edit_authen(){
    var name = $("#name").authen({reg:'nickname',err_name:'标签名称',min_length:2,max_length:20,empty:false});
    var type = $("#type").authen({err_name:'标签类型',empty:false});
    var back = name && type;
    return back;
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