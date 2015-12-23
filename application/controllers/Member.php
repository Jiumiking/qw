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
     * 后台默认首页
     * @access  public
     * @return  void
     */
    public function center(){
        echo '<pre>';print_r($_SESSION);exit;
        echo '用户中心';
        $this->load->view('home',$this->this_view_data);
    }

}


