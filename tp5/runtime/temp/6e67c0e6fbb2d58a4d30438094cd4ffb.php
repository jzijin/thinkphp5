<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"D:\amp\apache\htdocs\tp5\public/../application/admin\view\index\catedit.html";i:1521443944;}*/ ?>
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
            <form action="" method="post">
                <div class="form-group">
                    <label>栏目名称:</label>
                    <p>
                        <input type="text" name="catname" value="<?php echo $cat['catname']; ?>">
                    </p>
                </div>
                <div class="form-group">
                    <label>&nbsp;</label>
                    <p>
                        <button type="submit">提交</button>
                    </p>
                </div>
            </form>
        </div>
    </div>
    <footer>
        Copyright &copy; 2015 · GeneratePress · WordPress
    </footer>
</body>
</html>