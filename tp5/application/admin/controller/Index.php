<?php
namespace app\admin\controller;
use think\Controller;
use \think\Loader;
use \think\Db;


class Index extends Controller
{    
    public function index()
    {
        if(!acc()) {
            // header('Location: login.php');
            $this->redirect('login');
        }
        if(request()->isPost()) {
            $data = [
                // 去掉左右两边的空格
                'catname' => trim(input('catname')),
            ];

            $validate = Loader::validate('Admin');
            if(!$validate->check($data)) {
                $this->error($validate->getError());
                die;
            }
            
            if(Db::name('cat')->insert($data)) {
                return $this->success('添加栏目成功', 'catlist');
            } else {
                return $this->error('添加栏目失败');
            }
        }
        return $this->fetch('catadd');
    }

    public function catlist() {
        if(!acc()) {
            // header('Location: login.php');
            $this->redirect('login');
        }
        $catlist = Db::name('cat')->paginate(5);
        $page = $catlist->render();
        // 把分页数据赋值给模板变量list
        $this->assign('list', $catlist);
        $this->assign('page', $page);
        // dump($catlist);
        return $this->fetch('catlist');
    }

    public function catdel() {
        if(!acc()) {
            // header('Location: login.php');
            $this->redirect('login');
        }
        // 删除栏目
        $cat_id = input('cat_id');
        if(Db::name('cat')->where('cat_id',$cat_id)->delete()) {
            $this->success('栏目删除成功');
        } else {
            $this->error('栏目删除失败');
        }
    }

    public function catedit() {
        if(!acc()) {
            // header('Location: login.php');
            $this->redirect('login');
        }
        // get 请求
        // dump(input('cat_id'));
        $cat_id = input('cat_id');
        $cat = Db::name('cat')->where('cat_id',$cat_id)->find();
        $this->assign('cat', $cat);
        /********* ***********************/

        // 判断是否为post请求
        if(request()->isPost()) {
            // dump(input('catname'));
            $data = [
                // 把左右两边的空格去掉
                'catname' => trim(input('catname')),
            ];

            if(Db::name('cat')->where('catname', $data['catname'])->find()) {
                $this->error('栏目已经存在');
            }

            $validate = Loader::validate('Admin');
            if(!$validate->check($data)) {
                $this->error($validate->getError());
                die;
            }
            
            if(Db::name('cat')->where('cat_id', $cat_id)->data($data)->update()) {
                return $this->success('修改栏目成功', 'catlist');
            } else {
                return $this->error('修改栏目失败');
            }
        }
        return $this->fetch('catedit');
    }

    public function artadd() {
        if(!acc()) {
            // header('Location: login.php');
            $this->redirect('login');
        }
        // 查询出栏目名称传到文章添加的页面
        $catlist = Db::name('cat')->select();
        $this->assign('catlist', $catlist);
        
        // 处理artadd传过来的表单
        if(request()->isPost()) {

            $data = [
                // 去掉左右两边的空格
                'title' => trim(input('title')),
                'cat_id' => input('cat_id'),
                'content' => trim(input('content')),
                // 'tags' => trim(input('tags')),
                'pubtime' => time()
            ];
            
            // 有文件上传
            if($_FILES['pic']['tmp_name']) {
                $file = request()->file('pic');
                $info = $file->validate(['ext'=>'jpg,png,gif'])->move( './static/admin/uploads');
                
                // 得到文件保存名字
                $data['pic'] = 'static/admin/uploads/'.$info->getSavename(); 
            }

            $validate = Loader::validate('Artaddvalidate');
            if(!$validate->check($data)) {
                $this->error($validate->getError());
                die;
            }
            $art = Db::name('art')->order('art_id', 'desc')->limit(1)->find();
            $tags = [
                'tag' => trim(input('tags')),
                'art_id' => $art['art_id']
            ];

            $validate = Loader::validate('Tags');
            if(!$validate->check($tags)) {
                // Db::name('art')->where('art_id', $art['art_id'])->delete();
                $this->error($validate->getError());
                
            }

            if(Db::name('art')->insert($data)) {
                // 文章添加成功 在栏目表中的的文章数目加1
                $cat = Db::name('cat')->where('cat_id', $data['cat_id'])->find();
                $num = $cat['num'] + 1;
                Db::name('cat')->where('cat_id', $data['cat_id'])->update(['num' => $num]);

                // 添加标签
                Db::name('tag')->insert($tags);               
                return $this->success('添加文章成功', 'artlist');
            } else {
                return $this->error('添加文章失败');
            }
        }
        return $this->fetch('artadd');
    }

    public function artlist() {
        
        if(!acc()) {
            // header('Location: login.php');
            $this->redirect('login');
        }

        // 查询数据
        // $sql = "select art_id,title,pubtime,comm,catname from art left join cat on art.cat_id=cat.cat_id";
        $artlist = Db::name('art')->alias('a')->join('cat c', 'a.cat_id = c.cat_id')->select();
        // $artlist = Db::query($sql);

        // 模板变量
        $this->assign('artlist', $artlist);
        return $this->fetch('artlist');
    }

    public function artdel() {
        if(!acc()) {
            // header('Location: login.php');
            $this->redirect('login');
        }
        // 删除文章
        $art_id = input('art_id');
        if(Db::name('art')->where('art_id',$art_id)->delete()) {
            
            // 查询文章对应的cat_id 的值， 也可以heml隐士的传递过来 效率更高
            $cat_id = Db::name('art')->where('art_id', $art_id)->value('cat_id');

            // 文章成功删除后让栏目的文章数减一
            Db::name('cat')->where('cat_id', $cat_id)->update([
                'num' => ['exp', 'num+1']
            ]);

            // 如果查到改文章下有标签删除改标签
            if(Db::execute("select 1 from tag where art_id = $art_id")) {
                Db::name('tag')->where('art_id', $art_id)->delete();
            }

            $this->success('文章删除成功', 'artlist');
        } else {
            $this->error('文章删除失败');
        }
    }

    public function artedit() {
        if(!acc()) {
            // header('Location: login.php');
            $this->redirect('login');
        }
        // 查找出所有的栏目
        $cats = Db::name('cat')->select();
        $art_id = input('art_id');
        $sql= "select art.*, cat.* from art left join cat on art.cat_id = cat.cat_id where art_id = $art_id";
        // 查询 返回二维数组 所以传递的时候传递第一个单元
        $art = Db::query($sql);
        $tag = Db::name('tag')->where('art_id', $art_id)->value('tag');
        $tag = $tag == NULL ? '':$tag;

        // 处理artadd传过来的表单
        if(request()->isPost()) {
            $data = [
                // 去掉左右两边的空格
                'title' => trim(input('title')),
                'cat_id' => input('cat_id'),
                'content' => trim(input('content')),
                // 'tags' => trim(input('tags')),
                'lastup' => time()
            ];

            $validate = Loader::validate('Artaddvalidate');
            if(!$validate->check($data)) {
                $this->error($validate->getError());
                die;
            }
            
            if(Db::name('art')->where('art_id', $art_id)->data($data)->update()) {
                
                $tags = [
                    'tag' => trim(input('tags'))
                ];        
                // 把验证标签的长度等合法性
                $validate = Loader::validate('Tags');
                if(!$validate->check($tags)) {
                    // Db::name('art')->where('art_id', $art_id)->delete();
                    $this->error($validate->getError());
                    
                } else {
                    Db::name('tag')->where('art_id', $art_id)->data($tags)->update();
                }
                return $this->success('修改文章成功', 'artlist');
                
            } else {
                return $this->error('修改文章失败');
            }
        }
        $this->assign('art', $art[0]);
        $this->assign('tag', $tag);
        $this->assign('catlist', $cats);
        return $this->fetch('artedit');
    }

    public function useradd() {

        if(request()->isPost()) {
            $data['name'] = trim(input('username'));
            $data['password'] = trim(input('password'));
            // $data['repassword'] = trim(input('repassword'));
            $repassword = trim(input('repassword'));

            // 判断两次输入的用户名是否相同
            if ($data['password'] != $repassword) {
                $this->error('两次输入的密码不相同');
                die;
            }

            $validate = Loader::validate('Useradd');
            if(!$validate->check($data)) {
                $this->error($validate->getError());
            } else {
                // md5 加密 加上一段盐;
                $data['password'] = md5($data['password'].'jzijin');
                Db::name('user')->insert($data);
                $this->success('用户添加成功');
            }
        }

        return $this->fetch('useradd');
    }

    public function login() {
        if(request()->isPost()) {
            $data['name'] = trim(input('username'));
            $data['password'] = trim(input('password'));
            $validate =  Loader::validate('Login');
            if(!$validate->check($data)) {
                $this->error($validate->getError());
            }

            $user = Db::name('user')->field('password')->where('name', $data['name'])->find();
            // dump($user);
            if($user['password'] === NULL || $user['password'] != $data['password']) {
                // 如果根据用户名查找不到
                $this->error('用户名或密码错误');
            }
            cookie('name', $data['name']);
            cookie('ccode', md5($data['name']));

            $this->success('登陆成功', 'artlist');
        }
        return $this->fetch('login');
    }

    public function logout() {
        cookie('name', null);
        $this->redirect('login');
    }

    
}

