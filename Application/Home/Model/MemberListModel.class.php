<?php
namespace Home\Model;
use Think\Model\RelationModel;

 class MemberListModel extends RelationModel{
     protected $tableName="member_list";
   protected $_link=array(
       'Member_group' => array(
		'mapping_type'  => self::BELONGS_TO,
		'class_name'    => 'Member_group',
		'foreign_key'   => 'member_list_groupid',
		'as_fields'  => 'member_group_name',
		),
   );


   public function userdata($where=null){
       $member_list=M('member_list');
       $where['member_list_open']=1;

       $data=$member_list->where($where)->Field(
                  'member_list_username,member_list_pwd,member_list_petname,member_list_sex,
                   member_list_headpic,member_list_tel,member_list_email,
                   member_list_province,member_list_city
                      '

                  )->find();




       return $data;
   }



}




?>