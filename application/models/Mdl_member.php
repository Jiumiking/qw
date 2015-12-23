<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CI后台model
 * @category    model
 * @author      ming.king
 * @date        2015/11/26
 */
class Mdl_member extends MY_Model{
    /**
     * 构造函数
     *
     * @return  void
     */
    public function __construct(){
        parent::__construct();
        $this->my_select_field .= ',name_real,name_nick,password,phone,email,integral,sex';
        $this->my_table = 'member';
    }
    /**
     * 详情
     * @access  public
     * @param   mixed
     * @return  mixed
     */
    public function my_select_username( $username = '' ){
        if( empty( $username ) ){
            return false;
        }
        $sql = "
            SELECT
                {$this->my_select_field}
            FROM
                {$this->db->dbprefix($this->my_table)}
            WHERE
                phone = '$username' OR email = '$username'
        ";
        $query = $this->db->query($sql);
        $data = $query->row_array();
        return $data;
    }
}