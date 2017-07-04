var MyHeader = Vue.extend({
	template: '<div class="g-header"><div class="logo-wrap"><img src="img/logo.png"></div><ul class="nav-top pull-right"><li class="active"><a href="##">课程</a></li><li><a href="##">知识</a></li><li><a href="##">活动</a></li><li><a href="##">全国团练点</a></li><li><a href="##">关于我们</a></li><li class="enter"><a href="##">登录</a></li></ul></div>'
});

Vue.component('my-header', MyHeader);