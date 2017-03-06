
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>المحاسب | لوحة التحكم</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/sand/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/dist/css/skins/_all-skins.min.css">

  <section class="content">
      <!-- Info boxes -->
      <div class="panel panel-success">
        <div class="panel-heading" style="text-align:right;">تقارير بيانية

        <a href="/welcome">عودة</a>
        </div>
         <div class="panel-body">

      <div class="row" style="direction:auto">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua" style="font-size:16px">
            <i>صافي الربح</i>
            </span>

            <div class="info-box-content">
              <span class="info-box-text"></span>
              <span class="info-box-number"><small>{{number_format($netWin)}}</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red" style="font-size:16px">
            <i> تقديرالمخزون</i></span>

            <div class="info-box-content">
              <span class="info-box-text"></span>
              <span class="info-box-number">{{number_format($totalStore)}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green" style="font-size:14px">
            <i>مجموع الايرادات</i></span>

            <div class="info-box-content">
              <span class="info-box-text"></span>
              <span class="info-box-number">{{number_format($totalincome)}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow" style="font-size:12px">
            <i>مجموع المصاريف</i></span>

            <div class="info-box-content">
              <span class="info-box-text"></span>
              <span class="info-box-number">{{number_format($totaloutlay)}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
         <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">آخر الطلبيات</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>id</th>
                    <th>التاريخ</th>
                    <th>الاستحقاق</th>
                    <th>اسم الزبون</th>
                    <th>اسم البائع</th>
                    <th>نوع الطبية</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($orderTables as $orderTable)
                  <tr>
                    <td>{{$orderTable->id}}</td>
                    <td>{{$orderTable->orderDate}}</td>
                    <td>{{$orderTable->orderDueDate}}</td>
                    <td><span class="label label-success">{{$orderTable->customerFirstName}} {{$orderTable->customerLastName}}</span></td>
                     <td>{{$orderTable->employeeName}}</td>
                    <td>

                      <div class="label label-success">
                       <?php  if($orderTable->orderType=='sell') echo ' بيع' ;
                                      elseif($orderTable->orderType=='buy') echo ' شراء';
                                      elseif($orderTable->orderType=='rebuy') echo ' مرتجع مشتريات ';
                                      elseif($orderTable->orderType=='resell') echo ' مرتج مبيعات';
                                      elseif($orderTable->orderType=='sandout') echo 'سند دفع';
                                      elseif($orderTable->orderType=='sandin') echo 'سند قبض';


                        ?>
                    
                      </div>
                    </td>
                  </tr>
                 
                   @endforeach                             
                                {!! $orderTables->links() !!} 
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
           
            <!-- /.box-footer -->
          </div>

      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">تقرير المبيعات الشهرية</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-wrench"></i></button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <p class="text-center">
                    <strong>المبيعات </strong>
                  </p>

                  <div class="chart">
                    <!-- Sales Chart Canvas -->
                    <canvas id="salesChart" style="height: 180px;"></canvas>
                  </div>
                  <!-- /.chart-responsive -->
                </div>

            </div>
            <!-- ./box-body -->
            
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-8">        
          <!-- /.box -->
           <!-- add from mazen -->
             <div class="box-body">
              <div class="table-responsive">
           
         
                   <title>جدول العاملين </title>
  
                   <script type="text/javascript" src="/plugins/canvasjs/canvasjs.min.js"></script>
 
               <div id="chartEmp" style="height: 300px; width: 100%;"></div>

               <div id="chartCus" style="height: 300px; width: 100%;"></div>
               <div id="chartDebt" style="height: 300px; width: 100%;"></div>
             </div> 
             <!-- /.circle debet -->
          <div class="box box-default">
            <div class="box-header with-border">
            

              <div id="chartpie" style="height: 300px; width: 100%;"></div>
            </div>

        
            <!-- /.box-body -->
        
          </div>
          <!-- /.end circle debet -->
        </div>

          <!-- end mazen -->

          <div class="row">
            <div class="col-md-6">
              <!-- DIRECT CHAT -->
              
              <!--/.direct-chat -->
            </div>
            <!-- /.col -->

            
             
            
            <!-- /.col -->
          
          <!-- /.row -->
          <div class="col-md-12">
          
         
       
        </div>
        </div>
        </div>
        <!-- /.col -->

        <div class="col-md-4">
          <!-- Info Boxes Style 2 -->
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">تكلفة البضاعة المباعة</span>
              <span class="info-box-number">{{number_format($goodsForSell)}}</span><span>ليرة</span>

             
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">صافي المبيعات</span>
              <span class="info-box-number">{{number_format($netSell)}}</span><span>ليرة</span>

             
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="ion ion-ios-cloud-download-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">صافي المشتريات</span>
              <span class="info-box-number">{{number_format($netBuy)}}</span><span>ليرة</span>

            
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">مجمل الربح</span>
              <span class="info-box-number">{{number_format($allWin)}}</span><span>ليرة</span>

              
            </div>
            <!-- /.info-box-content -->
          </div>
          

          <!-- PRODUCT LIST -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">كميات المواد</h3>
                              <!-- /.All Products -->
                
                  
                  @foreach($products as $product)
                  <div class="progress-group">
                  
                    <span class="progress-text">{{$product->productName}}</span>
                    <span class="progress-number"><b>{{$product->productQuntity}}</b>/{{$product->allQuantity}}</span>
                    <?php $width=($product->productQuntity*100/$product->allQuantity);  ?>
                    <div class="progress sm">
                    <?php if ($width>50) 
                  
                    echo "<div class='progress-bar progress-bar-aqua' style='width:".$width."% '> ></div>" ;
                    else
                    echo "<div class='progress-bar progress-bar-red' style='width:".$width."% '> ></div>" ;

                     ?>
                    </div>
                  </div>
                  @endforeach
                <!-- /.col -->
              </div>
          </div>
              <!-- /end All products -->
           <!-- USERS LIST -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">الموظفين اونلاين</h3>

                  <div class="box-tools pull-right">
                   <div id="786968" style="height: 300px; width: 100%;"></div>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                  @if($users)
                  @foreach($users as $user)

                    @if($user->isOnline())
                    <li>
                     <span> <img src="/dist/img/user1-128x128.jpg" alt="User Image"> </span>
                     <span  >{{$user->name}}</span>
                     <span> <img src="/dist/img/greenPoint.png" alt="User Image"> </span>
                    </li>
                     @endif
                  @endforeach

                  @endif
                  </ul>
                <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
               
                <!-- /.box-footer -->
              </div>
              <!--/.end USERS LIST  -->
           
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      </div></div></div>
    </section>
<!-- ./wrapper -->


<!-- jQuery 2.2.0 -->
<script src="/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="/bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<!-- Sparkline -->
<script src="/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="/plugins/chartjs/Chart.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/dist/js/demo.js"></script>

<script >
 
  // Get context with jQuery - using jQuery's .get() method.
  var salesChartCanvas = $("#salesChart").get(0).getContext("2d");
  // This will get the first returned node in the jQuery collection.
  var salesChart = new Chart(salesChartCanvas);

  var salesChartData = {
    labels: [
             <?php foreach($chartsell as $sell){ echo $sell->month ; echo ',';} ?>
            ],
    datasets: [
      {
        label: "Electronics",
        fillColor: "rgb(210, 214, 222)",
        strokeColor: "rgb(210, 214, 222)",
        pointColor: "rgb(210, 214, 222)",
        pointStrokeColor: "#c1c7d1",
        pointHighlightFill: "#fff",
        pointHighlightStroke: "rgb(220,220,220)",
        
        data: [

          <?php foreach($chartbuy as $buy){ echo $buy->counting ; echo ',';} ?>

              ]
      },
      {
        label: "Digital Goods",
        fillColor: "rgba(60,141,188,0.9)",
        strokeColor: "rgba(60,141,188,0.8)",
        pointColor: "#3b8bba",
        pointStrokeColor: "rgba(60,141,188,1)",
        pointHighlightFill: "#fff",
        pointHighlightStroke: "rgba(60,141,188,1)",
        data: [

            <?php foreach($chartsell as $sell){ echo $sell->counting ; echo ',';} ?>


            ]
      }
    ]
  };

  window.onload = function () {
    var chart1 = new CanvasJS.Chart("chartEmp",
    {
      title:{
        text: "اعمال الموظفين"    
      },
      animationEnabled: true,
      axisY: {
        title: "الطلبيات"
      },
      legend: {
        verticalAlign: "bottom",
        horizontalAlign: "center"
      },
      theme: "theme2",
      data: [

      {        
        type: "column",  
        showInLegend: true, 
        legendMarkerColor: "grey",
        legendText: " بالطلبية",
        dataPoints: [ 
         <?php   

        foreach($orderEmployees as $orderEmployee) {
          $name="'$orderEmployee->employeeName'" ;
        
        $count=$orderEmployee->Empcounting; 
       echo ' {y:'.$count.', label:'.$name.' } ,';
         }
         ?>
        ]
      }   
      ]
    });

          
    var chart2 = new CanvasJS.Chart("chartCus",
    {
      title:{
        text: "الزبائن الأكثر طلبيات"    
      },
      animationEnabled: true,
      axisY: {
        title: "الطلبيات"
      },
      legend: {
        verticalAlign: "bottom",
        horizontalAlign: "center"
      },
      theme: "theme2",
      data: [

      {        
        type: "column",  
        showInLegend: true, 
        legendMarkerColor: "grey",
        legendText: " بالطلبية",
        dataPoints: [ 
         <?php   

        foreach($orderCustomers as $orderCustomer) {
         $name="'$orderCustomer->customerFirstName $orderCustomer->customerLastName'" ;
        
        
        $count=$orderCustomer->Cuscounting; 
       echo ' {y:'.$count.', label:'.$name.' } ,';
         }
         ?>
        ]
      }   
      ]
    });

     chart1.render();
    chart2.render();
   
   
    
  }





  
</script>
  <script type="text/javascript" src="/plugins/canvasjs/canvasjs.min.js"></script>

