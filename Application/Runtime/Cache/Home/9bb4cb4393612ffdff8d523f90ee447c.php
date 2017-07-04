<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="/yoga/Public/yoga/css/vux.css">

	<script src="http://cdn.bootcss.com/vue/1.0.25/vue.min.js"></script>
    <script src="http://cdn.bootcss.com/vue-resource/0.9.3/vue-resource.min.js"></script>
	<style type="text/css">
		.range-bar {
			background-color: #eeeeee;
		}
		.range-handle {
			background-color: #FFAE00;
		}
		.range-quantity {
			background-color: #FFAE00;
		    border-top-right-radius: 0px;
		    border-bottom-right-radius: 0px;
		}
		[v-cloak] {
			display: none;
		}
	</style>
	<title>生活的艺术-知识列表</title>
	
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


</head>
<body>

<div id="knowlg">
	<div class="knowlg-main">
		<div class="knowlg-filter-wrapper">
			<form action="" method="">
		    <div class="input-group">
		      <input type="text" placeholder="搜索您想要了解的瑜伽知识" class="form-control" v-model="keyword" style="border-radius:0;height:45px;font-size:14px;">
		      <span class="input-group-btn">
		        <button class="btn btn-primary btn-search" type="submit" style="background-color:#ffae00;outline:none;border-color:#ffae00;border-radius:0;height:45px;width:100px;" @click.prevent="getContent">搜索</button>
		      </span>
		    </div>
		  </form>
			<div class="knowlg-time-wrapper clearfix">
				<div class="knowlg-range-text">选择发布的时间段</div>
				<div class="knowlg-range-wrapper">
					<range :value.sync="time" :step=50 min-HTML="<span></span>" max-HTML="<span></span>" :range-bar-height=10 />
				</div>
				<div class="knowlg-range-times">
					<span class="left"><strong>一周</strong></span>
					<span class="right"><strong>全部</strong></span>
					<span class="middle"><strong>一个月</strong></span>
				</div>
			</div>
		</div>
		<div class="knowlg-main-area">
			<div class="knowlg-list-area clearfix" v-cloak>
				<div class="knowlg-item" v-for="item in items" v-bind:class="{'knowlg-left-item': $index % 2 == 0, 'knowlg-right-item':  $index % 2 == 1}">
				<div class="knowlg-item-inner-wrapper">
					<a class="knowlg-item-inner" v-bind:href="item.location_url"  style="min-height:150px;">
						<img v-bind:src="item.ms_photo | imageprefix" alt="">
						<div class="knowlg-item-title">{{item.ms_title}}</div>
					</a>
					<div class="knowlg-item-details clearfix">
						<div class="knowlg-time"><img src="/yoga/Public/yoga/img/time.png" alt="">&nbsp;<span>{{item.ms_addtime}}</span></div>
						<div class="knowlg-like"><img src="/yoga/Public/yoga/img/icon3.png" alt="">&nbsp;<span>{{item.ms_savenum}}</span></div>
						<div class="knowlg-praise"><img src="/yoga/Public/yoga/img/icon2.png" alt="">&nbsp;<span>{{item.ms_agreenum}}</span></div>
						<div class="knowlg-view"><img src="/yoga/Public/yoga/img/icon1.png" alt="">&nbsp;<span>{{item.ms_readnum}}</span></div>
					</div>
					</div>
				</div>
				<div class="g-content-more clearfix" style="clear:both;margin-bottom: 40px;">
          <div class="get-more-item" v-show="!is_getting_list&&more"><span class="white-line"></span>
          <a @click.prevent="getMore" href="#"><span>more</span><img src="/yoga/Public/yoga/img/down.png" alt=""></a></div>
          <div class="loading-gif" v-show="is_getting_list" style="text-align:center;"><img src="/yoga/Public/yoga/img/loading.gif" alt=""></div>
        </div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="/yoga/Public/yoga/js/jquery-1.12.2.min.js"></script>
<script type="text/javascript" src="/yoga/Public/yoga/js/main.js"></script>
<script type="text/javascript" src="/yoga/Public/yoga/js/range/index.js"></script>
<script type="text/javascript">
	var static_prefix = '/yoga/Public';
	Vue.filter('imageprefix', function(value) {
	  return static_prefix + value
	});
	var url1 = "<?php echo U('knows/knows_list');?>";
	Vue.component('range', vuxRange)
	var knowlg = new Vue({
		el: '#knowlg',
		ready: function() {
		  this.$http.get(url1, {params: {key: this.keyword, time: this.stime, page_num: this.page}}).then(function(response) {
		  	console.log(response)
		  	var responseData = response.data
      	    if (typeof responseData === 'string') {
		      responseData = JSON.parse(responseData)
		    }
	     	this.items = responseData.data
	     	this.more = responseData.have_more
		  }, function(response) {

		  });
		},
		data: {
			time: 100,
			keyword: '',
			page: 1,
			items: [],
			is_getting_list: false,
			more: true
		},
		computed: {
			stime: function() {
				if (this.time == 0) {
					return 'week';
				}
				else if (this.time < 52&&this.time>49) {
					return 'month';
				}
				else {
					return 'year';
				}
			}
		},
		methods: {
			getMore: function() {
				this.page += 1;
				this.$http.get(url1, {params: {key: this.keyword, time: this.stime, page_num: this.page}}).then(function(response) {
		     	console.log(this.items )
		     	console.log('1=>')
		     	var responseData = response.data
      	        if (typeof responseData === 'string') {
		          responseData = JSON.parse(responseData)
		        }

		     	this.items = $.extend({},this.items, responseData.data);
		     	this.more = responseData.have_more
		     	console.log(this.items);
			  }, function(response) {

			  });
			},
			getContent: function() {
				this.page = 0;
				this.items = []
				this.$http.get(url1, {params: {key: this.keyword, time: this.stime, page_num: this.page}}).then(function(response) {

		     	var responseData = response.data

      	        if (typeof responseData === 'string') {
		          responseData = JSON.parse(responseData)
		        }
		     	this.items = responseData.data
		     	this.more = responseData.have_more
			  }, function(response) {
			  	alert('error')
			  });
			}
		}
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