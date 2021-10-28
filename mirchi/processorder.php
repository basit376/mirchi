<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mirchi 99 Orders=Results</title>
</head>
<body>
    <h1>Mirchi 99 Matiari Fast Food </h1>
    <h2>Order Results</h2>
    <?php
     echo "<p>Order processed at ".date('H:i, jS F Y')."</p>";
     //creating Short Varaibles 
     $rollqty = (int) $_POST['rollqty'];
     $tikaqty = (int) $_POST['tikaqty'];
     $handiqty = (int) $_POST['handiqty'];
     $pastaqty =(int) $_POST['pastaqty'];
     $coffeqty = (int) $_POST['coffeqty'];
     $address = preg_replace('/\t|\R/',' ',$_POST['address']);
     $date = date('H:i, jS F Y');
     $document_root = $_SERVER['DOCUMENT_ROOT'];
    

     echo '<p>Your Orders Follows As:</p>';
     

     $totalqty = 0;
     $totalamount = 0.00;
     define('ROLLPRICE', 100);
     define('TIKKAPRICE', 240);
     define('HANDIPRICE', 350);
     define('PASTAPRICE',120);
     define('COFFEPRICE',150);
     $totalqty = $rollqty + $tikaqty + $handiqty + $pastaqty + $coffeqty ;
     echo  "<P>Items Orderded: ".$totalqty."<br/>";

     if($totalqty == 0){
        echo "You did not Order On Previous Page!<br";

    }else{
        if ($rollqty > 0)
        echo htmlspecialchars($rollqty).' Chicken Roll <br />';

        if ($tikaqty > 0)
        echo htmlspecialchars($tikaqty).' Tikka Boti <br />';

        if ($handiqty > 0)
        echo htmlspecialchars($handiqty).' Mutton Handi <br />';

        if ($pastaqty > 0)
        echo htmlspecialchars($pastaqty).' Pasta <br />';

        if ($coffeqty > 0)
        echo htmlspecialchars($coffeqty).' Cappuccino Coffe <br />';

    }
     
     $totalamount = $rollqty * ROLLPRICE + $tikaqty * TIKKAPRICE + $handiqty * HANDIPRICE + $pastaqty * PASTAPRICE + $coffeqty * COFFEPRICE ;
     
     echo "subtotal: Rs:".number_format($totalamount,2)."<br/>";

     $taxrate = 0.10; // delivery charges 10%
     $totalamount = $totalamount * (1 + $taxrate);
     echo "Total Including Delivery Charges: Rs:".number_format($totalamount,2)."</p>";

     echo "<p>Address to ship to is ".htmlspecialchars($address)."</p>";

     $outputstring = $date."\t".$rollqty." Chicken Roll \t".$tikaqty." Tikka Boti \t".$handiqty." Mutton Handi \t".$pastaqty." Pasta \t".$coffeqty." Cappuccino Coffe \t\$".$totalamount."\t".$address."\n";


     //open the File for appending
     @$fp = fopen("$document_root/mirchi/order.txt",'ab');

     if(!$fp){
         echo "<p><strong>Your order could not processed at this time. Please try again later
         </strong></p>";
         exit ;

     }
     flock($fp, LOCK_EX);
     fwrite($fp, $outputstring,  strlen($outputstring));
     flock($fp,LOCK_UN);
     fclose($fp);

     echo '<p>Order Written</p>';

    
    ?>
</body>
</html>