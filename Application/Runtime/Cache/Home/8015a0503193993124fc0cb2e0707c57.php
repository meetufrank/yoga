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
          <a href="#" class="swiper-slide"><img src="img/banner1.jpg"/></a>
          <a href="#" class="swiper-slide"><img src="img/main002.jpg"/></a>
          <a href="#" class="swiper-slide"><img src="img/main003.jpg"/></a>
          <a href="#" class="swiper-slide"><img src="img/main004.jpg"/></a>
          <a href="#" class="swiper-slide"><img src="img/main005.jpg"/></a>
      </div>
      <!-- Add Pagination -->
      <div class="swiper-pagination"></div>
  </div>
  <!-- Swiper 顶部轮播头图-end -->
  <!-- Courses-start -->
  <div class="g-course clearfix">
    <div class="col-xs-12 col-sm-4 course-type course-type-lt delPadd">
      <img src="img/sub001.jpg">
      <div class="description description1">
        <h2 class="descrip-title">快乐课程</h2>
        <div class="descrip-text">强大的呼吸技巧和生活可以改变你的生活</div>
        <a class="btn btn-default descrip-btn descrip-btn1 pull-right" href="#">学习更多</a>
        <a class="m-descrip-btn" href="#"><span><img src="img/right2.png" alt=""></span></a>
      </div>
    </div>
    <div class="col-xs-12 col-sm-4 course-type course-type-md delPadd">
      <img src="img/sub002.jpg">
      <div class="description description2">
        <h2 class="descrip-title">完美瑜伽</h2>
        <div class="descrip-text">你一直想拥有却不曾知道它存在过的假期</div>
        <a class="btn btn-default descrip-btn descrip-btn2 pull-right" href="#">学习更多</a>
        <a class="m-descrip-btn" href="#"><span><img src="img/right2.png" alt=""></span></a>
      </div>
    </div>
    <div class="col-xs-12 col-sm-4 course-type delPadd">
      <img src="img/sub003.jpg">
      <div class="description description3">
        <h2 class="descrip-title">三摩地静心课</h2>
        <div class="descrip-text">一种简单、愉悦并且有效的冥想技巧</div>
        <a class="btn btn-default descrip-btn descrip-btn3 pull-right" href="#">学习更多</a>
        <a class="m-descrip-btn" href="#"><span><img src="img/right2.png" alt=""></span></a>
      </div>
    </div>
  </div>
  <div class="g-course-2 clearfix">
    <div class="col-xs-4 delPadd">
      <div class="description description1 clearfix">
        <h2 class="descrip-title">快乐课程</h2>
        <a class="m-descrip-btn" href="#"><span class="image-wrapper">&nbsp;&nbsp;&nbsp;<img src="img/right2.png" alt=""></span><span class="image-text">更多</span></a>
      </div>
    </div>
    <div class="col-xs-4 delPadd">
      <div class="description description2 clearfix">
        <h2 class="descrip-title">完美瑜伽</h2>
        <a class="m-descrip-btn" href="#"><span class="image-wrapper">&nbsp;&nbsp;&nbsp;<img src="img/right2.png" alt=""></span><span class="image-text">更多</span></a>
      </div>
    </div>
    <div class="col-xs-4 delPadd">
      <div class="description description3 clearfix">
        <h2 class="descrip-title">三摩地静心课</h2>
        <a class="m-descrip-btn" href="#"><span class="image-wrapper">&nbsp;&nbsp;&nbsp;<img src="img/right2.png" alt=""></span><span class="image-text">更多</span></a>
      </div>
    </div>
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
                  <div class="col-xs-12 col-md-7 iconGroup-wrap delPadd">
                    <div class="iconGroup">
                      <div class="icon-wrap"><img src="/yoga/Public/yoga/img/icon1.png"></div>
                      <div class="icon-text" id="browse">{{item.ad_readnum}}</div>
                    </div>
                    <div class="iconGroup">
                      <div class="icon-wrap"><img src="img/icon2.png"></div>
                      <div class="icon-text" id="praise">{{item.ad_agreenum}}</div>
                    </div>
                    <div class="iconGroup">
                      <div class="icon-wrap"><img src="img/icon3.png"></div>
                      <div class="icon-text" id="collect">{{item.ad_savenum}}</div>
                    </div>
                    <div class="iconGroup special-iconGroup">
                      <div class="icon-wrap"><img src="img/icon4.png"></div>
                      <div class="icon-text" id="activDate"><span v-show="item.ad_is != 3">{{item.ad_starttime}}&sim;{{item.ad_stoptime}}</span><span v-show="item.ad_is == 3">{{item.ad_addtime}}</span></div>
                    </div>
                  </div>
                  <div class="col-xs-12 col-md-5 text-header-title">{{item.ad_title}}</div>
                </div>
              </div>
              <div class="section-text-speci">{{item.ad_say}}</div>
              <a v-bind:href="item.location_url" class="btn viewDetai-btn pull-right" id="viewDetai">查看详情</a>
              <div class="icon-circle">
                <img src="img/circle.png">
              </div>
            </div>
            <!-- 背景连线 -->
            <div class="backLine" v-show="$index != len - 1"></div>
          </div>
        </div>
        <div class="g-content-more">
          <div class="get-more-item" v-show="!is_getting_list&&more"><span class="white-line"></span>
          <a @click.prevent="getMore" href="#"><span>more</span><img src="./img/down.png" alt=""></a></div>
          <div class="loading-gif" v-show="is_getting_list"><img src="./img/loading.gif" alt=""></div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-4">
        <div class="aside">
          <div class="search">
            <div class="aside-option-wrap">
              <div class="icon-search">
                <img src="img/search.png">
              </div>
              <form action="##" id="searchForm" rol="search">
                <div class="form-group">
                 <input type="text" class="form-control search-index" placeholder="请输入关键词" />
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
                <li class="list-group-item">
                  <div class="course-img-wrap">
                    <img src="img/aside-course1.png">
                  </div>
                  <div class="course-text">
                    <p class="course-text-title"><a href="##">完美瑜伽2</a></p>
                    <p class="course-text-speci">欢迎您参加生活的艺术，请自备换洗衣物、身份证等。</p>
                    <p class="course-date-city">
                      <span id="course-date">2016-07-04</span>
                      <span class="course-city" id="course-city">成都</span>
                    </p>
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="course-img-wrap">
                    <img src="img/aside-course2.png">
                  </div>
                  <div class="course-text">
                    <p class="course-text-title"><a href="##">完美瑜伽2</a></p>
                    <p class="course-text-speci">欢迎您参加生活的艺术，请自备换洗衣物、身份证等。</p>
                    <p class="course-date-city">
                      <span id="course-date">2016-07-04</span>
                      <span class="course-city" id="course-city">上海</span>
                    </p>
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="course-img-wrap">
                    <img src="img/aside-course3.png">
                  </div>
                  <div class="course-text">
                    <p class="course-text-title"><a href="##">一段由外向内的旅程</a></p>
                    <p class="course-text-speci">欢迎您参加生活的艺术，请自备换洗衣物、身份证等。</p>
                    <p class="course-date-city">
                      <span id="course-date">2016-07-04</span>
                      <span class="course-city" id="course-city">上海</span>
                    </p>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <div class="aside-knowlg" style="margin-top: 30px;">
            <div class="aside-option-wrap">
              <div class="icon-course">
                知识
              </div>
              <ul class="list-group">
                <li class="list-group-item">
                  <div class="course-img-wrap">
                    <img src="img/aside-knowlg1.png">
                  </div>
                  <div class="course-text">
                    <p class="course-text-title"><a href="##">薄伽梵歌</a></p>
                    <p class="course-text-speci">欢迎您参加生活的艺术，请自备换洗衣物、身份证等。</p>
                    <p class="course-date-city">
                      <span id="course-date">2016-07-04</span>
                      <span class="course-city" id="course-city"></span>
                    </p>
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="course-img-wrap">
                    <img src="img/aside-knowlg2.png">
                  </div>
                  <div class="course-text">
                    <p class="course-text-title"><a href="##">朝向本我的第一步</a></p>
                    <p class="course-text-speci">欢迎您参加生活的艺术，请自备换洗衣物、身份证等。</p>
                    <p class="course-date-city">
                      <span id="course-date">2016-07-04</span>
                      <span class="course-city" id="course-city"></span>
                    </p>
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="course-img-wrap">
                    <img src="img/aside-knowlg3.png">
                  </div>
                  <div class="course-text">
                    <p class="course-text-title"><a href="##">一切答案的目标</a></p>
                    <p class="course-text-speci">欢迎您参加生活的艺术，请自备换洗衣物、身份证等。</p>
                    <p class="course-date-city">
                      <span id="course-date">2016-07-04</span>
                      <span class="course-city" id="course-city"></span>
                    </p>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <div class="aside-activi" style="margin-top: 30px;">
            <div class="aside-option-wrap">
              <div class="icon-course">
                活动
              </div>
              <ul class="list-group">
                <li class="list-group-item">
                  <div class="course-img-wrap">
                    <img src="img/aside-activi1.png">
                  </div>
                  <div class="course-text">
                    <p class="course-text-title"><a href="##">与真理为伍，与梵共舞</a></p>
                    <p class="course-text-speci">欢迎您参加生活的艺术，请自备换洗衣物、身份证等。</p>
                    <p class="course-date-city">
                      <span id="course-date">2016-07-04</span>
                      <span class="course-city" id="course-city">成都</span>
                    </p>
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="course-img-wrap">
                    <img src="img/aside-activi2.png">
                  </div>
                  <div class="course-text">
                    <p class="course-text-title"><a href="##">察觉你的当下</a></p>
                    <p class="course-text-speci">欢迎您参加生活的艺术，请自备换洗衣物、身份证等。</p>
                    <p class="course-date-city">
                      <span id="course-date">2016-07-04</span>
                      <span class="course-city" id="course-city">上海</span>
                    </p>
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="course-img-wrap">
                    <img src="img/aside-activi3.png">
                  </div>
                  <div class="course-text">
                    <p class="course-text-title"><a href="##">世界文化嘉年华</a></p>
                    <p class="course-text-speci">欢迎您参加生活的艺术，请自备换洗衣物、身份证等。</p>
                    <p class="course-date-city">
                      <span id="course-date">2016-07-04</span>
                      <span class="course-city" id="course-city">上海</span>
                    </p>
                  </div>
                </li>
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
    <a href="#"><img src="./img/up.png" alt=""></a>
  </div>

<script type="text/javascript" src="/yoga/Public/yoga/js/jquery-1.12.2.min.js"></script>
<script type="text/javascript" src="/yoga/Public/yoga/css/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/yoga/Public/yoga/js/Swiper-3.3.1/js/swiper.min.js"></script>
<script type="text/javascript" src="/yoga/Public/yoga/js/main.js"></script>
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
        console.log(response)
        this.more = response.data.have_more
        this.items = response.data.data
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
            this.is_getting_list = false
            console.log(response)
            this.more = response.data.have_more
            this.items = this.items.concat(response.data.data)
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