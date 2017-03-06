@extends('admin.layouts.layout')


@section('title')

التحكم في الموظفين 

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
     <section class="articles">

      @include('admin.products.getlist')

      </section>


      
 </div>
 <div class="container">
 <table>
 <tr>
  <td >مجموع المواد :</td><td><?php echo count($sum);
                ?></td>
  </tr>
  </table>
  </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      </div>
      </div>
      </div>
     


    </section>


 <script>
    
        // Ajax pagination

       $(document).on('click','.pagination a',function(e){
      e.preventDefault();
      var page=$(this).attr('href').split('page=')[1];
      getProduct(page);
    })

    function getProduct(page)
    {
      
      var url="{{url('adminpanel/products')}}";
      $.ajax({
        type : 'get',
        url : url+'?page='+page,
       
      }).done(function(data){
        $('.result').html(data);
      })
    }
    </script>
     


 @endsection









@section('footer')


@endsection
