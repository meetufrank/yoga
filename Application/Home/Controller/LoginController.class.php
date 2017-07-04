<?php
namespace Home\Controller;
use Think\Controller;
use LT\ThinkSDK\ThinkOauth;
use Event\TypeEvent;

class LoginController extends Controller {
	//登入页面
    public function login(){

		$this->display();
    }

    //登陆验证
	public function runlogin(){

		if (!IS_AJAX){
			$this->error("提交方式错误！",0,0);
		}else{
			$admin=M('admin');
			if (!$admin->autoCheckToken($_POST)){
				$this->error('表单令牌错误,刷新页面尝试恢复',0,0);
			}else{
				$admin_username=I('username');
				$admin_pwd=md5(I('password'));

				$admin=M('member_list')->where(array('member_list_tel'=>$admin_username,'member_list_pwd'=>$admin_pwd,'admin_open'=>1))->find();
					if (!$admin||$admin_pwd!==$admin['member_list_pwd']){
						$this->error('用户名或者密码错误，重新输入',0,0);
					}else{


						cookie('userid',$admin['member_list_id'],60*60*24);
						cookie('username',$admin['member_list_username'],60*60*24);
						cookie('userpetname',$admin['member_list_petname'],60*60*24);

						$this->success('登录成功',session('location')?session('location'):U('Index/index'),1);
					}
			}
		}
	}
/*
 * 退出登录
 */
	public function logout(){
		cookie('userid',null);
		cookie('username',null);
		cookie('userpetname',null);
		$this->redirect('Login/login');
	}

/*
 * 邮件发送类
 */
	public function runemail(){
		$emailsys=M('sys')->where(array('sys_id'=>1))->find();
	    $config = array(
			'MAIL_FROM'=>$emailsys['email_name'],
			'MAIL_HOST'=>$emailsys['email_smtpname'],
			'MAIL_USERNAME'=>$emailsys['email_emname'],
			'MAIL_FROMNAME'=>$emailsys['email_rename'],
			'MAIL_PASSWORD'=>$emailsys['email_pwd'],
		);
	    if ($emailsys['email_open']==1){//邮件发送开关
	    	$config['MAIL_SMTPAUTH'] = TRUE ;
	    }else{
	    	$config['MAIL_SMTPAUTH'] = FALSE ;
	    }
    	C($config);
    	$callurl=C('DB_CALLURL');
		$admin=M('admin')->where(array('admin_email'=>I('email')))->find();

		if(!$admin){
			$this->error('邮件不存在，请重新输入',0,0);
		}
		$oldnum=rand(10000,99999);//获取一串随机数
		$num=md5($oldnum);//对随机数进行加密后传递
		$emailpwd=M('admin')->where(array('admin_email'=>I('email')))->setField('admin_mdemail',$num);//更新数据库
		$content="尊敬的用户，您好：<br>您当前的操作为找回密码，请点击以下链接重新设置密码<br><a href=$callurl/index.php/Admin/Login/checkpwd/emailpwd/$num.html>$callurl/index.php/Admin/Login/checkpwd/emailpwd/$num.html</a>";
		if(SendMail($_POST['email'],'找回密码服务',$content))
			$this->success('邮件发送成功！，打开邮件重新设置密码',1,1);
		else
			$this->error('邮件发送失败',0,0);
		}



	//找回修改密码操作
	public function checkpwd(){
		if (!IS_AJAX){
			$this->error("提交方式错误！",U('Login/findpwd'),0);
		}else{

		$pwd1=I('password1','','md5');//获取新密码，并且加密
		$pwd2=I('password2','','md5');
		if (!session('?code_error')){
	            $this->error('非法操作',0,0);
	        }
		$tel=session('code_error');
		if ($pwd1!=$pwd2){
		    $this->error('两次输入的密码不一致',0,0);
		}
			if(!$pwd1){
				$this->error('密码不存在，请重新输入',0,0);
			}




				$result=M('member_list')->where(array('member_list_tel'=>$tel))->setField('member_list_pwd',$pwd1);
				session('code_error',null);
				$this->success('恭喜您，密码修改成功',U('login'),1);


		}

	}

/*
 * 第三方登录
 */
	public function bing_login($type = null) {
        empty($type) && $this->error('参数错误');
        $sns = ThinkOauth::getInstance($type);
        redirect($sns->getRequestCodeURL());
	}

	//授权回调地址
	public function callback($type = null, $code = null)
	{

		(empty($type) || empty($code)) && $this->error('参数错误');

		//加载ThinkOauth类并实例化一个对象
		$sns = ThinkOauth::getInstance($type);

		//腾讯微博需传递的额外参数
		$extend = null;
		if ($type == 'tencent') {
			$extend = array('openid' => $this->_get('openid'), 'openkey' => $this->_get('openkey'));
		}

		//请妥善保管这里获取到的Token信息，方便以后API调用
		//调用方法，实例化SDK对象的时候直接作为构造函数的第二个参数传入
		//$qq = ThinkOauth::getInstance('qq', $token);
		$token = $sns->getAccessToken($code,$extend);
		//获取当前登录用户信息
		if (is_array($token)) {
			$user_info = A('Type','Event')->$type($token);
			if (!$user_info){//登录失败
				$this->error('第三方登录失败，请重新登录',U('login'),1);
			}else{//登录成功
/*返回格式
 *
 *  [ret] => 0
    [msg] =>
    [is_lost] => 0
    [nickname] => 护士之家网
    [gender] => 男
    [province] => 福建
    [city] => 龙岩
    [year] => 1985
    [figureurl] => http://qzapp.qlogo.cn/qzapp/101260590/1C1D1F0487099BF03B1548D21C98221B/30
    [figureurl_1] => http://qzapp.qlogo.cn/qzapp/101260590/1C1D1F0487099BF03B1548D21C98221B/50
    [figureurl_2] => http://qzapp.qlogo.cn/qzapp/101260590/1C1D1F0487099BF03B1548D21C98221B/100
    [figureurl_qq_1] => http://q.qlogo.cn/qqapp/101260590/1C1D1F0487099BF03B1548D21C98221B/40
    [figureurl_qq_2] => http://q.qlogo.cn/qqapp/101260590/1C1D1F0487099BF03B1548D21C98221B/100
    [is_yellow_vip] => 1
    [vip] => 1
    [yellow_vip_level] => 7
    [level] => 7
    [is_yellow_year_vip] => 0



 */

			}
		}
	}

//注册页面
	public function sign(){


	    $this->display();

	}
//发送短信
	public function putmessage(){
	    $tel=I('tel');
	    $num=session($tel);

	    if (!$tel){
          exit;
	    }else{
             $num=$num+1;

	         if ($num>4){
	             $this->ajaxReturn(0,'JSON');
	         }else{

	             $result= $this->message($tel,$num);

	             if (!$result){

	                 $this->ajaxReturn(1,'JSON');
	             }

	         }




	    }

	}
//验证验证码
    public function getstatus(){

       $code=I('code');
       if ($code==session('code')){
           session('code_error',I('tel'));
           $this->ajaxReturn(1,'JSON');
       }else{
           $this->ajaxReturn(0,'JSON');
       }

    }





	private function message($tel,$num){
	    ini_set('display_errors', '1');

	    $code = rand(100000,999999);
	    $data ="您好，您的验证码是" . $code ;
	    session('code',$code,time()+300);
	    session("$tel",$num,time()+3600*24);
	    $post_data = array();
	    $post_data['account'] = iconv('GB2312', 'GB2312',"vip-shys11");
	    $post_data['pswd'] = iconv('GB2312', 'GB2312',"Shys13579253");
	    $post_data['mobile'] =$tel;
	    $post_data['msg']=mb_convert_encoding("$data",'UTF-8', 'UTF-8');
	    $post_data['needstatus']='true';
	    $url='http://222.73.117.156/msg/HttpBatchSendSM?';
	    $parse = parse_url($url);
	    //var_dump($parse);
// 	    for($i=0;$i<10;$i++)
// 	        echo "<br />";
	    $o="";
	    foreach ($post_data as $k=>$v)
	    {
	        $o.= "$k=".urlencode($v)."&";
	    }
	    $post_data=substr($o,0,-1);
	    $ch=curl_init();
	    curl_setopt($ch, CURLOPT_POST, 1);
	    curl_setopt($ch, CURLOPT_HEADER, 0);
	    curl_setopt($ch, CURLOPT_URL,$url);
	    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
	    $result = curl_exec($ch) ;
	    $pos = strpos($result,',');
	    //echo $result;
	    //用于截取判断状态码
	    $co=substr($result,15,1);
	    if($co == '0')
	        return    $co;
	    else
	        return   substr($result,15,3);


	}


	//添加用户
	public function runadd(){
	    if (!IS_AJAX){
	        $this->error('提交方式不正确',U('sign'),0);
	    }else{
	        $pwd1=I('password1','','md5');//获取新密码，并且加密
	        $pwd2=I('password2','','md5');

	        if ($pwd1!=$pwd2){
	            $this->error('两次输入的密码不一致',0,0);
	        }
	        if(!$pwd1){
	            $this->error('密码不存在，请重新输入',0,0);
	        }
	        if (!session('?code_error')){
	            $this->error('非法操作',0,0);
	        }
	        if(I('gender')){
	            $photo='/yoga/img/male.png';
	        }else{
	            $photo='/yoga/img/female.png';
	        }
	        $sl_data=array(

	            'member_list_username'=>I('personname'),
	            'member_list_pwd'=>I('password1','','md5'),
	            'member_list_petname'=>I('username'),
	            'member_list_province'=>I('province'),
	            'member_list_city'=>I('city'),
	            'member_list_sex'=>I('gender'),
	            'member_list_tel'=>session('code_error'),
	            'member_list_email'=>I('email'),
	            'member_list_open'=>1,
	            'member_list_addtime'=>time(),
	            'member_list_headpic'=>$photo,
	            'member_list_groupid'=>1,
	        );
	        $result=M('member_list')->where(array('member_list_tel'=>session('code_error')))->count();
	        if ($result){
	            $this->error('手机号已存在，有疑问请联系管理员',0);
	        }
	        if (M('member_list')->create($sl_data)){
	            M('member_list')->add($sl_data);
	            session('code_error',null);
	            $this->success('注册成功',U('Login/login'),1);
	        }

	    }

	}

	//找回密码
	public function findpwd(){


	    $this->display('findpassword');

	}




}



?>