<?php if (!defined('THINK_PATH')) exit();?>	<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>网站后台系统管理</title>

		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="/yoga/Public/assets/css/bootstrap.css" />
		<link rel="stylesheet" href="/yoga/Public/assets/css/font-awesome.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="/yoga/Public/assets/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="/yoga/Public/assets/css/ace-part2.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="/yoga/Public/assets/css/ace-ie.css" />
		<![endif]-->

		<!-- inline styles related to this page -->
        <link rel="stylesheet" href="/yoga/Public/assets/css/slackck.css" />
		<!-- ace settings handler -->
		<script src="/yoga/Public/assets/js/ace-extra.js"></script>
		<script src="/yoga/Public/assets/js/jquery.min.js"></script>
		<script src="/yoga/Public/assets/js/jquery.form.js"></script>
		<script src="/yoga/Public/layer/layer.js"></script>
		<!--<script src="/yoga/Public/assets/js/jquery.leanModal.min.js"></script>-->

		<!--[if lte IE 8]>
		<script src="/yoga/Public/assets/js/html5shiv.js"></script>
		<script src="/yoga/Public/assets/js/respond.js"></script>
		<![endif]-->
	</head>

	<body class="no-skin">
		<!-- #section:basics/navbar.layout -->
		<div id="navbar" class="navbar navbar-default    navbar-collapse">
			<div class="navbar-container" id="navbar-container">
				<!-- /section:basics/sidebar.mobile.toggle -->
				<div class="navbar-header pull-left">
					<!-- #section:basics/navbar.layout.brand -->
					<a href="<?php echo U('Index/index');?>" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							生活的艺术-瑜伽后台管理系统
						</small>
					</a>

				</div>

				<!-- #section:basics/navbar.dropdown -->
				<div class="navbar-buttons navbar-header pull-right  collapse navbar-collapse" role="navigation">
					<ul class="nav ace-nav">
					<li class="transparent"></li>
					<li class="transparent">
						<a style="cursor:pointer;" id="cache" class="dropdown-toggle">清除缓存</a>
					</li>

						<!-- #section:basics/navbar.user_menu -->
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="/yoga/Public/assets/avatars/user.jpg" alt="Jason's Photo" />
								<span class="user-info">
									<small>Welcome,</small>
									<?php echo ($_SESSION['admin_username']); ?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="#">
										<i class="ace-icon fa fa-cog"></i>
										个人设置
									</a>
								</li>

								<li>
									<a href="profile.html">
										<i class="ace-icon fa fa-user"></i>
										会员中心
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="javascript:;"  id="logout">
										<i class="ace-icon fa fa-power-off"></i>
										注销
									</a>
								</li>
							</ul>
						</li>

						<!-- /section:basics/navbar.user_menu -->
					</ul>
				</div>

				<!-- /section:basics/navbar.dropdown -->
			</div><!-- /.navbar-container -->
		</div>


<script type="text/javascript">
$(document).ready(function(){
	$("#logout").click(function(){
		layer.confirm('你确定要退出吗？', {icon: 3}, function(index){
	    layer.close(index);
	    window.location.href="<?php echo U('Login/logout');?>";
	});
	});
});



$(function(){
$('#cache').click(function(){
if(confirm("确认要清除缓存？")){
var $type=$('#type').val();
var $mess=$('#mess');
$.post('/yoga/Admin/News/clear',{type:$type},function(data){
alert("缓存清理成功");
});
}else{
return false;
}
});
});
</script>



		<!-- /section:basics/navbar.layout -->
		<div class="main-container" id="main-container">

			<!-- #section:basics/sidebar -->

				<div id="sidebar" class="sidebar responsive">

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success">
							<i class="ace-icon fa fa-signal"></i>
						</button>

						<button class="btn btn-info">
							<i class="ace-icon fa fa-pencil"></i>
						</button>

						<!-- #section:basics/sidebar.layout.shortcuts -->
						<button class="btn btn-warning">
							<i class="ace-icon fa fa-users"></i>
						</button>

						<button class="btn btn-danger">
							<i class="ace-icon fa fa-cogs"></i>
						</button>

						<!-- /section:basics/sidebar.layout.shortcuts -->
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">
<?php use Common\Controller\AuthController; use Think\Auth; $m = M('auth_rule'); $field = 'id,name,title,css'; $data = $m->field($field)->where('pid=0 AND status=1')->order('sort')->select(); $auth = new Auth(); foreach ($data as $k=>$v){ if(!$auth->check($v['name'], $_SESSION['aid']) && $_SESSION['aid'] != 1){ unset($data[$k]); } } ?>

<?php if(is_array($data)): foreach($data as $key=>$v): ?><li class="<?php if(CONTROLLER_NAME == $v['name']): ?>active open<?php endif; ?>"><!--open代表打开状态-->
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa <?php echo ($v["css"]); ?>"></i>
							<span class="menu-text">
								<?php echo ($v["title"]); ?>
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
    <?php $m = M('auth_rule'); $dataa = $m->where(array('pid'=>$v['id'],'status'=>1))->select(); foreach ($dataa as $kk=>$vv){ if(!$auth->check($vv['name'], $_SESSION['aid']) && $_SESSION['aid'] != 1){ unset($dataa[$kk]); } } ?>
    <?php if(is_array($dataa)): foreach($dataa as $key=>$j): ?><li class="<?php if(($_SESSION['se'] == $j['id'])): ?>active<?php endif; ?>">
								<a href="<?php echo U($j['name'],array('se'=>$j['id']));?>">
									<i class="menu-icon fa fa-caret-right"></i>
									<?php echo ($j["title"]); ?>
								</a>
								<b class="arrow"></b>
							</li><?php endforeach; endif; ?>
						</ul>
					</li><?php endforeach; endif; ?>
                    
				</ul><!-- /.nav-list -->

				<!-- #section:basics/sidebar.layout.minimize -->
				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>

				<!-- /section:basics/sidebar.layout.minimize -->
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
				</script>
			</div>




			<!-- /section:basics/sidebar -->
			<div class="main-content">
				<div class="main-content-inner">
					<div class="page-content">



                        <!--主题-->
						<div class="page-header">
							<h1>
								您当前操作
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									修改活动报名表
								</small>
							</h1>
						</div>

<script type="text/javascript" src="/yoga/Public/assets/js/region.js"></script>
						<div class="row">
							<div class="col-xs-12">
								<form class="form-horizontal" name="form0" id="form0"  method="post" action="<?php echo U('active_register_runedit');?>"  enctype="multipart/form-data">


									<div class="space-4"></div>

                                	<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 姓名：  </label>
										<div class="col-sm-10">
									<input type="hidden" name="ad_id" value="<?php echo ($ac_re["ar_activeid"]); ?>"/>

										<input type="hidden" name="ar_id" value="<?php echo ($ac_re["ar_id"]); ?>"/>
											<input type="text" name="name" id="name"  placeholder=""  class="col-xs-10 col-sm-1" value="<?php echo ($ac_re["ar_name"]); ?>"/>

                                            <span class="help-inline col-xs-12 col-sm-7">
												<span class="middle" id="resone"></span>
											</span>
										</div>
									</div>
                                    <div class="space-4"></div>
                                    <div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 联系方式：  </label>
										<div class="col-sm-10">
											<input type="text" name="tel" id="tel"  placeholder=""  class="col-xs-10 col-sm-3" value="<?php echo ($ac_re["ar_tel"]); ?>" />

                                            <span class="help-inline col-xs-12 col-sm-7">
												<span class="middle" id="resone"></span>
											</span>
										</div>
									</div>
                                    <div class="space-4"></div>
                                    <div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 出生日期：  </label>
										<div class="col-sm-10">
											<input type="text" name="birthday" id="birthday"  placeholder="2016-05-30"  class="col-xs-10 col-sm-2" value="<?php echo ($ac_re["ar_birthday"]); ?>" />

                                            <span class="help-inline col-xs-12 col-sm-7">
												<span class="middle" id="resone"></span>
											</span>
										</div>
									</div>
                                    <div class="space-4"></div>


									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 性别：  </label>
										<div class="col-sm-10">
											 <select name="sex"  class="knows_type">
												<option value="1" selected>男</option>
												<option value="0" <?php if($ac_re['ar_sex'] == 0): ?>selected<?php endif; ?>>女</option>
											 </select>


	 									</div>
									</div>

                                    <div class="space-4"></div>
                                    <div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 是否参加过生活艺术的其他课程：  </label>
										<div class="col-sm-10">
											<input type="text" name="more" id="more"  placeholder="若无参加则为空"  class="col-xs-10 col-sm-2" value="<?php echo ($ac_re["ar_more"]); ?>"/>

                                            <span class="help-inline col-xs-12 col-sm-7">
												<span class="middle" id="resone"></span>
											</span>
										</div>
									</div>

                                    <div class="space-4"></div>
                                    <div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 邮箱：  </label>
										<div class="col-sm-10">
											<input type="text" name="email" id="email"  placeholder="例：972270516@qq.com"  class="col-xs-10 col-sm-2" value="<?php echo ($ac_re["ar_email"]); ?>" />

                                            <span class="help-inline col-xs-12 col-sm-7">
												<span class="middle" id="resone"></span>
											</span>
										</div>
									</div>
                                    <div class="space-4"></div>
                                    <div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 备注：  </label>
										<div class="col-sm-10">
											<textarea name="say" class="col-xs-10 col-sm-2" value="<?php echo ($ac_re["ar_say"]); ?>" ></textarea>

                                            <span class="help-inline col-xs-12 col-sm-7">
												<span class="middle" id="resone"></span>
											</span>
										</div>
									</div>
                                    <div class="space-4"></div>












    <link href="/yoga/Public/ppy/css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
    <script src="/yoga/Public/ppy/js/fileinput.js" type="text/javascript"></script>
    <script src="/yoga/Public/ppy/js/fileinput_locale_zh.js" type="text/javascript"></script>









									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 是否直接通过审核： </label>
										<div class="col-sm-10" style="padding-top:5px;">
                                            <input name="open" id="open" value="1" class="ace ace-switch ace-switch-4 btn-flat" type="checkbox" <?php if($ac_re['ar_open'] == 1): ?>checked<?php endif; ?> />
											<span class="lbl">&nbsp;&nbsp;注意：活动报名需要开启用户才能看到发布信息</span>
										</div>
									</div>

                                     <div class="space-4"></div>

									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<button class="btn btn-info" type="submit">
												<i class="ace-icon fa fa-check bigger-110"></i>
												保存
											</button>

											&nbsp; &nbsp; &nbsp;
											<button class="btn" type="reset">
												<i class="ace-icon fa fa-undo bigger-110"></i>
												重置
											</button>
											&nbsp; &nbsp; &nbsp;
											<a class="btn" href="#" onclick="javascript:history.back(-1);"><i class="ace-icon fa fa-undo bigger-110"></i>取消</a>
										</div>
									</div>
								</form>
                        	</div>
                        </div>
									<div class="hr hr-24"></div>

<div class="breadcrumbs breadcrumbs-fixed" id="breadcrumbs">
	<div class="row">
		<div class="col-xs-12">
			<div class="">
				<div id="sidebar2" class="sidebar h-sidebar navbar-collapse collapse collapse_btn">
					<ul class="nav nav-list header-nav" id="header-nav">
                                        
    <?php $m = M('auth_rule'); $dataaa = $m->where(array('pid'=>$_SESSION['se'],'menustatus'=>1))->order('sort')->select(); foreach ($dataaa as $kkk=>$vvv){ if(!$auth->check($vvv['name'], $_SESSION['aid']) && $_SESSION['aid']!= 1){ unset($dataaa[$kkk]); } } ?>
    <?php if(is_array($dataaa)): foreach($dataaa as $key=>$k): ?><li>
												<a href="<?php echo U(''.$k['name'].'');?>">
													<o class="font12 <?php if((CONTROLLER_NAME.'/'.ACTION_NAME == $k['name'])): ?>rigbg<?php endif; ?>"><?php echo ($k["title"]); ?></o>
												</a>

								<b class="arrow"></b>
							</li><?php endforeach; endif; ?>
					</ul><!-- /.nav-list -->
				</div><!-- .sidebar -->
			</div>
		</div><!-- /.col -->
	</div><!-- /.row -->
	
</div>

					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

				<div class="footer">
				<div class="footer-inner">
					<!-- #section:basics/footer -->
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">生活的艺术-瑜伽</span>
							后台管理系统 &copy; 2015-2016
						</span>
					</div>

					<!-- /section:basics/footer -->
				</div>
			</div>


		<!-- basic scripts -->


<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='../assets/js/jquery1x.js'>"+"<"+"/script>");
</script>
<![endif]-->

		<script src="/yoga/Public/assets/js/bootstrap.js"></script>
		<script src="/yoga/Public/assets/js/maxlength.js"></script>
		<script src="/yoga/Public/assets/js/ace/ace.js"></script>
		<script src="/yoga/Public/assets/js/ace/ace.sidebar.js"></script>


		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
			   $('#sidebar2').insertBefore('.page-content');

			   $('.navbar-toggle[data-target="#sidebar2"]').insertAfter('#menu-toggler');


			   $(document).on('settings.ace.two_menu', function(e, event_name, event_val) {
				 if(event_name == 'sidebar_fixed') {
					 if( $('#sidebar').hasClass('sidebar-fixed') ) {
						$('#sidebar2').addClass('sidebar-fixed');
						$('#navbar').addClass('h-navbar');
					 }
					 else {
						$('#sidebar2').removeClass('sidebar-fixed')
						$('#navbar').removeClass('h-navbar');
					 }
				 }
			   }).triggerHandler('settings.ace.two_menu', ['sidebar_fixed' ,$('#sidebar').hasClass('sidebar-fixed')]);
			})
		</script>


		</div><!-- /.main-container -->

	</body>
</html>
<script>
function backpic(picurl){
	$("#img0").attr("src",picurl);//还原修改前的图片
	$("input[name='file0']").val("");//清空文本框的值
}

$(document).ready(function(){

//多图设置
  $("#pic_list").hide();
  $("#news_pic_list").click(function(){
  	$("#pic_list").hide();
  });
  $("#news_pic_qqlist").click(function(){
  	$("#pic_list").show();
  });

  $("#pptaddress").hide();
  $("#news_flag_vaj").click(function(){
    $("#pptaddress").toggle(500);
  });
});


$(function(){
	$('#form0').ajaxForm({
		beforeSubmit: checkForm, // 此方法主要是提交前执行的方法，根据需要设置
		success: complete, // 这是提交后的方法
		dataType: 'json'
	});

	function checkForm(){


		if( '' == $.trim($('#name').val())){
			layer.alert('姓名不能为空', {icon: 6}, function(index){
 			layer.close(index);
			$('#name').focus();
			});
			return false;
		}
		if( '' == $.trim($('#tel').val())){
			layer.alert('联系方式不能为空', {icon: 6}, function(index){
 			layer.close(index);
			$('#tel').focus();
			});
			return false;
		}
		if( '' == $.trim($('#email').val())){
			layer.alert('邮箱不能为空', {icon: 6}, function(index){
 			layer.close(index);
			$('#email').focus();
			});
			return false;
		}
		if( '' == $.trim($('#birthday').val())){
			layer.alert('出生日期不能为空', {icon: 6}, function(index){
 			layer.close(index);
			$('#birthday').focus();
			});
			return false;
		}





 }
	function complete(data){
		if(data.status==1){
			layer.alert(data.info, {icon: 6}, function(index){
 			layer.close(index);
			window.location.href=data.url;
			});
		}else{
			layer.alert(data.info, {icon: 6}, function(index){
 			layer.close(index);

			});
		}
	}

});

$("#file0").change(function(){
	var objUrl = getObjectURL(this.files[0]) ;
	console.log("objUrl = "+objUrl) ;
	if (objUrl) {
		$("#img0").attr("src", objUrl) ;
	}
}) ;
//建立一個可存取到該file的url
function getObjectURL(file) {
	var url = null ;
	if (window.createObjectURL!=undefined) { // basic
	$("#news_flag_vap").attr("checked", true);
		url = window.createObjectURL(file) ;
	} else if (window.URL!=undefined) { // mozilla(firefox)
	$("#news_flag_vap").attr("checked", true);
		url = window.URL.createObjectURL(file) ;
	} else if (window.webkitURL!=undefined) { // webkit or chrome
		$("#news_flag_vap").attr("checked", true);
		url = window.webkitURL.createObjectURL(file) ;
	}
	return url ;
}


</script>