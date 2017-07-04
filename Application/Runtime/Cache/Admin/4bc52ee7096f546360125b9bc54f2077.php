<?php if (!defined('THINK_PATH')) exit();?>	<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>网站后台系统管理</title>

		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="/slackck/Public/assets/css/bootstrap.css" />
		<link rel="stylesheet" href="/slackck/Public/assets/css/font-awesome.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="/slackck/Public/assets/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="/slackck/Public/assets/css/ace-part2.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="/slackck/Public/assets/css/ace-ie.css" />
		<![endif]-->

		<!-- inline styles related to this page -->
        <link rel="stylesheet" href="/slackck/Public/assets/css/slackck.css" />
		<!-- ace settings handler -->
		<script src="/slackck/Public/assets/js/ace-extra.js"></script>
		<script src="/slackck/Public/assets/js/jquery.min.js"></script>
		<script src="/slackck/Public/assets/js/jquery.form.js"></script>
		<script src="/slackck/Public/layer/layer.js"></script>
		<!--<script src="/slackck/Public/assets/js/jquery.leanModal.min.js"></script>-->

		<!--[if lte IE 8]>
		<script src="/slackck/Public/assets/js/html5shiv.js"></script>
		<script src="/slackck/Public/assets/js/respond.js"></script>
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
							Slakck System
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
								<img class="nav-user-photo" src="/slackck/Public/assets/avatars/user.jpg" alt="Jason's Photo" />
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
$.post('/slackck/index.php/Admin/Sys/clear',{type:$type},function(data){
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
									添加系统管理员
								</small>
							</h1>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<form class="form-horizontal" name="admin_list_add" id="admin_list_add" method="post" action="/slackck/index.php/Admin/Sys/admin_list_runadd">
                                	<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 所属用户组： </label>
										<div class="col-sm-10">
                                        <select name="group_id"  class="col-sm-4" >
                                        <option value="">请选择所属用户组</option>
                                        <?php if(is_array($auth_group)): foreach($auth_group as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["title"]); ?></option><?php endforeach; endif; ?>
                                        </select>
                                        </div>
									</div>
									<div class="space-4"></div>
																		
									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 登录用户名：  </label>
										<div class="col-sm-10">
											<input type="text" name="admin_username" id="admin_username" placeholder="输入登录用户名" class="col-xs-10 col-sm-4" />
											<span class="lbl">&nbsp;&nbsp;<span class="red">*</span>用户名必须是以字母开头，数字、符号组合</span>
										</div>
									</div>
                                    <div class="space-4"></div>
																		
									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 登录密码：  </label>
										<div class="col-sm-10">
											<input type="text" name="admin_pwd" id="admin_pwd" placeholder="输入登录密码" class="col-xs-10 col-sm-4" />
											<span class="lbl">&nbsp;&nbsp;<span class="red">*</span>密码必须大于6位，小于15位</span>
										</div>
									</div>
                                    <div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 用户邮箱：  </label>
										<div class="col-sm-10">
											<input type="text" name="admin_email" id="admin_email" placeholder="输入用户邮箱" class="col-xs-10 col-sm-4" />
											<span class="lbl">&nbsp;&nbsp;<span class="red">*</span>用于密码找回，请认真填写</span>
										</div>
									</div>
                                    <div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 手机号码：  </label>
										<div class="col-sm-10">
											<input type="text" name="admin_tel" id="admin_tel" placeholder="输入手机号码" class="col-xs-10 col-sm-4" />
											<span class="lbl">&nbsp;&nbsp;<span class="red">*</span>只能填写数字</span>
										</div>
									</div>
                                    <div class="space-4"></div>
									
									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 通用网名：  </label>
										<div class="col-sm-10">
											<input type="text" name="admin_realname" id="admin_realname" placeholder="输入通用网名" class="col-xs-10 col-sm-4" />
											<span class="lbl">&nbsp;&nbsp;<span class="red">*</span>用于发布信息所有人，且在前端显示</span>
										</div>
									</div>
                                    <div class="space-4"></div>
									
									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 是否审核： </label>
										<div class="col-sm-10" style="padding-top:5px;">
                                            <input name="admin_open" id="admin_open" value="1" class="ace ace-switch ace-switch-4 btn-flat" type="checkbox" />
											<span class="lbl">&nbsp;&nbsp;默认关闭</span>
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
							<span class="blue bolder">slackck</span>
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

		<script src="/slackck/Public/assets/js/bootstrap.js"></script>
		<script src="/slackck/Public/assets/js/maxlength.js"></script>
		<script src="/slackck/Public/assets/js/ace/ace.js"></script>
		<script src="/slackck/Public/assets/js/ace/ace.sidebar.js"></script>


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

    		<!--下拉样式以及JS-->
		<link rel="stylesheet" href="/slackck/Public/assets/css/chosen.css" />
		<script src="/slackck/Public/assets/js/chosen.jquery.js"></script>
		<script type="text/javascript">
			jQuery(function($) {
				if(!ace.vars['touch']) {
					$('.chosen-select').chosen({allow_single_deselect:true}); 
					$(window)
					.off('resize.chosen')
					.on('resize.chosen', function() {
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					}).trigger('resize.chosen');
			
				}
			});
		</script>
<script>
$(function(){
	$('#admin_list_add').ajaxForm({
		beforeSubmit: checkForm, // 此方法主要是提交前执行的方法，根据需要设置
		success: complete, // 这是提交后的方法
		dataType: 'json'
	});
	
	function checkForm(){
		if( '' == $.trim($('#admin_username').val())){
			layer.alert('登录用户名不能为空', {icon: 6}, function(index){
 			layer.close(index);
			$('#admin_username').focus(); 
			});
			return false;
		}
		
		var admin_username = $.trim($('input[name="admin_username"]').val()); //获取INPUT值
		var myReg = /^[\u4e00-\u9fa5]+$/;//验证中文
		if(admin_username.indexOf(" ")>=0)
		{
			layer.alert('登录用户名包含了空格，请重新输入', {icon: 6}, function(index){
 			layer.close(index);
			$('#admin_username').focus(); 
			});
			return false;
		}
		
        if (myReg.test(admin_username)) {
			layer.alert('用户名必须是字母，数字，符号', {icon: 6}, function(index){
 			layer.close(index);
			$('#admin_username').focus(); 
			});
			return false;
        }
		
		if( '' == $.trim($('#admin_pwd').val())){
			layer.alert('密码不能为空', {icon: 6}, function(index){
 			layer.close(index);
			$('#admin_pwd').focus(); 
			});
			return false;
		}
		
		if( $.trim($('#admin_pwd').val()).length < 6){
			layer.alert('密码不能少于6位', {icon: 6}, function(index){
 			layer.close(index);
			$('#admin_pwd').focus(); 
			});
			return false;
		}
		
		if( '' == $.trim($('#admin_email').val())){
			layer.alert('用户邮箱不能为空', {icon: 6}, function(index){
 			layer.close(index);
			$('#admin_email').focus(); 
			});
			return false;
		}
		
		if( '' == $.trim($('#admin_tel').val())){
			layer.alert('手机号码不能为空', {icon: 6}, function(index){
 			layer.close(index);
			$('#admin_tel').focus(); 
			});
			return false;
		}
		
		if( '' == $.trim($('#admin_realname').val())){
			layer.alert('通用网名不能为空', {icon: 6}, function(index){
 			layer.close(index);
			$('#admin_realname').focus(); 
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
			$('#admin_username').focus(); 
			});
			return false;	
		}
	}
 
});
</script>
	</body>
</html>