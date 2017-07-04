<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>课程介绍-快乐课程</title>

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
  <?php if($_COOKIE['username']!= ''): ?><li <?php if($controller == 'user'): ?>class="active"<?php endif; ?>><a href="<?php echo U('User/person');?>"><?php echo (cookie('userpetname')); ?>的个人中心</a></li>
  <li><a href="<?php echo U('Login/logout');?>">退出</a></li>
  <?php else: ?>
    <li <?php if($controller == 'login'): ?>class="active"<?php endif; ?>><a href="<?php echo U('Login/login');?>">登录&nbsp;/&nbsp;注册</a></li><?php endif; ?>
  <li class="close-navbar"><a href="#" ><img class="close-navbar-img" src="/yoga/Public/yoga/img/close.jpg"><span>取消</span></a></li>
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


<link rel="stylesheet" type="text/css" href="/yoga/Public/yoga/wxh/css/courseIntroduce4.css">
</head>

<body>
<!-- 顶部大图 -->
<div class="topImg">
	<img src="/yoga/Public/yoga/wxh/images/MeditationSahaj1.jpg" alt="">
</div>

<div class="bg">
	<div class="container">
		<h3 class="title" style="margin-bottom:0px;">生活的艺术"快乐课程"</h3>
		<div class="row">
			<div class="col-sm-6 sContent bu">
				<h4>快乐的关键点就在您的鼻子底下</h4>
				<span>发现呼吸的密码</span>
				<p style="margin-top:10px;">你曾经留意过呼吸的模式会根据您正在经历的感受而变化吗？当您生气时，您在用什么节奏呼吸？浅而短的呼吸频率。当您放松和高兴的时候，那是怎样的呢？您深而长的呼吸，显然结论就是呼吸被我们的感受影响着，那么我们能把负面情绪通过呼吸转变吗？一定的。</p>
			</div>
			<div class="col-sm-6 sContent tong">
				<h4>通过净化呼吸法恢复与生俱足的自然快乐韵律</h4>
				<span>适用于当代社会的古老智慧</span>
				<p style="margin-top:10px;">生活的艺术快乐课程的核心是独特和深奥的呼吸技术。一个对调节身、心、灵回到本我的自然韵律特别有效的工具，净化呼吸法已经积极的转变了数以百计人的生命。</p>
			</div>
			<div class="clearfix"></div>
			<img src="/yoga/Public/yoga/wxh/images/icons-bar-01.png" alt="" class="img-responsive center-block joaso">
			<div class="col-sm-12 bottPs">
				<p>生命中我们做的一切事情都是为了让我们快乐;不幸的是，我们并不总是容易达到我们所想要的。快乐课程将带给你毫不费力重新连接上那个取之不尽、用之不竭的快乐源泉-那就是您。</p>
			</div>
			<div class="clearfix"></div>
			<div  class="tree">
				<div class="col-sm-3">
					<h3 class="bottom-line">课程内容</h3>
					<p>学简单的瑜伽体位法</p>
					<p>调息法</p>
					<p>独一无二的呼吸净化法</p>
					<p>轻松的静心</p>
					<p>古老智慧知识分享</p>
				</div>
				<div class="col-sm-6">
					<img src="/yoga/Public/yoga/wxh/images/tree.png" alt="" class="img-responsive">
				</div>
				<div class="col-sm-3">
					<h3 class="bottom-line">课程效益</h3>
					<p>减少压力</p>
					<p>改善健康</p>
					<p>更多的热枕</p>
					<p>更好的集中力</p>
					<p>提高自尊与自信</p>
				</div>
				<div class="clearfix"></div>
			</div>

		</div>
<?php $id = $_GET['id']; ?>
		<!-- 我要参加 -->
		<a href="<?php echo U('Class/classload',array('type'=>$id));?>" class="join">我 要 参 加</a>

	</div>

</div>


<!-- 返回顶部 -->
<a href="javascript:;" id="returnTop" title="回到顶部"></a>


<!-- 引入script脚本 -->



<div class="g-footer clearfix">
    <div class="col-lg-2 col-md-2 col-sm-2 delPadd">
      <div class="footer-logo-wrap"><img src="/yoga/Public/yoga/img/logo.png"></div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 footer-text">
        <h5>网站说明</h5>
        <div class="item-detail">
          <h5><a href="<?php echo U('About/about');?>">关于我们</a></h5>
        </div>
    </div>

    <div class="col-lg-7 col-md-7 col-sm-7 footer-focus">
        <h5 class="gzwx">关注微信</h5>
        <div class="item-detail">
        <div class="codeImg-wrap"><img src="/yoga/Public/yoga/img/shanghai.jpg"><span style="font-size:14px;text-align:center;display:block">上海</span></div>
          <div class="codeImg-wrap"><img src="/yoga/Public/yoga/img/beijing.jpg"><span style="font-size:14px;text-align:center;display:block">北京</span></div>
          <div class="codeImg-wrap"><img src="/yoga/Public/yoga/img/chengdu.jpg"><span style="font-size:14px;text-align:center;display:block">成都</span></div>
          <div class="codeImg-wrap"><img src="/yoga/Public/yoga/img/hangzhou.jpg"><span style="font-size:14px;text-align:center;display:block">杭州</span></div>

      	</div>
    </div>
    <div class="col-xs-12 col-sm-12 footer-end">闽ICP备16023905号-1</div>
  </div>


  <script src="/yoga/Public/layer/layer.js"></script>


<script type="text/javascript" src="/yoga/Public/yoga/js/main.js"></script>



</body>
</html>