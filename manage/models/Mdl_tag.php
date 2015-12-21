<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CI后台model
 * @category    model
 * @author      ming.king
 * @date        2015/11/26
 */
class Mdl_tag extends MY_Model{
    /**
     * 构造函数
     *
     * @return  void
     */
    public function __construct(){
        parent::__construct();
        $this->my_select_field = 'id,name,type,ob';
        $this->my_table = 'tag';
    }
    /**
     * 列表
     * @access  public
     * @param   mixed
     * @return  mixed
     */
    public function my_selects( $num=0, $limit=0, $where=array(), $order_by='ob DESC, id DESC' ){
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
                {$this->db->dbprefix('tag')}.id,
                {$this->db->dbprefix('tag')}.name,
                {$this->db->dbprefix('tag')}.type,
                {$this->db->dbprefix('tag')}.ob,
                {$this->db->dbprefix('tag_type')}.name AS type_name
            FROM
                {$this->db->dbprefix('tag')}
                LEFT JOIN {$this->db->dbprefix('tag_type')} ON {$this->db->dbprefix('tag_type')}.id = {$this->db->dbprefix('tag')}.type
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
                if( $key == 'name' ){
                    $return .= " AND {$this->db->dbprefix($this->my_table)}.".$key." LIKE '%$value%'";
                }else{
                    $return .= " AND {$this->db->dbprefix($this->my_table)}.".$key." = '$value'";
                }
            }
        }
        return $return;
    }
    /**
     * 标签关联删除
     * @access  public
     * @param   mixed
     * @return  mixed
     */
    public function tag_link_get( $id ){
        if( empty($id) ){
            return false;
        }
        $sql = "
            SELECT
                id,film_id,tag_id
            FROM
                {$this->db->dbprefix('tag_link')}
            WHERE
                film_id = '$id'
        ";
        $query = $this->db->query($sql);
        $data = $query->result_array();
        return $data;
    }
    /**
     * 标签关联删除
     * @access  public
     * @param   mixed
     * @return  mixed
     */
    public function tag_link_del( $id ){
        if( empty($id) ){
            return false;
        }
        return $this->db->delete( 'tag_link', array('film_id' => $id) );
    }
    /**
     * 标签关联
     * @access  public
     * @param   mixed
     * @return  mixed
     */
    public function tag_link_edit( $id, $tag ){
        if( empty($id) ){
            return false;
        }
        $this->tag_link_del( $id );
        if( !empty($tag) ){
            foreach( $tag as $key=>$value ){
                if( !empty($value) ){
                    $data[$key]['film_id'] = $id;
                    $data[$key]['tag_id'] = $value;
                }
            }
        }
        if( !empty($data) ){
            return $this->db->insert_batch( 'tag_link', $data );
        }
        return true;
    }
}