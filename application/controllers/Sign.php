<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 登录、注册控制器
 * @package     CI
 * @subpackage  Controllers
 * @category    Controllers
 * @author      ming.king
 */
class Sign extends P_Controller{
    /**
     * 构造函数
     * @access  public
     * @return  void
     */
    public function __construct(){
        parent::__construct();

        $captcha_cfg['useImgBg'] = TRUE;
        $captcha_cfg['useNoise'] = FALSE;
        $captcha_cfg['useCurve'] = FALSE;
        $captcha_cfg['useZh'] = FALSE;
        $captcha_cfg['fontSize'] = 16;
        $captcha_cfg['length'] = 4;
        $captcha_cfg['imageL'] = 120;
        $this->load->library( 'captcha', $captcha_cfg );
        $this->load->model('mdl_member');
    }
    /**
     * 默认首页
     * @access  public
     * @return  void
     */
    public function index(){
        $this->signin();
    }
    /**
     * 登录
     * @access  public
     * @return  void
     */
    public function signin(){
        $this->this_view_data['msg'] = $this->session->flashdata('msg');
        $this->load->view('signin',$this->this_view_data);
    }
    /**
     * 登录
     * @access  public
     * @return  void
     */
    public function signin_do(){
        $username = $_POST['username'];
        $password = $_POST['password'];
        if ($username && $password){
            $this_user = $this->mdl_member->my_select_username($username);
            if ( $this_user ){
                if( $this_user['status'] == '1' ){
                    if( $this_user['password'] == password_encrypt($password) ){
                        $this->session->this_user = $this_user;
                        redirect( site_url());
                    }else{
                        $this->session->set_flashdata('msg', '密码错误');
                    }
                }else if( $this_user['status'] == '2' ){
                    $this->session->set_flashdata('msg', '该账号已锁定');
                }else if( $this_user['status'] == '3' ){
                    $this->session->set_flashdata('msg', '该账号已注销');
                }
            }else{
                $this->session->set_flashdata('msg', '账号不存在');
            }
        }else{
            $this->session->set_flashdata('msg', '用户名密码不能为空');
        }
        redirect( site_url('sign/signin') );
    }
    /**
     * 注册
     * @access  public
     * @return  void
     */
    public function signup(){
        $this->this_view_data['msg'] = $this->session->flashdata('msg');
        $this->load->view('signup',$this->this_view_data);
    }
    /**
     * 注册
     * @access  public
     * @return  void
     */
    public function signup_do(){
        $data['phone'] = empty($_POST['phone'])?'':$_POST['phone'];
        $data['email'] = empty($_POST['email'])?'':$_POST['email'];
        $data['password'] = empty($_POST['password'])?'':$_POST['password'];
        if( (empty($data['phone']) && empty($data['email'])) || empty($data['password']) ){
            $this->session->set_flashdata('msg', '无效的数据');
            redirect( site_url('sign/signup') );
        }
        $member = $this->mdl_member->my_select_username( empty($data['phone'])?$data['email']:$data['phone'] );
        if( !empty($member) ){
            $this->session->set_flashdata('msg', '该用户已存在');
            redirect( site_url('sign/signup') );
        }
        $data['password'] = password_encrypt($data['password']);
        $this->mdl_member->my_insert($data);
        redirect( site_url('member/center') );
    }
    /**
     * 登出
     * @access  public
     * @return  void
     */
    public function signout(){
        $this->session->sess_destroy();
        redirect( site_url());
    }
    /**
     * 生成验证码
     * @access  protected
     * @return  void
     */
    public function captcha_get(){
        $this->captcha->entry();           // 输出图片
    }
    /**
     * ajax 验证验证码
     * @access  protected
     * @return  void
     */
    public function captcha_check(){
        $mark = 0;
        if( !empty($_GET['code']) ){
            if( $this->captcha->check($_GET['code']) ){
                $mark = 1;
            }
        }
        echo $mark;
    }
    /**
     * ajax 手机号、邮箱唯一性验证
     * @access  protected
     * @return  void
     */
    public function phone_email_unique(){
        if( empty($_GET['value']) ){
            echo 1;exit;
        }
        $member = $this->mdl_member->my_select_username($_GET['value']);
        if( empty($member) ){
            echo 0;exit;
        }else{
            echo 1;exit;
        }
    }

}


