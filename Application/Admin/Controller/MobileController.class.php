<?php
namespace Admin\Controller;
use Think\Controller;


class MobileController extends Controller {



    public function index(){
    	if (empty($_SESSION['aid'])){
    		$this->redirect('Login/login');
    	}
        session('location',__SELF__.$_SERVER['QUERY_STRING']);
         $type=$_GET['type'];
         if($type==1){
                //活动数据
             $map['ad_back']=0;
            $active=D('active');
            $count= $active->where($map)->count();// 查询满足要求的总记录数


            $Page= new \Think\Pages($count,C('DB_PAGENUM'),'p1');// 实例化分页类 传入总记录数和每页显示的记录数

            $Page->setConfig('theme',' %UP_PAGE% %DOWN_PAGE% ');//设置显示的样式
            $Page->setConfig('prev','<button type="button" class="btn1">上一页</button>');
            $Page->setConfig('next','<button type="button" class="btn1">下一页</button>');
            $show= $Page->show();// 分页显示输出
            $limit=$Page->firstRow.','.$Page->listRows;
            $activedata=$active->activeshow($limit,$map);


             $this->assign('page',$show);
             $this->assign('type',$type);
             $this->assign('activedata',$activedata);

         }else{
            $where['mc_back']=0;
            $class=D('class');
            $count= $class->where($where)->count();// 查询满足要求的总记录数

            $Page= new \Think\Pages($count,C('DB_PAGENUM'),'p2');// 实例化分页类 传入总记录数和每页显示的记录数

            $Page->setConfig('theme',' %UP_PAGE% %DOWN_PAGE% ');//设置显示的样式
            $Page->setConfig('prev','<button type="button" class="btn1">上一页</button>');
            $Page->setConfig('next','<button type="button" class="btn1">下一页</button>');
            $show= $Page->show();// 分页显示输出
            $limit=$Page->firstRow.','.$Page->listRows;
            $classdata=$class->classshow($limit,$where);


            $this->assign('page',$show);

            $this->assign('classdata',$classdata);

         }




$this->display();

    }

     //根据获取的ID来查询活动数据


    public function activeById(){


         $id=$_GET['id'];
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
            $data['ad_addtime']=date('Y-m-d H:i:s',$data['ad_addtime']);
            $data['ad_closingtime']=date('Y-m-d H:i:s',$data['ad_closingtime']);
            $data['ad_starttime']=date('Y-m-d H:i:s',$data['ad_starttime']);
            $data['ad_stoptime']=date('Y-m-d H:i:s',$data['ad_stoptime']);

             echo  json_encode($data);
        }


       }

       //根据ID来获取课程详情

    public function classById(){


        $id=$_GET['id'];
        if($id){
            $class=D('class');
            $where['mc_id']=$id;

            $data=$class->classshow(null,$where);
            //返回的是二维数组，由于根据主键查询值唯一，所以始终仅一条数据

            $data=$data[$id];




            $data['mc_addtime']=date('Y-m-d H:i:s',$data['mc_addtime']);
            $data['mc_closingtime']=date('Y-m-d H:i:s',$data['mc_closingtime']);
            $data['mc_starttime']=date('Y-m-d H:i:s',$data['mc_starttime']);
            $data['mc_stoptime']=date('Y-m-d H:i:s',$data['mc_stoptime']);


            echo  json_encode($data);
        }


    }

    public function active_register_list(){

    $id=$_GET['ad_id'];
    //权限测试
    $result= M('auth_rule')->where(array('name'=>CONTROLLER_NAME.'/'.ACTION_NAME))->getField('authopen');
    if (!$result&& $_SESSION['aid']!=1){
        $author=M('active')->where(array('ad_id'=>$id))->getField('ad_author');
        if ($author!=$_SESSION['aid']){
            $this->error('只能查看自己活动下的报名信息',0);
        }
    }


    if ($id){
        $map['ar_activeid']=$id;
    }


        $register=D('Register');
        $count= $register->where($map)->count();// 查询满足要求的总记录数


        $Page= new \Think\Pages($count,C('DB_PAGENUM'),'p');// 实例化分页类 传入总记录数和每页显示的记录数
        $Page->setConfig('theme',' %UP_PAGE% %DOWN_PAGE% ');//设置显示的样式
         $Page->setConfig('prev','<button type="button" class="btn4">上一页</button>');
         $Page->setConfig('next','<button type="button" class="btn4">下一页</button>');
        $show= $Page->show();// 分页显示输出
        $limit=$Page->firstRow.','.$Page->listRows;


        $data=$register->registershow($limit,$map);






    $this->assign('page',$show);
    $this->assign('back',session('location'));
    $this->assign('register',$data);
    $this->display('register_list');

}

public function active_register_id(){

    $id=$_GET['id'];
    if($id){
        $register=D('Register');
        $where['ar_id']=$id;

        $data=$register->registershow(null,$where);



    }else{
        $this->error('非法操作',0,0);
    }





   echo  json_encode($data[$id]);

}

//判断报名是否通过状态情况
public function register_list_state(){
    $id=I('x');
    $active_id=I('id');
    //权限测试
    $result= M('auth_rule')->where(array('name'=>CONTROLLER_NAME.'/'.ACTION_NAME))->getField('authopen');
    if (!$result&& $_SESSION['aid']!=1){
        $author=M('active')->where(array('ad_id'=>$active_id))->getField('ad_author');
        if ($author!=$_SESSION['aid']){
            $this->error('只能修改自己活动下的报名状态',0,0);
        }
    }
    $status=M('active_register')->where(array('ar_id'=>$id))->getField('ar_open');
    if($status==1){
        $statedata = array('ar_open'=>0);
        $auth_group=M('active_register')->where(array('ar_id'=>$id))->setField($statedata);
        M('active')->where(array('ad_id'=>$active_id))->setDec('ad_num');
        $this->success('未审核',1,1);
    }else{

        $num=M('active')->where(array('ad_id'=>$active_id))->getField('ad_num');
        $maxnum=M('active')->where(array('ad_id'=>$active_id))->getField('ad_maxnum');
        if ($maxnum>$num||$maxnum==0){
            M('active')->where(array('ad_id'=>$active_id))->setInc('ad_num');
            $statedata = array('ar_open'=>1);
            $auth_group=M('active_register')->where(array('ar_id'=>$id))->setField($statedata);
            $this->success('通过审核',1,1);
        }else{
            $this->error('报名人数已达上限',0,0);
        }

    }
}


//课程报名管理



public function class_register_list(){

    $id=I('mc_id');
    //权限测试
    $result= M('auth_rule')->where(array('name'=>CONTROLLER_NAME.'/'.ACTION_NAME))->getField('authopen');
    if (!$result&& $_SESSION['aid']!=1){
        $author=M('class')->where(array('mc_id'=>$id))->getField('mc_author');
        if ($author!=$_SESSION['aid']){
            $this->error('只能查看自己课程下的报名信息',0);
        }
    }



    if ($id){
        $map['cr_classid']=$id;
    }



    $register=D('Clregister');
    $count= $register->where($map)->count();// 查询满足要求的总记录数

    $Page= new \Think\Pages($count,C('DB_PAGENUM'),'p');// 实例化分页类 传入总记录数和每页显示的记录数
    $Page->setConfig('theme',' %UP_PAGE% %DOWN_PAGE% ');//设置显示的样式
         $Page->setConfig('prev','<button type="button" class="btn4">上一页</button>');
         $Page->setConfig('next','<button type="button" class="btn4">下一页</button>');
    $show= $Page->show();// 分页显示输出
    $limit=$Page->firstRow.','.$Page->listRows;



    $data=$register->registershow($limit,$map);






    $this->assign('page',$show);
    $this->assign('back',session('location'));
    $this->assign('classdata',$data);
    $this->display('register_list');

}

public function class_register_id(){

    $id=$_GET['id'];
    if($id){
        $register=D('Clregister');
        $where['cr_id']=$id;

        $data=$register->registershow(null,$where);



    }else{
        $this->error('非法操作',0,0);
    }





    echo  json_encode($data[$id]);

}




//判断报名是否通过状态情况
public function classregister_list_state(){
    $id=I('x');
    $classid=I('id');
    //权限测试
    $result= M('auth_rule')->where(array('name'=>CONTROLLER_NAME.'/'.ACTION_NAME))->getField('authopen');
    if (!$result&& $_SESSION['aid']!=1){
        $author=M('class')->where(array('mc_id'=>$classid))->getField('mc_author');
        if ($author!=$_SESSION['aid']){
            $this->error('只能修改自己课程下的报名状态',0,0);
        }
    }
    $status=M('class_register')->where(array('cr_id'=>$id))->getField('cr_open');
    if($status==1){
        $statedata = array('cr_open'=>0);
        $auth_group=M('class_register')->where(array('cr_id'=>$id))->setField($statedata);
        M('class')->where(array('mc_id'=>$classid))->setDec('mc_num');
        $this->success('未审核',1,1);
    }else{

        $num=M('class')->where(array('mc_id'=>$classid))->getField('mc_num');
        $maxnum=M('class')->where(array('mc_id'=>$classid))->getField('mc_maxnum');
        if ($maxnum>$num||$maxnum==0){
            M('class')->where(array('mc_id'=>$classid))->setInc('mc_num');
            $statedata = array('cr_open'=>1);
            $auth_group=M('class_register')->where(array('cr_id'=>$id))->setField($statedata);
            $this->success('通过审核',1,1);
        }else{
            $this->error('报名人数已达上限',0,0);
        }

    }
}


}