<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>课程介绍-完美瑜伽</title>

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


<link rel="stylesheet" type="text/css" href="/yoga/Public/yoga/wxh/css/courseIntroduce.css">
</head>

<body>
<!-- 顶部大图 -->
<div class="topImg"><img src="/yoga/Public/yoga/wxh/images/wanmei.png"></div>

<div class="container whole">

	<!-- 中间标题 -->
	<div class="whiteDiv">
		<h3 class="toHeart">生活的艺术"完美瑜伽"</h3>
		<p class="highcourse">展现纯净的瑜伽真谛-释放身心压力之道</p>

		<!-- 课程时间和参赛资格 -->
		<div class="timeAndRight">
			<div class="timeAndRightFirst">
				<img src="/yoga/Public/yoga/wxh/images/timeAndRight2.jpg">
			</div>
			<div class="timeAndRightSecond">
				<h3 class="bottom-line">课程内容:</h3>
				<p>欢迎来到生活的艺术瑜伽-纯正与可靠的瑜伽形式。一套完整的瑜伽科学。在生活的艺术瑜伽里，瑜伽智慧与技术皆采用一种欢快扎实的方式呈现。同时结合温和伸展与提升活力的体位法，针对身体整体健康设计，着重不仅身体层面，还蕴含心灵滋养。</p>
				<p>经过几个世纪流传至今的瑜伽体位法，与来自古代经典的智慧结合后带给您的格式将帮助您提高生活素质。</p>
				<p>透过课程中所教导的瑜伽练习，参与者不仅能达到改善体重的效果，还能改善各种慢性疾病，如：失眠、哮喘病、糖尿病、高血压及头痛。生活的艺术瑜伽里的瑜伽动作是专为学员达到平衡健康与心灵平静而设的。</p>
			</div>

		</div>

		<!-- 清除浮动 -->
		<div class="clearfix"></div>

		<!-- 课程内容介绍 -->
		<div class="neirong">
			<div class="rightNeirong">
				<img src="/yoga/Public/yoga/wxh/images/neirong2.jpg">
			</div>
			<div class="twoLevel heartLevel">
				<h3 class="bottom-line">心灵层面</h3>
				<p>发展直觉力</p>
				<p>解压及舒缓心智</p>
				<p>提升之力</p>
				<p>改善记忆力</p>
				<p>替身思绪的清晰度</p>
				<p>让人生中的创造力绽放</p>
			</div>
			<div class="twoLevel bodyLevel">
				<h3 class="bottom-line">身体层面</h3>
				<p>加强及修复内脏</p>
				<p>改善灵活度</p>
				<p>加强肌耐力及筋骨</p>
				<p>改善姿势及矫正身体</p>
				<p>促进消化、循环与免疫力</p>
				<p>强化神经系统与内分泌器官功能</p>
				<p>然你更朝气蓬勃</p>
			</div>
			<div class="clearfix"></div>

			<img src="/yoga/Public/yoga/wxh/images/houlfe.jpg" alt="" class="img-responsive center-block" style="margin:40px auto 0 auto;">
		</div>
	</div>

	<!-- 清除浮动 -->
	<div class="clearfix"></div>





	<!-- 我要参加 -->
	<a href="<?php echo U('Class/classload');?>" class="join">我 要 参 加</a>
</div>

<!-- 引入script脚本 -->

<script type="text/javascript" src="/yoga/Public/yoga/wxh/js/courseIntroduce.js"></script>



<div class="g-footer clearfix">
    <div class="col-lg-2 col-md-2 col-sm-2 delPadd">
      <div class="footer-logo-wrap"><img src="/yoga/Public/yoga/img/logo.png"></div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 footer-text">
        <h5>网站说明</h5>
        <div class="item-detail">
          <p><a href="<?php echo U('About/about');?>">关于我们</a></p>
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
    <div class="col-xs-12 col-sm-12 footer-end">闽ICP备16023905号-1</div>
  </div>


  <script src="/yoga/Public/layer/layer.js"></script>


<script type="text/javascript" src="/yoga/Public/yoga/js/main.js"></script>



</body>
</html>