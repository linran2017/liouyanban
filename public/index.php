<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2017/7/29
 * Time: 22:29
 */
//这是单入口页面，用户从这个页面进入
//首先加载vendor目录下的autoload.php,当调用未定义的类时就会自动加载类所在的文件
include '../vendor/autoload.php';
//调用houdunwang\core命名空间里的Boot类下面的run方法，这样就可以初始化页面，执行应用
//从而调用里面 的控制器方法，调用模板，进行一系列操作
\houdunwang\core\Boot::run();