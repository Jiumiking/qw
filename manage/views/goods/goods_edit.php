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
                <select name="type" id="type">
                    <option value="0">请选择</option>
                    <?php if(!empty($data_goods_type)){ ?>
                    <?php foreach($data_goods_type as $key=>$value){ ?>
                    <option value="<?php echo $value['id'];?>" <?php if(!empty($data['type']) && $data['type']==$value['id'] ){ ?> selected="selected" <?php } ?>><?php echo $value['name'];?></option>
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
            <th>商品价格：</th>
            <td><input name="money" id="money" value="<?php echo empty($data['money'])?'':$data['money']; ?>"><span id="m_money" class="error-block"></span></td>
        </tr>
        <tr>
            <th>尺寸：</th>
            <td id="size_td">
                <input type="button" value="新增" id="size_btn" cnt="<?php echo empty($data_size)?0:count($data_size); ?>" onclick="size_add()">
                <?php if(!empty($data_size)){ ?>
                <?php foreach($data_size as $key=>$value){ ?>
                <p class="mt10">
                    <input type="hidden" name="size[<?php echo $key; ?>][id]" value="<?php echo $value['id']; ?>">
                    <input type="text" name="size[<?php echo $key; ?>][name]" value="<?php echo $value['name']; ?>">&nbsp;&nbsp;
                    <img class="cp" title="删除" onclick="p_del(this)" src="<?php echo base_url('images/icon_delete.png');?>">
                </p>
                <?php } ?>
                <?php } ?>
            </td>
        </tr>
        <tr>
            <th>颜色：</th>
            <td id="colour_td"><input type="button" value="新增" id="colour_btn" cnt="<?php echo empty($data_colour)?0:count($data_colour); ?>" onclick="colour_add()">
                <?php if(!empty($data_colour)){ ?>
                <?php foreach($data_colour as $key=>$value){ ?>
                <p class="mt10">
                    <input type="hidden" name="colour[<?php echo $key; ?>][id]" value="<?php echo $value['id']; ?>">
                    颜色：<input type="text" name="colour[<?php echo $key; ?>][name]" value="<?php echo $value['name']; ?>">&nbsp;&nbsp;
                    起伏价格：<input type="text" name="colour[<?php echo $key; ?>][money]" value="<?php echo $value['money']; ?>">&nbsp;&nbsp;
                    <img class="cp" title="删除" onclick="p_del(this)" src="<?php echo base_url('images/icon_delete.png');?>">
                </p>
                <?php } ?>
                <?php } ?>
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
<script type="text/javascript">
    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    //var ue = UE.getEditor('detail');
</script>