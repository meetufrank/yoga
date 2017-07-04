<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- saved from url=(0044)http://meetuuu.com/Home/class/classload.html -->
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0">

		<title>生活的艺术-课程列表</title>


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


		<link href="/yoga/Public/yoga/css/app.aa0b196897212e6e8e0c0fb45110ed57.css" rel="stylesheet">

		<!-- <link rel="stylesheet" type="text/css" href="css/static.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">

		<link rel="stylesheet" href="css/layer.css" id="layui_layer_skinlayercss">-->

	</head>
<body>

<style>
.window-indi {
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
	}
@media (min-width:769px) and (max-width: 998px){
	.morecss{
    margin-top: -15px;
	margin-left: 45%;
    width: 14%;
    font-size: 20px;
    height: 35px;
    line-height: 35px;
	display:block;
	background-image:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADQAAAAfBAMAAABaPfMtAAAAGFBMVEXj4dvw7efq5+Lu7OXr6ePl493n5d/x7+n7lYJKAAACSElEQVQozx2SzXLiMBCEO0LSeUfyOlfJBnJF/stVwg5cFUxyNiF5gA1bta+/Q24qzUxX19eNDS7ORxHoRYVmEUYXqEORz7ct1JfvZQGxwavB26nDk8PHokMEPAWD4ABBTlBLUX4Dqm7gQfs1udedIFsiFVVo0C4j2UUSHHAttRF0wLkAdLt454sFKQLVRlsEvEGEqPe47FZRZax5jZWydynrj3SDp16UYsB2zQ/4JsVLrLOnqdG2smi0kdTxJ45u9XuOr5vaqkaUGDFpcxrjg/Pw7vprfknkRh4ZHnUnFosP0WO2ravJTvd9hLFQtu1eRP/Qn6GOBkeTgXpJbiYn6QCIb2kUFp3FbUHlXuNc4o1t4VRpPl7QLKe00/XjsCq13aqzzeKZFnbcgCx18F3ldJH9Ldh7AFW+9IJwbLssrAPgo7TtAbUBINqccInAccC646xUB8a1iPtCnCGHj9HmM5FByuNmHQ66JTbKoATRnbM7Jcdx079DXpmvq1GNBnNbwBjyzMhXTQXmo9GifQcaYCN3shQ/eCDymJPzLnwBVZZmtbv+1YPo5QtDmfAYfXxewGI/o281yB5XV2MCxYsLGdCFNHInBjHojNldmUTNJdgCn2PxUz5ce+iJCbs6QrUZn3i27AZpXwUnxluKq50stnWJNWGfffYcxZ8GqduIe5yJuyZoDzCq1YCPPWSR1XuH5PTaqdQDjKhU7QLo4JBscLMBcC1wBpeH8tNOTK1BTVPodYtqupccByj/m+2T4Wwyp4En5y0LDP8B4zxzYW3yAt0AAAAASUVORK5CYII=);
	background-repeat: repeat;
	padding-left:2%;
	}
}
@media (max-width:768px){
.morecss{
    margin-top: -18px;
	margin-left:38%;
    width:35%;
    font-size: 20px;
    height: 35px;
    line-height: 35px;
	display:block;
	background-image:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADQAAAAfBAMAAABaPfMtAAAAGFBMVEXj4dvw7efq5+Lu7OXr6ePl493n5d/x7+n7lYJKAAACSElEQVQozx2SzXLiMBCEO0LSeUfyOlfJBnJF/stVwg5cFUxyNiF5gA1bta+/Q24qzUxX19eNDS7ORxHoRYVmEUYXqEORz7ct1JfvZQGxwavB26nDk8PHokMEPAWD4ABBTlBLUX4Dqm7gQfs1udedIFsiFVVo0C4j2UUSHHAttRF0wLkAdLt454sFKQLVRlsEvEGEqPe47FZRZax5jZWydynrj3SDp16UYsB2zQ/4JsVLrLOnqdG2smi0kdTxJ45u9XuOr5vaqkaUGDFpcxrjg/Pw7vprfknkRh4ZHnUnFosP0WO2ravJTvd9hLFQtu1eRP/Qn6GOBkeTgXpJbiYn6QCIb2kUFp3FbUHlXuNc4o1t4VRpPl7QLKe00/XjsCq13aqzzeKZFnbcgCx18F3ldJH9Ldh7AFW+9IJwbLssrAPgo7TtAbUBINqccInAccC646xUB8a1iPtCnCGHj9HmM5FByuNmHQ66JTbKoATRnbM7Jcdx079DXpmvq1GNBnNbwBjyzMhXTQXmo9GifQcaYCN3shQ/eCDymJPzLnwBVZZmtbv+1YPo5QtDmfAYfXxewGI/o281yB5XV2MCxYsLGdCFNHInBjHojNldmUTNJdgCn2PxUz5ce+iJCbs6QrUZn3i27AZpXwUnxluKq50stnWJNWGfffYcxZ8GqduIe5yJuyZoDzCq1YCPPWSR1XuH5PTaqdQDjKhU7QLo4JBscLMBcC1wBpeH8tNOTK1BTVPodYtqupccByj/m+2T4Wwyp4En5y0LDP8B4zxzYW3yAt0AAAAASUVORK5CYII=);
	background-repeat: repeat;
	padding-left:3%;
	}
}
@media (min-width:1024px){
.morecss{
    margin-top: -18px;
	margin-left:45%;
    width:13%;
    font-size: 20px;
    height: 35px;
    line-height: 35px;
	display:block;
	background-image:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADQAAAAfBAMAAABaPfMtAAAAGFBMVEXj4dvw7efq5+Lu7OXr6ePl493n5d/x7+n7lYJKAAACSElEQVQozx2SzXLiMBCEO0LSeUfyOlfJBnJF/stVwg5cFUxyNiF5gA1bta+/Q24qzUxX19eNDS7ORxHoRYVmEUYXqEORz7ct1JfvZQGxwavB26nDk8PHokMEPAWD4ABBTlBLUX4Dqm7gQfs1udedIFsiFVVo0C4j2UUSHHAttRF0wLkAdLt454sFKQLVRlsEvEGEqPe47FZRZax5jZWydynrj3SDp16UYsB2zQ/4JsVLrLOnqdG2smi0kdTxJ45u9XuOr5vaqkaUGDFpcxrjg/Pw7vprfknkRh4ZHnUnFosP0WO2ravJTvd9hLFQtu1eRP/Qn6GOBkeTgXpJbiYn6QCIb2kUFp3FbUHlXuNc4o1t4VRpPl7QLKe00/XjsCq13aqzzeKZFnbcgCx18F3ldJH9Ldh7AFW+9IJwbLssrAPgo7TtAbUBINqccInAccC646xUB8a1iPtCnCGHj9HmM5FByuNmHQ66JTbKoATRnbM7Jcdx079DXpmvq1GNBnNbwBjyzMhXTQXmo9GifQcaYCN3shQ/eCDymJPzLnwBVZZmtbv+1YPo5QtDmfAYfXxewGI/o281yB5XV2MCxYsLGdCFNHInBjHojNldmUTNJdgCn2PxUz5ce+iJCbs6QrUZn3i27AZpXwUnxluKq50stnWJNWGfffYcxZ8GqduIe5yJuyZoDzCq1YCPPWSR1XuH5PTaqdQDjKhU7QLo4JBscLMBcC1wBpeH8tNOTK1BTVPodYtqupccByj/m+2T4Wwyp4En5y0LDP8B4zxzYW3yAt0AAAAASUVORK5CYII=);
	background-repeat: repeat;
	padding-left:2%;
	}
}
a:focus{outline:none;}
</style>


  <script>
     $(function(){
       <?php
 if($_GET){ echo 'var obj='.json_encode($_GET).';'; } ?>
      if(typeof(obj)!='undefined'){
          for(k in obj){
        	  $("#"+k).val(obj[k]);
            $("a["+k+"="+obj[k]+"]").addClass("active").siblings().removeClass("active");
            if(k!='time'){
            $("a["+k+"="+obj[k]+"]").parent().siblings().children().removeClass("active");
            }
          }
      }
     })
    </script>
    <script>
        function Filter(a,b){
          var $ = function(e){return document.getElementById(e);}
          var ipts = $('filterForm').getElementsByTagName('input'),result=[];
          for(var i=0,l=ipts.length;i<l;i++){
          if(ipts[i].getAttribute('to')=='filter'){
          result.push(ipts[i]);
          }
          }
          if($(a)){
          $(a).value = b;
          for(var j=0,len=result.length;j<len;j++){

            if(result[j].value=='' || result[j].value=='0'){
            result[j].parentNode.removeChild(result[j]);
            }
          }
            document.forms['filterForm'].submit();
          }
          return false;
          }

        function showchild(a) {
        	var a=document.getElementById(a);
            if(a.style.display == "block"){
                a.style.display = "none";
            }else{
            	hidden(a);
                a.style.display = "block";
            }
        }
        function showtype(a){
        	var a=document.getElementById(a);
        	var p=document.getElementById("persons");
            if(a.style.display == "block"){
                a.style.display = "none";

            }else{
            	//a.parentNode.children.style.display="none";

                hidden(a);
                a.style.display = "block";
                p.style.display = "block";
            }
        }
        $("#persons a").click(function () {
        	$(this).addClass("active").siblings().removeClass("active");
            $('#types').tab('show');
          });

        function hidden( elem ) {

        	var r = [];

        	var n = elem.parentNode.firstChild;

        	for ( ; n; n = n.nextSibling ) {


        	if ( n.nodeType === 1 && n !== elem ) {

        	n.style.display="none";

        	}

        	}

        }
    </script>

	<div id="app">
	<form id="filterForm" name="form1" method="get" action="<?php echo U('Class/classload');?>">
      <input id="time" type="hidden" value="" name="time" to="filter">
      <input id="place" type="hidden" value="" name="place" to="filter">
      <input id="type" type="hidden" value="" name="type" to="filter">
		<div class="course-main">
		<div class="course-filter-wrapper">
			<div class="course-filter-header clearfix">
				<div class="course-filter-item">
				<a href="javascript:showchild('times')" ><span class="f-text"><?php if($timestring != ''): echo ($timestring); else: ?>时间<?php endif; ?></span><span class="course-caret"></span></a>
				</div>
				<div class="course-filter-item"> <a href="javascript:showchild('places')"><span class="f-text"><?php if($adstr != ''): echo ($adstr); else: ?>地点<?php endif; ?></span><span class="course-caret"></span></a> </div>
				<div class="course-filter-item"> <a href="javascript:showchild('persons')"><span class="f-text"><?php if($typestr != ''): echo (subtext($typestr,5)); else: ?>课程<?php endif; ?></span><span class="course-caret"></span></a> </div>
			</div>
			<div class="course-filter-body clearfix" >
				<div class="course-filter-inner course-filter-inner-left" id="times" style="display:none;">
				    <div class="course-filter-body-item"><a  time="all" href="javascript:Filter('time','all');">全部</a></div>
				    <div class="course-filter-body-item"><a  time="week" href="javascript:Filter('time','week');">一周内</a></div>
				    <div class="course-filter-body-item"><a  time="month" href="javascript:Filter('time','month');">一个月内</a></div>
				    <div class="course-filter-body-item"><a  time="year" href="javascript:Filter('time','year');">三个月内</a></div>
				    <div class="course-filter-body-item"><a  time="other" href="javascript:Filter('time','other');">往期</a></div>
				</div>
				<div class="course-filter-inner course-filter-inner-left" id="places" style="display:none;">
				    <div class="course-filter-body-item"><a  place="all" href="javascript:Filter('place','all');">全部</a></div>
				    <div class="course-filter-body-item"><a  place="北京" href="javascript:Filter('place','北京');">北京</a></div>
				    <div class="course-filter-body-item"><a  place="上海" href="javascript:Filter('place','上海');">上海</a></div>
				    <div class="course-filter-body-item"><a  place="广州" href="javascript:Filter('place','广州');">广州</a></div>
				    <div class="course-filter-body-item"><a  place="成都" href="javascript:Filter('place','成都');">成都</a></div>
				    <div class="course-filter-body-item"><a  place="国内其他" href="javascript:Filter('place','国内其他');">国内其他</a></div>
				    <div class="course-filter-body-item"><a  place="境外" href="javascript:Filter('place','境外');">境外</a></div>
				</div>
				<div class="course-filter-inner course-filter-inner-left" id="persons" style="display:none;">
				    <div class="course-filter-body-item"><a   href="javascript:showtype('alltype','persons');" >全部</a></div>
				    <?php if(is_array($person)): foreach($person as $key=>$pe): ?><div class="course-filter-body-item"><a   href="javascript:showtype('son_<?php echo ($pe["diyflag_value"]); ?>','persons');" ><?php echo ($pe["diyflag_name"]); ?></a></div><?php endforeach; endif; ?>

				</div>
				<div class="course-filter-inner course-filter-inner-left" id="alltype" style="display:none;">
                  <div class="course-filter-body-item">
                   <a   class="active" type="all" href="javascript:Filter('type','all');">全部</a>
				    <?php if(is_array($typedata)): foreach($typedata as $key=>$ty): ?><a  type="<?php echo ($ty["ct_id"]); ?>" href="javascript:Filter('type','<?php echo ($ty["ct_id"]); ?>');"><?php echo ($ty["ct_name"]); ?></a><?php endforeach; endif; ?>
				    </div>
                </div>
				<?php if(is_array($type_con)): foreach($type_con as $key=>$tc): ?><div class="course-filter-inner course-filter-inner-left" id="son_<?php echo ($key); ?>" style="display:none;">
				    <?php if(is_array($tc)): foreach($tc as $key=>$tc_son): ?><div class="course-filter-body-item"><a  type="<?php echo ($tc_son["ct_id"]); ?>" href="javascript:Filter('type','<?php echo ($tc_son["ct_id"]); ?>');"><?php echo ($tc_son["ct_name"]); ?></a></div><?php endforeach; endif; ?>

				</div><?php endforeach; endif; ?>

			</div>
		</div>
		<div class="p-course-filter-wrapper">
			<!-- 原来的-->
			<!-- <div class="p-course-inner-filter">
				<div class="p-single-filter clearfix">
					<div class="p-single-filter-title">时间</div>
					<div class="p-single-filter-body clearfix">
						<div class="p-single-filter-item"> <a href="http://meetuuu.com/Home/class/classload.html#" class="active">全部</a>   </div>
						<div class="p-single-filter-item"> <a href="http://meetuuu.com/Home/class/classload.html#">进行中</a> <span class="icon" style="display: none;"></span> <div class="p-single-filter-sub-items clearfix" style="display: none;"> <a href="http://meetuuu.com/Home/class/classload.html#">一周内</a><a href="http://meetuuu.com/Home/class/classload.html#">一个月内</a><a href="http://meetuuu.com/Home/class/classload.html#">半年内</a> </div> </div><div class="p-single-filter-item"> <a href="http://meetuuu.com/Home/class/classload.html#">往期</a>   </div> </div> </div><div class="p-single-filter clearfix"> <div class="p-single-filter-title">地点</div> <div class="p-single-filter-body clearfix"> <div class="p-single-filter-item"> <a href="http://meetuuu.com/Home/class/classload.html#" class="active">全部</a>   </div><div class="p-single-filter-item"> <a href="http://meetuuu.com/Home/class/classload.html#">北京</a>   </div><div class="p-single-filter-item"> <a href="http://meetuuu.com/Home/class/classload.html#">上海</a>   </div><div class="p-single-filter-item"> <a href="http://meetuuu.com/Home/class/classload.html#">广州</a>   </div><div class="p-single-filter-item"> <a href="http://meetuuu.com/Home/class/classload.html#">成都</a>   </div><div class="p-single-filter-item"> <a href="http://meetuuu.com/Home/class/classload.html#">国内其他</a>   </div><div class="p-single-filter-item"> <a href="http://meetuuu.com/Home/class/classload.html#">境外</a>   </div> </div> </div><div class="p-single-filter clearfix"> <div class="p-single-filter-title">人群</div> <div class="p-single-filter-body clearfix"> <div class="p-single-filter-item"> <a href="http://meetuuu.com/Home/class/classload.html#" class="active">全部</a>   </div><div class="p-single-filter-item"> <a href="http://meetuuu.com/Home/class/classload.html#">儿童/青少年</a>   </div><div class="p-single-filter-item"> <a href="http://meetuuu.com/Home/class/classload.html#">成人</a>   </div><div class="p-single-filter-item"> <a href="http://meetuuu.com/Home/class/classload.html#">企业</a>   </div> </div> </div><div class="p-single-filter clearfix"> <div class="p-single-filter-title">类型</div> <div class="p-single-filter-body clearfix"> <div class="p-single-filter-item"> <a href="http://meetuuu.com/Home/class/classload.html#" class="active">全部</a>   </div><div class="p-single-filter-item"> <a href="http://meetuuu.com/Home/class/classload.html#">快乐课程</a>   </div><div class="p-single-filter-item"> <a href="http://meetuuu.com/Home/class/classload.html#">完美瑜伽</a>   </div><div class="p-single-filter-item"> <a href="http://meetuuu.com/Home/class/classload.html#">三摩地静心课</a>   </div><div class="p-single-filter-item"> <a href="http://meetuuu.com/Home/class/classload.html#">儿童课程</a>   </div><div class="p-single-filter-item"> <a href="http://meetuuu.com/Home/class/classload.html#">青少年课程</a>   </div><div class="p-single-filter-item"> <a href="http://meetuuu.com/Home/class/classload.html#">阿育吠陀烹饪课程</a>   </div><div class="p-single-filter-item"> <a href="http://meetuuu.com/Home/class/classload.html#">高级课</a>   </div><div class="p-single-filter-item"> <a href="http://meetuuu.com/Home/class/classload.html#">突破个人极限</a>   </div><div class="p-single-filter-item"> <a href="http://meetuuu.com/Home/class/classload.html#">预备师资课</a>   </div><div class="p-single-filter-item"> <a href="http://meetuuu.com/Home/class/classload.html#">祝福课</a>   </div><div class="p-single-filter-item"> <a href="http://meetuuu.com/Home/class/classload.html#">前世今生</a>   </div><div class="p-single-filter-item"> <a href="http://meetuuu.com/Home/class/classload.html#">志愿者培训课程</a>   </div><div class="p-single-filter-item"> <a href="http://meetuuu.com/Home/class/classload.html#">企业课程</a>   </div><div class="p-single-filter-item"> <a href="http://meetuuu.com/Home/class/classload.html#">企业领导课程</a>   </div> </div> </div>
			</div>  -->

			<!-- 修改后的  筛选条件-->
			<div class="p-course-inner-filter clearfix">
				<div class="panel-group" id="father">
					<div class="panel panel-default">
						<div class="panel-heading clearfix" style="background:#fff;">
							<div class="p-single-filter-item pull-left">
								<div class="p-single-filter-title">时间 </div>
								<a class="active" time="all" href="javascript:Filter('time','all');">全部</a>
								<a  time="week" href="javascript:Filter('time','week');">一周内</a>
								<a  time="month" href="javascript:Filter('time','month');">一个月内</a>
								<a  time="year" href="javascript:Filter('time','year');">三个月内</a>
								<a  time="other" href="javascript:Filter('time','other');">往期</a>
							</div>
						</div>
					</div>

					<div class="panel panel-default">
						<div class="panel-heading clearfix" style="background:#fff;">
						<div class="p-single-filter-item pull-left" style="width:100px;">
								<div class="p-single-filter-title">地点 </div>
								<a class="active" place="all" href="javascript:Filter('place','all');">全部</a>
							</div>
							<div id="address" class="p-single-filter-item pull-left" style="width:84%; line-height:24px; height:24px; overflow:hidden;">

                                <a  place="北京" href="javascript:Filter('place','北京');">北京</a>
                                <a  place="上海" href="javascript:Filter('place','上海');">上海</a>
                                <a  place="广州" href="javascript:Filter('place','广州');">广州</a>
                                <a  place="成都" href="javascript:Filter('place','成都');">成都</a>
                                <a  place="国内其他" href="javascript:Filter('place','国内其他');">国内其他</a>
                                <a  place="境外" href="javascript:Filter('place','境外');">境外</a>


							</div>
							<!--
							<h4 class="fol_open_1 pull-right panel-title" style="width:1%;">
								<a href="javascript:;" val="1">
									<span class="glyphicon glyphicon-chevron-down">&nbsp;</span>
								</a>
							 </h4>
							 -->
						</div>

					</div>
					<div class="panel panel-default">
						<div class="">
							<div class="panel-heading clearfix" id="hoverall">
								<div id="myTab" class="p-single-filter-item pull-left">
									<div class="p-single-filter-title">人群 </div>
									<!-- Nav tabs -->
									<a class="active" href="#crowd-tabs-1" role="tab" data-toggle="tab">全部</a>
									<?php $count=2; ?>
									<?php if(is_array($person)): foreach($person as $key=>$pro): ?><a href="#crowd-tabs-<?php echo ($count); ?>" role="tab" data-toggle="tab"><?php echo ($pro["diyflag_name"]); ?></a>
									<?php $count++; endforeach; endif; ?>

								</div>
								<!-- <h4 class="panel-title pull-right">
									<a href="#third" data-toggle="collapse" data-parent="#father">
										<span class="glyphicon glyphicon-chevron-down pull-right"></span>
									</a>
								 </h4> -->
							</div>
							<!-- <div class="panel-collapse collapse" id="third">
								<div class="panel-body" style="padding:0px 15px 10px 15px; border-top: none; background:#f5f5f5;">
									<div class="row">
										<div style="margin-left: 60px;">
											<div class="p-single-filter-item">
												<a href="#">隐藏选</a><a href="#">隐藏选项</a>
												<a href="#">隐藏选项</a><a href="#">隐藏选项选项</a>
											</div>
										</div>
									</div>
								</div>
							</div> -->
						</div>
						<div class="">
							<!-- Tab panes -->
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane active" id="crowd-tabs-1">
									<div class="panel-heading clearfix">
									<div class="p-single-filter-item" style="width:100px;">
											<div class="p-single-filter-title">类型 </div>
											<a  class="active" type="all" href="javascript:Filter('type','all');">全部</a>
										</div>

										<div id="type_1" class="p-single-filter-item pull-left" style="width:84%; line-height:24px; height:24px; overflow:hidden;">
											<?php if(is_array($typedata)): foreach($typedata as $key=>$ty): ?><a  type="<?php echo ($ty["ct_id"]); ?>" href="javascript:Filter('type','<?php echo ($ty["ct_id"]); ?>');"><?php echo ($ty["ct_name"]); ?></a><?php endforeach; endif; ?>
										</div>
										<h4 class="fol_open_2 pull-right panel-title" style="width:1%;">
											<a href="javascript:;" val="1">
												<span class="glyphicon glyphicon-chevron-down">&nbsp;</span>
											</a>
									 	</h4>
									</div>

								</div>
								<?php $count=2; ?>
								<?php if(is_array($type_con)): foreach($type_con as $key=>$tc): ?><div role="tabpanel" class="tab-pane" id="crowd-tabs-<?php echo ($count); ?>">
									<div class="panel-heading clearfix">

										<div class="p-single-filter-item" style="width:100px;">
											<div class="p-single-filter-title">类型 </div>
											<a  type="all" href="javascript:Filter('type','all');">全部</a>
										</div>

										<div class="p-single-filter-item pull-left" style="width:84%; line-height:24px; height:24px; overflow:hidden;">
											<?php if(is_array($tc)): foreach($tc as $key=>$tc_son): ?><a  type="<?php echo ($tc_son["ct_id"]); ?>" href="javascript:Filter('type','<?php echo ($tc_son["ct_id"]); ?>');"><?php echo ($tc_son["ct_name"]); ?></a><?php endforeach; endif; ?>
										</div>

									</div>
								</div>
								<?php $count++; endforeach; endif; ?>


							</div>
						</div>
					</div>
				</div>
			</div>


		</div>
		</div>
		</form>

		<!--筛选结果-->
		<div class="course-items-wrapper clearfix" id="content">
		<?php if(is_array($classdata)): foreach($classdata as $key=>$cd): ?><div class="course-item" >
				<div class="course-item-wrapper">
					<a class="course-item-inner" href="<?php echo ($cd["location_url"]); ?>">
						<img alt="" src="/yoga/Public/<?php echo ($cd["mc_photo"]); ?>">
						<span class="course-item-title"><?php echo ($cd["mc_title"]); ?></span>
					</a>
					<div class="course-item-text"><?php echo ($cd["mc_say"]); ?></div>
					<div class="course-item-icons clearfix">
						<div class="course-item-sub-icons1 clearfix">
							<div class="course-icon course-loca-icon">
								<img src="/yoga/Public/yoga/img/address.png">
								<span><?php echo ($cd["mc_adress"]); ?></span>
							</div>
							<div class="course-icon course-time-icon">
								<img src="/yoga/Public/yoga/img/calendar.png">
								<span><?php echo ($cd["mc_starttime"]); ?>~<?php echo ($cd["mc_stoptime"]); ?></span>
							</div>
						</div>
						<div class="course-item-sub-icons2 clearfix">
							<div class="course-icon course-like-icon">
								<img src="/yoga/Public/yoga/img/eye.png">
								<span><?php echo ($cd["mc_readnum"]); ?></span>
							</div>
							<div class="course-icon course-praise-icon">
								<img src="/yoga/Public/yoga/img/zan.png">
								<span><?php echo ($cd["mc_agreenum"]); ?></span>
							</div>
							<div class="course-icon course-view-icon">
								<img src="/yoga/Public/yoga/img/heart.png">
								<span><?php echo ($cd["mc_savenum"]); ?></span>
							</div>
						</div>
					</div>
				</div>
			</div><?php endforeach; endif; ?>
			<?php if($havemore == 1): ?><div class="get-more-item" id="more">
			 <span class="white-line"></span>
				<span id="getmore" class="morecss" style="color:#ffae00;cursor:pointer">more
			 	<img  src="data:image/png;base64,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" alt=""></span>
			  </div><?php endif; ?>


		</div>



  <script>
    $(function () {
      $('#myTab a').click(function () {
    	  $(this).addClass("active").siblings().removeClass("active");
        $(this).tab('show');
      });
      var p=2;// 初始化页面，点击事件从第二页开始
      var address='<?php echo ($_REQUEST['place']); ?>';
      var times='<?php echo ($_REQUEST['time']); ?>';
      var types='<?php echo ($_REQUEST['type']); ?>';
     $("#getmore").click(function(){

  	   $.ajax({
     		type:'post',
     		url:"<?php echo U('Class/classload');?>",
     		data:{page_num:p,place:address,type:types,time:times},
     		beforeSend:function(){

     			$('#more').before("<div id='load' class='loading-gif'><img src='/yoga/Public/yoga/img/loading.gif'/></div>");
     		},
     		success:function(data){
     			console.log(data);
     	 		if(data.data!=null){
     	 			$.each(data.data,function(i){
     	 				$('#more').before('<div class="course-item" ><div class="course-item-wrapper"><a class="course-item-inner" href="'+data.data[i]['location_url']+'"><img alt="" src="/yoga/Public/'+data.data[i]['mc_photo']+'"><span class="course-item-title">'+data.data[i]['mc_title']+'</span></a><div class="course-item-text">'+data.data[i]['mc_say']+'</div><div class="course-item-icons clearfix"><div class="course-item-sub-icons1 clearfix"><div class="course-icon course-loca-icon"><img src="/yoga/Public/yoga/img/address.png"><span>'+data.data[i]['mc_adress']+'</span></div><div class="course-icon course-time-icon"><img src="/yoga/Public/yoga/img/calendar.png"><span>'+data.data[i]['mc_starttime']+'~'+data.data[i]['mc_stoptime']+'</span></div></div><div class="course-item-sub-icons2 clearfix"><div class="course-icon course-like-icon"><img src="/yoga/Public/yoga/img/eye.png"><span>'+data.data[i]['mc_readnum']+'</span></div><div class="course-icon course-praise-icon"><img src="/yoga/Public/yoga/img/zan.png"><span>'+data.data[i]['mc_agreenum']+'</span></div><div class="course-icon course-view-icon"><img src="/yoga/Public/yoga/img/heart.png"><span>'+data.data[i]['mc_savenum']+'</span></div></div></div></div></div>');
     	 			})
     	 			if(data.have_more==0){
     	 				$('#more').remove();
     	 			}
     	 		}
     	 	},
     	 	complete:function(){
                $("#load").remove();
     		},
     	 	dataType:'json'});
      	p++;

     })

    });




  </script>
	    <script>
	        $(function () {
	            //地点
	            $(".fol_open_1 a").click(function () {
	                var tag = $(this).attr("val");

	                if (tag == "0") {
	                    $("#address").css("height", "24px");
	                    $("#address").css("overflow", "hidden");
	                    $(this).attr("val", "1");
	                    $(this).find("span").attr('class', "glyphicon glyphicon-chevron-down"); //默认的a
	                }
	                else {

	                    $("#address").css("height", "auto");
	                    $(this).attr("val", "0");
	                    $(this).find("span").attr('class', "glyphicon glyphicon-chevron-up"); //展开的a
	                }

	            });
	            //类型_1
	            $(".fol_open_2 a").click(function () {
	                var tag = $(this).attr("val");

	                if (tag == "0") {
	                    $("#type_1").css("height", "24px");
	                    $("#type_1").css("overflow", "hidden");
	                    $(this).attr("val", "1");
	                    $(this).find("span").attr('class', "glyphicon glyphicon-chevron-down"); //默认的a
	                }
	                else {

	                    $("#type_1").css("height", "auto");
	                    $(this).attr("val", "0");
	                    $(this).find("span").attr('class', "glyphicon glyphicon-chevron-up"); //展开的a
	                }

	            });
	        });
	    </script>
<script type=text/javascript src=/yoga/Public/yoga/js/manifest.df3eb60a5109386ee904.js></script>
		<script type=text/javascript src=/yoga/Public/yoga/js/vendor.045023d4653938ae0f50.js></script>
	<script type="text/javascript" src="/yoga/Public/yoga/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>

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