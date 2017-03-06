@extends('admin.layouts.layout')


@section('title')

الفواتير

@endsection


@section('header')


@endsection



@section('content')


 <section class="content"  style="direction:rtl">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
           
            <!-- /.box-header -->
            <div class="box-body">
            <div class="panel panel-primary ">
            <div class="panel-heading">

جدول الفواتير 

    </div>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            
            <!-- /.box-header -->
            <div class="box-body">
         
              <div class="box-body" >
                <table id="data"  class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" >
                         
                 <thead>
                
                    <th>رقم الفاتورة</th>
                    <th>اسم الزبون</th>
                    <th>كنية الزبون</th>
                    <th>تاريخ الفاتورة</th>
                  
                    <td>action</td>
                  
                 </thead>
                 <tfoot>
                
                      <th>رقم الفاتورة</th>
                    <th>اسم الزبون</th>
                    <th>كنية الزبون</th>
                    <th>تاريخ الفاتورة</th>
                  
                    <td>action</td>
                  
                   
              
                  </tfoot>
                  <tbody>
               
                     
                  </tbody>
                  
                </table>
              </div>
            
              <!-- /.table-responsive -->
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            </section>

<script
  src="https://code.jquery.com/jquery-2.2.4.js"
  integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
  crossorigin="anonymous"></script>
{{Html::style('plugins\datatables\dataTables.bootstrap.css')}}
{{Html::style('plugins\datatables\datatables.min.css')}}
{{Html::script('plugins\datatables\datatables.min.js')}}

{{Html::style('plugins\datatables\extensions\TableTools\css\dataTables.tableTools.css')}}
{{Html::script('plugins\datatables\extensions\TableTools\js\dataTables.tableTools.min.js')}}

<link rel="stylesheet" type="text/css" href="https://code.jquery.com/jquery-2.2.4.min.js">


<script src="https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css
">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css">

 <script type="text/javascript">

 

    // Setup - add a text input to each footer cell
    $('#data tfoot th').each( function () {
        //var title = $(this).text();
        $(this).html( '<input type="text" placeholder="ابحث" style="width:80px;"  />' );
    } );


  var table = $('#data').DataTable( {

        "processing": true,
        "serverSide": false,



        "ajax":'{{ url('/adminpanel/inv/Datainv') }}',

        columns: [
              
                {data: 'numberSellId', name: 'numberSellId'},
                {data: 'customerFirstName', name: 'customerFirstName'},
                {data: 'customerLastName', name: 'customerLastName'},
                {data: 'orderDate', name: 'orderDate'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
              
              
            ],
            "bAutoWidth": false, 

             "columnDefs": [
                  { "width": "5%", "targets": 0 }
                ],

             "language":{
                "sProcessing":   "جاري التحميل...",
                "sLengthMenu":   "أظهر _MENU_ سجلات",
                "sZeroRecords":  "لم يعثر على أية سجلات",
                "sInfo":         "إظهار من _START_ إلى _END_ من أصل _TOTAL_ سجل",
                "sInfoEmpty":    "يعرض 0 إلى 0 من أصل 0 سجل",
                "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                "sInfoPostFix":  "",
                "sSearch":       "ابحث:",
                "sUrl":          "",
                "oPaginate": {
                    "sFirst":    "الأول",
                    "sPrevious": "السابق",
                    "sNext":     "التالي",
                    "sLast":     "الأخير"
                              }
                },

         
            
    

    } );

table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );




            </script>
                
      

@endsection









@section('footer')





@endsection
