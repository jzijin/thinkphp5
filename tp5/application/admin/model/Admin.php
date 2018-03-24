<?php
namespace app\admin\controller;
use think\Controller;
use \think\Loader;


class Admin extends Controller
{
    public function index()
    {
        if(request()->isPost()) {
            $data = [
                'catname' => input('catname'),
            ];

            $validate = Loader::validate('Admin');
            if(!$validate->check($data)) {
                $this->error($validate->getError());
                die;
            }
            
            if(db('cat')->insert($data)) {
                return $this->success('添加栏目成功');
            } else {
                return $this->error('添加栏目失败');
            }
        }
        return $this->fetch('catadd');
    }

    public function catlist() {
        return $this->fetch('catlist');
    }
}
