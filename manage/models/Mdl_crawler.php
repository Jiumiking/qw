<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CI后台model
 * @category    model
 * @author      ming.king
 * @date        2015/11/26
 */
class Mdl_crawler extends MY_Model{
    /**
     * 构造函数
     *
     * @return  void
     */
    public function __construct(){
        parent::__construct();
        $this->my_select_field = 'id,goods_id,name,price,date_add,date_edit';
        $this->my_table = 'jd_goods';
    }
    /**
     * 新增
     * @access  public
     * @param   mixed
     * @return  mixed
     */
    public function jd_price_insert( $data = '' ){
        if( empty($data) ){
            return false;
        }
        $data['date_add'] = date('Ymd');
        return $this->db->insert( 'jd_price', $data );
    }
}