<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

  <link rel="stylesheet" type="text/css" href="/yoga/Public/yoga/js/Swiper-3.3.1/css/swiper.min.css">
  <style type="text/css">
    html,
    body {
      height: 100%;
      position: relative;
    }
    .g-content-more {
      text-align: center;
    }
    [v-cloak] {
      display: none;
    }
  </style>
  <script src="http://cdn.bootcss.com/vue/1.0.25/vue.min.js"></script>
  <script src="http://cdn.bootcss.com/vue-resource/0.9.3/vue-resource.min.js"></script>
  <title>欢迎来到生活的艺术首页</title>
  
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

  <!-- Swiper 顶部轮播头图-start -->
  <div class="swiper-container">
      <div class="swiper-wrapper">
          <?php if(is_array($banner)): foreach($banner as $key=>$ba): ?><a href="<?php echo ($ba["plug_ad_url"]); ?>" class="swiper-slide"><img src="/yoga/Public<?php echo ($ba["plug_ad_pic"]); ?>"/></a><?php endforeach; endif; ?>
      </div>
      <!-- Add Pagination-->
      <?php if($banner_count > 1): ?><div class="swiper-pagination"></div><?php endif; ?>

  </div>
  <!-- Swiper 顶部轮播头图-end -->
<!-- Courses-start -->
  <div class="g-course clearfix">
  <div class="g-course-inner">
  <?php $count=1; ?>
<?php if(is_array($classdata)): foreach($classdata as $key=>$cl): ?><div class="col-xs-12 col-sm-4 course-type <?php echo ($cl["ct_classname"]); ?> ">
    <?php if($count == 1): ?><div style="margin-right:30px; position:relative;">
    <?php elseif($count == 2): ?>
    <div style="margin-right:15px;margin-left:15px; position:relative;">
    <?php elseif($count == 3): ?>
     <div style="margin-left:30px; position:relative;"><?php endif; ?>

      <img src="/yoga/Public<?php echo ($cl["ct_photo"]); ?>">

      <div class="description description<?php echo $count;?>">
        <h2 class="descrip-title"><?php echo ($cl["ct_name"]); ?></h2>
        <div class="descrip-text"><?php echo ($cl["ct_say"]); ?></div>

        <a class="btn btn-default descrip-btn descrip-btn<?php echo $count;?> pull-right" href="<?php echo U($cl['ct_url'],array('id'=>$cl['ct_id']));?>">了解更多</a>
        <a class="m-descrip-btn" href="#"><span><img src="/yoga/Public/yoga/img/right2.png" alt=""></span></a>
      </div>
      </div>
      </div>
    <?php $count++; endforeach; endif; ?>
    </div>
  </div>
  <div class="g-course-2 clearfix">
  <?php $count_one=1; ?>
  <?php if(is_array($classdata)): foreach($classdata as $key=>$cd): ?><div class="col-xs-4 delPadd">
      <div class="description description<?php echo $count_one;?> clearfix">
        <h2 class="descrip-title"><?php echo ($cd["ct_name"]); ?></h2>
        <a class="m-descrip-btn" href="<?php echo U($cl['ct_url'],array('id'=>$cl['ct_id']));?>"><span class="image-wrapper">&nbsp;&nbsp;&nbsp;<img src="/yoga/Public/yoga/img/right2.png" alt=""></span><span class="image-text">更多</span></a>
      </div>
    </div>
    <?php $count_one++; endforeach; endif; ?>

  </div>
  <!-- Courses-end -->
  <!-- content-start -->
   <div class="g-content">
  <div class="g-content-inner">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-8">
        <div class="content">
          <div class="section" v-for="item in items" v-cloak>
            <a class="section-img-wrap" v-bind:href="item.location_url">
              <img v-bind:src="item.ad_photo | imageprefix">
            </a>
            <div class="section-text-wrap">
              <div class="section-text-header clearfix">
                <div class="col-xs-12 text-header-iconGroup clearfix">
                  <div class="col-xs-12 col-md-12 iconGroup-wrap delPadd">
                    <div class="iconGroup">
                      <div class="icon-wrap"><img src="/yoga/Public/yoga/img/icon1.png"></div>
                      <div class="icon-text" id="browse">{{item.ad_readnum}}</div>
                    </div>
                    <div class="iconGroup">
                      <div class="icon-wrap"><img src="/yoga/Public/yoga/img/icon2.png"></div>
                      <div class="icon-text" id="praise">{{item.ad_agreenum}}</div>
                    </div>
                    <div class="iconGroup">
                      <div class="icon-wrap"><img src="/yoga/Public/yoga/img/icon3.png"></div>
                      <div class="icon-text" id="collect">{{item.ad_savenum}}</div>
                    </div>
                    <div class="iconGroup special-iconGroup">
                      <div class="icon-wrap"><img src="/yoga/Public/yoga/img/icon4.png"></div>
                      <div class="icon-text" id="activDate"><span v-show="item.ad_is != 3">{{item.ad_starttime}}&sim;{{item.ad_stoptime}}</span><span v-show="item.ad_is == 3">{{item.ad_addtime}}</span></div>
                    </div>
                  </div>
                  <div class="col-xs-12 col-md-12 text-header-title" style="display:inline;text-align:left;">{{item.ad_title}}</div>
                </div>
              </div>
              <div class="section-text-speci">{{item.ad_say}}</div>
              <a v-bind:href="item.location_url" class="btn viewDetai-btn pull-right" id="viewDetai">查看详情</a>
              <div class="icon-circle">

                <img v-bind:src="item.is_logo">
              </div>
            </div>
            <!-- 背景连线 -->
            <div class="backLine" v-show="$index != len - 1"></div>
          </div>
        </div>
        <div class="g-content-more">
          <div class="get-more-item" v-show="!is_getting_list&&more"><span class="white-line"></span>
          <a @click.prevent="getMore" href="#"><span>more</span><img src="/yoga/Public/yoga/img/down.png" alt=""></a></div>
          <div class="loading-gif" v-show="is_getting_list"><img src="/yoga/Public/yoga/img/loading.gif" alt=""></div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-4">
        <div class="aside">
        <form action="<?php echo U('Index/search');?>" id="form0" rol="search" name="searchform">
          <div class="search">
            <div class="aside-option-wrap">

              <div class="icon-search">
                <img src="/yoga/Public/yoga/img/search.png" id="search" style="cursor:pointer">
              </div>

                <div class="form-group">
                 <input type="text" class="form-control search-index" placeholder="请输入关键词" name="key"/>
                </div>

            </div>
          </div>
          </form>

          <!-- 背景连线 -->

          <div class="backLine backLineAside"></div>
          <div class="aside-course" style="margin-top: 30px;">
            <div class="aside-option-wrap">
              <div class="icon-course">
                课程
              </div>
              <ul class="list-group">
              <?php if(is_array($class)): foreach($class as $key=>$cl): ?><li class="list-group-item">
                  <div class="course-img-wrap">
                    <img src="/yoga/Public<?php echo ($cl["mc_photo"]); ?>">
                  </div>
                  <div class="course-text">
                    <p class="course-text-title"><a href="<?php echo U('class/class_content',array('id'=>$cl['mc_id']));?>"><?php echo (subtext($cl["mc_title"],C('INDEX_RIGHT_TITLE'))); ?></a></p>
                    <p class="course-text-speci"><?php echo (subtext($cl["mc_say"],C('INDEX_RIGHT_SAY'))); ?></p>
                    <p class="course-date-city">
                      <span id="course-date"><?php echo (date("Y-m-d",$cl["mc_addtime"])); ?></span>

                    </p>
                  </div>
                </li><?php endforeach; endif; ?>

              </ul>
            </div>
          </div>
          <div class="aside-knowlg" style="margin-top: 30px;">
            <div class="aside-option-wrap">
              <div class="icon-course">
                知识
              </div>
              <ul class="list-group">
               <?php if(is_array($knows)): foreach($knows as $key=>$kn): ?><li class="list-group-item">
                  <div class="course-img-wrap">
                    <img src="/yoga/Public<?php echo ($kn["ms_photo"]); ?>">
                  </div>
                  <div class="course-text">
                    <p class="course-text-title"><a href="<?php echo U('knows/knows_content',array('id'=>$kn['ms_id']));?>"><?php echo (subtext($kn["ms_title"],C('INDEX_RIGHT_TITLE'))); ?></a></p>
                    <p class="course-text-speci"><?php echo (subtext($kn["ms_say"],C('INDEX_RIGHT_SAY'))); ?></p>
                    <p class="course-date-city">
                      <span id="course-date"><?php echo (date("Y-m-d",$kn["ms_addtime"])); ?></span>
                      <span class="course-city" id="course-city"></span>
                    </p>
                  </div>
                </li><?php endforeach; endif; ?>

              </ul>
            </div>
          </div>
          <div class="aside-activi" style="margin-top: 30px;">
            <div class="aside-option-wrap">
              <div class="icon-course">
                活动
              </div>
              <ul class="list-group">
               <?php if(is_array($active)): foreach($active as $key=>$ac): ?><li class="list-group-item">
                  <div class="course-img-wrap">
                    <img src="/yoga/Public<?php echo ($ac["ad_photo"]); ?>">
                  </div>
                  <div class="course-text">
                    <p class="course-text-title"><a href="<?php echo U('active/active_content',array('id'=>$ac['ad_id']));?>"><?php echo (subtext($ac["ad_title"],C('INDEX_RIGHT_TITLE'))); ?></a></p>
                    <p class="course-text-speci"><?php echo (subtext($ac["ad_say"],C('INDEX_RIGHT_SAY'))); ?></p>
                    <p class="course-date-city">
                      <span id="course-date"><?php echo (date("Y-m-d",$ac["ad_addtime"])); ?></span>
                    </p>
                  </div>
                </li><?php endforeach; endif; ?>
              </ul>
            </div>

          </div>

        </div>
      </div>
    </div>
    </div>
  </div>
  <!-- content-end -->
  <div class="backto-top">
    <a href="#"><img src="/yoga/Public/yoga/img/up.png" alt=""></a>
  </div>

<script type="text/javascript" src="/yoga/Public/yoga/js/Swiper-3.3.1/js/swiper.min.js"></script>
<script>
if(<?php echo ($banner_count); ?>>1){
	var swiper = new Swiper('.swiper-container', {
	    pagination: '.swiper-pagination',
	    paginationClickable: true,
	    loop:true,
	    autoplay: 3500
	  });
	}

 $("#search").click(function(){
	 $('#form0').submit();
})
  var url = '/yoga/Home/Index/alldata';
  var static_prefix = '/yoga/Public';
  Vue.filter('imageprefix', function(value) {
    return static_prefix + value
  });
  new Vue({
    el: 'body',
    ready: function() {
      this.is_getting_list = true
      this.$http.get(url, {params: {page_num: this.page}}).then(function(response) {
      	var responseData = response.data
      	if (typeof responseData === 'string') {
		  responseData = JSON.parse(responseData)
		}
        console.log(response)
        this.more = responseData.have_more
        this.items = responseData.data
        this.len = this.items.length
        console.log(this.more)
        this.is_getting_list = false
      }, function(response) {
        this.is_getting_list = false
        console.log('error')
      })
    },
    data: {
      is_getting_list: false,
      page: 1,
      items: [],
      more: 1,
      len: 0
    },
    methods: {
      getMore: function() {
        this.is_getting_list = true
        this.page += 1
        this.$http.get(url, {params: {page_num: this.page}}).then(function(response) {
        	var responseData = response.data
            this.is_getting_list = false
            console.log(response)
            this.more = responseData.have_more
            this.items = this.items.concat(responseData.data)
            this.len = this.items.length
          }, function(response) {
            this.is_getting_list = false
            console.log('error')
        })
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