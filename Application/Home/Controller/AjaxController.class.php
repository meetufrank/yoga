<?php

namespace Home\Controller;
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
	    $map['ct_type']=$_REQUEST["pid"];
	    $list=$class_type->where($map)->select();
	    echo json_encode($list);
	}

}
