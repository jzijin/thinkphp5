<?php
// 验证器要写在common这边 手册那边出错了
namespace app\common\validate;
use think\Validate;


class Comment extends Validate
{
    protected $rule = [
        'nick' => 'require|max:10',
        'content' => 'require|max:500',
        'email' => 'email'
        // 'tags' => 'require'
    ];

    protected $message = [
        'nick.require' => '名字名称必须填写',
        'nick.max' => '名字名称长度不能大于10',
        'content.require' => '文章必须要有内容',
        'content.max' => '文章长度不能大于500',
        'email.email' => 'email填写错误'
    ];
    
}