@extends('admin.layouts.layout')

@section('title')
أضف موظف
@endsection


@section('header')


@endsection




@section('content')

<script src="{{asset('jquery/jquery.js')}}"></script>
<script type="text/javascript">
  var s= 1 ; 
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

      
      var product = $('.product_id').html();
      var disc = document.forms["ordersave"]["employeeDisc"].value;
      
       var start = 0;
      var end = disc;
      var options = "";
      for(var year = start ; year <=end; year++){
      options += "<option value="+year+">"+ year +"</option>";
                 }
      
        
      var n = ($('.body tr').length-0)+1;
      var tr = '<tr> <th class="no">'+n+'</th>'+
                '<td><select name="product_id[]" class="form-control product_id">'+product+'</select></td>'+
                '<td><input type="text" name="price[]" class="price form-control"></td>'+
                '<td><input type="text" name="qty[]" class="qty form-control"></td>'+
               '<td><select  name="dis[]" class="dis form-control">'+options+'</select></td>'+
                '<td><input type="text" name="amount[]" class="amount form-control"></td>'+
                '<td><a href="#" class="btn btn-danger delete">حذف</a></td></tr>';

          $('.body').append(tr);
       
    

    });

    $('.body').delegate('.delete','click',function(){
      $(this).parent().parent().remove();
      totalamount();
    });

    $('.body').delegate('.product_id ,.dis','change',function(){
     var tr = $(this).parent().parent();
     var unitprice = tr.find('.product_id option:selected').attr('data-price');
     tr.find('.price').val(unitprice);
     var qty = tr.find('.qty').val()-0;
     var dis = tr.find('.dis option:selected').val()-0;
     var price = tr.find('.price').val()-0;
     var total = (qty*price) - ((qty*price*dis)/100);
     tr.find('.amount').val(total);
     totalamount();

    });
    $('.body').delegate('.qty','keyup',function(){
       var tr = $(this).parent().parent();
       var qty = tr.find('.qty').val()-0;
       var dis = tr.find('.dis option:selected').val()-0;
       var price = tr.find('.price').val()-0;
        var total = (qty*price) - ((qty*price*dis)/100);
        tr.find('.amount').val(total);
        totalamount();
    });

     

  });





</script>

  <form  name="ordersave" action="{{action('InvoiceController@save')}}" onsubmit="return validateForm()" method="post">
  <input type="hidden" name="_token" value="<?= csrf_token() ; ?>" >
  <table class="table" style="direction:rtl">
    <tr>
                              <th><span>نوع الطلبية</span></th>
                               <td><span> {!! Form::select("orderType",array('sell'=>"بيع") )!!}</span></td>
                            </tr>
                            <tr>
                              <th><span> رقم الفاتورة</span> </th>
                               <td><span> {!!  Form::text("id",null)!!}</span> </td>
                              <th><span> تاريخ الفاتورة </span></th> 
                              <td><span> {!!  Form::date("orderDate",null)!!}</span> </td>
                              <th><span> تاريخ الاستحقاق </span></th>
                               <td><span> {!!  Form::date("orderDueDate",null)!!}</span> </td>

                            </tr>
                            <tr>

                            </tr>
                            <tr>

                             <th><span>  نوع الدفع </span></th>
                    <td><select  name="orderPaymentType" class="orderPaymentType"  >
                      <option selected="selected" > اختر </option>
                      <option value="cash" > كاش </option>
                      <option value="next" > آجل </option>
                       <option value="bank" > بنك </option>
                       
                      </select>   </td> 
                      <th><span>اسم البنك</span></th> 
                      <td><span><input type="text" name="orderBankName" class="orderBankName"</span></td>  
                      <th><span>رقم الشيك </span></th>
                      <td><span><input type="text" name="orderCheckNO" class="orderCheckNO"</span></td>  
                             <tr>
                            
                             <th><span>اسم الزبون</th> 
                             <th><span>اسم الموظف</th>
                             <?php
                             $employeeName = Auth::user()->name;
 echo '<td><span><input type="text" name="employeeName" value='.$employeeName.'></span></td>' ;
                           
                              echo '<th><span>الحسم المسموح</th>';
                              $employeeDisc= Auth::user()->userDisc ;
 echo '<td><span><input type="text" name="employeeDisc" id="employeeDisc" value='.$employeeDisc.'></span></td>' ;

                            
                              ?>
                            </tr>
                              <tr>
                             <th><span>المقبوض:</span></th> 
                            <td><span><input type="text" name="getMoney" class="getMoney"></span></td> 
                            <th><span>الباقي:</span></th>
                            <td><span><input type="text"  name="backMoney" class="backMoney"></span></td>
                           
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
         <td><select  name="product_id[]" class="form-control product_id"  >
        <option selected="selected" > اختر مادة</option>
          <?php foreach ($data as $r) {
            ?>

            <option data-price="<?= $r->productNetPrice; ?>" value="<?= $r->id; ?>"> <?= $r->productName ?></option>
            <?php 
          }
          ?>
        </select>


        </td>
        <td><input type="text" name="price[]" class="price form-control"></td>
        <td><input type="text" name="qty[]" class="qty form-control"></td>
<?php 
      echo  '<td><select  name="dis[]" class="dis form-control" >' ;
        
       
        for($i=0;$i<=$employeeDisc;$i++)
          echo  '<option value='.$i.'>'.$i.'</option>';
        
     echo   '</select></td>' ; 
       ?>
        <td><input type="text" name="amount[]" class="amount form-control"></td>
        <td><a href="#" class="btn btn-danger delete">حذف</a></td>

        </td>
      </tr>
    </tbody>

    
    
  </table>
  
 <div style="direction:rtl ; margin-right: 2em ; ">
  <tfoot>
  
      <th colspan="6" >المجموع:

      <b name="total" class="total">0</b></th>
<br />
     
</form>
    </tfoot>
    </div>


@endsection






@section('footer')
@endsection
