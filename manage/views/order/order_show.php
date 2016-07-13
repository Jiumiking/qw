<table class="table_info">
    <tr>
        <th>订单号：</th>
        <td><?php echo empty($data['order_no'])?'':$data['order_no']; ?></td>
    </tr>
    <tr>
        <th>用户姓名：</th>
        <td><?php echo empty($data['name_real'])?'':$data['name_real']; ?></td>
    </tr>
    <tr>
        <th>用户昵称：</th>
        <td><?php echo empty($data['name_nick'])?'':$data['name_nick']; ?></td>
    </tr>
    <tr>
        <th>商品总价：</th>
        <td><?php echo empty($data['money_goods'])?'':$data['money_goods']; ?></td>
    </tr>
    <tr>
        <th>优惠价格：</th>
        <td>-<?php echo empty($data['money_preferential'])?'':$data['money_preferential']; ?></td>
    </tr>
    <tr>
        <th>配送费用：</th>
        <td><?php echo empty($data['money_shipping'])?'':$data['money_shipping']; ?></td>
    </tr>
    <tr>
        <th>实际支付：</th>
        <td><?php echo empty($data['money_end'])?'':$data['money_end']; ?></td>
    </tr>
    <tr>
        <th>支付方式：</th>
        <td><?php echo empty($data['payment_name'])?'':$data['payment_name']; ?></td>
    </tr>
    <tr>
        <th>配送方式：</th>
        <td><?php echo empty($data['shipping_name'])?'':$data['shipping_name']; ?></td>
    </tr>
    <tr>
        <th>省：</th>
        <td><?php echo empty($data['accept_province'])?'':$data['accept_province']; ?></td>
    </tr>
    <tr>
        <th>市：</th>
        <td><?php echo empty($data['accept_city'])?'':$data['accept_city']; ?></td>
    </tr>
    <tr>
        <th>区：</th>
        <td><?php echo empty($data['accept_district'])?'':$data['accept_district']; ?></td>
    </tr>
    <tr>
        <th>地址：</th>
        <td><?php echo empty($data['accept_detail'])?'':$data['accept_detail']; ?></td>
    </tr>
    <tr>
        <th>联系人：</th>
        <td><?php echo empty($data['accept_name'])?'':$data['accept_name']; ?></td>
    </tr>
    <tr>
        <th>联系号码：</th>
        <td><?php echo empty($data['accept_phone'])?'':$data['accept_phone']; ?></td>
    </tr>
    <tr>
        <th>备注：</th>
        <td><?php echo empty($data['remark'])?'':$data['remark']; ?></td>
    </tr>
    <tr>
        <th>创建时间：</th>
        <td><?php echo empty($data['date_add'])?'':$data['date_add']; ?></td>
    </tr>
    <tr>
        <th>支付时间：</th>
        <td><?php echo empty($data['date_pay'])?'':$data['date_pay']; ?></td>
    </tr>
    <tr>
        <th>发货时间：</th>
        <td><?php echo empty($data['date_send'])?'':$data['date_send']; ?></td>
    </tr>
    <tr>
        <th>完成时间：</th>
        <td><?php echo empty($data['date_end'])?'':$data['date_end']; ?></td>
    </tr>
    <tr>
        <th>订单状态：</th>
        <td><?php echo empty($data['status'])?'':$data['status']; ?></td>
    </tr>
    <tr>
        <th></th>
        <td>
            <input type="button" class="formbtn" name="submit" value="返回" onclick="back()">
            <input type="hidden" name="id" value="<?php echo empty($data['id'])?'':$data['id']; ?>">
        </td>
    </tr>
</table>
