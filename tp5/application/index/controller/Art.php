<?php
namespace app\index\controller;
use think\Controller; // 注意要使用命名空间
use think\Db;
use think\Loader;

class Art extends Controller
{
    public function index()
    {
        $art_id = input('art_id');
        $art = Db::name('art')->where('art_id', $art_id)->find();
        // dump($art);
        $cats = Db::name('cat')->select();

        if(request()->isPost()) {
            $data = [
                'art_id' => $art_id,
                'nick' => input('username'),
                'content' => trim(input('comment')),
                'email' => trim(input('email'))
            ];

            $validate = Loader::validate('Comment');
            if(!$validate->check($data)) {
                $this->error($validate->getError());
                die;
            }
            if(Db::name('comment')->insert($data)) {
                $this->success('评论成功');
            }
            
        }
        $this->assign('cat', $cats);
        $this->assign('art', $art);
        return view('art');
    }
}
