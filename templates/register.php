<?
$error_message='';
if (isset($_POST['phone'])){
    $result=$members_module->register($_POST['name'],$_POST['last_name'],$_POST['phone'],$_POST['word'],$_POST['password'],$_POST['password2']);
    if (is_int($result)){
        redirect('/activation/'.$result);
    }else{
        $error_message=$result;
    }
}

?><!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>MyRunner | Регистрация</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../../dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="../../plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="/"><b>MyRunner</b></a>
      </div>

      <div class="register-box-body">
        <p class="login-box-msg">Регистрация</p>
        <p class="login-box-msg" style="color: red;"><?=$error_message?></p>
        <form  method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="name" value="<?=(isset($_POST['name'])?$_POST['name']:'')?>" placeholder="Имя"/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="last_name" value="<?=(isset($_POST['last_name'])?$_POST['last_name']:'')?>" placeholder="Фамилия"/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control bfh-phone" placeholder="Телефон" name="phone"  value="<?=(isset($_POST['phone'])?$_POST['phone']:'')?>"  data-format="+7 (ddd) ddd-dddd"/>
            <span class="glyphicon glyphicon-phone form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" value="<?=(isset($_POST['word'])?$_POST['word']:'')?>" name="word" placeholder="Кодовое слово"/>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" value="<?=(isset($_POST['password'])?$_POST['password']:'')?>" name="password" placeholder="Пароль"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password2"  value="<?=(isset($_POST['password2'])?$_POST['password2']:'')?>" placeholder="Подтверждение пароля"/>
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
          </div>
          <div class="row">

            <div class="col-xs-12">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Зарегистрироваться</button>
            </div><!-- /.col -->
          </div>
        </form>        

        
<br />
        <a href="/login" class="text-center">Я уже зарегистрирован</a>
      </div><!-- /.form-box -->
    </div><!-- /.register-box -->

    <!-- jQuery 2.1.4 -->
    <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="/dist/js/bootstrap-formhelpers-phone.js"></script>
    
    <script src="../../plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>