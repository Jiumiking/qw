<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CI后台model
 * @category    model
 * @author      ming.king
 * @date        2015/11/26
 */
class Mdl_worker extends MY_Model{
    /**
     * 构造函数
     *
     * @return  void
     */
    public function __construct(){
        parent::__construct();
        $this->my_select_field = 'id,name_ch,name_en,name_other,director,screenwriter,moviemaker,actor,sex,constellation,birthday,birthplace,place,imdb,photo,date_add,date_edit';
        $this->my_table = 'worker';
    }
    /**
     * 内容更新
     * @access  public
     * @param   mixed
     * @return  mixed
     */
    public function content_get( $id ){
        if( empty($id) ){
            return false;
        }
        $sql = "
            SELECT
                id,worker_id,content
            FROM
                {$this->db->dbprefix('worker_content')}
            WHERE
                worker_id = '$id'
        ";
        $query = $this->db->query($sql);
        $data = $query->row_array();
        return $data;
    }
    /**
     * 内容更新
     * @access  public
     * @param   mixed
     * @return  mixed
     */
    public function content_edit( $id, $content ){
        if( empty($id) || empty($content) ){
            return false;
        }
        $content_data = $this->content_get( $id );
        if( $content_data ){
            return $this->db->update( 'worker_content', array('content'=>$content), array('worker_id' => $id) );
        }else{
            return $this->db->insert( 'worker_content', array( 'worker_id'=>$id, 'content'=>$content ) );
        }
    }
}