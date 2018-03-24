<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"D:\amp\apache\htdocs\tp5\public/../application/admin\view\index\catlist.html";i:1521529650;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
<link rel="stylesheet" href="http://127.0.0.1/tp5/public/static/admin/style/css/reset.css">
<link rel="stylesheet" href="http://127.0.0.1/tp5/public/static/admin/style/css/adm.css">
<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
</head>
<body>
    <header>
        <h1>Blog后台管理界面</h1>
    </header>
    <div id="main">
        <div id="lside">
            <aside>
                <h4>栏目管理</h4>
                <ul>
                    <li><a href="">栏目列表</a></li>
                    <li><a href="">添加栏目</a></li>
                </ul>
            </aside>
            <aside>
                <h4>文章管理</h4>
                <ul>
                    <li><a href="">文章列表</a></li>
                    <li><a href="">发布文章</a></li>
                </ul>
            </aside>
            <aside>
                <h4>个人中心</h4>
                <ul>
                    <li><a href="">修改密码</a></li>
                    <li><a href="">退出登陆</a></li>
                </ul>
            </aside>
        </div>
        <div id="rside">
            <table>
                <tr>
                    <td>序号</td>
                    <td>栏目名称</td>
                    <td>文章数</td>
                    <td>操作</td>
                </tr>
                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cat): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><?php echo $cat['cat_id']; ?></td>
                    <td><?php echo $cat['catname']; ?></td>
                    <td><span class="badge"><?php echo $cat['num']; ?></span></td>
                    <td><a href="<?php echo url('catdel', array('cat_id' => $cat['cat_id'])); ?>">删除</a>|<a href="<?php echo url('catedit', array('cat_id' => $cat['cat_id'])); ?>">编辑</a></a></td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </table>
            <?php echo $list->render(); ?>
        </div>
    </div>
    <footer>
        Copyright &copy; 2015 · GeneratePress · WordPress
    </footer>
</body>
</html>