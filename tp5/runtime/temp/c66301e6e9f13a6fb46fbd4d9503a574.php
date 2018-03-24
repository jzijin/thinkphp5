<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"D:\amp\apache\htdocs\tp5\public/../application/admin\view\index\artlist.html";i:1521735615;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
<link rel="stylesheet" href="http://127.0.0.1/tp5/public/static/admin/style/css/reset.css">
<link rel="stylesheet" href="http://127.0.0.1/tp5/public/static/admin/style/css/adm.css">
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
                    <td>日期</td>
                    <td>标题</td>
                    <td>分类</td>
                    <td>回复</td>
                    <td>状态</td>
                    <td>操作</td>
                </tr>
                <?php if(is_array($artlist) || $artlist instanceof \think\Collection || $artlist instanceof \think\Paginator): $i = 0; $__LIST__ = $artlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$artlist): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><?php echo $artlist['art_id']; ?></td>
                    <td><?php echo date("Y-m-d", $artlist['pubtime']); ?></td>
                    <td><a href="#"><?php echo $artlist['title']; ?></a></td>
                    <td><?php echo $artlist['catname']; ?></td>
                    <td><span class="badge"><?php echo $artlist['comm']; ?></span></td>
                    <td>1</td>
                    <td><a href="<?php echo url('artdel', array('art_id' => $artlist['art_id'])); ?>">删除</a>|<a href="<?php echo url('artedit', array('art_id' => $artlist['art_id'])); ?>">编辑</a></a></td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </table>
            <div id="pagebar">
                Pages:&nbsp;
                <a href="#">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                4
                <a href="#">5</a>
                <a href="#">6</a>
            </div>
        </div>
    </div>
    <footer>
        Copyright &copy; 2015 · GeneratePress · WordPress
    </footer>
</body>
</html>