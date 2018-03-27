<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:63:"/var/www/html/tp5/public/../application/index/view/art/art.html";i:1522158067;}*/ ?>
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
            <article>
                <h2><a href="#"><?php echo $art['title']; ?></a></h2>
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
            <div id="comments">
                
                    <?php if(is_array($comm) || $comm instanceof \think\Collection || $comm instanceof \think\Paginator): $i = 0; $__LIST__ = $comm;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$comm): $mod = ($i % 2 );++$i;?>
                <ol>
                    <li>
                        <img src="https://secure.gravatar.com/avatar/582b66ad5ae1b69c7601a990cb9a661a?s=50&d=identicon&r=pg" alt="">
                        <cite><a href="#"><?php echo $comm['nick']; ?></a></cite> <br>
                        <time><?php echo date("y-m-d", $comm['pubtime']); ?></time>
                        
                    </li>
                    <li>
                        <?php echo $comm['content']; ?>
                    </li>
                </ol>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <div id="respond" class="comment-respond">
                <h3>Leave a Comment</h3>
                <form action="" method="post">
                    <p>
                    <input placeholder="your name" name="username" type="text" value="" size="30">
                    </p>
                    <p>
                    <input placeholder="Email" name="email" type="text" value="" size="30">
                    </p>
                    <p>
                    <textarea name="comment" cols="45" rows="8" aria-required="true"></textarea>
                    <p>
                    <input type="submit" value="Post Comment">
                </p>
                </form>
            </div>
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
                    <?php if(is_array($cat) || $cat instanceof \think\Collection || $cat instanceof \think\Paginator): $i = 0; $__LIST__ = $cat;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                    <li><a href=""><?php echo $v['catname']; ?></a>&nbsp;(<?php echo $v['num']; ?>)</li>
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
