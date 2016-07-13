<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php $this->load->view('base/header'); ?>
<?php $this->load->view('base/head_base'); ?>

<div id="div_content">
    <div class="public_form mb10 mw980">
        <select name="filter">
            <option value="order_no">订单号</option>
            <option value="phone">手机号码</option>
            <option value="email">邮箱</option>
            <option value="name_real">姓名</option>
            <option value="name_nick">昵称</option>
            <option value="accept_name">联系人</option>
            <option value="accept_phone">联系电话</option>
        </select>
        <input type="text" name="value" value="">&nbsp;&nbsp;
        <select name="shipping_id">
            <option value="">配送方式</option>
            <?php if(!empty($data_shipping)){foreach($data_shipping as $k=>$v){ ?>
            <option value="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></option>
            <?php }} ?>
        </select>
        <select name="payment_id">
            <option value="">支付方式</option>
            <?php if(!empty($data_payment)){foreach($data_payment as $k=>$v){ ?>
            <option value="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></option>
            <?php }} ?>
        </select>
        <input type="button" name="search" value="搜索">
    </div>
    <table class="public_table mw1000">
        <thead>
            <tr>
                <th>订单编号</th>
                <th>会员</th>
                <th>总价</th>
                <th>支付方式</th>
                <th>配送方式</th>
                <th>收货人</th>
                <th>城市</th>
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
                <td colspan="10">
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
    var name_ch = $("#name_ch").authen({reg:'nickname',err_name:'中文名称',min_length:2,max_length:50,empty:false});
    var name_en = $("#name_en").authen({err_name:'英文名称',min_length:2,max_length:50,empty:true});
    var name_other = $("#name_other").authen({err_name:'其他名称',min_length:2,max_length:200,empty:true});
    var place = $("#place").authen({err_name:'地区',empty:false});
    var language = $("#language").authen({err_name:'地区',empty:false});
    var back = name_ch && name_en && name_other && place && language;
    return back;
}
$(document).ready(function(){
    //搜索
    $("[name='search']").click(function(){
        var filter = $("[name='filter']").val();
        var value = $("[name='value']").val();
        var shipping_id = $("[name='shipping_id']").val();
        var payment_id = $("[name='payment_id']").val();

        pagelist.filter['page'] = 1;
        pagelist.filter[filter] = value;
        pagelist.filter['shipping_id'] = shipping_id;
        pagelist.filter['payment_id'] = payment_id;
        pagelist.loadPage();
    });
});
</script>
<?php $this->load->view('base/footer'); ?>