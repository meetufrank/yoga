<?php
namespace Admin\Controller;
use Think\Controller;
use Common\Controller\AuthController;
use Think\Auth;

class NewsController extends AuthController {



/*
 *内容复制功能
 */
 public function save_copy(){

     $num=I('num','',htmlspecialchars);
     $id=I('id','',htmlspecialchars);;
     if ($num&&$id) {
          if ($num==1) {
             $active=D('active');
             $where['ad_id']=$id;
             $data=$active->activeshow(null,$where);
             $data=$data[$id];
             session('activecopy',$data);
             $url=U('News/news_listadd');
             header('Location: ' . $url);
          }elseif ($num==2) {
              $class=D('class');
              $where['mc_id']=$id;
              $data=$class->classshow(null,$where);
              $data=$data[$id];
              session('classcopy',$data);
              $url=U('News/class_listadd');
              header('Location: ' . $url);
          }else{
              $knows=D('knows');
              $where['ms_id']=$id;
              $data=$knows->knowsshow(null,$where);
              $data=$data[$id];
              session('knowscopy',$data);
              $url=U('News/knows_listadd');
              header('Location: ' . $url);
          }
     }else{
        $this->error('非法操作');
     }


 }
/************************************************活动管理**************************************************/
	//活动列表
    public function news_list(){




       $keytype=I('keytype','ad_title');
    	$key=I('key');
    	$opentype_time=I('opentype_time','');
    	$diyflag=I('diyflag','');
    	//查询：时间格式过滤
    	$sldate=I('reservation','');//获取格式 2015-11-12 - 2015-11-18
    	$arr = explode(" - ",$sldate);//转换成数组
    	$arrdateone=strtotime($arr[0]);
    	$arrdatetwo=strtotime($arr[1].' 23:55:55');

    	$result= M('auth_rule')->where(array('name'=>CONTROLLER_NAME.'/'.ACTION_NAME))->getField('authopen');
    	if (!$result && $_SESSION['aid']!=1){
    	    $map['ad_author'][]=array('eq',$_SESSION['aid']);
    	}

    	//map架构查询条件数组
    	if ($key){

    	if ($keytype=='ad_author'){  //若是接收的发布人查询
    	    $admin_where['admin_username']=array('like',"%".$key."%");
    	    $admin=M('admin');
    	    $admindata=$admin->where($admin_where)->getField('admin_id',true);
            $author_string=implode($admindata, ',');
    	    $map[$keytype][]=array('in',$author_string);
    	}else{
    	    $map[$keytype]= array('like',"%".$key."%");
    	}
    	}

    if ($opentype_time){
	        $map['ad_valid']= array('eq',$opentype_time);
	    }

    	if ($sldate){
    	$map['ad_starttime'] = array(array('egt',$arrdateone),array('elt',$arrdatetwo),'AND');
    	}

    	if ($diyflag){
    		$map[] ="FIND_IN_SET('$diyflag',ad_type)";
    	}

    	foreach ($map as $k=>$value){
    	    if (empty($value)&&$k!='ad_open'){
    	        unset($map[$k]);
    	    }
    	}

       $map['ad_back']=0;
    	$active=D('active');
    	$count= $active->where($map)->count();// 查询满足要求的总记录数

    	$Page= new \Think\Page($count,C('DB_PAGENUM'));// 实例化分页类 传入总记录数和每页显示的记录数
    	$show= $Page->show();// 分页显示输出
    	$limit=$Page->firstRow.','.$Page->listRows;
    	$activedata=$active->activeshow($limit,$map);

//     	$news=D('active')->where($map)->limit($Page->firstRow.','.$Page->listRows)->order('ad_addtime desc')->select();
    	$diyflag_list=M('diyflag')->select();//活动属性数据


//     	$pinyin = new \Org\Util\Pinyin;
//     	echo $pinyin->allFirstString("湖北武汉")."<br/>";
//     	echo $pinyin->allFirstString("北上广")."<br/>";
//     	echo $pinyin->allFirstString("火影")."<br/>";
//     	echo $pinyin->allFirstString("获得")."<br/>";
//     	echo $pinyin->allFirstString("TOM")."<br/>";
//     	exit;



    	$this->assign('keytype',$keytype);
    	$this->assign('keyy',$key);
    	$this->assign('sldate',$sldate);
    	$this->assign('opentype_time',$opentype_time);
    	$this->assign('diyflag_check',$diyflag);
    	$this->assign('diyflag',$diyflag_list);
    	$this->assign('activedata',$activedata);
    	$this->assign('page',$show);
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




    public function news_listadd(){

        $result= M('auth_rule')->where(array('name'=>CONTROLLER_NAME.'/'.ACTION_NAME))->getField('authopen');
        if (!$result && $_SESSION['aid']!=1){
            $this->error('无权操作',0);
        }
        //活动适用人群
		$diyflag=M('diyflag');
		$diyflag=$diyflag->select();



		$this->assign('diyflag',$diyflag);
    	$this->display();
    }
  //添加活动
    public function news_runadd(){
    	if (!IS_AJAX){
    		$this->error('提交方式不正确',U('news_list'),0);
    	}else {
    		$active=M('active');
    		$result= M('auth_rule')->where(array('name'=>CONTROLLER_NAME.'/'.ACTION_NAME))->getField('authopen');
    		if (!$result && $_SESSION['aid']!=1){
    		    $this->error('无权操作',0);
    		}
    		if (!$active->autoCheckToken($_POST)){
    			$this->error('表单令牌错误',0,0);
    		}else{

    			//单图上传控制
    		    //更新状态
    		    $nowtime=time();
    		    D('active')->updateactive($nowtime);
    			if($pop=$_FILES['pic_one']['name'][0] || $popp=$_FILES['pic_all']['name'][0]){ //images 是你上传的名称
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

    			//获取活动属性
    			$news_flag=I('news_flag');
    			if ($news_flag){
    			$flagdata=implode(',',$news_flag);
    			}
    			$author=$_SESSION['aid'];//发布人id
    			$adress=I('adress');
    			$x1 = "%**#".$adress;
    			if(strpos($x1,"市") == 0){
                     $this->error('地址错误，格式应为：XX市xx区xxxx',0);
    			}




    			$sl_data=array(
    					'ad_author'=>$author,
    			        'ad_title'=>I('title'),
                        'ad_adress'=>I('adress'),
                        'ad_city'=>0,
    			        'ad_type'=>$flagdata,
    			        'ad_person'=>I('ad_name'),
    			        'ad_tel'=>I('tel'),
    					'ad_photo'=>$img_url,
    			        'ad_maxnum'=>I('maxnum'),
    			        'ad_addtime'=>time(),
    			        'ad_lastchangetime'=>date('Y-m-d H-i-s'),
    			        'ad_changeadmin'=>$author,

    			        'ad_closingtime'=>strtotime(I('closingtime')),
    			        'ad_starttime'=>strtotime(I('starttime')),
    			        'ad_stoptime'=>strtotime(I('stoptime')),
    			        'ad_open'=>I('open'),
    			        'ad_top'=>I('top'),
    			        'ad_say'=>I('say'),
    			        'ad_sea'=>I('sea',0),
    			        'ad_toptime'=>strtotime("+3 days"),


    			);

    			//保存并且获取ID
    		    if ($active->create($sl_data)){
    		        $res=$active->add();
    		        if ($res){
    			$sl_content=array(
    					'news_content_nid'=>$res,
    					'news_content_body'=>I('content'),
    			);
    			    $re=M('news_content')->field('news_content_nid,news_content_body')->add($sl_content);
    			    if ($re){
    			      $active->where(array('ad_id'=>$res))->setField('ad_content',$re);
    			    $this->success('活动添加成功,返回列表页',U('news_list'),1);
    			    }else{
    			        $this->error('活动内容添加失败',0);
    			    }
    		        }
    		    }else{

    		       exit($active->getError());
    		    }
    		}
    	}
    }


    public function news_runedit(){
    	if (!IS_AJAX){
    		$this->error('提交方式不正确',U('news_list'),0);
    	}else{
    		$active=M('active');
    		if (!$active->autoCheckToken($_POST)){
    			$this->error('表单令牌错误',0,0);
    		}else{

    		    //单图上传控制
    		    $n_id = I('ad_id','',htmlspecialchars);  //获取活动iD
                $content_id=I('ad_content','',htmlspecialchars);
    		    $where['ad_id']=$n_id;
    		    $content_where['news_content_id']=$content_id;
    		    $result= M('auth_rule')->where(array('name'=>CONTROLLER_NAME.'/'.ACTION_NAME))->getField('authopen');
    		   $count=M('active')->where(array('ad_author'=>$_SESSION['aid'],'ad_id'=>$n_id))->count();
    		    if (!$result && $_SESSION['aid']!=1 &&!$count){
    		        $this->error('无权操作',0);
    		    }
    		    //更新状态
    		    $nowtime=time();
    		    D('active')->updateactive($nowtime);


    		    if($pop=$_FILES['pic_one']['name'][0] || $popp=$_FILES['pic_all']['name'][0]){ //images 是你上传的名称
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

    		    //获取活动属性
    		    $news_flag=I('news_flag');
    		    if ($news_flag){
    		        $flagdata=implode(',',$news_flag);
    		    }
    		    $author=$_SESSION['aid'];//发布人id
    		    $adress=I('adress');
    		    $x1 = "%**#".$adress;
    		    if(strpos($x1,"市") == 0){
    		        $this->error('地址错误，格式应为：XX市xx区xxxx',0);
    		    }


    		    $sl_data=array(
    		        //'ad_author'=>$author,
    		        'ad_title'=>I('title'),
    		        'ad_adress'=>I('adress'),
    		        'ad_city'=>0,
    		        'ad_type'=>$flagdata,
    		        'ad_person'=>I('ad_name'),
    		        'ad_tel'=>I('tel'),
    		        'ad_maxnum'=>I('maxnum'),
    		        'ad_lastchangetime'=>date('Y-m-d H-i-s'),
    		        'ad_changeadmin'=>$author,
    		        'ad_closingtime'=>strtotime(I('closingtime')),
    		        'ad_starttime'=>strtotime(I('starttime')),
    		        'ad_stoptime'=>strtotime(I('stoptime')),
    		        'ad_open'=>I('open'),
    		        'ad_top'=>I('top'),
    		        'ad_say'=>I('say'),
    		        'ad_sea'=>I('sea',0),
    		        'ad_toptime'=>strtotime("+3 days"),


    		    );
    		    if ($img_url){
    		        $sl_data['ad_photo']=$img_url;
    		    }
              $res=$active->where($where)->save($sl_data);


              $sl_content=array(
                  'news_content_nid'=>$n_id,
                  'news_content_body'=>I('content'),
              );

              M('news_content')->where($content_where)->save($sl_content);

              $this->success('活动修改成功,返回列表页',U('news_list'),1);




    		}
    	}

    }

    public function news_list_del(){
    	$p=I('p');
    	$n_id=I('ad_id');
    	$check_nid=M('active')->where(array('ad_id'=>I('ad_id')))->find();
    	if (empty($check_nid)){
    		$this->error('参数不正确',0,0);
    	}else {

    		$check_admin_nid=M('active')->where(array('ad_id'=>I('ad_id'),'ad_author'=>$_SESSION['aid']))->find();
    		if (empty($check_admin_nid) && $_SESSION['aid']!=1){
    			$this->error('你没有删除该活动权限',0,0);
    		}else {
    			M('active')->where(array('ad_id'=>I('ad_id')))->setField('ad_back',1);//转入回收站
    			$this->redirect('news_list', array('p' => $p));
    		}
    	}
    }

    public function news_back_open(){
    	$p=I('p');
    	$n_id=I('n_id');
    	$check_nid=M('active')->where(array('ad_id'=>$n_id))->find();
    	if (empty($check_nid)){
    		$this->error('参数不正确',0,0);
    	}else {
    		$check_admin_nid=M('active')->where(array('ad_id'=>$n_id,'ad_author'=>$_SESSION['aid']))->find();
    		if (empty($check_admin_nid) && $_SESSION['aid']!=1){
    			$this->error('你没有还原该活动权限',0,0);
    		}else {
		    	M('active')->where(array('ad_id'=>I('n_id')))->setField('ad_back',0);//转出回收站
		    	$this->redirect('news_back', array('p' => $p));
    		}
    	}

    }

    //回收站
    public function news_back(){


    	$keytype=I('keytype','ad_title');
    	$key=I('key');
    	$opentype_time=I('opentype_time','');
    	$diyflag=I('diyflag','');
    	//查询：时间格式过滤
    	$sldate=I('reservation','');//获取格式 2015-11-12 - 2015-11-18
    	$arr = explode(" - ",$sldate);//转换成数组
    	$arrdateone=strtotime($arr[0]);
    	$arrdatetwo=strtotime($arr[1].' 23:55:55');

    	$result= M('auth_rule')->where(array('name'=>CONTROLLER_NAME.'/'.ACTION_NAME))->getField('authopen');
    	if (!$result && $_SESSION['aid']!=1){
    	    $map['ad_author'][]=array('eq',$_SESSION['aid']);
    	}

    	//map架构查询条件数组
    	if ($key){

    	    if ($keytype=='ad_author'){  //若是接收的发布人查询
    	        $admin_where['admin_username']=array('like',"%".$key."%");
    	        $admin=M('admin');
    	        $admindata=$admin->where($admin_where)->getField('admin_id',true);
    	        $author_string=implode($admindata, ',');
    	        $map[$keytype][]=array('in',$author_string);
    	    }else{
    	        $map[$keytype]= array('like',"%".$key."%");
    	    }
    	}
     if ($opentype_time){
	        $map['ad_valid']= array('eq',$opentype_time);
	    }

    	if ($sldate){
    	$map['ad_starttime'] = array(array('egt',$arrdateone),array('elt',$arrdatetwo),'AND');
    	}

    	if ($diyflag){
    		$map[] ="FIND_IN_SET('$diyflag',ad_type)";
    	}

    	foreach ($map as $k=>$value){
    	    if (empty($value)&&$k!='ad_open'){
    	        unset($map[$k]);
    	    }
    	}
       $map['ad_back']=1;
    	$active=D('active');
    	$count= $active->where($map)->count();// 查询满足要求的总记录数

    	$Page= new \Think\Page($count,C('DB_PAGENUM'));// 实例化分页类 传入总记录数和每页显示的记录数
    	$show= $Page->show();// 分页显示输出
    	$limit=$Page->firstRow.','.$Page->listRows;
    	$activedata=$active->activeshow($limit,$map);
//     	$news=D('active')->where($map)->limit($Page->firstRow.','.$Page->listRows)->order('ad_addtime desc')->select();
    	$diyflag_list=M('diyflag')->select();//活动属性数据


//     	$pinyin = new \Org\Util\Pinyin;
//     	echo $pinyin->allFirstString("湖北武汉")."<br/>";
//     	echo $pinyin->allFirstString("北上广")."<br/>";
//     	echo $pinyin->allFirstString("火影")."<br/>";
//     	echo $pinyin->allFirstString("获得")."<br/>";
//     	echo $pinyin->allFirstString("TOM")."<br/>";
//     	exit;



    	$this->assign('keytype',$keytype);
    	$this->assign('keyy',$key);
    	$this->assign('sldate',$sldate);
    	$this->assign('opentype_time',$opentype_time);
    	$this->assign('diyflag_check',$diyflag);
    	$this->assign('diyflag',$diyflag_list);
    	$this->assign('activedata',$activedata);
    	$this->assign('page',$show);
		$this->display();

    	    }

    public function news_back_del(){
    	$p=I('p');

    	$check_nid=M('active')->where(array('ad_id'=>I('n_id')))->find();
    	if (empty($check_nid)){
    		$this->error('参数不正确',0,0);
    	}else {
    		$check_admin_nid=M('active')->where(array('ad_id'=>I('n_id'),'ad_author'=>$_SESSION['aid']))->find();
    		$check_register=M('active_register')->where(array('ar_activeid'=>I('n_id')))->find();

    		if (empty($check_admin_nid) && $_SESSION['aid']!=1 ){
    			$this->error('你没有删除该活动权限',0,0);
    		}elseif($check_register){
    		    $this->error('该活动已有报名信息，不可删除',0,0);
    		}else{
	    		$news_back=M('active')->where(array('ad_id'=>I('n_id')))->delete();
	    		M('news_content')->where(array('news_content_id'=>I('n_id')))->delete();
	    		$this->success("成功把活动删除，不可还原！",U('news_back',array('p'=>$p)),1);
    		}
    	}


    }

    public function news_back_alldel(){
    	$p = I('p');
    	$ids = I('ad_id','',htmlspecialchars);
    	if(empty($ids)){
    		$this -> error("请选择删除活动");//判断是否选择了活动ID
    	}
    	$model = D('active');
    	if(is_array($ids)){//判断获取活动ID的形式是否数组
    		$where = 'ad_id in('.implode(',',$ids).')';
    		$map = 'news_content_nid in('.implode(',',$ids).')';
    		$check_where= 'ar_activeid in('.implode(',',$ids).')';
    	}else{
    		$where = 'ad_id='.$ids;
    		$map = 'news_content_nid='.$ids;
    		$check_where= 'ar_activeid='.$ids;

    	}
    	$result= M('auth_rule')->where(array('name'=>CONTROLLER_NAME.'/'.ACTION_NAME))->getField('authopen');

    	if (!$result && $_SESSION['aid']!=1){
    	    $arr=M('active')->where($where)->getField('ad_id,ad_author');   //权限
    	    $count=0;
    	    foreach ($arr as $k=>$v){
    	        if ($arr[$k]!=$_SESSION['aid']){
    	            $count++;
    	        }
    	    }
    	    if ($count){
    	        $this->error('只可删除自己的活动',0);
    	    }
    	}
    	$check_register=M('active_register')->where($check_where)->find();

    	if($check_register){
    	    $this->error('该活动已有报名信息，不可删除',0,0);
    	}else {
    	    M('active')->where($where)->delete();
    	   M('news_content')->where($map)->delete();
    	   $this->success("成功把活动删除，不可还原！",U('news_back',array('p'=>$p)),1);
    	}



    }

    public function news_list_alldel(){
    	$p = I('p');
    	$ids = I('ad_id','',htmlspecialchars);
    	if(empty($ids)){
    		$this -> error("请选择删除活动");//判断是否选择了活动ID
    	}

    	$model = D('active');
    	if(is_array($ids)){//判断获取活动ID的形式是否数组
    		$where = 'ad_id in('.implode(',',$ids).')';
    		$count_where = 'ad_id in('.implode(',',$ids).')';
    	}else{
    		$where = 'ad_id='.$ids;
    		$count_where = 'ad_id='.$ids;
    	}
    	$result= M('auth_rule')->where(array('name'=>CONTROLLER_NAME.'/'.ACTION_NAME))->getField('authopen');

    	if (!$result&& $_SESSION['aid']!=1){
    	    $arr=M('active')->where($count_where)->getField('ad_id,ad_author');   //权限
    	    $count=0;
    	    foreach ($arr as $k=>$v){
    	        if ($arr[$k]!=$_SESSION['aid']){
    	            $count++;
    	        }
    	    }
    	    if ($count){
    	        $this->error('无权操作',0);
    	    }
    	}
    	M('active')->where($where)->setField('ad_back',1);//转入回收站
    	$this->success("成功把活动移至回收站！",U('news_list',array('p'=>$p)),1);
    }



	public function news_list_edit(){
		$n_id = I('ad_id','',htmlspecialchars);

		if (empty($n_id)){
			$this->error('参数错误',U('news_list'),0);
		}else{
		    $result= M('auth_rule')->where(array('name'=>CONTROLLER_NAME.'/'.ACTION_NAME))->getField('authopen');
		    $count=M('active')->where(array('ad_author'=>$_SESSION['aid'],'ad_id'=>$n_id))->count();
		    if (!$result && $_SESSION['aid']!=1 &&!$count){
		        $this->error('无权操作',0);
		    }

		    $active=D('active');
		    $where['ad_id']=$n_id;

		    $data=$active->activeshow(null,$where);
		    //返回的是二维数组，由于根据主键查询值唯一，所以始终仅一条数据
		    $data=$data[$n_id];

		    $data['ad_closingtime']=date('Y-m-d H:i:s',$data['ad_closingtime']);
		    $data['ad_starttime']=date('Y-m-d H:i:s',$data['ad_starttime']);
		    $data['ad_stoptime']=date('Y-m-d H:i:s',$data['ad_stoptime']);
            $content_where['news_content_id']=$data['ad_content'];
            $content=M('news_content')->where($content_where)->getField('news_content_body');

		    $diyflag_list=M('diyflag')->select();//活动属性数据

        $this->assign('content',$content);
		$this->assign('diyflag',$diyflag_list);
    	$this->assign('activedata',$data);
			$this->display();
		}
	}
	//判断当前活动是否开启状态情况
	public function news_list_state(){
		$id=I('x');
		$result= M('auth_rule')->where(array('name'=>CONTROLLER_NAME.'/'.ACTION_NAME))->getField('authopen');
		$count=M('active')->where(array('ad_author'=>$_SESSION['aid'],'ad_id'=>$id))->count();
		if (!$result && $_SESSION['aid']!=1 &&!$count){
		    $this->error('无权操作',0);
		}

		$status=M('active')->where(array('ad_id'=>$id))->getField('ad_open');
		if($status==1){
			$statedata = array('ad_open'=>0);
			$auth_group=M('active')->where(array('ad_id'=>$id))->setField($statedata);

			$this->success('状态禁止',1,1);
		}else{
			$statedata = array('ad_open'=>1);
			$auth_group=M('active')->where(array('ad_id'=>$id))->setField($statedata);
			$this->success('状态开启',1,1);
		}
	}



/************************************************课程管理**************************************************/

// 	public function classtype_listadd(){


// 	    //大课程适用人群
// 	    $diyflag=M('diyflag');
// 	    $diyflag=$diyflag->select();
// 	    //大课程个人企业类型
// 	    $diyflag_one=M('diyflag_one');
// 	    $diyflag_one=$diyflag_one->select();

// 	    //大课程初中高类型
// 	    $diyflag_two=M('diyflag_two');
// 	    $diyflag_two=$diyflag_two->select();


// 	    $this->assign('diyflag',$diyflag);
// 	    $this->assign('diyflag_one',$diyflag_one);
// 	    $this->assign('diyflag_two',$diyflag_two);
// 	    $this->display();
// 	}
	//课程列表
	public function class_list(){




	    $keytype=I('keytype','mc_title');
	    $key=I('key');
	    $opentype_time=I('opentype_time','');
	    $class_type=I('class_type','');

	    //查询：时间格式过滤
	    $sldate=I('reservation','');//获取格式 2015-11-12 - 2015-11-18
	    $arr = explode(" - ",$sldate);//转换成数组
	    $arrdateone=strtotime($arr[0]);
	    $arrdatetwo=strtotime($arr[1].' 23:55:55');
	    $result= M('auth_rule')->where(array('name'=>CONTROLLER_NAME.'/'.ACTION_NAME))->getField('authopen');
	    if (!$result && $_SESSION['aid']!=1){
	        $map['mc_author'][]=array('eq',$_SESSION['aid']);
	    }

	    //map架构查询条件数组
	    if ($key){

	        if ($keytype=='mc_author'){  //若是接收的发布人查询
	            $admin_where['admin_username']=array('like',"%".$key."%");
	            $admin=M('admin');
	            $admindata=$admin->where($admin_where)->getField('admin_id',true);
	            $author_string=implode($admindata, ',');
	            $map[$keytype][]=array('in',$author_string);
	        }else{
	            $map[$keytype]= array('like',"%".$key."%");
	        }
	    }

	    if ($opentype_time){
	        $map['mc_valid']= array('eq',$opentype_time);
	    }

	    if ($sldate){
	        $map['mc_starttime'] = array(array('egt',$arrdateone),array('elt',$arrdatetwo),'AND');
	    }

	    if ($class_type){
	        $map[] ="FIND_IN_SET('$class_type',mc_type)";
	    }

	    foreach ($map as $k=>$value){
	        if (empty($value)&&$k!='mc_open'){
	            unset($map[$k]);
	        }
	    }
	    $map['mc_back']=0;
	    $class=D('class');
	    $count= $class->where($map)->count();// 查询满足要求的总记录数

	    $Page= new \Think\Page($count,C('DB_PAGENUM'));// 实例化分页类 传入总记录数和每页显示的记录数
	    $show= $Page->show();// 分页显示输出

	    $limit=$Page->firstRow.','.$Page->listRows;
	    $classdata=$class->classshow($limit,$map);
	    //     	$news=D('active')->where($map)->limit($Page->firstRow.','.$Page->listRows)->order('ad_addtime desc')->select();
	    $class_type_list=M('class_type')->select();//课程数据






	    $this->assign('keytype',$keytype);
	    $this->assign('keyy',$key);
	    $this->assign('sldate',$sldate);
	    $this->assign('opentype_time',$opentype_time);
	    $this->assign('diyflag_check',$class_type);
	    $this->assign('class_type',$class_type_list);
	    $this->assign('classdata',$classdata);
	    $this->assign('page',$show);
	    $this->display();

	}


	public function class_listadd(){

	    $result= M('auth_rule')->where(array('name'=>CONTROLLER_NAME.'/'.ACTION_NAME))->getField('authopen');
	    if (!$result && $_SESSION['aid']!=1){
	        $this->error('无权操作',0);
	    }
	    //课程类型
	    $diyflag_two=M('diyflag_two');
	    $diyflag_two=$diyflag_two->select();
	    //老师
	    $teacher=M('teacher');
	    $teacher=$teacher->select();

	    //义工
	    $map['admin_id']=array('neq',1);
	    $worker=M('admin')->where($map)->select();



	    $this->assign('diyflag_two',$diyflag_two);
	    $this->assign('teacher',$teacher);
	    $this->assign('worker',$worker);
	    $this->display();
	}
	//添加课程文案
	public function class_runadd(){
	    if (!IS_AJAX){
	        $this->error('提交方式不正确',U('class_list'),0);
	    }else {
	        $class=M('class');

	        if (!$class->autoCheckToken($_POST)){
	            $this->error('表单令牌错误',0,0);
	        }else{
	            $result= M('auth_rule')->where(array('name'=>CONTROLLER_NAME.'/'.ACTION_NAME))->getField('authopen');
	            if (!$result && $_SESSION['aid']!=1){
	                $this->error('无权操作',0);
	            }
	            $class=M('class');
	            //单图上传控制
	            //更新状态
	            $nowtime=time();
	            D('class')->updateclass($nowtime);
	            if($pop=$_FILES['pic_one']['name'][0] || $popp=$_FILES['pic_all']['name'][0]){ //images 是你上传的名称
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

	            //获取获取老师集
	            $news_flag=I('news_flag');

	            //义工集
	            $work_flag=I('work_flag');

	            $author=$_SESSION['aid'];//发布人id


	        /*
	         * 生成课程编码
	         */

	            //课程代码开头
	            $typeid=I('member_list_type');
	            if ($typeid){
	                $str1=M('class_type')->where(array('ct_id'=>$typeid))->getField('ct_dm');

	            }else{
	                $this->error('课程文案归属必须选一个',0);
	            }

	            //城市编码
              $city=I('city');
              $city2='市';
              if ($city){
                  if (substr_compare($city, $city2, -strlen($city2)) === 0){
                      $city=mb_substr($city,-1,1);
                  }
                  if($city=='深圳'){
                          $str2='SZ';
                    }else{
                      $pinyin = new \Org\Util\Pinyin;
                      $str2=$pinyin->allFirstString($city);
                    }


              }else{
                  $this->error('隶属城市必须填写',0);
              }


               //年份
               $str3=date('Y',$nowtime);



               //生成序列号
               $codewhere['co_cityname']=array('like','%'.$city.'%');
               $codewhere['co_codenum']=$typeid;
               $maxid=M('class_code')->where($codewhere)->getField('co_num');

               if ($maxid) {

                   $str4=$maxid+1;
                   $result=M('class_code')->where($codewhere)->setInc('co_num');


               }else{
                $str4=1;
              //存储编号
                $code_arr= array('co_cityname' => $city,'co_num'=>$str4,'co_codenum'=>$typeid);
                M('class_code')->add($code_arr);
               }

               $len=strlen($str4);
               if ($len<5){
                 for($i=0;$i<(5-$len);$i++){
                    $str.='0';
                 }
               }
               $str4=$str.$str4;
            //组建序列号
            $idnum=$str1.'-'.$str2.'-'.$str3.'-'.$str4;

            $adress=I('adress');
            $x1 = "%**#".$adress;
            if(strpos($x1,"市") == 0){
                $this->error('地址错误，格式应为：XX市xx区xxxx',0);
            }


	            $sl_data=array(
	                'mc_author'=>$author,
	                'mc_title'=>I('title'),
	                'mc_adress'=>I('adress'), //需要修正
	                'mc_city'=>I('city'),
	                'mc_teacher'=>$news_flag,
	                'mc_worker'=>$work_flag,
	                'mc_person'=>I('ad_name'),
	                'mc_tel'=>I('tel'),
	                'mc_photo'=>$img_url,
	                'mc_maxnum'=>I('maxnum'),
	                'mc_addtime'=>time(),
	                'mc_lastchangetime'=>time(),
	                'mc_changeadmin'=>$author,
                    'mc_idnum'=>$idnum,
	                'mc_closingtime'=>strtotime(I('closingtime')),
	                'mc_starttime'=>strtotime(I('starttime')),
	                'mc_stoptime'=>strtotime(I('stoptime')),
	                'mc_open'=>I('open'),
	                'mc_top'=>I('top'),
	                'mc_say'=>I('say'),
	                'mc_sea'=>I('sea',0),
	                'mc_toptime'=>strtotime("+3 days"),
	                'mc_type'=>$typeid,


	            );


	            //保存并且获取ID
	            if ($class->create($sl_data)){
	                $res=$class->add();
	                if ($res){

	                    $sl_content=array(
	                        'news_content_nid'=>$res,
	                        'news_content_body'=>I('content'),
	                    );
	                    $re=M('news_content')->field('news_content_nid,news_content_body')->add($sl_content);
	                    if ($re){
	                        $class->where(array('mc_id'=>$res))->setField('mc_content',$re);
	                        $this->success('课程文案添加成功,返回列表页',U('class_list'),1);
	                    }else{
	                        $this->error('课程文案添加失败',0);
	                    }
	                }
	            }else{

	                exit($class->getError());
	            }
	        }
	    }
	}

	//修改页面加载
	public function class_list_edit(){
	    $n_id = I('mc_id','',htmlspecialchars);
	    if (empty($n_id)){
	        $this->error('参数错误',U('news_list'),0);
	    }else{
	        $result= M('auth_rule')->where(array('name'=>CONTROLLER_NAME.'/'.ACTION_NAME))->getField('authopen');
	        $count=M('class')->where(array('mc_author'=>$_SESSION['aid'],'mc_id'=>$n_id))->count();
	        if (!$result && $_SESSION['aid']!=1 &&!$count){
	            $this->error('无权操作',0);
	        }

	        $class=D('class');
	        $where['mc_id']=$n_id;

	        $data=$class->classshow(null,$where);
	        //返回的是二维数组，由于根据主键查询值唯一，所以始终仅一条数据
	        $data=$data[$n_id];
	        $data['mc_closingtime']=date('Y-m-d H:i:s',$data['mc_closingtime']);
	        $data['mc_starttime']=date('Y-m-d H:i:s',$data['mc_starttime']);
	        $data['mc_stoptime']=date('Y-m-d H:i:s',$data['mc_stoptime']);
	        $content_where['news_content_id']=$data['mc_content'];
	        $content=M('news_content')->where($content_where)->getField('news_content_body');
	        $class_type=M('class_type')->select();
	        $diyflag=M('diyflag_two')->select();

	        $teacher_list=M('teacher')->select();//课程老师数据
	        $worker_list=M('admin')->where('admin_id!=1')->select();




	        $this->assign('content',$content);
	        $this->assign('teacher',$teacher_list);
	        $this->assign('classdata',$data);
	        $this->assign('worker',$worker_list);
	        $this->assign('class_type',$class_type);
	        $this->assign('diyflag_two',$diyflag);

	        $this->display();
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
            $data['mc_lastchangetime']=date('Y-m-d H:i:s',$data['mc_lastchangetime']);


	        echo  json_encode($data);
	    }


	}


	public function class_runedit(){
	    if (!IS_AJAX){
	        $this->error('提交方式不正确',U('class_list'),0);
	    }else{
	        $class=D('class');
	        if (!$class->autoCheckToken($_POST)){
	            $this->error('表单令牌错误',0,0);
	        }else{

	            //单图上传控制
	            $n_id = I('mc_id','',htmlspecialchars);  //获取课程iD
	            $content_id=I('mc_content','',htmlspecialchars);
	            $where['mc_id']=$n_id;
	            $content_where['news_content_id']=$content_id;
	            //检测权限
	            $result= M('auth_rule')->where(array('name'=>CONTROLLER_NAME.'/'.ACTION_NAME))->getField('authopen');
	            $count=M('class')->where(array('mc_author'=>$_SESSION['aid'],'mc_id'=>$n_id))->count();
	            if (!$result && $_SESSION['aid']!=1 &&!$count){
	                $this->error('无权操作',0);
	            }
	            //更新状态
	            $nowtime=time();
	            $class->updateclass($nowtime);


	            if($pop=$_FILES['pic_one']['name'][0] || $popp=$_FILES['pic_all']['name'][0]){ //images 是你上传的名称
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


	         //获取获取老师集
	            $news_flag=I('news_flag');

	            //义工集
	            $work_flag=I('work_flag');

	            $author=$_SESSION['aid'];//发布人id

	            /*
	             * 生成课程编码
	             */

	            //课程代码开头
	            $typeid=I('member_list_type');
	            if ($typeid){
	                $str1=M('class_type')->where(array('ct_id'=>$typeid))->getField('ct_dm');

	            }else{
	                $this->error('课程文案归属必须选一个',0);
	            }

	            //城市编码
	            $city=I('city');
	            $city2='市';

	            if ($city){
	                if (substr_compare($city, $city2, -strlen($city2)) === 0){
	                    $city=mb_substr($city,-1,1);
	                }
                    if($city=='深圳'){
                          $str2='SZ';
                    }else{
                      $pinyin = new \Org\Util\Pinyin;
                      $str2=$pinyin->allFirstString($city);
                    }



	            }else{
	                $this->error('隶属城市必须填写');
                    }


	            //年份
	            $str3=date('Y',$nowtime);



	            //生成序列号
                //判断隶属城市是否产生变化
                $oldcity=M('class')->where($where)->getField('mc_city');

                if ($oldcity!=I('city')) {

                    $codewhere['co_cityname']=array('like','%'.$city.'%');
                    $codewhere['co_codenum']=$typeid;
                    $maxid=M('class_code')->where($codewhere)->getField('co_num');
                    if ($maxid) {

                        $str4=$maxid+1;
                        M('class_code')->where($codewhere)->setInc('co_num');
                    }else{
                    $str4=1;
                    //存储编号
                    $code_arr= array('co_cityname' => $city,'co_num'=>$str4,'co_codenum'=>$typeid);
                    M('class_code')->add($code_arr);
                         }

                    $len=strlen($str4);
                    if ($len<5){
                        for($i=0;$i<(5-$len);$i++){
                            $str.='0';
                        }
                    }
                    $str4=$str.$str4;
                    //组建序列号
                    $idnum=$str1.'-'.$str2.'-'.$str3.'-'.$str4;

                    M('class')->where($where)->setField('mc_idnum',$idnum);


                }



	            $adress=I('adress');
	            $x1 = "%**#".$adress;
	            if(strpos($x1,"市") == 0){
	                $this->error('地址错误，格式应为：XX市xx区xxxx',0);
	            }

	            $sl_data=array(
	                //'mc_author'=>$author,
	                'mc_title'=>I('title'),
	                'mc_adress'=>I('adress'), //需要修正
	                'mc_city'=>I('city'),
	                'mc_teacher'=>$news_flag,
	                'mc_worker'=>$work_flag,
	                'mc_person'=>I('mc_name'),
	                'mc_tel'=>I('tel'),
	                'mc_maxnum'=>I('maxnum'),
	                'mc_lastchangetime'=>time(),
	                'mc_changeadmin'=>$author,
	                'mc_closingtime'=>strtotime(I('closingtime')),
	                'mc_starttime'=>strtotime(I('starttime')),
	                'mc_stoptime'=>strtotime(I('stoptime')),
	                'mc_open'=>I('open'),
	                'mc_top'=>I('top'),
	                'mc_say'=>I('say'),
	                'mc_sea'=>I('sea',0),
	                'mc_toptime'=>strtotime("+3 days"),
	                'mc_type'=>$typeid,


	            );
	            if ($img_url){
	                $sl_data['mc_photo']=$img_url;
	            }
	            $res=$class->where($where)->save($sl_data);



	            $sl_content=array(
	                'news_content_nid'=>$n_id,
	                'news_content_body'=>I('content'),
	            );
	            M('news_content')->where($content_where)->save($sl_content);
	            $this->success('课程修改成功,返回列表页',U('class_list'),1);




	        }
	    }

	}
	//判断当前课程是否开启状态情况
	public function class_list_state(){
	    $id=I('x');
	    $result= M('auth_rule')->where(array('name'=>CONTROLLER_NAME.'/'.ACTION_NAME))->getField('authopen');
	    $count=M('class')->where(array('mc_author'=>$_SESSION['aid'],'mc_id'=>$id))->count();
	    if (!$result && $_SESSION['aid']!=1 &&!$count){
	        $this->error('无权操作',0);
	    }

	    $status=M('class')->where(array('mc_id'=>$id))->getField('mc_open');
	    if($status==1){
	        $statedata = array('mc_open'=>0);
	        $auth_group=M('class')->where(array('mc_id'=>$id))->setField($statedata);

	        $this->success('状态禁止',1,1);
	    }else{
	        $statedata = array('mc_open'=>1);
	        $auth_group=M('class')->where(array('mc_id'=>$id))->setField($statedata);
	        $this->success('状态开启',1,1);
	    }
	}


	public function class_back_del(){
	    $p=I('p');

	    $check_nid=M('class')->where(array('mc_id'=>I('mc_id')))->find();
	    if (empty($check_nid)){
	        $this->error('参数不正确',0,0);
	    }else {

	        $check_admin_nid=M('class')->where(array('mc_id'=>I('mc_id'),'mc_author'=>$_SESSION['aid']))->find();
	        $check_register=M('class_register')->where(array('cr_classid'=>I('mc_id')))->find();

	        if (empty($check_admin_nid) && $_SESSION['aid']!=1 ){
	            $this->error('你没有删除该课程权限',0,0);
	        }elseif($check_register){
	            $this->error('该课程下已有报名信息不可删除',0,0);
	        }else{
	            $news_back=M('class')->where(array('mc_id'=>I('mc_id')))->delete();
	            M('news_content')->where(array('news_content_nid'=>I('mc_id')))->delete();
	            $this->success("成功把课程删除，不可还原！",U('class_back',array('p'=>$p)),1);
	        }
	    }


	}

	public function class_back_alldel(){
	    $p = I('p');
	    $ids = I('mc_id','',htmlspecialchars);
	    if(empty($ids)){
	        $this -> error("请选择删除课程");//判断是否选择了课程ID
	    }
	    $model = D('class');
	    if(is_array($ids)){//判断获取课程ID的形式是否数组
	        $where = 'mc_id in('.implode(',',$ids).')';
	        $map = 'news_content_nid in('.implode(',',$ids).')';
	        $check_where='cr_classid in('.implode(',',$ids).')';
	    }else{
	        $where = 'mc_id='.$ids;
	        $map = 'news_content_nid='.$ids;
	        $check_where='cr_classid='.$ids;
	    }


	    $result= M('auth_rule')->where(array('name'=>CONTROLLER_NAME.'/'.ACTION_NAME))->getField('authopen');

	    if (!$result&& $_SESSION['aid']!=1){
	        $arr=M('class')->where($where)->getField('mc_id,mc_author');   //权限
	        $count=0;
	        foreach ($arr as $k=>$v){
	            if ($arr[$k]!=$_SESSION['aid']){
	                $count++;
	            }
	        }
	        if ($count){
	            $this->error('只可删除自己的课程',0);
	        }
	    }
	    $check_register=M('class_register')->where($check_where)->find();
	    if($check_register){
	        $this->error('该课程下已有报名信息,不可删除',0,0);
	    }else{
	        M('class')->where($where)->delete();
	    M('news_content')->where($map)->delete();
	    $this->success("成功把课程删除，不可还原！",U('class_back',array('p'=>$p)),1);
	    }

	}

	public function class_list_alldel(){
	    $p = I('p');
	    $ids = I('mc_id','',htmlspecialchars);
	    if(empty($ids)){
	        $this -> error("请选择删除课程");//判断是否选择了课程ID
	    }

	    $model = D('class');
	    if(is_array($ids)){//判断获取课程ID的形式是否数组
	        $where = 'mc_id in('.implode(',',$ids).')';
	        $count_where='mc_id in('.implode(',',$ids).')';
	    }else{
	        $where = 'mc_id='.$ids;
	        $count_where = 'mc_id='.$ids;
	    }
	    $result= M('auth_rule')->where(array('name'=>CONTROLLER_NAME.'/'.ACTION_NAME))->getField('authopen');

   if (!$result&& $_SESSION['aid']!=1){
	    $arr=M('class')->where($count_where)->getField('mc_id,mc_author');   //权限
	    $count=0;
	    foreach ($arr as $k=>$v){
          if ($arr[$k]!=$_SESSION['aid']){
              $count++;
          }
	    }
	    if ($count){
	        $this->error('无权操作',0);
	    }
   }

	    M('class')->where($where)->setField('mc_back',1);//转入回收站
	    $this->success("成功把课程移至回收站！",U('class_list',array('p'=>$p)),1);
	}
	public function class_list_del(){
	    $p=I('p');
	    $n_id=I('mc_id');
	    $check_nid=M('class')->where(array('mc_id'=>I('mc_id')))->find();
	    if (empty($check_nid)){
	        $this->error('参数不正确',0,0);
	    }else {

	        $result= M('auth_rule')->where(array('name'=>CONTROLLER_NAME.'/'.ACTION_NAME))->getField('authopen');
	        $count=M('class')->where(array('mc_author'=>$_SESSION['aid'],'mc_id'=>$id))->count();
	        if (!$result && $_SESSION['aid']!=1 &&!$count){
	            $this->error('无权操作',0);
	        }

	        $check_admin_nid=M('class')->where(array('mc_id'=>I('mc_id'),'mc_author'=>$_SESSION['aid']))->find();
	        if (empty($check_admin_nid) && $_SESSION['aid']!=1){
	            $this->error('你没有删除该课程权限',0,0);
	        }else {
	            M('class')->where(array('mc_id'=>I('mc_id')))->setField('mc_back',1);//转入回收站
	            $this->redirect('class_list', array('p' => $p));
	        }
	    }
	}

	public function class_back_open(){
	    $p=I('p');
	    $n_id=I('n_id');
	    $check_nid=M('class')->where(array('ad_id'=>$n_id))->find();
	    if (empty($check_nid)){
	        $this->error('参数不正确',0,0);
	    }else {
	        $check_admin_nid=M('class')->where(array('mc_id'=>$n_id,'mc_author'=>$_SESSION['aid']))->find();
	        if (empty($check_admin_nid) && $_SESSION['aid']!=1){
	            $this->error('你没有还原该课程权限',0,0);
	        }else {
	            M('class')->where(array('mc_id'=>I('n_id')))->setField('mc_back',0);//转出回收站
	            $this->redirect('class_back', array('p' => $p));
	        }
	    }


	}


	//回收站
	public function class_back(){


	    $keytype=I('keytype','mc_title');
	    $key=I('key');
	    $opentype_time=I('opentype_time','');
	    $class_type=I('class_type','');

	    //查询：时间格式过滤
	    $sldate=I('reservation','');//获取格式 2015-11-12 - 2015-11-18
	    $arr = explode(" - ",$sldate);//转换成数组
	    $arrdateone=strtotime($arr[0]);
	    $arrdatetwo=strtotime($arr[1].' 23:55:55');

	    $result= M('auth_rule')->where(array('name'=>CONTROLLER_NAME.'/'.ACTION_NAME))->getField('authopen');
	    if (!$result && $_SESSION['aid']!=1){
	        $map['mc_author'][]=array('eq',$_SESSION['aid']);
	    }

	    //map架构查询条件数组
	    if ($key){

	        if ($keytype=='mc_author'){  //若是接收的发布人查询
	            $admin_where['admin_username']=array('like',"%".$key."%");
	            $admin=M('admin');
	            $admindata=$admin->where($admin_where)->getField('admin_id',true);
	            $author_string=implode($admindata, ',');
	            $map[$keytype][]=array('in',$author_string);
	        }else{
	            $map[$keytype]= array('like',"%".$key."%");
	        }
	    }

	    if ($opentype_time){
	        $map['mc_valid']= array('eq',$opentype_time);
	    }

	    if ($sldate){
	        $map['mc_starttime'] = array(array('egt',$arrdateone),array('elt',$arrdatetwo),'AND');
	    }

	    if ($class_type){
	        $map[] ="FIND_IN_SET('$class_type',mc_type)";
	    }

	    foreach ($map as $k=>$value){
	        if (empty($value)&&$k!='mc_open'){
	            unset($map[$k]);
	        }
	    }
	    $map['mc_back']=1;
	    $class=D('class');
	    $count= $class->where($map)->count();// 查询满足要求的总记录数

	    $Page= new \Think\Page($count,C('DB_PAGENUM'));// 实例化分页类 传入总记录数和每页显示的记录数
	    $show= $Page->show();// 分页显示输出
	    $limit=$Page->firstRow.','.$Page->listRows;
	    $classdata=$class->classshow($limit,$map);
	    //     	$news=D('class')->where($map)->limit($Page->firstRow.','.$Page->listRows)->order('ad_addtime desc')->select();
	    $class_type_list=M('class_type')->select();//课程数据







	    $this->assign('keytype',$keytype);
	    $this->assign('keyy',$key);
	    $this->assign('sldate',$sldate);
	    $this->assign('opentype_time',$opentype_time);
	    $this->assign('diyflag_check',$class_type);
	    $this->assign('class_type',$class_type_list);
	    $this->assign('classdata',$classdata);
	    $this->assign('page',$show);
	    $this->display();

	}



	/************************************************知识管理**************************************************/
	//知识列表
	public function knows_list(){




	    $keytype=I('keytype','ms_title');
	    $key=I('key');


	    //查询：时间格式过滤
	    $sldate=I('reservation','');//获取格式 2015-11-12 - 2015-11-18
	    $arr = explode(" - ",$sldate);//转换成数组
	    $arrdateone=strtotime($arr[0]);
	    $arrdatetwo=strtotime($arr[1].' 23:55:55');
	    $result= M('auth_rule')->where(array('name'=>CONTROLLER_NAME.'/'.ACTION_NAME))->getField('authopen');
	    if (!$result && $_SESSION['aid']!=1){
	        $map['ms_author'][]=array('eq',$_SESSION['aid']);
	    }


	    //map架构查询条件数组
	    if ($key){

	        if ($keytype=='ms_author'){  //若是接收的发布人查询
	            $admin_where['admin_username']=array('like',"%".$key."%");
	            $admin=M('admin');
	            $admindata=$admin->where($admin_where)->getField('admin_id',true);
	            $author_string=implode($admindata, ',');
	            $map[$keytype][]=array('in',$author_string);
	        }else{
	            $map[$keytype]= array('like',"%".$key."%");
	        }
	    }

	    if ($sldate){
	        $map['ms_addtime'] = array(array('egt',$arrdateone),array('elt',$arrdatetwo),'AND');
	    }

	    foreach ($map as $k=>$value){
	        if (empty($value)){
	            unset($map[$k]);
	        }
	    }
	    $map['ms_back']=0;
	    $knows=D('knows');
	    $count= $knows->where($map)->count();// 查询满足要求的总记录数

	    $Page= new \Think\Page($count,C('DB_PAGENUM'));// 实例化分页类 传入总记录数和每页显示的记录数
	    $show= $Page->show();// 分页显示输出
	    $limit=$Page->firstRow.','.$Page->listRows;
	    $knowsdata=$knows->knowsshow($limit,$map);
	    //     	$news=D('class')->where($map)->limit($Page->firstRow.','.$Page->listRows)->order('ms_addtime desc')->select();




	    $this->assign('keytype',$keytype);
	    $this->assign('keyy',$key);
	    $this->assign('sldate',$sldate);
	    $this->assign('knowsdata',$knowsdata);
	    $this->assign('page',$show);
	    $this->display();

	}


	//根据获取的ID来查询知识数据


	public function knowsById(){


	    $id=$_GET['id'];
	    if($id){
	        $knows=D('knows');
	        $where['ms_id']=$id;

	        $data=$knows->knowsshow(null,$where);
	        //返回的是二维数组，由于根据主键查询值唯一，所以始终仅一条数据

	        $data=$data[$id];




	        $data['ms_addtime']=date('Y-m-d H:i:s',$data['ms_addtime']);


	        echo  json_encode($data);
	    }



	}




	public function knows_listadd(){


	    $result= M('auth_rule')->where(array('name'=>CONTROLLER_NAME.'/'.ACTION_NAME))->getField('authopen');
	    if (!$result && $_SESSION['aid']!=1){
	        $this->error('无权操作',0);
	    }


	    $this->display();
	}
	//添加知识
	public function knows_runadd(){
	    if (!IS_AJAX){
	        $this->error('提交方式不正确',U('knows_list'),0);
	    }else {
	        $knows=M('knows');

	        if (!$knows->autoCheckToken($_POST)){
	            $this->error('表单令牌错误',0,0);
	        }else{
	            $result= M('auth_rule')->where(array('name'=>CONTROLLER_NAME.'/'.ACTION_NAME))->getField('authopen');
	            if (!$result && $_SESSION['aid']!=1){
	                $this->error('无权操作',0);
	            }

	            //单图上传控制
	            //更新状态
	            $nowtime=time();
	            D('knows')->updateknows($nowtime);
	            if($pop=$_FILES['pic_one']['name'][0] || $popp=$_FILES['pic_all']['name'][0]){ //images 是你上传的名称
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


	            $author=$_SESSION['aid'];//发布人id



	            $sl_data=array(
	                'ms_author'=>$author,
	                'ms_title'=>I('title'),


	                'ms_photo'=>$img_url,

	                'ms_addtime'=>time(),
	                'ms_lastchangetime'=>date('Y-m-d H-i-s'),
	                'ms_changeadmin'=>$author,

	                'ms_open'=>I('open'),
	                'ms_top'=>I('top'),
	                'ms_say'=>I('say'),
	                'ms_toptime'=>strtotime("+3 days"),
	                'ms_content'=>I('content'),


	            );


	            //保存并且获取ID

	            if ($knows->create($sl_data)){
	                $res=$knows->add();
	                if ($res){



	                        $this->success('知识添加成功,返回列表页',U('knows_list'),1);

	                }else{
	                        $this->error('知识内容添加失败',1);
	                    }
	            }else{

	                exit($knows->getError());
	            }
	        }
	    }
	}


	public function knows_runedit(){
	    if (!IS_AJAX){
	        $this->error('提交方式不正确',U('knows_list'),0);
	    }else{
	        $class=M('knows');
	        if (!$class->autoCheckToken($_POST)){
	            $this->error('表单令牌错误',0,0);
	        }else{

	            //单图上传控制
	            $n_id = I('ms_id','',htmlspecialchars);  //获取知识iD
	            $result= M('auth_rule')->where(array('name'=>CONTROLLER_NAME.'/'.ACTION_NAME))->getField('authopen');
	            $count=M('knows')->where(array('ms_author'=>$_SESSION['aid'],'ms_id'=>$n_id))->count();
	            if (!$result && $_SESSION['aid']!=1 &&!$count){
	                $this->error('无权操作',0);
	            }


	            $where['ms_id']=$n_id;


	            //更新状态
	            $nowtime=time();
	            D('knows')->updateknows($nowtime);


	            if($pop=$_FILES['pic_one']['name'][0] || $popp=$_FILES['pic_all']['name'][0]){ //images 是你上传的名称
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


	            $author=$_SESSION['aid'];//发布人id


	            $sl_data=array(
	                 'ms_author'=>$author,
	                'ms_title'=>I('title'),



	                'ms_lastchangetime'=>date('Y-m-d H-i-s'),
	                'ms_changeadmin'=>$author,

	                'ms_open'=>I('open'),
	                'ms_top'=>I('top'),
	                'ms_say'=>I('say'),
	                'ms_toptime'=>strtotime("+3 days"),
	                'ms_content'=>I('content'),


	            );
	            if ($img_url){
	                $sl_data['ms_photo']=$img_url;
	            }
	            $res=$class->where($where)->save($sl_data);


	            $this->success('知识修改成功,返回列表页',U('knows_list'),1);




	        }
	    }

	}

	public function knows_list_del(){
	    $p=I('p');
	    $check_nid=M('knows')->where(array('ms_id'=>I('ms_id')))->find();
	    if (empty($check_nid)){
	        $this->error('参数不正确',0,0);
	    }else {
	        $check_admin_nid=M('knows')->where(array('ms_id'=>I('ms_id'),'ms_author'=>$_SESSION['aid']))->find();
	        if (empty($check_admin_nid) && $_SESSION['aid']!=1){
	            $this->error('你没有删除该知识权限',0,0);
	        }else {
	            M('knows')->where(array('ms_id'=>I('ms_id')))->setField('ms_back',1);//转入回收站
	            $this->redirect('knows_list', array('p' => $p));
	        }
	    }
	}

	public function knows_back_open(){
	    $p=I('p');
	    $n_id=I('n_id');
	    $check_nid=M('knows')->where(array('ms_id'=>$n_id))->find();
	    if (empty($check_nid)){
	        $this->error('参数不正确',0,0);
	    }else {
	        $check_admin_nid=M('knows')->where(array('ms_id'=>$n_id,'ms_author'=>$_SESSION['aid']))->find();
	        if (empty($check_admin_nid) && $_SESSION['aid']!=1){
	            $this->error('你没有还原该知识权限',0,0);
	        }else {
	            M('knows')->where(array('ms_id'=>I('n_id')))->setField('ms_back',0);//转出回收站
	            $this->redirect('knows_back', array('p' => $p));
	        }
	    }

	}

	//回收站
	public function knows_back(){



	    $keytype=I('keytype','ms_title');
	    $key=I('key');


	    //查询：时间格式过滤
	    $sldate=I('reservation','');//获取格式 2015-11-12 - 2015-11-18
	    $arr = explode(" - ",$sldate);//转换成数组
	    $arrdateone=strtotime($arr[0]);
	    $arrdatetwo=strtotime($arr[1].' 23:55:55');

	    $result= M('auth_rule')->where(array('name'=>CONTROLLER_NAME.'/'.ACTION_NAME))->getField('authopen');
	  if (!$result && $_SESSION['aid']!=1){
	        $map['ms_author'][]=array('eq',$_SESSION['aid']);
	    }


	    //map架构查询条件数组
	    if ($key){

	        if ($keytype=='ms_author'){  //若是接收的发布人查询
	            $admin_where['admin_username']=array('like',"%".$key."%");
	            $admin=M('admin');
	            $admindata=$admin->where($admin_where)->getField('admin_id',true);
	            $author_string=implode($admindata, ',');
	            $map[$keytype][]=array('in',$author_string);
	        }else{
	            $map[$keytype]= array('like',"%".$key."%");
	        }
	    }
	    if ($sldate){
	        $map['ms_addtime'] = array(array('egt',$arrdateone),array('elt',$arrdatetwo),'AND');
	    }



	    foreach ($map as $k=>$value){
	        if (empty($value)){
	            unset($map[$k]);
	        }
	    }
	    $map['ms_back']=1;
	    $knows=D('knows');
	    $count= $knows->where($map)->count();// 查询满足要求的总记录数

	    $Page= new \Think\Page($count,C('DB_PAGENUM'));// 实例化分页类 传入总记录数和每页显示的记录数
	    $show= $Page->show();// 分页显示输出
	    $limit=$Page->firstRow.','.$Page->listRows;
	    $knowsdata=$knows->knowsshow($limit,$map);
	    //     	$news=D('active')->where($map)->limit($Page->firstRow.','.$Page->listRows)->order('ms_addtime desc')->select();




	    $this->assign('keytype',$keytype);
	    $this->assign('keyy',$key);
	    $this->assign('sldate',$sldate);
	    $this->assign('diyflag_check',$diyflag);

	    $this->assign('knowsdata',$knowsdata);
	    $this->assign('page',$show);
	    $this->display();


	}

	public function knows_back_del(){
	    $p=I('p');
	    $check_nid=M('knows')->where(array('ms_id'=>I('ms_id')))->find();
	    if (empty($check_nid)){
	        $this->error('参数不正确',0,0);
	    }else {
	        $check_admin_nid=M('knows')->where(array('ms_id'=>I('ms_id'),'ms_author'=>$_SESSION['aid']))->find();
	        if (empty($check_admin_nid) && $_SESSION['aid']!=1){
	            $this->error('你没有删除该知识权限',0,0);
	        }else {
	            $knows_back=M('knows')->where(array('ms_id'=>I('ms_id')))->delete();
	            $this->redirect('knows_back', array('p' => $p));
	        }
	    }


	}

	public function knows_back_alldel(){
	    $p = I('p');
	    $ids = I('ms_id','',htmlspecialchars);
	    if(empty($ids)){
	        $this -> error("请选择删除知识");//判断是否选择了知识ID
	    }
	    $model = D('knows');
	    if(is_array($ids)){//判断获取知识ID的形式是否数组
	        $where = 'ms_id in('.implode(',',$ids).')';

	    }else{
	        $where = 'ms_id='.$ids;

	    }

	    M('knows')->where($where)->delete();

	    $this->success("成功把知识删除，不可还原！",U('knows_back',array('p'=>$p)),1);
	}

	public function knows_list_alldel(){
	    $p = I('p');
	    $ids = I('ms_id','',htmlspecialchars);
	    if(empty($ids)){
	        $this -> error("请选择删除知识");//判断是否选择了知识ID
	    }
	    $model = D('knows');
	    if(is_array($ids)){//判断获取知识ID的形式是否数组
	        $where = 'ms_id in('.implode(',',$ids).')';
	        $count_where = 'ms_id in('.implode(',',$ids).')';
	    }else{
	        $where = 'ms_id='.$ids;
	        $count_where = 'ms_id='.$ids;
	    }
	    $result= M('auth_rule')->where(array('name'=>CONTROLLER_NAME.'/'.ACTION_NAME))->getField('authopen');

	    if (!$result&& $_SESSION['aid']!=1){
	        $arr=M('knows')->where($count_where)->getField('ms_id,ms_author');   //权限
	        $count=0;
	        foreach ($arr as $k=>$v){
	            if ($arr[$k]!=$_SESSION['aid']){
	                $count++;
	            }
	        }
	        if ($count){
	            $this->error('无权操作',0);
	        }
	    }
	    M('knows')->where($where)->setField('ms_back',1);//转入回收站
	    $this->success("成功把知识移至回收站！",U('knows_list',array('p'=>$p)),1);
	}



	public function knows_list_edit(){
	    $n_id = I('ms_id','',htmlspecialchars);
	    if (empty($n_id)){
	        $this->error('参数错误',U('knows_list'),0);
	    }else{
	        $result= M('auth_rule')->where(array('name'=>CONTROLLER_NAME.'/'.ACTION_NAME))->getField('authopen');
	        $count=M('knows')->where(array('ms_author'=>$_SESSION['aid'],'ms_id'=>$n_id))->count();
	        if (!$result && $_SESSION['aid']!=1 &&!$count){
	            $this->error('无权操作',0);
	        }

	        $knows=D('knows');
	        $where['ms_id']=$n_id;

	        $data=$knows->knowsshow(null,$where);
	        //返回的是二维数组，由于根据主键查询值唯一，所以始终仅一条数据
	        $data=$data[$n_id];




	        $this->assign('knowsdata',$data);
	        $this->display();
	    }
	}
	//判断当前知识是否开启状态情况
	public function knows_list_state(){
	    $id=I('x');
	    $result= M('auth_rule')->where(array('name'=>CONTROLLER_NAME.'/'.ACTION_NAME))->getField('authopen');
	    $count=M('knows')->where(array('ms_author'=>$_SESSION['aid'],'ms_id'=>$id))->count();
	    if (!$result && $_SESSION['aid']!=1 &&!$count){
	        $this->error('无权操作',0);
	    }
	    $status=M('knows')->where(array('ms_id'=>$id))->getField('ms_open');
	    if($status==1){
	        $statedata = array('ms_open'=>0);
	        $auth_group=M('knows')->where(array('ms_id'=>$id))->setField($statedata);

	        $this->success('状态禁止',1,1);
	    }else{
	        $statedata = array('ms_open'=>1);
	        $auth_group=M('knows')->where(array('ms_id'=>$id))->setField($statedata);
	        $this->success('状态开启',1,1);
	    }
	}




/*
 * *****************************************报名管理**********************************************
                                                                                              */


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
    $keytype=I('keytype','ar_name');
    $key=I('key');
    $request=I('register_id');

    if ($id){
        $map['ar_activeid']=$id;
    }elseif($request){
        $map['ar_activeid']=$request;
    }

    //map架构查询条件数组
    if ($key){


        if ($keytype=='ar_author'){  //若是接收的用户名查询
            $map['member_list_username']=array('eq',$key);

        }
        if ($keytype=='ar_name'){
            $map[$keytype]= array('like',"%".$key."%");
        }
    }


    foreach ($map as $k=>$value){
        if (empty($value)){
            unset($map[$k]);
        }
    }


        $register=D('Register');
        $count= $register->where($map)->count();// 查询满足要求的总记录数

        $Page= new \Think\Page($count,C('DB_PAGENUM'));// 实例化分页类 传入总记录数和每页显示的记录数
        $show= $Page->show();// 分页显示输出
        $limit=$Page->firstRow.','.$Page->listRows;


        $data=$register->registershow($limit,$map);






    $this->assign('page',$show);
    $this->assign('keytype',$keytype);
    $this->assign('keyy',$key);
    $this->assign('register',$data);
    $this->display();

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



//报名表修改界面

public function active_register_listedit(){
    $ar_id = I('ar_id','',htmlspecialchars);  //获取报名iD
    $where['ar_id']=$ar_id;
    $register=D('Register');
    //权限测试
    $result= M('auth_rule')->where(array('name'=>CONTROLLER_NAME.'/'.ACTION_NAME))->getField('authopen');
    if (!$result&& $_SESSION['aid']!=1){
        $author=M('active_register')->table('__ACTIVE_REGISTER__ cr')->join('__ACTIVE__ c on cr.ar_activeid=c.ad_id')->where($where)->getField('ad_author');
        if ($author!=$_SESSION['aid']){
            $this->error('只能修改自己活动下的报名信息',0);
        }
    }

    $data=$register->registershow(null,$where);




    $this->assign('ac_re',$data[$ar_id]);
    $this->display();




}


//报名表修改



public function active_register_runedit(){
    if (!IS_AJAX){
        $this->error('提交方式不正确',U('active_register_list'),0);
    }else{
        $active=M('active_register');
        if (!$active->autoCheckToken($_POST)){
            $this->error('表单令牌错误',0,0);
        }else{


            $n_id = I('ar_id','',htmlspecialchars);  //获取报名iD
            $ad_id = I('ad_id','',htmlspecialchars);  //获取报名活动iD
            $where['ar_id']=$n_id;

            $result= M('auth_rule')->where(array('name'=>CONTROLLER_NAME.'/'.ACTION_NAME))->getField('authopen');
            if (!$result&& $_SESSION['aid']!=1){
                $author=M('active')->where(array('ad_id'=>$ad_id))->getField('ad_author');
                if ($author!=$_SESSION['aid']){
                    $this->error('只能修改自己活动下的报名信息',0,0);
                }
            }


            $sl_data=array(
            'ar_name'=>I('name'),
            'ar_tel'=>I('tel'),
            'ar_birthday'=>I('birthday'),
            'ar_sex'=>I('sex'),
            'ar_more'=>I('more'),
            'ar_open'=>I('open'),
            'ar_email'=>I('email'),
            'ar_addtime'=>date('Y-m-d H-i-s',time()),
            'ar_say'=>I('say'),


            );

           $open=M('active_register')->where($where)->getField('ar_open');
           //判断open是否发生变化
           if($open!=I('open')){
               if (I('open')){
                   $num=M('active')->where(array('ad_id'=>$ad_id))->getField('ad_num');
                   $maxnum=M('active')->where(array('ad_id'=>$ad_id))->getField('ad_maxnum');
                   if ($maxnum>$num||$maxnum==0){
                   M('active')->where(array('ad_id'=>$ad_id))->setInc('ad_num');
                   }else{
                       $this->error('报名人数已达上限',0);
                   }
               }else{
                   M('active')->where(array('ad_id'=>$ad_id))->setDec('ad_num');
               }
           }


            $res=$active->where($where)->save($sl_data);




            $this->success('报名表修改成功,返回列表页',U('active_register_list',array('ad_id'=>$ad_id)),1);




        }
    }


}

//报名表删除
public function active_register_del(){
    $p=I('p');
    $ad_id = I('ad_id');
    $ar_id=I('ar_id');
    $check_nid=M('active_register')->where(array('ar_id'=>$ar_id))->find();
    if (empty($check_nid)){
        $this->error('参数不正确',0,0);
    }else {
    //权限检测
        $result= M('auth_rule')->where(array('name'=>CONTROLLER_NAME.'/'.ACTION_NAME))->getField('authopen');
        if (!$result&& $_SESSION['aid']!=1){
         $author=M('active')->where(array('ad_id'=>$ad_id))->getField('ad_author');
            if ($author!=$_SESSION['aid']){
                $this->error('只能删除自己活动下的报名信息',0,0);
            }
        }else {
            //判断当前表状态
            $open=M('active_register')->where(array('ar_id'=>$ar_id))->getField('ar_open');
            if ($open){
                M('active')->where(array('ad_id'=>$ad_id))->setDec('ad_num');
            }
            $knows_back=M('active_register')->where(array('ar_id'=>$ar_id))->delete();
            $this->redirect('active_register_list', array('p' => $p,'ad_id'=>$ad_id));
        }
    }


}

public function active_register_alldel(){
    $p = I('p');
    $ad_id = I('alldel_id');
    $ids = I('ar_id','',htmlspecialchars);
    if(empty($ids)){
        $this -> error("请选择删除报名");//判断是否选择了报名ID
    }
    $model = D('active_register');
    if(is_array($ids)){//判断获取知识ID的形式是否数组

        $where = 'ar_id in('.implode(',',$ids).')';

    }else{
        $where = 'ar_id='.$ids;


    }

    $result= M('auth_rule')->where(array('name'=>CONTROLLER_NAME.'/'.ACTION_NAME))->getField('authopen');

    if (!$result&& $_SESSION['aid']!=1){
        $arr=M('active_register')->table('__ACTIVE_REGISTER__ cr')->join('__ACTIVE__ c on cr.ar_activeid=c.ad_id')->where($where)->getField('ad_id,ad_author');
        $count=0;
        foreach ($arr as $k=>$v){
            if ($arr[$k]!=$_SESSION['aid']){
                $count++;
            }
        }
        if ($count){
            $this->error('只可删除自己活动下的报名信息',0);
        }
    }else{
        //判断当前表状态
        $open=M('active_register')->where($where)->field('ar_open')->select();

        $count=0;
        foreach ($open as $k=>$v){
            if ($open[$k]['ar_open']){
               $count++;
            }

        }

        M('active')->where(array('ad_id'=>$ad_id))->setDec('ad_num',$count);
        M('active_register')->where($where)->delete();

        $this->success("成功删除，不可还原！",U('active_register_list',array('p'=>$p,'ad_id'=>$ad_id)),1);

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

    $keytype=I('keytype','ar_name');
    $key=I('key');
    $request=I('register_id');

    if ($id){
        $map['cr_classid']=$id;
    }elseif($request){
        $map['cr_classid']=$request;
    }

    //map架构查询条件数组
    if ($key){


        if ($keytype=='ar_author'){  //若是接收的用户名查询
            $map['member_list_username']=array('eq',$key);

        }
        if ($keytype=='ar_name'){
            $map['cr_name']= array('like',"%".$key."%");
        }
    }


    foreach ($map as $k=>$value){
        if (empty($value)){
            unset($map[$k]);
        }
    }


    $register=D('Clregister');
    $count= $register->where($map)->count();// 查询满足要求的总记录数

    $Page= new \Think\Page($count,C('DB_PAGENUM'));// 实例化分页类 传入总记录数和每页显示的记录数
    $show= $Page->show();// 分页显示输出
    $limit=$Page->firstRow.','.$Page->listRows;



    $data=$register->registershow($limit,$map);






    $this->assign('page',$show);
    $this->assign('keytype',$keytype);
    $this->assign('keyy',$key);
    $this->assign('register',$data);
    $this->display();

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



//课程报名表修改界面

public function class_register_listedit(){
    $ar_id = I('cr_id','',htmlspecialchars);  //获取报名iD
    $where['cr_id']=$ar_id;
    $register=D('Clregister');

    $result= M('auth_rule')->where(array('name'=>CONTROLLER_NAME.'/'.ACTION_NAME))->getField('authopen');
    if (!$result&& $_SESSION['aid']!=1){
    $author=M('class_register')->table('__CLASS_REGISTER__ cr')->join('__CLASS__ c on cr.cr_classid=c.mc_id')->where($where)->getField('mc_author');
    if ($author!=$_SESSION['aid']){
        $this->error('只能修改自己课程下的报名信息',0);
    }
    }
    $data=$register->registershow(null,$where);




    $this->assign('ac_re',$data[$ar_id]);
    $this->display();




}


//报名表修改



public function class_register_runedit(){
    if (!IS_AJAX){
        $this->error('提交方式不正确',U('class_register_list'),0);
    }else{
        $active=M('class_register');
        if (!$active->autoCheckToken($_POST)){
            $this->error('表单令牌错误',0,0);
        }else{


            $n_id = I('cr_id','',htmlspecialchars);  //获取报名iD
            $mc_id = I('mc_id','',htmlspecialchars);  //获取报名iD
            $where['cr_id']=$n_id;

        $result= M('auth_rule')->where(array('name'=>CONTROLLER_NAME.'/'.ACTION_NAME))->getField('authopen');
        if (!$result&& $_SESSION['aid']!=1){
         $author=M('class')->where(array('mc_id'=>$mc_id))->getField('mc_author');
            if ($author!=$_SESSION['aid']){
                $this->error('只能修改自己课程下的报名信息',0,0);
            }
        }


            $sl_data=array(
                'cr_name'=>I('name'),
                'cr_tel'=>I('tel'),
                'cr_birthday'=>I('birthday'),
                'cr_sex'=>I('sex'),
                'cr_more'=>I('more'),
                'cr_open'=>I('open'),
                'cr_email'=>I('email'),
                'cr_country'=>I('country'),
                'cr_address'=>I('address'),
                'cr_health'=>I('health'),
                'cr_drug'=>I('drug'),
                'cr_hometype'=>I('home'),
                'cr_addtime'=>date('Y-m-d H-i-s',time())


            );

            $open=M('class_register')->where($where)->getField('cr_open');
            //判断open是否发生变化
            if($open!=I('open')){
                if (I('open')){
                    $num=M('class')->where(array('mc_id'=>$mc_id))->getField('mc_num');
                    $maxnum=M('class')->where(array('mc_id'=>$mc_id))->getField('mc_maxnum');
                    if ($maxnum>$num||$maxnum==0){
                        M('class')->where(array('mc_id'=>$mc_id))->setInc('mc_num');
                    }else{
                        $this->error('报名人数已达上限',0);
                    }
                }else{
                    M('class')->where(array('mc_id'=>$ad_id))->setDec('mc_num');
                }
            }
            $res=$active->where($where)->save($sl_data);




            $this->success('报名表修改成功,返回列表页',U('class_register_list',array('mc_id'=>$mc_id)),1);




        }
    }


}

//报名表删除
public function class_register_del(){
    $p=I('p');
    $n_id=I('cr_id');
    $ad_id=I('mc_id');
    $check_nid=M('class_register')->where(array('cr_id'=>I('cr_id')))->find();
    if (empty($check_nid)){
        $this->error('参数不正确',0,0);
    }else {
        //权限检测
        $result= M('auth_rule')->where(array('name'=>CONTROLLER_NAME.'/'.ACTION_NAME))->getField('authopen');
        if (!$result&& $_SESSION['aid']!=1){
         $author=M('class')->where(array('mc_id'=>$ad_id))->getField('mc_author');
            if ($author!=$_SESSION['aid']){
                $this->error('只能删除自己课程下的报名信息',0,0);
            }
        }else {
            //判断当前表状态
            $open=M('class_register')->where(array('cr_id'=>I('cr_id')))->getField('cr_open');
            if ($open){
                M('class')->where(array('mc_id'=>$ad_id))->setDec('ad_num');
            }

            $knows_back=M('class_register')->where(array('cr_id'=>I('cr_id')))->delete();
            $this->redirect('class_register_list', array('p' => $p,'mc_id'=>$ad_id));
        }
    }


}

public function class_register_alldel(){

    $p = I('p');
    $ad_id = I('alldel_id');
    $ids = I('cr_id','',htmlspecialchars);
    if(empty($ids)){
        $this -> error("请选择删除报名");//判断是否选择了知识ID
    }
    $model = D('class_register');
    if(is_array($ids)){//判断获取知识ID的形式是否数组
        $where = 'cr_id in('.implode(',',$ids).')';


    }else{
        $where = 'cr_id='.$ids;


    }
    $result= M('auth_rule')->where(array('name'=>CONTROLLER_NAME.'/'.ACTION_NAME))->getField('authopen');

    if (!$result&& $_SESSION['aid']!=1){
        $arr=M('class_register')->table('__CLASS_REGISTER__ cr')->join('__CLASS__ c on cr.cr_classid=c.mc_id')->where($where)->getField('mc_id,mc_author');
        $count=0;
        foreach ($arr as $k=>$v){
            if ($arr[$k]!=$_SESSION['aid']){
                $count++;
            }
        }
        if ($count){
            $this->error('只可删除自己课程下的报名信息',0);
        }
    }else{
        //判断当前表状态
        $open=M('class_register')->where($where)->field('cr_open')->select();

        $count=0;
        foreach ($open as $k=>$v){
            if ($open[$k]['cr_open']){
               $count++;
            }

        }

        M('class')->where(array('mc_id'=>$ad_id))->setDec('mc_num',$count);
        M('class_register')->where($where)->delete();
        $this->success("成功删除，不可还原！",U('class_register_list',array('p'=>$p,'mc_id'=>$ad_id)),1);

    }


}
}