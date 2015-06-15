<?
class Api
{
    function Api(){
        
    }
    
    
    public function registration($name,$last_name,$phone,$word,$password){
          if (is_int($id=$members_module->register($name,$last_name,$phone,$word,$password,$password))){    
                    $result['result']=true;      
                    $result['error_description']='';      
                    $result['user_key']=$id;      
                    
                }else{
                    $result['result']=false;
                    $result['user_key']=false;
                    $result['error_description']=$id;
                }
          return $result;
    }
    
    
    public function registration_complete($sms_code,$user_key){
        if ($members_module->activation($sms_code,$user_key)){
                    $members_module->logout();
                    $result['result']=true;
                    $result['error_description']='';
                }else{
                    $result['result']=false;
                    $result['error_description']='Введен неверный код';
                }
        return $result;
    }
    
    public function auth($phone,$password){
        $ret=$members_module->runner_login($phone,$password);
                if ($ret['result']==true){
                    $result['result']=true;
                    $result['error_description']='';
                    $result['user_key']=$ret['user_key'];
                }else{
                    $result['result']=false;
                    $result['error_description']=$ret['error_description'];
                    $result['user_key']=false;
                    
                }
        return $result;
    }
        
    
}
?>