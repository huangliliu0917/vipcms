<!--编辑栏目-->
<div class="dialog_content col_tab">
<form id="info_form" action="{:u('youhuiquan_cate/edit')}" method="post">
	<ul class="J_tabs tab_but cu_li">
		<li class="current">基本设置</li>
		
		<li>SEO设置</li>
		<li>图片</li>
	</ul>
	<div class="J_panes">
        <div class="content_list pad_10">
	<table width="100%" class="table_form">
		<!--<tr>
			<th width="100">{:L('item_cate_parent')} :</th>
			<td>
				<select class="J_cate_select mr10" data-pid="0" data-uri="{:U('youhuiquan_cate/ajax_getchilds')}" data-selected="{$info.spid}"></select>
				<input type="hidden" name="pid" id="J_cate_id" />
			</td>
		</tr>-->
		<tr>
			<th>{:L('item_cate_name')} :</th>
			<td>
				<input type="text" name="class_name" id="J_name" class="input-text" value="{$info.class_name}" style="color:{$info.fcolor}" size="20">
			</td>
		</tr>
		
		<tr>
			<th>显示 :</th>
			<td>
				<label><input type="radio" name="status" value="0" <if condition="$info.status eq 0">checked</if>> 不显示</label>&nbsp;&nbsp;
				<label><input type="radio" name="status" value="1" <if condition="$info.status eq 1">checked</if>> 显示</label>
			</td>
		</tr>
		<!--
		<tr>
			<th>优惠券 :</th>
			<td>
				<label><input type="radio" name="quan" value="0" <if condition="$info.quan eq 0">checked</if>> 显示</label>&nbsp;&nbsp;
				<label><input type="radio" name="quan" value="1" <if condition="$info.quan eq 1">checked</if>> 不显示</label>
			</td>
		</tr>

		 <tr>
			<th>排序方式 :</th>
			<td>
			<select name="sort" class="J_tbcats mr10">
			    <option value="rand()*100"  <if condition="$info.sort  eq 'rand()*100'">selected</if> >随机排序</option>
				<option value="volume desc"  <if condition="$info.sort  eq 'volume desc'">selected</if> >销量从高到低</option>
				<option value="volume asc"   <if condition="$info.sort  eq 'volume asc'">selected</if>>销量从低到高</option>
				<optgroup label="──────"></optgroup>
				<option value="coupon_price desc" <if condition="$info.sort eq 'coupon_price desc'">selected</if> >价格从高到低</option>
				<option value="coupon_price asc"  <if condition="$info.sort eq 'coupon_price asc'">selected</if> >价格从低到高</option>
				<optgroup label="──────"></optgroup>
				<option value="coupon_rate  desc" <if condition="$info.sort eq 'coupon_rate  desc'">selected</if> >折扣从高到低</option>
				<option value="coupon_rate  asc"  <if condition="$info.sort eq 'coupon_rate  asc'">selected</if> >折扣从低到高</option>
				<optgroup label="──────"></optgroup>
				<option value="id  desc"  <if condition="$info.sort eq 'id  desc'">selected</if> >按添加时间排前</option>
				<option value="id  asc"   <if condition="$info.sort eq 'id  asc'">selected</if> >按添加时间排后</option>
				<optgroup label="──────"></optgroup>
				<option value="coupon_start_time  desc"  <if condition="$info.sort eq 'coupon_start_time  desc'">selected</if> >按活动开始时间排前</option>
				<option value="coupon_start_time  asc"   <if condition="$info.sort eq 'coupon_start_time  asc'">selected</if> >按活动开始时间排后</option>
			</select>
            
			</td>
		</tr>
		<tr>
			<th>店铺类型 :</th>
			<td>
				<select name="shop_type" class="J_tbcats mr10">
					<option value=""  <if condition="$info.shop_type  eq ''">selected</if> >所有</option>
					<option value="B"   <if condition="$info.shop_type  eq 'B'">selected</if>>天猫商城</option>
					<option value="C" <if condition="$info.shop_type eq 'C'">selected</if> >淘宝集市</option>
				</select>
			</td>
		</tr>-->
	</table>
	</div>


	

	<div class="content_list pad_10 hidden">
	<table width="100%" cellpadding="2" cellspacing="1" class="table_form">
		<tr>
			<th width="100">{:L('seo_title')} :</th>
			<td><input type="text" name="seo_title" class="input-text" value="{$info.seo_title}" style="width:300px;"></td>
		</tr>
		<tr>
			<th>{:L('seo_keys')} :</th>
			<td><input type="text" name="seo_keys" class="input-text" value="{$info.seo_keys}" style="width:300px;"></td>
		</tr>
		<tr>
			<th>{:L('seo_desc')} :</th>
			<td><textarea name="seo_desc" style="width:295px; height:50px;">{$info.seo_desc}</textarea></td>
		</tr>
	</table>
	</div>
	<div class="content_list pad_10 hidden">
	<table width="100%" cellpadding="2" cellspacing="1" class="table_form">
		<tr>		
			<td><input type="text" name="cateimg" id="J_cate_img" class="input-text fl mr10" style="width:250px" value="{$info.cateimg}"></td>
            <td><div id="J_cate_upload_img" class="upload_btn"><span>{:L('upload')}</span></div></td>
			<td><img src="{$info.cateimg}" id="show_cate_J_img" style="height:35px;"/><span class="attachment_icon J_attachment_icon" file-type="image" ></span>
		</td>
		</tr>
	</table>
	</div>
        </div>
	<input type="hidden" name="id" value="{$info.id}" />
</form>
</div>
<script>
var check_name_url = "{:U('youhuiquan_cate/ajax_check_name', array('id'=>$info['id']))}";
$(function(){
    $('ul.J_tabs').tabs('div.J_panes > div');
	$.formValidator.initConfig({formid:"info_form",autotip:true});
	$("#J_name").formValidator({onshow:lang.please_input+lang.item_cate_name,onfocus:lang.please_input+lang.item_cate_name}).inputValidator({min:1,onerror:lang.please_input+lang.item_cate_name}).defaultPassed();
	
	$('#info_form').ajaxForm({success:complate,dataType:'json'});
	function complate(result){
		if(result.status == 1){
			$.dialog.get(result.dialog).close();
			$.ftxia.tip({content:result.msg});
			window.location.reload();
		}else{
			$.ftxia.tip({content:result.msg, icon:'alert'});
		}
	}
	$('.J_cate_select').cate_select();
	
});
</script>
<script src="__STATIC__/js/fileuploader.js"></script>
<script type="text/javascript">
$(function(){
    var upload = new qq.FileUploaderBasic({
    	allowedExtensions: ['jpg','gif','png'],
        button: document.getElementById('J_cate_upload_img'),
        multiple: false,
        action: "{:U('youhuiquan_cate/ajax_upload')}",
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
        	$('#J_cate_upload_img').addClass('btn_disabled').find('span').text(lang.uploading);
        },
        onComplete: function(id, fileName, result){
        	$('#J_cate_upload_img').removeClass('btn_disabled').find('span').text(lang.upload);
		if(result.status == '1'){
            		$('#show_cate_J_img').attr('src','/'+result.data);
        		$('#J_cate_img').val('/'+result.data);
        	}else{
        		$.ftxia.tip({content:result.msg, icon:'error'});
        	}
        }
    });
    
});
</script>