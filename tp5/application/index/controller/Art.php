<?php
namespace app\index\controller;
use think\Controller; // 注意要使用命名空间
use think\Db;

class Art extends Controller
{
    public function index()
    {
        $art_id = input('art_id');
        $art = Db::name('art')->where('art_id', $art_id)->find();
        // dump($art);
        $this->assign('art', $art);
        return view('art');
    }
}
