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
      <link rel="stylesheet" type="text/css" media="all" href="/yoga/Public/sldate/daterangepicker-bs3.css" />
      <style type="text/css">
		.page-content {
			position: relative;
		}
		.item-popup {
			display: none;
			position: absolute;
			z-index: 9999;
			left: 5%;
			right: 5%;
			top: 50px;
			min-height: 400px;
			background-color: #eee;
		}
		.item-close {
			float: right;
			color: #fff;
			width: 35px;
			height: 35px;
			font-size: 30px;
			line-height: 35px;
			text-align: center;
			text-decoration: none;
		}
		.item-close:hover {
			text-decoration: none;
		}
		.item-detail {
			margin-top: 40px;
			margin-left: 30px;
			font-size: 12px;
		}
		.item-detail div {
			padding: 18px 10px;
		}



	  </style>

	  <script type="text/javascript">
	  $(function() {
		  $('.item-sketch').click(function(e) {
		  		e.preventDefault();
		  		$('.item-popup').show();
				$.ajax(
					{
					url: '<?php echo U("active_register_id");?>',
					data: {
						id: $(this).data("value")
					},
					dataType: 'json',

					success: function(data) {

						$('#name').html(data["ar_name"]);
						$('#tel').html(data["ar_tel"]);
						$('#email').html(data["ar_email"]);
						$('#date').html(data["ar_birthday"]);
						$('#tel').html(data["ar_tel"]);
						$('#addtime').html(data["ar_addtime"]);
						$('#age').html(data["age"]);
						$('#userid').html(data["member_list_username"]);
						$('#say').html(data["ar_say"]);
						if(data["ar_sex"]==0){
							$('#sex').html('女');
						}else if(data["ar_sex"]==1){
							$('#sex').html('男');
						}
						if(data["ar_more"]==''){
							$('#more').html('未参加过');
						}else{
							$('#more').html(data["ar_more"]);
						}

						if(data["ar_open"]==0){
							$('#isopen').html('未审核');
						}else if(data["ar_open"]==1){
							$('#isopen').html('已通过');

						}
					},
					error: function() {
						console.log('error');
						$('.activity').html('error');
					}
					}
				)
		  });
		  $('.item-close').click(function(e) {
			  e.preventDefault();
			  $('.item-popup').hide();
			  $('.item-popup div span').html('');
		  })
	  });

	  </script>
      <script type="text/javascript" src="/yoga/Public/sldate/moment.js"></script>
      <script type="text/javascript" src="/yoga/Public/sldate/daterangepicker.js"></script>
               <script type="text/javascript">
               $(document).ready(function() {
                  $('#reservation').daterangepicker(null, function(start, end, label) {
                    console.log(start.toISOString(), end.toISOString(), label);
                  });
               });
               </script>
					<form name="admin_list_sea" class="form-search form-horizontal" method="post" action="/yoga/Admin/News/active_register_list">
							<div class="row maintop">
							<div class="col-xs-12 col-sm-3">
							<input type="hidden" value="<?php echo ($_GET['ad_id']); ?>" name="register_id">
	<select name="keytype">
		<option value="ar_name" <?php if(($keytype == 'ar_name') or ($keytype == '')): ?>selected<?php endif; ?>>按姓名</option>
		<option value="ar_author" <?php if($keytype == 'ar_author'): ?>selected<?php endif; ?>>按报名用户名</option>

	</select>


</div>

								<div class="col-xs-12 col-sm-3 hidden-xs btn-sespan">
									<div class="input-group">

									</div>
								</div>


							<div class="col-xs-12 col-sm-3 btn-sespan">
								<div class="input-group">
									<span class="input-group-addon">
										<i class="ace-icon fa fa-check"></i>
									</span>
									<input type="text" name="key" id="key" class="form-control search-query admin_sea" value="<?php echo ($keyy); ?>" placeholder="输入需查询的关键字" />
									<span class="input-group-btn">
										<button type="submit" class="btn btn-xs btm-input btn-purple">
											<span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
											搜索
										</button>
									</span>
								</div>
							</div>

							  <div class="input-group-btn">
								<a href="/yoga/Admin/News/active_register_list?ad_id=<?php echo ($_GET['ad_id']); ?>">
								<button type="button" class="btn btn-xs all-btn btn-purple">
									<span class="ace-icon fa fa-globe icon-on-right bigger-110"></span>
									显示全部
								</button>
								</a>
							  </div>


							</div>
</form>



							<div class="row">
							    <div class="col-xs-12">
										<div>
                                        <form id="alldel" name="alldel" method="post" action="<?php echo U('active_register_alldel');?>" >
										<input name="p" id="p" value="<?php echo I('p',1);?>" type="hidden" />
										<input name="alldel_id" id="d" value="<?php echo ($_GET['ad_id']); ?>" type="hidden" />
										<div class="table-responsive">
											<table width="100%" class="table table-striped table-bordered table-hover" id="dynamic-table">
												<thead>
													<tr>
														<th width="5%" class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace"  id='chkAll' onclick='CheckAll(this.form)' value="全选"/>
													  <span class="lbl"></span>															</label>														</th>

													  <th width="3%">姓名</th>
													  <th width="12%">联系方式</th>

													  <th width="10%">邮箱</th>
													  <th width="3%">性别</th>
													  <th width="20%">报名时间</th>
													  <th width="5%">年龄</th>
													  <th width="5%">是否通过</th>
													  <th width="5%">参加的其他课程</th>


													  <th width="7%" style="border-right:#CCC solid 1px;">操作</th>
												  </tr>
												</thead>

												<tbody>

                                                <?php if(is_array($register)): foreach($register as $key=>$v): ?><tr>
														<td align="center">
														<label class="pos-rel">
															<input name='ar_id[]' id="navid" class="ace"  type='checkbox' value='<?php echo ($v["ar_id"]); ?>'>
														<span class="lbl"></span>
														</label>
														</td>

														<td><a class="item-sketch" href="" title="<?php echo ($v["ar_name"]); ?>" data-value='<?php echo ($v["ar_id"]); ?>'><?php echo ($v["ar_name"]); ?></a></td>

														<td>

													<span ><?php echo ($v["ar_tel"]); ?></span>


														</td>
														<td><?php echo ($v["ar_email"]); ?></td>
														<td><?php if($v['ar_sex'] == 1 ): ?>男<?php else: ?>女<?php endif; ?></td>
														<td><?php echo ($v["ar_addtime"]); ?></td>
												     	<td><?php echo ($v["age"]); ?></td>

														<td>
														<?php if($v['ar_open'] == 1): ?><a class="red" href="javascript:;" onclick="return stateyes(<?php echo ($v["ar_id"]); ?>,<?php echo ($v["ar_activeid"]); ?>);" title="已通过">
														<div id="zt<?php echo ($v["ar_id"]); ?>"><button class="btn btn-minier btn-yellow">已通过</button></div>
														</a>
														<?php else: ?>
														<a class="red" href="javascript:;" onclick="return stateyes(<?php echo ($v["ar_id"]); ?>,<?php echo ($v["ar_activeid"]); ?>);" title="未审核">
														<div id="zt<?php echo ($v["ar_id"]); ?>"><button class="btn btn-minier btn-danger">未审核</button></div>
														</a><?php endif; ?>
														</td>
														<td><?php if($v['ar_more'] == ''): ?>未参加过<?php else: echo ($v["ar_more"]); endif; ?></td>


														<td>
		<div class="hidden-sm hidden-xs action-buttons">
			<a class="green" href="<?php echo U('active_register_listedit',array('ar_id'=>$v['ar_id']));?>" title="修改">
				<i class="ace-icon fa fa-pencil bigger-130"></i>
			</a>
			<a class="red" href="javascript:;" onclick="return del(<?php echo ($v["ar_id"]); ?>,<?php echo I('p',1);?>,<?php echo ($v["ar_activeid"]); ?>);" title="回收站">
				<i class="ace-icon fa fa-trash-o bigger-130"></i>
			</a>
		</div>
														</td>
													</tr><?php endforeach; endif; ?>
                                                  <tr>
													  <td align="left"><button id="btnsubmit" class="btn btn-white btn-yellow btn-sm">删</button> </td>
													  <td colspan="11" align="right"><?php echo ($page); ?></td>
												  </tr>
												</tbody>
											</table>
											</div>
                                          </form>
							    		</div>
									</div>
								</div>
								<div class="item-popup">
								<a href="#" class="item-close">×</a>
								<div class="row item-detail">
									<div class="col-md-6">姓名:<span id="name"></span></div>
									<div class="col-md-6">联系方式:<span id="tel"></span></div>
									<div class="col-md-6">邮箱:<span id="email"></span></div>
									<div class="col-md-6">出生日期:<span id="date"></span></div>
									<div class="col-md-6">年龄:<span id="age"></span></div>
									<div class="col-md-6">性别:<span id="sex"></span></div>
									<div class="col-md-6">是否参加过其他艺术课程:<span id="more"></span></div>

									<div class="col-md-6">提交报名信息的用户:<span id="userid"></span></div>
									<div class="col-md-6">报名时间:<span id="addtime"></span></div>
                                    <div class="col-md-6">报名时间:<span id="say"></span></div>


								</div>
								</div>

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

<script>
function del(id,p,ad_id){
		layer.confirm('你确定要删除吗，删除后不可恢复？', {icon: 3}, function(index){
	    layer.close(index);
	    window.location.href="/yoga/Admin/News/active_register_del/ar_id/"+id+"/p/"+p+"/ad_id/"+ad_id+"";//重新获取当前页面，删除后返回当前页码
	});
}


function unselectall(){
if(document.myform.chkAll.checked){
document.myform.chkAll.checked = document.myform.chkAll.checked&0;
}
}
function CheckAll(form){
for (var i=0;i<form.elements.length;i++){
var e = form.elements[i];
if (e.Name != 'chkAll'&&e.disabled==false)
e.checked = form.chkAll.checked;
}
}

</script>
<script>
$(function(){
	$('#alldel').ajaxForm({
		beforeSubmit: checkForm, // 此方法主要是提交前执行的方法，根据需要设置，一般是判断为空获取其他规则
		success: complete, // 这是提交后的方法
		dataType: 'json'
	});

	function checkForm(){
				var chk_value =[];
				$('input[id="navid"]:checked').each(function(){
					chk_value.push($(this).val());
				});

				if(!chk_value.length){
					layer.alert('至少选择一个删除项', {icon: 6});
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
			window.location.href=data.url;
			});
		}
	}

});


function stateyes(val,acval){
		  $.post('<?php echo U("register_list_state");?>',
		  {x:val,id:acval},
	function(data){
	var $v=val;
		if(data.status){
			if(data.info=='未审核'){
				var a='<button class="btn btn-minier btn-danger">未审核</button>';

				$('#zt'+val).html(a);
				return false;
			}else{
				var b='<button class="btn btn-minier btn-yellow">已通过</button>';
				$('#zt'+val).html(b);
				return false;
			}

		}else{
			layer.alert(data.info, {icon: 6}, function(index){
	 			layer.close(index);
				});
			return false;
		}
	});
	return false;
}


</script>
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