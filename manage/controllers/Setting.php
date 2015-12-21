<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 后台设置控制器
 *
 * @package     CI
 * @subpackage  Controllers
 * @category    Controllers
 * @author      jinjunming
 * @link        
 */
class Setting extends MY_Controller{
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
     * 基础设置
     *
     * @access  public
     * @return  void
     */
    public function setting_base(){
        $this->_views['_js'][] = 'authen';
        $this->_views['_js'][] = 'ajaxfileupload';
        $this->load->view('setting/setting_base',$this->_views);
    }
    /**
     * 会员卡设置
     *
     * @access  public
     * @return  void
     */
    public function setting_card(){
        $this->_views['_js'][] = 'authen';
        $this->_views['_js'][] = 'ajaxfileupload';
        $this->load->view('setting/setting_card',$this->_views);
    }

    /**
     * ajax 更新设置
     *
     * @access  public
     * @return  void
     */
    public function setting_update(){
        if( empty($_GET['s_key']) || !isset($_GET['s_value']) ){
            $this->ajax_views['msg'] = '参数不能为空';
        }else{
            if( $this->mdl_setting->setting_update($_GET['s_key'],$_GET['s_value']) ){
                $return['status'] = 1;
            }
        }
        $this->ajax_end();
    }
    /**
     * 上传logo
     *
     * @access  public
     * @return  void
     */
    public function logo_update(){
        $data = array();
        if(!empty($_FILES['logo'])){
            $upload_path = $this->config->item('upload_path');
            $config['upload_path'] = $upload_path.'logo/';
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
            if ( @($this->upload->do_upload('logo')) ){
                $upload_back = $this->upload->data();
                $data['img'] = $upload_back['file_name']; //上传后的文件名
                //dele_file( $config['upload_path'],array($data['head_img']));
            }else{
                $this->ajax_views['msg'] = '上传失败';
                $this->ajax_end();
            }
        }
        if( $this->mdl_setting->setting_update( 'logo_name',$data['img']) ){
            $this->ajax_views['msg'] = '保存成功';
            $this->ajax_views['img'] = $data['img'];
            $this->ajax_views['sta'] = '1';
        }else{
            $this->ajax_views['msg'] = '保存失败';
        }
        $this->ajax_end();
    }
}