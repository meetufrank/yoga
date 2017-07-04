<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
	<title>生活的页面-搜索</title>
	
  <link rel="stylesheet" type="text/css" href="/yoga/Public/yoga/css/bootstrap-3.3.6-dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="/yoga/Public/yoga/css/static.css">
  <link rel="stylesheet" type="text/css" href="/yoga/Public/yoga/css/main.css">
  		<script src="/yoga/Public/assets/js/jquery.min.js"></script>
  <script src="/yoga/Public/layer/layer.js"></script>

<div class="g-header">
<div class="logo-wrap">
  <a href="<?php echo U('Index/index');?>">
    <img src="/yoga/Public/yoga/img/logo.png">
  </a>
</div>
<div class="g-navbar-icon">
  <a href="#">
    <img src="/yoga/Public/yoga/img/nav_icon.png" alt="icon">
  </a>
</div>
<div class="g-navbar-search">
  <a href="#">
    <img src="/yoga/Public/yoga/img/search_icon.png" alt="search">
  </a>
</div>
<ul class="nav-top">
<?php $controller=strtolower(CONTROLLER_NAME); echo $action; ?>
  <li <?php if($controller == 'index'): ?>class="active"<?php endif; ?>><a href="<?php echo U('Index/Index');?>">首页</a></li>
  <li <?php if($controller == 'class'): ?>class="active"<?php endif; ?>><a href="">课程</a></li>
  <li <?php if($controller == 'knows'): ?>class="active"<?php endif; ?>><a href="##">知识</a></li>

  <li <?php if($controller == 'active'): ?>class="active"<?php endif; ?>><a href="<?php echo U('active/activeload');?>">活动</a></li>
  <li <?php if($controller == 'adress'): ?>class="active"<?php endif; ?>><a href="<?php echo U('adress/MilitiaPoint');?>">全国团练点</a></li>
  <li><a href="##">关于我们</a></li>
  <?php if($_SESSION['username']== ''): ?><li <?php if($controller == 'login'): ?>class="active"<?php endif; ?>><a href="<?php echo U('Login/login');?>">登录&nbsp;/&nbsp;注册</a></li>
  <?php else: ?>
  <li <?php if($controller == 'user'): ?>class="active"<?php endif; ?>><a href="<?php echo U('User/person');?>"><?php echo (session('username')); ?>的个人中心</a></li>
  <li><a href="<?php echo U('Login/logout');?>">退出</a></li><?php endif; ?>
  <li class="close-navbar"><a href="<?php echo U('Index/index');?>" class="pull-left"><img class="close-navbar-img" src="/yoga/Public/yoga/img/home.png"><span>首页</span></a><a href="#" class="pull-right"><img class="close-navbar-img" src="/yoga/Public/yoga/img/close.jpg"><span>取消</span></a></li>
</ul>
<div class="g-navbar-searchbox">
  <form action="" method="post">
    <div class="input-group">
      <input type="text" name="keyword" placeholder="请输入关键词" class="form-control">
      <span class="input-group-btn">
        <button class="btn btn-primary btn-search" type="submit" style="background-color:#ffae00;outline:none;border-color:#ffae00;">搜索</button>
      </span>
    </div>
  </form>
</div>
</div>


	<link rel="stylesheet" href="/yoga/Public/yoga/search/css/bootstrap.min.css">
    <link rel="stylesheet" href="/yoga/Public/assets/css/slackck.css" />

	<style>

		a:hover{
			text-decoration:none;
		}
		.marg_t_1{
			margin-top:20px;
		}
		.search_bar{
			height:88px;
			padding:20px 0;
			background:#f0ede7;
		}
		.search_list .keywords{
			font-style:normal;
			color:#f8a900;
		}
		.search_list .icons{
			color: #f2ce77;
		}
		.search_list .icons span{
			color: #cbcaca;
			margin-right:5px;
			margin-left:15px;
		}
	</style>
</head>
<body>
	<div class="search_bar">
	<form action="<?php echo U('Index/search');?>" method="post" id="form0">
		<div class="container">
			<div class="input-group input-group-lg">

			  <input type="text" placeholder="" class="form-control" value="<?php echo ($key); ?>" name="key" id="key">
			  <span class="input-group-addon"><a class="glyphicon glyphicon-search" href="#" id="search"></a></span>

			</div>
		</div>
		</form>
	</div>
	<div class="container marg_t_1">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
		  <li role="presentation" class="active"><a href="#all" role="tab" data-toggle="tab">全部</a></li>
		  <li role="presentation"><a href="#class" role="tab" data-toggle="tab">课程</a></li>
		  <li role="presentation"><a href="#knowledge" role="tab" data-toggle="tab">知识</a></li>
		  <li role="presentation"><a href="#activites" role="tab" data-toggle="tab">活动</a></li>
		</ul>
	</div>

	<!-- Tab panes -->
	<div class="tab-content" style="margin-top: 20px;">
	  <div role="tabpanel" class="tab-pane active" id="all">
	  	<div class="container">
	  	<h6 class="text-muted">找到相关结果约<?php echo ($allcount); ?>个</h6>
	  	<ul class="list-group search_list">
	  	<?php if(is_array($alldata)): foreach($alldata as $key=>$al): ?><li class="list-group-item">
		  	<div class="pull-right icons hidden-sm hidden-xs">
		  		<span class="glyphicon glyphicon-heart"></span><?php echo ($al["ad_savenum"]); ?>
		  		<span class="glyphicon glyphicon-thumbs-up"></span><?php echo ($al["ad_agreenum"]); ?>
		  		<span class="glyphicon glyphicon-eye-open"></span><?php echo ($al["ad_readnum"]); ?>
	  		</div>
		    <a href="<?php echo ($al["location_url"]); ?>">[<?php echo ($al["is_name"]); ?>]<?php echo ($al["ad_title"]); ?></a>
		  </li><?php endforeach; endif; ?>

		</ul>
		</div>

	   <div class="search_bar">
			<div class="container">
				<?php echo ($allshow); ?>
	   		</div>
	   </div>
	  </div>

	  <div role="tabpanel" class="tab-pane" id="activites">
	  	<div class="container">
	  	<h6 class="text-muted">找到相关结果约<?php echo ($activecount); ?>个</h6>
	  	<ul class="list-group search_list">
	  	<?php if(is_array($activedata)): foreach($activedata as $key=>$ad): ?><li class="list-group-item">
		  	<div class="pull-right icons hidden-sm hidden-xs">
		  		<span class="glyphicon glyphicon-heart"></span><?php echo ($ad["ad_savenum"]); ?>
		  		<span class="glyphicon glyphicon-thumbs-up"></span><?php echo ($ad["ad_agreenum"]); ?>
		  		<span class="glyphicon glyphicon-eye-open"></span><?php echo ($ad["ad_readnum"]); ?>
	  		</div>
		    <a href="<?php echo U('Active/active_content',array('id'=>$ad['ad_id']));?>">[活动]<?php echo ($ad["ad_title"]); ?></a>
		  </li><?php endforeach; endif; ?>

		</ul>
		</div>
		<div class="search_bar">
			<div class="container">
				<?php echo ($activeshow); ?>
	   		</div>
	   </div>

	  </div>
	  <div role="tabpanel" class="tab-pane" id="class">
	  	<div class="container">
<h6 class="text-muted">找到相关结果约<?php echo ($classcount); ?>个</h6>
	  	<ul class="list-group search_list">
	  	<?php if(is_array($classdata)): foreach($classdata as $key=>$mc): ?><li class="list-group-item">
		  	<div class="pull-right icons hidden-sm hidden-xs">
		  		<span class="glyphicon glyphicon-heart"></span><?php echo ($mc["mc_savenum"]); ?>
		  		<span class="glyphicon glyphicon-thumbs-up"></span><?php echo ($mc["mc_agreenum"]); ?>
		  		<span class="glyphicon glyphicon-eye-open"></span><?php echo ($mc["mc_readnum"]); ?>
	  		</div>
		    <a href="<?php echo U('Class/class_content',array('id'=>$mc['mc_id']));?>">[课程]<?php echo ($mc["mc_title"]); ?></a>
		  </li><?php endforeach; endif; ?>

		</ul>
		</div>
		<div class="search_bar">
			<div class="container">
				<?php echo ($classshow); ?>
	   		</div>
	   </div>
</div>

	  <div role="tabpanel" class="tab-pane" id="knowledge">
	  	<div class="container">
	  	    <h6 class="text-muted">找到相关结果约<?php echo ($knowscount); ?>个</h6>
	  	<ul class="list-group search_list">
	  	<?php if(is_array($knowsdata)): foreach($knowsdata as $key=>$ms): ?><li class="list-group-item">
		  	<div class="pull-right icons hidden-sm hidden-xs">
		  		<span class="glyphicon glyphicon-heart"></span><?php echo ($ms["ms_savenum"]); ?>
		  		<span class="glyphicon glyphicon-thumbs-up"></span><?php echo ($ms["ms_agreenum"]); ?>
		  		<span class="glyphicon glyphicon-eye-open"></span><?php echo ($ms["ms_readnum"]); ?>
	  		</div>
		    <a href="<?php echo U('Knows/knows_content',array('id'=>$ms['ms_id']));?>">[知识]<?php echo ($ms["ms_title"]); ?></a>
		  </li><?php endforeach; endif; ?>

		</ul>
		</div>
		<div class="search_bar">
			<div class="container">
				<?php echo ($knowsshow); ?>
	   		</div>
	   </div>

	  	</div>
	  </div>

	</div>
	 </div>


<script src="/yoga/Public/yoga/search/js/jquery.min.js"></script>
<script src="/yoga/Public/yoga/search/js/bootstrap.min.js"></script>
<script type="text/javascript">
$('#search').click(function(e) {
	e.preventDefault();
	  $('#form0').submit();

});
</script>


<div class="window-indi"></div>
<div class="g-footer clearfix">
  <div class="col-xs-12 col-sm-2 delPadd">
    <div class="footer-logo-wrap"><img src="/yoga/Public/yoga/img/logo.png"></div>
  </div>
  <div class="col-xs-12 col-sm-6 footer-text">
    <div class="col-xs-3 col-sm-3 delPadd">
      <h5>网站条款</h5>
      <div class="item-detail">
        <p><a href="##">关于我们</a></p>
        <p><a href="##">联系我们</a></p>
        <p><a href="##">用户协议</a></p>
        <p><a href="##">隐私保护</a></p>
        <p><a href="##">免费声明</a></p>
      </div>
    </div>
    <div class="col-xs-3 col-sm-3 delPadd">
      <h5>帮助中心</h5>
      <div class="item-detail">
        <p><a href="##">常见问题</a></p>
        <p><a href="##">在线咨询</a></p>
      </div>
    </div>
    <div class="col-xs-6 col-sm-6 delPadd">
      <h5>联系客服</h5>
      <div class="item-detail">
        <p><a href="##">境外客服:8649-52024125</a></p>
        <p><a href="##">境内客服:4008-15832054</a></p>
        <p><a href="##">用户邮箱:customer@artofliving.com</a></p>
      </div>
    </div>
  </div>
  <div class="col-xs-12 col-sm-4 col-md-4 footer-focus">
    <div class="col-xs-12 col-sm-8 col-md-8 delPadd">
      <h5>关注微信</h5>
      <div class="item-detail">
        <div class="codeImg-wrap"><img src="/yoga/Public/yoga/img/footer-code.png"></div>
        <div class="codeImg-wrap"><img src="/yoga/Public/yoga/img/footer-code.png"></div>
        <div class="codeImg-wrap"><img src="/yoga/Public/yoga/img/footer-code.png"></div>
        <div class="codeImg-wrap"><img src="/yoga/Public/yoga/img/footer-code.png"></div>
      </div>
    </div>
    <div class="col-xs-12 col-sm-4 col-md-4 delPadd">
      <h5>关注微博</h5>
      <div class="item-detail">
        <div class="codeImg-wrap"><img src="/yoga/Public/yoga/img/footer-code.png"></div>
      </div>
    </div>
  </div>
  <div class="col-xs-12 col-sm-12 footer-end">2014-2016&nbsp;沪ICP备56265680号-1</div>
</div>

</body>
</html>