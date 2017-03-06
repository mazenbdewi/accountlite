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
             
                    <th>المعرف</th>
                  
                    <th>تاريخ الفاتورة</th>
                  
                    <td>action</td>
                  
                 </thead>
                 <tfoot>
            
                     <th>المعرف</th>
                  
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


{{Html::style('plugins\datatables\dataTables.bootstrap.css')}}
{{Html::style('plugins\datatables\datatables.min.css')}}
{{Html::script('plugins\datatables\datatables.min.js')}}

{{Html::style('plugins\datatables\extensions\TableTools\css\dataTables.tableTools.css')}}
{{Html::script('plugins\datatables\extensions\TableTools\js\dataTables.tableTools.min.js')}}


 <script type="text/javascript">

 

    // Setup - add a text input to each footer cell
    $('#data tfoot th').each( function () {
        //var title = $(this).text();
        $(this).html( '<input type="text" placeholder="ابحث" style="width:80px;"  />' );
    } );


  var table = $('#data').DataTable( {

        "processing": true,
        "serverSide": false,



        "ajax":'{{ url('/adminpanel/inv/Datainvall') }}',

        columns: [
             
                {data: 'id', name: 'id'},
          
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
