@extends('admin.layouts.layout')

@section('title')
أمر شراء
@endsection


@section('header')


@endsection




@section('content')

<script src="{{asset('jquery/jquery.js')}}"></script>
<script type="text/javascript">
  
function totalamount()
{

  var t=0;
  $('.amount').each(function(i,e)
  {
    var amt = $(this).val()-0;
    t+=amt;
  });
  $('.total').html(t);
}


  $(function(){

    $('.getMoney').change(function(){
      var total=$('.total').html();
      var getMoney = $(this).val();
      var t = total - getMoney   ;
      $('.backMoney').val(t).toFixed(2);
    });

 

  
    $('.add').click(function(){

      
    //  var product = $('.product_id').html();
     
        
      var n = ($('.body tr').length-0)+1;
      var tr = '<tr> <th class="no">'+n+'</th>'+
              
                '<td><input type="text" name="product_id[]" class="form-control product_id"  ></td>'+
                '<td><input type="text" name="price[]" class="price form-control"  ></td>'+
                '<td><input type="text" name="qty[]" class="qty form-control"></td>'+
               '<td><input type="text"  name="dis[]" class="dis form-control"></td>'+
                '<td><input type="text" name="amount[]" class="amount form-control" readonly></td>'+
                '<td><a href="#" class="btn btn-danger delete">حذف</a></td></tr>';

          $('.body').append(tr);
       
    

    });

     $('.body').delegate('.delete','click',function(){
      $(this).parent().parent().remove();
      totalamount();
    });

    $('.body').delegate('.product_id','change',function(){
     var tr = $(this).parent().parent();
     var unitprice = tr.find('.product_id option:selected').attr('data-price');
     tr.find('.price').val(unitprice);
     var qty = tr.find('.qty').val()-0;
     var dis = tr.find('.dis').val()-0;
     var price = tr.find('.price').val()-0;
     var total = (qty*price) - ((qty*price*dis)/100);
     tr.find('.amount').val(total);
     totalamount();

    });
    $('.body').delegate('.qty,.dis','keyup',function(){
       var tr = $(this).parent().parent();
       var qty = tr.find('.qty').val()-0;
       var dis = tr.find('.dis').val()-0;
       var price = tr.find('.price').val()-0;
        var total = (qty*price) - ((qty*price*dis)/100);
        tr.find('.amount').val(total);
        totalamount();
    });

     

  });

$(function () {
       
         $("#orderPaymentType").change(function () {

            
             if ($(this).val() == "bank") {
                $("#orderBankName").show();
                $("#orderCheckNO").show();
            } else {
                $("#orderBankName").hide();
                $("#orderCheckNO").hide();
            }
        });
         
    });
</script>

<style type="text/css">
  
  #orderBankName,#orderCheckNO{
display: none ;
  table{ font-size:14px; }
  td{ text-align:right; }
  th{ text-align:right; }

</style>
<section class="content"  style="direction:rtl">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
           
            <!-- /.box-header -->
            <div class="box-body">
          <div class="panel panel-danger">
        <div class="panel-heading">أمر شراء</div>

         <div>
        @foreach($catch4 as $catchs4)
         <a href='/adminpanel/inv/{{$catchs4->id}}' target="_blank"><span class="glyphicon glyphicon-print"></span></a> 
      

        @endforeach 
</div>
         <div class="panel-body">




  <form  name="ordersave" action="{{action('InvoiceController@savebuy')}}" onsubmit="return validateForm()" method="post">
  <input type="hidden" name="_token" value="<?= csrf_token() ; ?>" >

  
  <table class="table" style="direction:rtl">
                            <tr>
                             <input type="hidden" name="orderType" value="buy">
                            </tr>
                            <tr>
                             <th><span>ID</span></th><td>{{($id->id)+1}}</td>
                              <th><span> تاريخ أمر الشراء </span></th>
                               
                              <td><span><input type="date" name="orderDate"  class="form-control" required oninvalid="this.setCustomValidity('من فضلك أدخل تاريخ الفاتورة')" oninput="setCustomValidity('')" /></span> </td>
                              <th><span> تاريخ الاستحقاق </span></th>
                             
                               <td><span> <input type="date" name="orderDueDate"  class="form-control" required oninvalid="this.setCustomValidity('من فضلك أدخل تاريخ  الاستحقاق')" oninput="setCustomValidity('')" ></span> </td>

                            </tr>
                           
                 
                             <tr>
                         
                            <td><span> {!! Form::select('employee_id', $employees,null,array('class' => 'form-control' ,'placeholder' => 'موظف الشراء','required'=>'required')) !!}</span></td>

         <td><span> {!! Form::select('provider_id', $provider,null,array('class' => 'form-control' ,'placeholder' => 'المورد','required'=>'required')) !!}</span></td>

                            

                        <td> 
                                 
                         <select name="orderPaymentType" id="orderPaymentType" class="form-control" required oninvalid="this.setCustomValidity('من فضلك حدد نوع الدفع')" oninput="setCustomValidity('')">
                          <option selected="selected" value="">طريقة الدفع</option>
                          <option value="next" >آجل</option>
                          <option value="cash">الصندوق</option>
                          </select>
                       
                        </td>

                            </tr>

                      <tr>

                      
                      </tr>
                      <tr>
                      <td><span><input type="text" id="orderBankName" name="orderBankName" class="form-control" placeholder="اسم البنك"></span></td>  
                      <td><span><input type="text" id="orderCheckNO" name="orderCheckNO" class="form-control" placeholder="رقم الشيك"> </span></td>  
                        </tr>  
                              <tr>
                             <th><span>المقبوض:</span></th> 
                            <td><span><input type="text" name="getMoney" class="getMoney" required oninvalid="this.setCustomValidity('من فضلك أدخل المبلغ المدفوع')" oninput="setCustomValidity('')" ></span></td> 
                            <th><span>الباقي:</span></th>
                            <td><span><input type="text"  name="backMoney" class="backMoney" readonly></span></td>
                           
                            </tr>
                            
  </table>
  <input type="submit" value="حفظ الطلبية" name="save" id="save" class="btn btn-primary" style="margin-left: 0.75em ">

 
  <table class="table table-bordered table-hover " style="direction:rtl">
    <thead>
      <th>N</th>
      <th>المادة</th>
      <th>السعر</th>
      <th>العدد</th>
      <th>الحسم</th>
      <th>الكمية</th>
      <th><input type="button" id="submit" class="btn btn-primary add" value="+"></th>
    </thead>
    <tbody class="body">
      <tr>
        <th class="no">1</th>
       
         <td><input type="text" name="product_id[]" class="form-control product_id" ></td>
        <td><input type="text" name="price[]" class="price form-control" ></td>
        <td><input type="text" name="qty[]" class="qty form-control"></td>

      <td><input type="text"  name="dis[]" class="dis form-control" ></td>
      
        <td><input type="text" name="amount[]" class="amount form-control" readonly></td>
        <td><a href="#" class="btn btn-danger delete">حذف</a></td>

      </tr>
    </tbody>

    
    
  </table>
  
 <div style="direction:rtl ; margin-right: 2em ; ">
  <tfoot>
  
      <th colspan="6" >المجموع:

      <b name="total" class="total">0</b></th>
   </tfoot>
<br />
 

   
 </div>
 </form>
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
