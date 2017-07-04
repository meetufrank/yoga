<?php
namespace Home\Controller;
use Think\Controller;
use Com\Wechat;
use Com\WechatAuth;
class WechatController extends Controller {
    public function index(){

        $token = 'wangjin'; //微信后台填写的TOKEN
            /* 加载微信SDK */
      $wechat = new Wechat($token);
      /* 获取请求信息 */
      $data = $wechat->request();
      if($data && is_array($data)){
        switch($data['MsgType']){
          case "text":
          $this->Text($wechat,$data);

        }
            }
  }

     //回复文本消息
       private function Text($wechat,$data){

       if(strstr($data['Content'],"hi")){
         $text="我正在使用Thinkphp开发微信,你好";
         //调用日志
         $this->logger("发送消息：\n".$text);
         $wechat->replyText($text);
       }else if(strstr($data['Content'],"myself")){

         $this->users($wechat,$data);

       }

     }


     //获取用户信息
     private function users($wechat,$data){

          $openid=$data['FromUserName'];
        $appid="wxb5aec13c030a530b";
        $appSecret="5e93541c6891dd880bc1f053da6a0830";
        $token=session('token') ;

        if($token){

        $WechatAuth=new WechatAuth($appid,$appSecret,$token);

        }else{
        $WechatAuth=new WechatAuth($appid,$appSecret);

        $accsseToken=$WechatAuth->getAccessToken();
        $token=$accsseToken['access_token'];
        session('token',$token);
        }
        $user=$WechatAuth->userInfo($openid);
        $text="你的openid是：".$user['openid']."\n你的昵称是：".$user['nickname']."\n
        你的性别是:".$user['sex']."\n你的城市是：".$user['city']."\n你所在国家是".$user['country']."\n
        你在的省份是：".$user['province'];

        $this->logger("发送用户的信息".$text);
        $wechat->replyText($text);

     }

      //网页授权获取用户基本信息
    public function webUsers(){

      $appid="wxb5aec13c030a530b";
      $appSecret="5e93541c6891dd880bc1f053da6a0830";
      $WechatAuth=new WechatAuth($appid,$appSecret);
      if($_GET['iscode']){
         $url="http://aolchina.cn/Home/Wechat/webUsers";
         $result=$WechatAuth->getRequestCodeURL($url);

         $result;
         header("Location:{$result}");

      } else if($_GET['code']){

          header('Content-type:text/html;charset=utf-8');
          $user=$WechatAuth->getAccessToken('code',$_GET['code']);
          $openid=$user['openid'];
          $users=$WechatAuth->getUserInfo($openid);
      var_dump($users);
         /*  $m=M('users');
          $data['openid']=$users['openid'];
          $data['nickname']=$users['nickname'];
          $result=$m->add($data);
          if($result){
            $text="你的openid是：".$users['openid']."\n你的昵称是：".$users['nickname']."\n
      你的性别是:".$users['sex']."\n你的城市是：".$users['city']."\n你所在国家是".$users['country']."\n
      你在的省份是：".$users['province'];
            echo $text;
          } */



          }

      }

     //日志
       private function logger($content){
      $logSize=100000;

      $log="log.txt";

      if(file_exists($log) && filesize($log)  > $logSize){
        unlink($log);
      }

      file_put_contents($log,date('H:i:s')." ".$content."\n",FILE_APPEND);

    }

}