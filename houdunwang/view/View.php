<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2017/7/29
 * Time: 21:16
 */
//命名空间起名要和文件所在的目录的路径一样，防止多个类名重复
namespace houdunwang\view;

//创建视图类
class View{
    //调用未定义的静态方法就会触发此函数
    //1,比如在app/home/controller/entry.php文件的index方法调用View的make方法（View::make()）
    //2,但是View中没有make静态方法，所以就触发__callstatic方法
    public static function __callStatic($name, $arguments){
        //3,于是就自动调用Base对象里面的make方法，并且传递方法里面的参数
        //4,再返回给app/home/controller/entry.php文件里面的index方法（View::make()）
        //5，app/home/controller/entry.php文件里面的index方法再返回给houdunwang/core/Boot.php里面的appRun方法
        //6,houdunwang/core/Boot.php里面的appRun方法用了echo这个对象
        //7，为了触发__toString方法，在页面显示视图模板
        return call_user_func_array([new Base(),$name],$arguments);
    }
}