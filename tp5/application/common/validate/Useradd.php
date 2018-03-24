<?php
// 验证器要写在common这边 手册那边出错了
namespace app\common\validate;
use think\Validate;


class Useradd extends Validate
{
    protected $rule = [
        'name' => 'require|alphaDash|min:3|max:10',
        'password' => 'require|alphaDash|min:6|max:15',
    ];

    protected $message = [
        'name.alphaDash' => '用户名类型错误',
        'name.require' => '用户名必须填写',
        'name.min' => '用户名要大于三个字符',
        'name.max' => '用户名不得大于15',
        'password.alphaDash' => '密码类型错误',
        'password.require' => '密码必须填写',
        'password.min' => '密码必须大于6',
        'password.max' => '密码必须小于15',
    ];
}