<?php
namespace app\index\controller;
use think\Controller; // 注意要使用命名空间
use think\Db;

class Index extends Controller
{
    // 开始首页的开发
    public function index()
    {
        // 查找出所有的栏目
        $cats = Db::name('cat')->select();
        
        // 查找出所有的文章
        $arts = Db::name('art')->paginate(3);

        $this->assign('cats', $cats);
        $this->assign('arts', $arts);
        return $this->fetch('index');
    }

    public function catart() 
    {
        $id = input('cat_id');
        // 如果栏目下没有文章重定向到首页
        $sql = "select 1 from art where cat_id=$id";
        if(empty(Db::query($sql))) {
            $this->redirect('index');
        }
        // 查找出所有的文章
        $arts = Db::name('art')->where('cat_id', $id)->paginate(3);
        // 查找出所有的栏目
        $cats = Db::name('cat')->select();
                
        $this->assign('cats', $cats);
        $this->assign('arts', $arts);
        return $this->fetch('index');
    }
}