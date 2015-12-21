<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 基类
 *
 * @package     CI
 * @subpackage  core
 * @category    core
 * @author      jinjunming
 * @link        
 */
 class Controller_base extends CI_Controller{
     /**
     * 输出变量
     *
     * @var object
     * @access  public
     **/
    protected $_views = array();
     /**
     * 保存当前设置信息
     *
     * @var object
     * @access  public
     **/
    protected $this_setting = array();
     /**
     * 构造函数
     *
     * @access  public
     * @return  void
     */
    public function __construct(){
        parent::__construct();
        require_once('MY_Function.php');
        $this->load->library('session');
        //$this->load->model('mdl_user');
        //$this->load->model('mdl_setting');
        //$this->get_setting();
    }
    /**
     * 配置信息
     *
     * @access  protected
     * @return  void
     */
    private function get_setting(){
        $this->this_setting = $this->mdl_setting->get_settings();
        $this->_views['this_setting'] = $this->this_setting;
    }
    /**
     * 跳转方法
     *
     * @access  protected
     * @return  void
     */
    protected function jump_url($url='', $message='跳转中！', $time=3){
        $data['url'] = empty($url)?$_SERVER['HTTP_REFERER']:$url;
        $data['message'] = $message;
        $data['time'] = $time;
        $retrun = $this->load->view('base/jump_url',$data,true);
        echo $retrun;
        exit;
    }
 }
 /**
 * CI后台控制器基类
 *
 * @package     CI
 * @subpackage  core
 * @category    core
 * @author      jinjunming
 * @link        
 */		
 class MY_Controller extends Controller_base{
    /**
     * 保存当前登录用户的信息
     *
     * @var object
     * @access  public
     **/
    protected $this_user = NULL;
    /**
     * ajax返回数组
     *
     * @var string
     * @access  protected
     **/
    protected $ajax_views = array(
        'status' => '0',
        'msg' => '操作失败',
        'data' => '',
    );
    /**
     * 构造函数
     *
     * @access  public
     * @return  void
     */
    public function __construct(){
        parent::__construct();
        $this->ini();
    }
    /**
     * 入口方法
     *
     * @access  public
     * @return  void
     */
    private function ini(){
        $this->_views['_js'][] = 'jquery';
        $this->_views['_js'][] = 'slider';
        $this->_views['_css'][] = 'reset';
        $this->_views['_css'][] = 'base';
    }
    /**
     * 接口结束返回
     *
     * @access  protected
     * @return  bool
     */
    protected function ajax_end(){
        echo json_encode($this->ajax_views);
        exit;
    }
}