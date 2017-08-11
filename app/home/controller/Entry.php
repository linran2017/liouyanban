<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2017/7/28
 * Time: 22:36
 */
//命名空间的名字要和文件所在的目录的路径一样，防止多个类名重复
namespace app\home\controller;
//使用houdunwang\core\Controller类，才能调用此类
use houdunwang\core\Controller;
//使用houdunwang\core\Model类，才能调用此类
use houdunwang\model\Model;
//使用houdunwang\core\View类，才能调用此类
use houdunwang\view\View;
//使用system\model\Arc类，才能调用此类
use system\model\Arc;
//使用Gregwar\Captcha\CaptchaBuilder，才能调用此类
use Gregwar\Captcha\CaptchaBuilder;
//创建处理首页，添加，删除等操作的类，继承父级类
class Entry extends Controller{
    //创建公共方法，显示首页
    public function index(){
        //获得arc表中所有的数据
        //Arc中没有get方法，所以就调用父级类houdunwang\model\Model
        //houdunwang\model\Model中没有get方法，就使用houdunwang\model\Base里面的get方法,获得数据库的所有数据
        $arcData=Arc::get();
        //如果用户点击提交
        if(IS_POST){
            //如果用户输入的验证码和session里存储的验证码不一样
            if(strtolower($_POST['captcha'])!=strtolower($_SESSION['phrase'])){
                //就跳入失败页面，提示‘验证码输入错误’
                return $this->error('验证码输入错误');
            }
            //添加保存数据
            //Arc中没有save方法，所以就调用父级类houdunwang\model\Model
            //houdunwang\model\Model中没有get方法，就使用houdunwang\model\Base里面的save方法,添加数据库的所有数据
            Arc::save($_POST);
            //跳转到成功页面，提示添加成功，返回到首页
            return $this->success('添加成功')->setRedirect('index.php');
        }
        //$oneData=Arc::find(24);
        //p($oneData);
//        p($arcDate);
        //p($data);
        //1，把变量名转为数组的键名，把变量值转为数组的键值
        //['data'=>$data]
        //2，加载首页模板
        //3，返回到houdunwang/core/Boot.php文件里的appRun方法，appRun方法调用echo这个当前对象
        //4，为了触发__toString方法，
        //5，首页就可以显示内容
        //return View::with(compact('arcDate'))->make();
        return View::with(compact('arcData'))->make();
    }
    //创建更新数据的类
    public function update(){
        //获得要更新这条数据所对应的aid
        $aid=$_GET['aid'];
        //如果用户点击更新
        if (IS_POST){
            //如果用户输入的验证码和session里存储的验证码不一样
            if(strtolower($_POST['captcha'])!=strtolower($_SESSION['phrase'])){
                //1，调用父级类里面的失败操作的方法， 跳转到失败页面，在页面显示‘验证码输入错误’
                //2，返回到houdunwang/core/Boot.php文件里的appRun方法，appRun方法调用echo这个当前对象
                //3，为了触发__toString方法
                return $this->error('验证码输入错误');
            }
            //p($_POST);die;
            //更新aid所对应的这一条数据
            //Arc中没有where和update方法，所以就调用父级类houdunwang\model\Model
            //houdunwang\model\Model中没有get方法，就使用houdunwang\model\Base里面的where和update方法
            Arc::where("aid={$aid}")->update($_POST);
            //跳转到成功页面，提示添加成功，返回首页

            return $this->success('更新成功')->setRedirect('index.php');
        }
        //查询aid所对应的这一条数据
        $oldData=Arc::find($aid);
        //1，把变量名转为数组的键名，把变量值转为数组的键值
        //['data'=>$data]
        //2，加载首页模板
        //3，返回到houdunwang/core/Boot.php文件里的appRun方法，appRun方法调用echo这个当前对象
        //4，为了触发__toString方法，
        //5，首页就可以显示内容
       return View::with(compact('oldData'))->make();
    }



    //创建公共方法，执行删除的操作
    public function remove(){
        //获得要删除这一条标题的所对应的aid编号
        $aid=$_GET['aid'];
        //从数据库里面删除编号所对应的这一条数据
        //Arc中没有where和destory方法，所以就调用父级类houdunwang\model\Model
        //houdunwang\model\Model中没有get方法，就使用houdunwang\model\Base里面的where和destory方法
        Arc::where("aid={$aid}")->destory();
        //1，调用父级类里面的成功操作的方法， 跳转到成功页面在页面显示添加成功
        //2，返回到houdunwang/core/Boot.php文件里的appRun方法，appRun方法调用echo这个当前对象
        //3，为了触发__toString方法
        return $this->success('删除成功');
    }

    //创建验证码类
    public function captcha(){
        //发送头部
        header('Content-type: image/jpeg');
        //实例化验证码对象
        $builder=new CaptchaBuilder();
        //
        $builder->build();
        $builder->output();
        //把验证码的值存储到session里
        $_SESSION['phrase']=$builder->getPhrase();
        }

}