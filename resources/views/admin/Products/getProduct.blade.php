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
<form action="{{url('adminpanel/products/getProductInfo')}}" method="get" id="frmsearch" class="form-horizontal">
  <div class="input-group">
    <input type="text" name="search" class="form-control" placeholder="ابحث عن المعرف او رقم المادة او اسم المادة" id="search">
    <span class="input-group-btn">
    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
    </span>
  </div>
</form>
<div class="result"> 
    
</div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      </div>
      </div>
      </div>

    </section>
<script type="text/javascript">
    $('#frmsearch').on('submit',function(e){
      e.preventDefault();
      var url = $(this).attr('action');
      var data = $(this).serializeArray();
      var get=$(this).attr('method');
      $.ajax({
        type :get,
        url : url,
        data : data

      }).done(function(data){
        $('.result').html(data);
      })
    })
$(document).on('click','.pagination a',function(e){
      e.preventDefault();
      var page=$(this).attr('href').split('page=')[1];
      getProduct(page,$('#search').val());
    })

    function getProduct(page,search)
    {
      
      var url="{{url('adminpanel/products/getproductinfosearch')}}";
      $.ajax({
        type : 'get',
        url : url+'?page='+page,
        data : {'search':search}
      }).done(function(data){
        $('.result').html(data);
      })
    }
  </script>

@endsection
@section('script')


@endsection









@section('footer')


@endsection
