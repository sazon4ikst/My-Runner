<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Просмотр
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Главная</a></li>
            <li class="active">Просмотр</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

         <?
         $fields=$orders_module->get_fields();
         ?>
         
              
              <!-- TABLE: LATEST ORDERS -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Последние заказы</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table no-margin">
                      <thead>
                      <tr>
                          <?
                           foreach($fields as $k=>$v){
                               if ($v['table']==true){
                          ?>
                          <th><?=$v['title']?></th>
                          <?}
                           }?>
                           <td> </td>
                        </tr>
                      </thead>
                      <tbody>
                      <?
                        $limit=20;
                        $page=1;
                        $orders=$orders_module->read_all_by_client(1,$limit,$page);
                        foreach($orders['rows'] as $order){
                      ?>
                        <tr>
                        <?
                           foreach($fields as $k=>$v){
                            if ($v['table']==true){
                          ?>
                          <td><a href=""><?=$order[$k]?></a></td>
                          <?}}?>
                          <td>
                            <a href="@"><i class="fa fa-fw fa-edit"></i></a>
                            <a href="@"><i class="fa fa-fw fa-remove"></i></a>
                          </td>
                        </tr>
                        <?}?>
                      </tbody>
                    </table>
                  </div><!-- /.table-responsive -->
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                <ul class="pagination pagination-sm no-margin pull-right">
                    <li><a href="#">&laquo;</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">&raquo;</a></li>
                  </ul>
                </div><!-- /.box-footer -->
              </div><!-- /.box -->


         
         
        </section><!-- /.content -->