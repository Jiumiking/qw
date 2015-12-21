<form name="edit_form" id="edit_form" action="<?php echo site_url($this_controller.'/my_edit_do');?>" method="post">
    <table class="table_info">
        <tr>
            <th>电影/电视剧：</th>
            <td>
                <input name="type" id="type_1" type="radio" class="cp" value="1" <?php if( empty($data['type']) || $data['type'] == '1' ){ ?> checked="checked" <?php } ?>"><label class="cp" for="type_1">电影</label>&nbsp;&nbsp;&nbsp;&nbsp;
                <input name="type" id="type_2" type="radio" class="cp" value="2" <?php if( !empty($data['type']) && $data['type'] == '2' ){ ?> checked="checked" <?php } ?>"><label class="cp" for="type_2">电视剧</label>
            </td>
        </tr>
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
            <th>个性描述：</th>
            <td><input name="name_mark" id="name_mark" value="<?php echo empty($data['name_mark'])?'':$data['name_mark']; ?>"><span id="m_name_mark" class="error-block"></span></td>
        </tr>
        <tr>
            <th>类型：</th>
            <td>
                <?php if( !empty($data_tag_1) ){ ?>
                <?php foreach($data_tag_1 as $key=>$value){ ?>
                <input type="checkbox" name="tag1[]" id="tag1_<?php echo $value['id']?>" class="cp" value="<?php echo $value['id']?>"
                <?php if( !empty($data_tag_link) ){ ?>
                <?php foreach($data_tag_link as $v){ ?>
                <?php if( $v['tag_id'] == $value['id'] ){ ?> checked="checked" <?php break;} ?> 
                <?php } ?>
                <?php } ?>
                >
                <label class="cp" for="tag1_<?php echo $value['id']?>"><?php echo $value['name'];?></label>&nbsp;&nbsp;&nbsp;&nbsp;<?php if( ($key+1)%10 == 0 ){echo '<br>';}?>
                <?php } ?>
                <?php } ?>
                <span id="m_tag1" class="error-block"></span>
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
            <th>年代：</th>
            <td>
                <select name="year" id="year">
                    <option value="">请选择</option>
                    <?php if( !empty($data_tag_3) ){ ?>
                    <?php foreach($data_tag_3 as $value){ ?>
                    <option value="<?php echo $value['id'];?>" <?php if( !empty($data['year']) && $data['year'] == $value['id'] ){ ?> selected="selected" <?php } ?> ><?php echo $value['name'];?></option>
                    <?php } ?>
                    <?php } ?>
                </select>
                <span id="m_year" class="error-block"></span>
            </td>
        </tr>
        <tr>
            <th>语言：</th>
            <td>
                <select name="language" id="language">
                    <option value="">请选择</option>
                    <option value="英语" <?php if( !empty($data['language']) && $data['language'] == '英语' ){ ?> selected="selected" <?php } ?> >英语</option>
                    <option value="中文" <?php if( !empty($data['language']) && $data['language'] == '中文' ){ ?> selected="selected" <?php } ?> >中文</option>
                    <option value="粤语" <?php if( !empty($data['language']) && $data['language'] == '粤语' ){ ?> selected="selected" <?php } ?> >粤语</option>
                    <option value="日语" <?php if( !empty($data['language']) && $data['language'] == '日语' ){ ?> selected="selected" <?php } ?> >日语</option>
                    <option value="韩语" <?php if( !empty($data['language']) && $data['language'] == '韩语' ){ ?> selected="selected" <?php } ?> >韩语</option>
                    <option value="法语" <?php if( !empty($data['language']) && $data['language'] == '法语' ){ ?> selected="selected" <?php } ?> >法语</option>
                    <option value="德语" <?php if( !empty($data['language']) && $data['language'] == '德语' ){ ?> selected="selected" <?php } ?> >德语</option>
                    <option value="其他" <?php if( !empty($data['language']) && $data['language'] == '其他' ){ ?> selected="selected" <?php } ?> >其他</option>
                </select>
                <span id="m_language" class="error-block"></span>
            </td>
        </tr>
        <tr>
            <th>上映日期：</th>
            <td>
                <input type="text" name="day" id="day" value="<?php echo empty($data['day'])?'':$data['day']; ?>"  onfocus="WdatePicker({dateFmt:'yyyy-MM-dd',alwaysUseStartDate:true})">
                <span id="m_day" class="error-block"></span>
            </td>
        </tr>
        <tr>
            <th>国内上映日期：</th>
            <td>
                <input type="text" name="day_ch" id="day_ch" value="<?php echo empty($data['day_ch'])?'':$data['day_ch']; ?>"  onfocus="WdatePicker({dateFmt:'yyyy-MM-dd',alwaysUseStartDate:true})">
                <span id="m_day_ch" class="error-block"></span>
            </td>
        </tr>
        <tr>
            <th>IMDB编号：</th>
            <td><input name="imdb" id="imdb" value="<?php echo empty($data['imdb'])?'':$data['imdb']; ?>"><span id="m_imdb" class="error-block"></span></td>
        </tr>
        <tr>
            <th>IMDB评分：</th>
            <td><input name="imdb_score" id="imdb_score" value="<?php echo empty($data['imdb_score'])?'':$data['imdb_score']; ?>"><span id="m_imdb_score" class="error-block"></span></td>
        </tr>
        <tr>
            <th>豆瓣编号：</th>
            <td><input name="douban" id="douban" value="<?php echo empty($data['douban'])?'':$data['douban']; ?>"><span id="m_douban" class="error-block"></span></td>
        </tr>
        <tr>
            <th>豆瓣评分：</th>
            <td><input name="douban_score" id="douban_score" value="<?php echo empty($data['douban_score'])?'':$data['douban_score']; ?>"><span id="m_douban_score" class="error-block"></span></td>
        </tr>
        <tr>
            <th>标题图片：</th>
            <td>
                <img id="photo0_show" src="<?php echo empty($data['photo0'])?'':$this->config->item('front_url').'uploads/film/'.$data['id'].'/0/'.$data['photo0']; ?>">
                <?php if(!empty($data['photo0'])){?><a href="javascript:void(0);" onclick="photo_del('photo0')"><img src="<?php echo base_url('images/icon_delete.png');?>" title="删除"></a><?php } ?>
                <br>
                <input type="file" name="photo0" id="photo0" >
                <input type="hidden" name="photo0" value="<?php echo empty($data['photo0'])?'':$data['photo0']; ?>" >
            </td>
        </tr>
        <tr>
            <th>展示图片：</th>
            <td>
                <p class="mb10"><img id="photo1_show" src="<?php echo empty($data['photo1'])?'':$this->config->item('front_url').'uploads/film/'.$data['id'].'/1/'.$data['photo1']; ?>">
                <?php if(!empty($data['photo1'])){?><a href="javascript:void(0);" onclick="photo_del('photo1')"><img src="<?php echo base_url('images/icon_delete.png');?>" title="删除"></a><?php } ?>
                <br>
                <input type="file" name="photo1" id="photo1" ></p>
                <input type="hidden" name="photo1" value="<?php echo empty($data['photo1'])?'':$data['photo1']; ?>" >

                <p class="mb10"><img id="photo2_show" src="<?php echo empty($data['photo2'])?'':$this->config->item('front_url').'uploads/film/'.$data['id'].'/2/'.$data['photo2']; ?>">
                <?php if(!empty($data['photo2'])){?><a href="javascript:void(0);" onclick="photo_del('photo2')"><img src="<?php echo base_url('images/icon_delete.png');?>" title="删除"></a><?php } ?>
                <br>
                <input type="file" name="photo2" id="photo2" ></p>
                <input type="hidden" name="photo2" value="<?php echo empty($data['photo2'])?'':$data['photo2']; ?>" >

                <p class="mb10"><img id="photo3_show" src="<?php echo empty($data['photo3'])?'':$this->config->item('front_url').'uploads/film/'.$data['id'].'/3/'.$data['photo3']; ?>">
                <?php if(!empty($data['photo3'])){?><a href="javascript:void(0);" onclick="photo_del('photo3')"><img src="<?php echo base_url('images/icon_delete.png');?>" title="删除"></a><?php } ?>
                <br>
                <input type="file" name="photo3" id="photo3" ></p>
                <input type="hidden" name="photo3" value="<?php echo empty($data['photo3'])?'':$data['photo3']; ?>" >

                <p class="mb10"><img id="photo4_show" src="<?php echo empty($data['photo4'])?'':$this->config->item('front_url').'uploads/film/'.$data['id'].'/4/'.$data['photo4']; ?>">
                <?php if(!empty($data['photo4'])){?><a href="javascript:void(0);" onclick="photo_del('photo4')"><img src="<?php echo base_url('images/icon_delete.png');?>" title="删除"></a><?php } ?>
                <br>
                <input type="file" name="photo4" id="photo4" ></p>
                <input type="hidden" name="photo4" value="<?php echo empty($data['photo4'])?'':$data['photo4']; ?>" >
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