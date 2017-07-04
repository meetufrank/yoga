<?php
namespace Home\Controller;
use Think\Controller;
use Com\Wechat;
use Com\WechatAuth;

class IndexController extends Controller{
	public function _initialize(){
	
		$echoStr = $_GET["echostr"];
	
		echo $echoStr;

		$appId='wxb4024e1dea1a289c';
		$appSecret='38b635a54b19b9746d9a6baf50659f5e';
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
	/*
	 * $data['EventKey'];
	 * 关注后扫描获取scene_id
	 * 新关注扫描获取qrscene_{scene_id}
	 * 首先进行判断扫描类型
	 * 接下来根据参数判断回复内容
	 * 1001 = 回复当前第几个回复的人
	 * 
	 * 20001 = 第一个回复文本
	 * 20002 = 第2个回复文本
	 * 20003 = 第3个回复文本
	 * 20004 = 第4个回复文本
	 * 20005 = 第5个回复文本
	 * 20006 = 第6个回复文本
	 * 20007 = 第7个回复文本
	 * 20008 = 第8个回复文本
	 * 
	 * 300001 = 第一个回复文本
	 * 300002 = 第2个回复文本
	 * 300003 = 第3个回复文本
	 * 300004 = 第4个回复文本
	 * 300005 = 第5个回复文本
	 * 300006 = 第6个回复文本
	 * 300007 = 第7个回复文本
	 * 300008 = 第8个回复文本
	 * 300009 = 第9个回复文本
	 * 300010 = 第10个回复文本
	 * 300011 = 第11个回复文本
	 * 300012 = 第12个回复文本
	 */
	
	$key=$data['EventKey'];
	$key_num=strlen($key);
	if ($key_num==4 || $key_num==5 || $key_num==6){
		$str=$key;
	}else{
		$str = substr($key,8);
	}

	$num_str=strlen($str);
	//$content = $key_num;
	//$type    = 'text';
	//$wechat->response($content, $type);
	//die;
	
	
	switch ($num_str) {
		case '4' : //签到类
			$reply = $this->qiandao();
			break;
		case '5' : //文本回复类
			$reply = $this->backtext($str);
			break;
		case '6' : //单图文回复类
			$reply = $this->backpic($str);
			break;;
	}
	
	
	
	
	

    }
    
  
    public function qiandao(){
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
    	$all_taday=date("Y-m-d H:i:s",time());//当前时间
    	$user_allname=$userlist['nickname'];
    	$arrdateone=strtotime($taday.' 0:0:0');//当前日期的起始时间
    	$arrdatetwo=strtotime($taday.' 23:55:55');//当前日期的终止时间
    	$map['we_userlist_addtime'] = array(array('egt',$arrdateone),array('elt',$arrdatetwo),'AND');//是否在区间内
    	$map['we_userlist_openid']=$userlist['openid'];
    	$check_openid=$we_userlist->where($map)->find();//判断用户是否存在
    	
    	//总签到次数
    	$all_count=$we_userlist->count();
    	//个人签到次数
    	$dan_count=$we_userlist->where(array('we_userlist_openid'=>$userlist['openid']))->count();
    	$dd_count=$dan_count+1;
    	
    	if (!$check_openid){//用户不存在
    		$result=$we_userlist->add($sl_data);//保存数据导数据库,并且返回ID
    		$chenk_open=0;
    	}else{//用户存在
    		$result=$check_openid['we_userlist_id'];//提取用户ID
    		$chenk_open=1;
    	}
    	if ($chenk_open==0){//新关注
    		$con="空间签到\n$taday\n您好，欢迎来到腾云众创空间\n用户名：$user_allname\n时间：$all_taday\n签到次数：$dd_count\n您与$all_count 个朋友一样为空间留下了一个足迹！\n欢迎留言！";
    	}else{//已关注
    		$con="您今天已经签到过了\n空间签到\n$taday\n您好，欢迎来到腾云众创空间\n用户名：$user_allname\n时间：$all_taday\n签到次数：$dan_count\n您与 $all_count 个朋友一样为空间留下了一个足迹!\n欢迎留言！";
    	}
    	
    	
    	//文本回复回复效果
    	$content = $con;
    	$type    = 'text';
    	$wechat->response($content, $type);
    	
    }
    
    public function backtext($send_id){
    	$wechat=new Wechat('weixin');

    	//$send_id=I('send_id');
    	$backtext=M('we_backtext');
    	$backcontent=$backtext->where(array('we_backtext_textid'=>$send_id))->getField('we_backtext_content');
    	//$content = $send_id;
    	$type    = 'text';
    	$wechat->response($backcontent, $type);
    }
    
    public function backpic($send_id){
    	$wechat=new Wechat('weixin');
    	$news=M('news');
    	$user_content=$news->where(array('news_key'=>$send_id))->find();
    	
    	
    	
    	$wechat->replyNewsOnce($user_content['news_title'],$user_content['news_scontent'],'http://wx.364000.com/wechat.php/Index/content/n_id/'.$user_content['n_id'],'http://wx.364000.com/Public'.$user_content['news_img']);
    	   
    }
    
    
    
    public function content(){
    	$n_id=I('n_id');
    	$con=M('news')->where(array('n_id'=>$n_id))->find();
    	$this->assign('con',$con);
    	$this->display();
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}
