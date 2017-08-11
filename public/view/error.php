<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./static/bt3/css/bootstrap.min.css" />
    <title>Document</title>
</head>
<body>
<div class="jumbotron" style="text-align: center">
    <!-- 显示提示的消息，比如如果是删除失败，删除失败后就跳转到此页面（成功页面）显示‘删除失败’-->
    <h1><?php echo $this->msg?></h1>
    <p>如果没有跳转，请点击下面的按钮</p>
    <!--点击按钮，跳转到指定的页面，比如，删除失败后就点击按钮跳转到首页-->
    <p><a class="btn btn-primary" href="javascript:<?php echo $this->url?>">跳转</a></p>
</div>
<script>
    //1500微妙后跳转到指定的页面，比如删除后，1500微妙后跳转到首页
    setTimeout(function () {
        <?php echo $this->url?>
    },1500)
</script>
</body>
</html>