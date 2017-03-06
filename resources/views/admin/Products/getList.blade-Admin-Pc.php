
@if (count($products)>0)


            <!-- /.box-header -->
          <div id="load" style="position: relative;">
              <table  class=" table table-striped">
                <thead>
                <tr>
                  <th width="5%">تسلسل</th>
                  <th>رقم المادة</th>
                  <th> اسم المادة </th>
                  <th> السعر الصافي </th>
                  <th>  سعر المبيع </th>
                  <th> الكمية</th>
                  <th> وحدة القياس</th>
                  <th>قيمة البضاعة الحالية</th>
               
                
                  
                </tr>
                </thead>
                <tbody>
        
                @foreach($products as $index => $product)

                <tr>
                  <td>{{ $index+1 }}</td>
                  <td>{{ $product->productCode }}</td>
                  <td>{{ $product->productName }}</td>
                  <td><span>{{ number_format($product->productNetPrice,2) }}</span></td>
                   <td>{{ number_format($product->productSellPrice,2) }}</td>
                  <td>{{ $product->productQuntity }}</td>
                  <td>{{ $product->productUnit }}</td>
                  <td>{{ number_format($product->productQuntity * $product->productNetPrice,2)}}</td>
               <!--  
                  <td><a href="{{url('/adminpanel/products/'.$product->id.'/edit')}}" class="btn-floating orang">
                  <i class="material-icons">mode_edit</i></a>  </td> -->
                 
                  
                  
                </tr>
                @endforeach

                </tbody>
                <tfoot>
                <tr>
                
                </tr>
                  <tr>
                    <td colspan="10">{{$products->render()}}</td>
                  </tr>
                </tfoot>
              </table>
      </div>
    


@else
<div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
      <div class="panel-body">
     <b>{{$search}} النتيجة غير موجودة تأكد مرة أخرى </b>
      </div>
      </div>
    </div>
</div>



@endif

