<?
if (!isset($_GET['a'])) redirect('/register');
$error_message='';
if (isset($_POST['sms_code'])){
    $result=$members_module->activation($_POST['sms_code'],$_GET['a']);
    $error_message=$result;
    if ($result===true){
        redirect('/');
    }elseif ($result===false){
        $error_message='Неверно введен код.';
    }
}
?><!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>MyRunner | Авторизация</title>
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
      </div><!-- /.login-logo -->
      <div class="login-box-body">
      <p class="login-box-msg">Активация аккаунта</p>
      <p class="login-box-msg" style="color: red;"><?=$error_message?></p>
        <form method="post">
          
          <div class="form-group has-feedback">
            <input type="text" class="form-control"  placeholder="Код активации" name="sms_code"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-6">    
              <a href="/register" class="text-center">Регистрация</a>
            </div><!-- /.col -->
            <div class="col-xs-6">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Активировать</button>
            </div><!-- /.col -->
          </div>
        </form>


        

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="/dist/js/bootstrap-formhelpers-phone.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
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