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
<div class="container">
    <h2 style="margin: 10px auto;text-align: center">更新标题</h2>
    <form action="" method="post" class="form-horizontal">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">标题</label>
            <div class="col-sm-10">
                <!--在编辑之前，文本框中的value值为要编辑这一条标题的旧数据-->
                <input type="text" class="form-control" id="inputEmail3" value="<?php echo $oldData['title'] ?>" name="title">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">点击量</label>
            <div class="col-sm-10">
                <!--在编辑之前，文本框中的value值为要编辑这一条标题的旧数据-->
                <input type="text" class="form-control" id="inputEmail3" value="<?php echo $oldData['click'] ?>" name="click">
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
                <button type="submit" class="btn btn-success">更新</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>