<?php
namespace Home\Controller;
use Think\Controller;
use Com\WechatAuth;
define("TOKEN", "weixin");
class CommonController extends Controller {
    public function _initialize(){

        $echoStr = $_GET["echostr"];

        if($this->checkSignature()){
        	echo $echoStr;
        	exit;
        }

    	$appId='wxb4024e1dea1a289c';
    	$appSecret='38b635a54b19b9746d9a6baf50659f5e';
    	$token='weixin';
    	$this->token = $token;
    	$this->appId = $appId;
    	$this->appSecret =$appSecret;
    	$this->WechatAuth =  new WechatAuth($this->appId,$this->appSecret);
    	
    }
    
    public function responseMsg()
    {
    	//get post data, May be due to the different environments
    	$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
    
    	//extract post data
    	if (!empty($postStr)){
    		/* libxml_disable_entity_loader is to prevent XML eXternal Entity Injection,
    		 the best way is to check the validity of xml by yourself */
    		libxml_disable_entity_loader(true);
    		$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
    		$fromUsername = $postObj->FromUserName;
    		$toUsername = $postObj->ToUserName;
    		$keyword = trim($postObj->Content);
    		$time = time();
    		$textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							<FuncFlag>0</FuncFlag>
							</xml>";
    		if(!empty( $keyword ))
    		{
    			$msgType = "text";
    			$contentStr = "Welcome to wechat world!";
    			$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
    			echo $resultStr;
    		}else{
    			echo "Input something...";
    		}
    
    	}else {
    		echo "";
    		exit;
    	}
    }
    
    private function checkSignature()
    {
    	// you must define TOKEN by yourself
    	if (!defined("TOKEN")) {
    		throw new Exception('TOKEN is not defined!');
    	}
    
    	$signature = $_GET["signature"];
    	$timestamp = $_GET["timestamp"];
    	$nonce = $_GET["nonce"];
    
    	$token = TOKEN;
    	$tmpArr = array($token, $timestamp, $nonce);
    	// use SORT_STRING rule
    	sort($tmpArr, SORT_STRING);
    	$tmpStr = implode( $tmpArr );
    	$tmpStr = sha1( $tmpStr );
    
    	if( $tmpStr == $signature ){
    		return true;
    	}else{
    		return false;
    	}
    }
    
    
}