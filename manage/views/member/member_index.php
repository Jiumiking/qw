<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php $this->load->view('base/header'); ?>
<?php $this->load->view('base/head_base'); ?>

<div id="div_content">
    <div class="public_form mb10 mw980">
        <select name="filter">
            <option value="phone">手机号码</option>
            <option value="email">邮箱</option>
            <option value="weixin">微信</option>
            <option value="qq">QQ</option>
            <option value="name_real">姓名</option>
            <option value="name_nick">昵称</option>
        </select>
        <input type="text" name="value" value="">&nbsp;&nbsp;
        <input type="button" name="search" value="搜索">
        <input class="add" type="button" value=" + 新增" onclick="edit('')">
    </div>
    <table class="public_table mw1000">
        <thead>
            <tr>
                <th>姓名</th>
                <th>昵称</th>
                <th>手机号码</th>
                <th>邮箱</th>
                <th>性别</th>
                <th>积分</th>
                <th>创建时间</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody id="list_content">
        <?php $this->load->view($this_controller.'/'.$this_controller.'_tb'); ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="8">
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
    var name_real = $("#name_real").authen({reg:'nickname',err_name:'名称',min_length:1,max_length:50,empty:false});
    var name_nick = $("#name_nick").authen({reg:'nickname',err_name:'昵称',min_length:1,max_length:50,empty:false});
    var phone = $("#phone").authen({reg:'mobile',err_name:'手机号码',empty:false});
    var email = $("#email").authen({reg:'email',err_name:'邮箱',empty:true});
    var back = name_real && name_nick && phone && email;
    return back;
}
$(document).ready(function(){
    //搜索
    $("[name='search']").click(function(){
        var filter = $("[name='filter']").val();
        var value = $("[name='value']").val();
        pagelist.filter['page'] = 1;
        pagelist.filter[filter] = value;
        pagelist.loadPage();
    });
});
</script>
<?php $this->load->view('base/footer'); ?>