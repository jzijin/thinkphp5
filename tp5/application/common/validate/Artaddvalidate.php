<?php
// 验证器要写在common这边 手册那边出错了
namespace app\common\validate;
use think\Validate;


class Artaddvalidate extends Validate
{
    protected $rule = [
        'title' => 'require|max:10',
        'content' => 'require|max:500',
        // 'tags' => 'require'
    ];

    protected $message = [
        'title.require' => '栏目名称必须填写',
        'title.max' => '栏目名称长度不能大于10',
        'content.require' => '文章必须要有内容',
        'content.max' => '文章长度不能大于500',
        'tags' => '标签必须要填写'
    ];
    
}