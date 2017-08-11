<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2017/7/28
 * Time: 22:14
 */
//起命名空间的名字要和文件所在的目录路径一样，防止多个类名重复
namespace houdunwang\core;

//创建一个初始化框架，执行应用的核心类
class Boot{
    //创建一个公共的静态方法，初始化框架，执行应用
    public static function run(){
        //调用静态方法，初始化框架
        self::init();
        //调用静态方法执行应用
        self::appRun();
    }
    //创建一个公共的静态方法，执行应用
    private static function appRun(){
        //默认是调用app/home/view/Entry/index里的方法
        //home/entry/index是要在不同的情况下会改变，所以单独拿出来做处理
        //?s=home/entry/index
        //如果get参数存在$s就为get参数s的值，如果不存在就默认我home/entry/index
        //所以默认载入..app/home/view/Entry/index里的方法,加载的是网站首页的模板
        $s=isset($_GET['s'])?strtolower($_GET['s']):'home/entry/index';
        //把字符串拆分成数组，为了把home,entry,index分别定义为变量，在不同的情况下调用不同的方法
        $arr=explode('/',$s);
        //组合成这样的数组
        //$arr=[
        //[0=>'home'],
        //[1=>'entry'],
        //[0=>'index'],
        //]
        //1,把应用比如‘home’定义为常量
        //2,在houdunwang/view/view.php文件里的make方法组合模板路径，需要用到的应用比如‘home’
        //3，因为还有其他应用，比如admin,所以‘home’不能写死
        //4，因为是局部变量，所以需要定义为常量，这样可以在任何时候调用
        define('APP',$arr[0]);
        //1，把类名比如entry定义为常量
        //2，在houdunwang/wiew/wiew.php的make方法组合模板路径，需要用到类名比如‘controller’
        //3，因为还有其他类，所以'entry'不能写死
        //因为是局部变量，所以要转为常量才可以在任何地方调用
        define('CONTROLLER',$arr[1]);
        //1，把方法比如'index'定义为常量
        //2,在houdunwang/view/view.php组合模板路径，需要用到方法比如‘index’
        //3，因为还有其他方法，所以‘index’不能写死
        //4,因为是局部变量，所以定义为常量才可以在任何地方调用
        define('ACTION',$arr[2]);
        //组合类名:\app\home\controller\Ertry
        //因为是类名，所以定义类名的变量首字母要大写
        $className="\app\\{$arr[0]}\controller\\".ucfirst($arr[1]);
        //自动调用命名空间里面类的方法
        //默认调用\app\home\controller\Ertry方法
        //因为这样输出当前对象才能调用__toString方法
        echo call_user_func_array([new $className,$arr[2]],[]);
    }
    //创建一个私有的静态方法，初始化框架
    private static function init(){
        //因为使用session时session必须要打开，而且只能打开一次
        //所以如果有session_id，就不打开session,如果没有就打开
        session_id() || session_start();
        //设置时区为东八区
        date_default_timezone_set('PRC');
        //设置常量'IS_POST'的值如果用户的提交方式是post,就为true,不是就为false
        define('IS_POST',$_SERVER['REQUEST_METHOD']=='POST'?true:false);
    }
}