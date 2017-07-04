<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

  <title></title>
  
  <link rel="stylesheet" type="text/css" href="/yoga/Public/yoga/css/bootstrap-3.3.6-dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="/yoga/Public/yoga/css/static.css">
  <link rel="stylesheet" type="text/css" href="/yoga/Public/yoga/css/main.css">

 <script src="/yoga/Public/assets/js/jquery.min.js"></script>

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
<?php $controller=strtolower(CONTROLLER_NAME); ?>
  <li <?php if($controller == 'index'): ?>class="active"<?php endif; ?>><a href="<?php echo U('Index/index');?>">首页</a></li>
  <li <?php if($controller == 'class'): ?>class="active"<?php endif; ?>><a href="<?php echo U('class/classload');?>">课程</a></li>
  <li <?php if($controller == 'knows'): ?>class="active"<?php endif; ?>><a href="<?php echo U('knows/knowsload');?>">知识</a></li>

  <li <?php if($controller == 'active'): ?>class="active"<?php endif; ?>><a href="<?php echo U('active/activeload');?>">活动</a></li>
  <li <?php if($controller == 'adress'): ?>class="active"<?php endif; ?>><a href="<?php echo U('adress/MilitiaPoint');?>">全国团练点</a></li>
  <li <?php if($controller == 'about'): ?>class="active"<?php endif; ?>><a href="<?php echo U('About/about');?>">关于我们</a></li>
  <?php if($_SESSION['username']!= ''): ?><li <?php if($controller == 'user'): ?>class="active"<?php endif; ?>><a href="<?php echo U('User/person');?>"><?php echo (session('userpetname')); ?>的个人中心</a></li>
  <li><a href="<?php echo U('Login/logout');?>">退出</a></li>
  <?php else: ?>
    <li <?php if($controller == 'login'): ?>class="active"<?php endif; ?>><a href="<?php echo U('Login/login');?>">登录&nbsp;/&nbsp;注册</a></li><?php endif; ?>
  <li class="close-navbar"><a href="<?php echo U('Index/index');?>" class="pull-left"><img class="close-navbar-img" src="/yoga/Public/yoga/img/home.png"><span>首页</span></a><a href="#" class="pull-right"><img class="close-navbar-img" src="/yoga/Public/yoga/img/close.jpg"><span>取消</span></a></li>
</ul>
<div class="g-navbar-searchbox">
  <form action="<?php echo U('Index/search');?>" method="post" id="formtop">
    <div class="input-group">
      <input type="text" name="key" placeholder="请输入关键词" class="form-control" value="">
      <span class="input-group-btn">
        <button  id="topbutton" class="btn btn-primary btn-search" type="submit" style="background-color:#ffae00;outline:none;border-color:#ffae00;">搜索</button>
      </span>
    </div>
  </form>
  <script>
    $('#topbutton').click(function(e) {
		e.preventDefault();
		  $('#formtop').submit();

	});
  </script>
</div>
</div>


  <style>
  .get-verifycode {
  	display: inline-block;
  	width: 140px;
  	font-size: 14px;
  	text-align: center;
  	background-color: #ffae00;
  	color: #fff;
  	padding: 6px 0;
  	outline: none!important;
  	border: none!important;
  }
  .get-verifycode:hover,
  .get-verifycode:focus,
  .get-verifycode:active {
  	color: #fff;
  }
  .get-verifycode.verify-disabled {
  	background-color: #ccc;
  }
  </style>
</head>
<body>

<div class="loginform-wrapper loginform-wrapper1 has-background-image">
	<div class="loginform-inner">
	<h3 class="signform-title">找回密码</h3>
		<form method="post" action="" class="form-horizontal sign-form" >
			<div class="form-group">
				<label for="phone" class="login-icon"><img src="/yoga/Public/yoga/img/phone.png" alt="" class="pull-left" style="margin-left:-3px;"></label>
				<div class="login-input">
					<input type="text" class="form-control" id="phone" placeholder="手机号" name="phone">
				</div>
				<div class="error-container" style="margin-left: 60px;"></div>
			</div>
			<div class="form-group">
				<label for="verify" class="login-icon"><img src="/yoga/Public/yoga/img/verify-code.png" alt="" class="pull-left"></label>
				<div class="login-input">
					<input type="text" class="form-control" id="verify" placeholder="验证码" name="verify">
				</div>
				<div class="error-container" style="margin-left: 60px;"></div>
			</div>
			<div class="form-group">
				<button href="#" class="get-verifycode pull-right">获取验证码</button>
			</div>
			<div class="form-group error-container verify-error-container">
				<span></span>
			</div>
			<div class="form-group">
				<div class="login-submit">
					<button type="submit" class="btn btn-default getpassword-next">下一步</button>
				</div>
			</div>
		</form>
	</div>
</div>
<div class="loginform-wrapper loginform-wrapper2 has-background-image" >
	<div class="loginform-inner special">
		<form method="post" action="" class="form-horizontal password-form" id="form0">
		<input type="hidden" val="" class="tel" name="tel">
			<div class="form-group">
				<label for="phone" class="login-icon" style="width:90px;padding-top:15px;">输入新密码</label>
				<div class="login-input" style="margin-left:95px;">
					<input type="password" class="form-control" id="password1" placeholder="" name="password1">
				</div>
				<div class="error-container" style="margin-left: 95px;"></div>
			</div>
			<div class="form-group">
				<label for="verify" class="login-icon" style="width:90px;padding-top:15px;">重新输入新密码</label>
				<div class="login-input"  style="margin-left:95px;">
					<input type="password" class="form-control" id="password2" placeholder="" name="password2">
				</div>
				<div class="error-container" style="margin-left: 95px;"></div>
			</div>
			<div class="form-group">
				<div class="login-submit">
					<button type="submit" class="btn btn-default password-complete">完成</button>
				</div>
			</div>
		</form>
	</div>
</div>


<script type="text/javascript" src="/yoga/Public/yoga/js/vendor/jquery.validate.min.js"></script>
<script type="text/javascript" src="/yoga/Public/yoga/js/vendor/data.js"></script>
<script type="text/javascript" src="/yoga/Public/yoga/js/vendor/jquery.city.select.min.js"></script>

<script type="text/javascript">
	$('.sign-form').validate({
		rules: {
			"phone": {
				required: true,
				validPhone: true
			},
			"verify": {
				required: true
			}
		},
		messages: {
			"phone": {
				required: "此项为必填项",
				validPhone: "手机号格式不正确"
			},
			"verify": {
				required: "此项为必填项"
			}
		},
		ignore: '.ignore',
		errorPlacement: function(error, element) {
			error.appendTo(element.closest('.form-group').find('.error-container'))
		}
	});

	$.validator.addMethod("validPhone", function(value, element, params) {
		var re = new RegExp('^\\d{11}$');
		if (params) {
			value = parseInt(value)
			return re.test(value);
		}
		return true;
	});

	$.validator.addMethod("valueNotEquals", function(value, element, params) {
		return value != params;
	});

	$('.get-verifycode').click(function(e) {
		e.preventDefault();
		if (!$('input[name=phone]').valid()) {
			return;
		}
		var duration = 60;
	  	var start = new Date();
	  	var startTime = start.getTime();
	  	var process = setInterval(function() {
	  		var current = new Date();
	  		var currentTime = current.getTime();
	  		var elapsedTime = Math.floor((currentTime - startTime) / 1000);
	  		if (elapsedTime < duration) {
	  			var btnText = (duration - elapsedTime) + '&nbsp;s后重新获取';
	  		}
	  		else {
	  			clearInterval(process);
	  			var btnText = '获取验证码';
	  			$('.get-verifycode').removeClass('verify-disabled');
	  			$('.get-verifycode').prop('disabled', false);
	  		}
	  		$('.get-verifycode').html(btnText);
	  	}, 250);
	  	$(this).addClass('verify-disabled');
	  	$('.get-verifycode').prop('disabled', true);
		/* 获取验证码 */
		$.ajax({
			url: "<?php echo U('Login/putmessage');?>",
			data: {
				tel: $('input[name=phone]').val()
			},
			dataType: 'json',
			success: function(data) {
				console.log(data)
				$('.verify-error-container').html('')
				if (data == 0) {
					$('.verify-error-container').html('您今日的手机号验证次数达到上限')
				}
			}
		});
	})

	$('.getpassword-next').click(function(e) {
		e.preventDefault();
		if (!$('.sign-form').valid()) {
			return;
		}
		/* 验证码是否正确 */
		$.ajax({
			url: "<?php echo U('Login/getstatus');?>",
			data: {
				code: $('input[name=verify]').val()
			},
			dataType: 'json',
			success: function(data) {
				console.log(data)
				if (data == 1) {

					/* 验证成功 */
					$('.loginform-wrapper1').hide();
					$('.loginform-wrapper2').show();
					$('.tel').val($('input[name=phone]').val());
					$('.verify-error-container').html('');
				}
				else {
					$('.verify-error-container').html('验证码错误');
				}
			}
		});
	});

	$('.password-form').validate({
		rules: {
			"password1": {
				required: true
			},
			"password2": {
				required: true,
				equalTo: '#password1'
			}
		},
		messages: {
			"password1": {
				required: "此项为必填项"
			},
			"password2": {
				required: "此项为必填项",
				equalTo: "两次输入密码不一致"
			}
		},
		ignore: '.ignore',
		errorPlacement: function(error, element) {
			error.appendTo(element.closest('.form-group').find('.error-container'))
		}
	});

	$('.password-complete').click(function(e) {
		e.preventDefault();


			$.ajax({
				url: "<?php echo U('Login/checkpwd');?>",
				data:$('#form0').serialize(),
				dataType: 'json',
				success: function(data) {
					if(data.status==1){
						layer.alert(data.info, {icon: 6}, function(index){
							layer.close(index);
							window.location.href=data.url;
							});

						return false;
					}else{
						layer.alert(data.info, {icon: 6}, function(index){
							layer.close(index);

							});

						return false;
					}
				}
			});


	});
</script>
  


<div class="g-footer clearfix">
    <div class="col-lg-2 col-md-2 col-sm-2 delPadd">
      <div class="footer-logo-wrap"><img src="/yoga/Public/yoga/img/logo.png"></div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 footer-text">
        <h5>网站条款</h5>
        <div class="item-detail">
          <p><a href="##">关于我们</a></p>
        </div>
    </div>

    <div class="col-lg-7 col-md-7 col-sm-7 footer-focus">
        <h5 class="gzwx">关注微信</h5>
        <div class="item-detail">
        <div class="codeImg-wrap"><img src="/yoga/Public/yoga/img/shanghai.jpg"><span style="text-align:center;display:block">上海</span></div>
          <div class="codeImg-wrap"><img src="/yoga/Public/yoga/img/beijing.jpg"><span style="text-align:center;display:block">北京</span></div>
          <div class="codeImg-wrap"><img src="/yoga/Public/yoga/img/chengdu.jpg"><span style="text-align:center;display:block">成都</span></div>
          <div class="codeImg-wrap"><img src="/yoga/Public/yoga/img/hangzhou.jpg"><span style="text-align:center;display:block">杭州</span></div>

      	</div>
    </div>
    <div class="col-xs-12 col-sm-12 footer-end">2014-2016&nbsp;沪ICP备56265680号-1</div>
  </div>


  <script src="/yoga/Public/layer/layer.js"></script>


<script type="text/javascript" src="/yoga/Public/yoga/js/main.js"></script>




</body>
</html>