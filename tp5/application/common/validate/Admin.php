<?php
// 验证器要写在common这边 手册那边出错了
namespace app\common\validate;
use think\Validate;


class Admin extends Validate
{
    protected $rule = [
        'catname' => 'require|max:10|unique:cat'
    ];

    protected $message = [
        'catname.require' => '栏目名称必须填写',
        'catname.max' => '栏目名称长度不能大于10',
        'catname.unique' => '栏目名称必须唯一'
    ];
    
}