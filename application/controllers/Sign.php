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
        $this->load->view('signin',$this->this_view_data);
    }
    /**
     * 登录
     * @access  public
     * @return  void
     */
    public function signin_do(){
        $this->load->view('signin',$this->this_view_data);
    }
    /**
     * 注册
     * @access  public
     * @return  void
     */
    public function signup(){
        $this->load->view('signup',$this->this_view_data);
    }
    /**
     * 注册
     * @access  public
     * @return  void
     */
    public function signup_do(){
        echo '<pre>';print_r($_POST);exit;
        $this->load->view('signup',$this->this_view_data);
    }

}


