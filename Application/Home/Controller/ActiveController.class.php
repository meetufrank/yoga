<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
use Com\FxApi;

class ActiveController extends Controller {





    //活动详情
    public function active_content(){



        session('location',__SELF__.$_SERVER['QUERY_STRING']);
        $id=I('id');
        $ip=get_client_ip();
        $str=$ip.$id;

        if (!session('?active_read'.$id)){
            M('active')->where(array('ad_id'=>$id))->setInc('ad_readnum');
            session('active_read'.$id,$str);

        }



        if($id){
            $active=D('active');
            $where['ad_id']=$id;

            $data=$active->activeshow(null,$where);
            //返回的是二维数组，由于根据主键查询值唯一，所以始终仅一条数据
            $data=$data[$id];

            if($data){
                $type=explode(",", $data['ad_type']);


            }
            foreach ($type as $v){
                $wh['diyflag_value']=$v;   //属性值替换成名称
                $type_arr[]= M('diyflag')->where($wh)->getField('diyflag_name');

            }

            $data['ad_type']=implode(",", $type_arr);
            $data['ad_addtime']=date('Y-m-d',$data['ad_addtime']);
            $data['ad_starttime']=date('Y-m-d',$data['ad_starttime']);
            $data['ad_stoptime']=date('Y-m-d',$data['ad_stoptime']);


           //验证是否可以报名
        $map['ad_id']=$id;
        $map['ad_valid']=2;
        $register_status=M('active')->where($map)->count();
        if ($register_status){
            $register_status=1;   //可以报名
        }else{
            $register_status=0;
        }



        }else{
            $this->error('非法操作',1);
        }



        if (session('?active_agree'.$id)){
            $status=1;


        }else{
            $status=0;
        }
        $result=M('save')->where(array('rs_saveid'=>$id,'rs_userid'=>session('userid'),'rs_savetype'=>1))->count();
        if ($result){
            $save_status=1;
        }else{
            $save_status=0;
        }

        
        //分享二维码
        $jssdk = new FxApi(C('APPID'), C('AppSECRET'));
        $signPackage = $jssdk->GetSignPackage();
        $this->assign('signPackage', $signPackage);
        $this->assign('drumpurl', 'http://'.$_SERVER['HTTP_HOST'].__SELF__.$_SERVER['QUERY_STRING']); //当前链接
        $this->assign('imgurl', 'http://'.$_SERVER['HTTP_HOST'].'/Public'); //微信分享图片链接前缀
        $this->assign('active',$data);
        $this->assign('agree',$status);
        $this->assign('save_status',$save_status);
        $this->assign('register_status',$register_status);

        $this->display();
    }

  //点击报名验证用户状态
    public function validte(){
        $activeid=I('id');

        if (!cookie('userid')){
            cookie('active_back',1);
            session('location',U('Active/active_register'));
            session('classid',$activeid);
            $this->error('请先登录',U('Login/login'),0);
        }
        $time=time();
        $where['ad_id']=$activeid;
        $where['ad_closingtime']=array('egt',$time);
        $where['ad_valid']=2;
        $data=M('active')->where($where)->count();
        if (!$data){
            $this->error('该活动不在报名时间范围之内或活动已过期',U('Active/active_content',array('id'=>$activeid)),0);
        }




     $this->success('跳转报名',U('Active/active_register',array('id'=>$activeid)),1);
    }

    //点赞存储
    public function addagree(){
        $id=I('id');
        if (!isset($id)){
           exit();
        }
        $ip=get_client_ip();
        $agreename=$ip.$id;
        $where['ad_id']=$id;
        if (session('?active_agree'.$id)){
              M('active')->where($where)->setDec('ad_agreenum');
              session('active_agree'.$id,null);
              $this->success('取消点赞',1,1);
        }else{
            M('active')->where($where)->setInc('ad_agreenum');
            session('active_agree'.$id,$agreename);
            $this->success('点赞+1',1,1);
        }

    }

    //收藏存储
    public function addsave(){

        $id=I('id');
        if (!isset($id)){
            exit();
        }

        if (!cookie('userid')){
            session('location',U('Active/active_content',array('id'=>$id))); //自动跳转标记
            cookie('active_back',1); //返回标记
            $this->error('请先登录',U('Login/login'),0);
        }

        $arr=array(
            'rs_saveid'=>$id,
            'rs_userid'=>cookie('userid'),
            'rs_addtime'=>date('Y-m-d H-i-s'),
            'rs_savetype'=>1


        );
        $ip=get_client_ip();
        $agreename=$ip.$id;
        $where['ad_id']=$id;
        $result=M('save')->where(array('rs_saveid'=>$id,'rs_userid'=>cookie('userid'),'rs_savetype'=>1))->count();
        if ($result){
            M('active')->where($where)->setDec('ad_savenum');
            M('save')->where(array('rs_saveid'=>$id,'rs_userid'=>cookie('userid'),'rs_savetype'=>1))->delete();
            session('active_save'.$id,null);
            $this->success('取消收藏',1,1);
        }else{
            M('save')->add($arr);
            M('active')->where($where)->setInc('ad_savenum');
            session('active_save'.$id,$agreename);
            $this->success('已收藏',1,1);

        }


    }





    //活动列表加载
    public function activeload(){

    $this->display();
    }

    //活动列表接口
    public function active_list(){


        $active=D('active');
        $pagenum=C('HM_PAGENUM');
        $page=I('page_num',1);  //当前页数
        $time=I('time','');
        $adress=I('place');
        $nowtime=time();


        if ($time){
            if ($time=='week'){

                $where['ad_closingtime']=array('elt',strtotime("+1 week"));
                $type=2;
            }elseif ($time=='month'){

                $where['ad_closingtime']=array('elt',strtotime("+1 month"));
                $type=2;

            }elseif ($time=='year'){

                $where['ad_closingtime']=array('elt',strtotime("+6 month"));
                $type=2;
            }else{
                $type=1;
            }
        }
        if ($adress){
            if($adress=="国内其他"){
              $where['ad_sea']=0;
              $where['ad_adress']=array('notlike',array('%上海%','%北京%','%广州%','%成都%'),'AND');
            }elseif($adress=="境外"){
                $where['ad_sea']=1;
            }else{

                $where['ad_adress']=array('like','%'.$adress.'%');

            }

        }


        $limit=($pagenum*($page-1)).",".$pagenum;
        $activedata=$active->activelist($limit,$where,$type);



        $active_count=$active->getactivecount($where,$type);
        $totalpage=ceil($active_count/$pagenum);//总计页数

        if ($totalpage>$page){
            $data['have_more']=1;
        }else{
            $data['have_more']=0;
        }
        $data['data']=$activedata;










        $this->ajaxReturn($data,'JSON',$totalpage);






    }




    //报名表添加界面

    public function active_register(){

        $ad_id = I('id',session('classid'),htmlspecialchars);  //获取报名iD
        if (!cookie('userid')){
            cookie('active_back',1);
            session('location',__SELF__.$_SERVER['QUERY_STRING']);
            session('classid',$mc_id);
            $this->error('请登录',U('Login/Login'),0);
        }

        $typedata=M('class_type')->getField('ct_id,ct_name');
        $persondata=M('member_list')->where(array('member_list_id'=>cookie('userid')))->Field('member_list_headpic,member_list_tel,member_list_username,member_list_email,member_list_sex,member_list_petname')->find();



        $this->assign('typedata',$typedata);
        $this->assign('persondata',$persondata);
        $this->assign('activeid',$ad_id);
        $this->display();




    }


    //报名表



    public function active_register_add(){
        if (!IS_AJAX){
            $this->error('提交方式不正确',U('active_register'),0);
        }else{
            $active=M('active_register');
            if (!$active->autoCheckToken($_POST)){
                $this->error('表单令牌错误',0,0);
            }else{



                $ad_id = I('id','',htmlspecialchars);  //获取活动iD

                $time=time();
            $where['ad_id']=$ad_id;
            $where['ad_closingtime']=array('egt',$time);
            $where['ad_valid']=2;
            $data=M('active')->where($where)->count();

            if (!$data){
                $this->error('该活动不在报名时间范围之内或活动已过期',U('Active/active_content',array('id'=>$ad_id)),0);
            }





                $more=I('course_type');
                if (is_array($more)){
                    $morestr=implode(',', $more);
                }else{
                    $morestr=$more;
                }







                $sl_data=array(
                    'ar_name'=>I('participant'),
                    'ar_tel'=>I('phone'),
                    'ar_birthday'=>date('Y-m-d H:i:s',time()),  //暂设置为默认
                    'ar_sex'=>I('gender'),
                    'ar_more'=>$morestr,
                    'ar_open'=>0,
                    'ar_email'=>I('email'),
                    'ar_addtime'=>date('Y-m-d H-i-s',time()),
                    'ar_userid'=>cookie('userid'),
                    'ar_activeid'=>$ad_id,
                    'ar_say'=>I('say'),


                );

                $result=$active->where(array('ar_activeid'=>$ad_id,'ar_tel'=>I('phone'),'ar_name'=>I('participant')))->count();
                if ($result){
                    $this->error('该活动报名表中已有相同的联系方式和真实姓名，建议您修改报名资料',0);
                }
                if ($active->create($sl_data)){
                    $active->add();

                    $this->success('您已提交报名信息，请等待审核',U('active_content',array('id'=>$ad_id)),1);
                }else{
                    $this->error('报名信息递交错误',U('active_register'),0);
                }








            }
        }


    }







}

?>