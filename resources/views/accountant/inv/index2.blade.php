@extends('admin.layouts.layout')


@section('title')

جدول التعهدات 

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

جدول التعهدات 

    </div>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            
            <!-- /.box-header -->
            <div class="box-body">
            <section>
            <table>
              {!! Form::open(['Route'=>'accountant.inv.index2','method'=>'GET','class'=>'Class_name']) !!}
              <tr>
               <td>............................................................................</td>
                <td><input type="text" name="id" id="id" class="form-control" placeholder=" الفاتورة ID "></td>
                <td>.......................</td>
                <td><input type="text" name="orderDate" id="orderDate" class="form-control" placeholder="ادخل تاريخ الفاتورة"></td>
               <td>..........................................................................</td>
                   {!! Form::submit("بحث" , ["class"=>"btn btn-info"]) !!}

                  {!! Form::close()!!}
              </tr>
            </table>
            </section>
            <section>
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>              
                  <tr>
                    <th >ID</th>
                    <th>تاريخ التعهد</th>
                    <th>طباعة سند التعهد</th>
                  </tr>
                  </thead>
                  <tbody>
                   @foreach($orders as $order)
                  <tr>
                    <td width="20%"><span >{{$order->id}}</span></td>
                    <td width="35%"><span  >{{$order->orderDate}}</span></td>
                   
                   <td width="35%"> <a href="/accountant/invsell/{{$order->id}}" target="_blank" class="btn btn-default"> معاينة التعهد </a></td>



                </tr>


                 
                   @endforeach  
                
                   
                 <div class="pagination">
                       {!! $orders->links() !!}  
                 
                  </div>
                
                     
                  </tbody>
                </table>
              </div>
              </section>
              <!-- /.table-responsive -->
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            </section>
                
      

@endsection









@section('footer')





@endsection
