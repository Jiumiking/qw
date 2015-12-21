<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**定时器**/
class Timer extends CI_Controller {

    /**
     * 构造函数
     *
     * @access  public
     * @return  void
     */
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->model('mdl_timer');
    }
    /**
     * 默认入口
     *
     * @access  public
     * @return  void
     */	
    public function index(){
        $project_end_3 = $this->mdl_timer->get_projects( array('status'=>' = 1','end_time'=>' < '.strtotime(date('Ymd',time())),'funds_now'=>' > 0') ); //到期成功的项目
//        $project_end_3 = $this->mdl_timer->get_projects( array('status'=>' = 1','end_time'=>' < '.strtotime(date('Ymd',time())),'funds_now'=>' >= funds_target') ); //到期成功的项目
//        $project_end_4 = $this->mdl_timer->get_projects( array('status'=>' = 1','end_time'=>' < '.strtotime(date('Ymd',time())),'funds_now'=>' < funds_target') ); //到期失败的项目
        $project_su = $this->mdl_timer->get_projects( array('status'=>' = 3','end_time'=>' < '.(strtotime(date('Ymd',time()))-5*24*3600)) ); //大众评审时间结束的项目

        /**筹款阶段结束 筹款成功 begin**/
        if( !empty($project_end_3) ){
            foreach($project_end_3 as $key=>$value){
                $user_ids = $this->mdl_timer->get_funds(3,0,array('o.project_id'=>$value['project_id'],'o.is_supervise'=>1,'o.status'=>1));
                if(!empty($user_ids)){
                    foreach($user_ids as $kk=>$vv){
                        $this->mdl_timer->supervise_add(array('project_id'=>$value['project_id'], 'user_id'=>$vv['user_id'], 'funds'=>$vv['funds'])); //插入大众监督表
                    }
                }
                $this->mdl_timer->project_update($value['project_id'], array('status'=>'3')); //状态更新到大众监督阶段
            }
        }
        /**筹款阶段结束 筹款成功 end**/

        /**筹款阶段结束 筹款失败 begin**/
//        if( !empty($project_end_4) ){
//            foreach($project_end_4 as $key=>$value){
//                $this->mdl_timer->project_update($value['project_id'], array('status'=>'4')); //状态更新到到期失败阶段
//            }
//        }
        /**筹款阶段结束 筹款失败 end**/

        /**大众监督结束 begin**/
        if( !empty($project_su) ){
            foreach($project_su as $key=>$value){
                $supervises = $this->mdl_timer->get_supervises($value['project_id']); //大众评审
                if( !empty($supervises) ){
                    $true = 0;
                    $false = 0;
                    foreach( $supervises as $kk=>$vv ){
                        if( $vv['status'] == '2' ){
                            $false++;
                        }else{
                            $true++;
                        }
                    }
                    $status = ($true >= $false)?'5':'6';
                    $this->mdl_timer->project_update($value['project_id'], array('status'=>$status)); //状态更新到大众监督阶段
                }
            }
        }
        /**大众监督结束 end**/
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */