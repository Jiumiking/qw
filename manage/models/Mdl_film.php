<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CI后台model
 * @category    model
 * @author      ming.king
 * @date        2015/11/26
 */
class Mdl_film extends MY_Model{
    /**
     * 构造函数
     *
     * @return  void
     */
    public function __construct(){
        parent::__construct();
        $this->my_select_field = 'id,type,name_ch,name_en,name_other,name_mark,day_ch,day,place,year,language,imdb,imdb_score,douban,douban_score,photo0,photo1,photo2,photo3,photo4,date_add,date_edit,status';
        $this->my_table = 'film';
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
                id,film_id,content
            FROM
                {$this->db->dbprefix('film_content')}
            WHERE
                film_id = '$id'
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
        if( empty($id) ){
            return false;
        }
        $content_data = $this->content_get( $id );
        if( $content_data ){
            return $this->db->update( 'film_content', array('content'=>$content), array('film_id' => $id) );
        }else{
            return $this->db->insert( 'film_content', array( 'film_id'=>$id, 'content'=>$content ) );
        }
    }
}