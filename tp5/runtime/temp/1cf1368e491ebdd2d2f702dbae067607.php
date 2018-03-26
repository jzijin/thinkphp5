<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:67:"/var/www/html/tp5/public/../application/admin/view/index/login.html";i:1522030263;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
<link rel="stylesheet" href="http://127.0.0.1/tp5/public/static/admin/style/css/reset.css">
<link rel="stylesheet" href="http://127.0.0.1/tp5/public/static/admin/style/css/index.css">
<link rel="stylesheet" href="http://127.0.0.1/tp5/public/static/admin/style/css/art.css">
<style>
form {
width:30%;
margin:0 auto;
}
</style>
</head>
<body>
    <header>
        <h1>Blog后台管理界面</h1>
    </header>
    <div id="main">
        <div id="respond" class="comment-respond">
            <form action="#" method="post">
                <p>
                <input placeholder="用户名" name="name" type="text" value="" size="30">
                </p>
                <p>
                <input placeholder="密码" name="password" type="text" value="" size="30">
                </p>
                <p>
                    <input placeholder="code" name="code" type="text" value="" size="30" style="width:50px;float:left;">
                    <div><img style="cursor: pointer;" src="<?php echo captcha_src(); ?>" alt="captcha" onclick="this.src='<?php echo captcha_src(); ?>?'+Math.random();" /></div>
                </p>
                <input type="submit" value="登陆">
                </p>
            </form>
        </div>
    </div>
    <footer>
        Copyright &copy; 2015 · GeneratePress · WordPress
    </footer>
</body>
</html>