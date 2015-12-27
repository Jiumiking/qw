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
        $this->my_select_field .= ',number,name,money,type,date_status';
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
                id,goods,detail
            FROM
                {$this->db->dbprefix('goods_detail')}
            WHERE
                goods = '$id'
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
            return $this->db->update( 'goods_detail', array('detail'=>$detail, 'date_edit'=>date('Y-m-d H:i:s')), array('goods' => $id) );
        }else{
            return $this->db->insert( 'goods_detail', array( 'goods'=>$id, 'detail'=>$detail, 'date_add'=>date('Y-m-d H:i:s') ) );
        }
    }
    /**
     * 尺寸获取 by goods_id
     * @access  public
     * @param   mixed
     * @return  mixed
     */
    public function size_get( $id ){
        if( empty($id) ){
            return false;
        }
        $sql = "
            SELECT
                id,goods,name
            FROM
                {$this->db->dbprefix('goods_size')}
            WHERE
                goods = '$id'
        ";
        $query = $this->db->query($sql);
        $data = $query->result_array();
        return $data;
    }
    /**
     * 尺寸更新
     * @access  public
     * @param   mixed
     * @return  mixed
     */
    public function size_edit( $id, $data ){
        if( empty($id) ){
            return false;
        }
        $this->db->delete( 'goods_size', array('goods'=>$id) );
        foreach( $data as $key=>$value ){
            if( !empty($value['name']) ){
                $data_insert = $value;
                $data_insert['goods'] = $id;
                $data_insert['date_add'] = date('Y-m-d H:i:s');
                $this->db->insert( 'goods_size', $data_insert );
            }
        }
        return true;
    }
    /**
     * 颜色获取 by goods_id
     * @access  public
     * @param   mixed
     * @return  mixed
     */
    public function colour_get( $id ){
        if( empty($id) ){
            return false;
        }
        $sql = "
            SELECT
                id,goods,name,money
            FROM
                {$this->db->dbprefix('goods_colour')}
            WHERE
                goods = '$id'
        ";
        $query = $this->db->query($sql);
        $data = $query->result_array();
        return $data;
    }
    /**
     * 颜色更新
     * @access  public
     * @param   mixed
     * @return  mixed
     */
    public function colour_edit( $id, $data ){
        if( empty($id) ){
            return false;
        }
        $this->db->delete( 'goods_colour', array('goods'=>$id) );
        foreach( $data as $key=>$value ){
            if( !empty($value['name']) ){
                $data_insert = $value;
                $data_insert['goods'] = $id;
                $data_insert['date_add'] = date('Y-m-d H:i:s');
                $this->db->insert( 'goods_colour', $data_insert );
            }
        }
        return true;
    }
}