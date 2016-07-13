<table class="table_info">
    <tr>
        <th>名称：</th>
        <td><?php echo empty($data['name_real'])?'':$data['name_real']; ?></td>
    </tr>
    <tr>
        <th>昵称：</th>
        <td><?php echo empty($data['name_nick'])?'':$data['name_nick']; ?></td>
    </tr>
    <tr>
        <th>性别</th>
        <td>
            <?php if( empty($data['sex']) || $data['sex'] == '1' ){ echo '男'; }else{echo '女';} ?>
        </td>
    </tr>
    <tr>
        <th>手机号码：</th>
        <td><?php echo empty($data['phone'])?'':$data['phone']; ?></td>
    </tr>
    <tr>
        <th>邮箱：</th>
        <td><?php echo empty($data['email'])?'':$data['email']; ?></td>
    </tr>
    <tr>
        <th>微信：</th>
        <td><?php echo empty($data['weixin'])?'':$data['weixin']; ?></td>
    </tr>
    <tr>
        <th>QQ：</th>
        <td><?php echo empty($data['qq'])?'':$data['qq']; ?></td>
    </tr>
    <tr>
        <th>生日：</th>
        <td><?php echo empty($data['birthday'])?'':$data['birthday']; ?></td>
    </tr>
    <tr>
        <th>地址：</th>
        <td>
            <table>
                <tr>
                    <th>省</th>
                    <th>市</th>
                    <th>区</th>
                    <th>地址</th>
                    <th>联系人</th>
                    <th>联系号码</th>
                </tr>
                <?php if(!empty($data_address)){foreach($data_address as $k=>$v){ ?>
                <tr>
                    <td><?php echo empty($v['province_name'])?'':$v['province_name']; ?></td>
                    <td><?php echo empty($v['city_name'])?'':$v['city_name']; ?></td>
                    <td><?php echo empty($v['district_name'])?'':$v['district_name']; ?></td>
                    <td><?php echo empty($v['detail'])?'':$v['detail']; ?></td>
                    <td><?php echo empty($v['phone'])?'':$v['phone']; ?></td>
                    <td><?php echo empty($v['person'])?'':$v['person']; ?></td>
                </tr>
                <?php }} ?>
            </table>
        </td>
    </tr>
    <tr>
        <th></th>
        <td>
            <input type="button" class="formbtn" name="submit" value="返回" onclick="back()">
            <input type="hidden" name="id" value="<?php echo empty($data['id'])?'':$data['id']; ?>">
        </td>
    </tr>
</table>
