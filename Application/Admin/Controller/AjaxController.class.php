<?php

namespace Admin\Controller;
use Think\Controller;

class AjaxController extends Controller{
	public function getcity(){
		$Region=M("city");
		$map['pid']=$_REQUEST["pid"];

		$list=$Region->where($map)->select();
		echo json_encode($list);
	}
	public function gettown(){
	    $Region=M("district");
	    $map['cid']=$_REQUEST["pid"];

	    $list=$Region->where($map)->select();
	    echo json_encode($list);
	}
	public function getClass(){
	    $class_type=M("class_type");
	    $map['ct_type_one']=$_REQUEST["pid"];
	    $list=$class_type->where($map)->select();
	    echo json_encode($list);
	}
	public function getaddress(){
	    $city=D('province');
	    $adress = $city->relation(true)->select();


	    $this->ajaxReturn($adress,'JSON');

	}

}
