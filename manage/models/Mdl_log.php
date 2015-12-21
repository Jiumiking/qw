<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CI后台model
 *
 * @author	jinjunming
 * @date	2015/11/9
 */
class Mdl_log extends MY_Model{
    /**
     * 构造函数
     *
     * @return  void
     */
    public function __construct(){
        parent::__construct();
        $this->my_select_field = 'id,user_id,log_info,ip_address,date_add';
        $this->my_table = 'log';
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
                if($key == 'log_info' || $key == 'ip_address' ){
                    $return .= ' AND '.$key." LIKE '%$value%'";
                }else{
                    $return .= ' AND '.$key." = '$value'";
                }
            }
        }
        return $return;
    }
    /**
     * 新增1条日志
     *
     * @access  public
     * @param   array
     * @return  boolen
     */
    public function add_log($log_info){
        if( empty($log_info) ){
            return false;
        }
        $this_user = $this->session->userdata('this_user');
        if( empty($this_user['id']) ){
            return false;
        }
        $data = array();
        $data['date_add'] = date('Y-m-d H:i:s');
        $data['log_info'] = $log_info;
        $data['ip_address'] = $this->get_real_ip();
        $data['user_id'] = $this_user['id'];
        $this->my_insert($data);
    }
    /**
     * 获取当前IP
     *
     * @access  public
     * @param   array
     * @return  boolen
     */
    public function get_real_ip(){
        $ip=false;
        if(!empty($_SERVER["HTTP_CLIENT_IP"])){
            $ip = $_SERVER["HTTP_CLIENT_IP"];
        }
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ips = explode (", ", $_SERVER['HTTP_X_FORWARDED_FOR']);
            if ($ip) { array_unshift($ips, $ip); $ip = FALSE; }
            for ($i = 0; $i < count($ips); $i++) {
                if (!eregi ("^(10|172\.16|192\.168)\.", $ips[$i])) {
                    $ip = $ips[$i];
                    break;
                }
            }
        }
        return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
    }
}