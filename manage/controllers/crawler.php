<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 后台控制器
 * @category    controller
 * @author      ming.king
 * @date        2015/11/26
 */
class crawler extends MY_Controller{
    private $jd_data = array();
    private $jd_data_crawler = array();
    private $url_list_base = "http://list.jd.com/list.html?cat=";
    /**
     * 构造函数
     *
     * @access  public
     * @return  void
     */
    public function __construct(){
        parent::__construct();
        require_once("class.snoopy.php");
        ini_set('max_execution_time',0);
    }
    public function crawler_jd(){
        $this->mdl_crawler->my_table_set( 'jd_goods' );
        $this->mdl_crawler->my_select_field_set( 'id,goods_id,price' );
        $data = $this->mdl_crawler->my_selects();
        $jd_data = array();
        if( !empty($data) ){
            foreach( $data as $key=>$value ){
                $jd_data[$value['goods_id']] = $value;
            }
        }
        $this->jd_data = $jd_data;

        //$url = "http://list.jd.com/list.html?cat=9987,653,655";
        //$link_item = $this->jd_list($url);echo '<pre>';
        //echo '爬取结束';exit;
        //$data = $this->jd_data( $link_item );
        //echo count($this->jd_data).'|';echo count($data);
        //echo '<pre>';print_r($this->jd_data);exit;


        $url = "http://www.jd.com/allSort.aspx";
        $list_id = $this->jd_list_id($url);
        if( !empty($list_id) ){
            foreach( $list_id as $key=>$value ){
                error_log(date('Y-m-d H:i:s').'_分类id('.$value.'):begin'."\n",3,'E:/workspace/jd_log.txt');
                $url_list = $this->url_list_base.$value;
                $this->jd_list($url_list);
                error_log(date('Y-m-d H:i:s').'_分类id('.$value.'):end'."\n",3,'E:/workspace/jd_log.txt');
            }
        }
        error_log(date('Y-m-d H:i:s').'_all end'."\n",3,'E:/workspace/jd_log.txt');
        echo 'end';exit;
    }
    //爬取所有分类
    public function jd_list_id( $url ){
        $snoopy = new Snoopy();
        $snoopy->fetchlinks($url);
        $link_all = $snoopy->results;
        if( !empty($link_all) ){
            foreach( $link_all as $key=>$value ){
                $link_decode = urldecode($value);
                $link_info = parse_url( $link_decode );
                if( $link_info['host'] == 'list.jd.com' ){
                    if( preg_match( "'cat=([\d,]*)'i", $value, $result ) ){
                        if(  !empty($result[1]) ){
                            $list_id[] = $result[1];
                        }
                    }
                    //$link_list[] = $link_decode;
                }
            }
            if( !empty($list_id) ){
                return array_unique($list_id);
            }
        }
        return array();
    }
    //爬取分类下的所有商品
    public function jd_list( $url ){
        $snoopy = new Snoopy();
        $snoopy->fetchlinks($url);
        $link_all = $snoopy->results;
        if( !empty($link_all) ){
            $page_max = 1;
            foreach( $link_all as $key=>$value ){
                $link_decode = urldecode($value);
                if( preg_match( "'page=(\d*)'i", $link_decode, $result ) ){
                    if(  !empty($result[1]) && $result[1] > $page_max ){
                        $page_max = $result[1];
                    }
                }
            }
        }
        $link_items = array();
        for( $i=1; $i<=$page_max; $i++ ){
            $url_page = $url.'&page='.$i;
            $link_item = $this->jd_item( $url_page );
            error_log(date('Y-m-d H:i:s').'_页数('.$i.'):over'."\n",3,'E:/workspace/jd_log.txt');
            //if( !empty($link_item) ){
            //    $link_items = array_merge($link_items,$link_item);
            //}
        }
        return true;
        //return array_unique($link_items);
    }
    //爬取页面下的所有商品
    public function jd_item( $url ){
        $snoopy = new Snoopy();
        $snoopy->fetchlinks($url);
        $link_all = $snoopy->results;
        if( !empty($link_all) ){
            foreach( $link_all as $key=>$value ){
                $link_decode = urldecode($value);
                $link_info = parse_url( $link_decode );
                if( $link_info['host'] == 'item.jd.com' && empty($link_info['fragment']) ){
                    $link_item[] = $link_decode;
                }
            }
            if( !empty($link_item) ){
                $link_item = array_unique($link_item);
                $data = $this->jd_data( $link_item );
                if( !empty($data) ){
                    $this->jd_inserts($data);
                }
                return true;
            }
        }
        return array();
    }
    public function jd_data( $link_item ){
        $data = array();
        if( !empty($link_item) ){
            foreach( $link_item as $key=>$value ){
                if( preg_match( "'item.jd.com/(\d*)'i", $value, $result ) ){
                    if(  !empty($result[1]) ){
                        $id = $result[1];
                        if( !empty($id) && in_array($id,$this->jd_data_crawler) ){//检查此id是否已经爬过
                            continue;
                        }
                        $price = $this->jd_price($id);
                        $name = $this->jd_name($value);
                        if( !empty($id) && !empty($price) && !empty($name) ){
                            $this->jd_data_crawler[] = $id;//爬过的id
                            if( !empty($this->jd_data[$id]) ){
                                if( $this->jd_data[$id]['price'] != $price ){
                                    $this->mdl_crawler->my_update( $this->jd_data[$id]['id'], array('price'=>$price) );//更新
                                    $this->mdl_crawler->jd_price_insert( array('goods_id'=>$id, 'price'=>$price) );//插入价格变动表
                                }
                            }else{
                                $data[$key]['goods_id'] = $id;
                                $data[$key]['price'] = $price;
                                $data[$key]['name'] = $name;
                            }
                        }
                    }
                }
            }
        }
        return $data;
    }
    public function jd_name( $url ){
        $doc = new DOMDocument;
        @$doc->loadHTMLFile($url);
        $name = @$doc->getElementById('name')->nodeValue;
        if( !empty($name) ){
            return trim($name);
        }else{
            return false;
        }
    }
    public function jd_price( $id ){
        $price_url = 'http://p.3.cn/prices/mgets?skuIds=J_'.$id.'&type=1';
        $result = curl_get($price_url);
        $result_decode = json_decode($result,true);
        if( !empty($result_decode[0]['p']) && $result_decode[0]['p'] != '-1.00' ){
            return $result_decode[0]['p'];
        }else{
            return 0;
        }
    }
    public function jd_inserts( $data ){
        if( !empty($data) ){
            $this->mdl_crawler->my_inserts($data);
            echo 1;
            return true;
        }
    }
}