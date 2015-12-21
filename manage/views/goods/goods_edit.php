<form name="edit_form" id="edit_form" action="<?php echo site_url($this_controller.'/my_edit_do');?>" method="post">
    <table class="table_info">
        <tr>
            <th></th>
            <td>
                <input name="type" id="status_1" type="radio" class="cp" value="1" <?php if( empty($data['status']) || $data['status'] == '1' ){ ?> checked="checked" <?php } ?>"><label class="cp" for="status_1">上架</label>&nbsp;&nbsp;&nbsp;&nbsp;
                <input name="type" id="status_2" type="radio" class="cp" value="2" <?php if( !empty($data['status']) && $data['status'] == '2' ){ ?> checked="checked" <?php } ?>"><label class="cp" for="status_2">下架</label>
            </td>
        </tr>
        <tr>
            <th>商品名称：</th>
            <td><input name="name" id="name" value="<?php echo empty($data['name'])?'':$data['name']; ?>"><span id="m_name" class="error-block"></span></td>
        </tr>
        <tr>
            <th>尺寸：</th>
            <td id="size_td">
                <input type="button" value="新增" onclick="size_add()">
            </td>
        </tr>
        <tr>
            <th>颜色：</th>
            <td id="colour_td"><input type="button" value="新增" onclick="colour_add()"></td>
        </tr>
        <tr>
            <th>详情：</th>
            <td>
                <textarea type="text" name="detail" id="detail" cols="80" rows="15" onpropertychange="if(value.length>2000) value=value.substr(0,2000)"><?php echo empty($data_detail['detail'])?'':$data_detail['detail']; ?></textarea>
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