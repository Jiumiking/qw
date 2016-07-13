<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 后台控制器
 * @category    controller
 * @author      ming.king
 * @date        2015/11/26
 */
class Member extends MY_Controller{
    /**
     * 构造函数
     *
     * @access  public
     * @return  void
     */
    public function __construct(){
        parent::__construct();
        $this->_views['_js'][] = 'datepicker/WdatePicker';
        $this->load->model('mdl_member_address');
    }
    /**
     * 查看ajax
     * @access  protected
     * @param   mixed
     * @return  mixed
     */
    public function my_show(){
        if( !empty($_GET['id']) ){
            $this->_views['data'] = $this->{$this->this_model}->my_select( $_GET['id'] );
            $this->_views['data_address'] = $this->mdl_member_address->my_selects( 0,0,array('member_id'=>$_GET['id']) );
        }
        $this->ajax_views['dat'] = $this->load->view( $this->this_controller.'/'.$this->this_controller.'_show', $this->_views, true );
        $this->ajax_views['sta'] = '1';
        $this->ajax_views['msg'] = '获取成功';
        $this->ajax_end();
    }
}