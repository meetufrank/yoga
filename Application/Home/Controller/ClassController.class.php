<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;


class ClassController extends Controller {









    //课程详情
    public function class_content(){

        session('location',__SELF__.$_SERVER['QUERY_STRING']);
        $id=I('id');
        $ip=get_client_ip();
        $str=$ip.$id;
        if (!session('?class_read'.$id)){
            M('class')->where(array('mc_id'=>$id))->setInc('mc_readnum');
            session('class_read'.$id,$str);

        }


        //验证是否可以报名

        $time=time();
        $map['mc_id']=$id;
        $map['mc_closingtime']=array('egt',$time);
        $map['mc_valid']=array('neq',1);;
        $register_status=M('class')->where($map)->count();

        if ($register_status){
            $register_status=1;   //可以报名
        }else{
            $register_status=0;
        }
        if($id){
            $class=D('class');
            $where['mc_id']=$id;


            $data=$class->classshow(null,$where);
            //返回的是二维数组，由于根据主键查询值唯一，所以始终仅一条数据
            $data=$data[$id];





            $data['mc_addtime']=date('Y-m-d',$data['mc_addtime']);
            $data['mc_starttime']=date('Y-m-d',$data['mc_starttime']);
            $data['mc_stoptime']=date('Y-m-d',$data['mc_stoptime']);
            $data['mc_closingtime']=date('Y-m-d',$data['mc_closingtime']);
          
        }else{
            $this->error('非法操作',1);
        }

        if (session('?class_agree'.$id)){
            $status=1;


        }else{
            $status=0;
        }
        $result=M('save')->where(array('rs_saveid'=>$id,'rs_userid'=>session('userid'),'rs_savetype'=>2))->count();
        if ($result){
            $save_status=1;
        }else{
            $save_status=0;
        }


        //查询该课程文案归属类型，以跳转正确的报名页面

        $ct_type=M('class_type')->where(array('ct_id'=>$data['mc_type']))->getField('ct_type_one');




        $this->assign('class',$data);
        $this->assign('agree',$status);
        $this->assign('save_status',$save_status);
        $this->assign('register_status',$register_status);
        $this->assign('ct_type',$ct_type);

        $this->display();
    }

    //点击报名验证用户状态
    public function validte(){
        $classid=I('id');
        if (!cookie('userid')){
            cookie('class_back',1);
            session('location',U('Class/class_register'));
            session('classid',$classid);
            $this->error('请先登录',U('Login/login'),0);
        }
        $time=time();
        $where['mc_id']=$classid;
        $where['mc_closingtime']=array('egt',$time);
        $where['mc_valid']=array('neq',1);;
        $data=M('class')->where($where)->count();
        if (!$data){
            $this->error('该课程不在报名时间范围之内或课程已结束',U('class/class_content',array('id'=>$classid)),0);
        }



      if (I('href')=="c"){
          $this->success('跳转报名',U('Class/class_register_two',array('id'=>$classid)),1);

      }else{
          $this->success('跳转报名',U('Class/class_register',array('id'=>$classid)),1);

      }
    }

    //点赞存储
    public function addagree(){
        $id=I('id');
        if (!isset($id)){
            exit();
        }
        $ip=get_client_ip();
        $agreename=$ip.$id;
        $where['mc_id']=$id;
        if (session('?class_agree'.$id)){
            M('class')->where($where)->setDec('mc_agreenum');
            session('class_agree'.$id,null);
            $this->success('取消点赞',1,1);
        }else{
            M('class')->where($where)->setInc('mc_agreenum');
            session('class_agree'.$id,$agreename);
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
            session('location',U('Class/class_content',array('id'=>$id))); //自动跳转标记
            cookie('class_back',1); //返回标记
            $this->error('请先登录',U('Login/login'),0);
        }

        $arr=array(
            'rs_saveid'=>$id,
            'rs_userid'=>cookie('userid'),
            'rs_addtime'=>date('Y-m-d H-i-s'),
            'rs_savetype'=>2


        );
        $ip=get_client_ip();
        $agreename=$ip.$id;
        $where['mc_id']=$id;
        $result=M('save')->where(array('rs_saveid'=>$id,'rs_userid'=>cookie('userid'),'rs_savetype'=>2))->count();
        if ($result){
            M('class')->where($where)->setDec('mc_savenum');
            M('save')->where(array('rs_saveid'=>$id,'rs_userid'=>cookie('userid'),'rs_savetype'=>2))->delete();
            session('class_save'.$id,null);
            $this->success('取消收藏',1,1);
        }else{
            M('save')->add($arr);
            M('class')->where($where)->setInc('mc_savenum');
            session('class_save'.$id,$agreename);
            $this->success('已收藏',1,1);

        }


    }





    //课程列表加载
    public function classload(){
        cookie('classback',__SELF__);

        $class=D('class');
        $pagenum=C('HM_PAGENUM');
        $page=I('page_num',1);  //当前页数
        $time=I('time','');
        $adress=I('place');
        $type=I('type');
        $nowtime=time();


        if ($time){
            if ($time=='week'){
                $where['mc_starttime'][]=array('egt',time());
                $where['mc_starttime'][]=array('elt',strtotime("+1 week"));
                $timestring='一周内';

            }elseif($time=='month'){
                $where['mc_starttime'][]=array('egt',time());
                $where['mc_starttime'][]=array('elt',strtotime("+1 month"));
                $timestring='一个月内';

            }elseif($time=='year'){
                $where['mc_starttime'][]=array('egt',time());
                $where['mc_starttime'][]=array('elt',strtotime("+3 month"));
                $timestring='三个月内';

            }elseif($time=="all"){
                $timestring='全部';
            }else{
                $timestring='往期';
                $str=1;
            }
        }
        if ($adress){
            if($adress=="国内其他"){
                $where['mc_sea']=0;
                $where['mc_adress']=array('notlike',array('%上海%','%北京%','%广州%','%成都%'),'AND');
                $adstr='国内其他';
            }elseif($adress=="境外"){
                $where['mc_sea']=1;
                $adstr='境外';
            }elseif($adress=="all"){

            }else{

                $where['mc_adress']=array('like','%'.$adress.'%');
                $adstr=$adress;
            }

        }

        if ($type){
            if($type=="all"){

            }else{

                $where['mc_type']=array('eq',$type);
                $typestr=M('class_type')->where(array('ct_id'=>$type))->getField('ct_name');

            }

        }


        $limit=($pagenum*($page-1)).",".$pagenum;
        $classdata=$class->classlist($limit,$where,$str);



        $class_count=$class->getclasscount($where,$str);
        $totalpage=ceil($class_count/$pagenum);//总计页数


        //判断用户是否是点击更多
      if ($page>1){
          if ($totalpage>$page){
            $data['have_more']=1;
          }else{
            $data['have_more']=0;
          }
          $data['data']=$classdata;
          $this->ajaxReturn($data,'JSON',$totalpage);
      }else{
          if ($totalpage>$page){
              $havemore=1;
          }else{
              $havemore=0;
          }

      }

        //课程人群
        $person=M('diyflag')->field('diyflag_value,diyflag_name')->select();

         //获取类型
        $typedata=M('class_type')->field('ct_id,ct_name')->select();
        foreach ($person as $k=>$v){
            $diyflag=$v['diyflag_value'];
            $map['ct_diyflag']=array('like',"%".$diyflag."%");
            $type_con[$diyflag]=M('class_type')->where($map)->field('ct_id,ct_name')->select();  //整合每个人群的课程类型
        }








      $this->assign('timestring',$timestring);
      $this->assign('adstr',$adstr); //选中的地点
      $this->assign('typestr',$typestr); //选中的地点
      $this->assign('person',$person);
      $this->assign('typedata',$typedata);  //全部的课程类型
      $this->assign('type_con',$type_con);  //各个人群的课程类型
      $this->assign('classdata',$classdata);
      $this->assign('havemore',$havemore);//是否更多
      $this->display();
    }

    //课程列表接口
    public function class_list(){


        $class=D('class');
        $pagenum=C('HM_PAGENUM');
        $page=I('page_num',1);  //当前页数
        $time=I('time','');
        $adress=I('place');
        $type=I('type');
        $nowtime=time();


        if ($time){
            if ($time=='week'){

                $where['mc_starttime'][]=array('egt',time());
                $where['mc_starttime'][]=array('elt',strtotime("+1 week"));

            }elseif($time=='month'){
                $where['mc_starttime'][]=array('egt',time());
                $where['mc_starttime'][]=array('elt',strtotime("+1 month"));

            }elseif($time=='year'){
                $where['mc_starttime'][]=array('egt',time());
                $where['mc_starttime'][]=array('elt',strtotime("+6 month"));

            }elseif($time=="all"){

            }else{
                $str=1;
            }
        }
        if ($adress){
            if($adress=="国内其他"){
                $where['mc_sea']=0;
                $where['mc_adress']=array('notlike',array('%上海%','%北京%','%广州%','%成都%'),'AND');
            }elseif($adress=="境外"){
                $where['mc_sea']=1;
            }elseif($adress=="all"){

            }else{

                $where['mc_adress']=array('like','%'.$adress.'%');

            }

        }

        if ($type){
            if($type=="all"){

            }else{

                $where['mc_type']=array('eq',$type);

            }

        }


        $limit=($pagenum*($page-1)).",".$pagenum;
        $classdata=$class->classlist($limit,$where,$str);


        $class_count=$class->getclasscount($where,$str);
        $totalpage=ceil($class_count/$pagenum);//总计页数

        if ($totalpage>$page){
            $data['have_more']=1;
        }else{
            $data['have_more']=0;
        }
        $data['data']=$classdata;










        $this->ajaxReturn($data,'JSON',$totalpage);






    }


    //课程人群

    public function class_person(){


        $data=M('diyflag')->field('diyflag_value,diyflag_name')->select();

        $this->ajaxReturn($data,'JSON');

    }

    //课程类型

    public function class_type(){

        $type=I('diyflag_value');
        if ($type){
            if ($type=='all'){

            }else{
                $where[]="FIND_IN_SET('$type',ct_diyflag)";
            }

        }


        $data=M('class_type')->where($where)->field('ct_id,ct_name')->select();


         $this->ajaxReturn($data,'JSON');

    }




    //高级课程表添加界面

    public function class_register(){
        $classid=session('classid');
        $mc_id = I('id',$classid,htmlspecialchars);  //获取报名iD

        if (!cookie('userid')){
            cookie('class_back',1);
            session('location',__SELF__.$_SERVER['QUERY_STRING']); //自动跳转标记
            session('classid',$mc_id);
            $this->error('请登录',U('Login/Login'),0);
        }


        $persondata=M('member_list')->where(array('member_list_id'=>cookie('userid')))->Field('member_list_headpic,member_list_tel,member_list_username,member_list_email,member_list_sex,member_list_petname,member_list_province,member_list_city')->find();
        $classtype=M('class_type')->getField('ct_id,ct_name');
        $home=M('class')->table('__CLASS__ c')->join('
            __CLASS_TYPE__ ct on
            c.mc_type=ct.ct_id
            ')->where(array('mc_id'=>$mc_id))->Field('mc_id,ct_type_one,mc_sea')->select();
        foreach ($home as $k=>$v){
            foreach ($v as $vv){
                if ($v['ct_type_one']!='c'||$v['mc_sea']==1){
                    $status=1;
                }
            }
        }



        $this->assign('classtype',$classtype);
        $this->assign('persondata',$persondata);
        $this->assign('classid',$mc_id);
        $this->assign('homestatus',$status);
        $this->display();




    }
    public function class_register_two(){
        $mc_id = I('id',session('classid'),htmlspecialchars);  //获取报名iD
        if (!cookie('userid')){
            cookie('class_back',1);
            session('location',__SELF__.$_SERVER['QUERY_STRING']); //自动跳转标记
            session('classid',$mc_id);  //参数存储
            $this->error('请登录',U('Login/Login'),0);
        }


        $persondata=M('member_list')->where(array('member_list_id'=>cookie('userid')))->Field('member_list_headpic,member_list_tel,member_list_username,member_list_email,member_list_sex,member_list_petname,member_list_province,member_list_city')->find();




        $this->assign('persondata',$persondata);
        $this->assign('classid',$mc_id);

        $this->display();




    }

    //获取地址
    public function getaddress(){
        $city=D('province');
        $adress = $city->relation(true)->select();


        $this->ajaxReturn($adress,'JSON');

    }


    //报名表



    public function class_register_add(){
        if (!IS_AJAX){
            $this->error('提交方式不正确',U('class_register'),0);
        }else{
            $class=M('class_register');
            if (!$class->autoCheckToken($_POST)){
                $this->error('表单令牌错误',0,0);
            }else{



                $mc_id = I('id','',htmlspecialchars);  //获取课程iD

                $time=time();
                D('class')->updateclass($time);
                $where['mc_id']=$mc_id;
                $where['mc_closingtime']=array('egt',$time);
                $where['mc_valid']=array('eq',1);
                $count=M('class')->where($where)->count();


                if($count){
                    $this->error('该课程不在报名时间范围之内或课程已过期',U('Class/class_content',array('id'=>$mc_id)),0);
                }



               $addtype=I('form_type');
                $more=I('course_type');
                $bad=I('health_problem');
                $other=I('other');
                if(is_array($bad)){
                    $badstr=implode(',', $bad);
                }else{
                    $badstr=$bad;
                }
                if ($other&&$badstr!=''){
                    $badstr=$badstr.','.$other;
                }else{
                    $badstr=$other;
                }
                if(!I('health')){
                   $badstr='';
                }
                $pid=I('province');
                $cid=I('city');
                $province=M('province')->where(array('provinceid'=>$pid))->getField('provincename');
                $city=M('city')->where(array('id'=>$cid))->getField('cityname');


                $adress=$province.$city;






                if ($addtype=='c'){
                    $sl_data=array(
                        'cr_name'=>I('participant'),
                        'cr_tel'=>I('phone'),
                        'cr_birthday'=>I('birthday'),
                        'cr_sex'=>1,
                        'cr_more'=>$more,
                        'cr_open'=>0,
                        'cr_email'=>'@qq.com',
                        'cr_addtime'=>date('Y-m-d H-i-s',time()),
                        'cr_userid'=>cookie('userid'),
                        'cr_classid'=>$mc_id,
                        'cr_say'=>I('say'),
                        'cr_hometype'=>I('house_type'),
                        'cr_country'=>'中国',
                        'cr_address'=>'北京市北京市',
                        'cr_health'=>$badstr,
                        'cr_drug'=>I('medicine'),


                    );
                }else{
                    $sl_data=array(
                        'cr_name'=>I('participant'),
                        'cr_tel'=>I('phone'),
                        'cr_birthday'=>I('birthday'),
                        'cr_sex'=>I('gender'),
                        'cr_more'=>$more,
                        'cr_open'=>0,
                        'cr_email'=>I('email'),
                        'cr_addtime'=>date('Y-m-d H-i-s',time()),
                        'cr_userid'=>cookie('userid'),
                        'cr_classid'=>$mc_id,
                        'cr_say'=>I('say'),
                        'cr_hometype'=>I('house_type'),
                        'cr_country'=>I('passport'),
                        'cr_address'=>$adress,
                        'cr_health'=>$badstr,
                        'cr_drug'=>I('medicine'),


                    );
                }


                $result=$class->where(array('cr_classid'=>$mc_id,'cr_tel'=>I('phone'),'cr_name'=>I('participant')))->count();
                if($result){
                    $this->error('该课程报名表中已有相同的联系方式和真实姓名，建议您修改报名资料',0);
                }
                if($class->create($sl_data)){
                    $class->add();
                    $this->success('您已提交报名信息，请等待审核',U('class_content',array('id'=>$mc_id)),1);
                }else{
                    $this->error('报名信息递交错误',U('class_register'),0);
                }




            }
        }

    }

        public function counreIntroduce(){



            $this->display();
        }
        public function counreIntroduce2(){
            $this->display();
        }
        public function counreIntroduce3(){
            $this->display();
        }






    }

















?>
