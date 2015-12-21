<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php $this->load->view('base/header'); ?>
<?php $this->load->view('base/head_base'); ?>

<div id="div_content">
    <div class="public_form mb10 mw980">
        <select name="filter">
            <option value="log_info">日志内容</option>
            <option value="ip_address">IP地址</option>
        </select>
        <input type="text" name="value" value="">&nbsp;&nbsp;
        <select name="user_id">
            <option value="0">管理员</option>
            <?php if(!empty($data_user)){ ?>
            <?php foreach( $data_user as $value ){ ?>
            <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
            <?php } ?>
            <?php } ?>
        </select>
        <input type="button" name="search" value="搜索">
    </div>
    <table class="public_table mw1000">
        <thead>
            <tr>
                <th>用户名</th>
                <th>姓名</th>
                <th>日志内容</th>
                <th>IP地址</th>
                <th>添加时间</th>
            </tr>
        </thead>
        <tbody id="list_content">
        <?php $this->load->view($this_controller.'/'.$this_controller.'_tb'); ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6">
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
$(document).ready(function(){
    //搜索
    $("[name='search']").click(function(){
        var filter = $("[name='filter']").val();
        var value = $("[name='value']").val();
        var user_id = $("[name='user_id']").val();
        var role = $("[name='role']").val();

        pagelist.filter['log_info'] = undefined;
        pagelist.filter['ip_address'] = undefined;
        pagelist.filter[filter] = value;
        pagelist.filter['user_id'] = user_id;
        pagelist.filter['role'] = role;
        pagelist.loadPage();
    });
});
</script>
<?php $this->load->view('base/footer'); ?>