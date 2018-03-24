<?php
namespace app\index\controller;
use think\Controller; // 注意要使用命名空间

class Artlist extends Controller
{
    public function index()
    {
        return view('artlist');
    }
}
