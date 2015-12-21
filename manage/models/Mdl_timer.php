<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CI后台定时器
 *
 * @author	jinjunming
 * @date	2014/4/19         
 */
class Mdl_timer extends CI_Model{
    /**
     * 构造函数
     *
     * @access  public
     * @return  void
     */
    public function __construct(){
        parent::__construct();	
    }
    /**
     * 获取项目列表
     *
     * @param   mixed
     * @return  array
     */
    public function get_projects($filter=array()){
        if(!empty($filter)){
            $_filter = $this->_get_projects_filter($filter);
        }
/*
funds_target,
funds_now,
days,
start_time,
end_time,
status*/
        $sql = "
            SELECT
                project_id
            FROM
                {$this->db->dbprefix('project')}
            ".(empty($_filter)?'':'WHERE '.$_filter)."
        ";
        $query = $this->db->query($sql);
        $data = $query->result_array();
        if(!empty($data)){
            return $data;
        }
        return array();
    }
    /**
     * 获取项目类型总数
     *
     * @param   filter array
     * @return  string
     */
    public function _get_projects_filter($filter=array()){
        $_filter = '';
        if(!empty($filter)){
            foreach($filter as $key=>$value){
                if(!empty($value) || $value == '0'){
                    $value = str_replace('.','\.',$value);
                    $value = str_replace('%','\%',$value);
                    $_filter .= "AND $key $value ";
                }
            }
            $_filter = substr($_filter,3);
        }
        return $_filter;
    }
    /**
     * 保存更新项目
     *
     * @param   $project_id   string
     * @param   $content      string
     * @return  boolen
     */
    public function project_update($project_id='',$data=array()){
        if(empty($project_id) || empty($data)){
            return false;
        }
        return $this->db->update('project', $data, array('project_id'=>$project_id));
    }
    /**
     * 新增大众监督
     *
     * @param   mixed
     * @return  array
     */
    public function supervise_add($data=array()){
        if( empty($data['project_id']) || empty($data['user_id']) || empty($data['funds']) ){
            return false;
        }
        $data['start_time'] = strtotime(date('Ymd',time()));
        if($this->db->insert('supervise', $data)){
            return $this->db->insert_id();
        }
        return false;
    }
    /**
     * 获取捐款金额
     *
     * @param   mixed
     * @return  array
     */
    public function get_funds($num=10,$limit=0,$filter=array(),$order='funds DESC'){
        if(!empty($filter)){
            $_filter = $this->_get_funds_filter($filter);
        }
        $sql = "
            SELECT
                SUM(o.funds) AS funds,
                o.user_id,
                u.real_name,
                u.nick_name,
                u.contact_name,
                u.web,
                u.head_img,
                u.country,
                u.province,
                u.role
            FROM
                {$this->db->dbprefix('order')} AS o
                LEFT JOIN {$this->db->dbprefix('users')} AS u ON o.user_id = u.user_id
            ".(empty($_filter)?'':'WHERE '.$_filter)."
            GROUP BY
                o.user_id
            ".(empty($order)?'':'ORDER BY '.$order)."
            LIMIT
                $limit,$num
        ";
        $query = $this->db->query($sql);
        $data = $query->result_array();
        if(!empty($data)){
            return $data;
        }
        return array();
    }
    /**
     * 获取捐款金额条件处理
     *
     * @param   filter array
     * @return  string
     */
    protected function _get_funds_filter($filter=array()){
        $_filter = '';
        if(!empty($filter)){
            foreach($filter as $key=>$value){
                $value = str_replace('.','\.',$value);
                $value = str_replace('%','\%',$value);
                $_filter .= "AND $key = '$value' ";
            }
            $_filter = substr($_filter,3);
        }
        return $_filter;
    }
    /**
     * 获取大众监督列表
     *
     * @param   mixed
     * @return  array
     */
    public function get_supervises($project_id=''){
        if(empty($project_id)){
            return array();
        }
        $sql = "
            SELECT
                s.supervise_id,
                s.project_id,
                s.status
            FROM
                {$this->db->dbprefix('supervise')} AS s
            WHERE
                s.project_id = $project_id
        ";
        $query = $this->db->query($sql);
        $data = $query->result_array();
        if(!empty($data)){
            return $data;
        }
        return array();
    }
    /**
     * 大众监督编辑
     *
     * @param   mixed
     * @return  array
     */
    public function supervise_update($supervise_id='', $data=array()){
        if( empty($supervise_id) ){
            return false;
        }
        return $this->db->update('supervise', $data, array('supervise_id'=>$supervise_id));
    }
}