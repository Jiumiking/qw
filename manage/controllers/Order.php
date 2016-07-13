<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 后台控制器
 * @category    controller
 * @author      ming.king
 * @date        2015/11/26
 */
class Order extends MY_Controller{
    /**
     * 构造函数
     *
     * @access  public
     * @return  void
     */
    public function __construct(){
        parent::__construct();
        $this->load->model('mdl_order_goods');
        $this->load->model('mdl_shipping');
        $this->load->model('mdl_payment');
        $this->_views['data_shipping'] = $this->mdl_shipping->my_selects();
        $this->_views['data_payment'] = $this->mdl_payment->my_selects();echo '<pre>';print_r($this->config->item('status_order','2'));exit;
    }
    /**
     * 编辑ajax
     * @access  public
     * @param   mixed
     * @return  mixed
     */
    public function my_edit(){
        if( !empty($_GET['id']) ){
            $this->_views['data'] = $this->{$this->this_model}->my_select( $_GET['id'] );
        }
        $this->_views['data_goods'] = $this->mdl_order_goods->my_selects( 0,0,array('order_id'=>$_GET['id']) );
        $this->ajax_views['dat'] = $this->load->view( $this->this_controller.'/'.$this->this_controller.'_edit', $this->_views, true );
        $this->ajax_views['sta'] = '1';
        $this->ajax_views['msg'] = '获取成功';
        $this->ajax_end();
    }
    /**
     * 编辑执行ajax
     * @access  public
     * @param   mixed
     * @return  mixed
     */
    public function my_edit_do(){//echo '<pre>';print_r($_FILES);exit;
        $data=$_POST;
        $content = $data['content'];
        $tag1 = $data['tag1'];
        unset($data['content']);
        unset($data['tag1']);
        if( !empty($data['id']) ){
            $data['date_edit'] = date('Ymd');
            $back = $this->{$this->this_model}->my_update( $data['id'],$data ); //更新
            $id = $data['id'];
        }else{
            $data['date_add'] = date('Ymd');
            $back = $this->{$this->this_model}->my_insert( $data ); //新插入
            $id = $this->db->insert_id();
        }
        if($back){
            $this->{$this->this_model}->content_edit( $id, $content ); //保存简介
            $this->mdl_tag->tag_link_edit( $id, $tag1 ); //保存类型标签
            for( $i=0; $i<5; $i++ ){
                $photo = $this->film_photo_save( $id, $i );
                if( $photo ){
                    $photos['photo'.(string)$i] = $photo;
                }
            }
            if( !empty($photos) ){
                $this->{$this->this_model}->my_update( $id, $photos ); //保存图片名称
            }
            $this->ajax_views['sta'] = '1';
            $this->ajax_views['msg'] = '操作成功';
        }
        $this->ajax_end();
    }
}