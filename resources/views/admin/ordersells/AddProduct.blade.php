@extends('admin.layouts.layout')

@section('title')
أضف موظف
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
    $('.add').click(function(){
      var product = $('.product_id').html();
      var n = ($('.body tr').length-0)+1;
      var tr = '<tr> <th class="no">'+n+'</th>'+
                '<td><select name="product_id[]" class="form-control product_id">'+product+'</select></td>'+
                '<td><input type="text" name="price[]" class="price form-control"></td>'+
                '<td><input type="text" name="qty[]" class="qty form-control"></td>'+
                '<td><input type="text" name="dis[]" class="dis form-control"></td>'+
                '<td><input type="text" name="amount[]" class="amount form-control"></td>'+
                '<td><a href="#" class="btn btn-danger delete">Delete</a></td></tr>';

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
</script>

<table class="table table-bordered table-hover " style="direction:rtl">
    <thead>
      <th>N</th>
      <th>المادة</th>
      <th>السعر</th>
      <th>العدد</th>
      <th>الحسم</th>
      <th>الكمية</th>
      <th><input type="button" class="btn btn-primary add" value="+"></th>
    </thead>
    <tbody class="body">
      <tr>
        <th class="no">1</th>
        <td><select name="product_id[]" class="form-control product_id">
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
        <td><input type="text" name="dis[]" class="dis form-control"></td>
        <td><input type="text" name="amount[]" class="amount form-control"></td>
        <td><a href="#" class="btn btn-danger delete">Delete</a></td>

        </td>
      </tr>
    </tbody>

    
    
  </table>
  </form>
  <tfoot>
      <th colspan="6">Total:<b class="total">0</b></th>
      
    </tfoot>


@endsection



@section('footer')
@endsection
