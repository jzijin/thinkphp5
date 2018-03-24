<?php
// 验证器要写在common这边 手册那边出错了
namespace app\common\validate;
use think\Validate;


class Tags extends Validate
{
    protected $rule = [
        'tag' => 'require|max:9'
    ];

    protected $message = [
        'tag.require' => '标签必须要填写',
        'tag.max' => '标签长度不能大于10'
    ];
    
}