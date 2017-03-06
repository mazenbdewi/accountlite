<?php
function makeNumber2Text($numberValue){ 

    $textResult = ''; // so i can use .= 
    $numberValue = "$numberValue"; 
     
    if($numberValue[0] == '-'){ 
        $textResult .= 'سالب '; 
        $numberValue = substr($numberValue,1); 
    } 
     
    $numberValue = (int) $numberValue;     
    $def = array(    "0" => 'صفر', 
                    "1" => 'واحد', 
                    "2" => 'اثنان', 
                    "3" => 'ثلاث', 
                    "4" => 'اربع', 
                    "5" => 'خمس', 
                    "6" => 'ست', 
                    "7" => 'سبع', 
                    "8" => 'ثمان', 
                    "9" => 'تسع', 
                    "10" => 'عشر', 
                    "11" => 'أحد عشر', 
                    "12" => 'اثنا عشر', 
                    "100" => 'مائة', 
                    "200" => 'مئتان', 
                    "1000" => 'ألف', 
                    "2000" => 'ألفين', 
                    "1000000" => 'مليون', 
                    "2000000" => 'مليونان'); 

    // check for defind values     
    if(isset($def[$numberValue])) { 
        // checking for numbers from 2 to 10 :reson = 2 to 10 uses 'ة' at the end 
        if($numberValue < 11 && $numberValue > 2){ 
            if ($numberValue == 8 )
                $textResult .= $def[$numberValue].'ية'; 
            else 
                $textResult .= $def[$numberValue].'ة'; 
        } 
        else{ 
            // the rest of the defined numbers 
            $textResult .= $def[$numberValue]; 
        } 
    } 
    else{ 
        $tensCheck = $numberValue%10; 
        $numberValue = "$numberValue"; 
         
        for($x = strlen($numberValue); $x > 0; $x--){ 
            $places[$x] = $numberValue[strlen($numberValue)-$x]; 
        } 

        switch(count($places)){ 
            case 2: // 2 numbers 
            case 1: // or 1 number 
            { 
                if ($places[1] == 8 )
                $textResult .= ($places[1] != 0) ? $def[$places[1]].(($places[1] > 2 || $places[2] == 1) ? 'ية' : '').(($places[2] != 1) ? ' و' : ' ') : ''; 
                else 
                
                $textResult .= ($places[1] != 0) ? $def[$places[1]].(($places[1] > 2 || $places[2] == 1) ? 'ة' : '').(($places[2] != 1) ? ' و' : ' ') : ''; 
                $textResult .= (($places[2] > 2) ? $def[$places[2]].'ون' : $def[10].(($places[2] != 2) ? '' : 'ون'));                 
            } 
            break; 
            case 3: // 3 numbers 
            { 
                $lastTwo = (int) $places[2].$places[1]; 
                $textResult .= ($places[3] > 2) ? $def[$places[3]].' '.$def[100] : $def[(int) $places[3]."00"]; 
                if($lastTwo != 0){ 
                    $textResult .= ' و'.makeNumber2Text($lastTwo); 
                } 
            } 
            break;  
            case 4: // 4 numbrs 
            { 
                $lastThree = (int) $places[3].$places[2].$places[1]; 
                $textResult .= ($places[4] > 2) ? $def[$places[4]].'ة الاف' : $def[(int) $places[4]."000"]; 
                if($lastThree != 0){ 
                    $textResult .= ' و'.makeNumber2Text($lastThree); 
                } 
            } 
            break; 
            case 5: // 5 numbers 
            {     
                $lastThree = (int) $places[3].$places[2].$places[1]; 
                $textResult .= makeNumber2Text((int) $places[5].$places[4]).((((int) $places[5].$places[4]) != 10) ? ' الفاً' : ' الاف'); 
                if($lastThree != 0){ 
                    $textResult .= ' و'.makeNumber2Text($lastThree); 
                } 
            } 
            break; 
            case 6: // 6 numbers 
            {     
                $lastThree = (int) $places[3].$places[2].$places[1]; 
                $textResult .= makeNumber2Text((int) $places[6].$places[5].$places[4]).((((int) $places[5].$places[4]) != 10) ? ' الفاً' : ' الاف'); 
                if($lastThree != 0){ 
                    $textResult .= ' و'.makeNumber2Text($lastThree); 
                } 
            } 
            break; 
            case 7: // 7 numbers 1 mill 
            {     
                $textResult .= ($places[7] > 2) ? $def[$places[7]].' ملايين' : $def[(int) $places[7]."000000"]; 
                $textResult .= ' و'; 
                $textResult .= makeNumber2Text((int) $places[6].$places[5].$places[4].$places[3].$places[2].$places[1]); 
            } 
            break; 
            case 8: // 8 numbers 10 mill 
            case 9: // 9 numbers 100 mill 
            {     
                $places[9] = (isset($places[9])) ? $places[9] : ''; 
                $firstThree = (int) $places[9].$places[8].$places[7]; 
                $textResult .=     makeNumber2Text($firstThree); 
                $textResult .=    ($firstThree < 11) ? ' ملايين ' : ' مليونا '; 
                if(((int) $places[6].$places[5].$places[4].$places[3].$places[2].$places[1]) != 0){ 
                    $textResult .= ' و'; 
                    $textResult .=    makeNumber2Text((int) $places[6].$places[5].$places[4].$places[3].$places[2].$places[1]); 
                } 
            } 
            break; 
            default: 
            { 
                $textResult = 'هذا رقم كبير .. '; 
            } 
        } 

    } 
    return $textResult;
    
} 

function Dot($Value){
if(!isset($Value))
return "لم يتم إدخال أى أرقام";
$DotArray= array("","عشرة","مائة","ألف","عشرة ألاف","مائة ألف","مليون","عشرة ملايين","مائة مليون","مليار");
$StrValue=(string)$Value;
$DotLens=0;
$Dot=False;
$Text1="";
$Text2="";
for($i=0;$i<strlen($StrValue);$i++)
        {
        if($StrValue[$i]=="."){
        $Dot=True;
        }
        if($StrValue[$i]!="."){
        if($Dot==False)
        $Text1.=$StrValue[$i];
        else{
        $Text2.=$StrValue[$i];
        $DotLens++;
            }
          }
        }
        if($Dot==False)
        return makeNumber2Text($StrValue);
        else {
        if($DotLens>0 && $DotLens<10)
        return makeNumber2Text((int)$Text1)." فاصلة ".makeNumber2Text((int)$Text2)." من ".$DotArray[$DotLens];
        else
        return makeNumber2Text((int)$Text1)." فاصلة ".makeNumber2Text((int)$Text2);
        }
}
//echo Dot(59.00855);
?>