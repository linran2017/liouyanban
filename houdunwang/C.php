<?php

/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2017/7/29
 * Time: 20:45
 */

namespace houdunwang\core;


class Controller{
    private $template;
    private $url='window.history.back()';
    private $msg;
    public function __toString(){
        include $this->template;
        return '';
    }
    protected function setRedirect($sul){
        $this->url="location.href='{$sul}'";
        return $this;
    }
    protected function success($msg){
        $this->msg=$msg;
        $this->template='./view/success.php';
        return $this;
    }
    protected function error($msg){
        $this->msg;
        $this->template='./view/error.php';
    }
}