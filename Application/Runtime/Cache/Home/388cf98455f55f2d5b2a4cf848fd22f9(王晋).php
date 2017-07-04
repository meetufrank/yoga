<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link rel="stylesheet" type="text/css" href="/yoga/Public/yoga/css/bootstrap-3.3.6-dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="/yoga/Public/yoga/css/static.css">
  <link rel="stylesheet" type="text/css" href="/yoga/Public/yoga/css/main.css">
   <script src="/yoga/Public/assets/js/jquery.min.js"></script>

  <style type="text/css">
    html,
    body {
      height: 100%;
      position: relative;
      overflow-x: visible;
    }
    .backto-top {
		bottom: 70px;
    }
  </style>
  <title>活动-<?php echo ($active["ad_title"]); ?></title>
  
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
<div class="knowlg-detail">
  <div class="knowlg-detail-header">
    <h2><?php echo ($active["ad_title"]); ?></h2>
    <div class="knowlg-detail-data clearfix">
      <div class="knowlg-time"><img style="width: 16px;" src="/yoga/Public/yoga/img/time.png" alt="">&nbsp;<span><?php echo ($active["ad_addtime"]); ?></span></div>
      <div class="knowlg-icon-wrapper">
        <div class="knowlg-view" ><img src="/yoga/Public/yoga/img/icon1.png" alt="">&nbsp;<span><?php echo ($active["ad_readnum"]); ?></span></div>
        <div class="knowlg-praise" id="agree"><img src="/yoga/Public/yoga/img/icon2.png" alt="">&nbsp;<span id="agnum"><?php echo ($active["ad_agreenum"]); ?></span></div>
        <div class="knowlg-like" id="save"><img src="/yoga/Public/yoga/img/icon3.png" alt="">&nbsp;<span id="sanum"><?php echo ($active["ad_savenum"]); ?></span></div>
      </div>
    </div>
  </div>
  <div class="knowlg-detail-body">
    <div class="knowlg-image-wrapper">
      <img src="/yoga/Public<?php echo ($active["ad_photo"]); ?>" alt="<?php echo ($active["ad_title"]); ?>">
    </div>
    <div class="detail-summary">
      <div class="detail-inner-wrapper">
      <div><img src="/yoga/Public/yoga/img/icon4.png" alt=""><span>日期：</span>&nbsp;<span><?php echo ($active["ad_starttime"]); ?>～<?php echo ($active["ad_stoptime"]); ?></span>&nbsp;&nbsp;&nbsp;&nbsp;<span><?php if($active["ad_closingtime"] >= NOW_TIME): ?><span style="color:green;font-size:16px;font-weight:bold;">报名中</span><?php else: ?><span style="color:red;font-size:16px;font-weight:bold;">截止报名</span><?php endif; ?></span></div>
      <div><img style="width:18px;" src="/yoga/Public/yoga/img/icon5.png" alt=""><span>地点：</span>&nbsp;<span><?php echo ($active["ad_adress"]); ?></span></div>
      <div><img style="width:18px;" src="/yoga/Public/yoga/img/icon6.png" alt=""><span>负责人：</span>&nbsp;<span><?php echo ($active["ad_person"]); ?></span><span style="margin-left: 15px;">联系方式：</span>&nbsp;<span><?php echo ($active["ad_tel"]); ?></span></div>
      <div><img src="/yoga/Public/yoga/img/icon7.png" alt=""><span>名额：</span>&nbsp;<span><?php echo ($active["ad_num"]); ?>/<?php echo ($active["ad_maxnum"]); ?></span></div>
      </div>
    </div>

    <div class="knowlg-detail-content">
        <h2><?php echo ($active["ad_say"]); ?></h2>
        <div class="ad_content"></div>
    </div>

    <script src="/yoga/Public/ueditor/ueditor.config.js" type="text/javascript"></script>
    <script src="/yoga/Public/ueditor/ueditor.all.js" type="text/javascript"></script>

    <script type="text/javascript">
          var str="<?php echo ($active["news_content_body"]); ?>";


          $(".ad_content").html( UE.utils.html( str ) );
      </script>
    <div class="knowlg-detail-action">
    <div id="qrcodeCanvas" style="display:none;"></div>
      <a class="knowlg-detail-action-item knowlg-detail-share" href="#">
        <img src="/yoga/Public/yoga/img/share1.png" alt="">

      </a>
      <a class="knowlg-detail-action-item knowlg-detail-praise" href="#">
        <img <?php if($agree == 1): ?>src="/yoga/Public/yoga/img/praise2.png"<?php else: ?>src="/yoga/Public/yoga/img/praise1.png"<?php endif; ?> alt="">
      </a>
      <a class="knowlg-detail-action-item knowlg-detail-like" href="#">
        <img   <?php if($save_status == 1): ?>src="/yoga/Public/yoga/img/like2.png"<?php else: ?>src="/yoga/Public/yoga/img/like1.png"<?php endif; ?> alt="" >
      </a>
    </div>


    <div class="hidden-image-container">
      <img class="show-share" src="/yoga/Public/yoga/img/share2.png" alt="">
      <img class="hide-share" src="/yoga/Public/yoga/img/share1.png" alt="">
      <img class="hide-praise" src="/yoga/Public/yoga/img/praise1.png" alt="">
      <img class="show-praise" src="/yoga/Public/yoga/img/praise2.png" alt="">
      <img class="show-like" src="/yoga/Public/yoga/img/like2.png" alt="">
      <img class="hide-like" src="/yoga/Public/yoga/img/like1.png" alt="">
    </div>

  </div>
</div>
<div class="backto-top">
  <a href="#"><img src="/yoga/Public/yoga/img/up.png" alt=""></a>
</div>
<div class="details-bottom-wrapper clearfix">
  <div class="bottom-btn bottom-btn1" id="back">
    <a href="#"><img src="/yoga/Public/yoga/img/back.png" alt="">&nbsp;&nbsp;&nbsp;&nbsp;返回</a>
  </div>
  <div class="bottom-btn bottom-btn2">
    <a href="#" id="register"><img src="/yoga/Public/yoga/img/hand.png" alt="">&nbsp;&nbsp;&nbsp;&nbsp;我要报名</a>
  </div>
</div>
<script type="text/javascript" src="/yoga/Public/yoga/js/jquery-1.12.2.min.js"></script>
<script type="text/javascript" src="/yoga/Public/yoga/js/main.js"></script>

  <script type="text/javascript" src="/yoga/Public/yoga/js/jquery.qrcode.js"></script>
    <script type="text/javascript" src="/yoga/Public/yoga/js/qrcode.js"></script>
    <script type="text/javascript" src="/yoga/Public/yoga/js/jquery.cookie.js"></script>


    <script type="text/javascript">

    $('#back').click(function(e) {
    	e.preventDefault();
    	 var cookie=$.cookie('active_back');
    	 if(cookie=='1'){
    		 $.cookie('active_back', null);
    		 window.location.href="<?php echo U('Active/activeload');?>";

    	 }else{
    		 window.history.go(-1);
    	 }




    })

 	/* 分享，点赞，收藏 */
 	var $hidden_image_container = $('.hidden-image-container');

 	if ($hidden_image_container) {
 		var show_share = $hidden_image_container.find('.show-share').attr('src');
 		var hide_share = $hidden_image_container.find('.hide-share').attr('src');
 		var hide_praise = $hidden_image_container.find('.hide-praise').attr('src');
 		var show_praise = $hidden_image_container.find('.show-praise').attr('src');
 		var show_like = $hidden_image_container.find('.show-like').attr('src');
 		var hide_like = $hidden_image_container.find('.hide-like').attr('src');
 		$('.knowlg-detail-share').click(function(e) {
 			e.preventDefault();




 			if ($(this).hasClass('active')) {

 				$(this).removeClass('active');
 				$(this).find('img').attr('src', hide_share);
 				$('#qrcodeCanvas').empty();
 				$('#qrcodeCanvas').attr('style', 'display:none;');
 			} else {
 				$(this).addClass('active');
 				$(this).find('img').attr('src', show_share);
 				$('#qrcodeCanvas').qrcode({
 			        text: window.location.href,//二维码代表的字符串（本页面的URL）
 			        width: 167,//二维码宽度
 			        height: 167//二维码高度
 			    });
 				$('#qrcodeCanvas').attr('style', 'display:block;');


 			}
 		});
 		$('.knowlg-detail-praise').click(function(e) {
 			e.preventDefault();
 			var $that = $(this);
 			$.post('<?php echo U("active/addagree");?>',
					  {id:<?php echo ($active["ad_id"]); ?>},
				function(data){

					if(data.status){

						var v=$('#agnum').html();


						if(data.info=='取消点赞'){
							var vl=parseInt(v)-1;
							$that.removeClass('active');
							$that.find('img').attr('src', hide_praise);
							layer.alert(data.info, {icon: 6}, function(index){
					 			layer.close(index);

								});
							$('#agree').find("span").text(vl);//页面元素减1
						}else{
							var vl=parseInt(v)+1;
							$that.addClass('active');
							$that.find('img').attr('src', show_praise);
							layer.alert(data.info, {icon: 6}, function(index){
					 			layer.close(index);

								});
							$('#agree').find("span").text(vl);//页面元素加1

						}

					}
				});

 		});
 		$('.knowlg-detail-like').click(function(e) {
 			e.preventDefault();
 			var $that = $(this);
 			$.post('<?php echo U("active/addsave");?>',
					  {id:'<?php echo ($active["ad_id"]); ?>'},
				function(data){

					if(data.status){

						var v=$('#sanum').html();
						if(data.info=='取消收藏'){
							var vl=parseInt(v)-1;
							$that.removeClass('active');
							$that.find('img').attr('src', hide_like);
							layer.alert(data.info, {icon: 6}, function(index){
					 			layer.close(index);

								});
							$('#save').find("span").text(vl);//页面元素减1
						}else{
							var vl=parseInt(v)+1;
							$that.addClass('active');
							$that.find('img').attr('src', show_like);
							layer.alert(data.info, {icon: 6}, function(index){
					 			layer.close(index);

								});
							$('#save').find("span").text(vl);//页面元素加1
						}

					}else{
						layer.alert(data.info, {icon: 6}, function(index){
				 			layer.close(index);

							});

					}
				});

 		});


 		$('#register').click(function(e) {
 			e.preventDefault();
 			var $that = $(this);
 			$.post('<?php echo U("active/validte");?>',
					  {id:<?php echo ($active["ad_id"]); ?>},
				function(data){

					if(data.status==1){


					 			window.location.href=data.url;

					}else{

							layer.alert(data.info, {icon: 6}, function(index){
					 			layer.close(index);
					 			window.location.href=data.url;

								});


						}

					}

				);

 		})
 	}


    </script>
    <script type="text/javascript">
  $(window).resize(function() {
    var width = $('.knowlg-detail-body').width();
    $('.knowlg-detail-content')
      .find('img, video')
      .each(function() {
        if ($(this).width() > width) {
          $(this.width("100%"));
        }
      })
  }).trigger('resize');
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