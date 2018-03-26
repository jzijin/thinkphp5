<?php
namespace app\admin\controller;
use think\Controller;


class Base extends Controller
{    
    public function _initialize() {
        // if(cookie('name') === NULL || cookie('ccode') === NULL) {
        //     $this->error('请先登录系统', 'login');
        // } else if(cookie('ccode') != md5(cookie('name'))) {
        //     $this->error('请先登录系统', 'login');
        // }
        if(!cookie('name')) {
            $this->error('请先登录系统', 'admin/index/login');
        }
    }
    
}

