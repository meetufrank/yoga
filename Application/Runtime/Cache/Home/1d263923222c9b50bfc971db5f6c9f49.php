<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html><html><head><meta charset=utf-8>
<title>生活的艺术-活动列表</title>


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


<meta name=viewport content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0">


<script>
window.__public__='/yoga/Public';
window.__url__='/yoga/Home/Active/active_list';
</script>
<style>.window-indi {
     position: fixed;
     z-index: 10000;
     bottom: 0;
     right: 0;
     width: 50px;
     height: 30px;
     line-height: 30px;
     color: #ffffff;
     font-size: 20px;
     text-align: center;
     background-color: grey;
   }</style>
   <link href=/yoga/Public/yoga/css/app.7875ef2411a2a1f42ad244c850dd1465.css rel=stylesheet></head><body><app></app><script>$(window).resize(function() {
     console.log('ok');
     $('.window-indi').html($('body').innerWidth());
   }).trigger('resize');</script><script type=text/javascript src=/yoga/Public/yoga/js/manifest.3c8a8ba77e1a56d142ed.js></script><script type=text/javascript src=/yoga/Public/yoga/js/vendor.045023d4653938ae0f50.js></script><script type=text/javascript src=/yoga/Public/yoga/js/app.405ffe56b329bbc71638.js></script>
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
          <h5 class="hidden-lg hidden-md">点击下方二维码扫描即可关注微信</h5>
        </div>
    </div>

    <div class="col-lg-7 col-md-7 col-sm-7 footer-focus" >
        <!--<h5 class="gzwx">关注微信</h5>-->
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




   </body></html>