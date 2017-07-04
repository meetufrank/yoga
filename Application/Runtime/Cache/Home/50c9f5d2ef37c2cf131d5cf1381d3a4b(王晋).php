<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link rel="stylesheet" type="text/css" href="/yoga/Public/yoga/css/bootstrap-3.3.6-dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="/yoga/Public/yoga/css/static.css">
  <link rel="stylesheet" type="text/css" href="/yoga/Public/yoga/css/main.css">
  <title></title>
  
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


</head>
<body>
<div class="loginform-wrapper has-background-image">
	<div class="loginform-inner">
		<form method="post" action="" class="form-horizontal" id="form0">
			<div class="form-group">
				<label for="username" class="login-icon"><img src="/yoga/Public/yoga/img/people.png" alt="" class="pull-left"></label>
				<div class="login-input">
					<input type="text" class="form-control" id="username" placeholder="手机号" name="username">
				</div>
			</div>
			<div class="form-group">
				<label for="password" class="login-icon"><img src="/yoga/Public/yoga/img/lock.png" alt="" class="pull-left"></label>
				<div class="login-input">
					<input type="password" class="form-control" id="password" placeholder="密码" name="password">
				</div>
			</div>
			<div class="form-group">
				<div class="login-submit">
					<button type="submit" class="btn btn-default" id="dlogin">登录</button>
				</div>
			</div>
		</form>
		<div class="page-link-wrapper">
			<a href="<?php echo U('Login/sign');?>" class="pull-left">注册账号</a>
			<a href="<?php echo U('Login/findpwd');?>" class="pull-right">找回密码</a>
		</div>
	</div>

</div>
<script type="text/javascript" src="/yoga/Public/yoga/js/jquery-1.12.2.min.js"></script>
<script type="text/javascript" src="/yoga/Public/yoga/js/main.js"></script>
<script type="text/javascript">
$(function(){

	function logcomplete(data){
		if(data.status==1){
			window.location.href=data.url;

			return false;
		}else{
			layer.alert(data.info, {icon: 6}, function(index){
				layer.close(index);

				});
			return false;
		}
	}


	$('#dlogin').click(function(e){
		e.preventDefault();

		$.ajax({
			url:"<?php echo U('Login/runlogin');?>",
            data:$('.form-horizontal').serialize(),
			success: logcomplete, // 这是提交后的方法
			dataType: 'json'
		});
	}

	);

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