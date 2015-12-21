<script type="text/javascript">
//分页
var pagelist = new PageList("<?php echo site_url($this_controller.'/my_page');?>",<?php echo empty($this_setting['page_number'])?10:$this_setting['page_number'];?>);
pagelist.pageCount = <?php echo $pages['page_count']?>;
pagelist.pageCallback = function(data){
    data = eval("("+ data +")");
    $("#list_content").html(data.list_content);
    $("#pg_page").val(data.page);
    $("#pg_page_count").html(data.page_count);
    $("#pg_count").html(data.count);
    pagelist.pageCount = data.page_count;
}
//新增、编辑
function edit( id ){
    $.ajax({
        type : "GET",
        async : false,
        url : "<?php echo site_url($this_controller.'/my_edit');?>",
        data : { id:id },
        success : function(msg){
            if(msg){
                var msgobj = eval("("+ msg +")");
                if(msgobj.sta == '1'){
                    $('#div_show').html(msgobj.dat);
                    $('#div_show').show();
                    $('#div_content').hide();
                }else{
                    alert(msgobj.msg);
                }
            }
        }
    });
}
//新增、编辑 执行
function edit_do(){
    $('#edit_form').ajaxSubmit({
        beforeSubmit: function(){
            var back = edit_authen();
            if(back){
                $("#edit_submit_button").attr('disabled','disabled');
            }
            return back;
        },
        success: function (msg) {
            if(msg){
                var msgobj = eval("("+ msg +")");
                //alert(msgobj.msg);
                pagelist.loadPage();
                back();
            }
        }
    });
}
//删除
function del( id ){
    if( confirm('确认删除?') ){
        $.ajax({
            type : "GET",
            async : false,
            url : "<?php echo site_url($this_controller.'/my_del');?>",
            data : { id:id },
            success : function(msg){
                if(msg){
                    var msgobj = eval("("+ msg +")");
                    //alert(msgobj.msg);
                    pagelist.loadPage();
                    back();
                }
            }
        });
    }
}
function photo_del( id ){
    if( id != '' ){
        $("#"+id+"_show").css('display','none');
        $("[name='"+id+"']").val('');
    }
}
function edit_authen(){
    return true;
}
</script>