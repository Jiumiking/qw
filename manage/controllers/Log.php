<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 后台控制器
 *
 * @package     CI
 * @subpackage  Controllers
 * @category    Controllers
 * @author      jinjunming
 * @link        
 */
class Log extends MY_Controller{
    /**
     * 构造函数
     *
     * @access  public
     * @return  void
     */
    public function __construct(){
        parent::__construct();
        $this->load->model('mdl_user');
        $this->_views['data_user'] = $this->mdl_user->my_selects();
    }
    /**
     * 列表
     *
     * @access  public
     * @return  void
     */
    public function index(){
        //$this->_views['_js'][] = 'jquery.form';
        //$this->_views['_js'][] = 'authen';
        $this->_views['_js'][] = 'page';
        $page_size = empty($this->this_setting['page_number'])?10:$this->this_setting['page_number'];
        $list = $this->mdl_log->get_list($page_size);
        $list_count = $this->mdl_log->get_list_count();
        $this->_views['list'] = $list;
        $this->_views['pages'] = array(
            'page_count' => ceil($list_count/$page_size)==0?1:ceil($list_count/$page_size) ,
            'count' => $list_count
        );
        $this->load->model('mdl_role');
        $this->load->model('mdl_user');
        $this->_views['user_list'] = $this->mdl_user->get_list();
        $this->_views['role_list'] = $this->mdl_role->get_list();
        $this->load->view('log/log_index',$this->_views);
    }
    /**
     * ajax列表分页
     *
     * @access  public
     * @return  void
     */
    public function log_page(){
        $page = empty($_POST['page'])?1:$_POST['page'];
        $page_size = empty($_POST['page_size'])?10:$_POST['page_size'];

        $filter = $_POST;
        unset($filter['page']);
        unset($filter['page_size']);
        $data['list'] = $this->mdl_log->get_list($page_size, ($page-1)*$page_size, $filter);
        $return['list_content'] = $this->load->view('log/log_tb',$data,true);
        $return['page'] = $page;
        $return['count'] = $this->mdl_log->get_list_count($filter);
        $return['page_count'] = ceil($return['count']/$page_size)==0?1:ceil($return['count']/$page_size);
        echo json_encode($return);
    }
}