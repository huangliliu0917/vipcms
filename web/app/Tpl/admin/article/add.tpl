<include file="public:header" />
<!--添加文章-->
<script src="__STATIC__/js/fileuploader.js"></script>
<form id="info_form" action="{:U('article/add')}" method="post" enctype="multipart/form-data">
<div class="pad_lr_10">
	<div class="col_tab">
		<ul class="J_tabs tab_but cu_li">
			<li class="current">{:L('article_basic')}</li>
			<li>{:L('article_seo')}</li>
		</ul>
		<div class="J_panes">
			<div class="content_list pad_10">
				<table width="100%" cellspacing="0" class="table_form">
					<tr>
						<th width="120">{:L('article_cateid')} :</th>
						<td><select class="J_cate_select mr10" data-pid="0" data-uri="{:U('article_cate/ajax_getchilds')}" data-selected=""></select><input type="hidden" name="cate_id" id="J_cate_id" value="" /></td>
					</tr>
		            <tr>
						<th>{:L('article_title')} :</th>
						<td>
		                    <input type="text" name="title" id="J_title" class="input-text iColorPicker" size="60" value="" >
		                    
		                </td>
					</tr>
					 <tr>
						<th>文章标签 :</th>
						<td>
							<input type="text" name="tags" id="J_tags" class="input-text" size="50">
                            <input type="button" value="点击获取" id="J_gettags" name="tags_btn" class="btn">
		                </td>
					</tr>
			   <tr>
				<th>缩略图 :</th>
				<td><img id="J_pic_url_img"  width="100" ><br />
					<input type="text" name="mpic" id="J_pic_url" class="input-text" size="50" value="">
					<div id="J_upload_img" class="upload_btn"><span>上传</span></div>
					<span>&nbsp;&nbsp;请上传大于280*280的正方形图片</span>
				</td>
 			</tr>
 
		            <tr>
						<th>{:L('author')} :</th>
						<td><input type="text" name="author" id="author" class="input-text" size="20" value="{$author}"></td>
					</tr>
	 
					
		            <tr>
						<th>详细内容 :</th>	

		                <td><script name="info" id="info" type="text/plain" style="width:100%;height:400px"></script></td>
					</tr>
					<tr>
						<th>{:L('publish')} :</th>
		 				<td>
		                	<label><input type="radio" name="status" class="radio_style" value="1"> {:L('yes')} </label>&nbsp;&nbsp;
							<label><input type="radio" name="status" class="radio_style" value="0" checked="checked"> {:L('no')}</label>
						</td>
					</tr>
				</table>
			</div>
			<div class="content_list pad_10 hidden">
				<table width="100%" cellspacing="0" class="table_form">
					<tr>
						<th width="120">{:L('seo_title')} :</th>
		 				<td><input type="text" name="seo_title" id="seo_title" class="input-text" size="60"></td>
					</tr>
					<tr>
						<th>{:L('seo_keys')} :</th>
						<td><input type="text" name="seo_keys" id="seo_keys" class="input-text" size="60"></td>
					</tr>
					<tr>
						<th>{:L('seo_desc')} :</th>
						<td><textarea name="seo_desc" id="seo_desc" cols="80" rows="8"></textarea></td>
					</tr>
				</table>
			</div>
        </div>
		<div class="mt10"><input type="submit" value="{:L('submit')}" id="dosubmit" name="dosubmit" class="smt mr10" style="margin:0 0 10px 100px;"><br /><br /><br /></div>
	</div>
</div>
</form>
<include file="public:footer" />
<script src="__STATIC__/js/jquery/plugins/colorpicker.js"></script>
<script charset="utf-8" src="__STATIC__/js/ueditor/ueditor.config.js"></script>
<script charset="utf-8" src="__STATIC__/js/ueditor/ueditor.all.js"></script>
<script type="text/javascript">
	
$('.J_cate_select').cate_select('请选择');
var ue = UE.getEditor('info');  
$(function() {
	
//上传图片
    var img_uploader = new qq.FileUploaderBasic({
        allowedExtensions: ['jpg','gif','jpeg','png','bmp','pdg'],
        button: document.getElementById('J_upload_img'),
        multiple: false,
        action: "{:U('admin/article/ajax_upload_img')}",
        inputName: 'img',
        forceMultipart: true, //用$_FILES
        messages: {
            typeError: lang.upload_type_error,
            sizeError: lang.upload_size_error,
            minSizeError: lang.upload_minsize_error,
            emptyError: lang.upload_empty_error,
            noFilesError: lang.upload_nofile_error,
            onLeave: lang.upload_onLeave
        },
        showMessage: function(message){
			
            $.ftxia.tip({content:message, icon:'error'});
        },
        onSubmit: function(id, fileName){
            $('#J_upload_img').addClass('btn_disabled').find('span').text(lang.uploading);
        },
        onComplete: function(id, fileName, result){
           // $('#J_pic_url').removeClass('btn_disabled').find('span').text(lang.upload);
            if(result.status == '1'){
                $('#J_pic_url').val("/data/upload/article/"+result.data);
				$('#J_pic_url_img').attr('src',"/data/upload/article/"+result.data);
            } else {
                $.ftxia.tip({content:result.msg, icon:'error'});
            }
        }
    });

	
	    var extimg_uploader = new qq.FileUploaderBasic({
        allowedExtensions: ['jpg','gif','jpeg','png','bmp','pdg'],
        button: document.getElementById('J_upload_extimg'),
        multiple: false,
        action: "{:U('admin/article/ajax_upload_img')}",
        inputName: 'extimg',
        forceMultipart: true, //用$_FILES
        messages: {
            typeError: lang.upload_type_error,
            sizeError: lang.upload_size_error,
            minSizeError: lang.upload_minsize_error,
            emptyError: lang.upload_empty_error,
            noFilesError: lang.upload_nofile_error,
            onLeave: lang.upload_onLeave
        },
        showMessage: function(message){
			
            $.ftxia.tip({content:message, icon:'error'});
        },
        onSubmit: function(id, fileName){
            $('#J_upload_extimg').addClass('btn_disabled').find('span').text(lang.uploading);
        },
        onComplete: function(id, fileName, result){
            $('#J_upload_extimg').removeClass('btn_disabled').find('span').text(lang.upload);
            if(result.status == '1'){
                $('#J_extimg').val(result.data);
            } else {
                $.ftxia.tip({content:result.msg, icon:'error'});
            }
        }
    });
	$('ul.J_tabs').tabs('div.J_panes > div');

	//颜色选择器
	$('.J_color_picker').colorpicker();
    
	//自动获取标签	
	$('#J_gettags').live('click', function() {
		var title = $.trim($('#J_title').val());
		if(title == ''){
			$.ftxia.tip({content:lang.article_title_isempty, icon:'alert'});
			return false;
		}
		$.getJSON('{:U("article/ajax_gettags")}', {title:title}, function(result){
			if(result.status == 1){
				$('#J_tags').val(result.data);				
			}else{
				$.ftxia.tip({content:result.msg});
			}
		});
	});	
});

</script>
</body>
</html>