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
        $art = Db::name('art')->alias('a')->join('cat c', 'a.cat_id = c.cat_id')->where('art_id', $art_id)->find();
        $cats = Db::name('cat')->select();
        // 查找出所有的文章评论
        $comms = Db::name('comment')->where('art_id', $art_id)->select();
       // dump($comms);die;
        if(request()->isPost()) {
            $data = [
                'art_id' => $art_id,
                'nick' => input('username'),
                'content' => trim(input('comment')),
                'email' => trim(input('email')),
                'pubtime' => time(),
            ];

            $validate = Loader::validate('Comment');
            if(!$validate->check($data)) {
                $this->error($validate->getError());
                die;
            }

            // 评论成功文章评论数加一;
            if(Db::name('comment')->insert($data)) {
                Db::name('art')->where('art_id', $data['art_id'])->setInc('comm');
                $this->success('评论成功');
            }

        }

        $this->assign('cat', $cats);
        $this->assign('art', $art);
        $this->assign('comm', $comms);
        return view('art');
    }
}
