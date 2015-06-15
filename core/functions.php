<?

function redirect($link){
    header('Location: '.$link);
    die();
}

function morph($n, $f1, $f2, $f5) {
    $n = abs(intval($n)) % 100;
    if ($n>10 && $n<20) return $f5;
    $n = $n % 10;
    if ($n>1 && $n<5) return $f2;
    if ($n==1) return $f1;
    return $f5;
}

function show404(){
    header('Location: /404/'); die;
}

function get_select_items($table,$field){
    $q=mysql_query("SELECT id,`".$field."` FROM `".$table."`");
        $rows=array();
        while ($row=mysql_fetch_assoc($q)){
            $rows[]=$row;
        }
        return $rows;
        
}

function sendmail($subject,$body,$to){
    $html='<html><head></head><body>'.$body.'</body></html>';
    $headers = '';
//    'X-Mailer: PHP/' . phpversion();
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    mail($to,$subject,$html,$headers);
    global $config;
        require("class/class.phpmailer.php");
        $mail = new PHPMailer();
        $mail->CharSet = "UTF-8";
        $mail->IsSMTP();
        
        $mail->Host = $config['mail_host'];
        $mail->Port = $config['mail_port'];
        $mail->SMTPDebug  = 0;
        $mail->SMTPAuth = true;  
        $mail->Username = $config['mail'];  
        $mail->Password = $config['mail_password']; 
        $mail->From = $config['mail'];
        $mail->FromName = $config['mail_fromname'];
        $mail->AddAddress($to);
        $mail->IsHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $body;
        return $mail->Send();
   }
   














?>