<?php
$orderDate = '29/09/2022';
$oderTime = '1:00 AM';
$cutOffTime = "11";
$holidays = ["Saturday", "Sunday", "Monday", "Tuesday", "Wednesday"];

//function getShippingDate($orderDate, $oderTime,$cutOffTime = '',$holidays = '') {
    
    $find = array("/",".");
    $replace = array("-","-");
    $orderDate = str_replace($find,$replace,$orderDate);  
    $orderDate = date('Y-m-d',strtotime($orderDate)); //convert orderDate into Y-m-d format
    $oderTime  = date('H:i:s',strtotime($oderTime)); //convert time into 24 hr format

    if( $cutOffTime != '' && $oderTime > $cutOffTime )
    {
        $CalculatedShippingDate = date('Y-m-d', strtotime($orderDate . ' +1 day'));
    }
    else {
        
        $CalculatedShippingDate = $orderDate;
    }
    
    $day =  date('l', strtotime($CalculatedShippingDate));  //convert the calculated shipping date into day.
    if(!empty($holidays))
    {
        foreach($holidays as $ht )
        {
            if( $ht == $day)
            {
                $CalculatedShippingDate = date('Y-m-d', strtotime($CalculatedShippingDate . ' +1 day'));
                $day =  date('l', strtotime($CalculatedShippingDate)); 
            
            }
       
       
        }
    }

    //return $CalculatedShippingDate;
    echo $CalculatedShippingDate;
	
//}