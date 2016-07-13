<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CI后台model
 * @category    model
 * @author      ming.king
 * @date        2015/11/26
 */
class Mdl_format extends MY_Model{
    /**
     * 构造函数
     *
     * @return  void
     */
    public function __construct(){
        parent::__construct();
        $this->my_select_field = 'id,name,remark';
        $this->my_table = 'format';
    }
    /**
     * 插入更新规格值
     *
     * @return  void
     */
    public function value_inserts($id,$value){
        if( empty($id) || empty($value) ){
            return false;
        }
        $list = $this->value_selects($id);
        $id_show = array();
        foreach($value as $k=>$v){
            if( !empty($v['name']) ){
                if( !empty($v['id']) ){//更新
                    $this->value_update($v['id'],array('name'=>$v['name']));
                    $id_show[] = $v['id'];
                }else{//新插入
                    $data_insert['name'] = $v['name'];
                    $data_insert['format_id'] = $id;
                    $this->value_insert($data_insert);
                }
            }
        }
        if( !empty($list) ){
            if( !empty($id_show) ){
                foreach( $list as $k=>$v ){
                    foreach( $id_show as $kk=>$vv ){
                        if($v['id'] == $vv){
                            unset($list[$k]);
                        }
                    }
                }
            }
            foreach( $list as $k=>$v ){
                $this->value_delete($v['id']);
            }
        }
    }
    /**
     * 规格值列表
     * @access  public
     * @param   mixed
     * @return  mixed
     */
    public function value_selects($id){
        $sql = "
            SELECT
                id,name,remark,format_id
            FROM
                {$this->db->dbprefix('format_value')}
            WHERE
                format_id = '$id'
        ";
        $query = $this->db->query($sql);
        $data = $query->result_array();
        return $data;
    }
    /**
     * 修改
     * @access  public
     * @param   mixed
     * @return  mixed
     */
    public function value_update( $id = '', $data = '' ){
        if(empty($id) || empty($data)){
            return false;
        }
        $data['date_edit'] = date('Y-m-d H:i:s');
        return $this->db->update( 'format_value', $data, array('id' => $id) );
    }
    /**
     * 新增
     * @access  public
     * @param   mixed
     * @return  mixed
     */
    public function value_insert( $data = '' ){
        if( empty($data) ){
            return false;
        }
        $data['date_add'] = date('Y-m-d H:i:s');
        return $this->db->insert( 'format_value', $data );
    }
    /**
     * 删除
     * @access  public
     * @param   mixed
     * @return  mixed
     */
    public function value_delete( $id = '' ){
        if( empty($id) ){
            return false;
        }
        return $this->db->delete( 'format_value', array('id' => $id) );
    }
}