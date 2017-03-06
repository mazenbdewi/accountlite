<!doctype html>
<html dir="rtl" lang="ar">
    <head>
        <meta charset="utf-8">
        <title>
        <?php  if($order->orderType=='sell') echo 'فاتورة شراء' ;
                                      elseif($order->orderType=='buy') echo 'فاتورة بيع';
                                      elseif($order->orderType=='rebuy') echo 'فاتورة مرتجع مبيعات';
                                      elseif($order->orderType=='resell') echo 'فاتورة مرتج شراء';
                                      elseif($order->orderType=='sandout') echo 'سند دفع';
                                      elseif($order->orderType=='sandget') echo 'سند قبض';


                        ?>
        </title>

        <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">


<script src="/bootstrap/js/bootstrap.min.js"></script>
      
       
        <style type="text/css">
     * { font-family: "DejaVu Sans"; }
     /* reset */

*
{
    border: 0;
    box-sizing: content-box;
    color: inherit;
    font-family: inherit;
    font-size: inherit;
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
<?php 
if($order->orderType == 'sandget' || $order->orderType == 'sandout' ) 
 
echo 'body { box-sizing: border-box; height: 5in; margin: 0 auto; overflow: hidden; padding: 0.5in; width: 7in; }';
else
echo 'body { box-sizing: border-box; height: 11in; margin: 0 auto; overflow: hidden; padding: 0.5in; width: 8.5in; }';

?>
body { background: #FFF; border-radius: 1px; box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5); }

/* header */

header { margin: 0 0 3em; }
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
    body { box-shadow: none; margin: 0; }
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
    <a href="#!" class="btn-floating orang" onclick="printDiv('printableArea')" value="Print" style="float:right;"><span class="glyphicon glyphicon-print"></span></a>
    &nbsp;  &nbsp;  &nbsp;  &nbsp;
 
  <div class="below_movie_left" id="printableArea">
        <header>
            <h1> <?php  if($order->orderType=='sell') echo 'فاتورة بيع' ;
                                      elseif($order->orderType=='buy') echo 'فاتورة شراء';
                                      elseif($order->orderType=='rebuy') echo 'فاتورة مرتجع مشتريات';
                                      elseif($order->orderType=='resell') echo 'فاتورة مرتج مبيعات';
                                      elseif($order->orderType=='sandout') echo 'سند دفع';
                                      elseif($order->orderType=='sandget') echo 'سند قبض';


                        ?>
            </h1>
            <address >
                <p>شركة الزيوت المتحدة</p>
                <p>شارع الملك عبد العزيز<br>البناء رقم 443</p>
                <p>+96732324242</p>
            </address>
            <span><img alt="" src="\dist\img\credit\mastercard.png"><input type="file" accept="image/*"></span>
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
                elseif($order->orderType=='sandget'){
                     echo '<th><span >سند قبض رقم</span></th>';
                    foreach($numbersandin as $numbersandins)
                   
                   echo    '<td><span >'.$numbersandins->id.'</span></td>' ;
                }
                 elseif($order->orderType=='sandout'){
                     echo '<th><span >سند دفع رقم</span></th>';
                 
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
    @if($order->orderType == 'sandget' || $order->orderType == 'sandout' )
        <table>
        <tr>
        <th><span >لقد صرفنا للسيد</span></th>
        @foreach($orderCustomers as $orderCustomer)
                
        <td><span >{{$orderCustomer->customerFirstName}} {{$orderCustomer->customerLastName}}</span></td>
        @endforeach

         <th><span >المبلغ </span></th>
                
        <td><span >{{number_format($order->orderOutPayment,2)}}</span><span data-prefix>ريال</span></td> 
                     
        </tr>
                <tr>
                                  

                </tr>
               
        </table>

    @else
             <table>
                <tr>
                     <th><span >الموظف</span></th>
                      
                    <td><span >{{$order->employeeName}}</span></td>
                   
                </tr>
                <tr>
                     <th><span >الزبون</span></th>
                    
                    @foreach($orderCustomers as $orderCustomer)
                
                    <td><span >{{$orderCustomer->customerFirstName}} {{$orderCustomer->customerLastName}}</span></td>
                    @endforeach

                </tr>
               
            </table>
        @endif
            </div>
            <div >

            <table class="meta">
               
            </table>
            </div>
        @if($order->orderType =='sell' || $order->orderType =='buy'  )
            <table class="inventory">
                <thead>
                    <tr>
                        <th><span >المادة</span></th>
                        <th><span >السعر</span></th>
                        <th><span >العدد</span></th>
                        <th><span >الحسم</span></th>
                        <th><span >السعر الاجمالي</span></th>
                    </tr>
                </thead>
                <tbody>

                           
                    @foreach($productNames as $productName)
                    <tr>
                        <td><span >{{$productName->productName}} </span></td>
                        <td><span >{{number_format($productName->productOrderPrice,2)}}</span></td>
                         <td><span >{{$productName->productOrderQuantity}}</span></td>
                        
                    <td><span > {{ $productName->productOrderDis }}</span><span data-prefix>%</span></td>
                   
                        
                         <td><span>{{number_format($productName->productOrderAllPrice,2)}}</span><span data-prefix>ريال</span></td>
                    </tr>
                      @endforeach  
                </tbody>
            </table>
           
            <table class="balance">
                <tr>
                <?php $totals=0 ; ?>
                 @foreach($productNames as $productName)
                 <?php $totals += $productName->productOrderAllPrice; ?>
                 @endforeach
                    <th><span >المجموع العام</span></th>
                    <td><span>{{number_format($totals,2)}}</span><span data-prefix>ريال</span></td>
                
                </tr>
               
            </table>
        @else
        <table class="inventory">
            <tr>
                <th> <span >اسم المستلم</span> </th>
                 <th><span >المحاسب</span> </th> 
                 <th><span >المدير</span></th>
            </tr>
            <tr>
                @foreach($orderCustomers as $orderCustomer)
              <td><span >{{$orderCustomer->customerFirstName}} {{$orderCustomer->customerLastName}}</span></td>
                @endforeach

                
                 <td>................</td>
                 <td>................</td>
                                  

                                   
            </tr>
        </table>
    @endif
        </article>
       
    </body>
</div>
</html>