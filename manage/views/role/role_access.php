<form name="edit_form" id="edit_form" action="<?php echo site_url('role/access_do');?>" method="post" class="table_tr_h">
    <div class="fb" style="font-size:14px;">当前角色组:
        <span style="color:#5080c7; margin-left:5px;">超级管理员组</span>
    </div>

    <?php if(!empty($menu_list)){ ?>
    <?php foreach( $menu_list as $value){ ?>

    <div>
        <span><a href="javascript:void(0);" aid="<?php echo $value['menu_id'];?>" onclick="access_show(this)"><img src="<?php echo base_url('images/toggle-right.png');?>"></a></span>
        <input id="nid_<?php echo $value['menu_id'];?>" type="checkbox" name="nid[]" value="<?php echo $value['menu_id'];?>" cid="<?php echo $value['menu_id'];?>" style="margin-right:5px;" onclick="access_check(this)"
        <?php if(!empty($access_list)){ ?>
        <?php foreach( $access_list as $ac){ ?>
        <?php if($ac['node_id'] == $value['menu_id']){?>checked="checked"<?php } ?>
        <?php } ?>
        <?php } ?>
        >
        <?php echo $value['menu_name'];?>
    </div>
    <div did="<?php echo $value['menu_id'];?>" style="display:none;">

        <?php if(!empty($value['sons'])){ ?>
        <?php foreach( $value['sons'] as $v){ ?>
        <div style="padding-left:6px;">
            <span style="padding-left:10px;"><a href="javascript:void(0);" aid="<?php echo $v['menu_id'];?>" onclick="access_show(this)"><img src="<?php echo base_url('images/toggle-right.png');?>"></a></span>
            <input id="nid_<?php echo $v['menu_id'];?>" type="checkbox" name="nid[]" value="<?php echo $v['menu_id'];?>" style="margin-right:5px;" onclick="access_check(this)"
            <?php if(!empty($access_list)){ ?>
            <?php foreach( $access_list as $ac){ ?>
            <?php if($ac['node_id'] == $v['menu_id']){?>checked="checked"<?php } ?>
            <?php } ?>
            <?php } ?>
            >
            <?php echo $v['menu_name'];?>
        </div>
        <div did="<?php echo $v['menu_id'];?>" style="display:none;">
            <?php if(!empty($v['sons'])){ ?>
            <?php foreach( $v['sons'] as $vv){ ?>
            <div>
                <td style="padding-left:6px;">
                    <span style="padding-left:30px;">├─</span>
                    <input id="nid_<?php echo $vv['menu_id'];?>" type="checkbox" name="nid[]" value="<?php echo $vv['menu_id'];?>" style="margin-right:5px;" onclick="access_check(this)"
                    <?php if(!empty($access_list)){ ?>
                    <?php foreach( $access_list as $ac){ ?>
                    <?php if($ac['node_id'] == $vv['menu_id']){?>checked="checked"<?php } ?>
                    <?php } ?>
                    <?php } ?>
                    >
                    <?php echo $vv['menu_name'];?>
                </td>
            </div>
            <?php } ?>
            <?php } ?>
        </div>
        <?php } ?>
        <?php } ?>
    </div>
    <?php } ?>
    <?php } ?>
    
    <div>
        <input type="hidden" name="role_id" id="role_id" value="<?php echo empty($role_id)?'':$role_id;?>">
        <a href="javascript:void(0);" onclick="access_do()" class="btn dib vm">保存</a>
        <a href="javascript:void(0);" onclick="access_btn(1)" class="btn dib vm mr10">全部收起</a>
        <a href="javascript:void(0);" onclick="access_btn(2)" class="btn dib vm mr10">全选</a>
        <a href="javascript:void(0);" onclick="access_btn(3)" class="btn dib vm mr10">全否</a>
        <a href="javascript:void(0);" onclick="back()" class="btn dib vm">返回</a>
        <span id="m_role_id" class="error-block"></span>
    </div>
</form>
