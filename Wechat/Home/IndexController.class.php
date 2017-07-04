<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Home\Controller;
use Think\Controller;
use Com\Wechat;
use Com\WechatAuth;

class IndexController extends CommonController{
    public function index(){
		$redirect_uri="http://wx.364000.com/wechat.php/index/userinfo";//授权成功后的回调地址,用于获取用户数据
		$RequestURL= $this->WechatAuth ->getRequestCodeURL($redirect_uri,'123','snsapi_base');
		header("Location:".$RequestURL);
    }
    
    public function userinfo(){
    	$code = I('code'); //获取用户授权收生成的code，完成文档中的第一步
    	$arr=  $this->WechatAuth ->getAccessToken('code',$code);//第二步：通过code换取网页授权access_token
    	$globals_access_token = $Weixin->WechatAuth->getAccessToken();    //全局access_token
        $userInfo = $this->WechatAuth->userInfo($arr['openid']); //通过全局access_token获取用户基本信息 未关注是array('subscribe'=>0,'openid')
        p($userInfo);die;
    }
    
    
}
