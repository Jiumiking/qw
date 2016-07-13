<form name="edit_form" id="edit_form" action="<?php echo site_url($this_controller.'/my_edit_do');?>" method="post">
    <table class="table_info">
        <tr>
            <th>类型名称：</th>
            <td><input name="name" id="name" value="<?php echo empty($data['name'])?'':$data['name']; ?>"><span id="m_name" class="error-block"></span></td>
        </tr>
        <tr>
            <th>规格1：</th>
            <td>
                <select name="format1" id="format1">
                    <option value="0">请选择</option>
                    <?php if(!empty($data_format)){ ?>
                    <?php foreach($data_format as $key=>$value){ ?>
                    <option value="<?php echo $value['id'];?>" <?php if(!empty($data['format1']) && $data['format1']==$value['id'] ){ ?> selected="selected" <?php } ?>><?php echo $value['name'];?></option>
                    <?php } ?>
                    <?php } ?>
                </select>
                <span id="m_format1" class="error-block"></span>
            </td>
        </tr>
        <tr>
            <th>规格2：</th>
            <td>
                <select name="format2" id="format2">
                    <option value="0">请选择</option>
                    <?php if(!empty($data_format)){ ?>
                    <?php foreach($data_format as $key=>$value){ ?>
                    <option value="<?php echo $value['id'];?>" <?php if(!empty($data['format2']) && $data['format2']==$value['id'] ){ ?> selected="selected" <?php } ?>><?php echo $value['name'];?></option>
                    <?php } ?>
                    <?php } ?>
                </select>
                <span id="m_format2" class="error-block"></span>
            </td>
        </tr>
        <tr>
            <th>规格3：</th>
            <td>
                <select name="format3" id="format3">
                    <option value="0">请选择</option>
                    <?php if(!empty($data_format)){ ?>
                    <?php foreach($data_format as $key=>$value){ ?>
                    <option value="<?php echo $value['id'];?>" <?php if(!empty($data['format3']) && $data['format3']==$value['id'] ){ ?> selected="selected" <?php } ?>><?php echo $value['name'];?></option>
                    <?php } ?>
                    <?php } ?>
                </select>
                <span id="m_format3" class="error-block"></span>
            </td>
        </tr>
        <tr>
            <th>规格4：</th>
            <td>
                <select name="format4" id="format4">
                    <option value="0">请选择</option>
                    <?php if(!empty($data_format)){ ?>
                    <?php foreach($data_format as $key=>$value){ ?>
                    <option value="<?php echo $value['id'];?>" <?php if(!empty($data['format4']) && $data['format4']==$value['id'] ){ ?> selected="selected" <?php } ?>><?php echo $value['name'];?></option>
                    <?php } ?>
                    <?php } ?>
                </select>
                <span id="m_format4" class="error-block"></span>
            </td>
        </tr>
        <tr>
            <th>规格5：</th>
            <td>
                <select name="format5" id="format5">
                    <option value="0">请选择</option>
                    <?php if(!empty($data_format)){ ?>
                    <?php foreach($data_format as $key=>$value){ ?>
                    <option value="<?php echo $value['id'];?>" <?php if(!empty($data['format5']) && $data['format5']==$value['id'] ){ ?> selected="selected" <?php } ?>><?php echo $value['name'];?></option>
                    <?php } ?>
                    <?php } ?>
                </select>
                <span id="m_format5" class="error-block"></span>
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