<?php
require("./lib/init.php");
if(empty($_POST)) {
    require(ROOT."/view/front/useradd.html");
} else {

    $user['username'] = trim($_POST['username']);

    // TODO:验证学号的合法性
    $user['idnumber'] = trim($_POST['idnumber']);
    $user['password'] = trim($_POST['password']);
    // $user['repassword'] = trim($_POST['repassword']);
    
    // TODO:添加提示页面
    if($user['password'] != $_POST['repassword']) {
        exit('两次密码不一致');
    } else {
        if(mExec("user", $user)) {
            exit('添加成功');
        } else {
            exit('添加失败');
        }
    }
}