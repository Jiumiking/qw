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
        $this->_views['_js'][] = 'datepicker/WdatePicker';
        $this->load->model('mdl_tag');
        $this->load->library('upload');
        $this->_views['data_tag_1'] = $this->mdl_tag->my_selects( 0, 0, array('type'=>'1') );
        $this->_views['data_tag_2'] = $this->mdl_tag->my_selects( 0, 0, array('type'=>'2') );
        $this->_views['data_tag_3'] = $this->mdl_tag->my_selects( 0, 0, array('type'=>'3') );
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
        $this->_views['data_tag_link'] = $this->mdl_tag->tag_link_get( $_GET['id'] );
        $this->_views['data_content'] = $this->{$this->this_model}->content_get( $_GET['id'] );
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