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
        $data_format = array();
        if( !empty($_GET['id']) ){
            $this->_views['data'] = $this->{$this->this_model}->my_select( $_GET['id'] );
            $this->_views['data_detail'] = $this->mdl_goods->detail_get( $_GET['id'] );
            $data_format = $this->mdl_goods->amount_get( $_GET['id'] );
        }
        $this->ajax_views['data_format'] = $data_format;
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
        $data_goods['type_id'] = empty($_POST['type_id'])?0:$_POST['type_id'];
        $data_goods['name'] = empty($_POST['name'])?'':$_POST['name'];
        $data_goods['money_in'] = empty($_POST['money_in'])?0:$_POST['money_in'];
        $data_goods['money_out'] = empty($_POST['money_out'])?0:$_POST['money_out'];
        if( empty($data_goods['type_id']) || empty($data_goods['name']) || empty($data_goods['money_in']) || empty($data_goods['money_out']) ){
            $this->ajax_views['msg'] = '参数错误';
            $this->ajax_end();
        }

        $data_detail = empty($_POST['detail'])?0:$_POST['detail'];
        $data_format = empty($_POST['format_value'])?'':$_POST['format_value'];

        if( !empty($id) ){
            $back = $this->{$this->this_model}->my_update( $id,$data_goods ); //更新
        }else{
            $data_goods['goods_no'] = 'g'.time();
            $data_goods['date_status'] = date('Y-m-d H:i:s');
            $back = $this->{$this->this_model}->my_insert( $data_goods ); //新插入
            $id = $this->db->insert_id();
        }
        if($back){
            $this->{$this->this_model}->detail_edit( $id, $data_detail ); //保存简介
            $this->{$this->this_model}->amount_adds( $id, $data_format ); //保存规格，库存
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
     * 规格ajax
     * @access  public
     * @param   mixed
     * @return  mixed
     */
    public function format(){
        if( !empty($_GET['id']) ){
            $data_format_all = array();
            if( !empty($_GET['gid']) ){
                $data_format = $this->mdl_goods->amount_get( $_GET['gid'] );
                if( !empty($data_format) ){
                    foreach( $data_format as $k=>$v ){
                        for($i=1;$i<=5;$i++){
                            if($data_format[$k]['format'.$i] != 0){
                                $data_format_all[] = $data_format[$k]['format'.$i];
                            }
                        }
                    }
                }
                $data_format_all = array_unique($data_format_all);
            }
            $this->load->model('mdl_format');
            $goods_type = $this->mdl_goods_type->my_select( $_GET['id'] );
            if( !empty($goods_type) ){
                $this->ajax_views['type_format'] = array();
                $j = 0;
                for( $i=1;$i<=5;$i++ ){
                    if( !empty($goods_type['format'.$i]) ){
                        $this->_views['i'] = $i;
                        $this->_views['data'] = $this->mdl_format->my_select( $goods_type['format'.$i] );
                        $this->_views['data_value'] = $this->mdl_format->value_selects( $goods_type['format'.$i] );
                        $this->_views['data_format_all'] = $data_format_all;
                        $this->ajax_views['dat'] .= $this->load->view( 'format/format_get', $this->_views, true );
                        $this->ajax_views['type_format'][$j]['k'] = $i;
                        $this->ajax_views['type_format'][$j]['v'] = $this->_views['data']['name'];
                        $j++;
                    }
                }
                $this->ajax_views['sta'] = '1';
                $this->ajax_views['msg'] = '获取成功';
            }
        }else{
            $this->ajax_views['msg'] = '参数错误';
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