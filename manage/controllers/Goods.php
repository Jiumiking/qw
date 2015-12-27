<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 后台控制器
 * @category    controller
 * @author      ming.king
 * @date        2015/11/26
 */
class Goods extends MY_Controller{
    /**
     * 构造函数
     *
     * @access  public
     * @return  void
     */
    public function __construct(){
        parent::__construct();
        $this->_views['_js'][] = 'datepicker/WdatePicker';
        $this->load->model('mdl_goods');
        $this->load->model('mdl_goods_type');
        $this->load->library('upload');
        $this->_views['data_goods_type'] = $this->mdl_goods_type->my_selects();
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
            $this->_views['data_detail'] = $this->mdl_goods->detail_get( $_GET['id'] );
            $this->_views['data_size'] = $this->mdl_goods->size_get( $_GET['id'] );
            $this->_views['data_colour'] = $this->mdl_goods->colour_get( $_GET['id'] );
        }
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
    public function my_edit_do(){
        //echo '<pre>';print_r($_POST);exit;
        $id = empty($_POST['id'])?0:$_POST['id'];

        $data_goods['status'] = empty($_POST['status'])?1:$_POST['status'];
        $data_goods['type'] = empty($_POST['type'])?0:$_POST['type'];
        $data_goods['name'] = empty($_POST['name'])?'':$_POST['name'];
        $data_goods['money'] = empty($_POST['money'])?0:$_POST['money'];
        if( empty($data_goods['type']) || empty($data_goods['name']) || empty($data_goods['money']) ){
            $this->ajax_views['msg'] = '参数错误';
            $this->ajax_end();
        }

        $data_detail = empty($_POST['detail'])?0:$_POST['detail'];
        $data_size = empty($_POST['size'])?'':$_POST['size'];
        $data_colour = empty($_POST['colour'])?'':$_POST['colour'];

        if( !empty($id) ){
            $back = $this->{$this->this_model}->my_update( $id,$data_goods ); //更新
        }else{
            $data_goods['number'] = 'g'.time();
            $data_goods['date_status'] = date('Y-m-d H:i:s');
            $back = $this->{$this->this_model}->my_insert( $data_goods ); //新插入
            $id = $this->db->insert_id();
        }
        if($back){
            $this->{$this->this_model}->detail_edit( $id, $data_detail ); //保存简介
            $this->{$this->this_model}->size_edit( $id, $data_size ); //保存尺寸
            $this->{$this->this_model}->colour_edit( $id, $data_colour ); //保存颜色
            
            $this->ajax_views['sta'] = '1';
            $this->ajax_views['msg'] = '操作成功';
        }
        $this->ajax_end();
    }
    /**
     * 上架/下架ajax
     * @access  public
     * @return  void
     */
    public function status_edit(){
        if( empty($_GET['id']) || empty($_GET['status']) ){
            $this->ajax_views['msg'] = '参数错误';
            $this->ajax_end();
        }
        $data['status'] = $_GET['status'];
        $data['date_status'] = date('Y-m-d H:i:s');
        if( $this->mdl_goods->my_update( $_GET['id'], $data) ){
            $this->ajax_views['status'] = '1';
            $this->ajax_views['msg'] = '操作成功';
        }else{
            $this->ajax_views['msg'] = '操作失败';
        }
        $this->ajax_end();
    }
    /**
     * 库存ajax
     * @access  public
     * @param   mixed
     * @return  mixed
     */
    public function amount(){
        if( !empty($_GET['id']) ){
            $this->_views['id'] = $_GET['id'];
            $this->_views['data_amount'] = $this->mdl_goods->amount_get( $_GET['id'] );
            $this->_views['data_size'] = $this->mdl_goods->size_get( $_GET['id'] );
            $this->_views['data_colour'] = $this->mdl_goods->colour_get( $_GET['id'] );
            $this->ajax_views['dat'] = $this->load->view( $this->this_controller.'/'.$this->this_controller.'_amount', $this->_views, true );
            $this->ajax_views['sta'] = '1';
            $this->ajax_views['msg'] = '获取成功';
        }else{
            $this->ajax_views['msg'] = '参数错误';
        }
        $this->ajax_end();
    }
    /**
     * 库存执行ajax
     * @access  public
     * @param   mixed
     * @return  mixed
     */
    public function amount_do(){
        //echo '<pre>';print_r($_POST);exit;
        $id = empty($_POST['id'])?0:$_POST['id'];

        $data_goods['status'] = empty($_POST['status'])?1:$_POST['status'];
        $data_goods['type'] = empty($_POST['type'])?0:$_POST['type'];
        $data_goods['name'] = empty($_POST['name'])?'':$_POST['name'];
        $data_goods['money'] = empty($_POST['money'])?0:$_POST['money'];
        if( empty($data_goods['type']) || empty($data_goods['name']) || empty($data_goods['money']) ){
            $this->ajax_views['msg'] = '参数错误';
            $this->ajax_end();
        }

        $data_detail = empty($_POST['detail'])?0:$_POST['detail'];
        $data_size = empty($_POST['size'])?'':$_POST['size'];
        $data_colour = empty($_POST['colour'])?'':$_POST['colour'];

        if( !empty($id) ){
            $back = $this->{$this->this_model}->my_update( $id,$data_goods ); //更新
        }else{
            $data_goods['number'] = 'g'.time();
            $data_goods['date_status'] = date('Y-m-d H:i:s');
            $back = $this->{$this->this_model}->my_insert( $data_goods ); //新插入
            $id = $this->db->insert_id();
        }
        if($back){
            $this->{$this->this_model}->detail_edit( $id, $data_detail ); //保存简介
            $this->{$this->this_model}->size_edit( $id, $data_size ); //保存尺寸
            $this->{$this->this_model}->colour_edit( $id, $data_colour ); //保存颜色
            
            $this->ajax_views['sta'] = '1';
            $this->ajax_views['msg'] = '操作成功';
        }
        $this->ajax_end();
    }
    /**
     * 保存图片
     * @access  protected
     * @param   mixed
     * @return  mixed
     */
    protected function film_photo_save( $id, $num ){
        if( empty($id) || !isset($num) ){
            return false;
        }
        if(!empty($_FILES['photo'.(string)$num])){
            $upload_path = $this->config->item('upload_path');
            $config['upload_path'] = $upload_path.'film/'.$id.'/'.(string)$num.'/';
            if ( !file_exists( $config['upload_path'] ) ) {
                if ( !mkdir( $config['upload_path'] , 0777 , true ) || !chmod($config['upload_path'], 0777) ) {
                    return false;
                }
            }
            $config['allowed_types'] = $this->config->item('upload_pic_allowed_types');
            //$config['max_size'] = $this->config->item('upload_pic_max_size');
            //$config['max_width'] = $this->config->item('upload_pic_max_width');
            //$config['max_height'] = $this->config->item('upload_pic_max_height');
            $config['encrypt_name'] = $this->config->item('upload_pic_encrypt_name');
            $this->upload->initialize($config);
            if ( @($this->upload->do_upload('photo'.(string)$num)) ){ //保存图片
                $upload_back = $this->upload->data();
                $photo = $upload_back['file_name']; //上传后的文件名
                dele_file( $config['upload_path'],array($photo));
            }else{
                return false;
            }
            return $photo;
        }
        return false;
    }
}