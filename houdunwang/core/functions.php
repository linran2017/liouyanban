<?php
//创建一个格式化输出变量的函数
function p($var){
    //原样输出标签，让数组格式化在页面显示
    echo '<pre style="background: #ccc; padding: 5px; font-size: 16px;">';
    //打印变量
    print_r($var);
    //闭合原样输出的标签
    echo '</pre>';
}
//创建c函数，传递（配置项，属性）
//c('captcha.length')
//c('database.db_name');
function c($path){
    //把传递的参数拆分成数组，便于单独处理
    $arr=explode('.',$path);
    //因为以后还有其他配置项，所以配置项database不能写死
    //$arr=['database','db.name'];
    //组合模板路径，引入配置项里面的文件
    //如果是数据库$arr[0]就是database
    //如果要链接数据库就加载../system/config/database.php文件
    $config=include '../system/config/'.$arr[0].'.php';
    //如果要链接数据库，$arr[1]就表示数据库里面的属性，因为还需要链接其他数据库属性，所以数据库不能写死
    //$config[$arr[1]]就表示为数据库文件里面返回的数据库数组的db.name属性值
    //1，如果存在数据库的属性值好返回，否则返回null
    //2，返回到hondunwang/core/model/Model.php,
    //3，最后再调用model/Base.php文件里面的connect方法
    //4，调用c函数，链接数据库
    return isset($config[$arr[1]])?$config[$arr[1]]:NULL;
}