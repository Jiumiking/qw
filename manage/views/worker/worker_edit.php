<form name="edit_form" id="edit_form" action="<?php echo site_url($this_controller.'/my_edit_do');?>" method="post">
    <table class="table_info">
        <tr>
            <th>中文名称：</th>
            <td><input name="name_ch" id="name_ch" value="<?php echo empty($data['name_ch'])?'':$data['name_ch']; ?>"><span id="m_name_ch" class="error-block"></span></td>
        </tr>
        <tr>
            <th>英文名称：</th>
            <td><input name="name_en" id="name_en" value="<?php echo empty($data['name_en'])?'':$data['name_en']; ?>"><span id="m_name_en" class="error-block"></span></td>
        </tr>
        <tr>
            <th>其他名称：</th>
            <td><input name="name_other" id="name_other" value="<?php echo empty($data['name_other'])?'':$data['name_other']; ?>"><span id="m_name_other" class="error-block"></span></td>
        </tr>
        <tr>
            <th>职业：</th>
            <td>
                <input type="checkbox" name="director" id="director" class="cp" value="1" <?php if( !empty($data['director']) && $data['director'] == '1' ){ ?> checked="checked" <?php } ?> ><label class="cp" for="director">导演
                </label>&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="checkbox" name="screenwriter" id="screenwriter" class="cp" value="1" <?php if( !empty($data['screenwriter']) && $data['screenwriter'] == '1' ){ ?> checked="checked" <?php } ?>><label class="cp" 
                for="screenwriter">编剧</label>&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="checkbox" name="moviemaker" id="moviemaker" class="cp" value="1" <?php if( !empty($data['moviemaker']) && $data['moviemaker'] == '1' ){ ?> checked="checked" <?php } ?>><label class="cp" for="moviemaker">制片人
                </label>&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="checkbox" name="actor" id="actor" class="cp" value="1" <?php if( !empty($data['actor']) && $data['actor'] == '1' ){ ?> checked="checked" <?php } ?>><label class="cp" for="actor">演员
                </label>&nbsp;&nbsp;&nbsp;&nbsp;
            </td>
        </tr>
        <tr>
            <th>性别：</th>
            <td>
                <input name="sex" id="sex_1" type="radio" class="cp" value="1" <?php if( empty($data['sex']) || $data['sex'] == '1' ){ ?> checked="checked" <?php } ?>"><label class="cp" for="sex_1">男</label>&nbsp;&nbsp;&nbsp;&nbsp;
                <input name="sex" id="sex_2" type="radio" class="cp" value="2" <?php if( !empty($data['sex']) && $data['sex'] == '2' ){ ?> checked="checked" <?php } ?>"><label class="cp" for="sex_2">女</label>
            </td>
        </tr>
        <tr>
            <th>地区：</th>
            <td>
                <select name="place" id="place">
                    <option value="">请选择</option>
                    <?php if( !empty($data_tag_2) ){ ?>
                    <?php foreach($data_tag_2 as $value){ ?>
                    <option value="<?php echo $value['id'];?>" <?php if( !empty($data['place']) && $data['place'] == $value['id'] ){ ?> selected="selected" <?php } ?> ><?php echo $value['name'];?></option>
                    <?php } ?>
                    <?php } ?>
                </select>
                <span id="m_place" class="error-block"></span>
            </td>
        </tr>
        <tr>
            <th>出生地：</th>
            <td><input name="birthplace" id="birthplace" value="<?php echo empty($data['birthplace'])?'':$data['birthplace']; ?>"><span id="m_birthplace" class="error-block"></span></td>
        </tr>
        <tr>
            <th>出生日期：</th>
            <td>
                <input type="text" name="birthday" id="birthday" value="<?php echo empty($data['birthday'])?'':$data['birthday']; ?>"  onfocus="WdatePicker({dateFmt:'yyyy-MM-dd',alwaysUseStartDate:true})">
                <span id="m_birthday" class="error-block"></span>
            </td>
        </tr>
        <tr>
            <th>星座：</th>
            <td>
                <select name="constellation" id="constellation">
                    <option value="">请选择</option>
                    <option value="白羊座" <?php if( !empty($data['constellation']) && $data['constellation'] == '白羊座' ){ ?> selected="selected" <?php } ?> >白羊座(03月21日--04月19日)</option>
                    <option value="金牛座" <?php if( !empty($data['constellation']) && $data['constellation'] == '金牛座' ){ ?> selected="selected" <?php } ?> >金牛座(04月20日--05月20日)</option>
                    <option value="双子座" <?php if( !empty($data['constellation']) && $data['constellation'] == '双子座' ){ ?> selected="selected" <?php } ?> >双子座(05月21日--06月21日)</option>
                    <option value="巨蟹座" <?php if( !empty($data['constellation']) && $data['constellation'] == '巨蟹座' ){ ?> selected="selected" <?php } ?> >巨蟹座(06月22日--07月22日)</option>
                    <option value="狮子座" <?php if( !empty($data['constellation']) && $data['constellation'] == '狮子座' ){ ?> selected="selected" <?php } ?> >狮子座(07月23日--08月22日)</option>
                    <option value="处女座" <?php if( !empty($data['constellation']) && $data['constellation'] == '处女座' ){ ?> selected="selected" <?php } ?> >处女座(08月23日--09月22日)</option>
                    <option value="天秤座" <?php if( !empty($data['constellation']) && $data['constellation'] == '天秤座' ){ ?> selected="selected" <?php } ?> >天秤座(09月23日--10月23日)</option>
                    <option value="天蝎座" <?php if( !empty($data['constellation']) && $data['constellation'] == '天蝎座' ){ ?> selected="selected" <?php } ?> >天蝎座(10月24日--11月21日)</option>
                    <option value="射手座" <?php if( !empty($data['constellation']) && $data['constellation'] == '射手座' ){ ?> selected="selected" <?php } ?> >射手座(11月22日--12月21日)</option>
                    <option value="摩羯座" <?php if( !empty($data['constellation']) && $data['constellation'] == '摩羯座' ){ ?> selected="selected" <?php } ?> >摩羯座(12月22日--01月19日)</option>
                    <option value="水瓶座" <?php if( !empty($data['constellation']) && $data['constellation'] == '水瓶座' ){ ?> selected="selected" <?php } ?> >水瓶座(01月20日--02月18日)</option>
                    <option value="双鱼座" <?php if( !empty($data['constellation']) && $data['constellation'] == '双鱼座' ){ ?> selected="selected" <?php } ?> >双鱼座(02月19日--03月20日)</option>
                </select>
                <span id="m_constellation" class="error-block"></span>
            </td>
        </tr>
        <tr>
            <th>IMDB编号：</th>
            <td><input name="imdb" id="imdb" value="<?php echo empty($data['imdb'])?'':$data['imdb']; ?>"><span id="m_imdb" class="error-block"></span></td>
        </tr>
        <tr>
            <th>图片：</th>
            <td>
                <img id="photo_show" src="<?php echo empty($data['photo'])?'':$this->config->item('front_url').'uploads/worker/'.$data['id'].'/'.$data['photo']; ?>">
                <?php if(!empty($data['photo'])){?><a href="javascript:void(0);" onclick="photo_del('photo')"><img src="<?php echo base_url('images/icon_delete.png');?>" title="删除"></a><?php } ?>
                <br>
                <input type="file" name="photo" id="photo" >
                <input type="hidden" name="photo" value="<?php echo empty($data['photo'])?'':$data['photo']; ?>" >
            </td>
        </tr>
        <tr>
            <th>简介：</th>
            <td>
                <textarea type="text" name="content" id="content" cols="80" rows="15" onpropertychange="if(value.length>1000) value=value.substr(0,1000)"><?php echo empty($data_content['content'])?'':$data_content['content']; ?></textarea>
                <span id="m_content" class="error-block"></span>
            </td>
        </tr>

        <tr>
            <th></th>
            <td>
                <input type="button" class="formbtn" name="submit" id="edit_submit_button" value="提交" onclick="edit_do()">
                <input type="button" class="formbtn" name="submit" value="返回" onclick="back()">
                <input type="hidden" name="id" value="<?php echo empty($data['id'])?'':$data['id']; ?>">
            </td>
        </tr>
    </table>
</form>