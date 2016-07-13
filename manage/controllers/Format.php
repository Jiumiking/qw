<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 后台控制器
 * @category    controller
 * @author      ming.king
 * @date        2015/11/26
 */
class Format extends MY_Controller{
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
     * 编辑ajax
     * @access  protected
     * @param   mixed
     * @return  mixed
     */
    public function my_edit(){
        if( !empty($_GET['id']) ){
            $this->_views['data'] = $this->{$this->this_model}->my_select( $_GET['id'] );
            $this->_views['data_value'] = $this->{$this->this_model}->value_selects( $_GET['id'] );
        }
        $this->ajax_views['dat'] = $this->load->view( $this->this_controller.'/'.$this->this_controller.'_edit', $this->_views, true );
        $this->ajax_views['sta'] = '1';
        $this->ajax_views['msg'] = '获取成功';
        $this->ajax_end();
    }
    /**
     * 编辑执行ajax
     * @access  protected
     * @param   mixed
     * @return  mixed
     */
    public function my_edit_do(){
        $data=$_POST;
        $value = array();
        if( !empty($data['value']) ){
            $value = $data['value'];
            unset($data['value']);
        }
        if( !empty($data['id']) ){
            $back = $this->{$this->this_model}->my_update( $data['id'],$data );
            $id = $data['id'];
        }else{
            $back = $this->{$this->this_model}->my_insert( $data );
            $id = $this->db->insert_id();
        }
        if( !empty($value) ){
            $this->{$this->this_model}->value_inserts($id,$value);
        }
        if($back){
            $this->ajax_views['sta'] = '1';
            $this->ajax_views['msg'] = '操作成功';
        }
        $this->ajax_end();
    }
}