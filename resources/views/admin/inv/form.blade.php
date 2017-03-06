@extends('admin.layouts.layout')

@section('title')
فاتورة بيع
@endsection


@section('header')


@endsection



@section('content')


@include("admin.inv.numtostr")

<script type="text/javascript">



  
function totalamount()
{

  var t=0;
  $('.amount').each(function(i,e)
  {
    var amt = $(this).val()-0;
     
    
    t+=amt;
  
    $('.total').html(t);

  });
  

  
  
}


function totalQ()
{

  var q=0;
  $('.qty').each(function(i,e)
  {
    var totalQ = $(this).val()-0;
     
    
    q+=totalQ;
  
    $('.totalQ').html(q);

  });
}



  $(function(){

    $('.disPrice').change(function(){
      var total=$('.total').html();
      var disPrice = $(this).val();
      var t = total - disPrice   ;
      $('.endinv').val(t) ;

    });

    $('.getMoney').change(function(){
      var total=$('.total').html();
      var getMoney = $('.getMoney').val();
      var disPrice = $('.disPrice').val(); 
      var limit =$('.numberLimit').val();       
      var t = (total - disPrice)   ;
      var m = (t - getMoney)  ;
      $('.backMoney').val(m) ;
      if(m>limit)
        {
      alert('تجاوز الزبون الحد الائتماني');
      document.getElementById('submit').style.display='none';
      document.getElementById('save').style.display='none';
  }
  
     
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
                '<td><input type="text" name="price[]" class="price form-control"  ></td>'+
                '<td><input type="text" name="qty[]" id="qty" class="qty form-control"></td>'+
                '<td><input type="text" name="productQty" id="productQty" class="productQty form-control" readonly></td>'+

               '<td><select  name="dis[]" class="dis form-control">'+options+'</select></td>'+
                '<td><input type="text" name="amount[]" class="amount form-control" readonly></td>'+
                '<td><a href="#" class="btn btn-danger delete">حذف</a></td></tr>';

          $('.body').append(tr);


       
    

    });

    $('.body').delegate('.delete','click',function(){
      $(this).parent().parent().remove();
      totalamount();
      totalQ();
    });

    $('.body').delegate('.product_id ,.dis','change',function(){
     var tr = $(this).parent().parent();
     var unitprice = tr.find('.product_id option:selected').attr('data-price');
     var unitqty = tr.find('.product_id option:selected').attr('data-qty');

     tr.find('.price').val(unitprice);
     tr.find('#productQty').val(unitqty);
     var qty = tr.find('.qty').val()-0;
     var dis = tr.find('.dis option:selected').val()-0;
     var price = tr.find('.price').val()-0;
     var productQty = tr.find('#productQty').val()-0;
     var total = (qty*price) - ((qty*price*dis)/100);
     tr.find('.amount').val(total);
     totalamount();
      totalQ();
    

    });
    $('.body').delegate('.qty','keyup',function(){
       var tr = $(this).parent().parent();
       var qty = tr.find('.qty').val()-0;
       var dis = tr.find('.dis option:selected').val()-0;
       var price = tr.find('.price').val()-0;
       var productQty = tr.find('#productQty').val()-0;
        var total = (qty*price) - ((qty*price*dis)/100);
        tr.find('.amount').val(total);
       // var limit =$('.numberLimit').val();
        totalamount();
         totalQ();

   
         if(qty>productQty)
     {
      alert('الكمية المطلوبة أكبر من المتواجدة في المستودع');
      document.getElementById('submit').style.display='none';
      document.getElementById('save').style.display='none';
  }
  else if(qty<productQty ){
    document.getElementById('submit').style.display='inline-block';
    document.getElementById('save').style.display='inline-block';
  }

          
    });

 
     

  });

$(function () {
       
         $("#typecustomer").change(function () {

            
             if ($(this).val() == "carSelect") {
                $("#car").show();
                $("#kilo").show();
                $("#new").show();
                $("#customer").hide();
            } if ($(this).val() == "customerSelect") {
                $("#car").hide();
                $("#kilo").hide();
                $("#new").hide();
                $("#customer").show();
            }
              if ($(this).val() == ""){
                 $("#car").hide();
                 $("#kilo").hide();
                 $("#new").hide();
                 $("#customer").hide();
            }
        });
         
    });

$(document).ready(function(){

    $(document).on('change','.customer',function(){

        //console.log("Hiiii");
        var customer_id = $(this).val();
        var a=$(this).parent();
        var op = "";
        //console.log(customer_id);
        $.ajax({
          type:'get',
          url:'{!!URL::to('/adminpanel/inv/findcust')!!}',
          data:{'id':customer_id},
          dataType:'json',
          success:function(data){
            console.log(data);
             console.log(data.limit);

             a.find('.numberLimit').val(data.limit);
          

          },
          error:function(){

          }


        });

    });


});


$(document).ready(function(){

    $(document).on('change','#productQty',function(){

        //console.log("Hiiii");
        var product_id = $(this).val();
        var a=$(this).parent();
        var op = "";
        //console.log(customer_id);
        $.ajax({
          type:'get',
          url:'{!!URL::to('/adminpanel/inv/findqty')!!}',
          data:{'id':product_id},
          dataType:'json',
          success:function(data){
            console.log(data);
             console.log(data.productQuntity);

            // a.find('.numberLimit').val(data.limit);
          

          },
          error:function(){

          }


        });

    });


});


</script>

<style type="text/css">
  
#car,#customer,#kilo,#new{
display: none ;}
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
          <div class="panel panel-success">
        <div class="panel-heading">
        <table>
<tr>

<td>رقم المعرف :</td>
<td>
  @foreach($catch3 as $catchs3)
{{($catchs3->id)+1}}
@endforeach

</td>
<td>    &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;
&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;
&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;
</td>

<td>فاتورة بيع</td>
</tr>
</table>

   </div>
   <div>
        @foreach($catch3 as $catchs3)
         <a href='/adminpanel/inv/{{$catchs3->id}}' target="_blank"><span class="glyphicon glyphicon-print"></span></a> 
        <a href='/adminpanel/invsell/{{$catchs3->id}}' target="_blank"><span class="glyphicon glyphicon-edit"></span></a> 
        @endforeach
       
</div>
         <div class="panel-body">




  <form  name="ordersave" action="{{action('InvoiceController@save')}}" onsubmit="return validateForm()" method="post">
  <input type="hidden" name="_token" value="<?= csrf_token() ; ?>" >

  
  <table class="table table-striped" style="direction:rtl">
                            <tr>
                             <input type="hidden" name="orderType" value="sell">
                            </tr>
                            <tr>
                        
                              <th><span> تاريخ الفاتورة </span></th>
                               
                              <td><span><input type="date" name="orderDate"  class="form-control" required oninvalid="this.setCustomValidity('من فضلك أدخل تاريخ الفاتورة')" oninput="setCustomValidity('')" /></span> </td>
                              <th><span> تاريخ الاستحقاق </span></th>
                             
                               <td><span> <input type="date" name="orderDueDate"  class="form-control" required oninvalid="this.setCustomValidity('من فضلك أدخل تاريخ  الاستحقاق')" oninput="setCustomValidity('')" ></span> </td>

                            </tr>
                           
                 
                             <tr>
                            
                             <th><span>اسم الموظف</span></th>
                             <?php
                             $employeeName = Auth::user()->name;
                   echo "<td><span><input type='text' name='employeeName'  value='$employeeName' class='form-control' readonly /></span></td>" ;

                           
                              echo '<th><span>الحسم المسموح</span></th>';
                              $employeeDisc= Auth::user()->userDisc ;
                                echo "<td><span><input type='text' name='employeeDisc' id='employeeDisc' value='$employeeDisc' readonly class='form-control' ></span></td>" ;

                            
                              ?>
                    <tr>

                      
                           <td  >
                            <select class="customer form-control" name="customer_id">
                            <option value="">اختر زبون</option>
                            @foreach($customer as $cust)
                            <option value="{{$cust->id}}">{{$cust->full_name}}</option>
                            @endforeach
                            
                            </select>

                           
                            <input type="text" name="limit" placeholder="الحد الائتماني" class="numberLimit form-control" readonly >

                          </td>
                
                        </tr>
                        <tr>
                      
                         
                        </tr>

                  <tr>

                       <td> 
                                 
                         <select name="orderPaymentType" id="orderPaymentType" class="form-control" required oninvalid="this.setCustomValidity('من فضلك حدد نوع الدفع')" oninput="setCustomValidity('')">
                          <option selected="selected" value="">طريقة الدفع</option>
                          <option value="bank" >آجل</option>
                          <option value="cash">الصندوق</option>
                          </select>
                       
                        </td>
                      </tr>
                     
                              <tr>
                            
                            <td><span><input type="text" name="getMoney" placeholder="المقبوض" class="getMoney  form-control" required oninvalid="this.setCustomValidity('من فضلك أدخل المبلغ المدفوع')" oninput="setCustomValidity('')" ></span></td> 
                           
                            <td><span><input type="text"  name="backMoney" placeholder="الباقي" class="backMoney  form-control" readonly></span></td>
                           
                            </tr>
                            
  </table>
  <input type="submit" value="حفظ الطلبية" name="save" id="save" class="btn btn-primary" style="margin-left: 0.75em ">

 
  <table class="table table-bordered table-hover " style="direction:rtl">
    <thead>
      <th>N</th>
      <th>المادة</th>
      <th>السعر</th>
      <th>العدد</th>
       <th>الاجمالي</th>
      <th>الحسم</th>
      <th>الاجمالي</th>
      <th><input type="button" id="submit" class="btn btn-primary add" value="+"></th>
    </thead>
    <tbody class="body">
      <tr>
        <th class="no">1</th>
         <td><select  name="product_id[]" class="form-control product_id"  >
        <option selected="selected" > اختر مادة</option>
          <?php foreach ($data as $r) {
            ?>

            <option data-price="<?= $r->productSellPrice; ?>" data-qty="<?= $r->productQuntity; ?>" value="<?= $r->id; ?>"> <?= $r->productName ?></option>
            <?php 
          }
          ?>
        </select>


        </td>
        <td><input type="text" name="price[]" class="price form-control" ></td>
        <td><input type="text" name="qty[]" id="qty" class="qty form-control"></td>
        <td><input type="text" name="productQty" id="productQty" class="productQty form-control" readonly></td>

<?php 
      echo  '<td><select  name="dis[]" class="dis form-control" >' ;
        
       
        for($i=0;$i<=$employeeDisc;$i++)
          echo  '<option value='.$i.'>'.$i.'</option>';
        
     echo   '</select></td>' ; 
       ?>
        <td><input type="text" name="amount[]" class="amount form-control" readonly></td>
        <td><a href="#" class="btn btn-danger delete">حذف</a></td>

      </tr>
    </tbody>

    
    
  </table>
  
 <div style="direction:rtl ; margin-right: 2em ; ">
  <tfoot>
  <table>
  <tr>
      <th  >المجموع:</th>

    <td>  <b name="total" class="total">0</b></td>

   
  </tr>
   <tr>
      <th  >العدد الكلي:</th>

    <td>  <b name="totalQ" class="totalQ">0</b></td>

   
  </tr>

  <tr>

      <th>الحسم العام :</th><td><input type="text" name="disPrice" id="disPrice" class="disPrice form-control"></td>
    </tr>
    <tr>
     <th>المجموع بعد الحسم :</th><td><input type="text" id="endinv" class="endinv form-control " readonly></td>
     </tr>
</table>
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
