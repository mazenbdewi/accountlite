

  
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
      $('.endinv').val(t).toFixed(2);
    });

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
                '<td><input type="text" name="price[]" class="price form-control"  ></td>'+
                '<td><input type="text" name="qty[]" id="qty" class="qty form-control"></td>'+
                '<td><input type="text" name="productQty" id="productQty" class="productQty form-control"></td>'+

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
        var limit =$('.numberLimit').val();
        totalamount();
         totalQ();

   
         if(qty>productQty || total>limit)
     {
      alert('الكمية المطلوبة أكبر من المتواجدة في المستودع أو تجاوزت الحد الائتماني');
      document.getElementById('submit').style.display='none';
      document.getElementById('save').style.display='none';
  }
  else if(qty<productQty || total<limit ){
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

