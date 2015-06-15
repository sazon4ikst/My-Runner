<?
class Orders
{
    function Orders(){
        
    }
    
    public function get_fields(){
        return array(
                       'id'=>array('title'=>'Номер заявки',
                                   'type'=>'text',
                                   'table'=>true,
                                   'create'=>false
                       ),
                       'address'=>array('title'=>'Адрес доставки',
                                   'type'=>'text',
                                   'table'=>true,
                                   'create'=>true
                       ),
                       'order_sum'=>array('title'=>'Стоимость заказа',
                                   'type'=>'text',
                                   'table'=>true,
                                   'create'=>true
                       ),
                       'delivery_sum'=>array('title'=>'Стоимость доставки',
                                   'type'=>'text',
                                   'table'=>true,
                                   'create'=>true
                       ),
                       'order_status'=>array('title'=>'Статус заказа',
                                   'type'=>'text',
                                   'table'=>true,
                                   'create'=>false
                       ),
                       'call_time'=>array('title'=>'Время заказа',
                                   'type'=>'text',
                                   'table'=>true,
                                   'create'=>false
                       ),
                       'rating'=>array('title'=>'Рейтинг заказа',
                                   'type'=>'text',
                                   'table'=>true,
                                   'create'=>false
                       ),
                       'cargo_type'=>array('title'=>'Тип груза',
                                   'type'=>'db_select',
                                   'db_table'=>'cargo_types',
                                   'db_field'=>'name',
                                   'table'=>false,
                                   'create'=>true
                       ),
                       'payment_type'=>array('title'=>'Способ оплаты',
                                   'type'=>'db_select',
                                   'db_table'=>'payment_types',
                                   'db_field'=>'name',
                                   'table'=>false,
                                   'create'=>true
                       ),
                       'name'=>array('title'=>'Имя получателя',
                                   'type'=>'text',
                                   'table'=>true,
                                   'create'=>true
                       ),
                       'phone'=>array('title'=>'Телефон получателя',
                                   'type'=>'text',
                                   'table'=>true,
                                   'create'=>true
                       ),
                       'comment'=>array('title'=>'Примечания',
                                   'type'=>'text',
                                   'table'=>false,
                                   'create'=>true
                       ),
                       'client_id'=>array('title'=>'системное поле',
                                   'type'=>'user_id',
                                   'table'=>false,
                                   'create'=>false
                       ),
                       'create_at'=>array('title'=>'Время размещения заказа',
                                   'type'=>'datetime',
                                   'table'=>true,
                                   'create'=>false
                       ),
                       'distance'=>array('title'=>'Дистанция',
                                   'type'=>'text',
                                   'table'=>true,
                                   'create'=>true
                       ),
                       'cargo_description'=>array('title'=>'Информация о грузе',
                                   'type'=>'text',
                                   'table'=>false,
                                   'create'=>true
                       ),
                       'delivery_at'=>array('title'=>'Время, во сколько доставить',
                                   'type'=>'datetime',
                                   'table'=>true,
                                   'create'=>true
                       ),
                       'runner_id'=>array('title'=>'Курьер',
                                   'type'=>'datetime',
                                   'table'=>true,
                                   'create'=>false
                       ),
        );
    }
     public function create($array){
        $fields=array();
        foreach($array as $k=>$v){
            $fields[]=" `".$k."`='".addslashes($v)."' ";
        }
        mysql_query("INSERT INTO members SET ".implode(',',$fields));
        return mysql_insert_id();
     }
     
     public function read($id){
        $q=mysql_query("SELECT * FROM orders WHERE id='".intval($id)."' LIMIT 1");
        if ($row=mysql_fetch_assoc($q)){
            return $row;
        }else{
            return false;
        }
     }
     public function read_all_by_client($status ,$limit,$page){
         $offset=($page-1)*$limit;
        $result=array();
         
        $q_counts=mysql_query("SELECT count(id) as counts FROM orders WHERE client_id='".intval($_SESSION['user'])."' AND order_status='".$status."'");
        if ($row_q=mysql_fetch_assoc($q_counts)){
            $result['count']=$row_q['counts'];
        }
        $q=mysql_query("SELECT * FROM orders WHERE client_id='".intval($_SESSION['user'])."'  AND order_status='".$status."' LIMIT ".$offset.','.$limit);
        $rows=array();
        while ($row=mysql_fetch_assoc($q)){
            $rows[]=$row;
        }
        $result['rows']=$rows;
        
        return $result;
     }
     
     public function update($id,$array){
        $fields=array();
        foreach($array as $k=>$v){
            $fields[]=" `".$k."`='".addslashes($v)."' ";
        } 
        mysql_query("UPDATE orders SET ".implode(',',$fields)." WHERE id='".intval($id)."'");
        
     }
     
     public function delete($id){
        mysql_query("DELETE FROM orders  WHERE id='".intval($id)."'");
     }     
   
}
?>