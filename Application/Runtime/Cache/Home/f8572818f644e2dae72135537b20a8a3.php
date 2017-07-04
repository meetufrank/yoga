<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

  <script src="http://cdn.bootcss.com/vue/1.0.25/vue.min.js"></script>
  <script src="http://cdn.bootcss.com/vue-resource/0.9.3/vue-resource.min.js"></script>
  <title></title>
  
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
<div class="person-header has-background-image">
	<div class="person-image-wrapper"><img class="res-image" src="/yoga/Public<?php echo ($userdata["member_list_headpic"]); ?>" alt=""></div>
	<div class="person-username"><?php echo ($userdata["member_list_petname"]); ?></div>
</div>
<div class="person-main-wrapper clearfix" id="person-container">
	<div class="person-main-headers clearfix">
		<div class="person-main-header"><a class="active" href="#">我的资料<span></span></a></div>
		<div class="person-main-header"><a href="#">我的课程<span></span></a></div>
		<div class="person-main-header"><a href="#">我的活动<span></span></a></div>
		<div class="person-main-header"><a href="#">我的收藏<span></span></a></div>
		<div class="person-main-header"><a href="#">修改密码<span></span></a></div>
	</div>
	<div class="person-main-details">
		<div class="person-main-detail current">
			<div class="person-info-wrapper clearfix">
				<form method="POST" action="<?php echo U('User/checkedit');?>" id="formset" enctype="multipart/form-data">
					<div><span class="person-info-title">真实姓名</span><span class="person-info-text"><?php echo ($userdata["member_list_username"]); ?></span><span class="person-input-wrapper"><input type="text" name="member_list_username" value="<?php echo ($userdata["member_list_username"]); ?>" id="member_list_username"></span></div>
					<div><span class="person-info-title">昵称</span><span class="person-info-text"><?php echo ($userdata["member_list_petname"]); ?></span><span class="person-input-wrapper"><input type="text" name="member_list_petrname" value="<?php echo ($userdata["member_list_petname"]); ?>" id="member_list_petrname" ></span></div>
					<div><span class="person-info-title">性别</span><span class="person-info-text"><?php if($userdata["member_list_sex"] == 1): ?>男<?php else: ?>女<?php endif; ?></span><span class="person-input-wrapper"><label for="gender1"><input type="radio" name="member_list_sex" id="gender1" value="1" <?php if($userdata["member_list_sex"] == 1): ?>checked="checked"<?php endif; ?> ><span>男</span></label><label for="gender2"><input type="radio" name="member_list_sex" id="gender2" value="0" <?php if($userdata["member_list_sex"] == 0): ?>checked="checked"<?php endif; ?>><span>女</span></label></span></div>
					<div><span class="person-info-title">手机</span><span class="person-info-text"><?php echo ($userdata["member_list_tel"]); ?></span><span class="person-input-wrapper"><input type="text" name="member_list_tel" value="<?php echo ($userdata["member_list_tel"]); ?>" readonly="true" ></span></div>
					<div><span class="person-info-title">邮箱</span><span class="person-info-text"><?php echo ($userdata["member_list_email"]); ?></span><span class="person-input-wrapper"><input type="text" name="member_list_email" value="<?php echo ($userdata["member_list_email"]); ?>" id="member_list_email"></span></div>

					<?php $pid=$userdata[member_list_province]; $cid=$userdata[member_list_city]; $province=M('province')->where(array('provinceid'=>$pid))->getField('provincename'); $city=M('city')->where(array('id'=>$cid))->getField('cityname'); ?>
					<div><span class="person-info-title">所在地</span><span class="person-info-text"><?php echo $province.'/'.$city; ?></span>
					<span class="person-input-wrapper">
					<span class="select-wrapper" style="width:25%;">
					<select class="" id="province" name="member_list_province" ></select>

					</span><span class="select-wrapper" style="width:25%;">
					<select class="" id="city" name="member_list_city"></select>

			        </span></span></div>
					<div><span class="person-info-title special-person-info-title">头像</span><span class="person-input-wrapper"><label class="file"><input  name="pic_one" type="file" id="file0" aria-label="File browser example" class="input-file"><span class="file-custom">选择文件</span></label></span></div>
					<div class="person-btn-wrapper clearfix"><input type="submit" class="person-edit-info person-edit-submit" value="确定" id="dlogin"><a class="person-edit-info person-edit-cancel" href="#">取消</a></div>
				</form>
			</div>
			<a class="person-edit-info person-edit" href="#" >修改</a>
		</div>
		<div class="person-main-detail clearfix">
			<a class="person-course-item clearfix" v-bind:href="item.url" v-for="item in items.course.details">
				<div class="person-course-image">
					<div><img v-bind:src="item.mc_photo | imageprefix" alt=""></div>
				</div><!--
				--><div class="person-course-info">
					<div class="person-course-title">{{item.mc_title}}&nbsp;&nbsp;<span v-bind:style="item.style">{{item.cr_open}}</span></div>
					<div class="person-course-time">报名时间：{{item.cr_addtime}}</div>
					<div class="clearfix" style="clear:both;">
					<div class="person-course-detail"><img src="/yoga/Public/yoga/img/icon4.png" alt="" width="18"><span>{{item.mc_starttime}}~{{item.mc_stoptime}}</span></div>
					<div class="person-course-detail"><img src="/yoga/Public/yoga/img/icon5.png" alt="" width="16"><span>{{item.mc_adress}}</span></div>

					</div>
				</div>
			</a>
			<div class="gif-wrapper" style="text-align: center; padding-top: 20px;" v-show="items.course.is_getting_list"><img style="display:inline-block;" src="/yoga/Public/yoga/img/loading.gif" alt=""></div>
			<div class="person-button-wrapper">
				<a href="#" class="person-previous-page pull-left" @click.prevent="getMore('course', 0)" v-show="!items.course.is_getting_list && items.course.page!=1"><img src="/yoga/Public/yoga/img/left.png" alt=""></a>
				<a href="#" class="person-next-page pull-right" @click.prevent="getMore('course', 1)" v-show="!items.course.is_getting_list && items.course.more"><img src="/yoga/Public/yoga/img/next.png" alt=""></a>
			</div>
		</div>
		<div class="person-main-detail">
			<a class="person-course-item clearfix" v-bind:href="item.url" v-for="item in items.activity.details">
				<div class="person-course-image">
					<div><img v-bind:src="item.ad_photo | imageprefix" alt=""></div>
				</div><!--
				--><div class="person-course-info">
					<div class="person-course-title">{{ item.ad_title}}&nbsp;&nbsp;<span v-bind:style="item.style">{{item.ar_open}}</span></div>
					<div class="person-course-time">报名时间：{{ item.ar_addtime }}</div>
					<div class="clearfix" style="clear:both;">
					<div class="person-course-detail"><img src="/yoga/Public/yoga/img/icon4.png" alt="" width="18"><span>{{item.ad_starttime}}~{{item.ad_stoptime}}</span></div>
					<div class="person-course-detail"><img src="/yoga/Public/yoga/img/icon5.png" alt="" width="16"><span>{{item.ad_adress}}</span></div>

					</div>
				</div>
			</a>
			<div class="person-button-wrapper">
				<a href="#" class="person-previous-page pull-left" @click.prevent="getMore('activity', 0)" v-show="!items.activity.is_getting_list && items.activity.page!=1"><img src="/yoga/Public/yoga/img/left.png" alt=""></a>
				<a href="#" class="person-next-page pull-right" @click.prevent="getMore('activity', 1)" v-show="!items.activity.is_getting_list && items.activity.more"><img src="/yoga/Public/yoga/img/next.png" alt=""></a>
			</div>
		</div>
		<div class="person-main-detail">
			<div class="person-sub-headers clearfix">
				<div class="person-sub-header"><a class="active" href="#">课程<span></span></a></div>
				<div class="person-sub-header"><a href="#">知识<span></span></a></div>
				<div class="person-sub-header"><a href="#">活动<span></span></a></div>
			</div>
			<div class="person-sub-details">
				<div class="person-sub-detail current">
					<a class="person-sub-item" v-bind:href="item.url" v-for="item in items.favorite.course2.details">
						<div class="person-sub-image"><img v-bind:src="item.mc_photo | imageprefix" alt=""></div><!--
						--><div class="person-sub-title">{{item.mc_title}}</div>
					</a>
					<div class="person-button-wrapper">
						<a href="#" class="person-previous-page pull-left" @click.prevent="getMore('course2', 0)" v-show="!items.favorite.course2.is_getting_list && items.favorite.course2.page!=1"><img src="/yoga/Public/yoga/img/left.png" alt=""></a>
						<a href="#" class="person-next-page pull-right" @click.prevent="getMore('course2', 1)" v-show="!items.favorite.course2.is_getting_list && items.favorite.course2.more"><img src="/yoga/Public/yoga/img/next.png" alt=""></a>
					</div>
				</div>
				<div class="person-sub-detail">
					<a class="person-sub-item" v-bind:href="item.url" v-for="item in items.favorite.knowledge2.details">
						<div class="person-sub-image"><img v-bind:src="item.ms_photo | imageprefix" alt=""></div><!--
						--><div class="person-sub-title">{{item.ms_title}}</div>
					</a>
					<div class="person-button-wrapper">
						<a href="#" class="person-previous-page pull-left" @click.prevent="getMore('knowledge2', 0)" v-show="!items.favorite.knowledge2.is_getting_list && items.favorite.knowledge2.page!=1"><img src="/yoga/Public/yoga/img/left.png" alt=""></a>
						<a href="#" class="person-next-page pull-right" @click.prevent="getMore('knowledge2', 1)" v-show="!items.favorite.knowledge2.is_getting_list && items.favorite.knowledge2.more"><img src="/yoga/Public/yoga/img/next.png" alt=""></a>
					</div>
				</div>
				<div class="person-sub-detail">
					<a class="person-sub-item" v-bind:href="item.url" v-for="item in items.favorite.activity2.details">
						<div class="person-sub-image"><img v-bind:src="item.ad_photo | imageprefix" alt=""></div><!--
						--><div class="person-sub-title">{{item.ad_title}}</div>
					</a>
					<div class="person-button-wrapper">
						<a href="#" class="person-previous-page pull-left" @click.prevent="getMore('activity2', 0)" v-show="!items.favorite.activity2.is_getting_list && items.favorite.activity2.page!=1"><img src="/yoga/Public/yoga/img/left.png" alt=""></a>
						<a href="#" class="person-next-page pull-right" @click.prevent="getMore('activity2', 1)" v-show="!items.favorite.activity2.is_getting_list && items.favorite.activity2.more"><img src="/yoga/Public/yoga/img/next.png" alt=""></a>
					</div>
				</div>
			</div>
		</div>
		<div class="person-main-detail">
			<div class="person-password-wrapper">
				<form class="form-horizontal" method="POST" action="" id="form0">
					<div class="form-horizontal-inner">
					<div class="form-group"><label for="inputPassword3" class="col-xs-4 col-sm-3 col-lg-2 control-label">原密码</label><div class="col-xs-8 col-sm-6 col-lg-4"><input type="password" class="form-control" id="inputPassword3" name="old_pwd" /></div></div>
					<div class="form-group"><label for="inputPassword3" class="col-xs-4 col-sm-3 col-lg-2 control-label">新密码</label><div class="col-xs-8 col-sm-6 col-lg-4"><input type="password" class="form-control" id="inputPassword3" name="new_pwd"/></div></div>
					<div class="form-group"><label for="inputPassword3" class="col-xs-4 col-sm-3 col-lg-2 control-label">确认新密码</label><div class="col-xs-8 col-sm-6 col-lg-4"><input type="password" class="form-control" id="inputPassword3" name="new_pwd2"></div></div>
					</div>
					<div class="col-sm-offset-3 col-lg-offset-2 person-btn-wrapper"><input type="submit" class="person-edit-info person-password-edit" value="确认修改" id="com"></div>
				</form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="/yoga/Public/yoga/js/vendor/jquery.city.select.min.js"></script>
<script type="text/javascript" src="/yoga/Public/yoga/js/vendor/data.js"></script>

<script type="text/javascript" src="/yoga/Public/assets/js/region.js"></script>
<script type="text/javascript">
$(function($){
    $(function(){
        var $divWidth = $('.person-image-wrapper img').width();
        $('.person-image-wrapper img').css({'height':$divWidth});
    })
})
var url1 = '<?php echo U("User/userclass");?>';
var url2 = '<?php echo U("User/useractive");?>';
var url3 = '<?php echo U("User/user_save");?>';
var static_prefix = '/yoga/Public';
Vue.filter('imageprefix', function(value) {
  return static_prefix + value
})
new Vue({
	el: '#person-container',
	ready: function() {
		function initialPage(type) {
			var item;
			if (type in this.items) {
				item = this.items[type]
			}
			else if (type in this.items.favorite) {
				item = this.items.favorite[type]
			}
			else {
				console.log("unknown type")
			}
			item.is_getting_list = true

			this.$http.get(item.endpoint, {params: {page_num: item.page, type: item.type}}).then(function(response) {
				console.log(response)
				item.more = response.data.have_more
				if (response.data.data) {
					for (var key in response.data.data) {
						item.details.push(response.data.data[key])
					}
					console.log(item.details)
				}
				item.is_getting_list = false
			}, function(response) {
				console.log('error')
				item.is_getting_list = false
			});
		}

		var initialPage2 = initialPage.bind(this)

		initialPage2('course')
		initialPage2('activity')
		initialPage2('course2')
		initialPage2('knowledge2')
		initialPage2('activity2')

		this.$http.get("<?php echo U('User/getaddress');?>").then(function(response) {
		      var len = response.data.length;
		      var data = [];
		      for (var i = 0; i < len; i++) {
		      	data[i] = response.data[i];
		      	data[i].id = data[i].provinceid;
		      	data[i].name = data[i].provincename;
		      }
		      $('#province, #city').citylist({
				data    : data,
				id      : 'id',
				children: 'cities',
				name    : 'name',
				metaTag : 'name',
				idVal: true,
				selected: [<?php echo $pid;?>, <?php echo $cid;?>]
			  });
		    }, function(response) {

		    });
	},
	data: {
		is_getting_list: false,
		items: {
			course: {
				page: 1,
				more: 1,
				details: [],
				endpoint: url1,
				type: 0,
				is_getting_list: false
			},
			activity: {
				page: 1,
				more: 1,
				details: [],
				endpoint: url2,
				type: 0,
				is_getting_list: false
			},
			favorite: {
				course2: {
					page: 1,
					more: 1,
					details: [],
					endpoint: url3,
					type:2,
					is_getting_list: false
				},
				knowledge2: {
					page: 1,
					more: 1,
					details: [],
					endpoint: url3,
					type: 3,
					is_getting_list: false
				},
				activity2: {
					page: 1,
					more: 1,
					details: [],
					endpoint: url3,
					type: 1,
					is_getting_list: false
				}
			}
		}
	},
	methods: {
		getMore: function(type, direction) {
			var item;
			if (type in this.items) {
				item = this.items[type]
			}
			else if (type in this.items.favorite) {
				item = this.items.favorite[type]
			}
			else {
				console.log("unknown type")
			}
			if (direction == 0) {
				item.page -= 1;
			}
			else if (direction == 1) {
				item.page += 1;
			}
			item.is_getting_list = true
			item.details = []
			this.$http.get(item.endpoint, {params: {page_num: item.page, type: item.type}}).then(function(response) {
				console.log(response)
				item.more = response.data.have_more
				if (response.data.data) {
					for (var key in response.data.data) {
						item.details.push(response.data.data[key])
					}
					console.log(item.details)
				}
				item.is_getting_list = false
			}, function(response) {
				console.log('error')
				item.is_getting_list = false
			});
		}
	}
})
</script>
<script src="/yoga/Public/assets/js/jquery.form.js"></script>
<script type="text/javascript">
$(function() {


	/* 切换标签 */
	$sections = $('.person-main-detail');
	$indicators = $('.person-main-header a')
	$('.person-main-header a').click(function(e) {
		e.preventDefault();
		$indicators.removeClass('active');
		$(this).addClass('active');

		var $index = $indicators.index(this);
		$sections.removeClass('current').eq($index).addClass('current');
	});

	/* 切换子标签 */
	$sub_secs = $('.person-sub-detail');
	$sub_indis = $('.person-sub-header a');
	$('.person-sub-header a').click(function(e) {
		e.preventDefault();
		$sub_indis.removeClass('active');
		$(this).addClass('active');

		var $index = $sub_indis.index(this);
		$sub_secs.removeClass('current').eq($index).addClass('current');

	})

	$('.person-edit').click(function(e) {
		e.preventDefault();
		$('.person-info-wrapper').addClass('editing');
		$('.person-edit').css({'display': 'none'});
		$('.person-edit-submit').css({'display': 'block'});
		$('.person-edit-cancel').css({'display': 'block'});
	});

	$('.person-edit-cancel').click(function(e) {
		e.preventDefault();
		$('.person-info-wrapper').removeClass('editing');
		$('.person-edit').css({'display': 'block'});
		$('.person-edit-submit').css({'display': 'none'});
		$('.person-edit-cancel').css({'display': 'none'});
	});

	$('input[type=file]').change(function(e) {
		if (e.target.files[0]) {
			$(this).next().html(e.target.files[0].name);
		}
		else {
			$(this).next().html('选择文件')
		}

	})
})
</script>
<script type="text/javascript">
$(function(){

	function logcomplete(data){
		if(data.status==1){
			layer.alert(data.info, {icon: 6}, function(index){
				layer.close(index);
				window.location.href=data.url;
				});
			return false;
		}else{
			layer.alert(data.info, {icon: 6}, function(index){
				layer.close(index);

				});
			return false;
		}
	}


function checkForm(){
		if( '' == $.trim($('#member_list_username ').val())){
			layer.alert('姓名不能为空');
			$('#member_list_username').focus();
          return false;
		}
		if( '' == $.trim($('#member_list_petrname ').val())){
			layer.alert('昵称不能为空');
			$('#member_list_petrname').focus();
			return false;
		}
		if( '' == $.trim($('#member_list_email').val())){
			layer.alert('邮箱不能为空');
			$('#member_list_email').focus();
			return false;
		}
}
		$('#formset').ajaxForm({
			beforeSubmit: checkForm,
			success: logcomplete, // 这是提交后的方法
			dataType: 'json'
		});


	$('#com').click(function(e){
		e.preventDefault();


		$.ajax({
			url:"<?php echo U('User/checkpwd');?>",
            data:$('#form0').serialize(),
			success: logcomplete, // 这是提交后的方法
			dataType: 'json'
		});
	}

	);

});
//建立一個可存取到該file的url
function getObjectURL(file) {
	var url = null ;
	if (window.createObjectURL!=undefined) { // basic
	$("#news_flag_vap").attr("checked", true);
		url = window.createObjectURL(file) ;
	} else if (window.URL!=undefined) { // mozilla(firefox)
	$("#news_flag_vap").attr("checked", true);
		url = window.URL.createObjectURL(file) ;
	} else if (window.webkitURL!=undefined) { // webkit or chrome
		$("#news_flag_vap").attr("checked", true);
		url = window.webkitURL.createObjectURL(file) ;
	}
	return url ;
}

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

    <div class="col-lg-7 col-md-7 col-sm-7 footer-focus">
        <h5 class="gzwx">关注微信</h5>
        <div class="item-detail">
        <div class="codeImg-wrap"><img src="/yoga/Public/yoga/img/shanghai.jpg"><span style="font-size:14px;text-align:center;display:block">上海</span></div>
          <div class="codeImg-wrap"><img src="/yoga/Public/yoga/img/beijing.jpg"><span style="font-size:14px;text-align:center;display:block">北京</span></div>
          <div class="codeImg-wrap"><img src="/yoga/Public/yoga/img/chengdu.jpg"><span style="font-size:14px;text-align:center;display:block">成都</span></div>
          <div class="codeImg-wrap"><img src="/yoga/Public/yoga/img/hangzhou.jpg"><span style="font-size:14px;text-align:center;display:block">杭州</span></div>

      	</div>
    </div>
    <div class="col-xs-12 col-sm-12 footer-end">闽ICP备16023905号-1</div>
  </div>


  <script src="/yoga/Public/layer/layer.js"></script>


<script type="text/javascript" src="/yoga/Public/yoga/js/main.js"></script>



</body>
</html>