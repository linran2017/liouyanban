<?php
//起命名空间，要和文件所在的目录的路径一样，防止多个类名重复
namespace houdunwang\core;

//创建一个父级类，存放操作成功或失败，跳转页面的方法
class Controller{
    //创建一个私有属性，存储模板路径
    private $template;
    //创建私有属性，存储跳转的页面，如果setRedirect不传值就默认为跳转到当前页，
    //如果传值就跳转到传入的变量值的页面
    private $url='window.history.back()';
    //创建私有属性，存储成功或者失败操作提示消息
    private $msg;
    //创建一个公共的方法，对象被输出是就会触发这个函数，必须返回字符串
    public function __toString(){
        //加载模板
        include $this->template;
        //返回字符串，这样处理触发函数
        return '';
    }

    //创建一个受保护的方法，跳转页面，如果充值就跳到指定的页面，不传值就默认为当前页
    protected function setRedirect($sul){
        //把要跳转的页面赋值给当前对象的存储跳转页面属性
        $this->url="location.href='{$sul}'";
        //返回当前对象，因为只有输出当前对象才能调用__toString方法，这样在子级entry类里面
        //的add方法里面可以直接调用赋值后,然后在成功页面或者失败页面直接调用
        //这个属性，用js跳转到要去的页面
        return $this;
    }

    //创建一个受保护的方法，处理成功操作，传入要提示的消息
    protected function success($msg){
        //把要提示的消息赋值给当前对象存储消息提示的属性，这样在子级entry类里面
        //的add和remove方法里面可以直接调用赋值后,然后在成功页面直接调用
        //这个属性，输出消息提示的内容
        $this->msg=$msg;
        //把成功页面的路径赋值给当前对象的存储模板路径的属性
        //跳转到成功页面
        $this->template='./view/success.php';
        //返回到app/home/controller/entry.php文件里的add方法里
        //然后返回到houdunwang/core/Boot.php文件里的appRun方法，appRun方法调用echo这个当前对象
        //为了触发__toString方法
        return $this;
    }
    //创建一个受保护的方法，处理成功操作，传入要提示的消息
    protected function error($msg){
        //把要提示的消息赋值给当前对象存储消息提示的属性，这样在子级entry类里面
        //的add和remove方法里面可以直接调用赋值后,然后在失败页面直接调用
        //这个属性，输出消息提示的内容
        $this->msg=$msg;
        //把失败页面的路径赋值给当前对象的存储模板路径的属性
        //跳转到失败页面
        $this->template='./view/error.php';
        //返回到app/home/controller/entry.php文件里的add方法里
        //然后返回到houdunwang/core/Boot.php文件里的appRun方法，appRun方法调用echo这个当前对象
        //为了触发__toString方法
        return $this;
    }
}