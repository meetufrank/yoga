<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link rel="stylesheet" type="text/css" href="/yoga/Public/yoga/css/DateTimePicker.css">
  <link rel="stylesheet" type="text/css" href="/yoga/Public/yoga/css/wtf-forms.css">
<script src="http://cdn.bootcss.com/vue/1.0.25/vue.min.js"></script>
  <script src="http://cdn.bootcss.com/vue-resource/0.9.3/vue-resource.min.js"></script>
  <title>生活的艺术-课程报名</title>
  
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
	<div class="person-image-wrapper"><img class="res-image" src="/yoga/Public<?php echo ($persondata["member_list_headpic"]); ?>" alt=""></div>
	<div class="person-username"><?php echo ($persondata["member_list_petname"]); ?></div>
</div>
<div class="yoga-course-form clearfix" id="person-container">
	<form method="POST" action="" class="sign-course-form" id="form0">
		<input type="hidden" name="form_type" value="no">
		<input type="hidden" value="<?php echo ($classid); ?>" name="id">
		<div class="form-item clearfix">
			<div class="form-item-desc col-xs-12 col-sm-3">参加人姓名：</div>
			<div class="form-input-wrapper col-xs-12 col-sm-6"><input type="text" name="participant" value="<?php echo ($persondata["member_list_username"]); ?>"></div>
			<div class="error-container col-xs-12 col-sm-3"></div>
		</div>
		<div class="form-item clearfix">
			<div class="form-item-desc col-xs-12 col-sm-3">生日：</div>
			<div class="form-input-wrapper col-xs-12 col-sm-6"><label class="has-calender"><input type="text" name="birthday" data-field="date" readonly=""><span><img src="/yoga/Public/yoga/img/calender.png" alt=""></span></label>
			<div class="box-container"><div id="dtBox"></div></div></div><div class="error-container col-xs-12 col-sm-3"></div>
		</div>
		<div class="form-item clearfix">
			<div class="form-item-desc col-xs-12 col-sm-3">性别：</div>
			<div class="form-input-wrapper col-xs-12 col-sm-6"><div class="col-xs-5 col-sm-4 gender-single">
	            <label for="gender1"><input type="radio" name="gender" id="gender1" value="1" <?php if($persondata["member_list_sex"] == 1): ?>checked<?php endif; ?>><span>男</span></label>
	        </div>
	        <div class="col-xs-5 col-sm-4 gender-single">
	            <label for="gender2"><input type="radio" name="gender" id="gender2" value="0" <?php if($persondata["member_list_sex"] == 0): ?>checked<?php endif; ?>><span>女</span></label>
	        </div></div><div class="error-container col-xs-12 col-sm-3"></div>
		</div>
		<div class="form-item clearfix">
			<div class="form-item-desc col-xs-12 col-sm-3">所持护照：</div>
			<div class="form-input-wrapper col-xs-12 col-sm-6"><input type="text" name="passport" value="中国"></div>
			<div class="error-container col-xs-12 col-sm-3"></div>
		</div>
		<div class="form-item clearfix">
			<div class="form-item-desc col-xs-12 col-sm-6 col-md-5">是否参加过生活艺术的其他课程：</div>
			<div class="form-input-wrapper col-xs-12 col-sm-6 col-md-7">
			<a class="col-xs-5 col-sm-4 already">
	            <label for="already1"><input type="radio" name="already" id="already1" value="1" checked><span>是</span></label>
	        </a>
	        <a class="col-xs-5 col-sm-4 already">
	            <label for="already2"><input type="radio" name="already" id="already2" value="0"><span>否</span></label>
	        </a></div><div class="error-container col-xs-12 col-sm-offset-6 col-md-offset-5 col-sm-3"></div>
		</div>
		<div class="form-item clearfix">
			<div class="form-item-desc col-xs-12 col-sm-3">课程类型：</div>
			<div class="form-input-wrapper col-xs-12 col-sm-6"><select id="course_type" name="course_type">
				<option></option>
				<?php if(is_array($classtype)): foreach($classtype as $key=>$cp): ?><option value="<?php echo ($cp); ?>"><?php echo ($cp); ?></option><?php endforeach; endif; ?>

			</select></div><div class="error-container col-xs-12 col-sm-3"></div>
		</div>
		<?php if($homestatus == 1): ?><div class="form-item clearfix">
			<div class="form-item-desc col-xs-12 col-sm-3">所需房型：</div>
			<div class="form-input-wrapper col-xs-12 col-sm-6"><select id="house_type" name="house_type">
				<option></option>
				<option value="单人间">单人间</option>
				<option value="双人间">双人间</option>
				<option value="三人间">三人间</option>
			</select></div><div class="error-container col-xs-12 col-sm-3"></div>
		</div><?php endif; ?>
		<div class="form-item clearfix">
			<div class="form-item-desc col-xs-12 col-sm-3">联系电话：</div>
			<div class="form-input-wrapper col-xs-12 col-sm-6"><input type="text" name="phone" value="<?php echo ($persondata["member_list_tel"]); ?>"></div><div class="error-container col-xs-12 col-sm-3"></div>
		</div>
		<?php $pid=$persondata['member_list_province']; $cid=$persondata['member_list_city']; ?>
		<div class="form-item clearfix">
			<div class="form-item-desc col-xs-12 col-sm-3">所在地：</div>
			<div class="form-input-wrapper col-xs-12 col-sm-6">
			<div class="col-xs-5 col-sm-4 place"><select class="" id="province" name="province"></select></div>
			<div class="col-xs-5 col-sm-4 place"><select class="" id="city" name="city"></select></div></div><div class="error-container col-xs-12 col-sm-3"></div>
		</div>
		<div class="form-item clearfix">
			<div class="form-item-desc col-xs-12 col-sm-3">Email：</div>
			<div class="form-input-wrapper col-xs-12 col-sm-6"><input type="text" name="email" value="<?php echo ($persondata["member_list_email"]); ?>"></div><div class="error-container col-xs-12 col-sm-3"></div>
		</div>
		<div class="form-item clearfix">
			<div class="form-item-desc col-xs-12 col-sm-6 col-md-5">近期6个月内是否有任何身心状况？：</div>
			<div class="form-input-wrapper col-xs-12 col-sm-6 col-md-7">
			<a class="col-xs-5 col-sm-4 health">
	            <label for="health1"><input type="radio" name="health" id="health1" value="1"><span>是</span></label>
	        </a>
	        <a class="col-xs-5 col-sm-4 health">
	            <label for="health2"><input type="radio" name="health" id="health2" value="0" checked><span>否</span></label>
	        </a>
	        </div><div class="error-container col-xs-12 col-sm-offset-6 col-md-offset-5 col-sm-3"></div>
		</div>
		<div class="form-item health-wrapper clearfix">
		<div class="form-input-wrapper col-xs-12">
			<div class="health-single col-xs-4 col-md-2"><label class="control checkbox"><input type="checkbox" name="health_problem[]" value="怀孕"><span class="control-indicator"></span>怀孕</label></div>
			<div class="health-single col-xs-4 col-md-2"><label class="control checkbox"><input type="checkbox" name="health_problem[]" value="哮喘"><span class="control-indicator"></span>哮喘</label></div>
			<div class="health-single col-xs-4 col-md-2"><label class="control checkbox"><input type="checkbox" name="health_problem[]" value="糖尿病"><span class="control-indicator"></span>糖尿病</label></div>
			<div class="health-single col-xs-4 col-md-2"><label class="control checkbox"><input type="checkbox" name="health_problem[]" value="高血压"><span class="control-indicator"></span>高血压</label></div>
			<div class="health-single col-xs-4 col-md-2"><label class="control checkbox"><input type="checkbox" name="health_problem[]" value="忧郁"><span class="control-indicator"></span>忧郁</label></div>
			<div class="health-single col-xs-4 col-md-2"><label class="control checkbox"><input type="checkbox" name="health_problem[]" value="化放疗"><span class="control-indicator"></span>化放疗</label></div>
			<div class="health-single col-xs-4 col-md-2"><label class="control checkbox"><input type="checkbox" name="health_problem[]" value="心脏疾病"><span class="control-indicator"></span>心脏疾病</label></div>
			<div class="health-single col-xs-4 col-md-2"><label class="control checkbox"><input type="checkbox" name="health_problem[]" value="骨折"><span class="control-indicator"></span>骨折</label></div>
			<div class="health-single col-xs-4 col-md-2"><label class="control checkbox"><input type="checkbox" name="health_problem[]" value="自闭"><span class="control-indicator"></span>自闭</label></div>
			<div class="health-single col-xs-4 col-md-2"><label class="control checkbox"><input type="checkbox" name="health_problem[]" value="青光眼"><span class="control-indicator"></span>青光眼</label></div>
			<div class="health-single col-xs-4 col-md-2"><label class="control checkbox"><input type="checkbox" name="health_problem[]" value="癫痫"><span class="control-indicator"></span>癫痫</label></div>
			<div class="health-single col-xs-4 col-md-2"><label class="control checkbox"><input type="checkbox" name="health_problem[]" value="其他"><span class="control-indicator"></span>其他</label></div></div><div class="error-container col-xs-12"></div>
		</div>
		<div class="form-item clearfix">
			<div class="form-item-desc col-xs-12 col-sm-3">其他</div>
			<div class="form-input-wrapper col-xs-12 col-sm-6"><input type="text" name="other"  placeholder="注：若无其他疾病则无需填写"></div>
		</div>
		<div class="form-item clearfix">
			<div class="form-item-desc col-xs-12 col-sm-3">与服用药物名称</div>
			<div class="form-input-wrapper col-xs-12 col-sm-6"><input type="text" name="medicine" placeholder="注：若无药品需求则无需填写"></div>
		</div>
		<div class="form-item clearfix">
			<div class="form-item-desc col-xs-12 col-sm-3">备注</div>
			<div class="form-input-wrapper col-xs-12 col-sm-6"><textarea></textarea></div>
		</div>
		<div class="col-sm-9 sign-course-wrapper">
		<a  class="person-edit-info sign-course1" href="<?php echo U('Class/class_content',array('id'=>$classid));?>" >取消</a>
		<input type="submit" class="person-edit-info sign-course1" value="提交" id="sign-course">

		</div>
	</form>
</div>
<div class="bottom-background has-background-image">
</div>

<script type="text/javascript" src="/yoga/Public/yoga/js/vendor/DateTimePicker.min.js"></script>
<script type="text/javascript" src="/yoga/Public/yoga/js/vendor/DatetimePicker-i18n-zh-CN.js"></script>
<script type="text/javascript" src="/yoga/Public/yoga/js/vendor/jquery.city.select.min.js"></script>
<script type="text/javascript" src="/yoga/Public/yoga/js/vendor/data.js"></script>
<script type="text/javascript" src="/yoga/Public/yoga/js/vendor/jquery.validate.min.js"></script>
<script type="text/javascript">
$(function($) {
	$(function(){
        var $divWidth = $('.person-image-wrapper img').width();
        $('.person-image-wrapper img').css({'height':$divWidth});
    })
    new Vue({
	el: '#person-container',
	ready: function() {
	this.$http.get("<?php echo U('Class/getaddress');?>").then(function(response) {
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
	}
    })
	/* 日历控件 */
	$('#dtBox').DateTimePicker({
		language: "zh-CN",
		addEventHandlers: function() {
		  var oDTP = this;
		  oDTP.settings.minDate = oDTP.getDateTimeStringInFormat("Date", "yyyy-MM-dd", new Date(1890,1,1));
		  oDTP.settings.maxDate = oDTP.getDateTimeStringInFormat("Date", "yyyy-MM-dd", new Date());
		}
	});

	$('.sign-course-form').validate({
		rules: {
			"participant": {
				required: true
			},
			"birthday": {
				required: true
			},
			"gender": {
				required: true
			},
			"already": {
				required: true
			},
			"course_type": {
				required: {
					depends: function(element) {
						return $('#already1').is(":checked");
					}
				}
			},
			"phone": {
				required: true,
				validPhone: true
			},
			// "province": {
			// 	required: true,
			// 	valueNotEquals: '省'
			// },
			"city": {
				required: true,
				valueNotEquals: '市'
			},
			"email": {
				required: true,
				email: true
			},
			"health": {
				required: true
			},
			"health_problem[]": {
				required: {
					depends: function(element) {
						return $('#health1').is(":checked");
					}
				}
			}

		},
		messages: {
			"participant": {
				required: "此项为必填项"
			},
			"birthday": {
				required: "此项为必填项"
			},
			"gender": {
				required: "此项为必填项"
			},
			"already": {
				required: "此项为必填项"
			},
			"course_type": {
				required: "此项为必填项"
			},
			"phone": {
				required: "此项为必填项",
				validPhone: "请填写11位手机号码"
			},
			// "province": {
			// 	required: "此项为必填项",
			// 	valueNotEquals: "此项为必填项"
			// },
			"city": {
				required: "此项为必填项",
				valueNotEquals: "此项为必填项"
			},
			"email": {
				required: "此项为必填项",
				email: "请填写正确的邮箱"
			},
			"health": {
				required: "此项为必填项"
			},
			"health_problem[]": {
				required: "请至少勾选一项"
			}

		},
		ignore: '.ignore',
		errorPlacement: function(error, element) {
			error.appendTo(element.closest('.form-item').find('.error-container'))
		}
	});

	$.validator.addMethod("valueNotEquals", function(value, element, params) {
		return value != params;
	});

	$.validator.addMethod("validPhone", function(value, element, params) {
		var re = new RegExp('^\\d{11}$');
		if (params) {
			value = parseInt(value)
			console.log(value)
			console.log(re.test(value))
			return re.test(value);
		}
		return true;
	});
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

	/* 表单递交 */
	$('#sign-course').click(function(e) {
		e.preventDefault();
		if ($('.sign-course-form').valid()) {

			$.ajax({
				url:"<?php echo U('class/class_register_add');?>",
	            data:$('#form0').serialize(),
				success: logcomplete, // 这是提交后的方法
				dataType: 'json'
			});


		}

	})

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


  <script src="/yoga/Public/layer/layer.js"></script>


<script type="text/javascript" src="/yoga/Public/yoga/js/main.js"></script>



</body>
</html>