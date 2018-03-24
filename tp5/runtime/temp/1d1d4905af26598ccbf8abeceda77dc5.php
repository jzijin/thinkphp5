<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:69:"/var/www/html/tp5/public/../application/admin/view/index/artedit.html";i:1521565587;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
<link rel="stylesheet" href="http://127.0.0.1/tp5/public/static/admin/style/css/reset.css">
<link rel="stylesheet" href="http://127.0.0.1/tp5/public/static/admin/style/css/adm.css">
<script type="text/javascript" charset="utf-8" src="http://127.0.0.1/tp5/public/static/admin/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="http://127.0.0.1/tp5/public/static/admin/ueditor/ueditor.all.min.js"> </script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="http://127.0.0.1/tp5/public/static/admin/ueditor/lang/zh-cn/zh-cn.js"></script>
<!-- <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css"> -->
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
                    <label>标题:</label>
                    <p>
                        <input type="text" name="title" value="<?php echo $art['title']; ?>">
                    </p>
                </div>
                <div class="form-group">
                    <label>栏目:</label>
                    <p>
                        <select name="cat_id">
                            <?php if(is_array($catlist) || $catlist instanceof \think\Collection || $catlist instanceof \think\Paginator): $i = 0; $__LIST__ = $catlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$catlist): $mod = ($i % 2 );++$i;?>
                            <!-- 由于模板传过来的是一维数组 所以这边要这么用 -->
                            <option value="<?php echo $catlist['cat_id']; ?>" 
                            <?php if($art['cat_id'] == $catlist['cat_id']): ?>
                            selected = "selected"
                            <?php endif; ?>><?php echo $catlist['catname']; ?></option>
                            
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </p>
                </div>
                <div class="form-group">
                    <label >内容:</label>
                    <p>
                        <script id="editor" type="text/plain" style="width:600px;height:400px;" name="content"><?php echo $art['content']; ?></script>

                    </p>
                </div>
                <div class="form-group">
                    <label>标签:</label>
                    <p>
                        <input type="text" name="tags" value="<?php echo $tag; ?>">
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
<script>
    var ue = UE.getEditor('editor');
</script>
</html>