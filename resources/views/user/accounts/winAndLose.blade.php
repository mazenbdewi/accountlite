@extends('admin.layouts.layout')

@section('title')

حركة الصندوق مدين
@endsection


@section('header')


@endsection




@section('content')

<style type="text/css">
table {
  font-family: "Helvetica Neue", Helvetica, sans-serif
}

caption {
  text-align: center;
  color: silver;
  font-weight: bold;
  font-size: 30px;
  text-transform: uppercase;
  padding: 5px;

}

thead {
  background: SteelBlue;
  color: white;
}

th,
td {
  text-align: center;
  padding: 15px 50px;
}

tbody tr:nth-child(even) {
  background: WhiteSmoke;
}

tbody tr td:nth-child(2) {
  text-align:center;
}

tbody tr td:nth-child(3),
tbody tr td:nth-child(4) {
  text-align: right;
  font-family: monospace;
}

tfoot {
  background: SeaGreen;
  color: white;
  text-align: right;
}

tfoot tr th:last-child {
  font-family: monospace;
}

</style>


<table style="direction:rtl">
  <caption>قائمة الدخل</caption>
  
  <tbody>
    <tr>
      <td>المبيعات</td>
      <td>{{$totalsell}}</td>
    </tr>
    <tr>
      <td>  - مردود المبيعات</td>
       <td>{{$totalResell}}</td>
    </tr>
    <tr>
        <td> - الخصم المسموح</td>
         <td>{{$totalbuy}}</td>
    </tr>
      
    <tr>
    <td>صافي المبيعات</td>
    <td>{{$netSell}}</td>
     
    </tr>

    <tr>
      <td>المشتريات</td>
      <td>{{$totalbuy}}</td>
    </tr>
    <tr>
      <td> - مردودات المشتريات</td>
      <td>{{$totalRebuy}}</td>
    </tr>
    <tr>
      <td> - الخصم المكتسب</td>
      <td>{{$totalbuy}}</td>
    </tr>
    <tr>
      <td> مصاريف الشراء +</td>
      <td>{{$totalbuy}}</td>
    </tr>
     <tr>
      <td> صافي الشراء</td>
      <td>{{$netBuy}}</td>
    </tr>
     <tr>
      <td> بضاعة أول المدة +</td>
      <td>{{$firstGoods}}</td>
    </tr>
    
    <tr>
      <td> تكلفة البضاعة المتاحة للبيع</td>
      <td>{{$goodsForSell}}</td>
    </tr>
    <tr>
      <td> بضاعة آخر المدة -</td>
      <td>{{$lastGoods}}</td>
    </tr>
     <tr>
    <td> تكلفة البضاعة المباعة</td>
      <td>{{$goodsSell}}</td>
    </tr>

     <tr>
    <td> مجمل الربح</td>
      <td>{{$allWin}}</td>
    </tr>
    <tr>
    <td> جميع الايرادات</td>
      <td>{{$totalincome}}</td>
    </tr>
    <tr>
    <td> جميع المصاريف</td>
    <td>{{$totaloutlay}}</td>
    </tr>
    <tr>
    <td> صافي الربح</td>
    <td>{{$netWin}}</td>
    </tr>
    
    <tr>
      
    </tr>
    <tr>
     
    </tr>
    <tr>
      
    </tr>
    <tr>
     
    </tr>
    
  </tbody>
  <tfoot>
    <tr>
      <th colspan="3">جساب المتاجرة</th>

    
    </tr>
  </tfoot>
</table>




@endsection



@section('footer')
@endsection