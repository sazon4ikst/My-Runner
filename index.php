<?
    $name="mr";
    $pass="mr";
    $url_site=$_SERVER['HTTP_HOST'];
    if (!isset($_SERVER['PHP_AUTH_USER']) || $_SERVER['PHP_AUTH_USER']!=$name || $_SERVER['PHP_AUTH_PW']!=$pass)
    {
        header("WWW-Authenticate: Basic realm=\"".$url_site."\"");
        header("HTTP/1.0 401 Unauthorized");
        exit("<b><a href=http://".$url_site.">".$url_site."</a> : Access Denied</b>");
    }
?>
<?
ini_set("display_errors",1);
error_reporting(E_ALL);

include('core/engine.php');
 
date_default_timezone_set('Asia/Almaty'); 
mysql_query("SET `time_zone` = '".date('P')."'"); 
    
if(isset($_GET['show'])){
    $show=$_GET['show'];
}else{
    $show='main';
}

if (!isset($_SESSION['auth'])&&($show!='login')&&($show!='register')&&($show!='activation')){
    redirect('/login');
}
if (isset($_SESSION['auth']) && ($show=='register')){
        redirect('/');   
}


if ($show=='logout'){
    $members_module->logout();
        redirect('/');   
}

switch ($show){
    case 'main':        include('templates/header.php');        include('templates/main.php');      include('templates/footer.php'); break;
    case 'login':       include('templates/login.php'); break;
    case 'register':    include('templates/register.php'); break;
    case 'static':      include('templates/header.php');        include('templates/static.php');    include('templates/footer.php'); break;
    case 'activation':  include('templates/activation.php'); break;
    case 'messages':    include('templates/header.php');        include('templates/messages.php');  include('templates/footer.php'); break;
    case 'orders':      include('templates/header.php');        include('templates/orders.php');    include('templates/footer.php'); break;
    case 'new_order':   include('templates/header.php');        include('templates/create_order.php');    include('templates/footer.php'); break;
    case 'tyre':        include('templates/tyre.php'); break;
    case 'allsizes':    include('templates/allsizes.php'); break;
    case 'car':         include('templates/car.php'); break;
    case '404':         include('templates/header.php');        include('templates/404.php');       include('templates/footer.php'); break;;
    case 'cart':        include('templates/cart.php'); break;
    default:            include('templates/404.php'); break;
}



?>
