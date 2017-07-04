<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
 <link rel="stylesheet" type="text/css" href="/yoga/Public/yoga/js/jquery.webui-popover.min.css">



  <title><?php echo ($active["ad_title"]); ?></title>
  
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

 img,video,embed,iframe,ul{
       max-width: 100%; /*图片自适应宽度*/
       height:auto;

       }
.knowlg-detail-content a,.knowlg-detail-content p{word-break:break-all;}

  </style>
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
      <div><img src="/yoga/Public/yoga/img/icon4.png" alt="">
      <span>日期：</span>&nbsp;<span><?php echo ($active["ad_starttime"]); ?>～<?php echo ($active["ad_stoptime"]); ?></span>&nbsp;&nbsp;&nbsp;&nbsp;
      <span>截止报名时间：</span>&nbsp;<span><?php echo (date("Y-m-d H:i:s",$active["ad_closingtime"])); ?></span>&nbsp;&nbsp;&nbsp;&nbsp;

      <span><?php if($active["ad_closingtime"] >= NOW_TIME): ?><span style="color:green;font-size:16px;font-weight:bold;">报名中</span><?php else: ?><span style="color:red;font-size:16px;font-weight:bold;">截止报名</span><?php endif; ?></span></div>
      <div><img style="width:18px;" src="/yoga/Public/yoga/img/icon5.png" alt=""><span>地点：</span>&nbsp;<span><?php echo ($active["ad_adress"]); ?></span></div>
      <div><img style="width:18px;" src="/yoga/Public/yoga/img/icon6.png" alt=""><span>负责人：</span>&nbsp;<span><?php echo ($active["ad_person"]); ?></span><span style="margin-left: 15px;">联系方式：</span>&nbsp;<span><?php echo ($active["ad_tel"]); ?></span></div>
      <div><img src="/yoga/Public/yoga/img/icon7.png" alt=""><span>名额：</span>&nbsp;<span><?php echo ($active["ad_num"]); ?>/<?php if($active["ad_maxnum"] == 0): ?>不限<?php else: echo ($active["ad_maxnum"]); endif; ?></span></div>
      </div>
    </div>

    <div class="knowlg-detail-content">
        <p style="border:1px solid #DCDCDC;line-height:30px;padding-left:10px;padding-top:5px;padding-right:10px;padding-bottom:5px;"><span style="font-weight:bolder;">简介:</span><span style="color:#A9A9A9;"><?php echo ($active["ad_say"]); ?></span></p>
        <div class="ad_content"><?php echo ($active["news_content_body"]); ?></div>
    </div>

    <script src="/yoga/Public/ueditor/ueditor.config.js" type="text/javascript"></script>
    <script src="/yoga/Public/ueditor/ueditor.all.js" type="text/javascript"></script>

    <script type="text/javascript">
        uParse('.ad_content',{rootPath: '/yoga/Public/ueditor/'});
      </script>
    <div class="knowlg-detail-action">
      <!-- 修改a便签内的data-content属性可更换二维码 -->
      <a class="knowlg-detail-action-item knowlg-detail-share" href="#" role="button" data-toggle="popover" data-placement="bottom" >
        <img src="/yoga/Public/yoga/img/share1.png" alt="">
      </a>
      <div class="webui-popover-content">
      </div>
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
<?php if($register_status != 0): ?><div class="bottom-btn bottom-btn2">
    <a href="#" id="register"><img src="/yoga/Public/yoga/img/hand.png" alt="">&nbsp;&nbsp;&nbsp;&nbsp;我要报名</a>
  </div>
  <?php else: ?>
  <div class="bottom-btn bottom-btn3">
    <a href="javascript:return false;" id="nore"><img src="/yoga/Public/yoga/img/hand.png" alt="">&nbsp;&nbsp;&nbsp;&nbsp;我要报名</a>
  </div><?php endif; ?>
</div>
<script type="text/javascript" src="/yoga/Public/yoga/js/jquery-1.12.2.min.js"></script>

  <script type="text/javascript" src="/yoga/Public/yoga/js/jquery.qrcode.js"></script>
    <script type="text/javascript" src="/yoga/Public/yoga/js/qrcode.js"></script>
    <script type="text/javascript" src="/yoga/Public/yoga/js/jquery.webui-popover.min.js"></script>
    <script type="text/javascript" src="/yoga/Public/yoga/js/jquery.cookie.js"></script>


    <script type="text/javascript">

    $(function() {
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

    $('#back').click(function(e) {
    	e.preventDefault();
    	 var cookie=$.cookie('activeback');
    	 if(cookie){

    		 window.location.href=cookie;

    	 }else{
    		 window.location.href="<?php echo U('Active/activeload');?>";
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
     $('.knowlg-detail-share').webuiPopover({

       });
     $('.webui-popover-content').qrcode({
	        text: window.location.href,//二维码代表的字符串（本页面的URL）
	        width: 167,//二维码宽度
	        height: 167//二维码高度
	    })
 		 $('.knowlg-detail-share')
 	      .click(function(e) {
 	         e.preventDefault();
 	         if ($(this).hasClass('active')) {
 	           $(this).removeClass('active');
 	           $(this).find('img').attr('src', hide_share);
 	         } else {

 	           $(this).addClass('active');
 	           $(this).find('img').attr('src', show_share);
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

 		});
 	}
    });

    </script>
<script type="text/javascript">
 var screenWidth=$(window).width();
 var maxWidth=$('.knowlg-detail-content').width();     //图片在手机端最大宽度
var realWidth=$(".ad_content img").attr("width");   //图片实际宽度
  var realHeight=$('.ad_content img').attr("height");

   $('.ad_content img').each(function(){ //jquery.each()循环读取所有图片
        var realHeight = $(this).attr("height");
        var realWidth = $(this).attr("width");
        var phoneHeight=Math.ceil(maxWidth*realHeight/realWidth);  //计算出手机端应有的高度
        if(screenWidth<512){
          $(this).css("height", phoneHeight);
        }
    });
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




</body>
</html>