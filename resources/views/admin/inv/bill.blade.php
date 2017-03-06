<!doctype html>
@include("admin.inv.numtostr")
<html dir="rtl" lang="ar">
    <head>
        <meta charset="utf-8">
        <title>
        <?php  if($order->orderType=='sell') echo 'فاتورة بيع' ;
                                      elseif($order->orderType=='buy') echo 'فاتورة شراء';
                                      elseif($order->orderType=='rebuy') echo 'فاتورة مرتجع مشتريات';
                                      elseif($order->orderType=='resell') echo 'فاتورة مرتج مبيعات';
                                      elseif($order->orderType=='sandout') echo 'سند صرف';
                                      elseif($order->orderType=='sandin') echo 'سند قبض';


                        ?>
        </title>

       
        <style type="text/css">
     * { font-family: "DejaVu Sans"; }
     /* reset */

*
{
    border: 0;
    box-sizing: content-box;
    color: inherit;
    font-family: inherit;
    font-size: 14px;
    font-style: inherit;
    font-weight: inherit;
    line-height: inherit;
    list-style: none;
    margin: 0;
    padding: 0;
    text-decoration: none;
    vertical-align: top;
}

/* content editable */

*[contenteditable] { border-radius: 0.25em; min-width: 1em; outline: 0; }

*[contenteditable] { cursor: pointer; }

*[contenteditable]:hover, *[contenteditable]:focus, td:hover *[contenteditable], td:focus *[contenteditable], img.hover { background: #DEF; box-shadow: 0 0 1em 0.5em #DEF; }


/* heading */

h1 { font: bold 100% sans-serif;  text-align: center; text-transform: uppercase; }

/* table */

table { font-size: 75%; table-layout: fixed; width: 100%; }
table { border-collapse: separate; border-spacing: 2px; }
th, td { border-width: 1px; padding: 0.5em; position: relative; text-align: center; }
th, td { border-radius: 0.25em; border-style: solid; }
th { background: #EEE; border-color: #BBB; }
td { border-color: #DDD; }

/* page */

html { font: 16px/1 'Open Sans', sans-serif; overflow: auto; padding: 0.5in; }
html { background: #999; cursor: default; }

 

body { box-sizing: border-box;  margin: 0 auto; overflow: hidden; padding: 0.5in; width: 8.5in; }


body { background: #FFF; border-radius: 1px; box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5); }

/* header */

header { margin: 0 0 2em; }
header:after { clear: both; content: ""; display: table; }

header h1 { background: #eee; border-radius: 0.25em; color: #333; margin: 0 0 1em; padding: 0.5em 0; }
header address { float: left; font-size: 75%; font-style: normal; line-height: 1.25; margin: 0 1em 1em 0; }
header address p { margin: 0 0 0.25em; }
header span, header img { display: block; float: right; }
header span { margin: 0 0 1em 1em; max-height: 25%; max-width: 60%; position: relative; }
header img { max-height: 100%; max-width: 100%; }
header input { cursor: pointer; -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"; height: 100%; left: 0; opacity: 0; position: absolute; top: 0; width: 100%; }

/* article */

article, article address, table.meta, table.inventory { margin: 0 0 3em; }
article:after { clear: both; content: ""; display: table; }
article h1 { clip: rect(0 0 0 0); position: absolute; }

article address { float: left; font-size: 125%; font-weight: bold; }

/* table meta & balance */

table.meta, table.balance { float: right; width: 36%; }
table.meta:after, table.balance:after { clear: both; content: ""; display: table; }

/* table meta */

table.meta th { width: 40%; }
table.meta td { width: 60%; }

/* table items */

table.inventory { clear: both; width: 100%; }
table.inventory th { font-weight: bold; text-align: center; }

table.inventory td:nth-child(1) { width: 26%; }
table.inventory td:nth-child(2) { width: 38%; }
table.inventory td:nth-child(3) { text-align: center; width: 12%; }
table.inventory td:nth-child(4) { text-align: center; width: 12%; }
table.inventory td:nth-child(5) { text-align: center; width: 12%; }

/* table balance */

table.balance th, table.balance td { width: 50%; }
table.balance td { text-align: right; }

/* aside */

aside h1 { border: none; border-width: 0 0 1px; margin: 0 0 1em; }
aside h1 { border-color: #999; border-bottom-style: solid; }

/* javascript */





@media print {
    * { -webkit-print-color-adjust: exact; }
    html { background: none; padding: 0; }
    body { box-shadow: none; margin: 0; margin-top: 0.2cm ;
  margin-bottom: 0.2cm;}
    span:empty { display: none; }
}

@page { margin: 0; }
    </style>
    <script>
   
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
 
</script>
    </head>
    <body>
    <a href="#!" class="btn-floating orang" onclick="printDiv('printableArea')" value="Print" style="float:right;"><span class="glyphicon glyphicon-print">اضغط للطباعة</span></a>
    &nbsp;  &nbsp;  &nbsp;  &nbsp;
 
  <div class="below_movie_left" id="printableArea">
        <header>
        <div style="border-right: 6px solid red;background-color: lightgrey;">
        <h2 style="padding-top: 0.2cm;text-align:center;">عالم الاكسسوار </h2>
        <br/>
        <table style="border:0px;">
        <tr>
        <td>
        <h4  style="padding: 0.2cm;text-align:right;">مبيع جميع قطع اكسسوار الموبايلات باسعار الجملة</h4>
        </td>
        <td>
        <h4  style="padding: 0.2cm;text-align:left;">هاتف:240248   موبايل:0933777721</h4>
        </td>
        </tr>
        </table>
       
        <br/>
        </div>
        <br/>
        <br>

            <h1> <?php  if($order->orderType=='sell') echo 'فاتورة بيع' ;
                                      elseif($order->orderType=='buy') echo 'فاتورة شراء';
                                      elseif($order->orderType=='rebuy') echo 'فاتورة مرتجع مشتريات';
                                      elseif($order->orderType=='resell') echo 'فاتورة مرتج مبيعات';
                                      elseif($order->orderType=='sandout') echo 'سند صرف';
                                      elseif($order->orderType=='sandin') echo 'سند قبض';


                        ?>
            </h1>
           
        </header>
        <article>
            <div >
            <table >

                <tr>
                <th><span >ID</span></th>
                  <td><span > {{$order->id}}</span></td>
               <?php  if($order->orderType=='sell'){
                        echo '<th><span >فاتورة بيع رقم</span></th>';
                    foreach($numbersell as $numbersells)
                   
                    echo    '<td><span >'.$numbersells->id.'</span></td>' ;
                }
                elseif($order->orderType=='buy'){
                     echo '<th><span >فاتورة شراء رقم</span></th>';
                    foreach($numberbuy as $numberbuys)
                   
                    echo    '<td><span >'.$numberbuys->id.'</span></td>' ;
                }
                elseif($order->orderType=='rebuy'){
                     echo '<th><span >فاتورة مردود شراء رقم</span></th>';
                    foreach($numberrebuy as $numberrebuys)
                   
                    echo    '<td><span >'.$numberrebuys->id.'</span></td>' ;
                }
                elseif($order->orderType=='resell'){
                     echo '<th><span >فاتورة مردود مبيع رقم</span></th>';
                    foreach($numberresell as $numberresells)
                   
                   echo    '<td><span >'.$numberresells->id.'</span></td>' ;
                }  
                elseif($order->orderType=='sandin'){
                     echo '<th><span >سند قبض رقم</span></th>';
                    foreach($numbersandin as $numbersandins)
                   
                   echo    '<td><span >'.$numbersandins->id.'</span></td>' ;
                }
                 elseif($order->orderType=='sandout'){
                     echo '<th><span >سند صرف رقم</span></th>';
                 
                    foreach($numbersandout as $numbersandouts)
                   
                    echo    '<td><span >'.$numbersandouts->id.'</span></td>' ;
                }
                    ?>

                     <th><span >التاريخ</span></th>
                    <td><span > {{$order->orderDate}}</span></td>
                     <th><span >الاستحقاق</span></th>
                    <td><span > {{$order->orderDate}}</span></td>
                </tr>
                <tr>
                   
                </tr>
                <tr>
                   
                </tr>
               
            </table>
            </div>
            <div aligen="justify">
    @if($order->orderType == 'sandin')
        <table>
        <tr></tr>
         <tr></tr>
          <tr></tr>
          <tr></tr>
         <tr></tr>
          <tr></tr>
        <tr>
        <th><span >لقد استلمنا من السيد</span></th>
        @foreach($orderCustomers as $orderCustomer)
                
        <td><span >{{$orderCustomer->customerFirstName}} {{$orderCustomer->customerLastName}}</span></td>
        @endforeach

         <th><span >المبلغ </span></th>
                
        <td><span >{{number_format($order->getMoney,2)}}</span><span data-prefix> ليرة </span></td> 
        </tr>
        <table>
         
        <tr>
        <th width="20%"><span >و ذلك لقاء :</span></th> 
        <td  class="form-control"><span>{{$order->fromto}}</span></td>

        </tr>
        </table>
              
               
        </table>
                     
    @elseif($order->orderType == 'sandout')
       <table>
        <tr>
        <th><span >لقد صرفنا للسيد</span></th>
        @foreach($orderProviders as $orderProvider)
                
        <td><span >{{$orderProvider->providerFirstName}} {{$orderProvider->providerLastName}}</span></td>
        @endforeach

        @foreach($orderEmployees as $orderEmployee)
                
        <td><span >{{$orderEmployee->employeeFirstName}} {{$orderEmployee->employeeLastName}}</span></td>
        @endforeach

        @foreach($orderCustomers as $orderCustomer)
                
        <td><span >{{$orderCustomer->customerFirstName}} {{$orderCustomer->customerLastName}}</span></td>
        @endforeach
 
         <th><span >المبلغ </span></th>
                
        <td><span >{{number_format($order->orderOutPayment,2)}}</span><span data-prefix> ليرة </span></td> 
                     
        </tr>
                <tr>
                  <th><span >و ذلك لقاء :</span></th>   
                 
                    @if($order->fromto == 'rent') <td><span>الأجار </span></td>
                    @elseif($order->fromto == 'goods') <td><span>بضاعة </span></td>
                    @elseif($order->fromto == 'tranc') <td><span>نقل </span></td>
                    @elseif($order->fromto == 'electric') <td><span>فاتورة الكهرباء</span></td>
                    @elseif($order->fromto == 'salary') <td><span>الراتب </span></td>
                    @elseif($order->fromto == 'overtime') <td><span>ساعات عمل إضافية </span></td>
                    @elseif($order->fromto == 'rentSalary') <td><span>سلفة على الراتب </span></td>
                    @elseif($order->fromto == 'oil') <td><span>وقود </span></td>
                    @elseif($order->fromto == 'water') <td><span>فاتورة المياه </span></td>
                    @elseif($order->fromto == 'fix') <td><span>صيانة </span></td>
                    @elseif($order->fromto == 'help') <td><span>تعويضات </span></td>
                    @elseif($order->fromto == 'travel') <td><span>بدل سفر </span></td>
                    @elseif($order->fromto == 'tranc') <td><span>بدل نقل </span></td>
                    @elseif($order->fromto == 'oilemployee') <td><span>بدل وقود </span></td>
                    @elseif($order->fromto == 'fromhome') <td><span>بدل سكن </span></td>
                    @elseif($order->fromto == 'fromfood') <td><span>بدل طعام </span></td>
                    @elseif($order->fromto == 'returngoods') <td><span>مرتجع بضاعة </span></td>
                    @elseif($order->fromto == 'other') <td><span>{{$order->orderNote}}</span></td>
                    @endif
                            

                </tr>
               
        </table>

    @else
             <table>
                <tr>
                 
                @if($order->orderType!='buy')
                     <th><span >الموظف</span></th>
                  @foreach($employees as $employee)

                   <td><span >{{$employee->employeeName}}</span></td>
                   @endforeach

                    <th><span >الزبون</span></th>
                    
                    @foreach($orderCustomers as $orderCustomer)
                
                    <td><span >{{$orderCustomer->customerFirstName}} {{$orderCustomer->customerLastName}}</span></td>
                    @endforeach

                @else
                <th><span >موظف أمر الشراء</span></th>
                  @foreach($employees as $employee)

                   <td><span >{{$employee->employeeName}}</span></td>
                   @endforeach
                 <th><span >المورد</span></th>
                  @foreach($orderProviders as $orderProvider)

                   <td><span >{{$orderProvider->providerFirstName}} {{$orderProvider->providerLastName}}</span></td>

                   @endforeach





                @endif
                </tr>
                <tr>
                     <td style="border:0px;"></td>
                    <th><span>نوع الدفع</span></th>
                    @if($order->orderPaymentType == 'cash')
                  <td>نقدي</td>
                  @else
                  <td>آجل</td>
                <td style="border:0px;"></td>
                @endif

                </tr>
               
            </table>
        @endif
            </div>
           
     @if($order->orderType =='buy' || $order->orderType =='sell' || $order->orderType =='resell' || $order->orderType =='rebuy'  )     

            <table class="inventory">
                <thead>
                    <tr>
                      <th  width="10%"><span>التسلسل</span></th>
                        <th><span >المادة</span></th>
                        <th><span >السعر</span></th>
                        <th><span >العدد</span></th>
                        <th><span >الحسم</span></th>
                        <th><span >السعر الاجمالي</span></th>
                    </tr>
                </thead>
                <tbody>

                @if($order->orderType =='buy' || $order->orderType =='sell' || $order->orderType =='resell' || $order->orderType =='rebuy'  )     
                    @foreach($productNames as $index => $productName)
                    <tr>
                        <td ><span >{{$index+1}} </span></td>
                        <td><span >{{$productName->productName}} </span></td>
                        <td><span >{{number_format($productName->productOrderPrice,2)}}</span></td>
                         <td><span >{{$productName->productOrderQuantity}}</span></td>
                        
                    <td><span > {{ $productName->productOrderDis }}</span><span data-prefix>%</span></td>
                   
                        
                         <td><span>{{number_format($productName->productOrderAllPrice,2)}}</span><span data-prefix> ليرة </span></td>
                    </tr>
                      @endforeach 

                     <table class="balance">
                <tr>
                <?php $totals=0 ; ?>
                 @foreach($productNames as $productName)
                 <?php $totals += $productName->productOrderAllPrice; ?>
                 @endforeach
                    <th><span >المجموع العام</span></th>
                    <td><span>{{number_format($totals,2)}}</span><span data-prefix> ليرة </span></td>
                     
                
                </tr>
                <tr>
                <?php $totalQ=0 ; ?>
                @foreach($productQ as $productQs)
                <?php $totalQ+=$productQs->productOrderQuantity; ?>
                @endforeach
                <th><span >العدد الإجمالي </span></th>
                <td><span>{{$totalQ}}</span></td>

                </tr>
                <tr>

               
                <th><span>الحسم العام</span></th>
                <td>{{number_format($order->disPrice)}}<span data-prefix> ليرة </span></td>
                </tr>
                <tr>
                <th><span>المجموع بعد الحسم</span></th>
                <?php $totals=0 ; ?>
                 @foreach($productNames as $productName)
                 <?php $totals += $productName->productOrderAllPrice; ?>
                 @endforeach
                 <?php  $price=$totals-$order->disPrice; ?>
                <td>{{number_format($price,2)}}<span data-prefix> ليرة </span></td>
                <th style="width:300px;float:right;"><span>{{ makeNumber2Text($price)}}</span><span data-prefix> ليرة سورية فقط لاغير  </span></th>
                </tr>
               
               </table> 

                  @else
                   @foreach($productorders as $index => $productorder)
                    <tr>
                       <td><span >{{$index+1}} </span></td>
                        <td><span >{{$productorder->sellName}} </span></td>
                        <td><span >{{number_format($productorder->sellPrice,2)}}</span></td>
                         <td><span >{{$productorder->sellQuantity}}</span></td>
                        
                    <td><span > {{ $productorder->sellDisc }}</span><span data-prefix>%</span></td>
                   
                        
                         <td><span>{{number_format($productorder->sellAllprice,2)}}</span><span data-prefix> ليرة </span></td>
                    </tr>
                      @endforeach  
                     <table class="balance">
                <tr>
                <?php $totalsorder=0 ; ?>
                 @foreach($productorders as $productorder)
                 <?php $totalsorder += $productorder->sellAllprice; ?>
                 @endforeach
                    <th><span >المجموع العام</span></th>
                    <td><span>{{number_format($totalsorder,2)}}</span><span data-prefix> ليرة </span></td>
                   
                
                </tr>
              
            </table>

            <table>
                <tr>
                <td>مدير المبيعات</td>
                <td>مدير المشتريات</td>
                <td>المدير</td>
                </tr>
                <tr>
                <td>...................</td>
                <td>...................</td>
                <td>...................</td>
                </tr>
               
            </table>
                  @endif
                </tbody>
            </table>
           
           
        @elseif($order->orderType =='sandout')
        <table class="inventory">
            <tr>
                <th> <span > المستلم</span> </th>
                 <th><span >المحاسب</span> </th> 
                 <th><span >المدير</span></th>
            </tr>

            <tr>
               <td><span>................</span></td>
               @foreach($employees as $employee)
              <td><span >{{$employee->employeeName}}</span></td>
               @endforeach
                
               <td><span>................</span></td>

                                  

                                   
            </tr>
        </table>
      @elseif($order->orderType =='sandin')


      <table class="inventory">
            <tr>
                <th> <span >أمين الصندوق</span> </th>
               
                 <th><span >المحاسب</span></th>
                 <th><span >المدير</span></th>
            </tr>

            <tr>
               <td><span>................</span></td>
               @foreach($employees as $employee)
              <td><span >{{$employee->employeeName}}</span></td>
               @endforeach
                
               <td><span>................</span></td>

                                  

                                   
            </tr>
        </table>

    @endif
        </article>
       
   
   </body> 
   

   </div>



</html>