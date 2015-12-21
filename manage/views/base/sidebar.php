<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="sidebar">
    <div class="sidebar_list" id="sidebar_list_id">
        <?php if(!empty($bread['menus_23'])){ ?>
        <?php foreach( $bread['menus_23'] as $key=>$value ){ ?>
            <div class="bar">
                <h3 class=""><?php echo $value['menu_name'];?></h3>
                <ul>
                    <?php if( !empty($value['sons']) ){ ?>
                    <?php foreach( $value['sons'] as $k=>$v ){ ?>
                    <li><a href="<?php echo site_url($v['controller'].'/'.$v['method'].'?t='.time());?>" <?php if( !empty($bread['m_s_3']) && $bread['m_s_3'] == $v['menu_id'] ){ ?>class="sidebar_a sidebar_select" <?php }else{ ?> 
                    class="sidebar_a" <?php } ?>><?php echo $v['menu_name'];?></a></li>
                    <?php } ?>
                    <?php } ?>
                </ul>
           </div>
        <?php } ?>
        <?php } ?>
     </div>
</div>