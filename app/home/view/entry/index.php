<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./static/bt3/css/bootstrap.min.css" />
    <title>留言板</title>
</head>
<body>
<div class="jumbotron" style="text-align: center">
    <h2>欢迎使用我的框架</h2>
</div>
<div class="container">
    <h2 style="margin: 10px auto;text-align: center">添加标题</h2>
    <form action="" method="post" class="form-horizontal">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">标题</label>
            <div class="col-sm-10">
                <!--在编辑之前，文本框中的value值为要编辑这一条标题的旧数据-->
                <input type="text" class="form-control" id="inputEmail3" name="title">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">点击量</label>
            <div class="col-sm-10">
                <!--在编辑之前，文本框中的value值为要编辑这一条标题的旧数据-->
                <input type="text" class="form-control" id="inputEmail3" name="click">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">验证码</label>
            <div class="col-sm-10">
                <!--在编辑之前，文本框中的value值为要编辑这一条标题的旧数据-->
                <input type="text" class="form-control" id="inputEmail3" name="captcha" required="required">
               <br/>
                <img            src="?s=home/entry/captcha&mt=<?php echo rand()?>" />
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success">添加</button>
            </div>
        </div>
    </form>
    <br/><br/>
    <table border="1" class="table table-hover" style="text-align: center">
        <tr>
            <td>aid</td>
            <td>标题</td>
            <td>点击量</td>
            <td>操作</td>
        </tr>
<!--        循环遍历arc表里面的数据，有几条数据下面就会生成几条tr-->
        <?php foreach ($arcData as $k=>$v): ?>
        <tr>
            <!--输出表里面的aid-->
            <td><?php echo $k+1?></td>
            <!--输出表里面的标题-->
            <td><?php echo $v['title']?></td>
            <td><?php echo $v['click']?></td>
            <td>
               <!-- 点击编辑，跳到编辑页面，获得要编辑这条标题的aid-->
                <a href="?s=home/entry/update&aid=<?php echo $v['aid'] ?>"><button type="button" class="btn btn-primary">编辑</button></a>
                <!-- 点击删除，如果点击确定，就跳到删除页面，获得要删除这条标题的aid，如果点击取消就返回当前页，取消删除操作-->
                <a href="?s=home/entry/remove&aid=<?php echo $v['aid'] ?>"><button type="button" class="btn btn-primary">删除</button></a>
            </td>
        </tr>
            <!--结束循环-->
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>