<?php
return array (

    'HM_PAGENUM'=> 1,//除个人中心外每次加载条数
    'PS_PAGENUM'=> 3,//个人中心每次加载条数
    'LIST_TITLE'=>25,  //列表页标题显示字数
    'LIST_SAY'=>30,  //列表页简介显示字数
    'INDEX_TITLE'=>18,  //主页页标题显示字数
    'INDEX_SAY'=>35,  //主页简介显示字数
    'INDEX_RIGHT_LIST'=>3,//主页右侧显示条数
    'INDEX_RIGHT_TITLE'=>7,//主页右侧标题显示字数
    'INDEX_RIGHT_SAY'=>20,//主页右侧简介显示字数
    'PERSON_TITLE'=>20,  //个人中心页标题显示字数
    'PERSON_ADDRESS'=>25,//个人中心页地址显示字数
    'CLASS_ADDRESS'=>6,  //列表页面地址显示字数


);

return array_merge(include './Conf/config.php', $config);

