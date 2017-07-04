<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>课程介绍-三摩地静心课</title>

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


<link rel="stylesheet" type="text/css" href="/yoga/Public/yoga/wxh/css/courseIntroduce2.css">
</head>

<body>
<!-- 顶部大图 -->
<div class="topImg"><img src="/yoga/Public/yoga/wxh/images/topImg2.jpg"></div>

<!-- 手机端放背景图大div -->
<div class="bg">
	<!-- 中间标题及小图片区 -->
	<div class="container bg-color">
		<h3 class="middleTitle">三摩地静心课程</h3>
		<div class="row">
			<div class="col-md-9 col-sm-9 wenzi">
				<h4>静心并非由生活中逃离，而是与生命本质的真诚拥抱！</h4>
				<p>自然三摩地静心是一种优雅而不费力的静坐，带领我们超越一般的心智压力及心绪的焦虑，感受深沉的休息。20分钟的静心，相当于8小时的睡眠！</p>
			</div>
			<div class="col-md-3 col-sm-3 gift">
				<img src="/yoga/Public/yoga/wxh/images/sunsm.jpg" class="img-responsive">
			</div>
		</div>
	</div>

	<!-- 下方四个介绍区域 -->
	<div class="jieshaowhole">
		<div class="container">
			<div class="row row-four">
				<div class="col-md-5 col-sm-5">
					<h4 class="bottom-line">课程说明</h4>
					<p>每节约2小时，共三节课程，在连续三天中完成。第一节为个别指导，课程中老师会带领学员，体验此一简单无为的静心法，依据练习的经验，给出进一步的知识。后续指导与日常生活中每日两次/每次20分钟的静心，会让你体验生命中未曾透露的深度、喜悦、与爱的绽放。</p>
					<span class="horizion"></span>
					<span class="vertical"></span>
				</div>
				<div class="col-md-6 col-sm-6 col-sm-offset-1" class="fji">
					<h4 class="bottom-line1">起源与传承</h4>
					<p>自然三摩地静心法源自吠陀传统，它提供一种令人讶异、简单、优雅、却又毫不费心力的过程，有异于市面上其他均需某种层次心理工作的冥想法门。静心并非思考有兴趣的主题。自然三摩地静心法使心智脱离所有表层概念，带引你回归本我觉知与宁静。有效的静心法并非任何形式的努力或集中。</p>
					<span class="horizion"></span>
					<span class="vertical"></span>
				</div>
				<div class="clearfix"></div>
				<div class="col-md-12 col-sm-12">
					<h4 class="bottom-line1">优点与效益</h4>
					<div class="col-md-8 col-sm-8" style="padding:0;">
						<p>自然三摩地意味不费力的超越。参与者学习放下所有的紧张及压力，提供心智亟需的深度休息，令清醒的心智安顿于本我深处。它能在短时间里松弛紧绷的神经、释放压力，使头脑获得深度休息与充电，由波动的负面情绪中回复平静，同时滋养内在性灵、强化体能与免疫力、延缓老化，并开发未知潜能。</p>
					</div>
					<div class="col-md-4 col-sm-4">
						<img src="/yoga/Public/yoga/wxh/images/xinsammo.jpg" alt="" class="img-responsive xinsammo">
					</div>
					<span class="horizion"></span>
					<span class="vertical"></span>
				</div>
				<!-- <div class="col-md-5 col-sm-5">
					<h4>如何学习</h4>
					<hr />
					<p>生命的内在旅程是无与伦比的探险。它无法藉由书本而得知。合格适任的指引在此项学习中占重要的一环。</p>
					<span class="horizion"></span>
					<span class="vertical"></span>
				</div> -->

			</div>
		</div>
	</div>

</div>

<!-- 我要参加 -->
<a href="<?php echo U('Class/classload');?>" class="join">我 要 参 加</a>

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