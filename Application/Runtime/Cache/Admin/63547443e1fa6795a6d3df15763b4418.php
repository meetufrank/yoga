<?php if (!defined('THINK_PATH')) exit();?>	<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>网站后台系统管理</title>

		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="/slackck_0530/Public/assets/css/bootstrap.css" />
		<link rel="stylesheet" href="/slackck_0530/Public/assets/css/font-awesome.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="/slackck_0530/Public/assets/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="/slackck_0530/Public/assets/css/ace-part2.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="/slackck_0530/Public/assets/css/ace-ie.css" />
		<![endif]-->

		<!-- inline styles related to this page -->
        <link rel="stylesheet" href="/slackck_0530/Public/assets/css/slackck.css" />
		<!-- ace settings handler -->
		<script src="/slackck_0530/Public/assets/js/ace-extra.js"></script>
		<script src="/slackck_0530/Public/assets/js/jquery.min.js"></script>
		<script src="/slackck_0530/Public/assets/js/jquery.form.js"></script>
		<script src="/slackck_0530/Public/layer/layer.js"></script>
		<!--<script src="/slackck_0530/Public/assets/js/jquery.leanModal.min.js"></script>-->

		<!--[if lte IE 8]>
		<script src="/slackck_0530/Public/assets/js/html5shiv.js"></script>
		<script src="/slackck_0530/Public/assets/js/respond.js"></script>
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
							瑜伽项目 管理系统
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
								<img class="nav-user-photo" src="/slackck_0530/Public/assets/avatars/user.jpg" alt="Jason's Photo" />
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
$.post('/slackck_0530/index.php/Admin/Classes/clear',{type:$type},function(data){
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
      <link rel="stylesheet" type="text/css" media="all" href="/slackck_0530/Public/sldate/daterangepicker-bs3.css" />
      <script type="text/javascript" src="/slackck_0530/Public/sldate/moment.js"></script>
      <script type="text/javascript" src="/slackck_0530/Public/sldate/daterangepicker.js"></script>
               <script type="text/javascript">
               $(document).ready(function() {
                  $('#reservation').daterangepicker(null, function(start, end, label) {
                    console.log(start.toISOString(), end.toISOString(), label);
                  });
               });
               </script>
					<form name="admin_list_sea" class="form-search form-horizontal" method="post" action="/slackck_0530/index.php/Admin/Classes/news_list">
							<div class="row maintop">
							<div class="col-xs-12 col-sm-3">
	<select name="keytype">
		<option value="ad_title" <?php if(($keytype == 'ad_title') or ($keytype == '')): ?>selected<?php endif; ?>>按标题</option>
		<option value="ad_author" <?php if($keytype == 'ad_author'): ?>selected<?php endif; ?>>按发布人</option>
		<option value="ad_adress" <?php if($keytype == 'ad_adress'): ?>selected<?php endif; ?>>按地址</option>
	</select>
	<select name="diyflag">
		<option value="">按类型</option>
		<?php if(is_array($diyflag)): foreach($diyflag as $key=>$v): ?><option value="<?php echo ($v["diyflag_value"]); ?>" <?php if($diyflag_check == $v['diyflag_value']): ?>selected<?php endif; ?>><?php echo ($v["diyflag_name"]); ?>(<?php echo ($v["diyflag_value"]); ?>)</option><?php endforeach; endif; ?>
	</select>
	<select name="opentype_check_one">
	  <option value="">是否过期</option>
	  <option value="1" <?php if($opentype_check_one == '1'): ?>selected="selected"<?php endif; ?>>未过期</option>
	  <option value="0" <?php if($opentype_check_one == '0'): ?>selected="selected"<?php endif; ?> >已过期</option>
	  </select>
	  <select name="opentype_check" style="margin-top:5px;">
	  <option value="">审核状态</option>
	  <option value="1" <?php if($opentype_check == '1'): ?>selected="selected"<?php endif; ?>>已审核</option>
	  <option value="0" <?php if($opentype_check == '0'): ?>selected="selected"<?php endif; ?> >未审核</option>
	  <option value="2" <?php if($opentype_check == '2'): ?>selected="selected"<?php endif; ?> >审核中</option>
	  </select>
</div>

								<div class="col-xs-12 col-sm-3 hidden-xs btn-sespan">
									<div class="input-group">
										<span class="input-group-addon">
											<i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
										</span>
										<input type="text"  name="reservation" id="reservation" class="sl-date" value="<?php echo ($sldate); ?>" placeholder="点击选择日期范围"/>
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
								<a href="/slackck_0530/index.php/Admin/Classes/news_list">
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
                                        <form id="alldel" name="alldel" method="post" action="<?php echo U('news_list_alldel');?>" >
										<input name="p" id="p" value="<?php echo I('p',1);?>" type="hidden" />
										<div class="table-responsive">
											<table width="100%" class="table table-striped table-bordered table-hover" id="dynamic-table">
												<thead>
													<tr>
														<th width="5%" class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace"  id='chkAll' onclick='CheckAll(this.form)' value="全选"/>
													  <span class="lbl"></span>															</label>														</th>

													  <th width="20%">活动标题【发布人】</th>
													  <th width="12%">活动地址</th>
													  <th width="9%">活动类型</th>
													  <th width="3%">收藏数</th>
													  <th width="3%">点赞数</th>
													  <th width="9%">发布时间</th>
													  <th width="5%">状态</th>
													  <th width="9%">最后一次修改的管理员</th>
													  <th width="5%">是否过期</th>
													  <th width="7%" style="border-right:#CCC solid 1px;">操作</th>
												  </tr>
												</thead>

												<tbody>

                                                <?php if(is_array($activedata)): foreach($activedata as $key=>$v): ?><tr>
														<td align="center">
														<label class="pos-rel">
															<input name='ad_id[]' id="navid" class="ace"  type='checkbox' value='<?php echo ($v["ad_id"]); ?>'>
														<span class="lbl"></span>
														</label>
														</td>

														<td><a href="" target="_blank" title="<?php echo ($v["ad_title"]); ?>"><?php echo (subtext($v["ad_title"],25)); ?></a>【<?php echo ($v["admin_username"]); ?>】</td>
														<td><?php echo ($v["ad_adress"]); ?></td>
														<td>
														<?php if(is_array($diyflag)): foreach($diyflag as $key=>$d): if(strstr($v['ad_type'],$d['diyflag_value']) == true): ?><span style="color:<?php echo ($d['diyflag_color']); ?>"><?php echo ($d['diyflag_name']); ?></span><?php endif; ?>&nbsp;<?php endforeach; endif; ?>

														</td>
														<td><?php echo ($v["ad_savenum"]); ?></td>
														<td><?php echo ($v["ad_agreenum"]); ?></td>
														<td><?php echo ($v["ad_addtime"]); ?></td>
														<td>
														<?php if($v[news_open] == 1): ?><a class="red" href="javascript:;" onclick="return stateyes(<?php echo ($v["n_id"]); ?>);" title="已开启">
														<div id="zt<?php echo ($v["n_id"]); ?>"><button class="btn btn-minier btn-yellow">开启</button></div>
														</a>
														<?php else: ?>
														<a class="red" href="javascript:;" onclick="return stateyes(<?php echo ($v["n_id"]); ?>);" title="已禁用">
														<div id="zt<?php echo ($v["n_id"]); ?>"><button class="btn btn-minier btn-danger">禁用</button></div>
														</a><?php endif; ?>
														</td>
														<td><?php echo ($v["admin_username"]); ?></td>
														<td align="center"><?php echo ($v["ad_id"]); ?></td>
														<td>
		<div class="hidden-sm hidden-xs action-buttons">
			<a class="green" href="<?php echo U('news_list_edit',array('n_id'=>$v['n_id']));?>" title="修改">
				<i class="ace-icon fa fa-pencil bigger-130"></i>
			</a>
			<a class="red" href="javascript:;" onclick="return del(<?php echo ($v["n_id"]); ?>,<?php echo I('p',1);?>);" title="回收站">
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
function del(id,p){
		layer.confirm('你确定要转移到回收站吗？', {icon: 3}, function(index){
	    layer.close(index);
	    window.location.href="/slackck_0530/index.php/Admin/Classes/news_list_del/n_id/"+id+"/p/"+p+"";//重新获取当前页面，删除后返回当前页码
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


function stateyes(val){
		  $.post('<?php echo U("news_list_state");?>',
		  {x:val},
	function(data){
	var $v=val;
		if(data.status){
			if(data.info=='状态禁止'){
				var a='<button class="btn btn-minier btn-danger">禁用</button>'
				$('#zt'+val).html(a);
				return false;
			}else{
				var b='<button class="btn btn-minier btn-yellow">开启</button>'
				$('#zt'+val).html(b);
				return false;
			}

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
							<span class="blue bolder">瑜伽</span>
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

		<script src="/slackck_0530/Public/assets/js/bootstrap.js"></script>
		<script src="/slackck_0530/Public/assets/js/maxlength.js"></script>
		<script src="/slackck_0530/Public/assets/js/ace/ace.js"></script>
		<script src="/slackck_0530/Public/assets/js/ace/ace.sidebar.js"></script>


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