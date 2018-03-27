<?php
namespace app\index\controller;
use think\Controller; // 注意要使用命名空间
use think\Db;

class Search extends Controller
{
    // TODO:完成搜索任务
    public function index() {
        $keywords = input("search");
        // dump($keywords);

        // 如果根据传过来的内容搜索文章？
        $arts = Db::name('art')->where(['title'=> ['like', '%'.$keywords.'%']])->select();
        // dump($arts);die;
        $this->assign('art', $arts);
        return $this->fetch('search');
    }
}