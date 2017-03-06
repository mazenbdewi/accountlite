@extends('admin.layouts.layout')


@section('title')

التحكم في الموظفين 

@endsection


@section('header')


@endsection



@section('content')


  <div id="modal1" class="modal">
  <div class="modal-content">
     
       
                  {!! Form::open(["url"=>"/store/products" , "method"=>"POST" ]) !!}
                        @include('store.products.form')
                   {!! Form::submit("اضف " , ["class"=>"btn btn-info"]) !!}
                  {!! Form::close() !!}
               

       <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
      </div>
   
     </div>
    
</div>  
            <button type="button" class="btn btn-info " data-toggle="modal" data-target="#modal1" style="float:right;">مادة جديدة</button>


      
      <a id='demo' class="btn btn-success " href="{{URL::to('/store/products/print')}}" target="_blank" style="float:right;">معاينة طباعة</a>



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
         <div class="panel-body">

            <!-- /.box-header -->
            <div class="box-body" >
              <table  class=" table table-striped">
                <thead>
                <tr>
                  <th>تسلسل</th>
                  <th>رقم المادة</th>
                  <th> اسم المادة </th>
                  <th> الكمية</th>
                  <th> وحدة القياس</th>
                 
               
                
                  
                </tr>
                </thead>
                <tbody>

                @foreach($products as $index => $product)

                <tr>
                  <td>{{ $index+1 }}</td>
                  <td>{{ $product->productCode }}</td>
                  <td>{{ $product->productName }}</td>
                  <td>{{ $product->productQuntity }}</td>
                  <td>{{ $product->productUnit }}</td>
               <!--  
                  <td><a href="{{url('/adminpanel/products/'.$product->id.'/edit')}}" class="btn-floating orang">
                  <i class="material-icons">mode_edit</i></a>  </td> -->
                 
                  
                  
                </tr>
                @endforeach

                </tbody>
                  <div class="pagination">
                       {!! $products->links() !!}  
                 
                  </div>
              
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      </div>
      </div>
      </div>

    </section>


@endsection









@section('footer')


@endsection
