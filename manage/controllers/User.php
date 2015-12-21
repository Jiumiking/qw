<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 后台用户控制器
 *
 * @package     CI
 * @subpackage  Controllers
 * @category    Controllers
 * @author      jinjunming
 * @link        
 */
class User extends MY_Controller{
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
     * ajax编辑
     *
     * @access  public
     * @return  void
     */
    public function my_edit_do(){
        $data=$_POST;
        if( !empty($data['id']) ){
            $back = $this->mdl_user->my_update( $data['id'],$data );
        }else{
            $data['password'] = password_encrypt($data['password']);
            $back = $this->mdl_user->my_insert( $data );
        }
        if($back){
            $this->ajax_views['sta'] = '1';
            $this->ajax_views['msg'] = '操作成功';
        }
        $this->ajax_end();
    }
    /**
     * ajax验证密码是否正确
     *
     * @access  public
     * @return  void
     */
    public function is_pwd(){
        if(empty($_GET['id']) || empty($_GET['pwd'])){
            echo 2;exit;
        }
        $user_info = $this->mdl_user->my_select($_GET['id']);
        if(!empty($user_info['password']) && $user_info['password'] == password_encrypt($_GET['pwd'])){
            echo 1;exit;
        }
        echo 2;
    }
    /**
     * ajax修改密码
     *
     * @access  public
     * @return  void
     */
    public function change_pwd(){
        $this->_views['old_show'] = 1;
        if( $this->this_user['id'] == '100' && !empty($_GET['id']) && $_GET['id'] != '100' ){
            $this->_views['old_show'] = 0;
        }
        $this->ajax_views['dat'] = $this->load->view('user/user_change_pwd',$this->_views,true);
        $this->ajax_views['sta'] = '1';
        $this->ajax_views['msg'] = '获取成功';
        $this->ajax_end();
    }
    /**
     * ajax修改密码
     *
     * @access  public
     * @return  void
     */
    public function update_pwd(){
        if( empty($_GET['id']) || empty($_GET['pwd']) ){
            echo 2;exit;
        }
        $user_data['password'] = password_encrypt($_GET['pwd']);
        if($this->mdl_user->my_update($_GET['id'],$user_data)){
            echo 1;exit;
        }
        echo 2;
    }
    /**
     * ajax锁定/解锁
     *
     * @access  public
     * @return  void
     */
    public function lock(){
        if( empty($_GET['id']) || empty($_GET['status']) ){
            $this->ajax_views['msg'] = '参数错误';
            $this->ajax_end();
        }
        $data['status'] = $_GET['status'];
        if( $_GET['status'] == '1' ){
            $data['password_times'] = '0';
        }
        if( $this->mdl_user->my_update( $_GET['id'], $data) ){
            $this->ajax_views['sta'] = '1';
            $this->ajax_views['msg'] = '操作成功';
        }else{
            $this->ajax_views['msg'] = '操作失败';
        }
        $this->ajax_end();
    }
}