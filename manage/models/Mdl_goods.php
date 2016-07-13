<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CI后台model
 * @category    model
 * @author      ming.king
 * @date        2015/11/26
 */
class Mdl_goods extends MY_Model{
    /**
     * 构造函数
     *
     * @return  void
     */
    public function __construct(){
        parent::__construct();
        $this->my_select_field .= ',goods_no,name,money_in,money_out,type_id,date_add,date_edit,date_status,status';
        $this->my_table = 'goods';
    }
    /**
     * 内容获取by goods_id
     * @access  public
     * @param   mixed
     * @return  mixed
     */
    public function detail_get( $id ){
        if( empty($id) ){
            return false;
        }
        $sql = "
            SELECT
                id,goods_id,detail
            FROM
                {$this->db->dbprefix('goods_detail')}
            WHERE
                goods_id = '$id'
        ";
        $query = $this->db->query($sql);
        $data = $query->row_array();
        return $data;
    }
    /**
     * 内容更新
     * @access  public
     * @param   mixed
     * @return  mixed
     */
    public function detail_edit( $id, $detail ){
        if( empty($id) ){
            return false;
        }
        $date = $this->detail_get( $id );
        if( $date ){
            return $this->db->update( 'goods_detail', array('detail'=>$detail, 'date_edit'=>date('Y-m-d H:i:s')), array('goods_id' => $id) );
        }else{
            return $this->db->insert( 'goods_detail', array( 'goods_id'=>$id, 'detail'=>$detail, 'date_add'=>date('Y-m-d H:i:s') ) );
        }
    }
    /**
     * 规格库存获取 by goods_id
     * @access  public
     * @param   mixed
     * @return  mixed
     */
    public function amount_get( $id ){
        if( empty($id) ){
            return false;
        }
        $sql = "
            SELECT
                id,goods_id,format1,format2,format3,format4,format5,format1_remark,format2_remark,format3_remark,format4_remark,format5_remark,amount,money
            FROM
                {$this->db->dbprefix('goods_amount')}
            WHERE
                goods_id = '$id'
        ";
        $query = $this->db->query($sql);
        $data = $query->result_array();
        return $data;
    }
    /**
     * 规格库存
     * @access  public
     * @param   mixed
     * @return  mixed
     */
    public function amount_adds( $id, $data ){
        if( empty($id) ){
            return false;
        }
        foreach( $data as $key=>$value ){
            $data_insert = $value;
            $data_insert['goods_id'] = $id;
            if( empty($value['id']) ){
                unset($data_insert['id']);
                $data_insert['date_add'] = date('Y-m-d H:i:s');
                $this->amount_add( $data_insert );
            }else{
                $data_insert['date_edit'] = date('Y-m-d H:i:s');
                $this->amount_edit( $value['id'],$data_insert );
            }
        }
        return true;
    }
    /**
     * 规格库存 新增
     * @access  public
     * @param   mixed
     * @return  mixed
     */
    public function amount_add( $data ){
        return $this->db->insert( 'goods_amount', $data );
    }
    /**
     * 规格库存 更新
     * @access  public
     * @param   mixed
     * @return  mixed
     */
    public function amount_edit( $id, $data ){
        if( empty($id) ){
            return false;
        }
        return $this->db->update( 'goods_amount', $data, array('id'=>$id) );
    }
}