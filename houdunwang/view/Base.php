<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2017/7/29
 * Time: 21:21
 */
//起命名空间的名字要和文件所在的目录的路径一样，防止多个类名重复
namespace houdunwang\view;

//创建一个Base方法，加载模板，分配变量
class Base{
    //创建私有属性，存储分配的变量
    private $data=[];
    //创建私有属性，存储模板路径
    private $template;
    //创建公共方法，分配变量
    public function with($data){
        //把处理后的数据库中数据赋值给当前对象分配变量的属性
        $this->data=$data;
        //1,返回当前对象
        //(1)返回到hondunwang/view/view里的__call static的方法了，
        //(2)hondunwang/view/view里的__call static的方法返回到aap/home/controller/entry.php里面的index方法view::with方法，
        //(3)aap/home/controller/entry.php里面的index方法又返回到houdunwang/core/Boot.phpL里面的appRun方法，在appRun方法里面用了echo输出这个当前对象
        //2，为了触发__toString方法
        return $this;
    }

    //创建公共方法，制作模板
    public function make(){
        //默认模板为../app/home/view/entry/index.php
        $this->template='../app/'.APP.'/view/'.CONTROLLER.'/'.ACTION.'.php';
        //1,返回当前对象
        //(1)返回到houdunwang/view/view.php文件里面的__callstatic方法
        //(2)houdunwang/ view/view.php文件里面的__callstatic方法又返回到app/home/controller/entry里面的index方法(view::make())
        //(3)app/home/controller/entry里面的index方法又返回给houdunwang/core/Boot.php里面的appRun方法，appRun方法用了echo这个当前对象
        //2，为了触发__toString方法
        return $this;
    }

    //只要一输出当前对象就会触发此函数
    public function __toString(){
        //把数组的键值变为变量值，键名变为变量名
        //$data=[titlr=>'在人间']
        extract($this->data);
        //加载模板
        include $this->template;
        //返回字符串，此函数必须返回字符串
        return '';
    }
}