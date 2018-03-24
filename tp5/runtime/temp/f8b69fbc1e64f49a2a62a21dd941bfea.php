<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:67:"/var/www/html/tp5/public/../application/index/view/index/index.html";i:1521892184;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
<link rel="stylesheet" href="http://127.0.0.1/tp5/public/static/index/style/css/reset.css">
<link rel="stylesheet" href="http://127.0.0.1/tp5/public/static/index/style/css/index.css">
<!-- 新 Bootstrap 核心 CSS 文件 -->
<link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
 
<!-- 可选的Bootstrap主题文件（一般不使用） -->
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"></script>
 
<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
 
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <header>
        <h1>jzijin's blog</h1>
        <h4>master</h4>
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
            <?php if(is_array($arts) || $arts instanceof \think\Collection || $arts instanceof \think\Paginator): $i = 0; $__LIST__ = $arts;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$art): $mod = ($i % 2 );++$i;?>
            <article>
                <h2><a href="<?php echo url('index/art/index', array('art_id'=>$art['art_id'])); ?>"><?php echo $art['title']; ?></a></h2>
                <div class="entry_header">
                    <time><?php echo date('y-m-d', $art['pubtime']); ?></time>
                    by
                    <a href="#">jzijin</a>
                    <a class="catlink" href="#">闲谈随笔</a>
                    <!-- TODO 如果长度太长省略显示 -->
                    <a class="comment" href="#"><?php echo $art['comm']; ?>条评论</a>
                </div>
                <div class="entry_content">
                    <?php echo $art['content']; ?>
                </div>
            </article>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            <!-- <div id="pagebar">
                Pages:&nbsp;
                <a href="#">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                4
                <a href="#">5</a>
                <a href="#">6</a>
            </div> -->
            <?php echo $arts->render(); ?>
        </div>
        <div id="rside">
            <aside>
                <form action="">
                    <input type="text" name="search" placeholder="Search...">
                </form>
            </aside>
            <aside>
                <h4>栏目</h4>
                <ul>
                    <?php if(is_array($cats) || $cats instanceof \think\Collection || $cats instanceof \think\Paginator): $i = 0; $__LIST__ = $cats;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cat): $mod = ($i % 2 );++$i;?>
                    <li><a href="<?php echo url('catart', array('cat_id'=>$cat['cat_id'])); ?>"><?php echo $cat['catname']; ?></a>&nbsp;(<?php echo $cat['num']; ?>)</li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </aside>
        </div>
    </div>
    <footer>
        Copyright &copy; 2015 · GeneratePress · WordPress
    </footer>
</body>
</html>