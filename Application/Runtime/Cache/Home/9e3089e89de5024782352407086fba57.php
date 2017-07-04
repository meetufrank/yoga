<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link rel="stylesheet" type="text/css" href="/yoga/Public/yoga/css/bootstrap-3.3.6-dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="/yoga/Public/yoga/css/static.css">
  <link rel="stylesheet" type="text/css" href="/yoga/Public/yoga/css/main.css">
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
  <title>首页</title>
</head>
<body>
  <div class="window-indi"></div>
  <!-- Swiper 顶部轮播头图-start -->
  <div class="swiper-container">
      <div class="swiper-wrapper">
          <a href="#" class="swiper-slide"><img src="/yoga/Public/yoga/img/banner1.jpg"/></a>
          <a href="#" class="swiper-slide"><img src="/yoga/Public/yoga/img/main002.jpg"/></a>
          <a href="#" class="swiper-slide"><img src="/yoga/Public/yoga/img/main003.jpg"/></a>
          <a href="#" class="swiper-slide"><img src="/yoga/Public/yoga/img/main004.jpg"/></a>
          <a href="#" class="swiper-slide"><img src="/yoga/Public/yoga/img/main005.jpg"/></a>
      </div>
      <!-- Add Pagination -->
      <div class="swiper-pagination"></div>
  </div>
  <!-- Swiper 顶部轮播头图-end -->
<!-- Courses-start -->
  <div class="g-course clearfix">
  <?php $count=1; ?>
<?php if(is_array($classdata)): foreach($classdata as $key=>$cl): ?><div class="col-xs-12 col-sm-4 course-type <?php echo ($cl["ct_classname"]); ?> ">
      <img src="/yoga/Public<?php echo ($cl["ct_photo"]); ?>">

      <div class="description description<?php echo $count;?>">
        <h2 class="descrip-title"><?php echo ($cl["ct_name"]); ?></h2>
        <div class="descrip-text"><?php echo ($cl["ct_say"]); ?></div>
        <a class="btn btn-default descrip-btn descrip-btn<?php echo $count;?> pull-right" href="/yoga/index.php/Home/<?php echo ($cl["ct_url"]); ?>">学习更多</a>
        <a class="m-descrip-btn" href="#"><span><img src="/yoga/Public/yoga/img/right2.png" alt=""></span></a>
      </div>
    </div>
    <?php $count++; endforeach; endif; ?>

  </div>
  <div class="g-course-2 clearfix">
  <?php $count_one=1; ?>
  <?php if(is_array($classdata)): foreach($classdata as $key=>$cd): ?><div class="col-xs-4 delPadd">
      <div class="description description<?php echo $count_one;?> clearfix">
        <h2 class="descrip-title"><?php echo ($cd["ct_name"]); ?></h2>
        <a class="m-descrip-btn" href="/yoga/index.php/Home/<?php echo ($cd["ct_url"]); ?>"><span class="image-wrapper">&nbsp;&nbsp;&nbsp;<img src="/yoga/Public/yoga/img/right2.png" alt=""></span><span class="image-text">更多</span></a>
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
                <img src="/yoga/Public/yoga/img/circle.png">
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
          <div class="search">
            <div class="aside-option-wrap">
              <div class="icon-search">
                <img src="/yoga/Public/yoga/img/search.png" id="search" style="cursor:pointer">
              </div>
              <form action="<?php echo U('Index/search');?>" id="form0" rol="search">
                <div class="form-group">
                 <input type="text" class="form-control search-index" placeholder="请输入关键词" name="key"/>
                </div>
              </form>
            </div>
          </div>
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
  var swiper = new Swiper('.swiper-container', {
    pagination: '.swiper-pagination',
    paginationClickable: true,
    loop:true,
    autoplay: 3500
  });
  var url = '/yoga/index.php/Home/Index/alldata';
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
</body>
</html>