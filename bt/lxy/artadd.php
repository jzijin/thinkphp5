<?php
require('./lib/init.php');
if(empty($_POST)) {
    require(ROOT.'/view/front/artadd.html');
} else {
    if(mExec('art', $_POST)) {
        exit("添加成功");
    } else {
        exit("添加失败");
    }
}