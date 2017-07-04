<?php
namespace Admin\Controller;
use Think\Controller;
use Common\Controller\AuthController;
use Think\Auth;
use Think\Model;
use Think\Db;
use OT\Database;

class SysController extends AuthController {
    //站点设置
    public function sys(){
    	$sys=M('sys')->where(array('sys_id'=>1))->find();
    	$this->assign('sys',$sys)->display();
    }

    //保存站点设置
    public function runsys(){
    	if (!IS_AJAX){
    		$this->error('提交方式不正确',0,0);
    	}else{
    		$sys=M('sys');
    		if (!$sys->autoCheckToken($_POST)){
    			$this->error('表单令牌错误',0,0);
    		}else{
    			$sl_data=array(
    					'sys_id'=>I('sys_id'),
    					'sys_name'=>I('sys_name'),
    					'sys_url'=>I('sys_url'),
    					'sys_title'=>I('sys_title'),
    					'sys_key'=>I('sys_key'),
    					'sys_des'=>I('sys_des'),
    			);
	    		$sys->field('sys_id,sys_name,sys_url,sys_title,sys_key,sys_des')->save($sl_data);
	    		$this->success('站点设置保存成功',U('sys'),1);
    		}

    	}
    }
    //站点设置
    public function wesys(){
    	$sys=M('sys')->where(array('sys_id'=>1))->find();
    	$this->assign('sys',$sys)->display();
    }

    //保存微信设置
    public function runwesys(){
    	if (!IS_AJAX){
    		$this->error('提交方式不正确',0,0);
    	}else{
    		$sys=M('sys');
    		if (!$sys->autoCheckToken($_POST)){
    			$this->error('表单令牌错误',0,0);
    		}else{
    			$sl_data=array(
    					'sys_id'=>I('sys_id'),
    					'wesys_name'=>I('wesys_name'),
    					'wesys_id'=>I('wesys_id'),
    					'wesys_number'=>I('wesys_number'),
    					'wesys_appid'=>I('wesys_appid'),
    					'wesys_appsecret'=>I('wesys_appsecret'),
    					'wesys_type'=>I('wesys_type'),
    			);
    			$sys->field('sys_id,wesys_name,wesys_id,wesys_number,wesys_appid,wesys_appsecret,wesys_type')->save($sl_data);
    			$this->success('微信设置保存成功',U('wesys'),1);
    		}

    	}
    }
    //发送邮件设置
    public function emailsys(){
    	$sys=M('sys')->where(array('sys_id'=>1))->find();
    	$this->assign('sys',$sys)->display();
    }

    //保存邮箱设置
    public function runemail(){
    	if (!IS_AJAX){
    		$this->error('提交方式不正确',0,0);
    	}else{
    		$sys=M('sys');
    		if (!$sys->autoCheckToken($_POST)){
    			$this->error('表单令牌错误',0,0);
    		}else{
    			$sl_data=array(
    					'sys_id'=>I('sys_id'),
    					'email_open'=>I('email_open'),
    					'email_name'=>I('email_name'),
    					'email_emname'=>I('email_emname'),
    					'email_rename'=>I('email_rename'),
    					'email_pwd'=>I('email_pwd'),
    					'email_smtpname'=>I('email_smtpname'),
    			);
	    		$sys->field('sys_id,email_open,email_name,email_emname,email_rename,email_pwd,email_smtpname')->save($sl_data);
	    		$this->success('邮件设置保存成功',1,1);
    		}
    	}
    }

/************************************管理员模块****************************************/

	public function admin_list(){
	    $result= M('auth_rule')->where(array('name'=>CONTROLLER_NAME.'/'.ACTION_NAME))->getField('authopen');

	    if (!$result && $_SESSION['aid']!=1){
	        $status=1;
	    }else{
	        $status=0;
	    }
		$admin=M('admin');
		$val=I('val');
		$auth = new Auth();
		$this->assign('testval',$val);
		if($val){
			$map['admin_username']= array('like',"%".$val."%");
		}

		if ($_SESSION['aid']!=1){
			$map['admin_id']=$_SESSION['aid'];
		}

		$count= $admin->where($map)->count();// 查询满足要求的总记录数
		$Page= new \Think\Page($count,C('DB_PAGENUM_20'));// 实例化分页类 传入总记录数和每页显示的记录数

		foreach($map as $key=>$val) {
			$Page->parameter[$key]=urlencode($val);
		}
		$show= $Page->show();// 分页显示输出

		$admin_list=$admin->where($map)->order('admin_id')->limit($Page->firstRow.','.$Page->listRows)->select();

		foreach ($admin_list as $k=>$v){
			$group = $auth->getGroups($v['admin_id']);
			$admin_list[$k]['group'] = $group[0]['title'];
		}

		$this->assign('admin_list',$admin_list);
		$this->assign('page',$show);
        $this->assign('status',$status);
		$this->display();
	}

    public function admin_list_add(){
        $where['id']=array('neq',1);
		$auth_group=M('auth_group')->where($where)->select();
		$this->assign('auth_group',$auth_group);
		$this->display();
	}

	public function admin_group_add(){
		$this->display();
	}


	public function admin_list_runadd(){
		if (!IS_AJAX){
			$this->error('提交方式不正确',0,0);
		}else{
			$admin=M('admin');
			if (!$admin->autoCheckToken($_POST)){
				$this->error('表单令牌错误',0,0);
			}else{
				$admin_access=M('auth_group_access');
				$check_user=$admin->where(array('admin_username'=>I('admin_username')))->find();
				if ($check_user){
					$this->error('用户已存在，请重新输入用户名',0,0);
				}
				$sldata=array(
						'admin_username'=>I('admin_username'),
						'admin_pwd'=>I('admin_pwd','','md5'),
						'admin_email'=>I('admin_email'),
						'admin_tel'=>I('admin_tel'),
						'admin_open'=>I('admin_open'),
						'admin_realname'=>I('admin_realname'),
						'admin_ip'=>get_client_ip(),
						'admin_addtime'=>time(),
				);
				$result=$admin->field('admin_username,admin_pwd,admin_email,admin_tel,admin_open,admin_realname,admin_ip,admin_addtime')->add($sldata);
				$accdata=array(
						'uid'=>$result,
						'group_id'=>I('group_id'),
				);
				$admin_access->field('uid,group_id')->add($accdata);
				$this->success('管理员添加成功',U('admin_list'),1);
			}
		}
	}

	public function admin_list_edit(){

	    $result= M('auth_rule')->where(array('name'=>CONTROLLER_NAME.'/'.ACTION_NAME))->getField('authopen');

	    if (!$result && $_SESSION['aid']!=1){
	        $status=1;
	    }else{
	        $status=0;
	    }

		$auth_group=M('auth_group')->select();
		$admin_list=M('admin')->where(array('admin_id'=>I('admin_id')))->find();
		$auth_group_access=M('auth_group_access')->where(array('uid'=>$admin_list['admin_id']))->getField('group_id');
		$this->assign('admin_list',$admin_list);
		$this->assign('auth_group',$auth_group);
		$this->assign('auth_group_access',$auth_group_access);
		$this->assign('status',$status);
		$this->display();
	}

	public function admin_list_runedit(){
		if (!IS_AJAX){
			$this->error('提交方式不正确',0,0);
		}else{
			$admin=M('admin');
			if (!$admin->autoCheckToken($_POST)){
				$this->error('表单令牌错误',0,0);
			}else{


				$admin_list=M('admin');
				$admin_pwd=I('admin_pwd');
				$group_id=I('group_id');
				$admindata['admin_id']=I('admin_id');
				if ($admin_pwd){
					$admindata['admin_pwd']=I('admin_pwd','','md5');
				}
				$admindata['admin_email']=I('admin_email');
				$admindata['admin_tel']=I('admin_tel');
				$admindata['admin_realname']=I('admin_realname');

				$admin_list->field('admin_id,admin_pwd,admin_email,admin_tel,admin_realname')->save($admindata);
				//修改用户组
				M('auth_group_access')->where(array('uid'=>I('admin_id')))->setField('group_id',$group_id);
				$this->success('管理员修改成功',U('admin_list'),1);
			}
		}

	}

    public function admin_list_del(){
    	$admin_id=I('admin_id');
    	if ($_SESSION['aid']==1){
    		if (empty($admin_id)){
    			$this->error('用户ID不存在',U('admin_list'),1);
    		}
    		M('admin')->where(array('admin_id'=>I('admin_id')))->delete();
    		M('auth_group_access')->where(array('uid'=>I('admin_id')))->delete();
    		$this->redirect('admin_list');
    	}
    }

    public function admin_list_state(){
    	if (!IS_AJAX){
    		$this->error('提交方式不正确',0,0);
    	}else{
    		$id=I('x');
    		if (empty($id)){
    			$this->error('用户ID不存在',U('admin_list'),1);
    		}

    		$status=M('admin')->where(array('admin_id'=>$id))->getField('admin_open');//判断当前状态情况
    		if($status==1){
    			$statedata = array('admin_open'=>0);
    			$auth_group=M('admin')->where(array('admin_id'=>$id))->setField($statedata);
    			$this->success('状态禁止',1,1);
    		}else{
    			$statedata = array('admin_open'=>1);
    			$auth_group=M('admin')->where(array('admin_id'=>$id))->setField($statedata);
    			$this->success('状态开启',1,1);
    		}
    	}
    }

    //用户组管理
    public function admin_group(){
    	$auth_group=M('auth_group')->select();
    	$this->assign('auth_group',$auth_group);
    	$this->display();
    }

    public function admin_group_runadd(){
    	if (!IS_AJAX){
    		$this->error('提交方式不正确',0,0);
    	}else{
    		$auth_group=M('auth_group');
    		if (!$$auth_group->autoCheckToken($_POST)){
    			$this->error('表单令牌错误',0,0);
    		}else{
    			$sldata=array(
    					'title'=>I('title'),
    					'status'=>I('status'),
    					'addtime'=>time(),
    			);
    			$auth_group->field('title,status,addtime')->add($sldata);
    			$this->success('用户组添加成功',U('admin_group'),1);
    		}
    	}
    }

    public function admin_group_del(){
    	M('auth_group')->where(array('id'=>I('id')))->delete();
    	$this->redirect('admin_group');
    }

    public function admin_group_edit(){
    	$group=M('auth_group')->where(array('id'=>I('id')))->find();
    	$this->assign('group',$group);
    	$this->display();
    }

    public function admin_group_runedit(){
    	if (!IS_AJAX){
    		$this->error('提交方式不正确',0,0);
    	}else{
    		$auth_group=M('auth_group');
    		if (!$$auth_group->autoCheckToken($_POST)){
    			$this->error('表单令牌错误',0,0);
    		}else{
    			$sldata=array(
    					'id'=>I('id'),
    					'title'=>I('title'),
    					'status'=>I('status'),
    			);
    			M('auth_group')->field('id,title,status')->save($sldata);
    			$this->success('用户组修改成功',U('admin_group'),1);
    		}
    	}
    }

    public function admin_group_state(){
    	if (!IS_AJAX){
    		$this->error('提交方式不正确',0,0);
    	}else{
    		$id=I('x');
    		$status=M('auth_group')->where(array('id'=>$id))->getField('status');//判断当前状态情况
    		if($status==1){
    			$statedata = array('status'=>0);
    			$auth_group=M('auth_group')->where(array('id'=>$id))->setField($statedata);
    			$this->success('状态禁止',1,1);
    		}else{
    			$statedata = array('status'=>1);
    			$auth_group=M('auth_group')->where(array('id'=>$id))->setField($statedata);
    			$this->success('状态开启',1,1);
    		}
    	}
    }

    public function admin_rule(){
    	$nav = new \Org\Util\Leftnav;
    	$admin_rule=M('auth_rule')->order('sort')->select();
    	$arr = $nav::rule($admin_rule);
	   	$this->assign('admin_rule',$arr);//权限列表
    	$this->display();
    }

    public function admin_rule_add(){
    	if(!IS_AJAX){
    		$this->error('提交方式不正确',0,0);
    	}else{
    		$admin_rule=M('auth_rule');
    		if (!$$admin_rule->autoCheckToken($_POST)){
    			$this->error('表单令牌错误',0,0);
    		}else{
    			$sldata=array(
    					'name'=>I('name'),
    					'title'=>I('title'),
    					'status'=>1,
    					'menustatus'=>I('status'),
    					'sort'=>I('sort'),
    					'addtime'=>time(),
    					'pid'=>I('pid'),
    					'css'=>I('css'),
    			);
    			$admin_rule->field('name,title,status,menustatus,sort,addtime,pid,css')->add($sldata);
    			$this->success('权限添加成功',U('admin_rule'),1);
    		}
    	}
    }

    public function admin_rule_state(){
    	if (!IS_AJAX){
    		$this->error('提交方式不正确',0,0);
    	}else{
    		$id=I('x');
    		$statusone=M('auth_rule')->where(array('id'=>$id))->getField('menustatus');//判断当前状态情况
    		if($statusone==1){
    			$statedata = array('menustatus'=>0);
    			$auth_group=M('auth_rule')->where(array('id'=>$id))->setField($statedata);
    			$this->success('状态禁止',1,1);
    		}else{
    			$statedata = array('menustatus'=>1);
    			$auth_group=M('auth_rule')->where(array('id'=>$id))->setField($statedata);
    			$this->success('状态开启',1,1);
    		}
    	}
    }


    public function admin_rule_tz(){
    	if (!IS_AJAX){
    		$this->error('提交方式不正确',0,0);
    	}else{
    		$id=I('x');//1=无需验证  0=需要验证
    		$statusone=M('auth_rule')->where(array('id'=>$id))->getField('authopen');//判断当前状态情况
    		if($statusone==1){
    			$statedata = array('authopen'=>0);
    			$auth_group=M('auth_rule')->where(array('id'=>$id))->setField($statedata);
    			$this->success('需要验证',1,1);
    		}else{
    			$statedata = array('authopen'=>1);
    			$auth_group=M('auth_rule')->where(array('id'=>$id))->setField($statedata);
    			$this->success('无需验证',1,1);
    		}
    	}
    }

    public function ruleorder(){
    	if (!IS_AJAX){
    		$this->error('提交方式不正确',0,0);
    	}else{
    		$auth_rule=M('auth_rule');
    		foreach ($_POST as $id => $sort){
    			$auth_rule->where(array('id' => $id ))->setField('sort' , $sort);
    		}
    		$this->success('排序更新成功',U('admin_rule'),1);
    	}
    }

    public function admin_rule_edit(){
    	$admin_rule=M('auth_rule')->where(array('id'=>I('id')))->find();
    	$this->assign('rule',$admin_rule);
    	$this->display();
    }

    public function admin_rule_runedit(){
        if(!IS_AJAX){
    		$this->error('提交方式不正确',0,0);
    	}else{
    		$admin_rule=M('auth_rule');
    		$sldata=array(
    				'id'=>I('id'),
    				'name'=>I('name'),
    				'title'=>I('title'),
    				'status'=>1,
    				'menustatus'=>I('status'),
    				'css'=>I('css'),
    				'sort'=>I('sort'),
    		);
    		$admin_rule->save($sldata);
    		$this->success('权限修改成功',U('admin_rule'),1);
    	}
    }

    public function admin_rule_del(){
    	M('auth_rule')->where(array('id'=>I('id')))->delete();
    	$this->redirect('admin_rule');
    }

    //三重权限配置
    public function admin_group_access(){
        $admin_group=M('auth_group')->where(array('id'=>I('id')))->find();
        $m = M('auth_rule');
        $data = $m->field('id,name,title')->where(array('pid'=>0,'authopen'=>0))->order('sort')->select();
        foreach ($data as $k=>$v){
            $data[$k]['sub'] = $m->field('id,name,title')->where(array('pid'=>$v['id'],'authopen'=>0))->order('sort')->select();
            foreach ($data[$k]['sub'] as $kk=>$vv){
                $data[$k]['sub'][$kk]['sub'] = $m->field('id,name,title')->where(array('pid'=>$vv['id'],'authopen'=>0))->order('sort')->select();
                foreach ($data[$k]['sub'][$kk]['sub'] as $kkk=>$vvv){
                    $data[$k]['sub'][$kk]['sub'][$kkk]['sub'] = $m->field('id,name,title')->where(array('pid'=>$vvv['id'],'authopen'=>0))->order('sort')->select();
                }
            }
        }
        //p($data);die;
        $this->assign('admin_group',$admin_group);	// 顶级
        $this->assign('datab',$data);	// 顶级
        $this->display();
    }

    public function admin_group_runaccess(){
    	if(!IS_AJAX){
    		$this->error('提交方式不正确',0,0);
    	}else{
	    	$m = M('auth_group');
	    	$new_rules = I('new_rules');
	    	$imp_rules = implode(',', $new_rules).',';
	    	$sldata=array(
	    		'id'=>I('id'),
	    		'rules'=>$imp_rules,
	    	);
	    	if($m->save($sldata)){
	    		$this->success('权限配置成功',U('admin_group'),1);
	    	}else{
	    		$this->error('配置没有改变，无需保存');
	    	}
    	}
    }


    /************************************数据库备份、还原****************************************/

    public function database($type = null){
    	if(empty($type)){
    		$type='export';
    	}
        switch ($type) {
            /* 数据还原 */
            case 'import':
                //列出备份文件列表
                $path = realpath(C('DB_PATH'));
                $flag = \FilesystemIterator::KEY_AS_FILENAME;
                $glob = new \FilesystemIterator($path,  $flag);

                $list = array();
                foreach ($glob as $name => $file) {
                    if(preg_match('/^\d{8,8}-\d{6,6}-\d+\.sql(?:\.gz)?$/', $name)){
                        $name = sscanf($name, '%4s%2s%2s-%2s%2s%2s-%d');

                        $date = "{$name[0]}-{$name[1]}-{$name[2]}";
                        $time = "{$name[3]}:{$name[4]}:{$name[5]}";
                        $part = $name[6];

                        if(isset($list["{$date} {$time}"])){
                            $info = $list["{$date} {$time}"];
                            $info['part'] = max($info['part'], $part);
                            $info['size'] = $info['size'] + $file->getSize();
                        } else {
                            $info['part'] = $part;
                            $info['size'] = $file->getSize();
                        }
                        $extension        = strtoupper(pathinfo($file->getFilename(), PATHINFO_EXTENSION));
                        $info['compress'] = ($extension === 'SQL') ? '-' : $extension;
                        $info['time']     = strtotime("{$date} {$time}");

                        $list["{$date} {$time}"] = $info;
                    }
                }
                $title = '数据还原';
                break;

            /* 数据备份 */
            case 'export':
                $Db    = Db::getInstance();
                $list  = $Db->query('SHOW TABLE STATUS FROM '.C('DB_NAME'));
                $list  = array_map('array_change_key_case', $list);
                $title = '数据备份';
                break;

            default:
                $this->error('参数错误！');
        }

        //渲染模板
        $this->assign('meta_title', $title);
        $this->assign('data_list', $list);
        $this->display($type);
    }

    public function import(){
    			$path = realpath(C('DB_PATH'));
    			$flag = \FilesystemIterator::KEY_AS_FILENAME;
    			$glob = new \FilesystemIterator($path,  $flag);

    			$list = array();
    			foreach ($glob as $name => $file) {
    				if(preg_match('/^\d{8,8}-\d{6,6}-\d+\.sql(?:\.gz)?$/', $name)){
    					$name = sscanf($name, '%4s%2s%2s-%2s%2s%2s-%d');

    					$date = "{$name[0]}-{$name[1]}-{$name[2]}";
    					$time = "{$name[3]}:{$name[4]}:{$name[5]}";
    					$part = $name[6];

    					if(isset($list["{$date} {$time}"])){
    						$info = $list["{$date} {$time}"];
    						$info['part'] = max($info['part'], $part);
    						$info['size'] = $info['size'] + $file->getSize();
    					} else {
    						$info['part'] = $part;
    						$info['size'] = $file->getSize();
    					}
    					$extension        = strtoupper(pathinfo($file->getFilename(), PATHINFO_EXTENSION));
    					$info['compress'] = ($extension === 'SQL') ? '-' : $extension;
    					$info['time']     = strtotime("{$date} {$time}");

    					$list["{$date} {$time}"] = $info;
    				}
    			}


    	//渲染模板
    	$this->assign('meta_title', $title);
    	$this->assign('data_list', $list);
    	$this->display($type);
    }



    /**
     * 优化表
     * @param  String $tables 表名
     * @author slackck<876902658@qq.com>
     */
    public function optimize($tables = null){
        if($tables) {
            $Db   = Db::getInstance();
            if(is_array($tables)){
                $tables = implode('`,`', $tables);
                $list = $Db->query("OPTIMIZE TABLE `{$tables}`");

                if($list){
                    $this->success("数据表优化完成！");
                } else {
                    $this->error("数据表优化出错请重试！");
                }
            } else {
                $list = $Db->query("OPTIMIZE TABLE `{$tables}`");
                if($list){
                    $this->success("数据表'{$tables}'优化完成！");
                } else {
                    $this->error("数据表'{$tables}'优化出错请重试！");
                }
            }
        } else {
            $this->error("请指定要优化的表！");
        }
    }

    /**
     * 修复表
     * @param  String $tables 表名
     * @author slackck<876902658@qq.com>
     */
    public function repair($tables = null){
        if($tables) {
            $Db   = Db::getInstance();
            if(is_array($tables)){
                $tables = implode('`,`', $tables);
                $list = $Db->query("REPAIR TABLE `{$tables}`");

                if($list){
                    $this->success("数据表修复完成！");
                } else {
                    $this->error("数据表修复出错请重试！");
                }
            } else {
                $list = $Db->query("REPAIR TABLE `{$tables}`");
                if($list){
                    $this->success("数据表'{$tables}'修复完成！");
                } else {
                    $this->error("数据表'{$tables}'修复出错请重试！");
                }
            }
        } else {
            $this->error("请指定要修复的表！");
        }
    }

    /**
     * 删除备份文件
     * @param  Integer $time 备份时间
     * @author slackck<876902658@qq.com>
     */
    public function del($time = 0){
        if($time){
            $name  = date('Ymd-His', $time) . '-*.sql*';
            $path  = realpath(C('DB_PATH')) . DIRECTORY_SEPARATOR . $name;
            array_map("unlink", glob($path));
            if(count(glob($path))){
                $this->success('备份文件删除失败，请检查权限！');
            } else {
                $this->success('备份文件删除成功！');
            }
        } else {
            $this->error('参数错误！');
        }
    }

    /**
     * 备份数据库
     * @param  String  $tables 表名
     * @param  Integer $id     表ID
     * @param  Integer $start  起始行数
     * @author slackck<876902658@qq.com>
     */
    public function export($tables = null, $id = null, $start = null){
        if(IS_POST && !empty($tables) && is_array($tables)){ //初始化
            //读取备份配置
            $config = array(
            	'path'     => realpath(C('DB_PATH')) . DIRECTORY_SEPARATOR,
                //'path'     => C('DB_PATH'),
                'part'     => C('DB_PART'),
                'compress' => C('DB_COMPRESS'),
                'level'    => C('DB_LEVEL'),
            );
            //$this->error($config['path'],0,0);
            //检查是否有正在执行的任务
            $lock = "{$config['path']}backup.lock";
            if(is_file($lock)){
                $this->error('检测到有一个备份任务正在执行，请稍后再试！',0,0);
            } else {
                //创建锁文件
                file_put_contents($lock, NOW_TIME);
            }

            //检查备份目录是否可写
            is_writeable($config['path']) || $this->error('备份目录不存在或不可写，请检查后重试！',0,0);
            session('backup_config', $config);

            //生成备份文件信息
            $file = array(
                'name' => date('Ymd-His', NOW_TIME),
                'part' => 1,
            );
            session('backup_file', $file);

            //缓存要备份的表
            session('backup_tables', $tables);

            //创建备份文件
            $Database = new Database($file, $config);
            if(false !== $Database->create()){
                $tab = array('id' => 0, 'start' => 0);
                $this->success('初始化成功！', '', array('tables' => $tables, 'tab' => $tab));
            } else {
                $this->error('初始化失败，备份文件创建失败！',0,0);
            }
        } elseif (IS_GET && is_numeric($id) && is_numeric($start)) { //备份数据
            $tables = session('backup_tables');
            //备份指定表
            $Database = new Database(session('backup_file'), session('backup_config'));
            $start  = $Database->backup($tables[$id], $start);
            if(false === $start){ //出错
                $this->error('备份出错！',0,0);
            } elseif (0 === $start) { //下一表
                if(isset($tables[++$id])){
                    $tab = array('id' => $id, 'start' => 0);
                    $this->success('备份完成！', '', array('tab' => $tab));
                } else { //备份完成，清空缓存
                    unlink(session('backup_config.path') . 'backup.lock');
                    session('backup_tables', null);
                    session('backup_file', null);
                    session('backup_config', null);
                    $this->success('备份完成！',1,1);
                }
            } else {
                $tab  = array('id' => $id, 'start' => $start[0]);
                $rate = floor(100 * ($start[0] / $start[1]));
                $this->success("正在备份...({$rate}%)", '', array('tab' => $tab));
            }

        } else { //出错
            $this->error('参数错误！');
        }
    }

/**************************************表格导入导出**********************************************/
    public function excel_import(){
    	$this->display();
    }

    public function excel_export(){

        $result= M('auth_rule')->where(array('name'=>CONTROLLER_NAME.'/'.ACTION_NAME))->getField('authopen');

        if (!$result && $_SESSION['aid']!=1){
            $where['ad_author']=array('eq',$_SESSION['aid']);
            $map['mc_author']=array('eq',$_SESSION['aid']);
        }
        $where['ad_back']=array('eq',0);
        $map['mc_back']=array('eq',0);
        $active=M('active')->where($where)->order('ad_addtime desc')->Field('ad_id,ad_title')->select();
        $class=M('class')->where($map)->order('mc_addtime desc')->Field('mc_id,mc_title')->select();

        $this->assign('active',$active);
        $this->assign('class',$class);
    	$this->display();
    }

/*
 * 表格导入
 */
    public function excel_runimport(){
    	import("Org.Util.PHPExcel");
    	$PHPExcel=new \PHPExcel();
    	import("Org.Util.PHPExcel.Reader.Excel5");

            if (! empty ( $_FILES ['file_stu'] ['name'] )){
	            $tmp_file = $_FILES ['file_stu'] ['tmp_name'];
	            $file_types = explode ( ".", $_FILES ['file_stu'] ['name'] );
	            $file_type = $file_types [count ( $file_types ) - 1];
	             /*判别是不是.xls文件，判别是不是excel文件*/
		            if (strtolower ( $file_type ) != "xls"){
		                 $this->error ( '不是Excel文件，重新上传',U('excel_import'),0);
		            }
	            /*设置上传路径*/
	             $savePath = './Public/excel/';
	            /*以时间来命名上传的文件*/
	             $str = time ( 'Ymdhis' );
	             $file_name = $str . "." . $file_type;

		             if (! copy ( $tmp_file, $savePath . $file_name )){
		                  $this->error ('上传失败',U('excel_import'),0);
		             }

	           $res = $this->read ( $savePath . $file_name );
		           if (!$res){
		           	$this->error ('数据处理失败失败',U('excel_import'),0);
		           }
	           //spl_autoload_register ( array ('Think', 'autoload' ) );
	           foreach ( $res as $k => $v ){
	              if ($k != 1){
	                  $data ['news_title'] = $v[1];
					  $data ['news_titleshort'] = $v[2];
	                  $data ['news_columnid'] = $v[3];
					  $data ['news_columnviceid'] = $v[4];
					  $data ['news_key'] = $v[5];
					  $data ['news_tag'] = $v[6];
					  $data ['news_auto'] = $v[7];
					  $data ['news_source'] = $v[8];
					  $data ['news_content'] = $v[9];
					  $data ['news_scontent'] = $v[10];
					  $data ['news_hits'] = $v[11];
					  $data ['news_img'] = $v[12];
					  $data ['news_time'] = $v[13];
					  $data ['news_flag'] = $v[14];
					  $data ['news_zaddress'] = $v[15];
					  $data ['news_back'] = $v[16];
					  $data ['news_open'] = $v[17];
					  $data ['news_lvtype'] = $v[18];

	                  $result = M ('news')->add ($data);
	                  if (!$result){
	                  	$this->error ('导入数据库失败',U('excel_import'),0);
	                  }
	              }
	           }
	           $this->success ('导入数据库成功',U('excel_import'),1);
			}
    }

	public function read($filename,$encode='utf-8'){
		$objReader = \PHPExcel_IOFactory::createReader(Excel5);
		$objReader->setReadDataOnly(true);
		$objPHPExcel = $objReader->load($filename);
		$objWorksheet = $objPHPExcel->getActiveSheet();
		$highestRow = $objWorksheet->getHighestRow();
		$highestColumn = $objWorksheet->getHighestColumn();
		$highestColumnIndex = \PHPExcel_Cell::columnIndexFromString($highestColumn);
		$excelData = array();
		for ($row = 1; $row <= $highestRow; $row++) {
			for ($col = 0; $col < $highestColumnIndex; $col++) {
				$excelData[$row][] =(string)$objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
			}
		}
		return $excelData;
	}

/*
 * 数据导出功能  活动报名
 */
    public function excel_runexport(){
        $activeid=I('active');
        if ($activeid){
            $where['ar_activeid']=$activeid;
            $title=M('active')->where(array('ad_id'=>$activeid))->getField('ad_title');
            $title=date('Y-m-d',time()).$title."的报名信息";
        }else{
            $title=date('Y-m-d',time()).'活动表全部报名信息';
        }

        $data=D('register')->table('__ACTIVE_REGISTER__ a')->join('
            __MEMBER_LIST__ ad on
           a.ar_userid=ad.member_list_id


         ')->join('
            __ACTIVE__ ac on
           a.ar_activeid=ac.ad_id


         ')->where($where)->order('ar_open desc,ar_birthday desc,ar_activeid ')->Field(
                     "
             ar_id,ar_name,ar_tel,ar_birthday,ar_sex,ar_more,ar_email,ar_addtime,ar_open,ad_title,
             ar_say,member_list_username,member_list_tel

             ")->select();

      foreach ($data as $k=>$v){


          if ($data[$k]['ar_sex']==1){
              $data[$k]['ar_sex']='男';
          }else{
              $data[$k]['ar_sex']='女';
          }
          if ($data[$k]['ar_open']==1){
              $data[$k]['ar_open']='审核通过';
          }else{
              $data[$k]['ar_open']='未审核';
          }

      }

    		import("Org.Util.PHPExcel");
    		error_reporting(E_ALL);
    		date_default_timezone_set('Europe/London');
    		$objPHPExcel = new \PHPExcel();
    		import("Org.Util.PHPExcel.Reader.Excel5");
    		/*设置excel的属性*/
    		$objPHPExcel->getProperties()->setCreator("slackck")//创建人
    		->setLastModifiedBy("slackck")//最后修改人
    		->setTitle("数据EXCEL导出")//标题
    		->setSubject("数据EXCEL导出")//题目
    		->setDescription("功能示例")//描述
    		->setKeywords("excel")//关键字
    		->setCategory("result file");//种类
    		//set width
    		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(8);
    		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
    		$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(10);
    		$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
    		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(8);
    		$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
    		$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
    		$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
    		$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(10);
    		$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(50);
    		$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(15);
    		$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
    		;

    		//第一行数据
    		$objPHPExcel->setActiveSheetIndex(0)
    		->setCellValue('A1', '报名id')
    		->setCellValue('B1', '归属活动')
    		->setCellValue('C1','姓名')
    		->setCellValue('D1', '联系方式')
    		//->setCellValue('D1', '出生日期')
    		//->setCellValue('E1', '年龄')
    		->setCellValue('E1', '性别')
    		->setCellValue('F1', '有无参加过艺术类的其他课程')
    		->setCellValue('G1', '邮箱')
    		->setCellValue('H1', '报名时间')
    		->setCellValue('I1', '审核状态')
    		->setCellValue('J1', '备注')
    		->setCellValue('K1', '填写报名的用户')
    		->setCellValue('L1', '报名用户的联系方式');

    		foreach($data as $k => $v){
					$k=$k+1;
    				$num=$k+1;//数据从第二行开始录入


    			$objPHPExcel->setActiveSheetIndex(0)
    			//Excel的第A列，uid是你查出数组的键值，下面以此类推
    			->setCellValue('A'.$num, $v['ar_id'])
    			->setCellValue('B'.$num, $v['ad_title'])
    			->setCellValue('C'.$num, $v['ar_name'])
    			->setCellValue('D'.$num, $v['ar_tel'])
    			//->setCellValue('D'.$num, $v['ar_birthday'])
    			//->setCellValue('E'.$num, $v['age'])
    			->setCellValue('E'.$num, $v['ar_sex'])
    			->setCellValue('F'.$num, $v['ar_more'])
    			->setCellValue('G'.$num, $v['ar_email'])
    			->setCellValue('H'.$num, $v['ar_addtime'])
    			->setCellValue('I'.$num, $v['ar_open'])
    			->setCellValue('J'.$num, $v['ar_say'])
    			->setCellValue('K'.$num, $v['member_list_username'])
    			->setCellValue('L'.$num, $v['member_list_tel']);


    		}

    		$objPHPExcel->getActiveSheet()->setTitle('User');
    		$objPHPExcel->setActiveSheetIndex(0);
    		ob_end_clean();//清除缓冲区,避免乱码
    		header('Content-Type: application/vnd.ms-excel');
    		header('Content-Disposition: attachment;filename="'.$title.'.xls"');
    		header('Cache-Control: max-age=0');
    		$objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    		$objWriter->save('php://output');
    		exit;
    }


    /*
     * 数据导出功能  课程报名
     */
    public function excel_runexport_class(){
        $classid=I('class');
        if ($classid){
            $where['cr_classid']=$classid;
          $title=M('class')->where(array('mc_id'=>$classid))->getField('mc_title');
            $title=date('Y-m-d',time()).$title."的报名信息";
        }else{
            $title=date('Y-m-d',time()).'课程表全部报名信息';
        }
        $data=D('Clregister')->table('__CLASS_REGISTER__ a')->join('
            __MEMBER_LIST__ ad on
           a.cr_userid=ad.member_list_id


         ')->join('
            __CLASS__ ac on
           a.cr_classid=ac.mc_id


         ')->where($where)->order('cr_open desc,cr_birthday desc,cr_classid')->Field(
                 "
             cr_id,cr_name,cr_country,cr_hometype,cr_address,cr_health,cr_drug,cr_tel,cr_birthday,cr_sex,cr_more,cr_email,cr_addtime,cr_open,mc_title,
             cr_say,member_list_username,member_list_tel

             ")->select();

        foreach ($data as $k=>$v){
            $data[$k]['age']=birthday($v['cr_birthday']);

            if ($data[$k]['cr_sex']==1){
                $data[$k]['cr_sex']='男';
            }else{
                $data[$k]['cr_sex']='女';
            }
            if ($data[$k]['cr_open']==1){
                $data[$k]['cr_open']='审核通过';
            }else{
                $data[$k]['cr_open']='未审核';
            }

        }

        import("Org.Util.PHPExcel");
        error_reporting(E_ALL);
        date_default_timezone_set('Europe/London');
        $objPHPExcel = new \PHPExcel();
        import("Org.Util.PHPExcel.Reader.Excel5");
        /*设置excel的属性*/
        $objPHPExcel->getProperties()->setCreator("slackck")//创建人
        ->setLastModifiedBy("slackck")//最后修改人
        ->setTitle("数据EXCEL导出")//标题
        ->setSubject("数据EXCEL导出")//题目
        ->setDescription("功能示例")//描述
        ->setKeywords("excel")//关键字
        ->setCategory("result file");//种类
        //set width
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(8);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(8);
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(8);
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(8);
        $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(40);
        $objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(15);

        //第一行数据
        $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A1', '报名id')
        ->setCellValue('B1','归属课程')
        ->setCellValue('C1', '姓名')
        ->setCellValue('D1', '联系方式')
        ->setCellValue('E1', '护照（国籍）')
        ->setCellValue('F1', '地址')
        ->setCellValue('G1', '出生日期')
        ->setCellValue('H1', '年龄')
        ->setCellValue('I1', '性别')
        ->setCellValue('J1', '有无参加过艺术类的其他课程')
        ->setCellValue('K1', '所需房型')
        ->setCellValue('L1', '有无疾病')
        ->setCellValue('M1', '药品需求')
        ->setCellValue('N1', '邮箱')
        ->setCellValue('O1', '报名时间')
        ->setCellValue('P1', '审核状态')
        ->setCellValue('Q1', '备注')
        ->setCellValue('R1', '填写报名的用户')
        ->setCellValue('S1', '报名用户的联系方式');

        foreach($data as $k => $v){
            $k=$k+1;
        				$num=$k+1;//数据从第二行开始录入


        				$objPHPExcel->setActiveSheetIndex(0)
        				//Excel的第A列，uid是你查出数组的键值，下面以此类推
        				->setCellValue('A'.$num, $v['cr_id'])
        				->setCellValue('B'.$num, $v['mc_title'])
        				->setCellValue('C'.$num, $v['cr_name'])
        				->setCellValue('D'.$num, $v['cr_tel'])
        				->setCellValue('E'.$num, $v['cr_country'])
        				->setCellValue('F'.$num, $v['cr_address'])
        				->setCellValue('G'.$num, $v['cr_birthday'])
        				->setCellValue('H'.$num, $v['age'])
        				->setCellValue('I'.$num, $v['cr_sex'])
        				->setCellValue('J'.$num, $v['cr_more'])
        				->setCellValue('K'.$num, $v['cr_hometype'])
        				->setCellValue('L'.$num, $v['cr_health'])
        				->setCellValue('M'.$num, $v['cr_drug'])
        				->setCellValue('N'.$num, $v['cr_email'])
        				->setCellValue('O'.$num, $v['cr_addtime'])
        				->setCellValue('P'.$num, $v['cr_open'])
        				->setCellValue('Q'.$num, $v['cr_say'])
        				->setCellValue('R'.$num, $v['member_list_username'])
        				->setCellValue('S'.$num, $v['member_list_tel']);


        }

        $objPHPExcel->getActiveSheet()->setTitle('User');
        $objPHPExcel->setActiveSheetIndex(0);
        ob_end_clean();//清除缓冲区,避免乱码
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$title.'.xls"');
        header('Cache-Control: max-age=0');
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        exit;
    }



/*******************************************来源管理***************************************************/
/*
 * 文章来源列表
 */
    public function source(){
    	$source=M('source')->order('source_order')->select();
   		$this->assign('source',$source);
    	$this->display();
    }

/*
 * 添加来源操作
 */
    public function source_runadd(){
    	if (!IS_AJAX){
    		$this->error('提交方式不正确',0,0);
    	}else{
    		$source=M('source');
    		if (!$source->autoCheckToken($_POST)){
    			$this->error('表单令牌错误',0,0);
    		}else{
    			$source->field('source_name,source_order')->add($_POST);
    			$this->success('来源添加成功',U('source'),1);
    		}

    	}
    }

/*
 * 来源删除操作
 */
    public function source_del(){
    	$p=I('p');
    	M('source')->where(array('source_id'=>I('source_id')))->delete();
    	$this->redirect('source', array('p' => $p));
    }

/*
 * 来源修改返回值操作
 */
    public function source_edit(){
    	$source_id=I('source_id');
    	$source=M('source')->where(array('source_id'=>$source_id))->find();
    	$sl_data['source_id']=$source['source_id'];
    	$sl_data['source_name']=$source['source_name'];
    	$sl_data['source_order']=$source['source_order'];
    	$sl_data['status']=1;

    	$this->ajaxReturn($sl_data,'json');
    }

/*
 * 添加来源操作
 */
    public function source_runedit(){
    	if (!IS_AJAX){
    		$this->error('提交方式不正确',0,0);
    	}else{
    		$source=M('source');
    		if (!$source->autoCheckToken($_POST)){
    			$this->error('表单令牌错误',0,0);
    		}else{
    			$sl_data=array(
    					'source_id'=>I('source_id'),
    					'source_name'=>I('source_name'),
    					'source_order'=>I('source_order'),
    			);
    			$source->field('source_id,source_name,source_order')->save($_POST);
    			$this->success('来源修改成功',U('source'),1);
    		}
    	}
    }

/*
 * 来源排序
 */
    public function source_order(){
    	if (!IS_AJAX){
    		$this->error('提交方式不正确',0,0);
    	}else{
    		$source=M('source');
    		foreach ($_POST as $source_id => $source_order){
    			$source->where(array('source_id' => $source_id ))->setField('source_order' , $source_order);
    		}
    		$this->success('排序更新成功',U('source'),1);
    	}
    }

/*******************************************************************************/

    public function pay(){
    	$this->display();
    }

    public function pay_alipay(){
    	$pay_alipay=M('pay_alipay')->where(array('pay_alipay_id'=>1))->find();
    	$this->assign('pay_alipay',$pay_alipay);
    	$this->display();
    }

    public function pay_alipay_run(){
    	if (!IS_AJAX){
    		$this->error('提交方式不正确',0,0);
    	}else{
    		$pay_alipay=M('pay_alipay');
    		if (!$pay_alipay->autoCheckToken($_POST)){
    			$this->error('表单令牌错误',0,0);
    		}else{
    		$sl_data=array(
    			'pay_alipay_id'=>I('pay_alipay_id'),
    			'pay_alipay_des'=>I('pay_alipay_des'),
    			'pay_alipay_account'=>I('pay_alipay_account'),
    			'pay_alipay_code'=>I('pay_alipay_code'),
    			'pay_alipay_partnerid'=>I('pay_alipay_partnerid'),
    			'pay_alipay_type'=>I('pay_alipay_type'),
    		);
    		$pay_alipay->field('pay_alipay_id,pay_alipay_des,pay_alipay_account,pay_alipay_code,pay_alipay_partnerid,pay_alipay_type')->save($sl_data);
    		$this->success('支付宝配置保存成功',U('pay'),1);
    		}

    	}
    }





















}