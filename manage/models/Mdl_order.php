<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CI后台model
 * @category    model
 * @author      ming.king
 * @date        2015/11/26
 */
class Mdl_order extends MY_Model{
    /**
     * 构造函数
     *
     * @return  void
     */
    public function __construct(){
        parent::__construct();
        $this->my_select_field .= ',number,member,money_goods,money_preferential,money_end,payment,accept_name,accept_province,accept_city,accept_district,accept_detail,accept_phone,date_add,date_edit,date_2,date_3,date_4,date_5';
        $this->my_table = 'order';
    }
}