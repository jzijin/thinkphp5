<?php
// 验证器要写在common这边 手册那边出错了
namespace app\common\validate;
use think\Validate;


class Login extends Validate
{
    protected $rule = [
        'name' => 'require|alphaDash',
        'password' => 'require|alphaDash',
    ];

    protected $message = [
        'name.alphaDash' => '用户名类型错误',
        'name.require' => '用户名必须填写',
        'password.alphaDash' => '密码类型错误',
        'password.require' => '密码必须填写',
    ];
}