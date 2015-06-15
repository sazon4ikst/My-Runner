<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>MyRunner | Администрирование</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link href="../../plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    
    <!-- jvectormap -->
    <link href="plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    
    <script src="/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src='/plugins/fastclick/fastclick.min.js'></script>
    <script src="/dist/js/app.min.js" type="text/javascript"></script>
    <script src="/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <script src="/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <script src="/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="/plugins/chartjs/Chart.min.js" type="text/javascript"></script>
    
    <script src="/dist/js/demo.js" type="text/javascript"></script>
    <script src="/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
  </head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>MR</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>MyRunner</b> Admin</span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Сжать</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="user user-menu">
                <a href="/" class="dropdown-toggle" data-toggle="dropdown">
                  <span class="hidden-xs">Администратор</span>
                </a>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="/logout"><i class="fa fa-power-off"></i></a>
              </li>
            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class=" treeview">
              <a href="#">
                <i class="fa fa-users"></i> <span>Пользователи</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="/"><i class="fa fa-truck"></i> Курьеры</a></li>
                <li><a href="/"><i class="fa fa-suitcase"></i> Клиенты</a></li>
                <li><a href="/"><i class="fa fa-sliders"></i> Настройки</a></li>
              </ul>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-shopping-cart"></i>
                <span>Заказы</span>
              </a>
             
            </li>
            <li>
              <a href="#">
                <i class="fa fa-envelope"></i>
                <span>Рассылки</span>
              </a>
              
            </li>
            <li>
              <a href="#">
                <i class="fa fa-comment"></i>
                <span>Отзывы</span>
              </a>
              
            </li>
            
            <li>
              <a href="#">
                <i class="fa fa-pencil"></i>
                <span>Статические страницы</span>
              </a>
              
            </li>
            <li>
              <a href="#">
                <i class="fa fa-minus-circle"></i>
                <span>Фильтр нецензурных слов</span>
              </a>
              
            </li>
            <li>
              <a href="#">
                <i class="fa fa-minus-circle"></i>
                <span>Справочники</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="/"><i class="fa fa-minus-circle"></i> Фильтр нецензурных слов</a></li>
                <li><a href="/"><i class="fa fa-suitcase"></i> Тип груза</a></li>
                <li><a href="/"><i class="fa fa-sliders"></i> Способы оплаты</a></li>
                <li><a href="/"><i class="fa fa-sliders"></i> Статусы заказа</a></li>
              </ul>
            </li>
            
            
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->