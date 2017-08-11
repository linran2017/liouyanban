<?php
//命名空间的名字要和所在的目录的路径一样，防止多个类名重复
namespace houdunwang\model;
//创建一个模型类，处理数据库中的数据
class Model{
    //创建一个公共的静态方法，调用未定义的静态方法，传入方法名，方法参数
    //1,比如在app/home/controller/entry.php文件的index方法调用Model里q方法（Model::q()）
    //2,但是Model中没有静态方法，所以就触发__callstatic方法
    public static function __callStatic($name, $arguments){
        //获得类名，比如system\model\Arc
        $className=get_called_class();
        //1,从右截取字符串，获得\Arc
        //2,去除左边的‘\’，获得Arc
        //3,转为小写，获得arc
        $table=strtolower(ltrim(strrchr($className,'\\'),'\\'));
        //于是就自动调用Model对象里面的方法，传递表名，就可以找到操作哪张表，并且传递方法里面的参数
        //再返回给app/home/controller/entry.php文件里面的index方法（Model::q()）
        //app/home/controller/entry.php文件里面的index方法再返回给houdunwang/core/Boot.php里面的appRun方法
        //houdunwang/core/Boot.php里面的appRun方法用了echo这个对象
        //为了触发__toString方法，处理数据库中的数据
        return call_user_func_array([new Base($table),$name],$arguments);
    }
}
?>