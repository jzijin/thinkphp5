<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:69:"/var/www/html/tp5/public/../application/index/view/search/search.html";i:1522158619;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
<link rel="stylesheet" href="http://127.0.0.1/tp5/public/static/index/style/css/reset.css">
<link rel="stylesheet" href="http://127.0.0.1/tp5/public/static/index/style/css/index.css">
<link rel="stylesheet" href="http://127.0.0.1/tp5/public/static/index/style/css/art.css">
</head>
<body>
    <header>
        <h1>jzijin's blog</h1>
        <h4>乘风行,无惧</h4>
    </header>
    <nav>
        <ul>
            <li><a href="">导航1</a></li>
            <li><a href="">导航2</a></li>
            <li>
                <a href="">导航3</a></li>
            <li><a href="">导航4</a></li>
        </ul>
    </nav>
    <div id="main">
        <div id="lside">
            <?php if(is_array($art) || $art instanceof \think\Collection || $art instanceof \think\Paginator): $i = 0; $__LIST__ = $art;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$art): $mod = ($i % 2 );++$i;?>
            <article>
                <h2><a href="<?php echo url('/index/art/index', array('art_id'=>$art['art_id'])); ?>"><?php echo $art['title']; ?></a></h2>
                <div class="entry_header">
                    <time><?php echo date('y-m-d', $art['pubtime']); ?></time>
                    by
                    <a href="#">jzijin</a>
                    <a class="catlink" href="#">闲谈随笔</a>
                    <a class="comment" href="#"><?php echo $art['comm']; ?>条评论</a>
                </div>
                <div class="entry_content">
                    <?php echo $art['content']; ?>
                </div>
            </article>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <div id="rside">
            <aside>
                <form action="search">
                    <input type="text" name="search" placeholder="Search...">
                    <input type="submit" value="提交">
                </form>
            </aside>
        </div>
    </div>
    <footer>
        Copyright &copy; 2015 · GeneratePress · WordPress
    </footer>
</body>
</html>
