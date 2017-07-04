<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;


class UserController extends Controller {



/*
 * 个人中心
 */
    public function person(){
        session('location',__SELF__.$_SERVER['QUERY_STRING']);
        cookie('classback',__SELF__.$_SERVER['QUERY_STRING']);
        cookie('activeback',__SELF__.$_SERVER['QUERY_STRING']);
        if (!cookie('userid')){
            $this->error('请先登录',U('Login/login'),0);
        }
        $id=cookie('userid');
        $where['member_list_id']=$id;

        $status=D('MemberList')->userdata($where);






        $this->assign('province',$province);

        $this->assign('userdata',$status);
        $this->display();

    }





    //用户报名的活动
    public function useractive(){
        if (!cookie('userid')){

            $this->error('请先登录',U('Login/login'),0);
        }

        $register=D('register');
        $pagenum=C('PS_PAGENUM');
        $page=I('page_num',1);  //当前页数

        $where['ar_userid']=cookie('userid');
        $limit=($pagenum*($page-1)).",".($pagenum*$page);
        $registerdata=$register->activeByUser($limit,$where);


        $register_count=$register->getregistercount($where);
        $totalpage=ceil($register_count/$pagenum);//总计页数

        if ($totalpage>$page){
            $data['have_more']=1;
        }else{
            $data['have_more']=0;
        }
        $data['data']=$registerdata;










        $this->ajaxReturn($data,'JSON',$totalpage);



    }


    //用户报名的课程
    public function userclass(){
        if (!cookie('username')){
            $this->error('请先登录',U('Login/login'),0);
        }

        $register=D('clregister');
        $pagenum=C('PS_PAGENUM');
        $page=I('page_num',1);  //当前页数

        $where['cr_userid']=cookie('userid');
        $limit=($pagenum*($page-1)).",".($pagenum*$page);
        $registerdata=$register->classByUser($limit,$where);


        $register_count=$register->getregistercount($where);
        $totalpage=ceil($register_count/$pagenum);//总计页数

        if ($totalpage>$page){
            $data['have_more']=1;
        }else{
            $data['have_more']=0;
        }
        $data['data']=$registerdata;










        $this->ajaxReturn($data,'JSON',$totalpage);



    }



    //用户收藏

    public function user_save(){
        if (!cookie('username')){
            $this->error('请先登录',U('Login/login'),0);
        }

        $register=D('save');
        $pagenum=C('PS_PAGENUM');
        $page=I('page_num',1);  //当前页数
        $type=I('type',1);  //当前页数

        $where['rs_userid']=cookie('userid');
        $where['rs_savetype']=$type;
        $limit=($pagenum*($page-1)).",".($pagenum*$page);
        $registerdata=$register->saveByUser($limit,$where);


        $register_count=$register->getregistercount($where);
        $totalpage=ceil($register_count/$pagenum);//总计页数

        if ($totalpage>$page){
            $data['have_more']=1;
        }else{
            $data['have_more']=0;
        }
        $data['data']=$registerdata;












        $this->ajaxReturn($data,'JSON',$totalpage);



    }

//用户修改资料
  public function checkedit(){
      if (!cookie('username')){
          $this->error('请先登录',U('Login/login'),0);
      }
      if (!IS_AJAX){
          $this->error('提交方式不正确',U('person'),0);
      }else{
          //单图上传控制
          //更新状态

          if($pop=$_FILES['pic_one']){ //images 是你上传的名称
              //获取图片上传后路径
              $upload = new \Think\Upload();// 实例化上传类
              $upload->maxSize   =     3145728 ;// 设置附件上传大小
              $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
              $upload->rootPath  =     './Public/uploads/'; // 设置附件上传根目录
              $upload->savePath  =     ''; // 设置附件上传（子）目录
              $upload->saveRule  =     'time';
              $info   =   $upload->upload();
              $picall_url="";
              if($info) {
                  foreach($info as $file){
                      if ($file['key']=='pic_one'){//单图路径数组
                          $img_url='/uploads/'.$file[savepath].$file[savename];//如果上传成功则完成路径拼接
                      }else{
                          $picall='/uploads/'.$file[savepath].$file[savename];//如果上传成功则完成路径拼接
                          $picall_url=$picall.','.$picall_url;
                      }
                  }
              }else{
                  $this->error($upload->getError());//否则就是上传错误，显示错误原因
              }
          }


          if ($img_url){
              $sl_data['member_list_headpic']=$img_url;
          }
          $sl_data['member_list_username']=I('member_list_username');
          $sl_data['member_list_petname']=I('member_list_petrname');
          $sl_data['member_list_province']=I('member_list_province');
          $sl_data['member_list_city']=I('member_list_city');
          $sl_data['member_list_tel']=I('member_list_tel');
          $sl_data['member_list_email']=I('member_list_email');
          $sl_data['member_list_open']=1;
          foreach ($sl_data as $k=>$v){
              if (!$sl_data[$k]){
                 unset($sl_data[$k]);
              }
          }
          $sl_data['member_list_sex']=I('member_list_sex');


          $result=M('member_list')->where(array('member_list_id'=>cookie('userid')))->save($sl_data);
            if ($result){
              $this->success('资料修改成功',U('person'),1);
            }else{
                $this->error('资料修改失败，有什么疑问请联系管理员',0);
            }


      }




  }


  //修改密码

  public function checkpwd(){
      if (!cookie('username')){
          $this->error('请先登录',U('Login/login'),0);
      }

          if (!IS_AJAX){
              $this->error("提交方式错误！",0,0);
          }else{


              $pwd1=I('new_pwd','','md5');//获取新密码，并且加密
              $pwd2=I('new_pwd2','','md5');//获取新密码，并且加密
              if ($pwd1!=$pwd2){
                  $this->error('两次输入的密码不一致',0,0);
              }

              if(!$pwd1){
                  $this->error('请输入新密码',0,0);
              }else{
                  $admin=M('member_list')->where(array('member_list_id'=>cookie('userid'),'member_list_pwd'=>I('old_pwd','','md5')))->setField('member_list_pwd',$pwd1);
                 if ($admin){
                  $this->success('恭喜您，密码修改成功',U('person'),1);
                 }else{
                     $this->error('原密码不正确',0,0);
                 }
              }
          }


  }



  public function getaddress(){
      $city=D('province');
      $adress = $city->relation(true)->select();


      $this->ajaxReturn($adress,'JSON');

  }






}

?>