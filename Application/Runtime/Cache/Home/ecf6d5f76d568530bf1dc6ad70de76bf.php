<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>生活的艺术-全国团练点</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<script src="/yoga/Public/yoga/adress/js/echarts.js"></script>
<script src="/yoga/Public/yoga/adress/js/china.js"></script>

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


<!--css-->
<style>
@media (max-width: 768px) {
	*{
		margin:0px;
		padding:0px;
	}
    #main{
        display: none;
    }
	body{
		width:100%;

		background-color:#FFFFFF;
	}
    #phonemap{
        width:85%;
        height:auto;
        background-color:#FFF;
		margin:0px auto;
		padding-top:20px;
    }
	.pmaptitle{

		width:81.5%;
		height:50px;
		padding-top:1em;
		padding-left:1em;
		top:50px;
		left:7.2%;
		background-color:#FFF;
	}
	.pointcity{
		font-size:18px;
	}
	.ui-select{
		font-size:16px;
		margin-left:0.5em;
		width:50%;
		height:30px;
		padding-left:3%;
		background-color:#EBEBEB;
		border:1px solid #FFF;
	}
	.pmapcontent{
		width:100%;
		min-height:650px;
	}
	.pmapcontent li{
		list-style:none;
	}
	.pmapcontent li p{
		margin-left:10px;
		margin-top:15px;
	}
}
@media (min-width: 768px) {
    #main{
        width: 100%;
        height: 700px;
    }
    #phonemap{
        display: none;
    }
}

</style>
<script type="text/javascript">
function sel_div(t) {
  for(var i=1;i<t.length;i++) {
     document.getElementById(t.options[i].value).style.display="none";
  }
  if(t.value!="请选择") {
     document.getElementById(t.value).style.display="block";
  }
}
</script>
</head>

<!--Html-->
<body>
    <div id="main"></div>
<script type="text/javascript">//载入地图
function viewport() {
    var e = window, a = 'inner';
    if (!('innerWidth' in window )) {
        a = 'client';
        e = document.documentElement || document.body;
    }
    return { width : e[ a+'Width' ] , height : e[ a+'Height' ] };
}
if (viewport().width > 768) {
var dom = document.getElementById("main");
var myChart = echarts.init(dom);
var app = {};
option = null;

//geoCoordMap设置地点名称和经纬度
var geoCoordMap = {
    '北京': [116.4551,40.2539],
    '广州': [113.5107,23.7000],
    '成都': [103.9526,30.7617],
    '南京': [118.8008,32.0786],
    '杭州': [120.1665,30.2798],
    '厦门': [118.1214,24.4726],
    '台湾': [121.1592,23.8675],
    '香港': [113.1714,22.2848],
    '深圳': [114.0646,22.6500],
    '昆明': [102.8258,24.9069],
    '上海': [121.4604,31.2535],
    '大连': [121.62,38.92]


};
//这里面的元素必须在geoCoordMap存在才可以显示
//name:上海->根据geoCoordMap找出经纬度
//value: 需要被显示的内容值
var GZData = [
    [{name:'上海'},{name:'香港',value:"<div>地址:生活艺术中心<br/>时间:星期一 7:00pm-7:20pm<br/>联系人: Raymond Ng:9496-2211; Helen Lai:9196-3235; Chloe Tam:9781-6339; Navin Gupta:5579-5150;<br/><br/>地点:生活艺术中心<br/>时间:星期五 10：30am-12:pm<br/>联系人: Chloe Tam:9781-6339; Lai Fang Chua:9829-9001;<br/><br/>地址:11A,Scenic Garden 9 Kotewall Road Mid-levels HongKong;<br/>时间: 10：30am;<br/>联系人:Neelam Daswani:6941-5749;Urvashi:9644-9194;<br/><br/>地址:Estoril Court Club House 55 Garden Road Mid-levels<br/>时间:星期六 9:00am<br/>联系人:Angel Kwok:9285-6890;<br/><br/>地址:生活艺术中心AOL Center;<br/>时间:3:00pm 4:30pm 5:00pm 6:30pm;<br/>联系人:Robert Cho:9103-5929;Louisa Lo:9480-9436;</div>"}],
    [{name:'上海'},{name:'广州',value:"<div>地址:天河区龙口西路帝景园C3棟12G<br/>时间:星期三 19:00-20:30<br/>联系人:SAM老师:13828449109 Keely:18688467584;<br/>团练费:20元/人/次 200元/人/年<br/><br/>地址:白云区黄边北路云山诗意诗意居6栋301号<br/>时间:周六Sat:19:00-20:30<br/>联系人:Anita:13828449109<br/>备注:随喜</div>"}],
    [{name:'上海'},{name:'成都',value:"<div>地址:高新区天府大道南沿线天府软件园D区D2栋南楼5楼,软件园<br/>(天府大道从市区往外走，在麦当劳路口左转)<br/>时间:周三Wed:17:00-19:00<br/>联系人:冷宇 13982162424<br/><br/>地址：青羊区青羊大道97号1单元优诺国际1402室<br/>时间:周四 18:30-20:30<br/>联系人:施飞:13981901755<br/></div>"}],
    [{name:'上海'},{name:'南京',value:"<div>地址:北京东路40号喜悦之路瑜伽馆<br/>时间:星期六 团练 14:00-16:00;知识课 16:00-17:00<br/>联系人:朱秀萍 18936031908<br/>团练费:10元/人/次</div>"}],
    [{name:'上海'},{name:'杭州',value:"<div>地址:萧山区金城路439号发展广场2-2-1602<br/>时间:星期四 18:15-20:15<br/>联系人:俞海 13305710035<br/><br/>地址:城区南复路1号水澄大厦1号楼911室<br/>时间周二Tue:18:00-20:00<br/>张擎 139581520255<br/><br/>地址:城区下城区朝晖路嘉汇大厦3A-6禅院瑜伽<br/>时间周日Sun:14:00-16:00<br/></div>"}],
    [{name:'上海'},{name:'厦门',value:"<div>地址:湖里区禾山路368号成功电子商务大厦9楼<br/>时间:星期六 15:00-17:00<br/>联系人:丽云:13400637134; 卢孔知:13906036003; 吴建莲:13385926139</div>"}],
    [{name:'上海'},{name:'台湾',value:"<div>星期一</div><div>地址:生活的藝術台灣全國中心 南京东路2段178号14楼02-2563-2103<br/>时间:09:00~11:30 + 瑜珈 + 整套呼吸法；18:30~21:00 + 瑜珈 + 整套呼吸法<br/>联系人:台灣中心老師群 02-2563-2103<br/>收費：單次150元 / 年繳3600元<br/><br/>地址:八德路3段團練場-財經天廈 台北市八德路3段219號11樓 (樓下為八方雲集及大同3C)<br/>交通：板南線國父紀念館站5號出口往光復北路方向約8分鐘，公車光復路口站：0東、202、203、205、257、276、605、605副線、605新台五線、1191<br/>时间:19:00~21:30 瑜珈+ 整套呼吸法<br/>联系人:蘇美修老師: 0919-952258<br/><br/><div><a href='Point.html'>点此查看更多</a></div></div>"}],
    [{name:'上海'},{name:'北京',value:"<div>地址:北京市太阳宫丰和园15号院会所二层瑜伽馆(地铁: 十号线太阳宫D口出往左至第一个路口再往左50米路右院内主楼二层.）<br/>时间:每周六:团练: 16:00---18:00 ;唱场: 18:00---19:00.<br/>联系人:袁宁13910077739;健子:13311591681<br/>费用: 30 RMB /人/次</div>"}],
    [{name:'上海'},{name:'深圳',value:"<div>地址:福田区鲁班大厦四楼 舞林大会<br/>时间:周日Sun:10:00~12:00<br/>联系人:杨洁 13609626672<br/>备注:35-45/人/次</div>"}],
    [{name:'上海'},{name:'昆明',value:"<div>地址:昆明昆师路昆明学院内<br/>时间:周四Thur19:00~21:00<br/>联系人:梁老师13818109801<br/>费用:200元场地费平均分摊</div>"}],
    [{name:'上海'},{name:'大连',value:"<div>地址:大连会展路67号百年汇D座2002<br/>时间:周四Thur18:00<br/>联系人:13478910792</div>"}],
    [{name:'上海'},{name:'上海',value:"<div>地址:长宁区天山路600弄同达创业大厦1407室。底楼为工商银行和兴业银行。地铁2号线，娄山关路站，4号口出，往西走。（芙蓉江路口)<br/>时间:周一 Mon: 19:00~21:00;周三Wed:10:00-12:00;周六Sat:8:00~10:00  16:00~18:00<br/>联系人:Karuna:15921102314<br/>备注:随喜<br/><br/>地址:浦东,东方路2111弄15号商铺，阿卡瑜伽馆。近东三里桥路，6号线临沂新村地铁站下步行可到。(一号口出)。<br/>时间:周日Sun：9:30~11:30<br/>联系人:Faustino:15618708211;费用:40RMB/人/次<br/><br/>地址:青浦徐泾叶联路333弄金地天御会所<br/>时间:周日Sun:15:00~17:00</div>"}]
];

var convertData = function (data) {
    var res = [];
    for (var i = 0; i < data.length; i++) {
        var dataItem = data[i];
        var fromCoord = geoCoordMap[dataItem[0].name];
        var toCoord = geoCoordMap[dataItem[1].name];
        if (fromCoord && toCoord) {
            res.push({
                fromName: dataItem[0].name,
                toName: dataItem[1].name,
                coords: [fromCoord, toCoord]
            });
        }
    }
    return res;
};

var color = ['#CD4749'];//小圆点的颜色

var series = [];

[['', GZData]].forEach(function (item, i) {
    series.push({
        name: item[0] + ' Top10',
        type: 'scatter',//选择小圆点样式
        coordinateSystem: 'geo',//选择坐标类型
        zlevel: 1,//优化分层
        label: {
            normal: {
                show: true,
                position: 'right',
                formatter: '{b}'
            }
        },
        symbolSize: function (val) {
            return 10;//这里调节点圈的显示大小
        },
        itemStyle: {
            normal: {
                color: color[i]
            }
        },
        data: item[1].map(function (dataItem) {
            return {
                name: dataItem[1].name,
                value:  geoCoordMap[dataItem[1].name].concat([dataItem[1].value])
            };
        })
    });
});

option = {
    backgroundColor: '#707070',//背景颜色
    title : {
        text: '★ 团练仅开放给上过初级课/净化呼吸/快乐课的学员哦!\n\n★ 每个月第一个星期六的18:15-19:15为唱场!欢迎所有朋友参加!\n\n    Satsang at 18:15-19:15 on First Saturday of every month.',
        textAlign: 'left',
        textStyle:{
            fontStyle:'normal',
            fontSize: '15',
            fontWeight: 'normal',
            color: '#FFAD00',
        },
        left: '65%',//标题组件容器左侧的距离
        bottom: '0%',
    },
    tooltip : {
        trigger: 'item',//默认只能点击一个省份
        formatter: '{b}',//提示框类型
        triggerOn:'mousemove',//提示框触发方式
        showDelay: '0',//浮层显示延迟显示，单位默认ms毫秒
        hideDelay: '500',//浮层默认延迟关闭，单位同上
        position:['20%','40%'],//定义浮动框相对于页面的位置
        backgroundColor: 'rgba(50,50,50,0.7)',//浮动框的文本颜色
        enterable:true,//鼠标是否可以进入悬浮框
        //transitionDuration: 1,
        formatter:function(params){
            //这里面显示提示框内容设置信息
            return params.name + ' : ' + params.value[2];
        }
    },
    geo: {
        map: 'china',
        label: {
            emphasis: {
                show: false
            }
        },
        roam: false,//禁止滚轮放大缩小地图
        zoom: 0.9,//当前视角缩放比
        itemStyle: {
        	//地图默认的颜色和边框色
            normal: {
                areaColor: '#B8B8B8',
                borderColor: 'black'
            },
            emphasis: {
                areaColor: 'white'//地图高亮时背景色
            }
        }
    },
    series: series
};
if (option && typeof option === "object") {
    myChart.setOption(option, true);
}
}

</script>
<div id="phonemap">
    <div class="pmaptitle">
        	<span class="pointcity">城市</span>
        	<select class="ui-select" onchange="sel_div(this)" id="sel">
            			<option value="请选择">选择城市</option>
						<option value="shanghai">上海</option>
						<option value="beijing">北京</option>
                        <option value="xianggang">香港</option>
                        <option value="taiwan">台湾</option>
                        <option value="guangzhou">广州</option>
                        <option value="xiamen">厦门</option>
                        <option value="shenzhen">深圳</option>
                        <option value="hangzhou">杭州</option>
                        <option value="chengdu">成都</option>
                        <option value="kunming">昆明</option>
                        <option value="dalian">大连</option>
			</select>
    <hr width="90%" color="#EBEBEB" size="1" style=" margin-top:10px;">
    </div>

    <div class="pmapcontent">
    	<ul id="shanghai" style="display:none;">
        	<li>
            	<p>地点1:长宁区天山路600弄同达创业大厦1407室。底楼为工商银行和兴业银行。地铁2号线，娄山关路站，4号口出，往西走。(芙蓉江路口)</p>
                <p>时间:周一:19:00~21:00周三:10:00-12:00周六:08:00~10:00 16:00~18:00</p>
                <p>联系人:Karuna15921102314</p>
                <p>费用:随喜</p>

            </li>
            <li>
            	<hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
            <li>
            	<p>地点2:东方路2111弄15号商铺，阿卡瑜伽馆。近东三里桥路，6号线临沂新村地铁站下步行可到。(一號口出)</p>
                <p>时间:周日:09:30~11:30</p>
                <p>联系人:Faustino:15618708211</p>
                <p>费用:40RMB/人/次</p>
            </li>
            <li>
            	<hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
						<li>
            	<p>地点3:青浦区徐泾叶联路333弄金地天御会所</p>
                <p>时间:周日:15:00~17:00</p>
            </li>
            <li>
            	<hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
        </ul>

        <ul id="beijing" style="display:none;">
        	<li>
            	<p>地点1:北京市太阳宫丰和园15号院会所二层曼殊瑜伽馆</p>
                <p>时间:每周六:团练: 16:00---18:00;唱场: 18:00---19:00</p>
                <p>联系人:袁宁13910077739;健子:13311591681</p>
                <p>费用: 30 RMB / 1 人</p>
            </li>
            <li>
                <hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
        </ul>

        <ul id="xianggang" style="display:none;">
            <li>
                <p>地址1:生活艺术中心</p>
                <p>时间:星期一 7:00pm-7:20pm</p>
                <p>联系人: Raymond Ng:9496-2211; Helen Lai:9196-3235; Chloe Tam:9781-6339; Navin Gupta:5579-5150;</p>
                <p>团练内容:深化呼吸</p>
            </li>
            <li>
                <hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
            <li>
                <p>地址2:生活艺术中心</p>
                <p>时间:星期五 10：30am-12:pm</p>
                <p>联系人: Chloe Tam:9781-6339; Lai Fang Chua:9829-9001;</p>
                <p>团练内容:深化呼吸；知识录像</p>
            </li>
            <li>
                <hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
            <li>
                <p>地址3:11A,Scenic Garden 9 Kotewall Road Mid-levels HongKong;</p>
                <p>时间: 10：30am;</p>
                <p>联系人:Neelam Daswani:6941-5749;Urvashi:9644-9194;</p>
                <p>团练内容:深化呼吸</p>
            </li>
            <li>
                <hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
            <li>
                <p>地址4:Estoril Court Club House 55 Garden Road Mid-levels</p>
                <p>时间:星期六 9:00am</p>
                <p>联系人:Angel Kwok:9285-6890;</p>
                <p>团练内容:深化呼吸</p>
            </li>
            <li>
                <hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
            <li>
                <p>地址5:生活艺术中心AOL Center;</p>
                <p>时间:3:00pm 4:30pm 5:00pm 6:30pm;</p>
                <p>联系人:Robert Cho:9103-5929;Louisa Lo:9480-9436;</p>
                <p>时间:每周六:团练: 16:00---18:00;唱场: 18:00---19:00</p>
                <p>联系人:袁宁13910077739</p>
                <p>费用: 30 RMB / 1 人</p>
                <p>备注:仅开放给上过初级课/净化呼吸/快乐课的学员哦！</p>
                <p>团练内容:深化呼吸;知识录像;瑜伽;唱场</p>
            </li>
        </ul>
        <ul id="taiwan" style="display:none;">
            <li>
                <p style="text-align:center;font-size:18px;font-weight:bold;color:red;">大台北地区</P>
            </li>
            <li>
                <p>地點:生活的藝術台灣全國中心,南京東路2段178號14樓,02-2563-2103</p>
                <p>時間:星期一:09:00~11:30 瑜珈 + 整套呼吸法;18:30~21:00 瑜珈 + 整套呼吸法</p>
                <p>老師:台灣中心老師群</p>
                <p>交通/特色/收費/備註:收費：單次150元 / 年繳3600元</p>
            </li>
            <li>
                <hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
            <li>
                <p>地點:八德路3段團練場-財經天廈台北市八德路3段219號11樓(樓下為八方雲集及大同3C)</p>
                <p>時間:星期一:19:00~21:30:瑜珈 + 整套呼吸法</p>
                <p>老師:蘇美修老師: 0919-952258 </p>
                <p>交通/特色/收費/備註:交通：板南線國父紀念館站5號出口往光復北路方向約8分鐘，公車光復路口站：0東、202、203、205、257、276、605、605副線、605新台五線、1191收費：單次100元 / 年繳2400元用品：自備瑜珈墊、蓋身體的薄被或大毛巾</p>
            </li>
            <li>
                <hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
            <li>
                <p>地點:信義團練教室 (原中華電信)台北市信義路二段7號之一 (松錦園)</p>
                <p>時間:星期一:19:00 – 21:00 Sri Sri Yoga 完美瑜珈團練</p>
                <p>老師:陳景鳳等老師群;陳景鳳老師：0937-060-827</p>
                <p>交通/特色/收費/備註:交通：公車信義杭州路口站：0東、3、20、22、38、204、1503、信義幹線捷運東門站  2 號出口步行約5  分鐘特色：限量提供瑜珈墊，容納約30人收費：單次100元
                </p>
            </li>
            <li>
                <hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
            <li>
                <p>地點:大坪林簡老師家</p>
                <p>時間:星期一:18:30靜坐;19:30整套呼吸法</p>
                <p>老師:簡麗莞老師;陳碧華志工：0973-744-403</p>
                <p>交通/特色/收費/備註:場地空間有限，請先與志工聯絡</p>
            </li>
            <li>
                <hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
            <li>
                <p>地點:大坪林簡老師家</p>
                <p>時間:星期二 09:30靜坐,10:30整套呼吸法</p>
                <p>老師:陳碧華志工：0973-744-403</p>
                <p>交通/特色/收費/備註:場地空間有限，請先與志工聯絡</p>
            </li>
            <li>
                <hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
            <li>
                <p>地點:板橋團練場(近期場地將異動¸請先電話確認)板橋府後街8 號2樓(河邊生活館樓上)</p>
                <p>時間:星期三:19:00~21:30瑜珈 + 整套呼吸法</p>
                <p>老師:賴志鵬老師：0919-327872</p>
                <p>交通/特色/收費/備註:交通：板南線府中站一號出口;用品：自備瑜珈墊、蓋身體的薄被或大毛巾</p>
            </li>
            <li>
                <hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
            <li>
                <p>地點:內湖清白里活動中心(由左側門進入)台北市內湖星雲街161巷3號1樓</p>
                <p>時間:星期三 19:00~21:30 瑜珈 + 整套呼吸法</p>
                <p>老師:李承權等老師群 義工 : 蔡淑惠 0922-988063</p>
                <p>交通/特色/收費/備註:交通：文湖線內湖站2號出口，步行5~7分鐘特色：木質地板舞台，拋光石英地磚,挑高寬敞通風佳收費：單次100元  / 半年繳1000元用品：自備瑜珈墊、蓋身體的薄被或大毛巾</p>
            </li>
            <li>
                <hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
            <li>
                <p>地點:文山區木新路2段2號 3樓木柵復活堂 （永慶房屋旁）</p>
                <p>時間:星期三:18:30~21:00 瑜珈 + 整套呼吸法</p>
                <p>老師:吳素菁0934-014626;程秀梅0930975717;蕭明潔0938123258</p>
                <p>交通/特色/收費/備註:交通:近政大用品:請自備瑜珈墊</p>
            </li>
            <li>
                <hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
            <li>
                <p>地點:中和區中興街200號(福樂幼兒園)</p>
                <p>時間:星期三18:30 -21:00 瑜珈 + 整套呼吸法</p>
                <p>老師:余嘉珍老師 0927-028813</p>
                <p>交通/特色/收費/備註:交通:交通: 捷運中和景安站可步行  公車站 - 游氏宗祠用品:  請自備瑜珈墊收費: 單次100元</p>
            </li>
            <li>
                <hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
            <li>
                <p>地點:德噶襌修中心(全德),台北市光復南路1號B1華泰銀行旁地下室</p>
                <p>時間:星期三:19:00 瑜伽 20:00 整套呼吸法</p>
                <p>老師:黃秋明志工: 0911-222-929</p>
                <p>交通/特色/收費/備註:交通：板南線國父紀念館5號出口，步行約5~7分鐘；公車監理站或光復南路口特色：空調，容納20~25人;用品：自備瑜珈墊、蓋身體的薄被或大毛巾第一次前往的學員，請先與志工聯絡</p>
            </li>
            <li>
                <hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
            <li>
                <p>地點:文山區木新路2段2號 3樓 木柵復活堂 （永慶房屋旁）</p>
                <p>時間:星期四:09:30~ 12:00 瑜珈 + 整套呼吸法</p>
                <p>老師:楊莉莉,陳淑敏等老師方曉鶯 : 0935-006076</p>
                <p>交通/特色/收費/備註:交通:近政大用品:請自備瑜珈墊  </p>
            </li>
            <li>
                <hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
            <li>
                <p>地點:新店市建國路136號6樓</p>
                <p>時間:星期四:19:25~21:30 瑜珈 + 整套呼吸法</p>
                <p>老師:陳紫軒老師：0936-103876</p>
                <p>交通/特色/收費/備註:交通：新店線大坪林站1號出口，民權路直走，同仁醫院左轉建國路，步行約5~10分鐘;用品：限量提供瑜珈墊,  請自備蓋身體的薄被或大毛巾;收費: 單次100元(初次參加者請先來電告知)。</p>
            </li>
            <li>
                <hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
            <li>
                <p>地點:生活的藝術台灣全國中心,南京東路2段178號14樓</p>
                <p>時間:星期四:19:00 ~ 21:00;唱場+ 靜心+知識</p>
                <p>老師:台灣中心老師群:02-2563-2103</p>
                <p>交通/特色/收費/備註:費用：隨喜</p>
            </li>
            <li>
                <hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
            <li>
                <p>地點:新店路207號3樓(民眾服務中心)</p>
                <p>時間:星期五:14:00 - 17:00:瑜珈 + 整套呼吸法</p>
                <p>老師:陳季汝老師: 0913-117537，許玉婷義工: 0910-190699 </p>
                <p>交通/特色/收費/備註:交通:新店捷運總站往碧潭吊橋方向3分鐘；收費: 單次100元 / 季繳單次50元；用品: 限量提供瑜伽墊. 請自備蓋身體的薄被或大毛巾</p>
            </li>
            <li>
                <hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
            <li>
                <p>地點:信義團練教室 (原中華電信)台北市信義路二段7號之一 (松錦園)(金甌女中正對面)</p>
                <p>時間:星期五:19:00~21:30；瑜珈 + 整套呼吸法</p>
                <p>老師:陳景鳳,吳清美,郭美君,等老師群，陳景鳳老師：0937-060-827</p>
                <p>交通/特色/收費/備註:交通：公車信義杭州路口站：0東、3、20、22、38、204、1503、信義幹線；捷運東門站  2 號出口步行約5  分鐘；收費：單次100元;特色：限量提供瑜珈墊，容納約30人</p>
            </li>
            <li>
                <hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
            <li>
                <p>地點:文化大學推廣部建國本部,台北市建國南路二段231號6樓</p>
                <p>時間:星期五:19:00~22:00 瑜珈 + 整套呼吸法</p>
                <p>老師:李承權老師：0989-669-521</p>
                <p>交通/特色/收費/備註:交通：文湖線科技大樓站，沿和平東路步行約5~7分鐘至建國南路口;特色：容納20~25人用品：自備瑜珈墊、蓋身體的薄被或大毛巾;收費：單次100元 / 季繳1000元 / 年繳3600元;備註：當日團練如有異動詳1F電視牆公告欄「呼吸法團練」或電洽承權老師</p>
            </li>
            <li>
                <hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
            <li>
                <p>地點:林口團練場,林口區東湖路86號5樓(電鈴按86)</p>
                <p>時間:星期五:19:00~21:30瑜珈 + 整套呼吸法</p>
                <p>老師:義工：Andy 康 0937-954-551</p>
                <p>交通/特色/收費/備註:交通：公車920,1211,1210,1209,1206,1208；松柏蘆站下車步行約5分鐘(由育林街口進去);特色：華麗木質地板，容納12人;收費：單次100元 / 年繳2400元</p>
            </li>
            <li>
                <hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
            <li>
                <p>地點:汐止老爺山莊</p>
                <p>時間:星期六:08:00 瑜伽；09:00 整套呼吸法</p>
                <p>老師:張毓鴻志工 Vicky : 0926-816-430</p>
                <p>交通/特色/收費/備註:場地空間有限，第一次前往的學員，請先以簡訊與志工聯絡</p>
            </li>
            <li>
                <hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
            <li>
                <p>地點:大坪林/美養莊園教室，新店區二十張路11巷1-1號</p>
                <p>時間:星期六:14:30 ~ 17:30,瑜珈 + 整套呼吸法</p>
                <p>老師:李盈毓老師 0921-193-685；義工:常淑芬0932-129-763 </p>
                <p>交通/特色/收費/備註:交通: 捷運大坪林站下車1 號出口 步行ˇ3分鐘，備註: 限量瑜珈墊</p>
            </li>
            <li>
                <hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
            <li>
                <p>地點:中山團練場-民安區民活動中心,台北市長安西路3號3樓</p>
                <p>時間:星期六:06:50 ~ 9:30 瑜珈 + 整套呼吸法</p>
                <p>老師:台灣中心老師群:302-2563-2113</p>
                <p>交通/特色/收費/備註:交通：北投或淡水線中山捷運站步行約5~7分鐘;特色：石質地板，空調+開窗，容納約60~70人;收費：單次100元 / 年繳2400元</p>
            </li>
            <li>
                <hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
            <li>
                <p>地點:石碇靜心亭 (近文山草堂)</p>
                <p>時間:星期六:9:00 ~ 11:30 瑜珈 + 整套呼吸法</p>
                <p>老師:方曉鶯義工 0935-076-006,方淑芳義工0910-776-638</p>
                <p>交通/特色/收費/備註:交通：需要安排共乘,  請聯絡義工;用品：自備蓋身體的薄被或大毛巾</p>
            </li>
            <li>
                <hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
            <li>
                <p>地點:新店中正路 280 巷 2 號,中正川普大厦一樓瑜珈教室</p>
                <p>時間:星期六:6:30 ~ 9:10  瑜珈 + 整套呼吸法</p>
                <p>老師:張素敏義工 0960-121898</p>
                <p>交通/特色/收費/備註:用品：自備瑜珈墊、蓋身體的薄被或大毛巾</p>
            </li>
            <li>
                <hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
            <li>
                <p>地點:大坪林簡老師家</p>
                <p>時間:星期天:08:00靜坐,10:00整套呼吸法</p>
                <p>老師:陳碧華志工：0983-869-413</p>
                <p>交通/特色/收費/備註:場地空間有限，請先與志工聯絡</p>
            </li>
            <li>
                <hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
            <li>
                <p>地點:信義團練教室 (原中華電信),台北市信義路二段7號之一(松錦園),(金甌女中正對面)</p>
                <p>時間:星期天:6:45–8:30,108拜日式,8:30–10:30,蓮花修持法10:30 – 12:30 瑜珈 + 整套呼吸法</p>
                <p>老師:陳景鳳老師：0937-060827;李潔梅義工 : 0911-33869</p>
                <p>交通/特色/收費/備註:交通：公車信義杭州路口站：0東、3、20、22、38、204、1503、信義幹線;捷運東門站  2 號出口步行約5  分鐘;收費：單次100元特色：限量提供瑜珈墊，容納約30人(請電洽確定是否有團練)  ;  (開門,右側對講機請按”0101呼叫”)</p>
            </li>
            <li>
                <hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
            <li>
                <p>地點:生活的藝術台灣全國中心，南京東路2段178號14樓，02-2563-2103</p>
                <p>時間:星期日:7:00 – 9:00，Sri Sri Yoga，完美瑜珈團練，9:30-11:00 知識課</p>
                <p>老師:許麗環,黃韻珊,吳宏基,陳淑敏</p>
                <p>交通/特色/收費/備註:收費：單次200元  季繳2000 元</p>
            </li>
            <li>
                <hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
            <li><p style="text-align:center;font-size:18px;font-weight:bold;color:red;">
宜蘭地區</p></li>
            <li>
                <p>地點:宜蘭團練場,宜蘭縣冬山鄉梅花路859號</p>
                <p>時間:星期一:18:30~21:00;瑜珈 + 整套呼吸法</p>
                <p>老師:林俊強老師：0963-032919黃 瑋老師 : 0910-336039</p>
                <p>交通/特色/收費/備註:交通：1)自行開車者可停在屋後空地, 在宜蘭冬山鄉梅花湖附近2) 國光號 : 於羅東火車前站『羅東鎮公正路110號(粉圓妹樓下)』
搭乘國光號1795線至土雞城站下車，下車後走路3-5分鐘可至團練處3) 首都客運 : 於羅東火車後站『羅東鎮光榮路296號』
搭乘首都客運281線至梅花路口站下車，下車後走路3-5分鐘可至團練處;特色 : 不需攜帶瑜珈墊 , 容納約 15 人;收費 : 單次 100 元</p>
            </li>
            <li>
                <hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
            <li>
                <p>地點:宜蘭團練場，宜蘭縣冬山鄉梅花路859號</p>
                <p>時間:星期六08:30~12:00 早上瑜珈 + 整套呼吸法</p>
                <p>老師:林俊強老師：0963-032919；黃瑋老師 : 0910-336039</p>
                <p>交通/特色/收費/備註:交通：1)自行開車者可停在屋後空地, 在宜蘭冬山鄉梅花湖附近；2) 國光號 : 於羅東火車前站『羅東鎮公正路110號(粉圓妹樓下)』
搭乘國光號1795線至土雞城站下車，下車後走路3-5分鐘可至團練處；3) 首都客運 : 於羅東火車後站『羅東鎮光榮路296號』
搭乘首都客運281線至梅花路口站下車，下車後走路3-5分鐘可至團練處；特色 : 不需攜帶瑜珈墊 , 容納約 15 人；收費 : 單次 100 元</p>
            </li>
            <li>
                <hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
            <li><p style="text-align:center;font-size:18px;font-weight:bold;color:red;">
桃園、中壢地區</p></li>
            <li>
                <p>地點:中壢團練場-芳榕瑜珈教室，中壢市苑平街21號</p>
                <p>時間:星期五:19:00~22:00瑜珈 + 整套呼吸法</p>
                <p>老師:03-428-41111 黃瓊緯老師0920-832-310</p>
                <p>交通/特色/收費/備註:交通：中壢後火車站，健行科大附近頂好超市巷子進入，開車者可停在環中東路上;特色：瑜珈教室，不需額外攜帶瑜珈墊，容納約20人;收費：單次100元</p>
            </li>
            <li>
                <hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
            <li>
                <p>地點:中壢團練場-芳榕瑜珈教室中壢市苑平街21號</p>
                <p>時間:星期日:07:30~10:30 (上午)瑜珈 + 整套呼吸法</p>
                <p>老師:03-428-41111 黃瓊緯老師0920-832-310</p>
                <p>交通/特色/收費/備註:交通：中壢後火車站，健行科大附近頂好超市巷子進入，開車者可停在環中東路上;特色：瑜珈教室，不需額外攜帶瑜珈墊，容納約20人;收費：單次100元</p>
            </li>
            <li>
                <hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
             <li><p style="text-align:center;font-size:18px;font-weight:bold;color:red;">
新竹地區</p></li>
            <li>
                <p>地點:香山團練場-新竹市中華路五段722號</p>
                <p>時間:星期一:19:00~21:30瑜珈 + 整套呼吸法</p>
                <p>老師:吳亮中老師 0937-133-863</p>
                <p>交通/特色/收費/備註:交通：北二高香山交流道(南下新竹下一個交流道)，往新竹市區方向約3分鐘;特色：容納約25~30人;收費：單次100元 / 季繳1100元</p>
            </li>
            <li>
                <hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
            <li>
                <p>地點:香山團練場-新竹市中華路五段722號</p>
                <p>時間:星期三:09:00~12:00 瑜珈 + 整套呼吸法</p>
                <p>老師:吳亮中;李卿</p>
                <p>交通/特色/收費/備註:交通：北二高香山交流道(南下新竹下一個交流道)，往新竹市區方向約3分鐘;特色：場地容納約25~30人;收費：依參加學員人數分攤，每次約100~150元</p>
            </li>
            <li>
                <hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
            <li>
                <p>地點:新竹光明新村,請先電話聯絡</p>
                <p>時間:星期日:14:00~17:00,瑜珈 + 整套呼吸法</p>
                <p>老師:林鴻欽老師　0988-966535</p>
                <p>交通/特色/收費/備註:用品:請自備瑜珈墊</p>
            </li>
            <li>
                <hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
            <li><p style="text-align:center;font-size:18px;font-weight:bold;color:red;">
苗栗地區</p></li>
            <li>
                <p>地點:台中中心團練場,台中市柳川西路3段23號7樓</p>
                <p>時間:星期五:18:30  – 21:00 瑜珈 + 整套呼吸法</p>
                <p>老師:吳麗貞老師：0975-938-597</p>
                <p>交通/特色/收費/備註:特色：備註: 限量提供瑜珈墊</p>
            </li>
            <li>
                <hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
            <li><p style="text-align:center;font-size:18px;font-weight:bold;color:red;">
台中地區</p></li>
            <li>
                <p>地點:台中中心團練場
台中市柳川西路3段23號7樓</p>
                <p>時間:星期一:19:00~22:00
瑜珈 + 整套呼吸法</p>
                <p>老師:許麗環老師：0939-939923/p>
                <p>交通/特色/收費/備註:特色：木質地板附座墊;收費：單次100元/年繳48週3600元 ;義工：吳婉嘉 0939-658-615或2261-3158#6302/吳妱靜 (白天)  0961-139-907</p>
            </li>
            <li>
                <hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
            <li>
                <p>地點:台中牛頓教室-牛頓幼稚園3F
台中市博館三街86號3樓
地下室為牛頓溫水游泳池</p>
                <p>星期四:時間:19:00~22:00
瑜珈 + 整套呼吸法</p>
                <p>老師:楊心儀老師: 04-2376-7150 /
            0952-881-325</p>
                <p>交通/特色/收費/備註:交通：華美西街河兩側(晚上確定不收費)；科博館周邊(開單到晚22:00止,  每小時30元)；健行路旁由博館路進入的科博館停車場,每小時20元,  24小時開放,  但太晚需電洽管理員來收費開門;牛頓幼稚園專屬停車場不可以停,否則每小時200元
特色：木質地板附鋪地墊(可取代瑜珈墊,  但無座墊)
收費：單次100元或隨喜樂捐,  學生可免費</p>
            </li>
            <li>
                <hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
            <li>
                <p>地點:台中市西屯區正覺堂</p>
                <p>時間:星期四:18:30 瑜伽;19:30 團練</p>
                <p>老師:王聖琝  0981-573-866</p>
                <p>交通/特色/收費/備註:第一次前往的學員，請先與志工聯絡</p>
            </li>
            <li>
                <hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
            <li>
                <p>地點:生活的藝術台中中心台中市柳川西路3段23號7樓)</p>
                <p>時間:星
期
五:(每月一次)
晚上  7:30~9:30
唱場與靜心、
知識加美食分享</p>
                <p>老師:洽詢電話︰04-22206112
張碧芳義工0955-260400
  吳妱靜義工0961-139907
  吳婉嘉義工0939-658615</p>
                <p>交通/特色/收費/備註:103 年7/18，8/15，9/19，10/24
晚上  7:30~8:30 唱場與靜心
  8:30~9:30 知識與美食分享
  歡迎學員及非學員大家一起來喔!!
  歡迎大家準備素食無蛋無五辛之點心與大家共享~~
  請自備餐具及水杯謝謝!!</p>
            </li>
            <li>
                <hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
            <li>
                <p>地點:台中生活的藝術教室
台中市中美街623號</p>
                <p>星
期
六:時間:9:00~12:00
瑜珈 + 整套呼吸法</p>
                <p>老師:王雅慧:04-2326-7758 / 0936-242787</p>
                <p>交通/特色/收費/備註:特色：磨石子地板附座墊,  另有一間小間的是木質地板
請先電話連絡是否該週有團練</p>
            </li>
            <li>
                <hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
            <li>
                <p>地點:台中市西屯區
台中市西屯區長安路二段158號2樓</p>
                <p>時間:星
期
六:9:00~12:00
瑜珈 + 整套呼吸法</p>
                <p>老師:張雪鑾:0911-799398</p>
                <p>交通/特色/收費/備註:</p>
            </li>
            <li>
                <hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
            <li><p style="text-align:center;font-size:18px;font-weight:bold;color:red;">
埔里地區</p></li>
            <li>
                <p>地點:埔里團練場-
埔里鎮西安路三段117號</p>
                <p>時間:星
期
二:17:00~21:00
瑜珈 + 整套呼吸法</p>
                <p>老師:藍來花老師：0912-595235</p>
                <p>交通/特色/收費/備註:請先電話連絡是否該週有團練</p>
            </li>
            <li>
                <hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
            <li><p style="text-align:center;font-size:18px;font-weight:bold;color:red;">
嘉義、彰化、員林地區</p></li>
            <li>
                <p>地點:佛光山嘉義會館
嘉義博愛路二段241號401室</p>
                <p>時間:星
期
二:18:00~21:00
瑜珈 + 整套呼吸法</p>
                <p>老師:劉惠珍老師0956-351-565 / 04-873-3965 </p>
                <p>交通/特色/收費/備註:義工：王富鈴 0921-667-799</p>
            </li>
            <li>
                <hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
            <li>
                <p>地點:彰化團練場
彰化市中正路二段675巷36-38號5樓</p>
                <p>時間:星
期
三:18:30~21:30
瑜珈 + 整套呼吸法</p>
                <p>老師:劉惠珍老師0956-351-565 / 04-873-3965</p>
                <p>交通/特色/收費/備註:陳碧玲老師0911-431-787 / H:04-722-8913 / O:04-722-8993
備註：(隔週) </p>
            </li>
            <li>
                <hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
            <li>
                <p>地點:員林團練場
彰化縣員林鎮惠明街18號</p>
期
                <p>星
日:時間:14:00~17:00
瑜珈 + 整套呼吸法</p>
                <p>老師:劉惠珍老師0956-351-565 / 04-873-3965 </p>
                <p>交通/特色/收費/備註:義工：莊小青 0921-312-751</p>
            </li>
            <li>
                <hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
            <li><p style="text-align:center;font-size:18px;font-weight:bold;color:red;">
台南、高雄地區</p></li>
            <li>
                <p>地點:高雄團練場
高雄市三民區褒揚街103號5樓</p>
                <p>時間:星期一19:30~22:00
瑜珈+ 整套呼吸法</p>
                <p>老師:蘇榮昌老師0929-511931
義工：黃雅紅0952-505658 / 07-533-7953
常淑德0958-589183</p>
                <p>交通/特色/收費/備註:收費：單次100元
備註：不需帶瑜珈墊</p>
            </li>
            <li>
                <hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
            <li>
                <p>地點:台南富立團練場
台南市中西區民生路二段399號
(富立世紀大樓)</p>
                <p>時間:星期五:19:30~21:30
淨化呼吸法團練
包含瑜珈,整套呼吸法,知識分享</p>
                <p>老師:鄭秀全老師0932-826026</p>
                <p>交通/特色/收費/備註:義工：淑君0922-002596</p>
            </li>
            <li>
                <hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
            <li>
                <p>地點:台南團練場 –大學東寧社區活動中心二樓
台南市林森路二段252號</p>
                <p>時間:星期
日:14:00~17:00
淨化呼吸法團練
包含瑜珈,整套呼吸法,知識分享</p>
                <p>老師:黃阿敏老師0989-284-859</p>
                <p>交通/特色/收費/備註:義工：舜媛0921-408266
收費：100  / 次</p>
            </li>
            <li>
                <hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
             <li><p style="text-align:center;font-size:18px;font-weight:bold;color:red;">
屏東地區</p></li>
            <li>
                <p>地點:國立屏東商業技術學院
屏東市民生東路51號</p>
                <p>時間:星期五:19:30~22:00
瑜珈 + 整套呼吸法</p>
                <p>老師:阿俊老師：0971-074288</p>
                <p>交通/特色/收費/備註:備註 : 不一定哪週，請先電話確認每月團練日期
       星期五 晚上 18:45 或 19:30開始 請先確認 (有時會異動)
義工: 鍾竹英 0921-598337 / 劉淑娟 0953-032-528</p>
            </li>
            <li>
                <hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
            <li>
                <p>地點:東港鎮民眾服務社
屏東縣東港鎮光復路一段268號</p>
                <p>時間:星
期
六:19:00~21:30
瑜珈 + 整套呼吸法</p>
                <p>老師:黃楠昌：0933-337579</p>
                <p>交通/特色/收費/備註:各地老師過來支援帶團練</p>
            </li>
            <li>
                <hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
            <li><p style="text-align:center;font-size:18px;font-weight:bold;color:red;">
台東地區</p></li>
            <li>
                <p>地點:台東市興安路一段200 巷 21  弄 49  號</p>
                <p>時間:星期日:瑜珈 + 整套呼吸法</p>
                <p>老師:義工: 邱若婷  0958-394666</p>
                <p>交通/特色/收費/備註:備註 : 不一定哪週，請先電話確認每月團練日期
用品: 限量瑜珈墊提供</p>
            </li>
            <li>
                <hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
            <li>
                <p>地點:WONNY 咖啡教室
台東市成功路146 號</p>
                <p>時間:星期日:月圓唱場+靜心</p>
                <p>老師:義工: 邱若婷  0958-394666</p>
                <p>交通/特色/收費/備註:備註 : 通常會在農歷十五的晚上, 請先電話確認日期及時間</p>
            </li>
        </ul>

        <ul id="guangzhou" style="display:none;">
            <li>
                <p>地址1:广州市白云区黄边北路云山诗意诗意居6栋301号</p>
                <p>时间:周六19:00-20:30</p>
                <p>联系人:Anita 13828449109</p>
                <p>随喜</p>
            </li>
            <li>
                <hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
        </ul>
        <ul id="xiamen" style="display:none;">
            <li>
                <p>地址1:湖里区禾山路368号成功电子商务大厦9楼</p>
                <p>时间:周六,15:00-17:00</p>
                <p>联系人:丽云：13400637134;卢孔知13906036003;吴建莲 13385926139</p>
            </li>
            <li>
                <hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
        </ul>
        <ul id="nanjing" style="display:none;">
            <li>
                <p>地址1:北京东路40号喜悦之路瑜伽馆</p>
                <p>时间:周六14:00-16:00团练;16:00-17:00知识课</p>
                <p>联系人:朱秀萍18936031908。</p>
                <p>费用:团练费10元/人/次</p>
            </li>
            <li>
                <hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
        </ul>
        <ul id="shenzhen" style="display:none;">
            <li>
                <p>地址1:福田区鲁班大厦四楼 舞林大会</p>
                <p>时间:周日:10:00~12:00</p>
                <p>联系人:杨洁 13609626672</p>
                <p>费用:34~45元/人/次</p>
            </li>
            <li>
                <hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
        </ul>
        <ul id="hangzhou" style="display:none;">
            <li>
                <p>杭州.萧山:萧山区金城路439号发展广场2-2-1602</p>
                <p>时间:周四Thur.18:15~20:15</p>
                <p>联系人:俞海13305710035</p>
            </li>
            <li>
                <hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
            <li>
                <p>杭州.城区:南复路1号水澄大厦1号楼911室</p>
                <p>时间:周日Sun 18:30~20:30</p>
                <p>联系人:张擎13958152025</p>
            </li>
             <li>
                <hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
            <li>
                <p>杭州.下城区朝晖路嘉汇大厦3A-6禅院瑜伽</p>
                <p>时间:周日Sun 14:00~16:00</p>
            </li>
        </ul>
        <ul id="chengdu" style="display:none;">
            <li>
                <p>成都(南):成都市高新区天府大道南沿线天府软件园D区D2栋南楼5楼。软件园。（天府大道从市区往外走，在麦当劳路口左转）</p>
                <p>时间:周三:17:00~19:00</p>
                <p>联系人:冷宇:13982162424</p>
            </li>
            <li>
                <hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
            <li>
                <p>成都(西):青羊区青羊大道99号1单元优诺国际1402室</p>
                <p>时间:周四Thur18:30~20:30</p>
                <p>联系人:施飞:13981901755</p>
            </li>
        </ul>
         <ul id="kunming" style="display:none;">
            <li>
                <p>地址1:昆明昆师路昆明学院内</p>
                <p>时间:周四Thur:19:00~21:00</p>
                <p>联系人:梁老师:13818109801</p>
                <p>费用:200元场地费平均分摊</p>
            </li>
            <li>
                <hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
        </ul>
        <ul id="dalian" style="display:none;">
            <li>
                <p>地址1:大连会展路67号</p>
                <p>时间:周四Thur:18:00</p>
                <p>联系人:13478910792</p>
            </li>
            <li>
                <hr width="99%" color="#CBCAC6" size="1" style=" margin-top:10px;">
            </li>
        </ul>
    </div>
</div>
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