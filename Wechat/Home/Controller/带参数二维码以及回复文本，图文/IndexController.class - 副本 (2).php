<?php
namespace Home\Controller;
use Think\Controller;
use Com\Wechat;
use Com\WechatAuth;

class IndexController extends Controller{
	public function _initialize(){
	
		$echoStr = $_GET["echostr"];
	
		echo $echoStr;

	
		$appId='wx3e5b1606b21cc3bb';
		$appSecret='9225a5a6d2da8f0571cdb41353bebcd7';
		$token='weixin';
		$this->token = $token;
		$this->appId = $appId;
		$this->appSecret =$appSecret;
		$this->WechatAuth =  new WechatAuth($this->appId,$this->appSecret);
		 
	}
	
	
	
	

public function index(){
	//一切操作取决于事先已经生成好的带参数的微信二维码
	$wechat=new Wechat('weixin');
	$data = $wechat->request();//用户扫描进来获取到用户发送过来的数据
	$this->accessToken= $this->WechatAuth->getAccessToken();//获取全局token
	$userlist=$this->WechatAuth->userInfo($data['FromUserName']);//通过openid获取用户信息
	$sl_data=array(//获取到的有必要保存的信息
			'we_userlist_openid'=>$userlist['openid'],//openid
			'we_userlist_nickname'=>$userlist['nickname'],//昵称
			'we_userlist_addtime'=>time(),//当前时间
	);
	//进行逻辑判断
	$we_userlist=M('we_userlist');//打开数据表
	
	$taday=date("Y-m-d",time());//当前时间
	$arrdateone=strtotime($taday.' 0:0:0');//当前日期的起始时间
	$arrdatetwo=strtotime($taday.' 23:55:55');//当前日期的终止时间
	$map['we_userlist_addtime'] = array(array('egt',$arrdateone),array('elt',$arrdatetwo),'AND');//是否在区间内
	$map['we_userlist_openid']=$userlist['openid'];
	$check_openid=$we_userlist->where($map)->find();//判断用户是否存在
	if (!$check_openid){//用户不存在
		$result=$we_userlist->add($sl_data);//保存数据导数据库,并且返回ID
		$chenk_open=0;
	}else{//用户存在
		$result=$check_openid['we_userlist_id'];//提取用户ID
		$chenk_open=1;
	}
	if ($chenk_open==0){//新关注
		$con="您是当前第'$result'个参观龙岩市电商协会的人员";
	}else{//已关注
		$con="您今天已经来过此地方咯，当时您是第'$result'个参观龙岩市电商协会的人员";
	}
	
	//测试回复效果
	$content = $data['EventKey'];
	$type    = 'text';
	$wechat->response($content, $type);
	
    }
    
  
    
}
