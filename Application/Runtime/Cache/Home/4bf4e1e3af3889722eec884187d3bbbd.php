<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>生活的艺术-关于我们</title>

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


<link rel="stylesheet" type="text/css" href="/yoga/Public/yoga/wxh/css/about.css">
</head>

<body>
<div class="phone">
	<ul>
		<li><a href="about.html#first" class="on">关于我们</a></li>
		<li><a href="about.html#second">净化呼吸法</a></li>
	</ul>
</div>

<div  class="topcss">
<div class="whiteLevel">
<h2>生活的艺术-简介</h2>
		<hr class="firstHr">
		<!-- 左边锚点按钮 -->
		<div class="maodian">
			<ul>
				<li><a href="about.html#first" class="aboutUs on">关于我们</a></li>
				<li><a href="about.html#second">净化呼吸法</a></li>
			</ul>
		</div>
		<a name="first"></a>
		<img src="/yoga/Public/yoga/wxh/images/aboutusbanner.jpg" alt="" class="img-responsive center-block">
</div>
</div>

<div class="bg">
	<!-- 白底 -->
	<div class="whiteLevel">

		<!-- 右边内容区 -->
		<div class="neirong">
			<div class="one">

				<!--  <span class="tianxia"><strong>天下一家</strong></span>-->
				<!-- 关于我们 -->
				<h3 style="color:#FEAE03;letter-spacing:3px;"><strong>关于我们</strong></h3>
                <h4 style="font-size:24px;color:#FEAE03;letter-spacing:3px;"><strong>生活的艺术（ Art Of Living）</strong></h4>
				<hr class="secondHr">
                <img src="/yoga/Public/yoga/wxh/images/main-gywm.png" alt="" class="insertImgR img-responsive">
				<p>“生活的艺术”，是国际非营利性的教育、慈善与人文组织，同时亦是全球最大的义工组织，活动范围涵盖社会服务、文化及心灵成长等方面，受益人群超过3亿多，因为 “生活的艺术“的愿景是实现“无疾病的身体、无颤抖的呼吸、无压力的心智、无创伤的记忆、无暴力的社会”。自1982 年在印度创立至今，已在全世界五大洲近150多个国家和地区设有中心，为现代人的生命品质的提升提供简单轻松易学的方法。</p>
				<p>生活的艺术的起源是在1982年，由Sri Sri Ravi Shankar(诗丽•诗丽•若威香卡，我们称他为古儒吉)在闭关静心10天的全然宁静中帶出净化呼吸法，并由此开启了他在全球”生活的艺术课程”分享与传授。</p>
				<p>“呼吸是我们通往自己内在，获得内在力量和疗愈自己的途径。” 净化呼吸法是独特、极具威力的呼吸方法，可快速消除人们的紧张、压力与负面情绪，摆脱各种烦忧、体验完全活在当下的生命滋味，不仅促进身、心、情绪的完美健康，亦能提升灵性的成长。古儒吉对人类身、心、灵运作与心智/意识与健康的关系有深刻的洞察，让人们可以借由自己的呼吸，释放压力、安定内心并使生命焕发热忱、喜悦、健康与自在。</p>
				<p>“生活的艺术”系列课程及技术已推广遍及全球150余国以上，惠及全球数以千万计的人，帮助不同国籍、种族、文化、宗教、教育、与社会阶层的人远离病痛、走出忧郁、自杀倾向以及暴力行为，从而使生命有了全然不同的转变。</p>
				<p>“生活的艺术”系列课程包含：快乐课程（初级课）、静默的艺术课程（高级课）、完美瑜伽I /II、理疗瑜伽、三摩地静心课、全方位潜能开发儿童课（8-13岁）、青少年课（14-18岁）、永恒过程、儿童瑜伽、兒童直觉开发课、快乐课师资培训课、完美瑜伽师资培训课、爱育吠陀养生烹饪课、突破自我边界课程（DSN)、吠陀智慧等。</p>
			</div>


			<div class="one">
				<!-- 古儒吉– 用爱转动世界 -->
				<hr class="secondHr">
				<img src="/yoga/Public/yoga/wxh/images/gunuoji1.jpg" class="insertImgL img-responsive" alt="">
				<p>国际生活的艺术基金会（ AOL ）组织创始人诗丽•诗丽•若威香卡</p>
				<p>多年来，他致力于提升大众的整体健康、生命品质、及对于生命知识的了解，在世界各地有许多教育、慈善与研究机构在他的影响下一一成立。</p>
				<p>古儒吉的影响范围从印度两万五千多个村庄到南非的小镇、从中东战争的和平谈判，到调停哥伦比亚内战，使历经50多年处于战争状态的双方停战通过谈话解决分歧。他在世界各冲突频传的区域，参与和平谈话与谘商。</p>
				<img src="/yoga/Public/yoga/wxh/images/gunuoji2.jpg" class="insertImgR img-responsive" alt="">
				<p>每年，古儒吉行程遍及近四十个国家，凝聚全球的智慧和力量去消弭分歧，为人们带去祥和与祝福。他的讯息简单而充满力量：“天下一家”，“生命是一场庆典”，“爱与智慧能战胜憎恨与苦难”。2006年于印度班加罗尔带领全球150多个国家逾250万人静坐，2016印度班新德里带领全球150多个国家逾350万人静坐 ，为世界和平祈祷。</p>
				<p>他多年来在世界各地的推广工作与成效屡获全球各地的政府与国际组织的肯定。曾受印度前总理拉吉夫•甘地赠与“瑜伽至高上师“的头衔，三度被提名诺贝尔和平奖，他受邀于全球各著名的论坛演说 ：包括联合国千禧年（2000年）世界和平高峰会、世界经济论坛（2001、2003年）及全球各地许多的国会议堂。</p>
			</div>


			<!-- 视频1,2 -->
			<div class="shipin">
            	<span class="tianxia"><strong>爱转动世界</strong></span>
				<iframe class="vplayer" height=498 width=510 src="http://player.youku.com/embed/XMTcyMjg2ODIxNg==" frameborder=0 allowfullscreen></iframe>

			</div>

			<div class="one" style="margin-top:5%;">
				<!-- 净化呼吸法 -->
				<a name="second"></a>
				<h4 style="font-size:24px;color:#FEAE03;margin-top:10px;"><strong>净化呼吸-回归本性韵律的呼吸技巧</strong></h4>


				<hr class="secondHr">

				<p>淨化呼吸蕴含呼吸自然而特定的韵律，可以协调身、心与情绪。这	个独特的呼吸方法可以消除压力、疲劳以及诸如愤怒、挫折和忧郁等负面情绪，让人不仅平静安详，且精力充沛，既能处于放松状态，注意力却又能专注。</p>
				<p>"我们内在需要做清洁淨化的过程。我们在睡眠中消除了疲惫，但是深沉的压力仍旧在我们体内，淨化呼吸清洁淨化体内的系统。呼吸藏著天大的奥秘"</p>
				<p>透过呼吸掌控情绪。一群欧洲研究学者发现，呼吸是心智与身体之间的桥梁，每一种情绪有不同明显的呼吸模式。例如，当我们生气时：呼吸变得短而且急促;悲伤或沮丧时:呼吸变得深长!</p>
				<p>反之亦然，特定的呼吸模式会导引相对应的情绪模式。所以与其让情绪左右我们，倒不如利用特有的呼吸技巧来转换情绪。在淨化呼吸过程中，我们学会通过呼吸技巧来改变我们感觉的方式，因而转换了会引发压力、愤怒、焦虑、忧鬱及担忧的负面情绪，带给心智完全快乐、放松及充满能量。以正面的视角看待身边的实物，活出更健康、更有质量的生命。</p>
				<p>淨化呼吸可以帮助清除每日及常年累积的压力，增加全身系统的协调性。研究报告显示，泌乳激素(Prolactin)一种幸福荷尔蒙在首次的淨化呼吸练习过程中会明显增加。</p>
				<p>净化呼吸已经在全球掀起健康快乐的热潮。全球有许多业界领先的企业都将快乐课程作为员工及管理层的培训内容，哈佛、斯坦福、麻省理工学院等名牌大学更是将“生活的艺术”快乐课程列入可以获取学分的选修课程。</p>
			</div>


			<!-- 视频3,4 -->
			<div class="shipin">
            	<span class="tianxia"><strong>呼吸的科学</strong></span>
				<iframe src='http://player.youku.com/embed/XMTcxODk0MzI0MA==' frameborder=0 'allowfullscreen'></iframe>

				<br>
                <span class="tianxia"><strong>净化呼吸法对改变基因的研究</strong></span>
				<iframe height=498 width=510 src='http://player.youku.com/embed/XMTcxODk0NDc0MA==' frameborder=0 'allowfullscreen'></iframe>

			</div>
		</div>

		<div class="clearfix"></div>
	</div>
</div>

<!-- 引入script脚本 -->

<script type="text/javascript" src="/yoga/Public/yoga/wxh/js/about.js"></script>
<script>
$(function(){
	$('.maodian li a').click(function(){
		$(this).addClass('on').parent().siblings().find('a').removeClass('on');
	})
	$('.phone li a').click(function(){
		$(this).addClass('on').parent().siblings().find('a').removeClass('on');
	})
})
</script>
<link rel="stylesheet" type="text/css" href="/yoga/Public/layer2/skin/layer.css">

<script>
$(function(){
  $('#wx3').on('click', function(){
    layer.open({
    type: 1,
  title: false,
  closeBtn:0,
  scrollbar: false,
    area: ['300px', '300px'],
    shadeClose: true, //点击遮罩关闭
    content: '\<\div style="height:auto;overflow:hidden;width:300px;height:300px;"><img src="/yoga/Public/yoga/img/shanghai.jpg" style="width:100%"><\/div>'
    });
  });
});
$(function(){
  $('#wx1').on('click', function(){
    layer.open({
    type: 1,
  title: false,
  closeBtn:0,
  scrollbar: false,
    area: ['300px', '300px'],
    shadeClose: true, //点击遮罩关闭
    content: '\<\div style="height:auto;overflow:hidden;width:300px;height:300px;"><img src="/yoga/Public/yoga/img/beijing.jpg" style="width:100%"><\/div>'
    });
  });
});
$(function(){
  $('#wx2').on('click', function(){
    layer.open({
    type: 1,
  title: false,
  closeBtn:0,
  scrollbar: false,
    area: ['300px', '300px'],
    shadeClose: true, //点击遮罩关闭
    content: '\<\div style="height:auto;overflow:hidden;width:300px;height:300px;"><img src="/yoga/Public/yoga/img/chengdu.jpg" style="width:100%"><\/div>'
    });
  });
});
</script>
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

    <div class="col-lg-7 col-md-7 col-sm-7 footer-focus" >
        <h5 class="gzwx">关注微信</h5>
        <div class="item-detail">
        <div class="codeImg-wrap" id="wx3"><img src="/yoga/Public/yoga/img/shanghai.jpg"><span style="font-size:14px;text-align:center;display:block">上海</span></div>
          <div class="codeImg-wrap" id="wx1"><img src="/yoga/Public/yoga/img/beijing.jpg"><span style="font-size:14px;text-align:center;display:block">北京</span></div>
          <div class="codeImg-wrap" id="wx2"><img src="/yoga/Public/yoga/img/chengdu.jpg"><span style="font-size:14px;text-align:center;display:block">成都</span></div>
         <!--   <div class="codeImg-wrap"><img src="/yoga/Public/yoga/img/hangzhou.jpg"><span style="font-size:14px;text-align:center;display:block">杭州</span></div>-->

      	</div>
    </div>
    <div class="col-xs-12 col-sm-12 footer-end" id="beian">闽ICP备16023905号-1</div>
  </div>


  <script src="/yoga/Public/layer2/layer.js"></script>


<script type="text/javascript" src="/yoga/Public/yoga/js/main.js"></script>




</body>
</html>