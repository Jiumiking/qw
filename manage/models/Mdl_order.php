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
        $this->my_select_field .= ',order_no,member_id,money_goods,money_preferential,money_shipping,money_end,payment_id,shipping_id,accept_name,accept_province,accept_city,accept_district,accept_detail,accept_phone,remark,date_pay,date_send,date_end';
        $this->my_table = 'order';
    }
    /**
     * 列表
     * @access  public
     * @param   mixed
     * @return  mixed
     */
    public function my_selects( $num=0, $limit=0, $where=array(), $order_by='id DESC' ){
        $_where = '';
        if( !empty($where) ){
            $_where = $this->my_where($where);
        }
        $_limit = '';
        if( !empty($num) ){
            $_limit = "LIMIT $limit,$num";
        }
        $sql = "
            SELECT
                o.id,o.order_no,o.member_id,o.money_goods,o.money_preferential,o.money_shipping,o.money_end,o.payment_id,o.shipping_id,o.accept_name,o.accept_province,o.accept_city,o.accept_district,o.accept_detail,o.accept_phone,o.remark,o.date_pay,o.date_send,o.date_end,o.date_add,o.date_edit,o.status
                ,m.name_real,m.name_nick
                ,p.name AS payment_name
                ,s.name AS shipping_name
            FROM
                {$this->db->dbprefix($this->my_table)} AS o
                LEFT JOIN {$this->db->dbprefix('member')} AS m ON m.id = o.member_id
                LEFT JOIN {$this->db->dbprefix('payment')} AS p ON p.id = o.payment_id
                LEFT JOIN {$this->db->dbprefix('shipping')} AS s ON s.id = o.shipping_id
            WHERE
                1
                $_where
            ORDER BY
                $order_by
            $_limit
        ";
        $query = $this->db->query($sql);
        $data = $query->result_array();
        return $data;
    }
    /**
     * 列表数量
     *
     * @param   mixed
     * @return  object
     */
    public function my_count( $where=array() ){
        $_where = '';
        if(!empty($where)){
            $_where = $this->my_where($where);
        }
        $sql = "
            SELECT
                count(1) AS count
            FROM
                {$this->db->dbprefix($this->my_table)} AS o
                LEFT JOIN {$this->db->dbprefix('member')} AS m ON m.id = o.member_id
                LEFT JOIN {$this->db->dbprefix('payment')} AS p ON p.id = o.payment_id
                LEFT JOIN {$this->db->dbprefix('shipping')} AS s ON s.id = o.shipping_id
            WHERE
                1
                $_where
        ";
        $query = $this->db->query($sql);
        $data = $query->row_array();
        if(!empty($data['count'])){
            return $data['count'];
        }
        return 0;
    }
    /**
     * 列表条件处理
     * @access  public
     * @param   mixed
     * @return  mixed
     */
    protected function my_where( $where=array() ){
        if(empty($where)){
            return '';
        }
        $return = '';
        foreach($where as $key=>$value){
            if( !empty($value) ){
                $value = str_replace('.','\.',$value);
                $value = str_replace('%','\%',$value);
                if( $key=='order_no' || $key=='accept_name' || $key=='accept_phone' ){
                    $return .= ' AND o.'.$key." LIKE '%$value%'";
                }else if($key=='name_real' || $key=='name_nick' || $key=='phone' || $key=='email'){
                    $return .= ' AND m.'.$key." LIKE '%$value%'";
                }else{
                    $return .= ' AND o.'.$key." = '$value'";
                }
            }
        }
        return $return;
    }
}