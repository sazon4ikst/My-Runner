<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Создание
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Главная</a></li>
            <li class="active">Создание</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

         <?
         $fields=$orders_module->get_fields();
         ?>
               <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Заявка</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                  <div class="box-body">
                <?
                  foreach($fields as $k=>$v){
                    if ($v['create']==true){
                         
                 ?>
                 
                    <div class="form-group">
                      <label for="exampleInputEmail1"><?=$v['title']?></label>
                      <? 
                        switch ($v['type']){
                            case 'text': echo '<input name="'.$k.'" type="text" class="form-control" placeholder="'.$v['title'].'">'; break;
                            case 'datetime': echo '
                            <div class="input-group">
                                    <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                                <input name="'.$k.'" type="text" class="form-control timepicker'.$k.'" value="'.date('d/m/Y H:i').'" >
                        </div>
                        <script type="text/javascript">
                          $(function () {
                            //Timepicker
                            $(".timepicker'.$k.'").inputmask("d/m/y h:s");
        
                           // $(".timepicker'.$k.'").timepicker({
                             // showInputs: false
                           // });
                          });
                          </script>                            
                            '; break;
                            case 'db_select': 
                                echo '<select name="'.$k.'" class="form-control" placeholder="'.$v['title'].'">
                                        <option value="0"> - </option>';
                                        $items=get_select_items($v['db_table'],$v['db_field']);
                                        foreach ($items as $item){
                                            echo '<option value="'.$item['id'].'">'.$item[$v['db_field']].'</option>';
                                        }
                                        
                                echo '</select>';
                            break;
                        }
                      ?>
                      
                    </div>
                    <?}}?>
                    
                    <div class="checkbox">
                      <label>
                        <input type="checkbox"> Check me out
                      </label>
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Создать</button>
                  </div>
                </form>
              </div>
         
         
        </section><!-- /.content -->