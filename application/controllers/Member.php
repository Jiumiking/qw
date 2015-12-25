<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 控制器
 * @package     CI
 * @subpackage  Controllers
 * @category    Controllers
 * @author      ming.king
 */
class Member extends M_Controller{
    /**
     * 构造函数
     * @access  public
     * @return  void
     */
    public function __construct(){
        parent::__construct();
        $this->load->model('mdl_member');
        $this->load->library('email');
        $this->this_view_data['_js'][] = 'jquery.form';
    }
    /**
     * 默认首页
     * @access  public
     * @return  void
     */
    public function index(){
        $this->center();
    }
    /**
     * 用户中心
     * @access  public
     * @return  void
     */
    public function center(){
        $this->order();
    }
    /**
     * 订单
     * @access  public
     * @return  void
     */
    public function order(){
        $this->this_view_data['member_menu'] = 'order';
        $this->load->view('member/member_center',$this->this_view_data);
    }
    /**
     * 个人设置
     * @access  public
     * @return  void
     */
    public function setting(){
        //echo '<pre>';print_r($this->this_view_data);exit;
        //echo date('Y',strtotime($this->this_view_data['this_user']['birthday']));exit;
        $this->this_view_data['member_menu'] = 'setting';
        $this->load->view('member/member_center',$this->this_view_data);
    }
    /**
     * 个人设置
     * @access  public
     * @return  void
     */
    public function setting_do(){
        $data['id'] = empty($_POST['member_data']['name_nick'])?'':$_POST['member_data']['id'];
        $data['name_nick'] = empty($_POST['member_data']['name_nick'])?'':$_POST['member_data']['name_nick'];
        $data['name_real'] = empty($_POST['member_data']['name_real'])?'':$_POST['member_data']['name_real'];
        $data['sex'] = empty($_POST['member_data']['sex'])?'':$_POST['member_data']['sex'];
        if( empty($data['id']) || empty($data['name_nick']) || empty($data['name_real']) ){
            $this->ajax_data['msg'] = '无效的数据';
            $this->ajax_end();
        }
        if( !empty($_POST['member_data']['birthday']['year']) && !empty($_POST['member_data']['birthday']['month']) && !empty($_POST['member_data']['birthday']['day']) ){
            $data['birthday'] = $_POST['member_data']['birthday']['year'].'-'.$_POST['member_data']['birthday']['month'].'_'.$_POST['member_data']['birthday']['day'];
        }
        $member = $this->mdl_member->my_select_nick( $data['name_nick'], $data['id'] );
        if( !empty($member) ){
            $this->ajax_data['msg'] = '昵称已使用';
            $this->ajax_end();
        }
        if( $this->mdl_member->my_update( $data['id'],$data ) ){
            $this->ajax_data['sta'] = 1;
            $this->ajax_data['msg'] = '保存成功';
            $this->this_user_reset();
        }else{
            $this->ajax_data['msg'] = '保存失败';
        }
        $this->ajax_end();
    }
    /**
     * 账户安全
     * @access  public
     * @return  void
     */
    public function safe(){
        $this->this_view_data['member_menu'] = 'safe';
        $this->load->view('member/member_center',$this->this_view_data);
    }
    /**
     * 账户安全 修改密码
     * @access  public
     * @return  void
     */
    public function safe_password(){
        $this->this_view_data['msg'] = $this->session->flashdata('msg');
        $this->this_view_data['member_menu'] = 'safe_password';
        $this->load->view('member/member_center',$this->this_view_data);
    }
    /**
     * 账户安全 修改密码
     * @access  public
     * @return  void
     */
    public function safe_password_do(){
        $data['password'] = empty($_POST['password'])?'':$_POST['password'];
        $data['password_new'] = empty($_POST['password_new'])?'':$_POST['password_new'];
        if( (empty($data['password']) && empty($data['password_new'])) ){
            $this->ajax_data['msg'] = '无效的数据';
            $this->ajax_end();
        }
        if( password_encrypt($_POST['password']) != $this->this_user['password'] ){
            $this->ajax_data['msg'] = '密码错误';
            $this->ajax_end();
        }
        if( $this->mdl_member->my_update($this->this_user['id'],array('password'=>password_encrypt($_POST['password_new']))) ){
            $this->ajax_data['sta'] = 1;
            $this->ajax_data['msg'] = '保存成功';
            $this->this_user_reset();
        }else{
            $this->ajax_data['msg'] = '保存失败';
        }
        $this->ajax_end();
    }
    /**
     * 账户安全 修改密码
     * @access  public
     * @return  void
     */
    public function safe_password_check(){
        if( empty($_GET['value']) ){
            echo '1';
            exit;
        }
        $password_md5 = password_encrypt($_GET['value']);
        if( $password_md5 == $this->this_user['password'] ){
            echo '2';
        }else{
            echo '1';
        }
        exit;
    }
    /**
     * 账户安全 邮箱
     * @access  public
     * @return  void
     */
    public function safe_email(){


//        $this->email->from('vblue7@163.com', '7blue.cn');
//        $this->email->to('723528197@qq.com');
//        $this->email->subject('Email Test');
//        $this->email->message('Testing the email class.');
//
//        if($this->email->send()){
//            echo 1;
//        }
//        echo $this->email->print_debugger();

        $this->this_view_data['msg'] = $this->session->flashdata('msg');
        $this->this_view_data['member_menu'] = 'safe_email';
        $this->load->view('member/member_center',$this->this_view_data);
    }
    /**
     * 收货地址
     * @access  public
     * @return  void
     */
    public function address(){
        $this->this_view_data['member_menu'] = 'address';
        $this->load->view('member/member_center',$this->this_view_data);
    }
    /**
     * ajax 昵称唯一性验证
     * @access  protected
     * @return  void
     */
    public function nick_unique(){
        if( empty($_GET['value']) ){
            echo 1;exit;
        }
        $id = empty($_GET['id'])?0:$_GET['id'];
        $member = $this->mdl_member->my_select_nick( $_GET['value'], $id );
        if( empty($member) ){
            echo 0;exit;
        }else{
            echo 1;exit;
        }
    }
}


