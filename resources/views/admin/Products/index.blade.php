@extends('admin.layouts.layout')


@section('title')

المستودع
@endsection


@section('header')


@endsection



@section('content')
  
 


  <div id="modal1" class="modal">
  <div class="modal-content">
     
       
                  {!! Form::open(["url"=>"/adminpanel/products" , "method"=>"POST" ]) !!}
                  
                        @include('admin.products.form')
                   {!! Form::submit("اضف " , ["class"=>"btn btn-info"]) !!}
                  {!! Form::close() !!}
               

       <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
      </div>
   
     </div>
    
</div>  
            <button type="button" class="btn btn-info " data-toggle="modal" data-target="#modal1" style="float:right;">مادة جديدة</button>


      
      <a id='demo' class="btn btn-success " href="{{URL::to('/adminpanel/products/print')}}" style="float:right;" target="_blank">معاينة طباعة</a>



    <!-- Main content -->

  
    <section class="content"  style="direction:rtl">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
           
            <!-- /.box-header -->
            <div class="box-body">
<div class="panel panel-info">
        <div class="panel-heading" style="text-align:center;">المواد


        </div>

    
            
<div class="result">

<div class="panel-body">
<div id="title">
<h4 style="display:none; font-size:10px; text-align: center; "><p>عالم الأكسسوار</p><br/><p>   هاتف:240248 موبايل:0933777721</p></h4>
<br />
<hr>
</div>
            <!-- /.box-header -->
            <div class="box-body" width="100%" >
              <table id="data" class="display" cellspacing="0" width="100%">
                <thead>
               
                    <td>ت</td>
                   <th>الصنف</th>
                    <th>code</th>

                  <th> المادة </th>
                   <td>العدد </td>
                  <td>  شراء </td>
                   <td>  جملة </td>
                     <td>  بيع </td>
                     <td>Action</td>
                 
                 
                
               
               </thead>
                 <tfoot>
          <td>ت</td>
            <th>الصنف</th>
                <th>code</th>
                  <th> المادة </th>
                   <td>العدد </td>
                   <td>  شراء </td>
                   <td>  جملة </td>
                     <td>  بيع </td>
                       <td>Action</td>
                 

                 
            </tfoot>
                <tbody>

              

                </tbody>
                
              </table>
            </div>
</div>
    





      
 </div>
 
        <!-- /.col -->
      </div>
      <!-- /.row -->
      </div>
      </div>
      </div>
     


    </section>

{{Html::style('plugins\datatables\dataTables.bootstrap.css')}}
{{Html::style('plugins\datatables\datatables.min.css')}}
{{Html::script('plugins\datatables\datatables.min.js')}}

{{Html::style('plugins\datatables\extensions\TableTools\css\dataTables.tableTools.css')}}
{{Html::script('plugins\datatables\extensions\TableTools\js\dataTables.tableTools.min.js')}}



{{Html::script('plugins\datatables\dataTables.buttons.min.js')}}

{{Html::script('plugins\datatables\buttons.print.min.js')}}
{{Html::style('plugins\datatables\jquery.dataTables.min.css')}}

{{Html::style('plugins\datatables\buttons.dataTables.min.css')}}



 <script type="text/javascript">

 

    // Setup - add a text input to each footer cell
    $('#data tfoot th').each( function () {
        //var title = $(this).text();
        $(this).html( '<input type="text" placeholder="ابحث" style="width:80px;"  />' );
    } );




  var table = $('#data').DataTable( {

        "processing": true,
        "serverSide": false,
        
       



        "ajax":'{{ url('/adminpanel/products/data') }}',
        "columns": [

                {data: null},
                {data: 'categoryName', name: 'categoryName'},
                {data: 'productCode', name: 'productCode'},
                {data: 'productName', name: 'productName'},
                {data: 'productQuntity', name: 'productQuntity'},
                {data: 'productNetPrice',render: $.fn.dataTable.render.number( ',', 'ليرة', '.',0  ), name: 'productNetPrice'},
                {data: 'productNetSell',render: $.fn.dataTable.render.number( ',', 'ليرة', '.', 0 ), name: 'productNetSell'},
                {data: 'productSellPrice',render: $.fn.dataTable.render.number( ',', 'ليرة','.', 0 ), name: 'productSellPrice'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
              
              
            ],        
           
             "columnDefs": [ {
          "searchable": false,
          "orderable": false,
          "targets": 0
        } ],        
        "order": [[ 1, 'asc' ]],
   

            "language":{
                "sProcessing":   "جارٍ التحميل...",
                "sLengthMenu":   "أظهر _MENU_ مدخلات",
                "sZeroRecords":  "لم يعثر على أية سجلات",
                "sInfo":         "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
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
            fixedHeader: {
    header: true
  },
     
            dom: 'Blfrtip',
     
        buttons: [

           

            {
                extend: 'print',
                text: "طباعة",
                title: $('#title').text(),
               footer: true,
                exportOptions: {
                    columns: [ 1, 2 ,3,4,5,6]
                },



                customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '12pt' )
                        .css('direction','rtl')
                        .css('margin-top','1cm')
                        .css('margin-bottom','1cm')
                        .prepend(
                            '<img src="http://datatables.net/media/images/logo-fade.png" style="position:absolute; top:0; left:0;" />'
                        );
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                }
            },
            
          
        ],

        
    } );



table.on( 'order.dt search.dt', function () {
       table.column(0).nodes().each( function (cell, i) {
          cell.innerHTML = i + 1;
           table.cell(cell).invalidate('dom');
       } );

    } ).draw();

 $('#data').on( 'click', 'tbody td:not(:first-child)', function (e) {
        editor.inline( this );
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
