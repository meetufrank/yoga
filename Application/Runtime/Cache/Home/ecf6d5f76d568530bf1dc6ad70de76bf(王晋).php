<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>生活的艺术-全国团练点</title>

  <link rel="stylesheet" type="text/css" href="/yoga/Public/yoga/css/bootstrap-3.3.6-dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="/yoga/Public/yoga/css/static.css">
  <link rel="stylesheet" type="text/css" href="/yoga/Public/yoga/css/main.css">
  		<script src="/yoga/Public/assets/js/jquery.min.js"></script>
  <script src="/yoga/Public/layer/layer.js"></script>

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
<?php $controller=strtolower(CONTROLLER_NAME); echo $action; ?>
  <li <?php if($controller == 'index'): ?>class="active"<?php endif; ?>><a href="<?php echo U('Index/Index');?>">首页</a></li>
  <li <?php if($controller == 'class'): ?>class="active"<?php endif; ?>><a href="">课程</a></li>
  <li <?php if($controller == 'knows'): ?>class="active"<?php endif; ?>><a href="##">知识</a></li>

  <li <?php if($controller == 'active'): ?>class="active"<?php endif; ?>><a href="<?php echo U('active/activeload');?>">活动</a></li>
  <li <?php if($controller == 'adress'): ?>class="active"<?php endif; ?>><a href="<?php echo U('adress/MilitiaPoint');?>">全国团练点</a></li>
  <li><a href="##">关于我们</a></li>
  <?php if($_SESSION['username']== ''): ?><li <?php if($controller == 'login'): ?>class="active"<?php endif; ?>><a href="<?php echo U('Login/login');?>">登录&nbsp;/&nbsp;注册</a></li>
  <?php else: ?>
  <li <?php if($controller == 'user'): ?>class="active"<?php endif; ?>><a href="<?php echo U('User/person');?>"><?php echo (session('username')); ?>的个人中心</a></li>
  <li><a href="<?php echo U('Login/logout');?>">退出</a></li><?php endif; ?>
  <li class="close-navbar"><a href="<?php echo U('Index/index');?>" class="pull-left"><img class="close-navbar-img" src="/yoga/Public/yoga/img/home.png"><span>首页</span></a><a href="#" class="pull-right"><img class="close-navbar-img" src="/yoga/Public/yoga/img/close.jpg"><span>取消</span></a></li>
</ul>
<div class="g-navbar-searchbox">
  <form action="" method="post">
    <div class="input-group">
      <input type="text" name="keyword" placeholder="请输入关键词" class="form-control">
      <span class="input-group-btn">
        <button class="btn btn-primary btn-search" type="submit" style="background-color:#ffae00;outline:none;border-color:#ffae00;">搜索</button>
      </span>
    </div>
  </form>
</div>
</div>



<script src="/yoga/Public/yoga/adress/js/echarts.js"></script>
<script src="/yoga/Public/yoga/adress/js/china.js"></script>
<script src="http://cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!--css-->
<style>
#main{
    width: 100%;
	height: 1000px;

}
</style>
</head>

<!--Html-->
<body>
	<div class="container-fluid">
    	<div class="row">
        	<div class="col-lg-12" id="main"></div>
        </div>
    </div>

<script type="text/javascript">//载入地图
var dom = document.getElementById("main");
var myChart = echarts.init(dom);
var app = {};
option = null;

//geoCoordMap设置地点名称和经纬度
var geoCoordMap = {
    '北京': [116.4551,40.2539],
    '广州': [113.5107,23.2196],
    '成都': [103.9526,30.7617],
    '南京': [118.8008,32.0786],
    '杭州': [120.1665,30.2798],
    '厦门': [118.1214,24.4726],
    '台湾': [121.1592,23.8675],
    '香港': [114.1714,22.2848],
    '深圳': [114.0646,22.5503],
    '昆明': [102.8258,24.9069],
    '上海': [121.4604,31.2535]


};
//这里面的元素必须在geoCoordMap存在才可以显示
//name:上海->根据geoCoordMap找出经纬度
//value: 需要被显示的内容值
var GZData = [
    [{name:'上海'},{name:'香港',value:"<div>地址:生活艺术中心<br/>时间:星期一 7:00pm-7:20pm<br/>联系人: Raymond Ng:9496-2211; Helen Lai:9196-3235; Chloe Tam:9781-6339; Navin Gupta:5579-5150;<br/><br/>地点:生活艺术中心<br/>时间:星期五 10：30am-12:pm<br/>联系人: Chloe Tam:9781-6339; Lai Fang Chua:9829-9001;<br/><br/>地址:11A,Scenic Garden 9 Kotewall Road Mid-levels HongKong;<br/>时间: 10：30am;<br/>联系人:Neelam Daswani:6941-5749;Urvashi:9644-9194;<br/><br/>地址:Estoril Court Club House 55 Garden Road Mid-levels<br/>时间:星期六 9:00am<br/>联系人:Angel Kwok:9285-6890;<br/><br/>地址:生活艺术中心AOL Center;<br/>时间:3:00pm 4:30pm 5:00pm 6:30pm;<br/>联系人:Robert Cho:9103-5929;Louisa Lo:9480-9436;</div>"}],
    [{name:'上海'},{name:'广州',value:"<div>地址:天河区龙口西路帝景苑C3棟12G<br/>时间:星期三 19:00-20:30<br/>联系人:SAM老师:13828449109</div>"}],
    [{name:'上海'},{name:'成都',value:"<div>地址:高新区天府大道南沿线天府软件园D区D2栋南楼5楼,软件园<br/>(天府大道从市区往外走，在麦当劳路口左转)<br/>时间:周二 17:00-19:00<br/>联系人:冷宇 13982162424<br/><br/>地址：青羊区青羊大道99号，优品道小区10栋1单元303室<br/>时间:周四 17:00-19:00<br/>联系人:施飞:13981901755</div>"}],
    [{name:'上海'},{name:'南京',value:"<div>地址:北京东路40号喜悦之路瑜伽馆<br/>时间:星期六 14:00-16:00  团练+16:00-17:00  知识课<br/>联系人:朱秀萍 18936031908<br/>团练费:40元/人/次</div>"}],
    [{name:'上海'},{name:'杭州',value:"<div>地址:萧山区金城路439号发展广场2-2-1602<br/>时间:星期四 18:15-20:15<br/>联系人:俞海 13305710035<br/><br/>地址:城区南复路1号水澄大厦1号楼911室<br/>时间:18:30-20:30<br/>张擎 13958152025</div>"}],
    [{name:'上海'},{name:'厦门',value:"<div>地址:湖里区禾山路368号成功电子商务大厦9楼<br/>时间:星期六 15:00-17:00<br/>联系人:丽云:13400637134; 卢孔知:13906036003; 吴建莲:13385926139</div>"}],
    [{name:'上海'},{name:'台湾',value:"<div>星期一</div><div>地址:生活的藝術台灣全國中心 南京东路2段178号14楼02-2563-2103<br/>时间:09:00~11:30 + 瑜珈 + 整套呼吸法；18:30~21:00 + 瑜珈 + 整套呼吸法<br/>联系人:台灣中心老師群 02-2563-2103<br/>收費：單次150元 / 年繳3600元<br/><br/>地址:八德路3段團練場-財經天廈 台北市八德路3段219號11樓 (樓下為八方雲集及大同3C)<br/>交通：板南線國父紀念館站5號出口往光復北路方向約8分鐘，公車光復路口站：0東、202、203、205、257、276、605、605副線、605新台五線、1191<br/>时间:19:00~21:30 瑜珈+ 整套呼吸法<br/>联系人:蘇美修老師: 0919-952258<br/><br/><div><a href='Point.html'>点此查看更多</a></div></div>"}],
    [{name:'上海'},{name:'北京',value:"<div>地址:北京市太阳宫丰和园15号院会所二层瑜伽馆(地铁: 十号线太阳宫D口出往左至第一个路口再往左50米路右院内主楼二层.）<br/>时间:每周六:团练: 16:00---18:00 ;唱场: 18:00---19:00.<br/>联系人:袁宁13910077739<br/>费用: 30 RMB / 1 人</div>"}],
    [{name:'上海'},{name:'深圳',value:"<div>地址:福田区景田擎天华庭华庭阁35D<br/>时间:周四Thur.19:00~21:00<br/>联系人:杨洁 13609626672<br/>备注:每次20-30 平分</div>"}],
    [{name:'上海'},{name:'昆明',value:"<div>地址:昆明昆师路昆明学院内<br/>时间:周四Thur19:00~21:00<br/>联系人:梁老师13818109801<br/>费用:200元场地费平均分摊</div>"}],
    [{name:'上海'},{name:'上海',value:"<div>地址:长宁区天山路600弄同达创业大厦1407室。底楼为工商银行和兴业银行。地铁2号线，娄山关路站，4号口出，往西走。（芙蓉江路口)<br/>时间:周一 Mon: 19:00~21:00;周三Wed:10:00-12:00;周六Sat:8:00~10:00  16:00~18:00<br/>联系人:Karuna:15921102314<br/>备注:随喜<br/><br/>地址:东方路2111弄15号商铺，阿卡瑜伽馆。近东三里桥路，6号线临沂新村地铁站下步行可到。(一號口出)<br/>时间:周日Sun：9:30~11:30<br/>联系人:Faustino:15618708211;费用:40RMB/人/次</div>"}]
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

var color = ['white'];

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
        left: 'right',//标题组件容器左侧的距离
        bottom: '0%',
    },
    tooltip : {
        trigger: 'item',//默认只能点击一个省份
        formatter: '{b}',//提示框类型
        triggerOn:'click',//提示框触发方式
        showDelay: '800',//浮层显示延迟显示，单位默认ms毫秒
        hideDelay: '800',//浮层默认延迟关闭，单位同上
        position:['30%','40%'],//定义浮动框相对于页面的位置
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

</script>


<div class="window-indi"></div>
<div class="g-footer clearfix">
  <div class="col-xs-12 col-sm-2 delPadd">
    <div class="footer-logo-wrap"><img src="/yoga/Public/yoga/img/logo.png"></div>
  </div>
  <div class="col-xs-12 col-sm-6 footer-text">
    <div class="col-xs-3 col-sm-3 delPadd">
      <h5>网站条款</h5>
      <div class="item-detail">
        <p><a href="##">关于我们</a></p>
        <p><a href="##">联系我们</a></p>
        <p><a href="##">用户协议</a></p>
        <p><a href="##">隐私保护</a></p>
        <p><a href="##">免费声明</a></p>
      </div>
    </div>
    <div class="col-xs-3 col-sm-3 delPadd">
      <h5>帮助中心</h5>
      <div class="item-detail">
        <p><a href="##">常见问题</a></p>
        <p><a href="##">在线咨询</a></p>
      </div>
    </div>
    <div class="col-xs-6 col-sm-6 delPadd">
      <h5>联系客服</h5>
      <div class="item-detail">
        <p><a href="##">境外客服:8649-52024125</a></p>
        <p><a href="##">境内客服:4008-15832054</a></p>
        <p><a href="##">用户邮箱:customer@artofliving.com</a></p>
      </div>
    </div>
  </div>
  <div class="col-xs-12 col-sm-4 col-md-4 footer-focus">
    <div class="col-xs-12 col-sm-8 col-md-8 delPadd">
      <h5>关注微信</h5>
      <div class="item-detail">
        <div class="codeImg-wrap"><img src="/yoga/Public/yoga/img/footer-code.png"></div>
        <div class="codeImg-wrap"><img src="/yoga/Public/yoga/img/footer-code.png"></div>
        <div class="codeImg-wrap"><img src="/yoga/Public/yoga/img/footer-code.png"></div>
        <div class="codeImg-wrap"><img src="/yoga/Public/yoga/img/footer-code.png"></div>
      </div>
    </div>
    <div class="col-xs-12 col-sm-4 col-md-4 delPadd">
      <h5>关注微博</h5>
      <div class="item-detail">
        <div class="codeImg-wrap"><img src="/yoga/Public/yoga/img/footer-code.png"></div>
      </div>
    </div>
  </div>
  <div class="col-xs-12 col-sm-12 footer-end">2014-2016&nbsp;沪ICP备56265680号-1</div>
</div>

</body>
</html>