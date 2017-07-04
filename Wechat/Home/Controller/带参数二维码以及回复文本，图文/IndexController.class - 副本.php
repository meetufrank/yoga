<?php
namespace Home\Controller;
use Think\Controller;
use Com\Wechat;
use Com\WechatAuth;

class IndexController extends CommonController{


public function index(){

	//$content = $data['Event']; //回复内容，回复不同类型消息，内容的格式有所不同
	//$type    = 'text'; //回复消息的类型
	//$wechat->response($content, $type);

    	
    	
		$redirect_uri="http://wx.364000.com/wechat.php/index/userinfolist";
		$RequestURL= $this->WechatAuth ->getRequestCodeURL($redirect_uri,'123','snsapi_base');
		header("Location:".$RequestURL);
    }
    
    public function userinfolist(){
    	$code = I('code');
    	$arrlist=$this->WechatAuth->getAccessToken('code',$code);
    	$this->accessToken= $this->WechatAuth->getAccessToken();
    	
    	$ppoo= $this->WechatAuth ->qrcodeCreate('20009','2522522');
    	p($ppoo);die;
    	
    	

    	
    	//$globals_access_token = $this->WechatAuth ->getAccessToken(); 
        //$myinfolist = $this->WechatAuth->userInfo($arrlist['openid']);

        //if($myinfolist['subscribe']==1){//已关注
        //	$openid=$myinfolist['openid'];
        //	$map['we_userlist_openid']=$openid;
        	
        //	$taday=date("Y-m-d",time());
        //	$arrdateone=strtotime($taday.' 0:0:0');
        //	$arrdatetwo=strtotime($taday.' 23:55:55');
        	
        	
        	
        	
        	
        	
        	
        	
        	
        	
        	
        	
        	
        	//$map['we_userlist_addtime'] = array(array('egt',$arrdateone),array('elt',$arrdatetwo),'AND');
        	//$we_userlist=M('we_userlist')->where($map)->find();

    }
    
    
}
