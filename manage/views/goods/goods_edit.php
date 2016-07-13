<form name="edit_form" id="edit_form" action="<?php echo site_url($this_controller.'/my_edit_do');?>" method="post">
    <table class="table_info">
        <?php if(empty($data['id'])){ ?>
        <tr>
            <th></th>
            <td>
                <input name="status" id="status_1" type="radio" class="cp" value="1" <?php if( empty($data['status']) || $data['status'] == '1' ){ ?> checked="checked" <?php } ?>"><label class="cp" for="status_1">上架</label>&nbsp;&nbsp;&nbsp;&nbsp;
                <input name="status" id="status_2" type="radio" class="cp" value="2" <?php if( !empty($data['status']) && $data['status'] == '2' ){ ?> checked="checked" <?php } ?>"><label class="cp" for="status_2">下架</label>
            </td>
        </tr>
        <?php } ?>
        <tr>
            <th>商品类型：</th>
            <td>
                <select name="type_id" id="type_id" onchange="type_change()">
                    <option value="">请选择</option>
                    <?php if(!empty($data_goods_type)){ ?>
                    <?php foreach($data_goods_type as $key=>$value){ ?>
                    <option value="<?php echo $value['id'];?>" <?php if(!empty($data['type_id']) && $data['type_id']==$value['id'] ){ ?> selected="selected" <?php } ?>><?php echo $value['name'];?></option>
                    <?php } ?>
                    <?php } ?>
                </select>
                <span id="m_type" class="error-block"></span>
            </td>
        </tr>
        <tr>
            <th>商品名称：</th>
            <td><input name="name" id="name" value="<?php echo empty($data['name'])?'':$data['name']; ?>"><span id="m_name" class="error-block"></span></td>
        </tr>
        <tr>
            <th>成本价格：</th>
            <td><input name="money_in" id="money_in" value="<?php echo empty($data['money_in'])?'':$data['money_in']; ?>"><span id="m_money_in" class="error-block"></span></td>
        </tr>
        <tr>
            <th>出售价格：</th>
            <td><input name="money_out" id="money_out" value="<?php echo empty($data['money_out'])?'':$data['money_out']; ?>"><span id="m_money_out" class="error-block"></span></td>
        </tr>
        <tr>
            <th>商品规格：</th>
            <td>
                <div id="format_div"></div>
                <div id="format_value_div"></div>
            </td>
        </tr>
        <tr>
            <th>详情：</th>
            <td>
                <script id="detail" name="detail" type="text/plain" style="width:1024px;height:500px;"><?php echo empty($data_detail['detail'])?'':$data_detail['detail']; ?></script>
                <span id="m_detail" class="error-block"></span>
            </td>
        </tr>

        <tr>
            <th></th>
            <td>
                <input type="button" class="formbtn" name="submit" id="edit_submit_button" value="提交" onclick="edit_do()">
                <input type="button" class="formbtn" name="submit" value="返回" onclick="back()">
                <input type="hidden" name="id" value="<?php echo empty($data['id'])?'':$data['id']; ?>">
            </td>
        </tr>
    </table>
</form>