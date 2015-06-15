<?
ini_set("display_errors",1);
error_reporting(E_ALL);

include('core/engine.php');

date_default_timezone_set('Asia/Almaty'); 
mysql_query("SET `time_zone` = '".date('P')."'"); 




if($_SERVER['REQUEST_METHOD'] == 'PUT') { 
  $putdata = file_get_contents('php://input'); 
  $exploded = explode('&', $putdata);  
 
  foreach($exploded as $pair) { 
    $item = explode('=', $pair); 
    if(count($item) == 2) { 
      $_POST[urldecode($item[0])] = urldecode($item[1]); 
    } 
  } 
}

if($_SERVER['REQUEST_METHOD'] == 'DELETE') { 
  $deletedata = file_get_contents('php://input'); 
  $exploded = explode('&', $deletedata);  
 
  foreach($exploded as $pair) { 
    $item = explode('=', $pair); 
    if(count($item) == 2) { 
      $_POST[urldecode($item[0])] = urldecode($item[1]); 
    } 
  } 
}


$result=array();

switch ($_SERVER['REQUEST_METHOD']){
    case 'GET':     
        switch($_GET['cmd']){
            case 'profile': 
                    $result=$api_module->profile(); 
            break;
            case 'order': 
                    $result=$api_module->order($_GET['a']); 
            break;
            case 'message': 
                    $result=$api_module->message(); 
            break;
        }
    break;
    case 'POST':    
        switch($_GET['cmd']){
            case 'registration':
                    $result=$api_module->registration($_POST['name'],$_POST['last_name'],$_POST['phone'],$_POST['word'],$_POST['password']); 
            break;
            case 'registration_complete':
                    $result=$api_module->registration_complete($_POST['sms_code'],$_POST['user_key']); 
            break;
            case 'auth':
                    $result=$api_module->auth($_POST['phone'],$_POST['password']); 
            break; 
            case 'message':
                    $result=$api_module->message($_POST['to'],$_POST['message']); 
            break;
        }
    break;
    case 'PUT':     
        switch($_GET['cmd']){
            case 'profile':
                    $result=$api_module->profile(); 
            break;
        }
    break;
    case 'DELETE':  break;
}



echo json_encode($result);

header('HTTP/1.1 202 Accepted');  //201 Created  //202 Accepted  //401 Unauthorized
//header('Location: http://mr.dev.evo.kz/api/users');
?>