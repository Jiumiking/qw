<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 后台控制器
 * @category    controller
 * @author      ming.king
 * @date        2015/11/26
 */
class Worker extends MY_Controller{
    /**
     * 构造函数
     *
     * @access  public
     * @return  void
     */
    public function __construct(){
        parent::__construct();
        $this->_views['_js'][] = 'datepicker/WdatePicker';
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
        }
        $this->load->model('mdl_tag');
        $this->_views['data_tag_2'] = $this->mdl_tag->my_selects( 0, 0, array('type'=>'2') );
        $this->_views['data_content'] = $this->{$this->this_model}->content_get( $_GET['id'] );
        $this->ajax_views['data'] = $this->load->view( $this->this_controller.'/'.$this->this_controller.'_edit', $this->_views, true );
        $this->ajax_views['status'] = '1';
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
        //echo '<pre>';print_r($_POST);exit;
        $content = $data['content'];
        unset($data['content']);
        if( !empty($data['id']) ){
            $data['date_edit'] = date('Ymd');
            $back = $this->{$this->this_model}->my_update( $data['id'],$data );
            $id = $data['id'];
        }else{
            $data['date_add'] = date('Ymd');
            $back = $this->{$this->this_model}->my_insert( $data );
            $id = $this->db->insert_id();
        }
        if($back){
            $this->{$this->this_model}->content_edit( $id, $content );
            if(!empty($_FILES['photo'])){
                $upload_path = $this->config->item('upload_path');
                $config['upload_path'] = $upload_path.'worker/'.$id.'/';
                if ( !file_exists( $config['upload_path'] ) ) {
                    if ( !mkdir( $config['upload_path'] , 0777 , true ) || !chmod($config['upload_path'], 0777) ) {
                        $this->ajax_views['msg'] = '创建目录失败';
                        $this->ajax_end();
                    }
                }
                $config['allowed_types'] = $this->config->item('upload_pic_allowed_types');
                $config['max_size'] = $this->config->item('upload_pic_max_size');
                $config['max_width'] = $this->config->item('upload_pic_max_width');
                $config['max_height'] = $this->config->item('upload_pic_max_height');
                $config['encrypt_name'] = $this->config->item('upload_pic_encrypt_name');
                $this->load->library('upload', $config);
                if ( @($this->upload->do_upload('photo')) ){
                    $upload_back = $this->upload->data();
                    $photo = $upload_back['file_name']; //上传后的文件名
                    dele_file( $config['upload_path'],array($photo));
                }else{
                    $this->ajax_views['msg'] = '上传失败';
                    $this->ajax_end();
                }
                if( !empty($photo) ){
                    $this->{$this->this_model}->my_update( $id,array('photo'=>$photo) );
                }
            }
            $this->ajax_views['status'] = '1';
            $this->ajax_views['msg'] = '操作成功';
        }
        $this->ajax_end();
    }
}