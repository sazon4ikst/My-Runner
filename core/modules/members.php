<?
class Members
{
    function Members(){
        
    }
    
    public function login($phone,$password){
        $q=mysql_query("SELECT * FROM members WHERE phone='".addslashes($phone)."' AND password='".md5($password)."' LIMIT 1");
        if ($row=mysql_fetch_assoc($q)){
            if ($row['status']==1){
                $_SESSION['auth']=1;
                $_SESSION['user']=$row['id'];
                return true;
            }else{
                return 'Аккаунт не активирован';                
            }
        }else{
            return false;
        }
    }

    public function runner_login($phone,$password){
        $return=array('result'=>false);
        $q=mysql_query("SELECT * FROM members WHERE phone='".addslashes($phone)."' AND password='".md5($password)."' LIMIT 1");
        if ($row=mysql_fetch_assoc($q)){
            if ($row['status']==1){
                $return['result']=true;
                $return['user_key']=$row['id'];
            }else{
                $return['result']=false;
                $return['error_description']='Аккаунт не активирован';
            }
        }else{
            $return['result']=false;
            $return['error_description']='Неверно введен пароль';
        }
        return $return;
    }
    
    public function logout(){
        unset($_SESSION['auth']);
        unset($_SESSION['user']);
        return true;   
    }
    
     public function activation($sms_code,$id){
        $q=mysql_query("SELECT * FROM members WHERE sms_code='".addslashes($sms_code)."' AND sms_code<>'' AND id='".intval($id)."' LIMIT 1");
        if ($row=mysql_fetch_assoc($q)){
            mysql_query("UPDATE members SET sms_code='', status=1 WHERE id='".intval($id)."'");
            $_SESSION['auth']=1;
            $_SESSION['user']=$row['id'];
            return true;
        }else{
            return false;
        }
     }
     
     
     public function get_member_info(){
         if (!isset($_SESSION['user'])) return false;
        $q=mysql_query("SELECT * FROM members WHERE id='".intval($_SESSION['user'])."'  LIMIT 1");
        if ($row=mysql_fetch_assoc($q)){
            return $row;
        }else{
            return false;
        }
     }
    
    public function register($name,$last_name,$phone,$word,$password,$password2){
        $error='';
        if (empty($name) || empty($last_name) || empty($word) || empty($phone) || empty($password) || empty($password2) ){
            $error='Не все поля заполнены';
        }elseif (!$this->validate_phone_number($phone)){
            $error='Неверно введен телефон';
        }elseif ($password!=$password2){
            $error='Введеные пароли не совпадают';
        }else{
            $q=mysql_query("SELECT * FROM members WHERE phone='".addslashes($phone)."' LIMIT 1");
            if ($row=mysql_fetch_assoc($q)){
                $error='Данный телефон уже зарегистрирован';
            }else{
                $sms_code=rand(10000,99999);
                mysql_query("INSERT INTO members SET 
                                                        name='".addslashes($name)."', 
                                                        last_name='".addslashes($last_name)."', 
                                                        phone='".addslashes($phone)."', 
                                                        word='".addslashes($word)."', 
                                                        password='".md5($password)."',
                                                        status=0,
                                                        sms_code='".$sms_code."' 
                ");
                $id=mysql_insert_id();
                return $id;
                //return $this->login($phone,$password);
            }    
        }
        return $error;
    }
    
    function validate_phone_number( $string ) {
        //+7 (707) 296-8844
        if ( preg_match("~\+[0-9]{1,2}\s?\([0-9]{3}\)\s?[0-9]{3}\-[0-9]{4}~", $string ) ) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
}
?>