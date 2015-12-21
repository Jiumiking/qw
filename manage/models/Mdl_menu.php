<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CI后台菜单model
 *
 * @package     CI
 * @subpackage  core
 * @category    core
 * @author      jinjunming
 * @link        
 */
class Mdl_menu extends CI_Model{
    /**
     * 构造函数
     *
     * @access  public
     * @return  void
     */
    public function __construct(){
        parent::__construct();	
    }
    public function get_menus($filter=array()){
        $filter_string = '';
        if(!empty($filter)){
            foreach( $filter as $key=>$value ){
                $filter_string = " AND $key='$value' ";
            }
        }
        $sql = "
            SELECT
                menu_id,menu_name,controller,method,parent_id,deep,weights
            FROM
                {$this->db->dbprefix('menu')}
            WHERE
                status = 1
                AND admin = 1
                $filter_string
            ORDER BY
                weights DESC,
                menu_id ASC
        ";
        $query = $this->db->query($sql);
        $menu_info = $query->result_array();
        return $menu_info;
    }
    /**
     * 获取导航面包屑
     *
     * @access  public
     * @param   mixed
     * @return  object
     */
    public function get_bread($role_id){
        $return = array(
                'm_s_1'=>'0',
                'm_s_3'=>'0',
                'menus_23'=>array(),
                'bread'=>array()
            );
        $controller = $this->uri->segment(1, 0);
        $method = ($this->uri->segment(2, 0) == '')?'index':($this->uri->segment(2, 0));
        if( empty($controller) ){
            return $return;
        }
        $menus_all = $this->get_menus();
        if( !empty($role_id) && $role_id != '1' ){
            $this->load->model('mdl_role');
            $access_list = $this->mdl_role->access_get( $role_id );
            $menus = array();
            if( !empty( $access_list ) ){
                foreach( $access_list as $k => $v ){
                    foreach( $menus_all as $kk => $vv ){
                        if( $vv['menu_id'] == $v['node_id'] ){
                            $menus[] = $vv;
                        }
                    }
                }
            }
        }else{
            $menus = $menus_all;
        }
        if( !empty($menus) ){
            foreach( $menus as $key=>$value ){
                if( $value['controller'] == $controller && $value['method'] == $method && $value['deep'] == '3' ){
                    $menu_3 = $value;
                    break;
                }
            }
            if( !empty($menu_3) ){
                $return['m_s_3'] = $menu_3['menu_id'];
                $return['bread'][3] = $menu_3['menu_name'];
                if( !empty($menu_3['parent_id']) ){
                    foreach( $menus as $key=>$value ){
                        if( $value['menu_id'] == $menu_3['parent_id'] ){
                            $menu_2 = $value;
                            break;
                        }
                    }
                }
            }
            if( !empty($menu_2) ){
                $return['bread'][2] = $menu_2['menu_name'];
                if( !empty($menu_2['parent_id']) ){
                    foreach( $menus as $key=>$value ){
                        if( $value['menu_id'] == $menu_2['parent_id'] ){
                            $menu_1 = $value;
                            break;
                        }
                    }
                }
            }
            if( !empty($menu_1) ){
                $return['m_s_1'] = $menu_1['menu_id'];
                $return['bread'][1] = $menu_1['menu_name'];
                foreach( $menus as $key=>$value ){
                    if( $value['parent_id'] == $menu_1['menu_id'] && $value['deep'] == '2' ){
                        $return['menus_23'][] = $value;
                    }
                }
                if( !empty($return['menus_23']) ){
                    foreach( $return['menus_23'] as $k=>$v ){
                        foreach( $menus as $kk=>$vv ){
                            if( $vv['parent_id'] == $v['menu_id'] && $vv['deep'] == '3' ){
                                $return['menus_23'][$k]['sons'][] = $vv;
                            }
                        }
                    }
                }
            }
            ksort($return['bread']);
        }
        
        //echo '<pre>';print_r($menus);exit;
        return $return;
    }
    /**
     * 获取一个目录
     *
     * @access  public
     * @param   mixed
     * @return  object
     */
    public function get_menu($filter){
        if(!empty($filter)){
            $filter_string = '';
            foreach( $filter as $key=>$value ){
                $filter_string .= " AND $key='$value' ";
            }
        }else{
            return array();
        }
        $sql = "
            SELECT
                menu_id,menu_name,controller,method,parent_id,deep
            FROM
                {$this->db->dbprefix('menu')}
            WHERE
                status = 1
                AND admin = 1
                $filter_string
        ";
        $query = $this->db->query($sql);
        $menu_info = $query->row_array();
        return $menu_info;
    }
    /**
     * 获取导航面包屑
     *
     * @access  public
     * @param   mixed
     * @return  object
     */
    public function get_menus_list(){
        $menus = $this->get_menus();
        $menu_list = array();
        if( !empty($menus) ){
            foreach( $menus as $k=>$v ){
                if( $v['deep'] == '1' ){
                    $menu_list[] = $v;
                }
            }
        }
        if( !empty($menu_list) ){
            foreach( $menu_list as $k=>$v ){
                foreach( $menus as $kk=>$vv ){
                    if( $v['menu_id'] == $vv['parent_id'] ){
                        $menu_list[$k]['sons'][] = $vv;
                    }
                }
            }
            foreach( $menu_list as $k=>$v ){
                if( !empty($v['sons']) ){
                    foreach( $v['sons'] as $kk=>$vv ){
                        foreach( $menus as $kkk=>$vvv ){
                            if( $vv['menu_id'] == $vvv['parent_id'] ){
                                $menu_list[$k]['sons'][$kk]['sons'][] = $vvv;
                            }
                        }
                    }
                }
            }
        }
        return $menu_list;
    }
}